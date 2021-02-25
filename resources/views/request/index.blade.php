@extends('adminlte::page')

@section('title', 'Solicitudes')

@section('content_header')
    <h1>Administracion de Solicitudes</h1>
@stop

@section('content')
<a href="requests\create" class="btn btn-success">Crear Nueva Solicitud</a><br><br>
<table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Identificacion</th>
                <th>Valor Solicitdado</th>
                <th>Edad</th>
                <th>Direccion Personal</th>
                <th>Compañia</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($solicitudes as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->identificacion }}</td>
                    <td>{{ $user->valuerequest }}</td>
                    <td>{{ $user->age }}</td>
                    <td>{{ $user->address}}</td>
                    <td>{{ $user->nameCompany }}</td>
                    <td>
                        <a href="requests\edit\{{ $user->id }}" class="btn btn-primary">
                            <span class="fas fa-fw fa-edit"></span>
                        </a>
                    </td>
                    <td>
                        <a href="requests\confirmdestroy\{{ $user->id }}" type="button" class="btn btn-danger">
                            <span class="fas fa-fw fa-trash-alt"></span>
                        </a>
                    </td>
                </tr>
            @endforeach
            
        </tbody>
        <tfoot>
            <tr>
                <th>Nombre</th>
                <th>Identificacion</th>
                <th>Valor Solicitdado</th>
                <th>Edad</th>
                <th>Direccion Personal</th>
                <th>Compañia</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </tfoot>
    </table>
@stop

@section('css')
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
@stop

@section('js')
    <script src="{{ asset('js/app.js')}}" defer></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/plug-ins/1.10.22/i18n/Spanish.json"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                language: {
                    "decimal": "",
                    "emptyTable": "No hay información",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                    "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                    "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "Mostrar _MENU_ Entradas",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "search": "Buscar:",
                    "zeroRecords": "Sin resultados encontrados",
                    "paginate": {
                        "first": "Primero",
                        "last": "Ultimo",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                },
 
        });

    });

    </script>
    
@stop