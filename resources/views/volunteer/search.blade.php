
@extends('layouts.app')

@section('title') {{ __('Szukaj') }} @endsection
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
              <li class="breadcrumb-item text-sm text-white active" aria-current="page">{{ __('Szukaj') }}</li>
            </ol>
            <h6 class="font-weight-bolder text-white mb-0">{{ __('Szukaj') }}</h6>
          </nav>
          @include('volunteer.include.nav')
        </div>
      </nav>
    <div class="container-fluid py-4 min-vh-100">
        <div class="card">
            <div class="card-header pb-0">
                <h5>Postawowe informacje</h5>
             </div>
            <div class="card-body">
                <h3 class="w-100 text-center">Formularze</h3>
            <div class="row">
                @forelse ($forms as $form)
                            <div class="card col-xl-3 col-lg-4 col-md-6 mb-4 h-100">
                                <a href="{{ route('v.form.show', [$form->ivid]) }}">
                                    <div class="card-header p-0 mx-3 mt-3 position-relative z-index-1">
                                    <div class="d-block">
                                        <img src="{{ url($form->icon_src) }}" class="img-fluid border-radius-lg w-100">
                                    </div>
                                    </div>

                                    <div class="card-body pt-2">
                                    <span class="text-gradient text-primary text-uppercase text-xs font-weight-bold my-2">{{ $form->form_category->form_category_translate->name }}</span>
                                    <h5 class="card-title d-block text-darker">{{ $form->form_translate->title }}</h5>
                                    <p class="mb-2"><span class="text-dark">{{ __('volunteer.form.list.date') }}</span><br> <span>{{ date('d.m.Y', strtotime($form->expiration)) }} r. o godz. {{ date('H:i', strtotime($form->expiration)) }}</span></p>
                                    <p><i class="fa-solid fa-users text-primary"></i> <span class="badge badge-primary">{{ $form->signed_form_count }}</span></p>
                                    </div>
                                </a>
                            </div>

                @empty
                <h4 class="w-100 text-center text-danger">Brak formularzy</h4>
                @endforelse
            </div>
            <hr>

            <div class="d-none">
                <h3 class="w-100 text-center">Posty</h3>
            <div class="row">
                    <div class="col-xl-3 col-lg-4 col-md-6 mb-4 h-100">
                        <a href="">
                            <div class="card">
                                <div class="card-body">
                                <h3 class="card-title text-primary"></h3>
                                <h5></h5>
                                <h4><b>Czytaj dalej...</b></h4>
                                <h4 class="text-muted">Autor: </h4>
                                <h4 class="text-muted"></h4>
                                </div>
                            </div>
                        </a>
                    </div>
            </div>
            <hr>
            </div>
            <h3 class="w-100 text-center">Nagrody</h3>
            <div class="row">
                @forelse ($prizes as $prize)
                            <div class="card col-xl-3 col-lg-4 col-md-6 mb-4 h-100">
                                <a href="{{ route('v.prize', [$prize->ivid]) }}">
                                    <div class="card-header p-0 mx-3 mt-3 position-relative z-index-1">
                                    <div class="d-block">
                                        <img src="{{ url($prize->icon_src) }}" class="img-fluid border-radius-lg w-100">
                                    </div>
                                    </div>

                                    <div class="card-body pt-2">
                                        <span class="text-gradient text-primary text-uppercase text-xs font-weight-bold my-2">{{ $prize->category->prize_category_translate->name }}</span>
                                        <h5 class="card-title d-block text-darker">{{ $prize->prize_translate->title }}</h5>
                                        <p class="mb-2"><span class="text-dark">Ilość dostępnych sztuk:
                                            @if ($prize->with_combinations == 0)
                                                {{ $prize->quantity }}
                                            @else
                                                {{ $prize->combinations->sum('quantity') }}
                                            @endif
                                        </span></p>
                                        <p><i class="fa-solid fa-star text-primary"></i> <span class="badge badge-primary">{{ $prize->points }}</span></p>
                                        </div>
                                </a>
                            </div>

                @empty
                <h4 class="w-100 text-center text-danger">Brak nagród</h4>
                @endforelse
            </div>
            <hr>
            </div>
        </div>
    </div>
      @include('volunteer.include.footer')
    </div>
  </main>
@endsection


