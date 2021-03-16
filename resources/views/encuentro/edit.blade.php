@extends('adminlte::page')

@section('title', 'Solicitudes')

@section('content_header')
    <h1>Administracion de Monitores de la Red de Oración</h1>
@stop

@section('content')

<form action="..\update\{{$encuentro[0]['idencuentro']}}" method="POST">
@csrf

<div class="d-flex flex-row-reverse">
  <img src="{{ asset('img/LOGO1.png') }}" width="200" heigth="200"/>
</div>



<div class="form-row">


  <div class="form-group col-md-6">
    <label for="idplace">Lugar del Encuentro</label>
    <select class="form-control" id="idplace" name="idplace">
      <option value="0" selected>Seleccion un Lugar del Encuentro</option>
        @for ($i = 0; $i < count($citys); $i++)
        <?php if($citys[$i]['id_ciudad'] == $encuentro[0]['place_encuentro']){
          ?>
          <option value="{{$citys[$i]['id_ciudad']}}" selected>{{$citys[$i]['name_departamento']."-".$citys[$i]['nombre_ciudad']}}</option>
          <?php
        }else{
          ?>
          <option value="{{$citys[$i]['id_ciudad']}}">{{$citys[$i]['name_departamento']."-".$citys[$i]['nombre_ciudad']}}</option>
          <?php
        } ?>
            
        @endfor
    </select>
  </div>
  
  <div class="form-group col-md-6">
    <label for="date_encuentro">Fecha Encuentro</label>
    <input type="text" class="date form-control" id="date_encuentro" name="date_encuentro" value="{{ $encuentro[0]['date_encuentro'] }}" placeholder="Fecha Encuentro">
  </div>

</div>

  <div class="form-group">
        <button type="submit" class="btn btn-success">
            <span class="fas fa-fw fa-plus"></span> Guardar
        </button>

        <a href="./" type="button" class="btn btn-secondary">
            <span class="fas fa-fw fa-times"></span> Cancelar
        </a>
  </div>
 
</form>
@stop

@section('css')
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="{{ asset('js/pickadate/lib/themes/classic.css') }}" rel="stylesheet">
<link href="{{ asset('js/pickadate/lib/themes/classic.date.css') }}" rel="stylesheet">
<link href="{{ asset('js/pickadate/lib/themes/classic.time.css') }}" rel="stylesheet">
@stop

@section('js')
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/plug-ins/1.10.22/i18n/Spanish.json"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script src="{{ asset('js/pickadate/lib/legacy.js') }}"></script>
    <script src="{{ asset('js/pickadate/lib/picker.js') }}"></script>
    <script src="{{ asset('js/pickadate/lib/picker.date.js') }}"></script>
    <script src="{{ asset('js/pickadate/lib/picker.time.js') }}"></script>
    <!-- Languaje -->

    <script src="{{ asset('js/readyDocument.js') }}" defer></script>
    <script>
        $(document).ready(function() {

          
          $('#idplace').val(<?php echo old('idplace') ?>);
          $("#idplace").select2();


          $("#date_encuentro").pickadate({
            selectYears: true,
            selectMonths: true,
            selectYears: 200,
            weekdaysShort: ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab'],            
            monthsFull: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            monthsShort: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            format: 'yyyy-mm-dd',
            formatSubmit: 'yyyy-mm-dd',
            labelMonthNext: 'Ir al proximo mes',
            labelMonthPrev: 'Ir al mes anterior',
            labelMonthSelect: 'Pick a month from the dropdown',
            labelYearSelect: 'Pick a year from the dropdown',
            showMonthsShort: true
          })

        } );

        
    </script>
    
@stop