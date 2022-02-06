@extends('layouts.admin')
@section('title','Reporte de ventas')
@section('styles')
@endsection
@section('options')
@endsection
@section('preference')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            Reporte de tiempos
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-custom">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Panel administrador</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tiempos de facturación</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row ">
                        <div class="col-12 col-md-4 text-center">
                            <span>Fecha de consulta: <b> </b></span>
                            <div class="form-group">
                                <strong>{{\Carbon\Carbon::now()->format('d/m/Y')}}</strong>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 text-center">
                            <span>Cantidad de registros: <b></b></span>
                            <div class="form-group">
                                <strong>{{$times->count()}}</strong>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 text-center">
                            <span>Exportar a Excel: <b></b></span>
                            <div class="form-group">
                                @if($tipo=='FACTURA')
                                    <a href="{{route('timeF.excel')}}" class="btn btn-outline-danger"
                                    title="Exportar a Excel"><i class="fas fa-file-excel"></i></a>
                                @else
                                    <a href="{{route('timeB.excel')}}" class="btn btn-outline-danger"
                                    title="Exportar a Excel"><i class="fas fa-file-excel"></i></a>
                                @endif
                                
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="order-listing" class="table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Tipo</th>
                                    <th>Tiempo de inicio</th>
                                    <th>Tiempo de fin</th>
                                    <th>Intervalo (s)</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                @foreach ($times as $time)
                                    
                                    @include('admin.time._time_list')
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
{!! Html::script('melody/js/data-table.js') !!}
@endsection
