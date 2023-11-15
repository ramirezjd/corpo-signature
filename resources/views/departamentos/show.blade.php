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
                <h1>Visualizar Departamento</h1>
            </div>
            <div class="col-md-4 text-right my-auto">
                <a class="btn btn-primary btn-lg btn-larger" href="/departamentos"> VOLVER</a>
            </div>
        </div>

        <form class="mt-3">
            
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group form-group-default ">
                        <label>Nombre</label>
                        <input type="text" value="{{ $departamento->nombre_departamento }}" class="form-control" readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group form-group-default ">
                        <label>Codigo</label>
                        <input type="text" value="{{ $departamento->codigo_departamento }}" class="form-control" readonly>
                    </div>
                </div>
            </div>
            <div class="form-group form-group-default ">
                <label>Descripcion</label>
                <textarea class="form-control" cols="30" rows="2" style="height:100%;" readonly>{{ $departamento->descripcion_departamento }}
                </textarea>
            </div>
            
        </form>
    </div>

    </div>

@endsection
