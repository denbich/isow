
@extends('layouts.app')

@section('title') {{ __('Tworzenie sponsora nagród') }} @endsection

@section('body') bg-gray-100 @endsection

@section('content')
<div class="min-height-300 bg-primary position-absolute w-100" id="background-color-div"></div>
  <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
    <div class="sidenav-header" style="min-height: 170px;">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      @include('coordinator.include.logo')
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse w-auto h-auto" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        @include('coordinator.include.dashboard')
        @include('coordinator.include.volunteer')
        @include('coordinator.include.chat')
        @include('coordinator.include.send_mail')
        @include('coordinator.include.forms')
        @include('coordinator.include.posts')
        @include('coordinator.include.prizes')

        <li class="nav-item ps-1 pt-1">
            <a data-bs-toggle="collapse" href="#sponsors" class="nav-link active py-2" aria-controls="sponsors" role="button" aria-expanded="true">
                    <i class="fa-solid fa-hand-holding-dollar text-primary text-sm opacity-10"></i>
                <span class="nav-link-text ms-1">{{ __('Sponsorzy nagród') }}</span>
            </a>
            <div class="collapse show" id="sponsors">
                <ul class="nav ms-4">
                    <li class="nav-item">
                        <a href="{{ route('c.sponsor.search') }}" class="nav-link">
                          <span class="sidenav-normal"> {{ __('Szukaj') }} </span>
                        </a>
                      </li>
                    <li class="nav-item">
                      <a href="{{ route('c.sponsor.list') }}" class="nav-link">
                        <span class="sidenav-normal"> {{ __('Lista') }} </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="{{ route('c.sponsor.create') }}" class="nav-link active">
                        <span class="sidenav-normal"> {{ __('Utwórz nowy') }} </span>
                      </a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item mt-3">
            <h6 class="ps-3 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">{{ __('Inne') }}</h6>
          </li>
          @include('coordinator.include.other')
      </ul>
    </div>
  </aside>
  <main class="main-content position-relative border-radius-lg ">
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
        <div class="container-fluid py-1 px-3">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
              <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="{{ route('c.dashboard') }}"><i class="fa-solid fa-house"></i></a></li>
              <li class="breadcrumb-item text-sm text-white" aria-current="page">{{ __('Sponsorzy') }}</li>
              <li class="breadcrumb-item text-sm text-white active" aria-current="page">{{ __('Nowy') }}</li>
            </ol>
            <h6 class="font-weight-bolder text-white mb-0">{{ __('Tworzenie sponsora') }}</h6>
          </nav>
          @include('coordinator.include.nav')
        </div>
      </nav>

    <div class="container-fluid py-4 min-vh-100">
        <div class="row">
            <div class="col-lg-6 col-12 d-flex ms-auto">
               <a href="{{ route('c.sponsor.list') }}" class="btn btn-icon bg-gradient-dark ms-auto">
                <span class="btn-inner--icon me-2"><i class="fa-solid fa-arrow-left"></i></span>
               <span class="btn-inner--text">{{ __('Powrót') }}</span>
            </a>
            </div>
         </div>

            <div class="my-2">
                <div class="card h-100">
                    <div class="card-header">
                        <h5 class="mb-0">{{ __('Utwórz sponsora') }}</h5>
                  </div>
                  <div class="card-body">
                    <form action="{{ route('c.sponsor.store') }}" method="post" id="sponsor_form">
                        @csrf
                        <input id="hidden" type="hidden" name="phone">
                    <div class="row">
                        <div class="col-lg-8 mx-auto">
                            <div class="row">
                                <div class="col-lg-6">
                                  <div class="form-group">
                                      <label for="name" class="form-control-label">Nazwa</label>
                                      <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" max="255" value="{{ old('name', '') }}" required>
                                      @error('name')
                                        <div class="text-danger w-100 d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                  </div>
                                  <div class="form-group">
                                      <label for="address" class="form-control_label">Adres oddziału</label>
                                      <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" id="address" max="255" value="{{ old('address', '') }}" required>
                                      @error('address')
                                        <div class="text-danger w-100 d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                  </div>
                                  <div class="form-group">
                                      <label for="website" class="form-control-label">Strona WWW (Nie wymagany)</label>
                                      <input type="text" class="form-control @error('website') is-invalid @enderror" name="website" id="website" value="{{ old('website', '') }}" max="255">
                                      @error('website')
                                        <div class="text-danger w-100 d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                  </div>
                                  <div class="form-group">
                                      <label for="facebook" class="form-control-label">Facebook (Nie wymagany)</label>
                                          <div class="input-group">
                                              <span class="input-group-text" id="basic-addon1">@</span>
                                              <input type="text" class="form-control @error('facebook') is-invalid @enderror" name="facebook" id="facebook" max="255" aria-describedby="basic-addon1" value="{{ old('facebook', '') }}">
                                          </div>
                                        @error('facebook')
                                          <div class="text-danger w-100 d-block">
                                              {{ $message }}
                                          </div>
                                      @enderror
                                  </div>
                                </div>
                                <div class="col-lg-6">
                                  <div class="form-group">
                                      <label for="description" class="form-control-label">Krótki opis sponsora (Nie wymagany)</label>
                                      <input type="text" class="form-control @error('description') is-invalid @enderror" name="description" id="description" max="255" value="{{ old('description', '') }}">
                                      @error('description')
                                        <div class="text-danger w-100 d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                  </div>
                                  <div class="form-group">
                                      <label for="telephone" class="form-control-label">Numer telefonu</label>
                                      <input type="tel" class="form-control @error('phone') is-invalid @enderror @error('phone') is-invalid @enderror" name="telephone" id="telephone" max="255" value="{{ old('telephone', '') }}" required>
                                      @error('telephone')
                                        <div class="text-danger w-100 d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    @error('phone')
                                        <div class="text-danger w-100 d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                  </div>
                                  <div class="form-group">
                                      <label for="email" class="form-control-label">Adres email (Nie wymagany)</label>
                                      <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" max="255" value="{{ old('email', '') }}">
                                      @error('email')
                                        <div class="text-danger w-100 d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                  </div>
                                  <div class="form-group">
                                      <label for="instagram" class="form-control-label">Instagram (Nie wymagany)</label>
                                          <div class="input-group">
                                              <span class="input-group-text" id="basic-addon2">@</span>
                                              <input type="text" class="form-control @error('instagram') is-invalid @enderror" name="instagram" id="instagram" max="255" aria-describedby="basic-addon2" value="{{ old('instagram', '') }}">
                                          </div>
                                          @error('instagram')
                                        <div class="text-danger w-100 d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                  </div>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-lg-6">
                                    <label for="upload_image" class="w-100">
                                        <a class="btn btn-primary btn-icon w-100 text-white">
                                            <span class="btn-inner--icon"><i class="far fa-images"></i></span>
                                            <span class="btn-inner--text">{{ __('Dodaj logo sponsora') }}</span>
                                        </a>
                                        <input type="file" name="image" class="image d-none" id="upload_image" accept="image/*">
                                        <input type="hidden" name="logo" id="icon_photo" value="">
                                    </label>
                                    <p class="text-success text-center" id="text-photo"></p>
                                    @error('logo')
                                    <div class="text-danger w-100 d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <hr>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">U{{ __('twórz sponsora nagród') }}</button>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
      @include('coordinator.include.footer')
    </div>
  </main>
