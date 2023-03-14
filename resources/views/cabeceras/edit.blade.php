@extends('layouts.default')
@php
    use Illuminate\Support\Facades\Storage;
@endphp
@section('content')
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
                <h1>Ver Cabecera</h1>
            </div>
            <div class="col-md-4 text-right my-auto">
                <a class="btn btn-primary btn-lg btn-larger" href="/cabeceras"> VOLVER</a>
            </div>
        </div>
        <p class="m-t-10 m-b-20 mw-80">Para editar la cabecera por favor llene el siguiente formulario.</p>
        <form class="mt-3" method="POST" enctype="multipart/form-data" action="/cabeceras/{{ $header->id }}" role="form">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group form-group-default required ">
                        <label>Nombre de la cabecera</label>
                        <input type="text" id="header_name" name="header_name"  class="form-control" value="{{ $header->nombre_cabecera }}">
                    </div>
                </div>
                <div id="currentLogoRow" class="col-md-6 ">
                    <div class="card card-borderless form-group form-group-default">
                        <label>Logo Actual:</label>
                        <div class="col-md-12 text">
                            <img src="{{ $img_url }}" alt="">
                            <br />
                            <button id="updateLogo" class="btn btn-danger btn-sm">Actualizar Logo</button>
                        </div>
                    </div>
                </div>
                <div id="logoRow" class="col-md-6 d-none ">
                    <div class="form-group form-group-default">
                        <label>Logo:</label>
                        <input name="logoFile" type="file" />
                    </div>
                </div>

            </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group form-group-default required">
                <h5>Redactar cabecera</h5>
                <textarea name="header_body" id="header_body" class="form-element w-100" rows="4">{{ $header->cuerpo_cabecera }}</textarea>
            </div>
        </div>
    </div>

    <div class="row my-3">
        <div class="col text-center">
            <button type="submit" class="btn btn-primary btn-lg btn-larger" id="submitButton" readonly>Actualizar</button>
        </div>
    </div>
    </form>
    </div>


    <script type="text/javascript">
        $('#updateLogo').click(function(e) {
            e.preventDefault();
            $('#logoRow').removeClass("d-none");
            $('#logoRow').addClass("d-block");
            $('#currentLogoRow').addClass("d-none");
            $('#currentLogoRow').removeClass("d-block");
        });
    </script>
@endsection
