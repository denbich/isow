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
  <script src="https://cdn.tiny.cloud/1/{{ config('isow.tinymce') }}/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
  <!-- CSS Files -->
  <link id="pagestyle" href="{{ url('/assets/css/argon-dashboard.css?v=1.2') }}" rel="stylesheet" />
  <link rel="stylesheet" href="{{ url('/assets/css/cookie.css') }}" type="text/css">
  <link rel="stylesheet" href="{{ url('/assets/css/crop.css') }}">

  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

  <link rel="stylesheet" href="https://unpkg.com/dropzone/dist/dropzone.css" />
  <link href="https://unpkg.com/cropperjs/dist/cropper.css" rel="stylesheet"/>
  <script src="https://unpkg.com/dropzone"></script>
  <script src="https://unpkg.com/cropperjs"></script>

  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', '{{ config("isow.google.analitycs") }}');
  </script>

  @yield('style')
  <style>
      .choices {
          width:100% !important;
      }

      .tox-statusbar__branding{
          display: none !important;
      }
      .iti{
        width: 100%;
    }
  </style>
</head>

<body class="g-sidenav-show @yield('body')">

    <div id="main">
        @yield('content')
    </div>

    <div class="alert alert-dismissible text-center cookiealert" role="alert">
        <div class="cookiealert-container">
            <b>{{ __('index.cookies.text1') }}</b> &#x1F36A; {{ __('index.cookies.text2') }}

            <button type="button" class="btn btn-primary btn-sm acceptcookies przycisk mb-0" aria-label="Close">{{__('index.cookies.btn-a')}}</button>
      <a href="{{ url('/files/polityka_prywatnosci.pdf') }}" target="_blank" style="text-decoration:none;" class="btn btn-primary przycisk btn-sm acceptcookies mb-0">{{ __('index.cookies.btn-p') }}</a>
        </div>
      </div>


    <div class="modal fade" id="cropmodal" tabindex="-1" role="dialog" aria-labelledby="cropmodalLabel" aria-hidden="true"> <div class="modal-dialog modal-lg" role="document"> <div class="modal-content"> <div class="modal-header"> <h5 class="modal-title">{{ __('index.register.profile.modal-h') }}</h5></div> <div class="modal-body"> <div class="img-container"> <div class="row"> <div class="col-md-8"> <img src="" id="sample_image" class="img-crop"/> </div> <div class="col-md-4"> <div class="preview"></div> </div> </div> </div> </div> <div class="modal-footer"> <button type="button" id="crop" class="btn btn-primary">{{ __('index.register.profile.modal-crop') }}</button> <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('index.register.profile.modal-c') }}</button> </div> </div> </div> </div>

  <!--   Core JS Files   -->
  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
  <script src="{{ url('/assets/js/core/popper.min.js') }}"></script>
  <script src="{{ url('/assets/js/core/bootstrap.min.js') }}"></script>
  <script src="{{ url('/assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
  <script src="{{ url('/assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
  <script src="{{ url('/assets/js/argon-dashboard.js?v=a.3') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.10/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/Wruczek/Bootstrap-Cookie-Alert@gh-pages/cookiealert.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key={{ config('isow.google.maps') }}&libraries=places&callback=initMap&channel=GMPSB_addressselection_v1_cABC" async defer></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <script src="https://demos.creative-tim.com/argon-dashboard-pro/assets/js/plugins/choices.min.js"></script>

  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

  @if (Route::currentRouteName() != 'c.profile')
    <script src="{{ url('/js/functions/crop.js') }}"></script>
    @endif
  <script>
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
</script>

<script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
@yield('script')
@stack('scripts')
@if (Route::currentRouteName() != 'c.dashboard')
<!-- <input type="checkbox" id="dark-version"  checked="true" hidden> -->
@endif

</body>
</html>