@endsection

@section('style')
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.16/js/intlTelInput.min.js" integrity="sha512-Po9nSdYOcWIcoADdRjkAbRYPpR8OHjxzA/3RDUERZcDewTLzRTxbG4bUX7Sr7lVEcO3wTCzphdOBWgNFKVmxaA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.16/css/intlTelInput.css" integrity="sha512-gxWow8Mo6q6pLa1XH/CcH8JyiSDEtiwJV78E+D+QP0EVasFs8wKXq16G8CLD4CJ2SnonHr4Lm/yY2fSI2+cbmw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@push('scripts')
<script>
    var input = document.querySelector("#telephone");
    var iti = window.intlTelInput(input, {
    initialCountry: "pl",
    nationalMode: true,
    preferredCountries: ['pl', 'ua', 'cz'],
    formatOnDisplay:true,
    onlyCountries: ["al", "ad", "at", "by", "be", "ba", "bg", "hr", "cz", "dk",
    "ee", "fo", "fi", "fr", "de", "gi", "gr", "va", "hu", "is", "ie", "it", "lv",
    "li", "lt", "lu", "mk", "mt", "md", "mc", "me", "nl", "no", "pl", "pt", "ro",
    "ru", "sm", "rs", "sk", "si", "es", "se", "ch", "ua", "gb"],
    utilsScript:
       "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
    });

    $("#sponsor_form").submit(function() {
        $("#telephone").val($("#telephone").val().replace(/[^+\d]+/g, ""));
        $("#hidden").val(iti.getNumber().replace(/[^+\d]+/g, ""));
    });

</script>
@endpush
