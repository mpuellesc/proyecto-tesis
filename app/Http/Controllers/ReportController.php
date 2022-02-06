<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\Purchase;
use App\Models\Order;
use App\Models\OrderDetail;
use DateTime;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware([
            'permission:reports.day',
            'permission:reports.date',
            'permission:report.results'
        ]);
    }
    public function reports_day(){
        $sales = Sale::WhereDate('sale_date', Carbon::today('America/Lima'))->get();
        $total = $sales->sum('total');
        return view('admin.report.reports_day', compact('sales', 'total'));
    }
    public function reports_date(){
        $fecha1 = new DateTime();//fecha inicial
        $fecha1 = $fecha1->format('Y-m-d H:i:s');

        $sales = Sale::whereDate('sale_date', Carbon::today('America/Lima'))->get();
        $total = $sales->sum('total');
        return view('admin.report.reports_date', compact('sales', 'total','fecha1'));
    }
    public function report_results(Request $request){
        $fi = $request->fecha_ini. ' 00:00:00';
        $ff = $request->fecha_fin. ' 23:59:59';
        $sales = Sale::whereBetween('sale_date', [$fi, $ff])->get();
        $total = $sales->sum('total');

        $fecha1 = $request->fechainicio;
        $fecha1 = new DateTime($fecha1);
        $fecha2 = new DateTime();//fecha de cierre
        $intervalo = $fecha1->diff($fecha2);
        $intervalo = $intervalo->format('%s, %f');
        dd($intervalo);
        return view('admin.report.reports_date', compact('sales', 'total'));
        // mejorar el resultado de reportes y agregar alertas
    }
    public function reports_prediction(){
        $comprasmes = Purchase::where('status', 'VALID')->select(
            DB::raw("count(*) as count"),
            DB::raw("SUM(total) as totalmes"),
            DB::raw("DATE_FORMAT(purchase_date,'%M %Y') as mes")
        )->groupBy('mes')->take(12)->get();
        
        $orders_of_the_day = Order::where('order_date','>=',Carbon::now()->subdays(1))->take(5)->get();

        $orders_of_the_day_status = Order::where('order_date','>=',Carbon::now()->subdays(1))
        ->select(
            DB::raw("count(*) as count"),
            DB::raw("shipping_status as status")
        )->groupBy('status')->get();

        $ventasmes = Sale::where('status', 'VALID')->select(
            DB::raw("count(*) as count"),
            DB::raw("SUM(total) as totalmes"),
            DB::raw("DATE_FORMAT(sale_date,'%M %Y') as mes")
        )->groupBy('mes')->orderby('id')->take(12)->get();
        $ventasdia = Sale::where('status', 'VALID')->select(
            DB::raw("count(*) as count"),
            DB::raw("SUM(total) as total"),
            DB::raw("DATE_FORMAT(sale_date,'%D %M %Y') as date")
        )->groupBy('date')->orderby('id')->take(30)->get();

        $x = array();
        $y = array();
        $dia=1;
        
        foreach($ventasdia as $vd){
            array_push($x, $dia);
            array_push($y, $vd->count);
            $dia++;
        }
        $prediccionVentas = Sale::regresionLineal($x, $y);
        $w = $prediccionVentas['w'];
        $b = $prediccionVentas['b'];
        
        $prediccion = collect();
        for($i=0; $i<count($x)+10; $i++){
            $venta = $w * ($i+1) + $b;
            $prediccion->push( ($venta));
        }

        $x = array();
        $y = array();
        $dia=1;
        
        foreach($ventasmes as $vd){
            array_push($x, $dia);
            array_push($y, $vd->count);
            $dia++;
        }
        $prediccionVentas = Sale::regresionLineal($x, $y);
        $w = $prediccionVentas['w'];
        $b = $prediccionVentas['b'];
        
        $prediccionmes = collect();
        for($i=0; $i<count($x)+10; $i++){
            $venta = $w * ($i+1) + $b;
            $prediccionmes->push( ($venta));
        }

        
        $most_ordered_products = OrderDetail::select(
            DB::raw("SUM(quantity) as total"),
            DB::raw("product_id as product_id")
        )->groupBy('product_id')->take(12)->get();

        $order_mes = Order::where('order_date','>=',Carbon::now()->subdays(30))->select(
            DB::raw("count(*) as count"),
            DB::raw("shipping_status as status")
        )->groupBy('status')->get();

        $totales=DB::select('SELECT (select ifnull(sum(c.total),0) from purchases c where DATE(MONTH(c.purchase_date))=MONTH(curdate()) and c.status="VALID") as totalcompra, (select ifnull(sum(v.total),0) from sales v where DATE(MONTH(v.sale_date))=MONTH(curdate()) and v.status="VALID") as totalventa');
        $productosvendidos=DB::select('SELECT p.code as code, 
        sum(dv.quantity) as quantity, p.name as name , p.id as id , p.stock as stock from products p 
        inner join sale_details dv on p.id=dv.product_id 
        inner join sales v on dv.sale_id=v.id where v.status="VALID" 
        and MONTH(v.sale_date)=MONTH(curdate()) 
        group by p.code ,p.name, p.id , p.stock order by sum(dv.quantity) desc limit 10');
        
        return view('admin.report.reports_prediction', compact( 'comprasmes', 'ventasmes', 'prediccion', 'prediccionmes', 'ventasdia', 'totales', 'productosvendidos','order_mes','most_ordered_products','orders_of_the_day','orders_of_the_day_status'));
        
    }

}
