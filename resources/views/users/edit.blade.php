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
        .transparent{
            opacity: 0;
        }
    </style>

    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Vaya!</strong> Parece que tenemos problemas con algunos campos del formulario!.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row">
            <div class="col-md-8 my-auto">
                <h1>Editar  Usuario</h1>
            </div>
            <div class="col-md-4 text-right my-auto">
                <a class="btn btn-primary btn-lg btn-larger" href="/usuarios"> VOLVER</a>
            </div>
        </div>
        <p class="m-t-10 m-b-20 mw-80">Para editar al usuario por favor llene el siguiente formulario.</p>
        <form class="mt-3" action="/usuarios/{{ $usuario->id }}" method="POST" enctype="multipart/form-data" role="form">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group form-group-default required ">
                        <label>Primer Nombre</label>
                        <input type="text" id="primer_nombre_usuario" name="primer_nombre_usuario" maxlength="30" class="form-control" value="{{ $usuario->primer_nombre_usuario }}" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group form-group-default ">
                        <label>Segundo Nombre</label>
                        <input type="text" id="segundo_nombre_usuario" name="segundo_nombre_usuario" maxlength="30" class="form-control" value="{{ $usuario->segundo_nombre_usuario }}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group form-group-default required ">
                        <label>Primer Apellido</label>
                        <input type="text" id="primer_apellido_usuario" name="primer_apellido_usuario" maxlength="30" class="form-control" value="{{ $usuario->primer_apellido_usuario }}" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group form-group-default required ">
                        <label>Segundo Apellido</label>
                        <input type="text" id="segundo_apellido_usuario" name="segundo_apellido_usuario" maxlength="30" class="form-control" value="{{ $usuario->segundo_apellido_usuario }}" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group form-group-default form-group-default-select2 required">
                        <label class="">Departamento</label>
                        <select name="departamento_id" id="departamento_id" class="full-width"
                            data-placeholder="Seleccione un departamento" data-init-plugin="select2" required>
                            <option value=""></option>
                            @foreach ($departamentos as $departamento)
                                <option value="{{ $departamento->id }}">{{ $departamento->nombre_departamento }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group form-group-default required ">
                        <label>Documento</label>
                        <input type="text" id="documento_usuario" name="documento_usuario" class="form-control" value="{{$usuario->documento_usuario}}" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group form-group-default required ">
                        <label>Email</label>
                        <input type="email" id="email" name="email" class="form-control" value="{{$usuario->email}}" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group form-group-default ">
                        <label>Contraseña</label>
                        <input type="password" class="form-control" id="password" name="password" autocomplete="off">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <div class="form-group form-group-default form-group-default-select2 required">
                        <label class="">Cargo</label>
                        <select name="roles" id="roles" class="full-width"
                            data-placeholder="Seleccione un cargo" data-init-plugin="select2" required>
                            <option value=""></option>
                            @foreach ($roles as $role)
                            <div class="col-3">
                                <option value="{{$role->id}}">{{$role->name}}</option>
                            </div>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="card card-default">
                <div class="card-header ">
                  <div class="card-title">Permisos</div>
                </div>
                <div class="card-body">
                    <div class="row my-3">
                        @foreach ($permissions as $permission)
                        <div class="col-md-3 px-2">
                            <div class="form-check">
                                <input type="checkbox" id="{{$permission->id}}" name="permissions[]" value="{{$permission->id}}">
                                <label for="{{$permission->id}}" class="text-capitalize">{{$permission->name}}</label>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>


            <div id="currentSignatureRow" class="row ">
                <div class="col-lg-6">
                    <div class="card card-borderless form-group form-group-default">
                        <label>Firma Actual:</label>
                        <div class="col-md-12 text">
                            <img src="{{$signaturePath}}"  alt="">
                            <br/>
                            <button id="updateSignature" class="btn btn-danger btn-sm">Actualizar Firma</button>
                        </div>
                    </div>
                </div>
            </div>

            <div id="signatureRow" class="row transparent">
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
                                        <textarea id="signature64" name="signed" class="d-none"></textarea>
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
        
        $( document ).ready(function() {
            $('#signatureRow').addClass( "d-none" );
            $('#signatureRow').removeClass( "transparent" );
        });
        
        var sig = $('#sig').signature({syncField: '#signature64', syncFormat: 'PNG'});
        $('#clear').click(function(e) {
            e.preventDefault();
            sig.signature('clear');
            $("#signature64").val('');
        });
        $('#updateSignature').click(function(e) {
            e.preventDefault();
            $('#signatureRow').removeClass( "d-none" );
            $('#signatureRow').addClass( "d-block" );
            $('#currentSignatureRow').addClass( "d-none" );
            $('#currentSignatureRow').removeClass( "d-block" );
        });

    </script>

    <script type="text/javascript">
        $( document ).ready(function() {
            var rolesSelect = $('#roles').select2();
            rolesSelect.val('{{$usuario->rol}}').trigger("change");
            var departmentSelect = $('#departamento_id').select2();
            departmentSelect.val('{{$usuario->departamento->id}}').trigger("change");

            @foreach ($arraypermisos as $arraypermiso)
                $("#{{$arraypermiso}}").prop("checked", true);
            @endforeach

            $('select#roles').on('change', function(e) {
                @foreach ($permissions as $permission)
                    $("#{{$permission->id}}").prop("checked", false);
                @endforeach

                var id = $('select#roles').val();
                $.ajax({
                url:"/getpermissions",
                method:"GET",
                data:{"id":id},
                dataType:"json",
                success:function(data){
                    $.each(data, function(i, id) {
                        $("#"+data[i].id).prop("checked", true);
                    });
                },
                error: function (data) {
                    console.log('fail', data);
                }
                });
            });
        });
    </script>

@endsection
