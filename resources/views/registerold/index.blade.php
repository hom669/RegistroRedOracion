@extends('adminlte::page')

@section('title', 'Registros Antiguos Red Oración')

@section('content_header')
    <h1>Administracion de Registros Antiguos</h1>
@stop
<?php
//dd($registrosold);
?>
@section('content')
    <a href="registerOld\create" class="btn btn-success">Crear Nuevo Registro Antiguos</a><br><br>
    {{-- <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
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
            @foreach ($registrosold as $reg)
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
    </table> --}}

    {{-- <div class="example-wrapper">
        <div class="grid-wrapper">
            <div id="myGrid" class="ag-theme-alpine" style="width: 1200px; height:800px;">
            </div>
        </div>
    </div> --}}

    <div class="example-wrapper">
        <div class="example-header">
            <input type="text" id="filter-text-box" placeholder="Buscar..." oninput="onFilterTextBoxChanged()">
        </div>
        <div id="myGrid" class="ag-theme-alpine" style="width: 1200px; height:800px;">
        </div>
    </div>
@stop

@section('css')
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <link rel="stylesheet" href="https://unpkg.com/ag-grid-community/dist/styles/ag-grid.css">
    <link rel="stylesheet" href="https://unpkg.com/ag-grid-community/dist/styles/ag-theme-alpine.css">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <style>
        .dt-button.buttons-csv.buttons-html5 {
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

        .dt-button.buttons-excel.buttons-html5 {
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

        .dt-button.buttons-pdf.buttons-html5 {
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
    <script src="{{ 'js/app.js' }}" defer></script>
    <script src="https://unpkg.com/ag-grid-community/dist/ag-grid-community.min.noStyle.js"></script>


    <script type="text/javascript" charset="utf-8">
        // specify the columns
        var filterParams = {
            comparator: function(filterLocalDateAtMidnight, cellValue) {
                var dateAsString = cellValue;
                if (dateAsString == null) return -1;
                var dateParts = dateAsString.split('/');
                var cellDate = new Date(
                    Number(dateParts[2]),
                    Number(dateParts[1]) - 1,
                    Number(dateParts[0])
                );

                if (filterLocalDateAtMidnight.getTime() === cellDate.getTime()) {
                    return 0;
                }

                if (cellDate < filterLocalDateAtMidnight) {
                    return -1;
                }

                if (cellDate > filterLocalDateAtMidnight) {
                    return 1;
                }
            },
            // browserDatePicker: true,
        };

        var columnDefs = [   
            {
                field: 'idregisterold',
                headerName: 'Editar',
                cellRenderer: function(params) {
                    let keyData = params.data.idregisterold;
                    let newLink = `<a href="registerOld\\edit\\${keyData}" class="btn btn-primary">
                            <span class="fas fa-fw fa-edit"></span>
                        </a>`;
                    return newLink;
                },
                flex: 1,
            },
            {
                field: 'idregisterold',
                headerName: 'Eliminar',
                cellRenderer: function(params) {
                    let keyData = params.data.idregisterold;
                    let newLink = ` <a href="registerOld\\confirmdestroy\\${keyData}" type="button" class="btn btn-danger">
                            <span class="fas fa-fw fa-trash-alt"></span>
                        </a>`;
                    return newLink;
                },
                flex: 1,
            },
            
            {
                headerName: "Fecha Encuentro",
                field: "date_encuentro",
                filter: 'agTextColumnFilter'
            },
            {
                headerName: "Ciudad Encuentro",
                field: "ciudad_encuentro",
                filter: 'agTextColumnFilter'
            },
            {
                headerName: "Departamento Encuentro",
                field: "departamento_encuentro",
                filter: 'agTextColumnFilter'
            },
            {
                headerName: "Nombre Monitor",
                field: "name_monitor",
                filter: 'agTextColumnFilter'
            },
            {
                headerName: "Nombre Persona",
                field: "name_lastname",
                filterType: 'text',
                filter: 'agTextColumnFilter'
            },
            {
                headerName: "Telefono",
                field: "telephones",
                filter: 'agTextColumnFilter'
            },
            {
                headerName: "Edad",
                field: "age",
                filter: 'agNumberColumnFilter'
            },
            {
                headerName: "Fecha Cumpleaños",
                field: "date_birthday",
                filters: filterParams
            },
            {
                headerName: "Iglesia",
                field: "church",
                filter: 'agTextColumnFilter'
            },
            {
                headerName: "Ministerio",
                field: "ministery",
                filter: 'agTextColumnFilter'
            },
            {
                headerName: "Tiempo Converito",
                field: "time_converted",
                filter: 'agNumberColumnFilter'
            },
            {
                headerName: "Lugar Residencia",
                field: "place",
                filter: 'agTextColumnFilter'
            }
            
        ];
        var autoGroupColumnDef = {
            headerName: "Model",
            field: "model",
            cellRenderer: 'agGroupCellRenderer',
            cellRendererParams: {
                checkbox: true
            }
        }

        // let the grid know which columns and what data to use
        var gridOptions = {
            columnDefs: columnDefs,
            defaultColDef: {
                flex: 1,
                minWidth: 150,
                filter: true,
                sortable: true,
            },
            enableSorting: true,
            enableFilter: true,
            autoGroupColumnDef: autoGroupColumnDef,
            groupSelectsChildren: true,
            rowSelection: 'multiple'
        };

        var savedFilterModel = null;

        function clearFilters() {
            gridOptions.api.setFilterModel(null);
        }

        function saveFilterModel() {
            savedFilterModel = gridOptions.api.getFilterModel();

            var keys = Object.keys(savedFilterModel);
            var savedFilters = keys.length > 0 ? keys.join(', ') : '(none)';

            document.querySelector('#savedFilters').innerHTML = savedFilters;
        }

        function restoreFilterModel() {
            gridOptions.api.setFilterModel(savedFilterModel);
        }

        function restoreFromHardCoded() {
            var hardcodedFilter = {
                country: {
                    type: 'set',
                    values: ['Ireland', 'United States'],
                },
                age: {
                    type: 'lessThan',
                    filter: '30'
                },
                athlete: {
                    type: 'startsWith',
                    filter: 'Mich'
                },
                date: {
                    type: 'lessThan',
                    dateFrom: '2010-01-01'
                },
            };

            gridOptions.api.setFilterModel(hardcodedFilter);
        }

        function destroyFilter() {
            gridOptions.api.destroyFilter('athlete');
        }


        function onFilterTextBoxChanged() {
            gridOptions.api.setQuickFilter(document.getElementById('filter-text-box').value);
        }

        function onPrintQuickFilterTexts() {
            gridOptions.api.forEachNode(function(rowNode, index) {
                console.log('Row ' + index + ' quick filter text is ' + rowNode.quickFilterAggregateText);
            });
        }

        function onQuickFilterTypeChanged() {
            var rbCache = document.querySelector('#cbCache');
            var cacheActive = rbCache.checked;
            console.log('using cache = ' + cacheActive);
            gridOptions.cacheQuickFilter = cacheActive;

            // set row data again, so to clear out any cache that might of existed
            gridOptions.api.setRowData(createRowData());
        }

        // setup the grid after the page has finished loading
        document.addEventListener('DOMContentLoaded', function() {
            var gridDiv = document.querySelector('#myGrid');
            new agGrid.Grid(gridDiv, gridOptions);

            agGrid.simpleHttpRequest({
                    url: 'https://localhost/RegistroRedOracion/public/api/get-registers'
                })
                .then(function(data) {
                    gridOptions.api.setRowData(data);
                });
        });

        /* var autoGroupColumnDef = {
                            headerName: "Model",
                            field: "model",
                            cellRenderer:'agGroupCellRenderer',
                            cellRendererParams: {
                                checkbox: true
                            }
                        }

                        // let the grid know which columns and what data to use
                        var gridOptions = {
                            columnDefs: columnDefs,
                            enableSorting: true,
                            enableFilter: true,
                            autoGroupColumnDef: autoGroupColumnDef,
                            groupSelectsChildren: true,
                            rowSelection: 'multiple'
                        };

                        // lookup the container we want the Grid to use
                        var eGridDiv = document.querySelector('#myGrid');

                        // create the grid passing in the div to use together with the columns & data we want to use
                        new agGrid.Grid(eGridDiv, gridOptions);

                        fetch('http://127.0.0.1:8000/api/get-registers').then(function(response) {
                            return response.json();
                        }).then(function(data) {
                            gridOptions.api.setRowData(data);
                        })
         */

    </script>


@stop
