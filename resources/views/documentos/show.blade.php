@extends('layouts.default')

@section('content')

    <link type="text/css" href="{{ asset('assets/quillEditor/quill.snow.css') }}" rel="stylesheet"> 
    <div class="container">

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Ups!</strong> Hubo problemas con los campos<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row">
            <div class="col-md-8 my-auto">
                <h1>Ver documento</h1>
            </div>
            <div class="col-md-4 text-right my-auto">
                @if ($documento->aprobado)
                    <button class="btn btn-primary btn-lg btn-larger"><i class="pg-icon">tick_circle</i>YA APROBADO</button>
                @else
                    <a class="btn btn-primary btn-lg btn-larger" href="/documentos/{{ $documento->id }}/approve">APROBAR</a>    
                @endif
                <a class="btn btn-primary btn-lg btn-larger" href="/documentos"> VOLVER</a>
            </div>
        </div>
        <p class="m-t-10 m-b-20 mw-80">Para editar el documento por favor llene el siguiente formulario.</p>
        <form class="mt-3" role="form">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group form-group-default required ">
                        <label>Membrete:</label>
                        <select name="id_cabecera" id="id_cabecera" class="full-width form-element " data-init-plugin="select2">
                            <option></option>
                            @foreach ($cabeceras as $cabecera)
                                <option value="{{ $cabecera->id }}">{{ $cabecera->nombre_cabecera }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group form-group-default ">
                        <label>Descripcion:</label>
                        <textarea name="descripcion_documento" id="descripcion_documento" rows="1"class="full-width form-element form-control ">{{$documento->descripcion_documento}}</textarea>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group form-group-default required ">
                        <label>Solicitar firmas:</label>
                        <select name="id_usuarios" id="id_usuarios" class="full-width"
                            data-placeholder="Seleccione firmantes" data-init-plugin="select2" multiple="multiple">
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">
                                    {{ $user->primer_nombre_usuario }} {{ $user->segundo_nombre_usuario }} {{ $user->primer_apellido_usuario }} {{ $user->segundo_apellido_usuario }}
                                </option>
                            @endforeach
                        </select>
                        <input type="text" hidden class="d-none" id="usersarray" name="usersarray">
                    </div>
                </div>
            </div>
            <div class="row my-3">
                <div class="col-md-12">
                    <div class="card-body no-scroll card-toolbar">
                        <h5>Cuerpo del documento</h5>
                        <div class="quill-wrapper">
                            <div id="quill"></div>
                        </div>
                        <textarea name="document_body" id="document_body" hidden class="d-none"></textarea>
                        <textarea name="document_body_unformatted" id="document_body_unformatted" hidden class="d-none"></textarea>
                    </div>
                </div>
            </div>

        </form>
    </div>
    <script type="text/javascript" src="{{ asset('assets/quillEditor/quill.js') }}"></script>
    <script>
        var quill = new Quill('#quill', {
            
            placeholder: 'Type here...',
            theme: 'snow'
        });
        //Avoid Quick Search Toggle
        quill.on('selection-change', function(range, oldRange, source) {
            if (range === null && oldRange !== null) {
                $('body').removeClass('overlay-disabled');
            } else if (range !== null && oldRange === null) {
                $('body').addClass('overlay-disabled');
            }
        });

        function quillGetHTML(inputDelta) {
            var tempCont = document.createElement("div");
            (new Quill(tempCont)).setContents(inputDelta);
            return tempCont.getElementsByClassName("ql-editor")[0].innerHTML;
        }

        quill.on('text-change', function(delta, oldDelta, source) {
            if (source == 'user') {
                var delta = quill.getContents();
                console.log(quillGetHTML(delta));
                $('#document_body').val(quillGetHTML(delta));
                $('#document_body_unformatted').val(JSON.stringify(delta));
            }
        });
        
        $(document).ready(function() {
            var usersSelect = $('#id_usuarios').select2();
            var delta = JSON.parse({!! $documento->bodyJson !!});
            quill.setContents(delta);
            usersSelect.val({!! $selectedUsers !!}).trigger("change");
            $("#id_cabecera").val('{{$documento->cabecera_id}}').trigger("change");
        });

        $('#id_usuarios').on('change', function(e) {
            let selectedArray = $('#id_usuarios').select2('data');
            if (selectedArray.length > 0) {
                let options = '';
                selectedArray.forEach(element => {
                    options += element.id + " ";
                });
                $('#usersarray').val(options);
            }
            else{
                $('#usersarray').val('');
            }

        });
    </script>


@endsection
