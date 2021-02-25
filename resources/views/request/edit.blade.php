@extends('adminlte::page')

@section('title', 'Solicitudes')

@section('content_header')
    <h1>Edicion de Solicitudes</h1>
@stop

@section('content')

<form action="\requests\update\{{$solicitudedit[0]['id']}}" method="POST">
@csrf
  <div class="form-group">
    <label for="nombre">Nombre</label>
    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="{{$solicitudedit[0]['name']}}">
  </div>
  <div class="form-group">
    <label for="identificacion">Identificacion</label>
    <input type="text" class="form-control" id="identificacion" name="identificacion" placeholder="Identificacion" value="{{$solicitudedit[0]['identificacion']}}">
  </div>
  <div class="form-group">
    <label for="ValorSolicitud">Valor Solicitud</label>
    <input type="text" class="form-control" id="ValorSolicitud" name="ValorSolicitud" placeholder="Valor Solicitud" value="{{$solicitudedit[0]['valuerequest']}}">
  </div>
  <div class="form-group">
    <label for="edad">Edad</label>
    <input type="text" class="form-control" id="edad" name="edad" placeholder="Edad" value="{{$solicitudedit[0]['age']}}">
  </div>
  <div class="form-group">
    <label for="direccion">Dirección</label>
    <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Dirección" value="{{$solicitudedit[0]['address']}}"> 
  </div>
  <div class="form-group">
    <label for="selectCompany">Compañias</label>
    <select class="form-control" id="selectCompany" name="selectCompany" value="{{$solicitudedit[0]['idcompany']}}">

        @for ($i = 0; $i < count($companys); $i++)
            T<option value="{{$companys[$i]['id']}}">{{$companys[$i]['name']}}</ption>
        @endfor
    </select>
  </div>
  <div class="form-group">
        <button type="submit" class="btn btn-success">
            <span class="fas fa-fw fa-plus"></span> Editar
        </button>

        <a href="/requests" type="button" class="btn btn-secondary">
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
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
@stop

@section('js')
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/plug-ins/1.10.22/i18n/Spanish.json"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        } );
    </script>
    
@stop