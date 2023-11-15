@extends('layouts.default')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 my-auto">
                <h1>Editar Rol</h1>
            </div>
            <div class="col-md-4 text-right my-auto">
                <a class="btn btn-primary btn-lg btn-larger" href="/roles"> VOLVER</a>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h1>Editar Permiso: {{ $role->name }}</h1>
                <form action="/roles/{{ $role->id }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="Name">Nombre del rol: {{ $role->name }}</label>
                        <input class="form-control " type="text" name="name" placeholder=" nuevo nombre del rol"
                            value="{{ $role->name }}">
                    </div>

                    <div class="row m-4 ">
                        @foreach ($permissions as $permission)
                            <div class="col-3">
                                <input type="checkbox" class="form-check-input" id="{{ $permission->id }}"
                                    name="permissions[]" value="{{ $permission->id }}">
                                <label class="form-check-label" for="{{ $permission->id }}">{{ $permission->name }}</label>
                            </div>
                        @endforeach
                    </div>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
            </div>
        </div>

    </div>


    <script type="text/javascript">
        $(document).ready(function() {
            @foreach ($role->getAllPermissions() as $permiso)
                $("#{{ $permiso->id }}").prop("checked", true);
            @endforeach
        });
    </script>
@endsection
