
@extends('layouts.app')

@section('title') {{ __('Czat') }} @endsection

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
        <li class="nav-item ps-1 pt-1">
            <a class="nav-link active" href="{{ route('c.chat') }}">
              <i class="fa-solid fa-comments text-primary text-sm opacity-10"></i>
              <span class="nav-link-text ms-1">{{ __('Chat') }}</span>
            </a>
          </li>

        @include('coordinator.include.send_mail')
        @include('coordinator.include.forms')
        @include('coordinator.include.posts')
        @include('coordinator.include.prizes')
        @include('coordinator.include.sponsors')
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
              <li class="breadcrumb-item text-sm text-white active" aria-current="page">{{ __('Czat') }}</li>
            </ol>
            <h6 class="font-weight-bolder text-white mb-0">{{ __('Czat') }}</h6>
          </nav>
          @include('coordinator.include.nav')
        </div>
      </nav>

    <div class="container-fluid py-4 min-vh-100">
        <div class="card">
            <div class="card-body">
                <h4 class="text-danger text-center">{{ __('Czat jest niedost??pny! Spr??buj ponownie p????niej') }}</h4>
            </div>
        </div>
    </div>

      @include('coordinator.include.footer')
    </div>
  </main>
@endsection
