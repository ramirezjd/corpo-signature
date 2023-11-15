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
                <h1>Notificaciones</h1>
            </div>
            <div class="col-4 text-right my-auto">
                <a class="btn btn-primary btn-lg btn-larger" href="/notificaciones/readall">Marcar todas leidas</a>
            </div>
        </div>

        <div class="row my-3">
            <div class="col">
                <div class="table-responsive">
                    <table class="table table-hover table-condensed" id="tableWithExportOptions">
                        <thead>
                            <tr>
                                <th style="width:80%">Descripcion</th>
                                <th style="width:20%">Fecha</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($notificaciones as $notificacion)
                            <tr>
                                <td class="v-align-middle semi-bold"> {{ $notificacion->data['primer_apellido_usuario'] }}
                                  {{ $notificacion->data['primer_nombre_usuario'] }}
                                  Solicitó tu revision del documento
                                  <a href="/documentos/{{$notificacion->data['documento_id'] }}">{{ $notificacion->data['descripcion_documento'] }}</a> </td>
                                  <td class="v-align-middle semi-bold"> {{ $notificacion->created_at }} </td>
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
