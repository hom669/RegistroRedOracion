@extends('adminlte::page')

@section('title', 'Solicitudes')

@section('content_header')
    <h1>Administracion de Registros Antiguos</h1>
@stop


@section('content')

<form action="store" method="POST" autocomplete="off">
@csrf

<div class="d-flex flex-row-reverse">
  <img src="{{ asset('img/LOGO1.png') }}" width="200" heigth="200"/>
</div>


<div class="form-row">

  <div class="form-group col-md-6">
    <label for="idmonitor">Monitor de Oración</label>
    <br>
    <div class="col-xs-10">
      
    <select class="form-control" id="idmonitor" name="idmonitor">
        <option value="0" selected>Seleccion un Monitor</option>
        @for ($i = 0; $i < count($monitores); $i++)
            <option value="{{$monitores[$i]['idmonitor']}}">{{$monitores[$i]['name_monitor']}}</option>
        @endfor
    </select>
  </div>
  </div>
  
  <div class="form-group col-md-6">
    <label for="name_lastname">Nombres y Apellidos</label>
    <input type="text" class="form-control" id="name_lastname" name="name_lastname" value="{{ old('name_lastname') }}" placeholder="Nombres y Apellidos">
    @error('name_lastname')
      <br>
      <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>
</div>




<div class="form-row">

  <div class="form-group col-md-6">
    <label for="telephones">Telefonos</label>
    <input type="text" class="form-control" id="telephones" name="telephones" value="{{ old('telephones') }}" placeholder="Telefonos">
    @error('telephones')
      <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>

  <div class="form-group col-md-6">
    <label for="age">Edad</label>
    <input type="text" class="form-control" id="age" name="age" value="{{ old('age') }}" placeholder="Edad">
    @error('age')
      <br>
      <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>

</div>

<div class="form-row">

  <div class="form-group col-md-6">
    <label for="date_birthday">Fecha Nacimiento</label>
    <input type="text" class="date form-control" id="date_birthday" name="date_birthday" value="{{ old('date_birthday') }}" placeholder="Fecha Nacimiento">
  </div>

  <div class="form-group col-md-6">
    <label for="church">Iglesia</label>
    <input type="text" class="form-control" id="church" name="church" value="{{ old('church') }}"  placeholder="Iglesia">
  </div>

</div>

<div class="form-row">

  <div class="form-group col-md-6">
    <label for="idplace">Lugar</label>
    <br>
    <div class="col-xs-10">
    <select class="form-control" id="idplace" name="idplace">
        <option value="0" selected>Seleccion un Lugar</option>
        @for ($i = 0; $i < count($citys); $i++)
            <option value="{{$citys[$i]['id_ciudad']}}">{{$citys[$i]['name_departamento']."-".$citys[$i]['nombre_ciudad']}}</option>
        @endfor
    </select>
  </div>

  </div>

  <div class="form-group col-md-6">
    <label for="ministery">Ministerio</label>
    <input type="text" class="form-control" id="ministery" name="ministery" placeholder="Ministerio" value="{{ old('ministery') }}">
  </div>

</div>


<div class="form-row">

  <div class="form-group col-md-6">
    <label for="time_converted">Tiempo Convertido</label>
    <input type="text" class="form-control" id="time_converted" name="time_converted" value="{{old('time_converted')}}" placeholder="Tiempo Compartido">
    @error('time_converted')
      <br>
      <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>

  <div class="form-group col-md-6">
    <label for="idtipotiempo"><br></label>
    <br>
    <div class="col-xs-10">
    <select class="form-control" id="idtipotiempo" name="idtipotiempo" value="{{old('idtipotiempo')}}">
      <option value="0" selected>Seleccion un Tipo de Tiempo</option>
      @for ($i = 0; $i < count($tipoTiempo); $i++)
          <option value="{{$tipoTiempo[$i]['idtipotiempo']}}">{{$tipoTiempo[$i]['name_tipotiempo']}}</option>
      @endfor
    </select>
    </div>
  </div>

</div>

<div class="form-row">

  <div class="form-group col-md-6">
    <label for="franja">Franja</label>
    <input type="text" class="form-control" id="franja" name="franja"  value="{{old('franja')}}" placeholder="Franja">
  </div>

  <div class="form-group col-md-6">
    <label for="email">Correo Electronico</label>
    <input type="text" class="form-control" id="email" name="email" value="{{old('email')}}" placeholder="Correo Electronico">
    @error('email')
      <br>
      <div class="alert alert-danger">{{ $message }}</div>
    @enderror
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

          $('#idmonitor').val(<?php echo old('idmonitor') ?>);
          $("#idmonitor").select2();
          $('#idplace').val(<?php echo old('idplace') ?>);
          $("#idplace").select2();
          $('#idtipotiempo').val(<?php echo old('idtipotiempo') ?>);
          $("#idtipotiempo").select2();

          $("#date_birthday").pickadate({
            selectYears: true,
            selectMonths: true,
            selectYears: 50,
            weekdaysShort: ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab'],            
            monthsFull: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            monthsShort: ['En', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
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