<!DOCTYPE html>
<html lang="{{ session('locale', 'pl') }}">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="shortcut icon" href="https://mosir.rybnik.pl/typo3conf/ext/dqtemplate/Resources/Public/Icons/favicon.ico" type="image/x-icon">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="author" content="Denis Bichler">

  <title>@yield('title') | WMR</title>

  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="{{ url('assets/css/nucleo-icons.css') }}" rel="stylesheet" />
  <link href="{{ url('assets/css/nucleo-svg.css') }}" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ url('/assets/vendor/@fortawesome/css/all.min.css') }}" type="text/css">
  <link href="{{ url('assets/css/nucleo-svg.css') }}" rel="stylesheet" />
  <script src="https://cdn.tiny.cloud/1/{{ env('TINYMCE') }}/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
  <!-- CSS Files -->
  <link id="pagestyle" href="{{ url('css/argon-dashboard.css?v=1') }}" rel="stylesheet" />
</head>

<body class="g-sidenav-show   bg-gray-100">

    <div id="main">
        @yield('content')
    </div>

  <!--   Core JS Files   -->
  <script src="{{ url('/assets/js/core/popper.min.js') }}"></script>
  <script src="{{ url('/assets/js/core/bootstrap.min.js') }}"></script>
  <script src="{{ url('/assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
  <script src="{{ url('/assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
  <script src="{{ url('/assets/js/plugins/chartjs.min.js') }}"></script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
@yield('script')
  <script src="{{ url('/assets/js/argon-dashboard.js?v=2.0.2.1') }}"></script>
</body>

</html>
