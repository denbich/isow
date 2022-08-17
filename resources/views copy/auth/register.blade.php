@extends('layouts.app')

@section('title')
{{ __('main.signin') }}
@endsection

@section('body')
class="bg-default"
@endsection

@section('content')

<nav id="navbar-main" class="navbar navbar-horizontal navbar-transparent navbar-main navbar-expand-lg navbar-light">
    <div class="container text-primary">
        <div class="navbar-brand">
            <a class="" href="{{ route('home') }}">
                <img class="h-25" style="max-height: 110px" src="{{ url('/img/logowmrwhite.svg') }}">
              </a>
              <a class="" href="{{ route('help_ukraine') }}" rel="noopener noreferrer">
                <img src="https://upload.wikimedia.org/wikipedia/commons/4/49/Flag_of_Ukraine.svg" alt="">
              </a>
        </div>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars"></i>
      </button>
      <div class="navbar-collapse navbar-custom-collapse collapse" id="navbar-collapse">
        <div class="navbar-collapse-header">
          <div class="row">
            <div class="col-8 collapse-brand text-center mx-auto">
              <a href="{{ route('home') }}">
                <img class="h-100" style="max-height: 110px; min-height:100px;" src="{{ url('/img/logowmr1.svg') }}" alt="wmr logo">

              </a>
              <a href="{{ route('help_ukraine') }}" class="w-100 text-center mx-auto" rel="noopener noreferrer">
                <img src="https://upload.wikimedia.org/wikipedia/commons/4/49/Flag_of_Ukraine.svg" class="text-center mx-auto my-2" alt="Ukraine flag">
            </a>
            </div>
            <div class="col-4 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a href="{{ route('home') }}" class="nav-link text-center">
                <span class="nav-link-inner--text">{{ __('home.title') }}</span>
              </a>
            </li>
            <li class="nav-item">
                <li class="nav-item text-center">
                    <div class="dropdown">
                      <a class="nav-link dropdown-toggle text-center" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{__('home.socialmedia.title')}}</a>

                      <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item d-none" href=""><i class="fas fa-info-circle"></i> O nas</a>
                        <a class="dropdown-item" href="https://facebook.com/wolontariat.rybnik" target="_blank"><i class="fab fa-facebook-square"></i> {{ __('home.socialmedia.facebook') }}</a>
                        <a class="dropdown-item" href="https://instagram.com/wolontariat.rybnik" target="_blank"><i class="fab fa-instagram"></i> {{ __('home.socialmedia.instagram') }}</a>
                      </div>
                    </div>
                  </li>
            </li>
            <li class="nav-item">
                <a href="{{ route('login') }}" class="nav-link text-center">
                    <span class="nav-link-inner--text">{{ __('main.login') }}</span>
                </a>
            </li>

          </ul>
        <hr class="d-lg-none" />
        <ul class="navbar-nav align-items-lg-center ml-lg-auto">
          @include('include.lang')

          <li class="nav-item d-lg-block ml-lg-4 text-center">
            <a href="{{ route('register') }}" class="btn btn-neutral btn-icon text-center">
              <span class="btn-inner--icon">
                <i class="fas fa-handshake mr-2"></i>
              </span>
              <span class="nav-link-inner--text">{{ __('main.signin') }}</span>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="main-content">
    <div class="header bg-gradient-primary py-8 py-lg-8 pt-lg-9">
        <div class="container">
          <div class="header-body text-center mb-6">
            <div class="row justify-content-center">
              <div class="col-xl-8 col-lg-8 col-md-8 px-5">
              </div>
            </div>
          </div>
        </div>
        <div class="separator separator-bottom separator-skew zindex-100">
          <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
            <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
          </svg>
        </div>
      </div>
    <!-- Page content -->
    <div class="container mt--8 pb-5">
      <div class="row justify-content-center">
        <div class="col-lg-7 col-md-8">
          <div class="card bg-secondary border-0">
            <div class="card-header bg-transparent pb-3 text-center">
                <a href="{{ route('login') }}"><img src="{{ url('/img/mosir-logo1.svg') }}" class="text-center"></a>
                <div class="mt-2 h1">{{ __('index.register.title') }}</div>
            </div>
            <div class="card-body px-lg-5 pb-lg-5 pt-lg-3">
              <form method="post" action="{{ route('register') }}" role="form" id="register-form" enctype="multipart/form-data">
              @csrf
              <input id="hidden" type="hidden" name="phone">
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-id-card-alt"></i></span>
                    </div>
                    <input class="form-control" placeholder="{{ __('index.register.firstname') }}" type="text" name="firstname" value="{{ old('firstname', '') }}" max="255" required>
                  </div>
                @error('firstname')
                    <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
                <div class="form-group">
                    <div class="input-group input-group-merge input-group-alternative mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-id-card-alt"></i></span>
                      </div>
                      <input class="form-control" placeholder="{{ __('index.register.lastname') }}" type="text" name="lastname" value="{{ old('lastname', '') }}" max="255" required>
                    </div>
                    @error('lastname')
                    <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                  </div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" placeholder="{{ __('index.register.password') }}" type="password" name="password" max="255" required>
                  </div>
                  @error('password')
                    <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
                <div class="text-muted font-italic d-none">
                    <small>password strength: <span class="text-success font-weight-700">strong</span></small>
                </div>
                <div class="form-group">
                    <div class="input-group input-group-merge input-group-alternative">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                      </div>
                      <input class="form-control" placeholder="{{ __('index.register.c-password') }}" type="password" name="password_confirmation" max="255" required>
                    </div>
                    @error('repeat_password')
                    <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                  </div>

                  <div class="form-group">
                    <div class="input-group input-group-merge input-group-alternative mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                      </div>
                      <input class="form-control" placeholder="{{ __('index.register.email') }}" type="email" name="email" value="{{ old('email', '') }}" max="255" >
                    </div>
                    @error('email')
                    <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                  </div>
                  <div class="form-group">
                    <div class="input-group input-group-alternative mb-3">
                        <input class="form-control w-100" placeholder="{{ __('index.register.phone') }}" type="tel" name="telephone" value="{{ old('telephone', '') }}" max="255" id="telephone" required>
                      </div>
                    @error('telephone')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <div class="form-group">
                  <div class="row">
                    <div class="col-lg-6">
                        <div class="input-group input-group-merge input-group-alternative mb-3">
                          <input class="form-control" placeholder="{{ __('index.register.street') }}" type="text" name="street" value="{{ old('street', '') }}" max="255" required>
                        </div>
                        @error('street')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                      </div>
                      <div class="col-lg-6">
                        <div class="input-group input-group-merge input-group-alternative mb-3">
                          <input class="form-control" placeholder="{{ __('index.register.number') }}" type="text" name="house_number" value="{{ old('house_number', '') }}" max="255" required>
                        </div>
                        @error('house_number')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                      </div>
                  </div>

                    <div class="input-group input-group-merge input-group-alternative mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-home"></i></span>
                      </div>
                      <input class="form-control" placeholder="{{ __('index.register.city') }}" type="text" name="city" value="{{ old('city', '') }}" max="255" required>
                    </div>
                    @error('city')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <div class="input-group input-group-merge input-group-alternative mb-3">
                        <textarea class="form-control" name="description" id="description" style="resize: none" cols="30" rows="4" placeholder="{{ __('Powiedz coś o sobie w paru słowach') }}">{{ old('description', '') }}</textarea>
                      </div>

                    @error('description')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="tshirt_size">{{ __('index.register.tshirt') }} <span class="text-danger" role="alert">*</span></label>
                      <div class="input-group input-group-merge input-group-alternative mb-3">
                        <select class="form-control" id="tshirt_size" name="tshirt_size" required>
                            <option value="XS">XS</option>
                            <option value="S">S</option>
                            <option value="M">M</option>
                            <option value="L">L</option>
                            <option value="XL">XL</option>
                            <option value="XXL">XXL</option>
                        </select>
                      </div>
                      @error('tshirt_size')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="birth">{{ __('index.register.birth') }} <span class="text-danger" role="alert">*</span></label>
                    <div class="input-group input-group-merge input-group-alternative mb-3">
                        <input type="date" class="form-control" name="birth" value="{{ old('birth', '') }}" required>
                      </div>
                      @error('birth')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="Gender">{{ __('index.register.gender') }}  <span class="text-danger" role="alert">*</span></label><br>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="gender_f" name="gender" class="custom-control-input" value="f" required>
                        <label class="custom-control-label" for="gender_f">{{ __('index.register.gender-f') }}</label>
                      </div>
                      <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="gender_m" name="gender" class="custom-control-input" value="m" required>
                        <label class="custom-control-label" for="gender_m">{{ __('index.register.gender-m') }}</label>
                      </div>
                </div>
                <div class="form-group">
                    @error('gender')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="upload_image" class="mb-2">{{ __('index.register.profile.text') }} <span class="text-danger" role="alert">*</span> <a href="#modalprofilehelp">Krótki poradnik jak poprawnie dodać zdjęcie</a></label>

                    <label for="upload_image" class="w-100">
                        <a class="btn btn-info text-dark btn-icon w-100">
                            <span class="btn-inner--icon"><i class="fas fa-camera"></i></span>
                            <span class="btn-inner--text">{{ __('index.register.profile.button') }}</span>
                        </a>
                        <input type="file" name="image" class="image d-none" id="upload_image" accept="image/*">
                        <input type="hidden" name="profile" id="icon_photo" value="" required>
                    </label>
                    <p class="text-success text-center" id="text-photo"></p>
                    @error('profile')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group mb-2">
                    <label for="agreement">{{ __('index.register.agreement.text1') }} <span class="text-danger" role="alert">*</span> <br>
                        {{ __('index.register.agreement.text2') }}:
                        <a class="font-weight-800" href="{{ url('/files/zgoda_wolontariat_pelnoletni.pdf') }}" target="_blank">{{ __('index.register.agreement.adult') }}</a> |
                        <a class="font-weight-800" href="{{ url('/files/zgoda_wolontariat_niepelnoletni.pdf') }}" target="_blank">{{ __('index.register.agreement.minor') }}</a><br>
                    <div class="custom-control custom-radio custom-control-inline mt-2">
                        <input type="radio" id="agreement_later" name="agreement_radio" class="custom-control-input" value="l" required checked>
                        <label class="custom-control-label" for="agreement_later">{{ __('Przy pierwszym wydarzeniu dam osobiście') }}</label>
                      </div>
                      <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="agreement_now" name="agreement_radio" class="custom-control-input" value="n" required>
                        <label class="custom-control-label" for="agreement_now">{{ __('Wrzucam ją teraz') }}</label>
                      </div>
                </div>
                <div class="form-group" id="message-div">
                    <h2 class="text-center text-danger">Wolontariuszu, pamiętaj! Na pierwsze wydarzenie, niezwłocznie przynieś wydrukowaną i podpisaną zgodę.</h2>
                </div>
                <div class="form-group d-none" id="agreement-div">
                    <a href="#modalagreementhelp" class="">Krótki poradnik jak poprawnie dodać zgodę</a>
                    <input type="file" class="form-control mt-2" accept=".pdf,.png,.jpg,.jepg" name="agreement[]" multiple>
                    <small>{{ __('index.register.agreement.size') }}: 7MB</small><br>
                </div>
                <div class="form-group">
                    @error('agreement')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="row mt-1 mb-1">
                  <div class="col-12">
                    <div class="custom-control custom-control-alternative custom-checkbox d-none">
                        <input class="custom-control-input" id="AllCheckRegister" type="checkbox" name="all_check">
                        <label class="custom-control-label" for="AllCheckRegister">
                          <span class="text-muted">Zaznacz wszystko</span>
                        </label>
                      </div>
                    <div class="custom-control custom-control-alternative custom-checkbox d-none">
                        <input class="custom-control-input" id="marketingCheckRegister" type="checkbox" name="marketing">
                        <label class="custom-control-label" for="marketingCheckRegister">
                          <span class="text-muted">Zgadzam na przesyłanie przez WMR wiadomości marketingowych</span>
                        </label>
                      </div>
                    <div class="custom-control custom-control-alternative custom-checkbox">
                      <input class="custom-control-input" id="customCheckRegister" type="checkbox" name="terms" required>
                      <label class="custom-control-label" for="customCheckRegister">
                        <span class="text-muted">{{ __('index.register.accept') }} <a href="{{ route('regulations') }}" target="_blank">{{ __('index.register.accept-r') }}</a> {{ __('main.and') }} <a href="{{ route('codex') }}" target="_blank">{{ __('index.register.accept-c') }}</a></span>
                      </label>
                    </div>
                  </div>
                  @error('terms')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="text-center mt-4">
                    <!--<div class="g-recaptcha" data-sitekey="{{ env('RECAPTCHA_SITE_KEY') }}"></div>-->
                    {!! NoCaptcha::display() !!}
                    @error('g-recaptcha-response')
                        <span class="text-danger text-left" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <button type="submit" class="btn btn-primary mt-4 w-100">{{ __('main.signin') }}</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Footer -->
  @include('auth.footer')



