@extends('layouts.default')

@section('content')

    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
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
                <h1>Crear Cabecera</h1>
            </div>
            <div class="col-md-4 text-right my-auto">
                <a class="btn btn-primary btn-lg btn-larger" href="/cabeceras"> VOLVER</a>
            </div>
        </div>
        <p class="m-t-10 m-b-20 mw-80">Para registrar una nueva cabecera por favor llene el siguiente formulario.</p>
        <form class="mt-3" action="/cabeceras" method="POST" enctype="multipart/form-data" role="form">
            @csrf

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group form-group-default required ">
                        <label>Nombre de la cabecera</label>
                        <input type="text" id="header_name" name="header_name" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group form-group-default required ">
                        <label>Subir Logo:</label>
                        <input name="logoFile" type="file" required/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group form-group-default required">
                        <h5>Redactar cabecera</h5>
                        <textarea name="header_body" id="header_body" class="form-element w-100" rows="4" required></textarea>
                    </div>
                </div>
            </div>

            <div class="row my-3">
                <div class="col text-center">
                    <button type="submit" class="btn btn-primary btn-lg btn-larger" id="submitButton">Crear</button>
                </div>
            </div>
        </form>
    </div>
@endsection
