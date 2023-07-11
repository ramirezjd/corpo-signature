<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Corposalud') }}</title>
    <link href="{{ asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" media="screen" />
    <link href="{{ asset('assets/plugins/pace/pace-theme-flash.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="{{ asset('assets/plugins/jquery-scrollbar/jquery.scrollbar.css') }}" rel="stylesheet" type="text/css" media="screen" />
    <script src="{{ asset('assets/plugins/jquery/jquery-3.2.1.min.js') }}" type="text/javascript"></script>
    <link href="{{ asset('assets/plugins/bootstrap-tag/bootstrap-tagsinput.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/plugins/dropzone/css/dropzone.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/plugins/bootstrap-datepicker/css/datepicker3.css') }}" rel="stylesheet" type="text/css" media="screen">
    <link href="{{ asset('assets/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css') }}" rel="stylesheet" type="text/css" media="screen">
    <link href="{{ asset('assets/plugins/bootstrap-timepicker/bootstrap-timepicker.min.css') }}" rel="stylesheet" type="text/css" media="screen">
    <link class="main-stylesheet" href="{{ asset('pages/css/themes/light.css') }}" rel="stylesheet" type="text/css" />
    <style>
        .icon-thumbnail {
            margin-right: 0px;
        }

        .page-sidebar .sidebar-menu .menu-items li>a {
            width: 80%;
        }
    </style>
</head>

