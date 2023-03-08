@extends('layouts.default')

@section('content')

    <script type="text/javascript" src="{{ asset('assets/signatures/jquery.min.js') }}"></script>
    <link type="text/css" href="{{ asset('assets/signatures/jquery-ui.css') }}" rel="stylesheet"> 
    <script type="text/javascript" src="{{ asset('assets/signatures/jquery-ui.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/signatures/jquery.signature.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/signatures/jquery.signature.css') }}">
  
    <style>
        .kbw-signature { width: 100%; height: 200px;}
        #sig canvas{
            width: 100% !important;
            height: auto;
        }
    </style>

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
                <h1>Registrar Usuario</h1>
            </div>
            <div class="col-md-4 text-right my-auto">
                <a class="btn btn-primary btn-lg btn-larger" href="/usuarios"> VOLVER</a>
            </div>
        </div>
        <p class="m-t-10 m-b-20 mw-80">Para registrar un nuevo usuario por favor llene el siguiente formulario.</p>
        <form class="mt-3" action="/usuarios" method="POST" enctype="multipart/form-data" role="form">
            @csrf

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group form-group-default required ">
                        <label>Nombres</label>
                        <input type="text" id="nombres_usuario" name="nombres_usuario" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group form-group-default required ">
                        <label>Apellidos</label>
                        <input type="text" id="apellidos_usuario" name="apellidos_usuario" class="form-control" required>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group form-group-default form-group-default-select2 required">
                        <label class="">Departamento</label>
                        <select name="departamento_id" id="departamento_id" class="full-width"
                            data-placeholder="Seleccione un departamento" data-init-plugin="select2">
                            <option value=""></option>
                            @foreach ($departamentos as $departamento)
                                <option value="{{ $departamento->id }}">{{ $departamento->nombre_departamento }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group form-group-default required ">
                        <label>Documento</label>
                        <input type="text" id="documento_usuario" name="documento_usuario" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group form-group-default required ">
                        <label>Email</label>
                        <input type="email" id="email" name="email" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group form-group-default required ">
                        <label>Contraseña</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="card card-borderless">
                        <ul class="nav nav-tabs nav-tabs-simple" role="tablist" data-init-reponsive-tabs="dropdownfx">
                            <li class="nav-item">
                                <a class="active" data-toggle="tab" role="tab" data-target="#tab1Sign"
                                    href="#">Firmar</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" data-toggle="tab" role="tab" data-target="#tab2Upload">Subir Firma Como Archivo</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab1Sign">
                                <div class="row">
                                    <div class="col-md-12 text">
                                        <div id="sig" ></div>
                                        <br/>
                                        <button id="clear" class="btn btn-danger btn-sm">Limpiar firma</button>
                                        <textarea id="signature64" name="signed" style="display: none"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane " id="tab2Upload">
                                <div class="my-3 px-3">
                                    <input name="signatureFile" type="file" />    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            

            <div class="row my-3">
                <div class="col text-center">
                    <button type="submit" class="btn btn-primary btn-lg btn-larger" id="submitButton">Enviar</button>
                </div>
            </div>
        </form>
    </div>

    </div>

    <script type="text/javascript">
        var sig = $('#sig').signature({syncField: '#signature64', syncFormat: 'PNG'});
        $('#clear').click(function(e) {
            e.preventDefault();
            sig.signature('clear');
            $("#signature64").val('');
        });
    </script>

@endsection
