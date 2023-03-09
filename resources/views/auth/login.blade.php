@extends('layouts.login')

@section('content')
<div class="login-wrapper ">
    <!-- START Login Background Pic Wrapper-->
    <div class="bg-pic">
      <!-- START Background Caption-->
      <div class="bg-caption pull-bottom sm-pull-bottom text-white p-l-20 m-b-20">
        <h1 class="semi-bold text-white">
            Sistema de firma digitalizada CORPOSALUD.</h1>
        <p class="small">
          Servicio comunitario 52/2019 UNET.
        </p>
      </div>
      <!-- END Background Caption-->
    </div>
    <!-- END Login Background Pic Wrapper-->
    <!-- START Login Right Container-->
    <div class="login-container bg-white">
      <div class="p-l-50 p-r-50 p-t-50 m-t-30 sm-p-l-15 sm-p-r-15 sm-p-t-40">
        <img src="{{ asset('assets/img/logo-48x48_c.png') }}" alt="logo" data-src="{{ asset('assets/img/logo-48x48_c.png') }}" data-src-retina="{{ asset('assets/img/logo-48x48_c@2x.png') }}" width="48" height="48">
        <h2 class="p-t-25">Bienvenido. <br/> Para crear y firmar documentos</h2>
        <p class="mw-80 m-t-5">Inicia sesion en tu cuenta</p>
        <!-- START Login Form -->
        <form id="form-login" class="p-t-15" role="form" method="POST" action="{{ route('login') }}">
          @csrf
          <!-- START Form Control-->
          <div class="form-group form-group-default">
            <label>E-mail</label>
            <div class="controls">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            </div>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
          <!-- END Form Control-->
          <!-- START Form Control-->
          <div class="form-group form-group-default">
            <label>Contraseña</label>
            <div class="controls">
              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
            </div>
            
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
          <!-- START Form Control-->
          <div class="row">
            <div class="col-md-6 no-padding sm-p-l-10">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label" for="remember">
                    {{ __('Recordarme') }}
                </label>
              </div>
            </div>
            <div class="col-md-6 d-flex align-items-center justify-content-end">
              <button aria-label="" class="btn btn-primary btn-lg m-t-10" type="submit">Iniciar Sesion</button>
            </div>
          </div>
            @if (Route::has('password.request'))
                <div class="m-b-5 m-t-30">
                    <a class="normal" href="{{ route('password.request') }}">
                        {{ __('¿Olvidó su contraseña?') }}
                    </a>
                </div>
            @endif
          
        <!-- 
          <div>
            <a href="#" class="normal">Not a member yet? Signup now.</a>
          </div>
        -->
          <!-- END Form Control-->
        </form>
        <!--END Login Form-->
        
      </div>
    </div>
    <!-- END Login Right Container-->
  </div>
@endsection