<body class="fixed-header menu-pin">
    <?php $user = Auth::user(); ?>
    <nav class="page-sidebar" data-pages="sidebar">
        <div class="sidebar-header">
            <img src="{{ asset('assets/img/logo.png') }}" alt="logo" class="brand"
                data-src="{{ asset('assets/img/logo.png') }}" data-src-retina="{{ asset('assets/img/logo.png') }}"
                width="160" height="60">
        </div>
        <div class="sidebar-menu mt-3">
            <ul class="menu-items">
                <li class="m-t-10">
                    <a href="/departamentos" class="">
                        <span class="title">Departamentos</span>
                    </a>
                    <span class="icon-thumbnail"><i data-feather="shield"></i></span>
                </li>
                <li class="">
                    <a href="/usuarios"><span class="title">Usuarios</span></a>
                    <span class="icon-thumbnail"><i data-feather="users"></i></span>
                </li>
                <li class="">
                    <a href="javascript:;"><span class="title">Documentos</span>
                        <span class="arrow"></span></a>
                    <span class="icon-thumbnail"><i data-feather="file-text"></i></span>
                    <ul class="sub-menu">
                        <li>
                            <a href="/documentos/solicitante">Creados</a>
                            <span class="icon-thumbnail"><i data-feather="user-plus"></i></span>

                        </li>
                        <li>
                            <a href="/documentos/revisor">Revisor</a>
                            <span class="icon-thumbnail"><i data-feather="user-check"></i></span>
                        </li>
                    </ul>
                </li>
                <li class="">
                    <a href="/cabeceras"><span class="title">Cabeceras</span></a>
                    <span class="icon-thumbnail"><i data-feather="file-text"></i></span>
                </li>
                <li class="">
                    <a href="/roles"><span class="title">Roles</span></a>
                    <span class="icon-thumbnail"><i data-feather="file-text"></i></span>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
    </nav>

    <div class="page-container ">
        <div class="header ">
            <a href="#" class="btn-link toggle-sidebar d-lg-none  pg-icon btn-icon-link" data-toggle="sidebar">menu</a>
            <div class=""></div>
            <div class="d-flex align-items-center">
                <ul
                    class="d-lg-inline-block d-none notification-list no-margin d-lg-inline-block b-grey b-l b-r no-style p-l-20 p-r-20">
                    <li class="p-r-10 inline">
                        <div class="dropdown">
                            <a href="javascript:;" id="notification-center" class="header-icon btn-icon-link"
                                data-toggle="dropdown">
                                <i class="pg-icon">world</i>
                                <span class="bubble"></span>
                            </a>
                            <div class="dropdown-menu notification-toggle" role="menu"
                                aria-labelledby="notification-center">
                                <div class="notification-panel">
                                    <div class="notification-body scrollable">
                                        @foreach ($user->notifications as $notification)
                                            <div class="notification-item unread clearfix">
                                                <div class="heading ">
                                                    <a href="#"
                                                        class="text-complete pull-left d-flex align-items-center">
                                                        <i class="pg-icon m-r-10">alert_warning</i>
                                                        <span class="bold">Nueva solicitud de firma</span>
                                                    </a>
                                                    <div class="pull-right">
                                                        <div
                                                            class="thumbnail-wrapper d16 circular inline m-t-15 m-r-10 toggle-more-details">
                                                            <div><i class="pg-icon">chevron_down</i>
                                                            </div>
                                                        </div>
                                                        <span class=" time">few sec ago</span>
                                                    </div>
                                                    <div class="more-details">
                                                        <div class="more-details-inner">
                                                            <h5 class="semi-bold fs-16">
                                                                {{ $notification->data['primer_apellido_usuario'] }}
                                                                {{ $notification->data['primer_nombre_usuario'] }}
                                                                Solicitó tu revision del documento
                                                                {{ $notification->data['descripcion_documento'] }}
                                                            </h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="option" data-toggle="tooltip" data-placement="left"
                                                    title="mark as read">
                                                    <a href="#" class="mark"></a>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="notification-footer text-center">
                                        <a href="/notificaciones" class="">Ver todas las notificaciones</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>

                </ul>
                <div class="pull-left p-r-10 fs-14 d-lg-inline-block d-none m-l-20">
                    <span class="semi-bold">{{ $user->primer_apellido_usuario }}</span> <span
                        class="text-color">{{ $user->primer_nombre_usuario }}</span>
                </div>
                <div class="dropdown pull-right d-lg-block d-none">
                    <button class="profile-dropdown-toggle" type="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false" aria-label="profile dropdown">
                        <span class="thumbnail-wrapper d32 circular inline">
                            <img src="{{ asset('assets/img/avatar.png') }}" alt=""
                                data-src="{{ asset('assets/img/avatar.png') }}"
                                data-src-retina="{{ asset('assets/img/avatar.png') }}" width="40"
                                height="32">
                        </span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right profile-dropdown" role="menu">
                        <a href="#" class="dropdown-item"><span>Signed in as
                                <br /><b>{{ $user->primer_apellido_usuario }} {{ $user->primer_nombre_usuario }}</b></span></a>
                        <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item"><span>{{$user->roleName}}</span></a>                        
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">Perfil</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Cerrar Sesion
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>

            </div>
        </div>

        <div class="page-content-wrapper ">
            <div class="content ">
                <div class="jumbotron" data-pages="parallax">
                    <div class=" container-fluid   container-fixed-lg sm-p-l-0 sm-p-r-0">
                        <div class="inner">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">{{ $root ?? '' }}</a></li>
                                <li class="breadcrumb-item active">{{ $page ?? '' }}</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class=" container-fluid pb-5  container-fixed-lg">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>


    <script src="{{ asset('assets/plugins/feather-icons/feather.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/plugins/pace/pace.min.js ') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/plugins/liga.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/plugins/modernizr.custom.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/plugins/jquery-ui/jquery-ui.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/plugins/popper/umd/popper.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/plugins/jquery/jquery-easy.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/plugins/jquery-unveil/jquery.unveil.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/plugins/jquery-ios-list/jquery.ioslist.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/plugins/jquery-actual/jquery.actual.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/select2/js/select2.full.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/plugins/classie/classie.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/plugins/dropzone/dropzone.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/plugins/jquery-autonumeric/autoNumeric.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/plugins/bootstrap-tag/bootstrap-tagsinput.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/plugins/jquery-inputmask/jquery.inputmask.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/plugins/bootstrap-form-wizard/js/jquery.bootstrap.wizard.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/plugins/jquery-validation/js/jquery.validate.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/plugins/bootstrap-typehead/typeahead.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap-typehead/typeahead.jquery.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/handlebars/handlebars-v4.0.5.js') }}"></script>
    <script src="{{ asset('pages/js/pages.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/form_elements.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/scripts.js') }}" type="text/javascript"></script>
</body>

</html>