@endsection

@section('style')
{!! NoCaptcha::renderJs(session('locale')) !!}
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.16/js/intlTelInput.min.js" integrity="sha512-Po9nSdYOcWIcoADdRjkAbRYPpR8OHjxzA/3RDUERZcDewTLzRTxbG4bUX7Sr7lVEcO3wTCzphdOBWgNFKVmxaA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.16/css/intlTelInput.css" integrity="sha512-gxWow8Mo6q6pLa1XH/CcH8JyiSDEtiwJV78E+D+QP0EVasFs8wKXq16G8CLD4CJ2SnonHr4Lm/yY2fSI2+cbmw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<style>
    .iti{
        width: 100%;
    }
</style>
@endsection

@section('script')
<script>
    var input = document.querySelector("#telephone");
    var iti = window.intlTelInput(input, {
    initialCountry: "auto",
    nationalMode: true,
    preferredCountries: ['pl', 'ua', 'cz'],
    formatOnDisplay:true,
    onlyCountries: ["al", "ad", "at", "by", "be", "ba", "bg", "hr", "cz", "dk",
    "ee", "fo", "fi", "fr", "de", "gi", "gr", "va", "hu", "is", "ie", "it", "lv",
    "li", "lt", "lu", "mk", "mt", "md", "mc", "me", "nl", "no", "pl", "pt", "ro",
    "ru", "sm", "rs", "sk", "si", "es", "se", "ch", "ua", "gb"],
    initialCountry: 'pl',
    utilsScript:
       "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
    });

    $("#register-form").submit(function() {$("#hidden").val(iti.getNumber());});

</script>

<script>
     $('input[type=radio][name=agreement_radio]').change(function() {
   if (this.value == 'l') {
    $('#agreement-div').addClass('d-none');
    }
  else if (this.value == 'n') {
    $('#agreement-div').removeClass('d-none');
 }
 });
</script>
@endsection
