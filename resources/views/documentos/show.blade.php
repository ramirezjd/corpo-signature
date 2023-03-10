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
                <h1>Ver Usuario</h1>
            </div>
            <div class="col-md-4 text-right my-auto">
                <a class="btn btn-primary btn-lg btn-larger" href="/usuarios"> VOLVER</a>
            </div>
        </div>
        <p class="m-t-10 m-b-20 mw-80">Para editar el usuario por favor llene el siguiente formulario.</p>
        <form class="mt-3" role="form">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group form-group-default ">
                        <label>Nombres</label>
                        <input type="text" class="form-control" value="{{$usuario->nombres_usuario}}" disabled>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group form-group-default ">
                        <label>Apellidos</label>
                        <input type="text" class="form-control" value="{{$usuario->nombres_usuario}}" disabled>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group form-group-default">
                        <label class="">Departamento</label>
                        <input type="text" class="form-control" value="{{$usuario->departamento->nombre_departamento}}" disabled>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group form-group-default ">
                        <label>Documento</label>
                        <input type="text" class="form-control" value="{{$usuario->documento_usuario}}" disabled>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group form-group-default ">
                        <label>Email</label>
                        <input class="form-control" class="form-control" value="{{$usuario->email}}" disabled>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="card card-borderless form-group form-group-default">
                        
                        <label>Firma</label>
                        <img src="{{$signaturePath}}"  alt="">
                    </div>
                </div>
            </div>

        </form>
    </div>

    </div>


@endsection
