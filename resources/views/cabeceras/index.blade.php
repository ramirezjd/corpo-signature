@extends('layouts.default')


@section('content')
    <div class="container">
        <div class="row mb-3">
            <div class="col-lg-8 margin-tb my-auto">
                <h1>Gestión de Cabeceras</h1>
            </div>
            <div class="col-4 text-right my-auto">
                @can('crear cabecera')
                <a class="btn btn-primary btn-lg btn-larger" href="/cabeceras/create">Crear Cabecera</a>
                @endcan
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="table-responsive">
                    <table class="table table-hover table-condensed" id="condensedTable">
                        <thead>
                            <tr>
                                <th style="width:70%">Nombre</th>
                                <th style="width:30%">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cabeceras as $cabecera)
                                <tr>
                                    <td class="v-align-middle semi-bold"> {{ $cabecera->nombre_cabecera }} </td>
                                    <td class="v-align-middle d-flex">
                                        @can('ver cabecera')
                                        <a class="btn btn-info btn-icon-center text-white mr-1 px-1" href="cabeceras/{{ $cabecera->id }}"><i class="pg-icon">eye</i></a>
                                        @endcan

                                        @can('editar cabecera')
                                        <a class="btn btn-primary btn-icon-center text-white mr-1 px-1" href="cabeceras/{{ $cabecera->id }}/edit"><i class="pg-icon">edit</i></a>
                                        @endcan

                                        @can('borrar cabecera')
                                        <form action="/cabeceras/{{ $cabecera->id }}" method="POST" role="form">
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
