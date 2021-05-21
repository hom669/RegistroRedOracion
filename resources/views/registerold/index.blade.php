@extends('adminlte::page')

@section('title', 'Registros Antiguos Red Oración')

@section('content_header')
    <h1>Administracion de Registros Antiguos</h1>
@stop
<?php //dd($registrosold);?>
@section('content')
<a href="registerOld\create" class="btn btn-success">Crear Nuevo Registro Antiguos</a><br><br>
<table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
        <thead>
            <tr>
                <th>N°</th>
                <th>Monitor de Oración</th>
                <th>Nombres y Apellidos</th>
                <th>Telefonos</th>
                <th>Edad</th>
                <th>Fecha Nacimiento</th>
                <th>Iglesia</th>
                <th>Lugar</th>
                <th>Ministerio</th>
                <th>Tiempo Convertido</th>
                <th>Franja</th>
                <th>Correo Electronico</th>
                <th>Encuentro de Oración</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            @foreach($registrosold as $reg)
                <tr>
                    <td>{{ $i }}</td>
                    <td>{{ $reg->name_monitor }}</td>
                    <td>{{ $reg->name_lastname }}</td>
                    <td>{{ $reg->telephones }}</td>
                    <td>{{ $reg->age }}</td>
                    <td>{{ $reg->date_birthday}}</td>
                    <td>{{ $reg->church }}</td>
                    <td>{{ $reg->name_departamento."-".$reg->nombre_ciudad."".$reg->place }}</td>
                    <td>{{ $reg->ministery }}</td>
                    <td>{{ $reg->time_converted." ".$reg->name_tipotiempo }}</td>
                    <td>{{ $reg->franja }}</td>
                    <td>{{ $reg->email }}</td>
                    <td>{{ $reg->ciudad_encuentro." Fecha Encuentro ".$reg->date_encuentro }}</td>

                    <td>
                        <a href="registerOld\edit\{{ $reg->idregisterold }}" class="btn btn-primary">
                            <span class="fas fa-fw fa-edit"></span>
                        </a>
                    </td>
                    <td>
                        <a href="registerOld\confirmdestroy\{{ $reg->idregisterold }}" type="button" class="btn btn-danger">
                            <span class="fas fa-fw fa-trash-alt"></span>
                        </a>
                    </td>
                </tr>

                <?php $i++; ?>
            @endforeach
            
        </tbody>
        <tfoot>
            <tr>
                <th>N°</th>
                <th>Monitor de Oración</th>
                <th>Nombres y Apellidos</th>
                <th>Telefonos</th>
                <th>Edad</th>
                <th>Fecha Nacimiento</th>
                <th>Iglesia</th>
                <th>Lugar</th>
                <th>Ministerio</th>
                <th>Tiempo Convertido</th>
                <th>Franja</th>
                <th>E-mail</th>
                <th>Encuentro de Oración</th>
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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css">
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <style>
        .dt-button.buttons-csv.buttons-html5{
            display: inline-block;
            font-weight: 400;
            color: #212529;
            text-align: center;
            vertical-align: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            background-color: transparent;
            border: 1px solid transparent;
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            line-height: 1.5;
            border-radius: 0.25rem;
            transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
            color: #fff;
            background-color: #619778;
            border-color: #619778;
            box-shadow: none;
        }

        .dt-button.buttons-excel.buttons-html5{
            display: inline-block;
            font-weight: 400;
            color: #212529;
            text-align: center;
            vertical-align: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            background-color: transparent;
            border: 1px solid transparent;
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            line-height: 1.5;
            border-radius: 0.25rem;
            transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
            color: #fff;
            background-color: #3c9c66;
            border-color: #3c9c66;
            box-shadow: none;
        }

        .dt-button.buttons-pdf.buttons-html5{
            display: inline-block;
            font-weight: 400;
            color: #212529;
            text-align: center;
            vertical-align: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            background-color: transparent;
            border: 1px solid transparent;
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            line-height: 1.5;
            border-radius: 0.25rem;
            transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
            color: #fff;
            background-color: #9c3c3c;
            border-color: #9c3c3c;
            box-shadow: none;
        }

    </style>
@stop

@section('js')
    <script src="{{ 'js/app.js'}}" defer></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/plug-ins/1.10.22/i18n/Spanish.json"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>

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
                dom: 'Bfrtip',
                buttons: [
            {
                extend: 'excelHtml5',
                exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11 ]
                }
            },
            {
                extend: 'pdf',
                exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11 ]
                }
            },
   
        ]
 
        });

    });

    </script>
    
@stop