@extends('layouts.default')

@section('content')
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
                <h1>Perfil</h1>
            </div>
            <div class="col-md-4 text-right my-auto">
                <a class="btn btn-primary btn-lg btn-larger" href="/home"> VOLVER</a>
            </div>
        </div>

        <div class="row">
            <div class="col my-auto">
                <h3>Bienvenido {{ $usuario->primer_nombre_usuario }} {{ $usuario->primer_apellido_usuario }}</h3>
            </div>
        </div>
        <p class="m-t-10 m-b-20 mw-80">Si desea cambiar su contraseña por favor llene el siguiente formulario.</p>
        <p class="m-t-10 m-b-20 mw-80">La contraseña debe contener al menos 8 caracteres, una mayuscula, una minuscula, un número y un símbolo</p>
        <form class="mt-3" action="/usuarios/{{ $usuario->id }}/change-password" method="POST" role="form">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group form-group-default ">
                        <label>Contraseña</label>
                        <input type="password" class="form-control" id="password" name="password" autocomplete="off">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group form-group-default ">
                        <label>Repetir Contraseña</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" autocomplete="off">
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


@endsection
