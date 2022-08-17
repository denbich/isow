
@extends('layouts.app')

@section('title') {{ __('Ustawienia') }} @endsection

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
        @include('coordinator.include.sponsors')
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
              <li class="breadcrumb-item text-sm text-white" aria-current="page">{{ __('Koordynator') }}</li>
              <li class="breadcrumb-item text-sm text-white active" aria-current="page">{{ __('Ustawienia') }}</li>
            </ol>
            <h6 class="font-weight-bolder text-white mb-0">{{ __('Ustawienia') }}</h6>
          </nav>
          @include('coordinator.include.nav')
        </div>
      </nav>

      <div class="container-fluid py-4 min-vh-100">

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
                     <div class="d-none">
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
                     </div>
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
                           <p class="mb-0 font-weight-bold text-sm">{{ __('Koordynator') }}</p>
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
                      <form action="{{ route('c.settings.profile') }}" method="POST" role="form" id="profile_form">
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
                           @error('lastname')
                             <span class="text-danger text-sm" role="alert">
                                 <strong>{{ $message }}</strong>
                             </span>
                         @enderror
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
                        <div class="col-lg-6">
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
                        <div class="col-lg-6">
                         <label class="form-label mt-4" for="language">{{ __('Preferowany język') }}</label>
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
                    <button class="btn bg-gradient-dark btn-sm float-end mt-3 mb-0" type="submit" id="profile_button">{{ __('Zaaktualizuj profil') }}</button>
                 </form>
                  </div>
               </div>
               <div class="card mt-4" id="password">
                  <div class="card-header">
                     <h5>{{ __('volunteer.settings.change-pwd.title') }}</h5>
                  </div>
                  <div class="card-body pt-0">
                     <form action="{{ route('c.settings.password') }}" method="post" role="form" id="password_form">
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
                     <button class="btn bg-gradient-dark btn-sm float-end mb-0" type="submit" id="password_button">{{ __('Zmień hasło') }}</button>
                     </form>
                  </div>
               </div>
               <div class="d-none">
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
                                 @if ($settings->email2fa == null) <button class="btn btn-outline-dark btn-sm mt-2 mb-0" type="button" data-bs-toggle="modal" data-bs-target="#Email2faModal">{{ _('Skonfiguruj') }}</button> @else <button class="btn btn-outline-dark btn-sm mt-2 mb-0" type="button" data-bs-toggle="modal" data-bs-target="#Email2fabutton">{{ _('Edytuj') }}</button> @endif
                              </div>
                           </div>
                           <p class="text-sm text-secondary ms-auto me-3 my-auto">Nieaktywne</p>
                           <div class="form-check form-switch my-auto">
                              <input class="form-check-input" type="checkbox" id="emailswitch" @if ($settings->google2fa_code != null || $settings->email2fa == null) disabled @endif>
                           </div>
                   </div>
                       <hr class="horizontal dark">
                       <div class="d-flex">
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
                          <img class="width-48-px" src="{{ url('/assets/img/google.svg') }}" alt="logo_slack">
                          <div class="my-auto ms-3">
                             <div class="h-100">
                                <h5 class="mb-0">Google</h5>
                                <p class="mb-0 text-sm">{{ __('Logowanie') }}</p>
                             </div>
                          </div>
                          @if (1==1)
                           <p class="text-sm text-secondary ms-auto me-3 my-auto">{{ __('Aktywne') }}</p>
                           <div class="form-check form-switch my-auto">
                               <input class="form-check-input" type="checkbox" id="googleswitchauth" checked>
                           </div>
                          @else
                          <p class="text-sm text-secondary ms-auto me-3 my-auto">{{ __('Nieaktywne') }}</p>
                          <div class="form-check form-switch my-auto">
                             <input class="form-check-input" type="checkbox" id="googleswitchauth">
                          </div>
                          @endif
                       </div>
                       <div class="ps-5 pt-3 ms-3">
                          <div class="d-sm-flex bg-gray-100 border-radius-lg p-2 my-4">
                             <p class="text-sm font-weight-bold my-auto ps-sm-2">{{ __('Połączone konto') }}</p>
                             <h6 class="text-sm ms-auto me-3 my-auto">{{ Auth::user()->email }}</h6>
                             <button class="btn btn-sm bg-gradient-danger my-sm-auto mt-2 mb-0" type="button" name="button">{{ __('Odłącz') }}</button>
                          </div>
                       </div>
                       <hr class="horizontal dark">
                       <div class="d-flex">
                          <img class="width-48-px" src="https://upload.wikimedia.org/wikipedia/en/0/04/Facebook_f_logo_%282021%29.svg" alt="logo_spotify">
                          <div class="my-auto ms-3">
                             <div class="h-100">
                                <h5 class="mb-0">Facebook</h5>
                                <p class="mb-0 text-sm">{{ __('Logowanie') }}</p>
                             </div>
                          </div>
                          @if (1==1)
                           <p class="text-sm text-secondary ms-auto me-3 my-auto">{{ __('Aktywne') }}</p>
                           <div class="form-check form-switch my-auto">
                               <input class="form-check-input" type="checkbox" id="facebookswitchauth" checked>
                           </div>
                          @else
                          <p class="text-sm text-secondary ms-auto me-3 my-auto">{{ __('Nieaktywne') }}</p>
                          <div class="form-check form-switch my-auto">
                             <input class="form-check-input" type="checkbox" id="facebookswitchauth">
                          </div>
                          @endif
                       </div>
                       <div class="ps-5 pt-3 ms-3">
                           <div class="d-sm-flex bg-gray-100 border-radius-lg p-2 my-4">
                              <p class="text-sm font-weight-bold my-auto ps-sm-2">{{ __('Połączone konto') }}</p>
                              <h6 class="text-sm ms-auto me-3 my-auto">{{ Auth::user()->email }}</h6>
                              <button class="btn btn-sm bg-gradient-danger my-sm-auto mt-2 mb-0" type="button" name="button">{{ __('Odłącz') }}</button>
                           </div>
                        </div>
                    </div>
                 </div>
                 <div class="card mt-4" id="notifications">
                    <div class="card-header pb-2">
                       <h5>{{ __('Powiadomienia') }}</h5>
                       <p class="text-sm">{{ __('Wybierz sposób otrzymywania powiadomień.') }}</p>
                    </div>
                    <div class="card-body pt-0">
                       <div class="table-responsive">
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
                                         <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault11">
                                      </div>
                                   </td>
                                   <td>
                                      <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                         <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault12">
                                      </div>
                                   </td>
                                   @if (1==2)
                                   <td>
                                       <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                          <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault13">
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
                                         <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault14">
                                      </div>
                                   </td>
                                   <td>
                                      <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                         <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault15">
                                      </div>
                                   </td>
                                   @if (1==2)
                                   <td>
                                       <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                          <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault16">
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
                                         <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault17">
                                      </div>
                                   </td>
                                   <td>
                                      <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                         <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault18">
                                      </div>
                                   </td>
                                   @if (1==2)
                                   <td>
                                       <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                          <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault19">
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
                                         <input class="form-check-input" checked="" type="checkbox" id="flexSwitchCheckDefault20">
                                      </div>
                                   </td>
                                   <td>
                                      <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                         <input class="form-check-input" checked="" type="checkbox" id="flexSwitchCheckDefault21">
                                      </div>
                                   </td>
                                   @if (1==2)
                                   <td>
                                       <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                          <input class="form-check-input" checked="" type="checkbox" id="flexSwitchCheckDefault22">
                                       </div>
                                    </td>
                                   @endif
                                </tr>
                             </tbody>
                          </table>
                       </div>
                    </div>
                 </div>
                 <div class="card mt-4" id="sessions">
                    <div class="card-header pb-3">
                       <h5>{{ __('Sesje') }}</h5>
                       <p class="text-sm">{{ __('To jest lista urządzeń, które zalogowały się na Twoje konto. Usuń te, których nie rozpoznajesz.') }}</p>
                    </div>
                    <div class="card-body pt-0">
                      @foreach ($sessions as $session)
                          @if ($session->ip_address == Request::ip())
                          <div class="d-flex align-items-center">
                              <div class="text-center w-5">
                                 @switch($session->device)
                                     @case('desktop')
                                          <i class="fa-solid fa-desktop text-lg opacity-6" aria-hidden="true"></i>
                                      @break
                                      @case('phone')
                                          <i class="fa-solid fa-mobile text-lg opacity-6" aria-hidden="true"></i>
                                      @break
                                      @case('tablet')
                                          <i class="fa-solid fa-tablet text-lg opacity-6" aria-hidden="true"></i>
                                      @break
                                      @case('robot')
                                          <i class="fa-solid fa-robot text-lg opacity-6" aria-hidden="true"></i>
                                      @break
                                      @case('other')
                                          <i class="fa-solid fa-microchip text-lg opacity-6" aria-hidden="true"></i>
                                      @break
                                 @endswitch
                              </div>
                              <div class="my-auto ms-3">
                                 <div class="h-100">
                                    <p class="text-sm mb-1">
                                      {{ $session->system }} {{ $session->ip_address }}
                                    </p>
                                    <p class="mb-0 text-xs">{{ __('Twoja aktualna sesja') }}</p>
                                 </div>
                              </div>
                              <span class="badge badge-success badge-sm my-auto ms-auto me-3">{{ __('Aktywne') }}</span>
                              <p class="text-secondary text-sm my-auto me-3">EU</p>
                              <a href="javascript:;" class="text-primary text-sm icon-move-right my-auto">{{ __('Zobacz więcej') }}
                              <i class="fas fa-arrow-right text-xs ms-1" aria-hidden="true"></i>
                              </a>
                           </div>
                          @else

                          @endif
                      @endforeach
                      <div class="d-none">
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
                 </div>
                 <div class="card mt-4" id="agreement">
                    <div class="card-header">
                       <h5>{{ __('Zgoda i umowa') }}</h5>
                       <p class="text-sm mb-0">{{ __('By móc się zapisać na wydarzenie lub odebrać musisz mieć ważną zgodę') }}</p>
                    </div>
                    <div class="card-body d-sm-flex pt-0">
                       <div class="d-flex align-items-center mb-sm-0 mb-4">
                          <div>
                             <div class="form-check form-switch mb-0">
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault0">
                             </div>
                          </div>
                          <div class="ms-2">
                             <span class="text-dark font-weight-bold d-block text-sm">Confirm</span>
                             <span class="text-xs d-block">I want to delete my account.</span>
                          </div>
                       </div>
                       <button class="btn btn-outline-secondary mb-0 ms-auto" type="button" name="button">Deactivate</button>
                       <button class="btn bg-gradient-danger mb-0 ms-2" type="button" name="button">Delete Account</button>
                    </div>
                 </div>
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

    $("#profile_form").submit(function() {
        $("#telephone").val($("#telephone").val().replace(/[^+\d]+/g, ""));
        $("#hidden").val(iti.getNumber().replace(/[^+\d]+/g, ""));
    });

</script>

<script>
    $('#profile_form').submit(function(){
        $('#profile_button').prop('disabled', true);
        $('#profile_button').prepend('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> ');
    });

    $('#password_form').submit(function(){
        $('#password_button').prop('disabled', true);
        $('#password_button').prepend('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> ');
    });
</script>

@if (session('updated_profile') == true)
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

@endpush
