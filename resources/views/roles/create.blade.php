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
                <h1>Registrar Rol</h1>
            </div>
            <div class="col-md-4 text-right my-auto">
                <a class="btn btn-primary btn-lg btn-larger" href="/roles"> VOLVER</a>
            </div>
        </div>

        <form action="/roles" method="POST">

            @csrf
            <div class="row my-4">
                <div class="col">
                    <div class="form-group">
                        <label for="Name">Nombre del rol</label>
                        <input class="form-control " type="text" name="name" placeholder="nombre del perfil">
                    </div>
                </div>
            </div>

            <div class="row m-4 ">
                @foreach ($permissions as $permission)
                    <div class="col-3">
                        <input type="checkbox" class="form-check-input " id="{{ $permission->id }}" name="permissions[]"
                            value="{{ $permission->id }}">
                        <label class="form-check-label text-capitalize" for="{{ $permission->id }}">{{ $permission->name }}</label>
                    </div>
                @endforeach
            </div>

            <div class="row m-4 text-center">
                <div class="col">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </div>
            </div>
        </form>


    </div>
@endsection
