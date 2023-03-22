@extends('layouts.default')
@section('content')
    <style>
        .exportOptions{
            display: none !important;
        }
    </style>

    <?php $user = Auth::user(); ?>
    <div class="container">
        <div class="row mb-3">
            <div class="col-lg-8 margin-tb my-auto">
                <h1>Gestión de Documentos</h1>
            </div>
            <div class="col-4 text-right my-auto">
                <a class="btn btn-primary btn-lg btn-larger" href="/documentos/create">Crear Documento</a>
            </div>
        </div>

        <div class="row mb-0">
            <div class="col-lg-8 margin-tb my-auto">
                <h3>{{$title}}</h3>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="table-responsive">
                    <table class="table table-hover table-condensed" id="tableWithExportOptions">
                        <thead>
                            <tr>
                                <th style="width:35%">Descripcion</th>
                                <th style="width:20%">Fecha de creacion</th>
                                <th style="width:15%" class="text-center" >Aprobados</th>
                                <th style="width:15%" class="text-center" >Pendientes</th>
                                <th style="width:15%">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($documentos as $documento)
                            <tr>
                                <td class="v-align-middle semi-bold"> {{ $documento->descripcion_documento }} </td>
                                <td class="v-align-middle semi-bold"> {{ $documento->created_at }} </td>
                                <td class="v-align-middle semi-bold text-center "> {{ $documento->aprobados }} </td>
                                <td class="v-align-middle semi-bold text-center "> {{ $documento->pendientes }} </td>
                                <td class="v-align-middle d-flex">
                                    <a class="btn btn-info btn-icon-center text-white mr-1 px-1" href="/documentos/{{ $documento->id }}"><i class="pg-icon">eye</i></a>
                                    @if ($documento->aprobado && $role == "revisor")
                                        <button class="btn btn-success  mr-1 px-1"><i class="pg-icon">tick_circle</i></button>
                                    @endif
                                    @if (!$documento->aprobado && $role == "revisor")
                                        <a class="btn btn-success  mr-1 px-1" href="/documentos/{{ $documento->id }}/approve"><i class="pg-icon">tick</i></a>    
                                    @endif
                                    @if ($documento->descargar)
                                        <a class="btn btn-success  mr-1 px-1" href="/documentos/{{ $documento->id }}/download"><i class="pg-icon">download_alt</i></a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/plugins/jquery-datatable/media/js/jquery.dataTables.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/plugins/jquery-datatable/extensions/TableTools/js/dataTables.tableTools.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/plugins/jquery-datatable/media/js/dataTables.bootstrap.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/plugins/jquery-datatable/extensions/Bootstrap/jquery-datatable-bootstrap.js') }}" type="text/javascript"></script>
    <script type="{{ asset('text/javascript" src="assets/plugins/datatables-responsive/js/datatables.responsive.js') }}"></script>

    <script>
        var initTableWithExportOptions = function() {
            var table = $('#tableWithExportOptions');
            var settings = {
                "sDom": "<'exportOptions'T><'table-responsive sm-m-b-15't><'row'<p i>>",
                "destroy": true,
                "scrollCollapse": true,
                "oLanguage": {
                    "sLengthMenu": "_MENU_ ",
                    "sInfo": "Mostrando <b>_START_ al _END_</b> de _TOTAL_ registros"
                },
                "iDisplayLength": 10,
            };
            table.dataTable(settings);
        }

    initTableWithExportOptions();
    </script>
@endsection
