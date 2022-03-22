@extends('layouts.admin')
@section('title','Registrar cliente')
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
            Registro de clientes
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-custom">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('clients.index')}}">Clientes</a></li>
                <li class="breadcrumb-item active" aria-current="page">Registro de clientes</li>
            </ol>
        </nav>
    </div>
    
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    {!! Form::open(['route'=>'clients.consult.dni', 'method'=>'POST']) !!}
                    @include('admin.client._form1',[
                        'client' => new \App\Models\User(),
                        'btnText' => 'Consultar',
                    ])
                    <input type="text" id="doc" class="d-none" name="doc">
                     {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div> 

    

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    {!! Form::open(['route'=>'clients.store', 'method'=>'post','files' => true]) !!}
                    @include('admin.client._form',[
                        'client' => new \App\Models\User(),
                        'btnText' => 'Registrar',
                    ])
                    
                     {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    
</div>
@endsection
@section('scripts')
{!! Html::script('melody/js/data-table.js') !!}

<script>
    var documento1 = $('#documento1');
	
    documento1.change(function(){
        if(documento1.val()==1){
            $('#doc').val('dni');
        }
        else if(documento1.val()==2){
            $('#doc').val('ruc');
        }
    });
</script>

@endsection
