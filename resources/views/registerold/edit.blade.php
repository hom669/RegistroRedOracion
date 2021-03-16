<?php 
$fechacumple = $registerOld[0]['date_birthday'];
$fechaseparada = explode('-', $fechacumple);

$año = $fechaseparada[0];
$mes = $fechaseparada[1];
$dia = $fechaseparada[2];
?>
@extends('adminlte::page')

@section('title', 'Solicitudes')

@section('content_header')
    <h1>Edición de Registros Antiguos</h1>
@stop

@section('content')

<form action="..\update\{{$registerOld[0]['idregisterold']}}" method="POST">
@csrf

<div class="form-row">
  <div class="form-group col-md-6">
    <label for="idencuentro">Encuentro de Oración</label>
<select class="form-control" id="idencuentro" name="idencuentro">
  
    <br>
        <option value="0" selected>Seleccion un Encuentro de Oración</option>
        @for ($i = 0; $i < count($encuentros); $i++)
            <option value="{{$encuentros[$i]['idencuentro']}}">{{$encuentros[$i]['nombre_ciudad']." Fecha del Encuentro ".$encuentros[$i]['date_encuentro']}}</option>
        @endfor
</select>
</div>
</div>

<div class="form-row">

  <div class="form-group col-md-6">
    <label for="idmonitor">Monitor de Oración</label>
    <br>
    <div class="col-xs-8">
    <select class="form-control" id="idmonitor" name="idmonitor">
      <option value="0" selected>Seleccion un Monitor</option>
        @for ($i = 0; $i < count($monitores); $i++)
          <?php if($monitores[$i]['idmonitor'] == $registerOld[0]['idmonitor']){
            ?>
            <option value="{{$monitores[$i]['idmonitor']}}" selected>{{$monitores[$i]['name_monitor']}}</option>
            <?php
          }else{
            ?>
            <option value="{{$monitores[$i]['idmonitor']}}">{{$monitores[$i]['name_monitor']}}</option>
            <?php
          } ?>
            
        @endfor
    </select>
  </div>
  </div>

  <div class="form-group col-md-6">
    <label for="name_lastname">Nombres y Apellidos</label>
    <input type="text" class="form-control" id="name_lastname" name="name_lastname" value="{{$registerOld[0]['name_lastname']}}" placeholder="Nombres y Apellidos">
    @error('name_lastname')
    <div class="alert alert-danger">{{ $message }}</div>
  @enderror
  </div>
</div>



<div class="form-row">

  <div class="form-group col-md-6">
    <label for="telephones">Telefonos</label>
    <input type="text" class="form-control" id="telephones" name="telephones" value="{{$registerOld[0]['telephones']}}" placeholder="Telefonos">
    @error('telephones')
    <div class="alert alert-danger">{{ $message }}</div>
  @enderror
  </div>

  <div class="form-group col-md-6">
    <label for="age">Edad</label>
    <input type="text" class="form-control" id="age" name="age" value="{{$registerOld[0]['age']}}" placeholder="Edad">
    @error('age')
    <div class="alert alert-danger">{{ $message }}</div>
  @enderror
  </div>

</div>

<div class="form-row">

  <div class="form-group col-md-6">
    <label for="date_birthday">Fecha Nacimiento</label>

    <div class="form-row">
      <div class="col">
        <input type="number" class="date form-control" id="day_birthady" name="day_birthady" value="{{ $dia }}" placeholder="DIA">
      </div>
      <div class="col">
        <input type="number" class="date form-control" id="month_birthday" name="month_birthday" value="{{ $mes}}" placeholder="MES">        
      </div>
      <div class="col">
        <input type="number" class="date form-control" id="year_birthday" name="year_birthday" value="{{ $año }}" placeholder="AÑO">
      </div>
    </div>
    
    
  </div>

  <div class="form-group col-md-6">
    <label for="church">Iglesia</label>
    <input type="text" class="form-control" id="church" name="church" value="{{$registerOld[0]['church']}}" placeholder="Iglesia">
  </div>

</div>

