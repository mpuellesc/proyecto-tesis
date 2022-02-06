<?php

namespace App\Http\Controllers;


use App\Models\Time;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\TimeFExport;
use App\Exports\TimeBExport;

use Illuminate\Http\Request;

class TimeController extends Controller
{
    public function time_factura(){
        $times = Time::Where('type', 'FACTURA')->get();
        $tipo = 'FACTURA';
        return view('admin.time.time_factura', compact('times', 'tipo'));
    }
    public function time_busqueda(){
        $times = Time::Where('type', 'BUSQUEDA')->get();
        $tipo = 'BUSQUEDA';
        return view('admin.time.time_factura', compact('times', 'tipo'));
    }

    public function timeF_excel(){
        return Excel::download(new TimeFExport, 'TimeFacturacion.xlsx');
    }

    public function timeB_excel(){
        return Excel::download(new TimeBExport, 'TimeBusquedaProductos.xlsx');
    }
}
