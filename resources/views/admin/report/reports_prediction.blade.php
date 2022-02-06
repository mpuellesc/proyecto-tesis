@extends('layouts.admin')
@section('title','Panel administrador')
@section('styles')
<style type="text/css">
    .unstyled-button {
        border: none;
        padding: 0;
        background: none;
    }

</style>
@endsection
@section('options')
@endsection
@section('preference')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            Proyección de ventas
        </h3>
    </div>  

  <div class="row">
    <div class="col-md-11 align-right"></div>
      <div class="align-left">
        <button class="btn-primary">Descargar</button>
      </div>
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Predicción de ventas por día</h4>
          <div id="c3-proyeccion-dia"></div>
        </div>
      </div>
    </div>
  </div>
  <button class="btn-primary" onclick="generatePDF()">Descargar</button>
    <div class="row" id="premes">
      <div class="col-md-11 align-right"></div>
      <div class="align-left">
        
      </div>
      
      <div class="col-md-12 grid-margin stretch-card" >
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Predicción de ventas por mes</h4>
            <div id="c3-proyeccion-mes"></div>
          </div>
        </div>
      </div></div>
</div>

@endsection
@section('scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
{!! Html::script('melody/js/data-table.js') !!}
{!! Html::script('melody/js/chart.js') !!}

<script>
  function generatePDF(){
    const $elementoParaConvertir = document.getElementById('premes'); // <-- Aquí puedes elegir cualquier elemento del DOM
    html2pdf()
    .set({
        margin: 1,
        filename: 'documento.pdf',
        image: {
            type: 'jpeg',
            quality: 0.98
        },
        html2canvas: {
            scale: 3, // A mayor escala, mejores gráficos, pero más peso
            letterRendering: true,
        },
        jsPDF: {
            unit: "in",
            format: "a3",
            orientation: 'portrait' // landscape o portrait
        }
    })
    .from($elementoParaConvertir)
    .save()
    .catch(err => console.log(err));
  }
</script>


<script>
    $(function(){
      var chart = c3.generate({
            bindto: '#c3-proyeccion-dia',
            data: {
                columns: [
                  ['Predicción', <?php for($i=0; $i<$ventasdia->count()+7; $i++)
                      {echo ''. $prediccion[$i].',';} ?>],
                  ['Ventas', <?php foreach ($ventasdia as $reg)
                        {echo ''. $reg->count.',';} ?>]
                ],
                type: 'spline'
            },
            axis: {
                x: {
                    type: 'category',
                    categories: [<?php foreach ($ventasdia as $ventadia)
                    {$dia = $ventadia->date;
                    echo '"'. $dia.'",';} ?> '5th February 2022', '6th February 2022', '7th February 2022','8th February 2022', '9th February 2022', '10th February 2022', '11th February 2022']
                }

            },
            
      });

      var chart = c3.generate({
            bindto: '#c3-proyeccion-mes',
            data: {
                columns: [
                  ['Predicción', <?php for($i=0; $i<$ventasmes->count()+7; $i++)
                      {echo ''. $prediccionmes[$i].',';} ?>],
                  ['Ventas', <?php foreach ($ventasmes as $reg)
                        {echo ''. $reg->count.',';} ?>]
                ],
                type: 'spline'
            },
            axis: {
                x: {
                    type: 'category',
                    categories: [<?php foreach ($ventasmes as $ventames)
                    {$mes = $ventames->mes;
                    echo '"'. $mes.'",';} ?> 'March 2022', 'April 2022','May 2022', 'June 2022', 'July 2022', 'August 2022', 'September 2022']
                }

            },
            
      });
          
    });
</script>

@endsection
