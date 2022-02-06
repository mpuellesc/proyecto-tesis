<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\UpdateRequest;
use App\Models\Provider;
use App\Models\Tag;
use App\Models\Time;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use DateTime;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware([
            'permission:products.index',
            'permission:products.store',
            'permission:products.show',
            'permission:products.edit',
            'permission:products.update',
            'permission:products.destroy',
            'permission:update_product_status',
            'permission:change.status.products',
            'permission:get_products_by_barcode',
            'permission:get_products_by_id',
            'permission:print_barcode'

        ]);
    }
    public function index()
    {
        $fecha1 = new DateTime();//fecha inicial
        $fecha1 = $fecha1->format('Y-m-d H:i:s.v');


        $products = Product::with('category')->get();
        return view('admin.product.index', compact('products', 'fecha1'));
    }
    public function create()
    {
        $categories = Category::where('category_type', 'PRODUCT')->get();
        $providers = Provider::get();
        $tags = Tag::all();
        $brands = Brand::all();
        return view('admin.product.create', compact('categories', 'providers', 'tags', 'brands'));
    }
    public function store(StoreRequest $request, Product $product)
    {
        $product = $product->my_store($request);
        return redirect()->route('products.edit',  $product)->with('toast_warning', '¡Rellena el formulario para publicar el producto!');
    }
    public function show(Product $product)
    {
        return view('admin.product.show', compact('product'));
    }
    public function edit(Product $product)
    {
        $categories = Category::where('category_type', 'PRODUCT')->get();
        $providers = Provider::all();
        $tags = Tag::all();
        $brands = Brand::all();
        return view('admin.product.edit', compact('product', 'categories', 'providers','tags','brands'));
    }
    public function update(UpdateRequest $request, Product $product)
    {
        $product->my_update($request);
        return redirect()->route('products.index')->with('toast_success', '¡Producto actualizado con éxito!');
    }
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->back()->with('toast_success', '¡Producto eliminado con éxito!');
    }

    public function time_product($fecha1)
    {
        $fecha1 = new DateTime($fecha1) ;
        $fecha1 = Carbon::parse($fecha1);
        //$fecha1 = $fecha1->format('Y:m:d h:i:s.v');
        $fecha2 = new DateTime();//fecha de cierre
        $fecha2 = Carbon::parse($fecha2);
        
        //dd($fecha2);
        $intervalo = $fecha1->diffInSeconds($fecha2);
        
        $time = new Time;
        $time->type = 'BUSQUEDA';
        $time->start = $fecha1;
        $time->end = $fecha2;
        $time->difference = $intervalo;
        $time->save();
        return redirect()->back()->with('toast_success', '¡Tiempo de búsqueda guardado!');
    }

    public function change_status(Product $product)
    {
        if ($product->status == 'ACTIVE') {
            $product->update(['status'=>'DEACTIVATED']);
            return redirect()->back();
        } else {
            $product->update(['status'=>'ACTIVE']);
            return redirect()->back();
        } 
    }

    public function get_products_by_barcode(Request $request){
        if ($request->ajax()) {
            $products = Product::where('code', $request->code)->firstOrFail();
            return response()->json($products);
        }
    }
    public function get_products_by_id(Request $request){
        if ($request->ajax()) {
            $products = Product::findOrFail($request->product_id);
            return response()->json($products);
        }
    }
    
    public function print_barcode()
    {
        $products = Product::get();
        $pdf = PDF::loadView('admin.product.barcode', compact('products'));
        return $pdf->download('codigos_de_barras.pdf');
    }

    public function update_product_status(Request $request, $id){
        $product = Product::find($id);
        $product->update([
            'status' => $request->value
        ]);
        return $request->value;
    }
}
