@extends('layouts.default')

@section('content')

    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <div class="container">

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row">
            <div class="col-md-8 my-auto">
                <h1>Crear documento</h1>
            </div>
            <div class="col-md-4 text-right my-auto">
                <a class="btn btn-primary btn-lg btn-larger" href="/documentos"> VOLVER</a>
            </div>
        </div>
        <p class="m-t-10 m-b-20 mw-80">Para registrar un nuevo usuario por favor llene el siguiente formulario.</p>
        <form class="mt-3" action="/documentos" method="POST" role="form">
            @csrf

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group form-group-default required ">
                        <label>Solicitar firmas:</label>
                        <select name="id_usuarios" id="id_usuarios" class="full-width"
                            data-placeholder="Seleccione firmantes" data-init-plugin="select2" multiple="multiple">
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->nombres_usuario }}
                                    {{ $user->apellidos_usuario }}</option>
                            @endforeach
                        </select>
                        <input type="text" hidden class="d-none" id="usersarray" name="usersarray">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card-body no-scroll card-toolbar">
                        <h5>Quill Editor</h5>
                        <div class="quill-wrapper">
                            <div id="quill"></div>
                        </div>
                        <textarea name="document_body" id="document_body" hidden class="d-none"></textarea>
                    </div>
                </div>
            </div>

            <div class="row my-3">
                <div class="col text-center">
                    <button type="submit" class="btn btn-primary btn-lg btn-larger" id="submitButton">Crear</button>
                </div>
            </div>
        </form>
    </div>

    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script>
        var toolbarOptions = [
            ['bold', 'italic', 'underline', 'strike'], // toggled buttons
            ['blockquote', 'code-block'],

            [{
                'header': 1
            }, {
                'header': 2
            }], // custom button values
            [{
                'list': 'ordered'
            }, {
                'list': 'bullet'
            }],
            [{
                'script': 'sub'
            }, {
                'script': 'super'
            }], // superscript/subscript
            [{
                'indent': '-1'
            }, {
                'indent': '+1'
            }], // outdent/indent
            [{
                'direction': 'rtl'
            }], // text direction

            [{
                'size': ['small', false, 'large', 'huge']
            }], // custom dropdown
            [{
                'header': [1, 2, 3, 4, 5, 6, false]
            }],

            [{
                'color': []
            }, {
                'background': []
            }], // dropdown with defaults from theme
            [{
                'font': []
            }],
            [{
                'align': []
            }],

            ['clean'] // remove formatting button
        ];
        var quill = new Quill('#quill', {
            modules: {
                toolbar: toolbarOptions
            },
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
            }
        });
        $(document).ready(function() {
            $('#id_usuarios').select2();
        });

        $('#id_usuarios').on('change', function(e) {
            let selectedArray = $('#id_usuarios').select2('data');
            if (selectedArray.length > 0) {
                let options = '';
                selectedArray.forEach(element => {
                    console.log(element);
                    options += element.id + " ";
                    console.log(options);
                });
                $('#usersarray').val(options);
            }
            else{
                $('#usersarray').val('');
            }

        });
    </script>


@endsection
