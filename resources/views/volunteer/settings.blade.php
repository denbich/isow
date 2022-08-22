
@extends('layouts.app')

@section('title') {{ __('volunteer.menu.dropdown.settings') }} @endsection
@section('body') bg-gray-100 @endsection

@section('content')
<div class="min-height-300 bg-primary position-absolute w-100" id="background-color-div"></div>
  <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
    <div class="sidenav-header" style="min-height: 170px;">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      @include('volunteer.include.logo')
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse w-auto h-auto" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        @include('volunteer.include.dashboard')
        @include('volunteer.include.chat')
        @include('volunteer.include.posts')
        @include('volunteer.include.forms')
        @include('volunteer.include.prizes')

        <li class="nav-item mt-3">
            <h6 class="ps-3 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">{{ __('volunteer.sidebar.other') }}</h6>
          </li>
          <li class="nav-item ps-1 pt-1">
            <a class="nav-link" href="{{ route('v.calendar') }}">
                <i class="fa-solid fa-calendar-days text-primary text-sm opacity-10"></i>
              <span class="nav-link-text ms-1">{{ __('volunteer.sidebar.calendar') }}</span>
            </a>
          </li>
          <li class="nav-item ps-1 pt-1">
            <a class="nav-link active" href="{{ route('v.settings') }}">
                <i class="fa-solid fa-cog text-primary text-sm opacity-10"></i>
              <span class="nav-link-text ms-1">{{ __('volunteer.menu.dropdown.settings') }}</span>
            </a>
          </li>
          <li class="nav-item ps-1 pt-1">
            <a class="nav-link " href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fa-solid fa-arrow-right-from-bracket text-primary text-sm opacity-10"></i>
              <span class="nav-link-text ms-1">{{ __('main.logout') }}</span>
            </a>
          </li>

      </ul>
    </div>
  </aside>
  <main class="main-content position-relative border-radius-lg ">
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
        <div class="container-fluid py-1 px-3">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
              <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="{{ route('v.dashboard') }}"><i class="fa-solid fa-house"></i></a></li>
              <li class="breadcrumb-item text-sm text-white active" aria-current="page">{{ __('volunteer.menu.dropdown.settings') }}</li>
            </ol>
            <h6 class="font-weight-bolder text-white mb-0">{{ __('volunteer.menu.dropdown.settings') }}</h6>
          </nav>
          @include('volunteer.include.nav')
        </div>
      </nav>
      <div class="container-fluid my-5 py-2">
        {{ 1 }}
        <div class="row mb-5">
           <div class="col-lg-3">
              <div class="card position-sticky top-1">
                 <ul class="nav flex-column bg-white border-radius-lg p-3">
                    <li class="nav-item">
                       <a class="nav-link text-body d-flex align-items-center" data-scroll="" href="#profile">
                       <i class="ni ni-spaceship me-2 text-dark opacity-6"></i>
                       <span class="text-sm">{{ __('volunteer.menu.dropdown.profile') }}</span>
                       </a>
                    </li>
                    <li class="nav-item pt-2">
                       <a class="nav-link text-body d-flex align-items-center" data-scroll="" href="#basic-info">
                       <i class="ni ni-books me-2 text-dark opacity-6"></i>
                       <span class="text-sm">{{ __('Podstawowe informacje') }}</span>
                       </a>
                    </li>
                    <li class="nav-item pt-2">
                       <a class="nav-link text-body d-flex align-items-center" data-scroll="" href="#password">
                       <i class="ni ni-atom me-2 text-dark opacity-6"></i>
                       <span class="text-sm">{{ __('volunteer.settings.change-pwd.title') }}</span>
                       </a>
                    </li>
                    <li class="nav-item pt-2">
                       <a class="nav-link text-body d-flex align-items-center" data-scroll="" href="#2fa">
                       <i class="ni ni-ui-04 me-2 text-dark opacity-6"></i>
                       <span class="text-sm">{{ __('Uwierzytelnianie dwuskładnikowe') }}</span>
                       </a>
                    </li>
                    <li class="nav-item pt-2">
                       <a class="nav-link text-body d-flex align-items-center" data-scroll="" href="#accounts">
                       <i class="ni ni-badge me-2 text-dark opacity-6"></i>
                       <span class="text-sm">{{ __('Połączone konta') }}</span>
                       </a>
                    </li>
                    <li class="nav-item pt-2">
                       <a class="nav-link text-body d-flex align-items-center" data-scroll="" href="#notifications">
                       <i class="ni ni-bell-55 me-2 text-dark opacity-6"></i>
                       <span class="text-sm">{{ __('Powiadomienia') }}</span>
                       </a>
                    </li>
                    <li class="nav-item pt-2">
                       <a class="nav-link text-body d-flex align-items-center" data-scroll="" href="#sessions">
                       <i class="ni ni-watch-time me-2 text-dark opacity-6"></i>
                       <span class="text-sm">{{ __('Aktywne sesje') }}</span>
                       </a>
                    </li>
                    <li class="nav-item pt-2">
                       <a class="nav-link text-body d-flex align-items-center" data-scroll="" href="#agreement">
                       <i class="ni ni-settings-gear-65 me-2 text-dark opacity-6"></i>
                       <span class="text-sm">{{ __('Zgoda i umowa') }}</span>
                       </a>
                    </li>
                 </ul>
              </div>
           </div>
           <div class="col-lg-9 mt-lg-0 mt-4">
              <div class="card card-body" id="profile">
                 <div class="row justify-content-center align-items-center">
                    <div class="col-sm-auto col-4">
                       <div class="avatar avatar-xl position-relative">
                          <img src="{{ url(Auth::user()->photo_src) }}" alt="bruce" class="w-100 border-radius-lg shadow-sm">
                       </div>
                    </div>
                    <div class="col-sm-auto col-8 my-auto">
                       <div class="h-100">
                          <h5 class="mb-1 font-weight-bolder">{{ Auth::user()->firstname." ".Auth::user()->lastname }}</h5>
                          <p class="mb-0 font-weight-bold text-sm">{{ __('Wolontariusz') }}</p>
                       </div>
                    </div>
                    <div class="col-sm-auto ms-sm-auto mt-sm-0 mt-3 d-flex">
                     </div>
                 </div>
              </div>
              <div class="card mt-4" id="basic-info">
                 <div class="card-header">
                    <h5>{{ __('Postawowe informacje') }}</h5>
                 </div>
                 <div class="card-body pt-0">
                     <form action="{{ route('v.settings.profile') }}" method="POST" role="form" id="updateprofile_form">
                        <input id="hidden" type="hidden" name="phone">
                         @csrf
                    <div class="row">
                       <div class="col-lg-6">
                          <label class="form-label" for="firstname">{{ __('index.register.firstname') }}</label>
                          <div class="input-group">
                             <input id="firstname" name="firstname" class="form-control @error('firstname') is-invalid @enderror" type="text" value="{{ Auth::user()->firstname }}" required>
                          </div>
                          @error('firstname')
                            <span class="text-danger text-sm" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                       </div>
                       <div class="col-lg-6">
                          <label class="form-label" for="lastname">{{ __('index.register.lastname') }}</label>
                          <div class="input-group">
                             <input id="lastname" name="lastname" class="form-control @error('lastname') is-invalid @enderror" type="text" value="{{ Auth::user()->lastname }}" required>
                          </div>
                       </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                           <label class="form-label mt-4" for="email">{{ __('index.register.email') }}</label>
                           <div class="input-group">
                             <input id="email" name="email" class="form-control @error('email') is-invalid @enderror" type="email" value="{{ Auth::user()->email }}" required>
                           </div>
                           @error('email')
                             <span class="text-danger text-sm" role="alert">
                                 <strong>{{ $message }}</strong>
                             </span>
                         @enderror
                        </div>
                        <div class="col-lg-6">
                         <label class="form-label mt-4" for="telephone">{{ __('index.register.phone') }}</label>
                         <div class="form-group mb-0">
                           <input id="telephone" name="telephone" class="form-control @error('telephone', 'phone') is-invalid @enderror w-100" type="tel" value="{{ Auth::user()->telephone }}" required>
                         </div>
                         @error('telephone')
                           <span class="text-danger text-sm" role="alert">
                               <strong>{{ $message }}</strong>
                           </span>
                       @enderror
                        </div>
                     </div>

                     <div class="row">
                        <div class="col-lg-4">
                           <label class="form-label mt-4" for="street">{{ __('index.register.street') }}</label>
                           <input id="street" name="street" class="form-control @error('street') is-invalid @enderror" type="ext" value="{{ $volunteer->street }}" required>
                         @error('street')
                             <span class="text-danger text-sm" role="alert">
                                 <strong>{{ $message }}</strong>
                             </span>
                         @enderror
                        </div>
                        <div class="col-lg-4">
                         <label class="form-label mt-4" for="house_number">{{ __('index.register.number') }}</label>
                         <div class="input-group">
                            <input id="house_number" name="house_number" class="form-control @error('house_number') is-invalid @enderror" type="ext" value="{{ $volunteer->house_number }}" required>
                            @error('house_number')
                                 <span class="text-danger text-sm" role="alert">
                                     <strong>{{ $message }}</strong>
                                 </span>
                             @enderror
                         </div>
                        </div>
                        <div class="col-lg-4">
                         <label class="form-label mt-4" for="city">{{ __('index.register.city') }}</label>
                         <input id="city" name="city" class="form-control @error('city') is-invalid @enderror" type="ext" value="{{ $volunteer->city }}" required>
                         @error('city')
                             <span class="text-danger text-sm" role="alert">
                                 <strong>{{ $message }}</strong>
                             </span>
                         @enderror
                        </div>
                     </div>
                    <div class="row">
                       <div class="col-lg-4">
                          <label class="form-label mt-4">{{ __('index.register.gender') }}</label>
                          <select class="form-control @error('gender') is-invalid @enderror w-100" id="gender" name="gender" required>
                            <option value="m" @selected(Auth::user()->gender == "m")>{{ __('index.register.gender-m') }}</option>
                            <option value="f" @selected(Auth::user()->gender == "f")>{{ __('index.register.gender-f') }}</option>
                        </select>
                        @error('gender')
                            <span class="text-danger text-sm" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                       </div>
                       <div class="col-lg-4">
                        <label class="form-label mt-4" for="birth">{{ __('index.register.birth') }}</label>
                            <div class="input-group">
                            <input id="birth" name="birth" class="form-control @error('birth') is-invalid @enderror" type="date" value="{{ $volunteer->birth }}" required>
                            @error('birth')
                                    <span class="text-danger text-sm" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                       </div>
                       <div class="col-lg-4">
                        <label class="form-label mt-4" for="tshirt_size">{{ __('index.register.tshirt') }}</label>
                        <div class="input-group">
                          <select class="form-control @error('tshirt_size') is-invalid @enderror w-100" id="tshirt_size" name="tshirt_size" required>
                              <option value="XS" @selected($volunteer->tshirt_size == "XS" || $volunteer->tshirt_size == "xs")>XS</option>
                              <option value="S" @selected($volunteer->tshirt_size == "S" || $volunteer->tshirt_size == "s")>S</option>
                              <option value="M" @selected($volunteer->tshirt_size == "M" || $volunteer->tshirt_size == "m")>M</option>
                              <option value="L" @selected($volunteer->tshirt_size == "L" || $volunteer->tshirt_size == "l")>L</option>
                              <option value="XL" @selected($volunteer->tshirt_size == "XL" || $volunteer->tshirt_size == "xl")>XL</option>
                              <option value="XXL" @selected($volunteer->tshirt_size == "XXL" || $volunteer->tshirt_size == "xxl")>XXL</option>
                          </select>
                          @error('tshirt_size')
                              <span class="text-danger text-sm" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                        </div>
                     </div>
                    </div>
                    <div class="row">
                       <div class="col-lg-6">
                          <label class="form-label mt-4" for="pesel">{{ __('index.register.pesel') }}</label>
                          <div class="input-group">
                             <input id="pesel" name="pesel" class="form-control @error('pesel') isinvalid @enderror" type="text" value="{{ decrypt($volunteer->pesel) }}" required minlength="11" maxlength="11">
                          </div>
                          @error('pesel')
                            <span class="text-danger text-sm" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                       </div>

                       <div class="col-lg-6">
                        <label class="form-label mt-4" for="language">{{ __('Preferowany język aplikacji') }}</label>
                        <select class="form-control @error('language') is-invalid @enderror w-100" id="language" name="language" required>
                            <option value="pl" @selected(Auth::user()->language == "pl")>{{ __('main.langlist.current.polish') }} ({{ __('main.langlist.foreign.polish') }})</option>
                            <option value="en" @selected(Auth::user()->language == "en")>{{ __('main.langlist.current.english') }} ({{ __('main.langlist.foreign.english') }})</option>
                            <option value="uk" @selected(Auth::user()->language == "uk")>{{ __('main.langlist.current.ukrainian') }} ({{ __('main.langlist.foreign.ukrainian') }})</option>
                        </select>
                        @error('language')
                            <span class="text-danger text-sm" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <label class="form-label mt-4" for="language">{{ __('Znane języki na poziomie min. B1') }}</label>
                            <p class="text-xs">{{ __('Maksymalnie 5 pozycji') }}</p>
                            <select id="known_languages" name="known_languages[]" class="form-control" multiple>
                                <option value="">{{ __('Wybierz lub wyszukaj język(i)...') }}</option>
                                @foreach ($languages as $language)
                                    <option value="{{ $language->language }}" @selected(in_array($language->language, $volunteer_languages))>{{ $language->lang }} - {{ $language->native }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('known_languages')
                        <span class="text-danger text-sm" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    <label class="form-label mt-4" for="description">{{ __('Opis') }}</label>
                        <div class="input-group">
                            <textarea name="description" id="description" cols="30" rows="5" class="form-control @error('description') isinvalid @enderror" style="resize: none;">{{ $volunteer->description }}</textarea>
                        </div>
                        @error('description')
                            <span class="text-danger text-sm" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <button class="btn bg-gradient-dark btn-sm float-end mt-3 mb-0" id="updateprofile_button" type="submit">{{ __('Zaaktualizuj profil') }}</button>
                </form>
                 </div>
              </div>
              <div class="card mt-4" id="password">
                 <div class="card-header">
                    <h5>{{ __('volunteer.settings.change-pwd.title') }}</h5>
                 </div>
                 <div class="card-body pt-0">
                    <form action="{{ route('v.settings.password') }}" method="post">
                        @csrf
                    <div class="form-group">
                        <label class="form-label" for="old_password">{{ __('volunteer.settings.change-pwd.current') }}</label>
                       <input class="form-control @error('old_password') is-invalid @enderror" type="password" name="old_password" id="old_password" placeholder="{{ __('volunteer.settings.change-pwd.current') }}" required>
                       @error('old_password')
                            <span class="text-danger small" role="alert">
                                 <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="password">{{ __('volunteer.settings.change-pwd.new') }}</label>
                       <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" id="password" placeholder="{{ __('volunteer.settings.change-pwd.new') }}" required>
                    </div>
                    @error('password')
                        <span class="text-danger small" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <div class="form-group">
                        <label class="form-label" for="password_confirmation">{{ __('volunteer.settings.change-pwd.repeat') }}</label>
                       <input class="form-control" type="password" name="password_confirmation" id="password_confirmation" placeholder="{{ __('volunteer.settings.change-pwd.repeat') }}" required>
                    </div>
                    <button class="btn bg-gradient-dark btn-sm float-end mb-0">{{ __('Zmień hasło') }}</button>
                    </form>
                 </div>
              </div>
              <div class="card mt-4" id="2fa">
                 <div class="card-header d-flex">
                            <h5 class="mb-0">{{ _('Uwierzytelnianie dwuskładnikowe') }}
                                <p class="text-sm mb-0">{{ __('Możesz mnieć maksymalnie jedną opcję włączoną na raz!') }}</p>
                            </h5>
                            <div class="ms-auto">
                                @if ($settings->google2fa_code != null or $settings->email2fa != null)
                                <span class="badge badge-success">{{ __('Aktywne') }}</span>
                                @else
                                <span class="badge badge-dange">{{ __('Nieaktywne') }}</span>
                                @endif
                            </div>
                 </div>
                 <div class="card-body">
                    <div class="d-flex">
                        <i class="fa-solid fa-envelope width-48-px fa-3x text-primary"></i>
                        <div class="my-auto ms-3">
                           <div class="h-100">
                              <h5 class="mb-0">Email</h5>
                              <p class="mb-0 text-sm">{{ __('Kod jest wysyłany na twojego maila') }}</p>
                              @if ($settings->email2fa == null) <button class="btn btn-outline-dark btn-sm mt-2 mb-0" type="button" data-bs-toggle="modal" data-bs-target="#Email2faModal">{{ _('Skonfiguruj') }}</button> @elseif(1==2) <button class="btn btn-outline-dark btn-sm mt-2 mb-0" type="button" data-bs-toggle="modal" data-bs-target="#Email2fabutton">{{ _('Edytuj') }}</button> @endif
                           </div>
                        </div>

                         @if ($settings->google2fa == 1 || $settings->email2fa == 0)
                         <p class="text-sm text-secondary ms-auto me-3 my-auto">{{ __('Nieaktywne') }}</p>
                         <div class="form-check form-switch my-auto">
                              <input class="form-check-input" type="checkbox" id="emailswitch" disabled>
                          </div>
                           @else
                           <p class="text-sm text-secondary ms-auto me-3 my-auto">{{ __('Aktywne') }}</p>
                           <div class="form-check form-switch my-auto">
                                <input class="form-check-input" type="checkbox" id="emailswitch" checked>
                            </div>
                           @endif
                </div>
                    <hr class="horizontal dark">
                    <div class="d-flex d-none">
                            <img class="width-48-px" src="https://upload.wikimedia.org/wikipedia/commons/6/6e/Google_Authenticator_for_Android_icon.svg" alt="logo_slack">
                            <div class="my-auto ms-3">
                               <div class="h-100">
                                  <h5 class="mb-0">{{ __('Google Authenticator') }}</h5>
                                  <p class="mb-0 text-sm">{{ __('Tylko telefony z systemem Android') }}</p>
                                  @if ($settings->google2fa_code == null) <button class="btn btn-outline-dark btn-sm mt-2 mb-0" type="button" data-bs-toggle="modal" data-bs-target="#GoogleAuthenticatorModal">{{ _('Skonfiguruj') }}</button> @else <button class="btn btn-outline-dark btn-sm mt-2 mb-0" type="button" data-bs-toggle="modal" data-bs-target="#GoogleAuthenticatorModal">{{ _('Edytuj') }}</button> @endif
                               </div>
                            </div>
                            <p class="text-sm text-secondary ms-auto me-3 my-auto">@if ($settings->google2fa_code == null)  {{ __('Nieaktywowane') }} @else {{ __('Aktywowane') }} @endif</p>
                        <div class="form-check form-switch my-auto">
                            <input class="form-check-input" type="checkbox" id="googleauthenticatorswitch" @if ($settings->google2fa == 1) checked @endif @if ($settings->google2fa_code == null || $settings->email2fa != null) disabled @endif>
                        </div>
                    </div>
                 </div>
              </div>
              <div class="card mt-4" id="accounts">
                 <div class="card-header">
                    <h5>{{ __('Połączone konta') }}</h5>
                    <p class="text-sm">{{ __('Tu zarządzasz połączeniami konta z zewnętrznymi usługami') }}</p>
                 </div>
                 <div class="card-body pt-0">
                    <div class="d-flex">
                       <img class="width-48-px" src="{{ url('/assets/img/google.svg') }}" alt="logo_google">
                       <div class="my-auto ms-3">
                          <div class="h-100">
                             <h5 class="mb-0">Google</h5>
                             <p class="mb-0 text-sm">{{ __('Logowanie') }}</p>
                             @if ($settings->google_auth == 0 && $settings->facebook_auth == 0)
                             <a href="{{ route('google.redirect') }}" class="btn btn-outline-dark btn-sm mt-2 mb-0" type="button">{{ _('Połącz z Google') }}</a>
                             @endif
                          </div>
                       </div>
                       @if ($settings->google_auth == 1)
                        <p class="text-sm text-secondary ms-auto me-3 my-auto">{{ __('Aktywne') }}</p>
                        <div class="form-check form-switch my-auto d-none">
                            <input class="form-check-input" type="checkbox" id="googleswitchauth" checked>
                        </div>
                       @else
                       <p class="text-sm text-secondary ms-auto me-3 my-auto">{{ __('Nieaktywne') }}</p>
                       <div class="form-check form-switch my-auto d-none">
                          <input class="form-check-input" type="checkbox" id="googleswitchauth" disabled>
                       </div>
                       @endif
                    </div>
                    @if ($settings->google_auth == 1)
                        <div class="ps-5 pt-3 ms-3">
                            <div class="d-sm-flex bg-gray-100 border-radius-lg p-2 my-4">
                               <p class="text-sm font-weight-bold my-auto ps-sm-2">{{ __('Połączone konto') }}</p>
                               <h6 class="text-sm ms-auto me-3 my-auto">{{ $settings->google_auth_email }}</h6>
                               <form action="{{ route('v.google.disconect') }}" method="post" role="form" id="google_disconnect_form">
                                @csrf
                                <button class="btn btn-sm bg-gradient-danger my-sm-auto mt-2 mb-0" type="submit" id="google_disconnect_button">{{ __('Odłącz') }}</button>
                                </form>
                            </div>
                         </div>
                    @endif
                    @if ($settings->google_auth  == 0 && $settings->facebook_auth == 1)
                        <div class="ps-5 pt-3 ms-3">
                            <div class="d-sm-flex bg-gray-100 border-radius-lg p-2 my-4">
                               <p class="text-sm font-weight-bold my-auto ps-sm-2">{{ __('Jeśli chcesz połączyć konto z Google, napierw odłącz konto Facebook.') }}</p>
                            </div>
                         </div>
                    @endif

                    <hr class="horizontal dark">
                    <div class="d-flex">
                       <img class="width-48-px" src="https://upload.wikimedia.org/wikipedia/en/0/04/Facebook_f_logo_%282021%29.svg" alt="logo_facebook">
                       <div class="my-auto ms-3">
                          <div class="h-100">
                             <h5 class="mb-0">Facebook</h5>
                             <p class="mb-0 text-sm">{{ __('Logowanie') }}</p>
                             @if ($settings->facebook_auth == 0 &&  $settings->google_auth == 0)
                                <a href="{{ route('facebook.redirect') }}" class="btn btn-outline-dark btn-sm mt-2 mb-0" type="button">{{ _('Połącz z Facebookiem') }}</a>
                             @endif
                          </div>
                       </div>
                        @if ($settings->facebook_auth == 1)
                        <p class="text-sm text-secondary ms-auto me-3 my-auto">{{ __('Aktywne') }}</p>
                        <div class="form-check form-switch my-auto d-none">
                            <input class="form-check-input" type="checkbox" id="facebookswitchauth" checked>
                        </div>
                        @else
                        <p class="text-sm text-secondary ms-auto me-3 my-auto">{{ __('Nieaktywne') }}</p>
                        <div class="form-check form-switch my-auto d-none">
                            <input class="form-check-input" type="checkbox" id="facebookswitchauth" disabled>
                        </div>
                        @endif
                    </div>
                    @if ($settings->facebook_auth == 1)
                        <div class="ps-5 pt-3 ms-3">
                            <div class="d-sm-flex bg-gray-100 border-radius-lg p-2 my-4">
                               <p class="text-sm font-weight-bold my-auto ps-sm-2">{{ __('Połączone konto') }}</p>
                               <h6 class="text-sm ms-auto me-3 my-auto">{{ $settings->facebook_auth_email }}</h6>
                               <form action="{{ route('v.facebook.disconect') }}" method="post" role="form" id="facebook_disconnect_form">
                                @csrf
                                <button class="btn btn-sm bg-gradient-danger my-sm-auto mt-2 mb-0" type="submit" id="facebook_disconnect_button">{{ __('Odłącz') }}</button>
                                </form>
                            </div>
                         </div>
                    @endif
                    @if ($settings->facebook_auth == 0 && $settings->google_auth == 1)
                        <div class="ps-5 pt-3 ms-3">
                            <div class="d-sm-flex bg-gray-100 border-radius-lg p-2 my-4">
                               <p class="text-sm font-weight-bold my-auto ps-sm-2">{{ __('Jeśli chcesz połączyć konto z Facebookiem, napierw odłącz konto Google.') }}</p>
                            </div>
                         </div>
                    @endif
                 </div>
              </div>
              <div class="card mt-4" id="notifications">
                 <div class="card-header pb-2">
                    <h5>{{ __('Powiadomienia') }}</h5>
                    <p class="text-sm">{{ __('Wybierz sposób otrzymywania powiadomień.') }}</p>
                 </div>
                 <div class="card-body pt-0">
                    <div class="table-responsive">
                        <form action="{{ route('v.settings.save_notifications') }}" method="post" role="form" id="notifications_form">
                        @csrf
                       <table class="table mb-0">
                          <thead>
                             <tr>
                                <th class="ps-1" colspan="4">
                                   <p class="mb-0">{{ __('Aktywność') }}</p>
                                </th>
                                <th class="text-center">
                                   <p class="mb-0">{{ __('Email') }}</p>
                                </th>
                                <th class="text-center">
                                   <p class="mb-0">{{ __('Push') }}</p>
                                </th>
                                @if (1==2)
                                <th class="text-center">
                                    <p class="mb-0">{{ __('SMS') }}</p>
                                 </th>
                                @endif
                             </tr>
                          </thead>
                            <tbody>
                                <tr>
                                   <td class="ps-1" colspan="4">
                                      <div class="my-auto">
                                         <span class="text-dark d-block text-sm">{{ __('Ogólne powiadomienia') }}</span>
                                         <span class="text-xs font-weight-normal">{{ __('Dot. aktualizacji oraz innych informacji (nie dot. formularzy)') }}</span>
                                      </div>
                                   </td>
                                   <td>
                                      <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                         <input class="form-check-input" type="checkbox" name="notificationsettingscheck11" id="notificationsettingscheck11" @checked($settings->notifications_email == 1)>
                                      </div>
                                   </td>
                                   <td>
                                      <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                         <input class="form-check-input" type="checkbox" name="notificationsettingscheck12" id="notificationsettingscheck12" @checked($settings->notifications_push == 1)>
                                      </div>
                                   </td>
                                   @if (1==2)
                                   <td>
                                       <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                          <input class="form-check-input" type="checkbox" name="notificationsettingscheck13" id="notificationsettingscheck13">
                                       </div>
                                    </td>
                                   @endif
                                </tr>
                                <tr>
                                   <td class="ps-1" colspan="4">
                                      <div class="my-auto">
                                         <span class="text-dark d-block text-sm">Nowa wiadomość</span>
                                         <span class="text-xs font-weight-normal">{{ __('Powiadom mnie, kiedy otrzymam wiadomość') }}</span>
                                      </div>
                                   </td>
                                   <td>
                                      <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                         <input class="form-check-input" type="checkbox" name="notificationsettingscheck21" id="notificationsettingscheck21" @checked($settings->messages_email == 1)>
                                      </div>
                                   </td>
                                   <td>
                                      <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                         <input class="form-check-input" type="checkbox" name="notificationsettingscheck22" id="notificationsettingscheck22" @checked($settings->messages_push == 1)>
                                      </div>
                                   </td>
                                   @if (1==2)
                                   <td>
                                       <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                          <input class="form-check-input" type="checkbox" name="notificationsettingscheck23" id="notificationsettingscheck23">
                                       </div>
                                    </td>
                                   @endif
                                </tr>
                                <tr>
                                   <td class="ps-1" colspan="4">
                                      <div class="my-auto">
                                         <span class="text-dark d-block text-sm">{{ __('Wiadomości marketingowe') }}</span>
                                         <span class="text-xs font-weight-normal">{{ __('Informacje dostarczane przez nas lub naszych partnerów') }}</span>
                                      </div>
                                   </td>
                                   <td>
                                      <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                         <input class="form-check-input" type="checkbox" name="notificationsettingscheck31" id="notificationsettingscheck31" @checked($settings->marketing_email == 1)>
                                      </div>
                                   </td>
                                   <td>
                                      <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                         <input class="form-check-input" type="checkbox" name="notificationsettingscheck32" id="notificationsettingscheck32" @checked($settings->marketing_push == 1)>
                                      </div>
                                   </td>
                                   @if (1==2)
                                   <td>
                                       <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                          <input class="form-check-input" type="checkbox" name="notificationsettingscheck33" id="notificationsettingscheck33">
                                       </div>
                                    </td>
                                   @endif
                                </tr>
                                <tr>
                                   <td class="ps-1" colspan="4">
                                      <div class="my-auto">
                                         <p class="text-sm mb-0">{{ __('Logowanie z nowego urządzenia') }}</p>
                                      </div>
                                   </td>
                                   <td>
                                      <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                         <input class="form-check-input" type="checkbox" name="notificationsettingscheck41" id="notificationsettingscheck41" @checked($settings->login_email == 1) disabled>
                                      </div>
                                   </td>
                                   <td>
                                      <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                         <input class="form-check-input" type="checkbox" name="notificationsettingscheck42" id="notificationsettingscheck42" @checked($settings->login_push == 1) disabled>
                                      </div>
                                   </td>
                                   @if (1==2)
                                   <td>
                                       <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                          <input class="form-check-input" type="checkbox" name="notificationsettingscheck43" id="notificationsettingscheck43">
                                       </div>
                                    </td>
                                   @endif
                                </tr>
                             </tbody>
                       </table>
                       <button class="btn bg-gradient-dark btn-sm float-end mb-0" id="notifications_button">{{ __('Zapisz powiadomienia') }}</button>
                    </form>
                    </div>
                 </div>
              </div>
              <div class="card mt-4" id="sessions">
                 <div class="card-header pb-3">
                    <h5>{{ __('Sesje') }}</h5>
                    <p class="text-sm">{{ __('To jest lista urządzeń, które zalogowały się na Twoje konto. Usuń te, których nie rozpoznajesz.') }}</p>
                 </div>
                 <div class="card-body pt-0 text-center">
                    <h3>{{ __('Wkrótce!') }}</h3>
                 </div>
                 <div class="card-body pt-0 d-none">
                    <div class="d-flex align-items-center">
                       <div class="text-center w-5">
                          <i class="fas fa-desktop text-lg opacity-6" aria-hidden="true"></i>
                       </div>
                       <div class="my-auto ms-3">
                          <div class="h-100">
                             <p class="text-sm mb-1">
                                Bucharest 68.133.163.201
                             </p>
                             <p class="mb-0 text-xs">
                                Your current session
                             </p>
                          </div>
                       </div>
                       <span class="badge badge-success badge-sm my-auto ms-auto me-3">Active</span>
                       <p class="text-secondary text-sm my-auto me-3">EU</p>
                       <a href="javascript:;" class="text-primary text-sm icon-move-right my-auto">See more
                       <i class="fas fa-arrow-right text-xs ms-1" aria-hidden="true"></i>
                       </a>
                    </div>
                    <hr class="horizontal dark">
                    <div class="d-flex align-items-center">
                       <div class="text-center w-5">
                          <i class="fas fa-desktop text-lg opacity-6" aria-hidden="true"></i>
                       </div>
                       <p class="my-auto ms-3">Chrome on macOS</p>
                       <p class="text-secondary text-sm ms-auto my-auto me-3">US</p>
                       <a href="javascript:;" class="text-primary text-sm icon-move-right my-auto">See more
                       <i class="fas fa-arrow-right text-xs ms-1" aria-hidden="true"></i>
                       </a>
                    </div>
                    <hr class="horizontal dark">
                    <div class="d-flex align-items-center">
                       <div class="text-center w-5">
                          <i class="fas fa-mobile text-lg opacity-6" aria-hidden="true"></i>
                       </div>
                       <p class="my-auto ms-3">Safari on iPhone</p>
                       <p class="text-secondary text-sm ms-auto my-auto me-3">US</p>
                       <a href="javascript:;" class="text-primary text-sm icon-move-right my-auto">See more
                       <i class="fas fa-arrow-right text-xs ms-1" aria-hidden="true"></i>
                       </a>
                    </div>
                 </div>
              </div>
              <div class="card mt-4" id="agreement">
                 <div class="card-header">
                    <h5>{{ __('Zgoda i umowa') }}</h5>
                    <p class="text-sm mb-0">{{ __('By móc się zapisać na wydarzenie lub odebrać musisz mieć ważną zgodę') }}</p>
                 </div>
                 <div class="card-body d-sm-flex pt-0">
                    <div class="d-flex align-items-center mb-sm-0 mb-4">
                       <div>
                            <span class="text-dark font-weight-bold d-block text-sm">{{ __('Ważność zgody:') }}</span>
                       </div>
                       <div class="ms-2">
                            <span class="badge badge-primary">{{ show_agreement_date() }}</span>
                       </div>
                    </div>
                    <a href="{{ route('v.settings.agreement') }}" class="btn btn-outline-secondary ms-auto mb-0">{{ __('Zobacz zgodę/umowę') }}</a>
                    <button class="btn btn-primary mb-0 ms-2" type="button" data-bs-toggle="modal" data-bs-target="#agreementModal">{{ __('Zaaktualizuj zgodę/umowę') }}</button>
                 </div>
              </div>
           </div>
        </div>
      @include('volunteer.include.footer')
    </div>
  </main>

  <div class="modal fade" id="agreementModal" tabindex="-1" role="dialog" aria-labelledby="agreementModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="agreementModalLabel">{{ __('Akltualizacja zgody/umowy') }}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('v.settings.newagreement') }}" method="post" id="updateagreement_form">
            @csrf
            <div class="modal-body text-center">
                <div class="form-group">
                    <label class="text-sm m-0" for="agreement">{{ __('index.register.agreement.text1') }}</label><br>
                        <span class="font-weight-400 text-sm">{{ __('index.register.agreement.text2') }}:
                        <a class="font-weight-700 text-primary" href="{{ url('/files/zgoda_wolontariat_pelnoletni.pdf') }}" target="_blank">{{ __('index.register.agreement.adult') }}</a> |
                        <a class="font-weight-700 text-primary" href="{{ url('/files/zgoda_wolontariat_niepelnoletni.pdf') }}" target="_blank">{{ __('index.register.agreement.minor') }}</a></span><br>
                    <input type="file" class="form-control mt-2" accept=".pdf,.png,.jpg,.jepg" name="agreement[]" multiple required>
                    <small class="text-xs">{{ __('index.register.agreement.size') }}: 7MB</small>
                </div>
                <hr>
                <p class="text-danger font-bold">{{ __('Uwaga! Po wysłaniu nowej zgody/umowy zostaniesz automatycznie wylogowany w celu zatwierdzenia dokumentu!') }}</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn bg-secondary text-white" data-bs-dismiss="modal">{{ __('main.cancel') }}</button>
                <button type="submit" class="btn bg-primary text-white" id="updateagreement_button">{{ __('Zatwierdź') }}</button>
              </div>
        </form>
      </div>
    </div>
  </div>

  @if ($settings->google2fa_code == null && 1==2)
  <div class="modal fade" id="GoogleAuthenticatorModal" tabindex="-1" role="dialog" aria-labelledby="GoogleAuthenticatorModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="GoogleAuthenticatorModalLabel">Konfiguracja Google Authenticator</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('v.settings.google2fa') }}" method="post">
            @csrf
            <input type="hidden" name="secret" value="{{ $google2fa['secret'] }}">
            <div class="modal-body">
                <ol>
                    <li>{{ __('Pobierz aplikację Google Authenticator z ') }}<a href="https://play.google.com/store/apps/details?id=com.google.android.apps.authenticator2">{{ __('Sklepu Google Play') }}</a></li>
                    <li>{{ __('Zeskanuj poniższy kod w aplikacji') }}</li>
                </ol>
                <div class="w-100 text-center">
                    <img src="https://chart.googleapis.com/chart?cht=qr&chs=200x200&chl={!! $google2fa['qr'] !!}" alt="">
                </div>
                <ol start="3">
                    <li>{{ __('Po zeskanowaniu, zaznacz kwadrat oraz kliknij poniższy przycisk "Włącz"') }}</li>
                    <li>{{ __('Gdy wpiszesz poprawne dane do logowania, zostaniesz poproszony o podanie kodu z aplikacji') }}</li>
                    <li>{{ __('Ciesz się zabezpieczeniem dwuskładnikowym!') }}</li>
                </ol>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="googleauthenticatorcheck" required>
                    <label class="custom-control-label" for="googleauthenticatorcheck"><p class="m-0">{{ __('Potwierdzam, że dodałem ISOW do Google Authenticator') }}</p></label>
                  </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn bg-secondary text-white" data-bs-dismiss="modal">{{ __('main.cancel') }}</button>
                <button type="submit" class="btn bg-primary text-white" id="googleauthenticatorbutton" disabled="disabled">{{ __('Włącz') }}</button>
              </div>
        </form>
      </div>
    </div>
  </div>
  @endif

  @if ($settings->email2fa == 0)
  <div class="modal fade" id="Email2faModal" tabindex="-1" role="dialog" aria-labelledby="Email2faModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="Email2faModalLabel">Konfiguracja maila</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('v.settings.email2fa') }}" method="post">
            @csrf
            <div class="modal-body text-center">
                <button class="btn btn-sm bg-gradient-dark w-100" type="button" id="sendcodetomailbutton">{{ __('Wyślij kod na maila') }}</button>
                <span class="text-muted text-sm">Nie otrzymałeś kodu? Za <span id="secondscount">0</span> sekund możesz wysłać ponownie.</span>
                <div class="row gx-2 gx-sm-3 mb-2 digit-input" id="digit-input">
                        <div class="col">
                            <input type="text" id="digit1" name="digit1" class="form-control form-control-lg digits" size="1" maxlength="1" autocomplete="off" autocapitalize="off" value='' required>
                      </div>
                      <div class="col">
                            <input type="text" id="digit2" name="digit2" class="form-control form-control-lg digits" size="1" maxlength="1" autocomplete="off" autocapitalize="off" value='' required>
                      </div>
                      <div class="col">
                            <input type="text" id="digit3" name="digit3" class="form-control form-control-lg digits" size="1" maxlength="1" autocomplete="off" autocapitalize="off" value='' required>
                      </div>
                      <div class="col">
                            <input type="text" id="digit4" name="digit4" class="form-control form-control-lg digits" size="1" maxlength="1" autocomplete="off" autocapitalize="off" value='' required>
                      </div>
                      <div class="col">
                             <input type="text" id="digit5" name="digit5" class="form-control form-control-lg digits" size="1" maxlength="1" autocomplete="off" autocapitalize="off" value='' required>
                       </div>
                       <div class="col">
                             <input type="text" id="digit6" name="digit6" class="form-control form-control-lg digits" size="1" maxlength="1" autocomplete="off" autocapitalize="off" value='' required>
                       </div>
                 </div>

                 @error('code_wrong')
                    <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                 @enderror
                 @error('code_expired')
                 <span class="text-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                 @enderror

              </div>
              <div class="modal-footer">
                <button type="button" class="btn bg-secondary text-white" data-bs-dismiss="modal">{{ __('main.cancel') }}</button>
                <button type="submit" class="btn bg-primary text-white" id="email2fabutton">{{ __('Włącz') }}</button>
              </div>
        </form>
      </div>
    </div>
  </div>
  @endif
  <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
    <div class="toast fade p-2 bg-white hide" role="alert" aria-live="assertive" id="email2faontoast" aria-atomic="true" data-autohide="true">
        <div class="toast-header border-0">
           <i class="ni ni-check-bold text-success me-2"></i>
           <span class="me-auto font-weight-bold">{{ __('Powiadomienie') }}</span>
           <small class="text-body">{{ __('Teraz') }}</small>
           <i class="fas fa-times text-md ms-3 cursor-pointer" data-bs-dismiss="toast" aria-label="Close" aria-hidden="true"></i>
        </div>
        <hr class="horizontal dark m-0">
        <div class="toast-body">{{ __('Uwierzytelnianie dwuskładnikowe za pomocą maila zostało włączone pomyślnie!') }}</div>
     </div>
  </div>
  <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
    <div class="toast fade p-2 bg-white hide" role="alert" aria-live="assertive" id="email2faofftoast" aria-atomic="true" data-autohide="true">
        <div class="toast-header border-0">
           <i class="ni ni-check-bold text-success me-2"></i>
           <span class="me-auto font-weight-bold">{{ __('Powiadomienie') }}</span>
           <small class="text-body">{{ __('Teraz') }}</small>
           <i class="fas fa-times text-md ms-3 cursor-pointer" data-bs-dismiss="toast" aria-label="Close" aria-hidden="true"></i>
        </div>
        <hr class="horizontal dark m-0">
        <div class="toast-body">{{ __('Uwierzytelnianie dwuskładnikowe za pomocą maila zostało wyłączone pomyślnie!') }}</div>
     </div>
  </div>

@endsection

@section('style')
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.16/js/intlTelInput.min.js" integrity="sha512-Po9nSdYOcWIcoADdRjkAbRYPpR8OHjxzA/3RDUERZcDewTLzRTxbG4bUX7Sr7lVEcO3wTCzphdOBWgNFKVmxaA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.16/css/intlTelInput.css" integrity="sha512-gxWow8Mo6q6pLa1XH/CcH8JyiSDEtiwJV78E+D+QP0EVasFs8wKXq16G8CLD4CJ2SnonHr4Lm/yY2fSI2+cbmw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<style>
    .iti{
        width: 100%;
    }
</style>
@endsection

@push('scripts')
    <script>
        const gender = new Choices(document.getElementById("gender"), {
            searchEnabled:false,
            shouldSort: false,
            placeholder: true,
        });

        const language = new Choices(document.getElementById("language"), {
            searchEnabled:false,
            shouldSort: false,
            placeholder: true,
        });

        const known_languages = new Choices(document.getElementById("known_languages"), {
            allowHTML: true,
            removeItemButton: true,
            placeholder: true,
            maxItemCount: 5,
        });

        const tshirt_size = new Choices(document.getElementById("tshirt_size"), {
            searchEnabled:false,
            shouldSort: false,
            placeholder: true,
        });
    </script>

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

    $("#updateprofile_form").submit(function() {
        $("#telephone").val($("#telephone").val().replace(/[^+\d]+/g, ""));
        $("#hidden").val(iti.getNumber().replace(/[^+\d]+/g, ""));
    });

</script>

<script>
    $('#updateprofile_form').submit(function(){
        $('#updateprofile_button').prop('disabled', true);
        $('#updateprofile_button').prepend('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> ');
    });

    $('#google_disconnect_form').submit(function(){
        $('#google_disconnect_button').prop('disabled', true);
        $('#google_disconnect_button').prepend('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> ');
    });

    $('#facebook_disconnect_form').submit(function(){
        $('#facebook_disconnect_button').prop('disabled', true);
        $('#facebook_disconnect_button').prepend('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> ');
    });

    $('#notifications_form').submit(function(){
        $('#notifications_button').prop('disabled', true);
        $('#notifications_button').prepend('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> ');
    });

    $('#updateagreement_form').submit(function(){
        $('#updateagreement_button').prop('disabled', true);
        $('#updateagreement_button').prepend('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> ');
    });
</script>

<script>
    $(document).ready(function() {
    $("#googleauthenticatorcheck").click(function() {
        if ($(this).is(":checked")) {
            $("#googleauthenticatorbutton").removeAttr("disabled");
        } else {
            $("#googleauthenticatorbutton").attr("disabled", "disabled");
        }
    });

    $("#emailswitch").click(function() {
        if ($(this).is(":checked")) {
            $.ajax({
                type:'POST',
                url:"{{ route('v.settings.email2fa_change') }}",
                data:{email2fa: true},
                success:function(data){
                    $('#email2faontoast').toast('show');
                },
                error:function(error){

                }
            });
        } else {
            $.ajax({
                type:'POST',
                url:"{{ route('v.settings.email2fa_change') }}",
                data:{email2fa: false},
                success:function(data){
                    $('#email2faofftoast').toast('show');
                },
                error:function(error){

                }
            });
        }
    });

    $("#sendcodetomailbutton").click(function() {
        $(this).prop('disabled', true);
        var spn = document.getElementById('secondscount');
        var count = 29;
        var timer = null;
        (function countDown(){
        spn.textContent = count;
        if(count !== 0){
            timer = setTimeout(countDown, 1000);
            count--;
        } else {
            $('#sendcodetomailbutton').prop('disabled', false);
        }}());

        $.ajax({
            type:'POST',
            url:"{{ route('v.settings.sendemailcode') }}",
            //data:{google2fa: true},
            success:function(data){
                console.log(data);
            },
            error:function(error){
                console.log(error);
            }
        });
    });
});
</script>
<script>
    $(document).ready(function(){
    $('input').on("input", function(){
        if($(this).val().length==$(this).attr("maxlength")){
            $(this).next().focus();
        }
    });
});
</script>

@if (session('update_profile_success') == true)
<script>
    Swal.fire({
        icon: 'success',
        title: 'Sukces!',
        text: 'Profil został zaaktualizowany pomyślnie!',
        showConfirmButton: false,
       timer: 3000
    });
    </script>
@endif

@if (session('password_changed') == true)
<script>
    Swal.fire({
        icon: 'success',
        title: 'Sukces!',
        text: 'Hasło zostało zmienione pomyślnie!',
        showConfirmButton: false,
       timer: 3000
    });
    </script>
@endif

@if (session('password_error') == true)
<script>
    Swal.fire({
        icon: 'error',
        title: 'Błąd!',
        text: 'Wystąpił błąd podczas zmiany hasła!',
        showConfirmButton: false,
       timer: 3000
    });
    </script>
@endif

@if (session('google2fa_success') == true)
<script>
    Swal.fire({
        icon: 'success',
        title: 'Sukces!',
        text: 'Pomyślnie włączono autoryzację dwupoziomową za pomocą Google Authenticator',
        showConfirmButton: false,
       timer: 3000
    });
    </script>
@endif

@if (session('google2fa_error') == true)
<script>
    Swal.fire({
        icon: 'error',
        title: 'Błąd!',
        text: 'Wystąpił błąd podczas włączania autoryzacji dwupoziomowej za pomocą Google Authenticator',
        showConfirmButton: false,
       timer: 3000
    });
    </script>
@endif

@if (session('code_success') == true)
<script>
    Swal.fire({
        icon: 'success',
        title: 'Sukces!',
        text: 'Uwierzytelnianie dwuskładnikowe za pomocą maila zostało włączone pomyślnie!',
        showConfirmButton: false,
       timer: 4000
    });
    </script>
@endif

@if (session('connect_google') == true)
<script>
    Swal.fire({
        icon: 'success',
        title: 'Sukces!',
        text: 'Konto Google zostało podłączone pomyślnie!',
        showConfirmButton: false,
       timer: 3000
    });
    </script>
@endif

@if (session('disconnect_google') == true)
<script>
    Swal.fire({
        icon: 'success',
        title: 'Sukces!',
        text: 'Konto Google zostało odłączone pomyślnie!',
        showConfirmButton: false,
       timer: 3000
    });
    </script>
@endif

@if (session('connect_google_error') == true || session('connect_facebook_error') == true)
<script>
    Swal.fire({
        icon: 'error',
        title: 'Błąd!',
        text: 'Wystąpił błąd podczas łączenia konta! Spróbuj ponownie później',
        showConfirmButton: false,
       timer: 3000
    });
    </script>
@endif

@if (session('connect_facebook') == true)
<script>
    Swal.fire({
        icon: 'success',
        title: 'Sukces!',
        text: 'Konto Facebook zostało podłączone pomyślnie!',
        showConfirmButton: false,
       timer: 3000
    });
    </script>
@endif

@if (session('disconnect_facebook') == true)
<script>
    Swal.fire({
        icon: 'success',
        title: 'Sukces!',
        text: 'Konto Facebook zostało odłączone pomyślnie!',
        showConfirmButton: false,
       timer: 3000
    });
    </script>
@endif

@error('code_wrong')
<script>
    $(document).ready(function(){
        $('#Email2faModal').modal('show');
    });
        </script>
@enderror

@error('code_expired')
<script>
    $(document).ready(function(){
        $('#Email2faModal').modal('show');
    });
        </script>
@enderror

@if (session('update_notifications') == true)
<script>
    Swal.fire({
        icon: 'success',
        title: 'Sukces!',
        text: 'Ustawienia powiadomień zostały zaaktualizowane pomyślnie!',
        showConfirmButton: false,
       timer: 3000
    });
    </script>
@endif
@endpush