<div class="form-row">

  <div class="form-group col-md-6">
    <label for="place">Lugar</label>
    <input type="text" class="form-control" id="place" name="place" value="{{ $registerOld[0]['place'] }}"  placeholder="Iglesia">
    <br>    <!-- <select class="form-control" id="idplace" name="idplace">
      <option value="0" selected>Seleccion un Lugar</option>
        @for ($i = 0; $i < count($citys); $i++)
        <?php if($citys[$i]['id_ciudad'] == $registerOld[0]['idplace']){
          ?>
          <option value="{{$citys[$i]['id_ciudad']}}" selected>{{$citys[$i]['name_departamento']."-".$citys[$i]['nombre_ciudad']}}</option>
          <?php
        }else{
          ?>
          <option value="{{$citys[$i]['id_ciudad']}}">{{$citys[$i]['name_departamento']."-".$citys[$i]['nombre_ciudad']}}</option>
          <?php
        } ?>
            
        @endfor
    </select> -->

  </div>

  <div class="form-group col-md-6">
    <label for="ministery">Ministerio</label>
    <input type="text" class="form-control" id="ministery" name="ministery" value="{{$registerOld[0]['ministery']}}" placeholder="Ministerio">
  </div>

</div>


<div class="form-row">

  <div class="form-group col-md-6">
    <label for="time_converted">Tiempo Convertido</label>
    <input type="text" class="form-control" id="time_converted" name="time_converted" value="{{$registerOld[0]['time_converted']}}" placeholder="Tiempo Compartido">
    @error('time_converted')
    <div class="alert alert-danger">{{ $message }}</div>
  @enderror
  </div>

  <div class="form-group col-md-6">
    <label for="idtipotiempo"><br></label>
    <select class="form-control" id="idtipotiempo" name="idtipotiempo">
      <option value="0" selected>Seleccion un Tipo de Tiempo</option>
      @for ($i = 0; $i < count($tipoTiempo); $i++)
      <?php if($tipoTiempo[$i]['idtipotiempo'] == $registerOld[0]['idtipotiempo']){
        ?>
        <option value="{{$tipoTiempo[$i]['idtipotiempo']}}" selected>{{$tipoTiempo[$i]['name_tipotiempo']}}</option>
        <?php
      }else{
        ?>
        <option value="{{$tipoTiempo[$i]['idtipotiempo']}}">{{$tipoTiempo[$i]['name_tipotiempo']}}</option>
        <?php
      } ?>
      @endfor
    </select>
  </div>

</div>

<div class="form-row">

  <div class="form-group col-md-6">
    <label for="franja">Franja</label>
    <input type="text" class="form-control" id="franja" name="franja" value="{{$registerOld[0]['franja']}}" placeholder="Franja">
  </div>

  <div class="form-group col-md-6">
    <label for="email">Correo Electronico</label>
    <input type="text" class="form-control" id="email" name="email" value="{{$registerOld[0]['email']}}" placeholder="Correo Electronico">
    @error('email')
    <div class="alert alert-danger">{{ $message }}</div>
  @enderror
  </div>

</div>

  <div class="form-group">
        <button type="submit" class="btn btn-danger">
            <span class="fas fa-fw fa-plus"></span> Editar
        </button>

        <a href="../" type="button" class="btn btn-secondary">
            <span class="fas fa-fw fa-times"></span> Cancelar
        </a>
  </div>
 
</form>
@stop

@section('css')
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css" rel="stylesheet">
    <!-- Styles -->
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

          $('#idencuentro').val(<?php echo $registerOld[0]['idencuentro'] ?>);
          $("#idencuentro").select2();

          $('#idmonitor').val(<?php echo $registerOld[0]['idmonitor'] ?>);
          $("#idmonitor").select2();
          $('#idplace').val(<?php echo $registerOld[0]['idplace']  ?>);
          $("#idplace").select2();
          $('#idtipotiempo').val(<?php echo $registerOld[0]['idtipotiempo']  ?>);
          $("#idtipotiempo").select2();

          $("#date_birthday").pickadate({
            selectYears: true,
            selectMonths: true,
            selectYears: 50,
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