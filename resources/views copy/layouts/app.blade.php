<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Internetowy System Obsługi Wolontariatu">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="author" content="Denis Bichler">

  <title>@yield('title') | WMR</title>

  <link rel="shortcut icon" href="https://mosir.rybnik.pl/typo3conf/ext/dqtemplate/Resources/Public/Icons/favicon.ico" type="image/x-icon">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">

  <link rel="stylesheet" href="{{ url('/assets/vendor/nucleo/css/nucleo.css') }}" type="text/css">
  <link rel="stylesheet" href="{{ url('/assets/vendor/@fortawesome/css/all.min.css') }}" type="text/css">
  <script src="https://cdn.tiny.cloud/1/{{ env('TINYMCE') }}/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

  <link rel="stylesheet" href="{{ url('/assets/css/argon.css?v=1.2.0.3') }}" type="text/css">
  <link rel="stylesheet" href="{{ url('/assets/css/cookie.css') }}" type="text/css">
  <link rel="stylesheet" href="{{ url('/assets/css/crop.css') }}">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/round-flag-icons/css/round-flag-icons.min.css">

  <!--<link rel="stylesheet" href="{{ asset('css/calendar.css') }}" type="text/css">
  <script src="/js/maps.js"></script>
  <script src="{{ asset('js/main.js') }}"></script>-->

  <link href="https://cdn.jsdelivr.net/npm/tom-select@2.0.2/dist/css/tom-select.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/tom-select@2.0.2/dist/js/tom-select.complete.min.js"></script>

  <link rel="stylesheet" href="https://unpkg.com/dropzone/dist/dropzone.css" />
  <link href="https://unpkg.com/cropperjs/dist/cropper.css" rel="stylesheet"/>
  <script src="https://unpkg.com/dropzone"></script>
  <script src="https://unpkg.com/cropperjs"></script>

  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', '{{ env('GOOGLE_ANALYTICS_KEY') }}');
  </script>

  <style>
      .tox-statusbar__branding{
          display: none !important;
      }
  </style>

    @yield('style')

</head>

<body @yield('body')>

    <div id="main">
        @yield('content')

        <!--<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">{{ __('index.register.profile.modal-h') }}</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="img-container">
                          <div class="row">
                              <div class="col-md-8">
                                  <img src="" id="sample_image" class="img-crop"/>
                              </div>
                              <div class="col-md-4">
                                  <div class="preview"></div>
                              </div>
                          </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="crop" class="btn btn-info text-dark">{{ __('index.register.profile.modal-crop') }}</button>
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('index.register.profile.modal-c') }}</button>
                    </div>
              </div>
            </div>
        </div>-->

        <div class="modal fade" id="cropmodal" tabindex="-1" role="dialog" aria-labelledby="cropmodalLabel" aria-hidden="true"> <div class="modal-dialog modal-lg" role="document"> <div class="modal-content"> <div class="modal-header"> <h5 class="modal-title">{{ __('index.register.profile.modal-h') }}</h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button> </div> <div class="modal-body"> <div class="img-container"> <div class="row"> <div class="col-md-8"> <img src="" id="sample_image" class="img-crop"/> </div> <div class="col-md-4"> <div class="preview"></div> </div> </div> </div> </div> <div class="modal-footer"> <button type="button" id="crop" class="btn btn-primary">{{ __('index.register.profile.modal-crop') }}</button> <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('index.register.profile.modal-c') }}</button> </div> </div> </div> </div>

        <div class="modal fade" id="modalagreement" tabindex="-1" role="dialog" aria-labelledby="modalagreementLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <form action="{{ route('new.agreement') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalagreementLabel">{{ __('index.agreement.title') }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <h2>{{ __('index.agreement.text.text1') }} <b>{{ __('index.agreement.text.text2') }}</b> {{ __('index.agreement.text.text3') }} <b>{{ __('index.agreement.text.text4') }}</b> {{ __('index.agreement.text.text5') }}</h2>
                        <div class="form-group mb-2">
                            <label for="agreement"> {{ __('index.agreement.label1') }} <br> {{ __('index.agreement.label2') }}
                                <a href="{{ url('/files/zgoda_wolontariat_pelnoletni.pdf') }}" target="_blank">{{ __('index.agreement.adult') }}</a> |
                                <a href="{{ url('/files/zgoda_wolontariat_niepelnoletni.pdf') }}" target="_blank">{{ __('index.agreement.minor') }}</a>
                            </label>
                            <input type="file" class="form-control" accept=".pdf" name="agreement" required>
                            <small>{{ __('index.agreement.file') }}: 7MB</small><br>
                            @error('agreement')
                                <span class="text-danger small" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            @if (session('agreement_err') == true)
                                <span class="text-danger small" role="alert">
                                    <strong>{{ __('index.agreement.err') }}</strong>
                                </span>
                            @endif
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger" id="forget-button">Nie przypominaj w tej sesji</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('main.cancel') }}</button>
                        <button type="submit" class="btn btn-primary" id="create-button-category">{{ __('volunteer.form.form.sign.3.modal.send') }}</button>
                      </div>
                </form>
              </div>
            </div>
          </div>

    </div>

    @include('include.cookies')

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>

    <script src="{{ url('/assets/vendor/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ url('/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ url('/assets/vendor/js-cookie/js.cookie.js') }}"></script>
    <script src="{{ url('/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
    <script src="{{ url('/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js') }}"></script>
    <script src="{{ url('/assets/js/argon.js') }}"></script> <!-- ?v=1.2.0 -->

    @if (Route::currentRouteName() != 'c.profile')
    <script src="{{ url('/js/functions/crop.js') }}"></script>
    @endif

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.10/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/Wruczek/Bootstrap-Cookie-Alert@gh-pages/cookiealert.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places&callback=initMap&channel=GMPSB_addressselection_v1_cABC" async defer></script>

    @yield('script')

    <script>
        @auth

            @if (Auth::user()->role == 'volunteer' && Auth::user()->agreement_date < date('Y-m-d') && Auth::user()->condition == 1 && session('remember_agreement') != true)
            var _token = $('meta[name="csrf-token"]').attr('content');
            $('#modalagreement').modal('show');
                $('#forget-button').on('click', function(){
                    $('#modalagreement').modal('hide');
                    $.ajax({
                        url: "{{ route('v.agreement.cancel') }}",
                        type:"POST",
                        data:{
                        _token: _token
                        },
                        success:function(response){
                        console.log(response);
                        if(response) {}
                        },
                        error: function(error) {
                            console.log(error);
                        }
                    });
                });
            @endif
        @endauth
    </script>

<script>
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
</script>

@if (session('agreement') == true)
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Sukces!',
            text: 'Twoja zgoda zostana wysłana pomyślnie!',
            showConfirmButton: false,
            timer: 4000
        });
    </script>
@endif

@if (session('agreement_err') == true)
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Błąd!',
            text: 'Wystąpił błąd podczas wysyłania zgody! Spróbuj ponownie później.',
            showConfirmButton: false,
            timer: 4000
        });
    </script>
@endif

</body>
</html>
