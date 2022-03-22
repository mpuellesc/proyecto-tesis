@extends('layouts.admin')
@section('title','Gestión de ventas')
@section('styles')
@endsection
@section('create')
@endsection
@section('options')
@endsection
@section('preference')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            Ventas
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-custom">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Panel administrador</a></li>
                <li class="breadcrumb-item active" aria-current="page">Ventas</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">

                    <div class="table-responsive">
                        <table id="sales_listing" class="table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Fecha</th>
                                    <th>Total</th>
                                    <th>Estado</th>
                                    <th>Estado - SUNAT</th>
                                    <th>Acciones</th>
                                    <th>Sunat</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sales as $sale)
                                <tr>
                                    <th scope="row">
                                        <a href="{{route('sales.show', $sale)}}">{{$sale->id}}</a>
                                    </th>
                                    <td>
                                        {{\Carbon\Carbon::parse($sale->sale_date)->format('d M y h:i a')}}
                                    </td>
                                    <td>{{$sale->total}}</td>

                                    @if ($sale->status == 'VALID')
                                    <td>
                                        <a class="jsgrid-button btn btn-success" href="{{route('change.status.sales', $sale)}}" title="Editar">
                                            Activo <i class="fas fa-check"></i>
                                        </a>
                                    </td>
                                    @else
                                    <td>
                                        <a class="jsgrid-button btn btn-danger" href="{{route('change.status.sales', $sale)}}" title="Editar">
                                            Cancelado <i class="fas fa-times"></i>
                                        </a>
                                    </td>
                                    @endif
                                    @if ($sale->status_sunat == 'ACEPTADO')
                                    <td>
                                        <a class="jsgrid-button btn btn-success" href="" title="Editar">
                                            ACEPTADO <i class="fas fa-check"></i>
                                        </a>
                                    </td>
                                    @elseif($sale->status_sunat == 'RECHAZADO')
                                    <td>
                                        <a class="jsgrid-button btn btn-danger" href="" title="Editar">
                                            RECHAZADO <i class="fas fa-times"></i>
                                        </a>
                                    </td>
                                    @elseif($sale->status_sunat == 'ANULADO')
                                    <td>
                                        <a class="jsgrid-button btn btn-danger" href="" title="Editar">
                                            ANULADO <i class="fas fa-times"></i>
                                        </a>
                                    </td>
                                    @else
                                    <td>
                                        <a class="jsgrid-button btn btn-danger" href="" title="Editar">
                                            NO ENVIADO <i class="fas fa-times"></i>
                                        </a>
                                    </td>
                                    @endif

                                    <td style="width: 20%;">
                                        {{-- <a href="{{route('sales.pdf', $sale)}}" class="btn btn-outline-danger"
                                        title="Generar PDF"><i class="far fa-file-pdf"></i></a> --}}
                                        <a href="{{asset('20481046905-01-F001-123.pdf')}}" target="_blank"  class="btn btn-outline-danger"
                                        title="Generar PDF"><i class="far fa-file-pdf"></i></a>
                                        <a href="{{route('sales.print', $sale)}}" class="btn btn-outline-warning"
                                        title="Imprimir boleta"><i class="fas fa-print"></i></a>
                                        <a href="{{route('sales.show', $sale)}}" class="btn btn-outline-info"
                                        title="Ver detalles"><i class="far fa-eye"></i></a>                                  
                                    </td>
                                    
                                    <td style="width: 20%;">
                                        <label class="btn btn-outline-danger"
                                        @if($sale->status_sunat == 'ACEPTADO')
                                            title="ACEPTADO"><i class="fas fa-check-circle"></i></label> 
                                            <a href="{{asset('20481046905-01-F001-'.$sale->id.'.xml')}}" target="_blank" class="btn btn-outline-info"
                                            title="Ver detalles"><i class="far fa-file-archive"></i></a>
                                            {{-- <a href="{{route('enviar.factura.sales', $sale)}}" class="btn btn-outline-danger"
                                            title="Anular Envío"><i class="fas fa-check-circle"></i></a> --}}
                                            {{-- <label class="btn btn-outline-warning"
                                            title="ACEPTADO"><i class="fas fa-check-circle"></i></label> --}}
                                        @elseif($sale->status_sunat == null && $sale->status == 'VALID')
                                            <a href="{{route('enviar.factura.sales', [$sale, $fecha1])}}" class="btn btn-outline-danger"
                                            title="Enviar a SUNAT"><i class="fas fa-paper-plane"></i></a>
                                            <a href="{{route('enviar.factura.sales', [$sale, $fecha1])}}">Enviar</a>
                                            {{-- <label class="btn btn-outline-warning"
                                            title="RECHAZADO"><i class="fas fa-times"></i></label> --}}
                                        @elseif(($sale->status != 'VALID'))
                                            {{-- <label class="btn btn-outline-warning"
                                            title="ANULADO"><i class="fas fa-question-circle"></i></label> --}}
                                            <label class="btn btn-outline-warning"
                                            title="ANULADO"><i class="fas fa-times-circle"></i></label>
                                        @else
                                            {{-- <label class="btn btn-outline-warning"
                                            title="POR ENVIAR"><i class="fas fa-question-circle"></i></label>
                                            <a href="{{route('sales.show', $sale)}}" class="btn btn-outline-info"
                                            title="Ver detalles"><i class="far fa-file-archive"></i></a>  --}}
                                        @endif
                                                                         
                                    </td>
                                </tr>
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
<script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        var table = $('#sales_listing').DataTable({
            responsive: true,
            language: {
                "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
            },
            dom:
			"<'row'<'col-sm-2'l><'col-sm-7 text-right'B><'col-sm-3'f>>" +
			"<'row'<'col-sm-12'tr>>" +
			"<'row'<'col-sm-5'i><'col-sm-7'p>>", 
            buttons: [
                {
                    text: '<i class="fas fa-plus"></i> Nuevo',
                    className: 'btn btn-info',
                    action: function ( e, dt, node, conf ) {
                        window.location.href = "{{route('sales.create')}}"
                    }
                }
            ]
        });
    });
</script>
@endsection
