@extends('layouts.default')


@section('content')
    <div class="container">
        <div class="row mb-3">
            <div class="col-lg-8 margin-tb my-auto">
                <h1>Gestión de Usuarios</h1>
            </div>
            <div class="col-4 text-right my-auto">
                @can('crear usuario')
                <a class="btn btn-primary btn-lg btn-larger" href="/usuarios/create">Crear Usuario</a>
                @endcan
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="table-responsive">
                    <table class="table table-hover table-condensed" id="condensedTable">
                        <thead>
                            <tr>
                                <th style="width:25%">Departamento</th>
                                <th style="width:20%">Nombres</th>
                                <th style="width:20%">Apellidos</th>
                                <th style="width:20%">Documento</th>
                                <th style="width:15%">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td class="v-align-middle semi-bold"> {{ $user->departamento->nombre_departamento }} </td>
                                    <td class="v-align-middle semi-bold"> {{ $user->primer_nombre_usuario }}  {{ $user->segundo_nombre_usuario }}</td>
                                    <td class="v-align-middle"> {{ $user->primer_apellido_usuario }} {{ $user->segundo_apellido_usuario }} </td>
                                    <td class="v-align-middle semi-bold"> {{ $user->documento_usuario }} </td>
                                    <td class="v-align-middle d-flex">
                                        @can('ver usuario')
                                        <a class="btn btn-info btn-icon-center text-white mr-1 px-1" href="usuarios/{{ $user->id }}"><i class="pg-icon">eye</i></a>
                                        @endcan

                                        @can('editar usuario')
                                        <a class="btn btn-primary btn-icon-center text-white mr-1 px-1" href="usuarios/{{ $user->id }}/edit"><i class="pg-icon">edit</i></a>
                                        @endcan

                                        @can('borrar usuario')
                                        <form action="/usuarios/{{ $user->id }}" method="POST" role="form">
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
