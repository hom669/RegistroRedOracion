@extends('adminlte::page')

@section('title', 'Solicitudes')

@section('content_header')
    <h1>Administracion de Solicitudes</h1>
@stop

@section('content')

<form action="store" method="POST">
@csrf
  <div class="form-group">
    <label for="nombre">Nombre</label>
    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre">
  </div>
  <div class="form-group">
    <label for="identificacion">Identificacion</label>
    <input type="text" class="form-control" id="identificacion" name="identificacion" placeholder="Identificacion">
  </div>
  <div class="form-group">
    <label for="ValorSolicitud">Valor Solicitud</label>
    <input type="text" class="form-control" id="ValorSolicitud" name="ValorSolicitud" placeholder="Valor Solicitud">
  </div>
  <div class="form-group">
    <label for="edad">Edad</label>
    <input type="text" class="form-control" id="edad" name="edad" placeholder="Edad">
  </div>
  <div class="form-group">
    <label for="direccion">Dirección</label>
    <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Dirección">
  </div>
  <div class="form-group">
    <label for="selectCompany">Compañias</label>
    <select class="form-control" id="selectCompany" name="selectCompany">

        @for ($i = 0; $i < count($companys); $i++)
            T<option value="{{$companys[$i]['id']}}">{{$companys[$i]['name']}}</ption>
        @endfor
    </select>
  </div>
  <div class="form-group">
        <button type="submit" class="btn btn-success">
            <span class="fas fa-fw fa-plus"></span> Guardar
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
    <link rel="stylesheet" href="{{ asset(('css/app.css') }}">
@stop

@section('js')
    <script src="{{ 'js/app.js' }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/plug-ins/1.10.22/i18n/Spanish.json"></script>
    <script src="{{ 'js/readyDocument.js' }}" defer></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        } );
    </script>
    
@stop