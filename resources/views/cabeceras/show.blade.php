@extends('layouts.default')
@php
use Illuminate\Support\Facades\Storage;
@endphp
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 my-auto">
                <h1>Ver Cabecera</h1>
            </div>
            <div class="col-md-4 text-right my-auto">
                <a class="btn btn-primary btn-lg btn-larger" href="/cabeceras"> VOLVER</a>
            </div>
        </div>
        <form class="mt-3" role="form">
            @csrf

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group form-group-default required ">
                        <label>Nombre de la cabecera</label>
                        <input type="text" class="form-control" value="{{$header->nombre_cabecera}}" readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group form-group-default required ">
                        <label>Logo:</label>
                        <img src="{{$img_url}}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group form-group-default required">
                        <h5>Redactar cabecera</h5>
                        <textarea class="form-element w-100" rows="4" readonly>{{$header->cuerpo_cabecera}}</textarea>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
