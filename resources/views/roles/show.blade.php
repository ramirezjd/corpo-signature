@extends('layouts.default')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 my-auto">
                <h1>Ver Rol</h1>
            </div>
            <div class="col-md-4 text-right my-auto">
                <a class="btn btn-primary btn-lg btn-larger" href="/roles"> VOLVER</a>
            </div>
        </div>
        <div class="row">
            <div class="col-6 mx-auto">
                <h1>Nombre: {{ $role->name }}</h1>
            </div>
        </div>
        <hr>
        <div class="row mb-1">
            <h4>Lista de Permisos</h4>
        </div>

        <div class="row mx-4">
            @foreach ($permissions as $permission)
                <div class="col-3">
                    <span>-{{ $permission->name }}</span>
                </div>
            @endforeach
        </div>
    </div>
@endsection
