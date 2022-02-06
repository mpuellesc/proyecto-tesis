<?php
declare(strict_types=1);
namespace App\Http\Controllers;
use Exception;
use App\Models\Sale;
use App\Models\Product;
use App\Models\User;
use App\Models\Time;
use App\Http\Requests\Sale\StoreRequest;
use App\Http\Requests\Sale\UpdateRequest;
use App\Models\Business;
use Barryvdh\DomPDF\Facade as PDF;
use DateTime;
use Luecano\NumeroALetras\NumeroALetras;
use Greenter\Model\Client\Client;
use Greenter\Model\Company\Company;
use Greenter\Model\Company\Address;
use Greenter\Model\Sale\FormaPagos\FormaPagoContado;
use Greenter\Model\Sale\Invoice;
use Greenter\Model\Sale\SaleDetail;
use Greenter\Model\Sale\Legend;
use Greenter\See;
use Greenter\Data\Generator\InvoiceStore;

use Greenter\Ws\Services\SunatEndpoints;


use App\Models\Util;
use Carbon\Carbon;
use Dompdf\Exception as DompdfException;
use Exception as GlobalException;
use Hamcrest\Util as HamcrestUtil;
use PhpParser\Node\Expr\Cast\String_;
use Util as GlobalUtil;

class SaleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware([
            'permission:sales.index',
            'permission:sales.create',
            'permission:sales.store',
            'permission:sales.show',
            'permission:sales.pdf',
            'permission:sales.print',
            'permission:change.status.sales',
        ]);
    }

    public function index()
    {
        $fecha1 = new DateTime();//fecha inicial
        $fecha1 = $fecha1->format('Y-m-d H:i:s.v');
        

        $sales = Sale::get();
        return view('admin.sale.index', compact('sales', 'fecha1'));
    }
    public function create()
    {
        $clients = User::role('Client')->get();
        $products = Product::pos_products()->get();
        return view('admin.sale.create', compact('clients', 'products'));
    }
    public function store(StoreRequest $request, Sale $sale)
    {
        $sale->my_store($request);
        return redirect()->route('sales.index')->with('toast_success', '¡Venta registrada con éxito!');
    }
    public function show(Sale $sale)
    {
        $subtotal = 0 ;
        $saleDetails = $sale->saleDetails;
        foreach ($saleDetails as $saleDetail) {
            $subtotal += $saleDetail->quantity*$saleDetail->price-$saleDetail->quantity* $saleDetail->price*$saleDetail->discount/100;
        }
        return view('admin.sale.show', compact('sale', 'saleDetails', 'subtotal'));
    }
    public function edit(Sale $sale)
    {
        // $clients = Client::get();
        // return view('admin.sale.edit', compact('sale'));
    }
    public function update(UpdateRequest $request, Sale $sale)
    {
        // $sale->update($request->all());
        // return redirect()->route('sales.index');
    }
    public function destroy(Sale $sale)
    {
        // $sale->delete();
        // return redirect()->route('sales.index');
    }
    public function pdf(Sale $sale)
    {
        $subtotal = 0 ;
        $saleDetails = $sale->saleDetails;
        foreach ($saleDetails as $saleDetail) {
            $subtotal += $saleDetail->quantity*$saleDetail->price-$saleDetail->quantity* $saleDetail->price*$saleDetail->discount/100;
        }
        $pdf = PDF::loadView('admin.sale.pdf', compact('sale', 'subtotal', 'saleDetails'));
        return $pdf->stream('Reporte_de_venta_'.$sale->id.'.pdf');
    }

    public function print(Sale $sale){
       // Instalar un paquete para imprimir en múltiples tamaños 
    }

    public function change_status(Sale $sale)
    {
        if ($sale->status == 'VALID') {
            $sale->update(['status'=>'CANCELED']);
            return redirect()->back()->with('toast_success', '¡Estado cambiado con éxito!');
        } else {
            $sale->update(['status'=>'VALID']);
            return redirect()->back()->with('toast_success', '¡Estado cambiado con éxito!');
        } 
    }

    public function enviar_factura(Sale $sale, $fecha1){ 
        
        $see = new See();
        $see->setService(SunatEndpoints::FE_BETA);
        $see->setCertificate(file_get_contents('certificate.pem'));
        $see->setClaveSOL('20000000001', 'MODDATOS', 'moddatos');

        // Cliente
        $client = new Client();
        $client->setTipoDoc('6')
            ->setNumDoc('20000000001')
            ->setRznSocial('EMPRESA FERRETERIA');

        // Emisor
        $address = new Address();
        $address->setUbigueo('120101')
            ->setDepartamento('LA LIBERTAD')
            ->setProvincia('TRUJILLO')
            ->setDistrito('TRUJILLO')
            ->setUrbanizacion('LA MARQUEZA')
            ->setDireccion('CAL.EDUARDO YONG MZA. A LOTE. 28')
            ->setCodLocal('0000'); // Codigo de establecimiento asignado por SUNAT, 0000 de lo contrario.

        $company = new Company();
        $company->setRuc('20481046905')
            ->setRazonSocial('FERRETERIA LA MARQUEZA EIRL')
            ->setNombreComercial('FERRETERIA LA MARQUEZA EIRL')
            ->setAddress($address);

        // Venta
        $subtotal = 0 ;
        $saleDetails = $sale->saleDetails;
        foreach ($saleDetails as $saleDetail) {
            $subtotal += $saleDetail->quantity*$saleDetail->price-$saleDetail->quantity* $saleDetail->price*$saleDetail->discount/100;
        }

        $igv=$subtotal*$sale->tax/100;

        $invoice = (new Invoice())
            ->setUblVersion('2.1')
            ->setTipoOperacion('0101') // Venta - Catalog. 51
            ->setTipoDoc('01') // Factura - Catalog. 01
            ->setSerie('F001')
            ->setCorrelativo(strval($sale->id))
            ->setFechaEmision(new DateTime())
            ->setFormaPago(new FormaPagoContado())
            ->setTipoMoneda('PEN') // Sol - Catalog. 02
            ->setCompany($company)
            ->setClient($client)
            ->setMtoOperGravadas($subtotal)
            ->setMtoIGV($igv)
            ->setTotalImpuestos($igv)
            ->setValorVenta($subtotal)
            ->setSubTotal(floatval($sale->total))
            ->setMtoImpVenta(floatval($sale->total))
        ;
        
        $items = array();
        foreach($saleDetails as $saleDetail){
           
            $item = (new SaleDetail())
            
            ->setCodProducto(strval($saleDetail->product->id))
            ->setUnidad('NIU') // Unidad - Catalog. 03
            ->setCantidad($saleDetail->quantity)
            ->setDescripcion($saleDetail->product->name)
            ->setMtoBaseIgv($saleDetail->price*$saleDetail->quantity)
            ->setPorcentajeIgv(18.00) // 18%
            ->setIgv($saleDetail->price*$saleDetail->quantity*18/100)
            ->setTipAfeIgv('10') // Gravado Op. Onerosa - Catalog. 07
            ->setTotalImpuestos($saleDetail->price*$saleDetail->quantity*18/100)
            ->setMtoValorVenta($saleDetail->price*$saleDetail->quantity)
            ->setMtoValorUnitario(floatval($saleDetail->price))
            ->setMtoPrecioUnitario(floatval($saleDetail->price+($saleDetail->price*18/100)));
            array_push($items,$item);
        }

        
        
        $totalLetras= new NumeroALetras();
        $legend = (new Legend())
            ->setCode('1000') // Monto en letras - Catalog. 52
            ->setValue($totalLetras->toWords($sale->total,2));
        
        $invoice->setDetails($items)
            ->setLegends([$legend]);

        // Envío a SUNAT
        $result = $see->send($invoice);
        
        // Guardar XML firmado digitalmente.
        file_put_contents($invoice->getName().'.xml',
            $see->getFactory()->getLastXml());

        // Verificamos que la conexión con SUNAT fue exitosa.
        if (!$result->isSuccess()) {
            // Mostrar error al conectarse a SUNAT.
            echo 'Codigo Error: '.$result->getError()->getCode();
            echo 'Mensaje Error: '.$result->getError()->getMessage();
            exit();
        }

        // Guardamos el CDR
        file_put_contents('R-'.$invoice->getName().'.zip', $result->getCdrZip());

        // CDR Resultado
        $cdr = $result->getCdrResponse();

        $code = (int)$cdr->getCode();

        if ($code === 0) {
            echo 'ESTADO: ACEPTADA'.PHP_EOL;
        } else if ($code >= 4000) {
            echo 'ESTADO: ACEPTADA CON OBSERVACIONES:'.PHP_EOL;
            var_dump($cdr->getNotes());
        } else if ($code >= 2000 && $code <= 3999) {
            echo 'ESTADO: RECHAZADA'.PHP_EOL;
        } else {
            /* Esto no debería darse */
            /*code: 0100 a 1999 */
            echo 'Excepción';
        }

        echo $cdr->getDescription().PHP_EOL;
        
        $sale->status_sunat='ACEPTADO';
        $sale->save();

        $fecha1 = new DateTime($fecha1) ;
        $fecha1 = Carbon::parse($fecha1);
        //$fecha1 = $fecha1->format('Y:m:d h:i:s.v');
        $fecha2 = new DateTime();//fecha de cierre
        $fecha2 = Carbon::parse($fecha2);
        
        
        //dd($fecha2);
        $intervalo = $fecha1->diffInSeconds($fecha2);
        
        $time = new Time;
        $time->type = 'FACTURA';
        $time->start = $fecha1;
        $time->end = $fecha2;
        $time->difference = $intervalo;
        $time->save();
        return redirect()->back()->with('toast_success', 'Envio a SUNAT con éxito!');
    }

    public function datos_factura(Sale $sale){     
        $see = new See();
        $see->setService(SunatEndpoints::FE_BETA);
        $see->setCertificate(file_get_contents('certificate.pem'));
        $see->setClaveSOL('20000000001', 'MODDATOS', 'moddatos');

        // Cliente
        $client = new Client();
        $client->setTipoDoc('6')
            ->setNumDoc('20000000001')
            ->setRznSocial('EMPRESA FERRETERIA');

        // Emisor
        $address = new Address();
        $address->setUbigueo('120101')
            ->setDepartamento('LA LIBERTAD')
            ->setProvincia('TRUJILLO')
            ->setDistrito('TRUJILLO')
            ->setUrbanizacion('LA MARQUEZA')
            ->setDireccion('CAL.EDUARDO YONG MZA. A LOTE. 28')
            ->setCodLocal('0000'); // Codigo de establecimiento asignado por SUNAT, 0000 de lo contrario.

        $company = new Company();
        $company->setRuc('20481046905')
            ->setRazonSocial('FERRETERIA LA MARQUEZA EIRL')
            ->setNombreComercial('FERRETERIA LA MARQUEZA EIRL')
            ->setAddress($address);

        // Venta
        $subtotal = 0 ;
        $saleDetails = $sale->saleDetails;
        foreach ($saleDetails as $saleDetail) {
            $subtotal += $saleDetail->quantity*$saleDetail->price-$saleDetail->quantity* $saleDetail->price*$saleDetail->discount/100;
        }

        $igv=$subtotal*$sale->tax/100;

        $invoice = (new Invoice())
            ->setUblVersion('2.1')
            ->setTipoOperacion('0101') // Venta - Catalog. 51
            ->setTipoDoc('01') // Factura - Catalog. 01
            ->setSerie('F001')
            ->setCorrelativo(strval($sale->id))
            ->setFechaEmision(new DateTime())
            ->setFormaPago(new FormaPagoContado())
            ->setTipoMoneda('PEN') // Sol - Catalog. 02
            ->setCompany($company)
            ->setClient($client)
            ->setMtoOperGravadas($subtotal)
            ->setMtoIGV($igv)
            ->setTotalImpuestos($igv)
            ->setValorVenta($subtotal)
            ->setSubTotal(floatval($sale->total))
            ->setMtoImpVenta(floatval($sale->total))
        ;
        
        $items = array();
        foreach($saleDetails as $saleDetail){
           
            $item = (new SaleDetail())
            
            ->setCodProducto(strval($saleDetail->product->id))
            ->setUnidad('NIU') // Unidad - Catalog. 03
            ->setCantidad($saleDetail->quantity)
            ->setDescripcion($saleDetail->product->name)
            ->setMtoBaseIgv($saleDetail->price*$saleDetail->quantity)
            ->setPorcentajeIgv(18.00) // 18%
            ->setIgv($saleDetail->price*$saleDetail->quantity*18/100)
            ->setTipAfeIgv('10') // Gravado Op. Onerosa - Catalog. 07
            ->setTotalImpuestos($saleDetail->price*$saleDetail->quantity*18/100)
            ->setMtoValorVenta($saleDetail->price*$saleDetail->quantity)
            ->setMtoValorUnitario(floatval($saleDetail->price))
            ->setMtoPrecioUnitario(floatval($saleDetail->price+($saleDetail->price*18/100)));
            array_push($items,$item);
        }

        
        
        $totalLetras= new NumeroALetras();
        $legend = (new Legend())
            ->setCode('1000') // Monto en letras - Catalog. 52
            ->setValue($totalLetras->toWords($sale->total,2));
        
        $invoice->setDetails($items)
            ->setLegends([$legend]);

        return $invoice;
    }

    public function factura_pdf(Sale $sale){
        $util = Util::getInstance();
        $invoice = $util->getGenerator(SaleController::class)->$this->datos_factura($sale);
        dd($invoice);
        try {
            $pdf = $util->getPdf($invoice);
            $util->showPdf($pdf, $invoice->getName().'.pdf');
        } catch (Exception $e) {
            var_dump($e);
        }
    }
    
}
