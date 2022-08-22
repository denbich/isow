
@extends('layouts.app')

@section('title') {{ __('Archiwum formularzy') }} @endsection

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
        <li class="nav-item mt-3">
            <h6 class="ps-3 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">{{ __('Moduły') }}</h6>
          </li>
          <li class="nav-item ps-1 pt-1">
            <a data-bs-toggle="collapse" href="#forms" class="nav-link active py-2" aria-controls="forms" role="button" aria-expanded="true">
                    <i class="fa-solid fa-clipboard-list text-primary text-sm opacity-10"></i>
                <span class="nav-link-text ms-1">{{ __('Formularze') }}</span>
            </a>
            <div class="collapse show" id="forms">
                <ul class="nav ms-4">
                    <li class="nav-item">
                        <a href="{{ route('c.form.list') }}" class="nav-link">
                          <span class="sidenav-normal"> {{ __('Lista') }} </span>
                        </a>
                      </li>
                      <li class="nav-item active">
                        <a class="nav-link" href="{{ route('c.form.archive') }}">
                          <span class="sidenav-normal"> {{ __('Archiwum') }} </span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{ route('c.formcategory.list') }}" class="nav-link">
                          <span class="sidenav-normal"> {{ __('Kategorie') }} </span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{ route('c.form.create') }}" class="nav-link">
                          <span class="sidenav-normal"> {{ __('Utwórz nowy') }} </span>
                        </a>
                      </li>
                </ul>
            </div>
        </li>
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
              <li class="breadcrumb-item text-sm text-white" aria-current="page">{{ __('Formularze') }}</li>
              <li class="breadcrumb-item text-sm text-white active" aria-current="page">{{ __('Archiwum') }}</li>
            </ol>
            <h6 class="font-weight-bolder text-white mb-0">{{ __('Archiwum formularzy') }}</h6>
          </nav>
          @include('coordinator.include.nav')
        </div>
      </nav>

    <div class="container-fluid py-4 min-vh-100">
        <div class="row">
            <div class="col-lg-6 col-12 d-flex ms-auto">
                <a href="{{ route('c.form.create') }}" class="btn btn-icon btn-outline-white ms-auto">
                    <span class="btn-inner--icon me-2"><i class="fa-solid fa-plus"></i></span>
                    <span class="btn-inner--text">{{ __('Utwórz nowy') }}</span>
                    </a>
               <a href="{{ route('c.form.list') }}" class="btn btn-icon bg-gradient-dark ms-3">
                <span class="btn-inner--icon me-2"><i class="fa-solid fa-arrow-left"></i></span>
               <span class="btn-inner--text">{{ __('Wróć do listy') }}</span>

               </a>
            </div>
         </div>

         <div class="row">
            @forelse ($forms as $form)
            <div class="card col-lg-3 col-md-6">
            <a href="{{ route('c.form.show', [$form->ivid]) }}">
                <div class="card-header p-0 mx-3 mt-3 position-relative z-index-1">
                <div class="d-block">
                    <img src="{{ url($form->icon_src) }}" class="img-fluid border-radius-lg w-100">
                </div>
                </div>

                <div class="card-body pt-2">
                <span class="text-gradient text-primary text-uppercase text-xs font-weight-bold my-2">{{ $form->form_category->form_category_translate->name }}</span>
                <h5 class="card-title d-block text-darker">{{ $form->form_translate->title }}</h5>
                <p class="mb-2"><span class="text-dark">{{ __('volunteer.form.list.date') }}</span><br> <span>{{ date('d.m.Y', strtotime($form->expiration)) }} r. o godz. {{ date('H:i', strtotime($form->expiration)) }}</span></p>
                <p><i class="fa-solid fa-users text-primary"></i> <span class="badge badge-primary">{{ 1 }}</span></p>
                </div>
            </a>
          </div>
            @empty

            <div class="card col-12 mb-8">
                <div class="card-body py-3 d-flex flex-row align-items-center justify-content-between">
                    <h4 class="text-center text-danger w-100 my-3">{{ __('Brak zarchiwizowanych formularzy!') }}</h4>
                </div>
            </div>

            @endforelse
         </div>

      @include('coordinator.include.footer')
    </div>
  </main>
@endsection
