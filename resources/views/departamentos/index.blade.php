@extends('layouts.default')


@section('content')
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Vaya!</strong> Parece que tenemos problemas al intentar ejecutar la acción!.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row mb-3">
            <div class="col-lg-8 margin-tb my-auto">
                <h1>Gestión de Departamentos</h1>
            </div>
            <div class="col-4 text-right my-auto">
                @can('crear departamento')
                <a class="btn btn-primary btn-lg btn-larger" href="/departamentos/create">Crear Departamento</a>
                @endcan
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="table-responsive">
                    <table class="table table-hover table-condensed" id="condensedTable">
                        <thead>
                            <tr>
                                <th style="width:25%">Nombre</th>
                                <th style="width:15%">Codigo</th>
                                <th style="width:40%">Descripción</th>
                                <th style="width:20%">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($departamentos as $departamento)
                                <tr>
                                    <td class="v-align-middle semi-bold"> {{ $departamento->nombre_departamento }} </td>
                                    <td class="v-align-middle"> {{ $departamento->codigo_departamento }} </td>
                                    <td class="v-align-middle semi-bold"> {{ $departamento->descripcion_departamento }} </td>
                                    <td class="v-align-middle d-flex">
                                        @can('ver departamento')
                                        <a class="btn btn-info btn-icon-center text-white mr-1 px-1" href="departamentos/{{ $departamento->id }}"><i class="pg-icon">eye</i></a>
                                        @endcan

                                        @can('editar departamento')
                                        <a class="btn btn-primary btn-icon-center text-white mr-1 px-1" href="departamentos/{{ $departamento->id }}/edit"><i class="pg-icon">edit</i></a>
                                        @endcan

                                        @can('borrar departamento')
                                        <form action="/departamentos/{{ $departamento->id }}" method="POST" role="form">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-icon-center text-white px-1" type="submit"><i class="pg-icon">trash</i></button>
                                        </form>
                                        @endcan
                                    </td>
                                    
                    
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
