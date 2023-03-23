@extends('layouts.default')

@section('content')
    <style>
        .form-control[disabled] {
            color: black;
        }
    </style>
    <div class="container">
        <div class="row">
            <div class="col-md-8 my-auto">
                <h1>Ver Usuario</h1>
            </div>
            <div class="col-md-4 text-right my-auto">
                <a class="btn btn-primary btn-lg btn-larger" href="/usuarios"> VOLVER</a>
            </div>
        </div>

        <form class="mt-3" role="form">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group form-group-default ">
                        <label>Primer Nombre</label>
                        <input class="form-control" value="{{ $usuario->primer_nombre_usuario }}" disabled>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group form-group-default ">
                        <label>Segundo Nombre</label>
                        <input class="form-control" value="{{ $usuario->segundo_nombre_usuario }}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group form-group-default ">
                        <label>Primer Apellido</label>
                        <input class="form-control" value="{{ $usuario->primer_apellido_usuario }}" disabled>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group form-group-default ">
                        <label>Segundo Apellido</label>
                        <input class="form-control" value="{{ $usuario->segundo_apellido_usuario }}" disabled>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <div class="form-group form-group-default">
                        <label class="">Departamento</label>
                        <input class="form-control" value="{{ $usuario->departamento->nombre_departamento }}" disabled>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group form-group-default ">
                        <label>Documento</label>
                        <input class="form-control" value="{{ $usuario->documento_usuario }}" disabled>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group form-group-default ">
                        <label>Email</label>
                        <input class="form-control" value="{{ $usuario->email }}" disabled>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="card card-borderless form-group form-group-default">
                        <label>Firma</label>
                        <img src="{{ $signaturePath }}" alt="">
                    </div>
                </div>
            </div>

        </form>
    </div>
@endsection
