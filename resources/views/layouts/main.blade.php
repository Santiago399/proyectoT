<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('/img/apple-icon.png') }}">
  <link rel="icon" type="image/png" href="{{ asset('/img/favicon.png') }}">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <!-- Extra details for Live View on GitHub Pages -->
  <title>
    Talud
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->

  <link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('/css/now-ui-dashboard.css') }}" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="{{ asset('/demo/demo.css') }}" rel="stylesheet" />
  @yield('css')

  @livewireStyles

</head>

<body class="{{ $class ?? '' }}">
  <div class="wrapper">
    @auth
      @include('layouts.page_template.auth')
    @endauth
    @guest
      @include('layouts.page_template.guest')
    @endguest
  </div>
  <!--   Core JS Files   -->
  <script src="{{ asset('/js/core/jquery.min.js') }}"></script>
  <script src="{{ asset('/js/core/popper.min.js') }}"></script>
  <script src="{{ asset('/js/core/bootstrap.min.js') }}"></script>
  <script src="{{ asset('/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
  <!--  Google Maps Plugin    -->
  <!-- Chart JS -->
  <script src="{{ asset('/js/plugins/chartjs.min.js') }}"></script>
  <!--  Notifications Plugin    -->
  <script src="{{ asset('/js/plugins/bootstrap-notify.js') }}"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('/js/now-ui-dashboard.min.js') }}" type="text/javascript"></script>
  <!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
  <script src="{{ asset('/demo/demo.js') }}"></script>
  @stack('js')
  @yield('js')
  @livewireScripts

</body>

</html>
