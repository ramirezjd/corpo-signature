@extends('layouts.default')

@section('content')
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
                <h1>Editar Departamento</h1>
            </div>
            <div class="col-md-4 text-right my-auto">
                <a class="btn btn-primary btn-lg btn-larger" href="/departamentos"> VOLVER</a>
            </div>
        </div>
        <p class="m-t-10 m-b-20 mw-80">Para editar el departamento por favor llene el siguiente formulario.</p>            
        <form class="mt-3" action="/departamentos/{{ $departamento->id }}" method="POST" role="form">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group form-group-default required ">
                        <label>Nombre</label>
                        <input type="text" id="nombre_departamento" value="{{ $departamento->nombre_departamento }}" name="nombre_departamento" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group form-group-default ">
                        <label>Codigo</label>
                        <input type="text" id="codigo_departamento" value="{{ $departamento->codigo_departamento }}"  name="codigo_departamento" class="form-control" >
                    </div>
                </div>
            </div>
            <div class="form-group form-group-default ">
                <label>Descripcion</label>
                <textarea class="form-control" name="descripcion_departamento" id="descripcion_departamento" cols="30" rows="2" style="height:100%;">{{ $departamento->descripcion_departamento }} </textarea>
            </div>
            
            <div class="row my-3">
                <div class="col text-center">
                    <button type="submit" class="btn btn-primary btn-lg btn-larger" id="submitButton">Actualizar</button>
                </div>
            </div>
        </form>
    </div>

    </div>

@endsection
