
@extends('layouts.app')

@section('title') {{ __('Profil wolontariusza') }} @endsection
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
        @include('volunteer.include.other')
      </ul>
    </div>
  </aside>
  <main class="main-content position-relative border-radius-lg ">
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
        <div class="container-fluid py-1 px-3">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
              <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="{{ route('v.dashboard') }}"><i class="fa-solid fa-house"></i></a></li>
              <li class="breadcrumb-item text-sm text-white active" aria-current="page">{{ __('Profil') }}</li>
            </ol>
            <h6 class="font-weight-bolder text-white mb-0">{{ __('Profil wolontariusza') }}</h6>
          </nav>
          @include('volunteer.include.nav')
        </div>
      </nav>
    <div class="container-fluid py-4 min-vh-100">
        <div class="row">
            <div class="col-lg-6 col-12 d-flex ms-auto">
                <a href="{{ route('v.settings') }}" class="btn btn-icon bg-gradient-dark ms-auto">
                    <span class="btn-inner--icon me-2"><i class="fa-solid fa-user-pen"></i></span>
                   <span class="btn-inner--text">{{ __('Edytuj') }}</span>
                </a>
                <a href="{{ route('v.id') }}" class="btn btn-icon bg-gradient-dark ms-3">
                    <span class="btn-inner--icon me-2"><i class="fa-solid fa-id-card"></i></span>
                   <span class="btn-inner--text">{{ __('Pokaż ID') }}</span>
                </a>
            </div>
         </div>
         <div class="card shadow-lg mb-4">
            <div class="card-body p-3">
                <div class="row gx-4">
                   <div class="col-auto">
                      <div class="avatar avatar-xl position-relative">
                         <img src="{{ url(Auth::user()->photo_src) }}" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
                      </div>
                   </div>
                   <div class="col-auto my-auto">
                      <div class="h-100">
                         <h5 class="mb-1">{{ Auth::user()->firstname." ".Auth::user()->lastname }}</h5>
                         <p class="mb-0 font-weight-bold text-sm">{{ Auth::user()->name }}</p>
                      </div>
                   </div>
                   <div class="ms-auto col-auto text-right me-4 d-none">
                        <h5 class="mb-1 text-right">{{ __('Liczba punktów') }}</h5>
                        <span class="ms-auto badge badge-primary badge-lg"><i class="fa-solid fa-star"></i> {{ 3 }}</span>
                   </div>
                </div>
             </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div class="card h-100">
                        <div class="card-header pb-0 p-3">
                            <div class="row">
                               <div class="col-md-8 d-flex align-items-center">
                                  <h6 class="mb-0">{{ __('Informacje o Tobie') }}</h6>
                               </div>
                            </div>
                         </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                  <div class="form-group">
                                    <label class="form-control-label">{{ __('Numer telefonu') }}</label>
                                    <p>{{ Auth::user()->telephone }}</p>
                                  </div>
                                </div>
                                <div class="col-lg-6">
                                  <div class="form-group">
                                    <label class="form-control-label">{{ __('Adres email') }}</label>
                                    <p>{{ Auth::user()->email }}</p>
                                  </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                      <label class="form-control-label">{{ __('Data urodzenia') }}</label>
                                      <p>{{ date('d.m.Y', strtotime($volunteer->birth)) }}</p>
                                    </div>
                                  </div>
                                  <div class="col-lg-6">
                                    <div class="form-group">
                                      <label class="form-control-label">{{ __('Rozmiar koszulki') }}</label>
                                      <p>{{ $volunteer->tshirt_size }}</p>
                                    </div>
                                  </div>
                                  <div class="col-lg-6">
                                    <div class="form-group">
                                      <label class="form-control-label">{{ __('Numer PESEL') }}</label>
                                      <p>{{ Crypt::decrypt($volunteer->pesel) }}</p>
                                    </div>
                                  </div>
                                  <div class="col-lg-6">
                                    <div class="form-group">
                                      <label class="form-control-label">{{ __('Adres') }}</label>
                                      <p>{{ $volunteer->street." ".$volunteer->house_number.", ".$volunteer->city }}</p>
                                    </div>
                                  </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                      <label class="form-control-label">{{ __('Płeć') }}</label>
                                      <p>@if (Auth::user()->gender == 'f'){{ __('Kobieta') }}@else{{ __('Mężczyzna') }}@endif</p>
                                    </div>
                                  </div>
                                <div class="col-lg-6">
                                    <label class="form-control-label">{{ __('Data rejestracji') }}</label>
                                      <p>{{ date('d.m.Y h:i', strtotime(Auth::user()->created_at)) }}</p>
                                  </div>

                              </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card h-100">
                        <div class="card-header pb-0 p-3">
                            <h6 class="mb-0">{{ __('Obecność na wydarzeniach') }}</h6>
                        </div>
                        <div class="card-body">
                            @if (1 == 2)
                            <ul>
                                <li></li>
                            </ul>
                            @else
                                @if (Auth::user()->gender == "f")
                                <p class="text-center text-danger">{{ __('Nie byłaś obecna na żadnym wydarzeniu!') }}</p>
                                @else
                                <p class="text-center text-danger">{{ __('Nie byłeś obecny na żadnym wydarzeniu!') }}</p>
                                @endif
                             @endif
                        </div>
                    </div>
                </div>
            </div>
    </div>
      @include('volunteer.include.footer')
    </div>
  </main>
@endsection

