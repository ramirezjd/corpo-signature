<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Corposalud') }}</title>

    <link href="{{ asset('assets/plugins/pace/pace-theme-flash.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="{{ asset('assets/plugins/jquery-scrollbar/jquery.scrollbar.css') }}" rel="stylesheet" type="text/css" media="screen" />
    <link href="{{ asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" media="screen" />
    <link class="main-stylesheet" href="{{ asset('pages/css/themes/light.css') }}" rel="stylesheet" type="text/css" />
    <!-- Please remove the file below for production: Contains demo classes -->
    <link class="main-stylesheet" href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css" />
    <script type="text/javascript">
      window.onload = function()
      {
        // fix for windows 8
        if (navigator.appVersion.indexOf("Windows NT 6.2") != -1)
          document.head.innerHTML += '<link rel="stylesheet" type="text/css" href="{{ asset('pages/css/windows.chrome.fix.css') }}" />'
      }
    </script>

</head>
<body class="fixed-header menu-pin">

  @yield('content')


  <!-- BEGIN VENDOR JS -->
  <script src="{{ asset('assets/plugins/pace/pace.min.js') }}" type="text/javascript"></script>
  <!--  A polyfill for browsers that don't support ligatures: remove liga.js if not needed-->
  <script src="{{ asset('assets/plugins/liga.js') }}" type="text/javascript"></script>
  <script src="{{ asset('assets/plugins/jquery/jquery-3.2.1.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('assets/plugins/modernizr.custom.js') }}" type="text/javascript"></script>
  <script src="{{ asset('assets/plugins/jquery-ui/jquery-ui.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('assets/plugins/popper/umd/popper.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('assets/plugins/jquery/jquery-easy.js') }}" type="text/javascript"></script>
  <script src="{{ asset('assets/plugins/jquery-unveil/jquery.unveil.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('assets/plugins/jquery-ios-list/jquery.ioslist.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('assets/plugins/jquery-actual/jquery.actual.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>
  <script type="{{ asset('text/javascript" src="assets/plugins/select2/js/select2.full.min.js') }}"></script>
  <script type="{{ asset('text/javascript" src="assets/plugins/classie/classie.js') }}"></script>
  <script src="{{ asset('assets/plugins/jquery-validation/js/jquery.validate.min.js') }}" type="text/javascript"></script>
  <!-- END VENDOR JS -->
  <script src="{{ asset('pages/js/pages.min.js') }}"></script>
  
</body>
</html>
