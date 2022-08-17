@extends('layouts.app')

@section('title')
{{ __('lista sponsorów') }}
@endsection

@section('content')

<nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      @include('coordinator.include.logo')
      <div class="navbar-inner">
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            @include('coordinator.include.dashboard')
        </ul>
        <hr class="my-3">
        <h6 class="navbar-heading p-0 text-muted">
            <span class="docs-normal">{{ __('Ogólne') }}</span>
        </h6>
        <ul class="navbar-nav">
            @include('coordinator.include.volunteer')
            @include('coordinator.include.chat')
            @include('coordinator.include.send-mail')
          </ul>
          <hr class="my-3">
        <h6 class="navbar-heading p-0 text-muted">
            <span class="docs-normal">{{ __('Moduły') }}</span>
        </h6>
          <ul class="navbar-nav">
            @include('coordinator.include.forms')
            @include('coordinator.include.posts')
            @include('coordinator.include.prizes')

            <li class="nav-item active">
                <a class="nav-link" href="#sponsors" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="sponsors">
                  <i class="fas fa-hand-holding-dollar text-primary"></i>
                  <span class="nav-link-text">Sponsorzy</span>
                </a>
                <div class="collapse show" id="sponsors">
                  <ul class="nav nav-sm flex-column">
                    <li class="nav-item">
                        <a href="{{ route('c.sponsor.search') }}" class="nav-link">
                          <span class="sidenav-normal"> Szukaj </span>
                        </a>
                      </li>
                    <li class="nav-item active">
                      <a href="{{ route('c.sponsor.list') }}" class="nav-link">
                        <span class="sidenav-normal"> Lista </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="{{ route('c.sponsor.create') }}" class="nav-link">
                        <span class="sidenav-normal"> Utwórz nowy </span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
          </ul>

          <hr class="my-3">

          <ul class="navbar-nav mb-md-3">
            @include('coordinator.include.other')
          </ul>
        </div>
      </div>
    </div>
  </nav>
  <div class="main-content" id="panel">

    @include('coordinator.include.nav')

    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">{{ __('Lista sponsorów') }}</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="{{ route('c.dashboard') }}"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item" aria-current="page">{{ __('Sponsorzy') }}</li>
                  <li class="breadcrumb-item active"><a href="{{ route('c.sponsor.list') }}">{{ __('Lista') }}</a></li>
                </ol>
              </nav>
            </div>
            @include('coordinator.include.button')
          </div>
        </div>
      </div>
    </div>

    <!-- Page content style="width: 18rem;" -->

    <div class="container-fluid mt--6">
                    @if (session('delete_sponsor') == true)
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <span class="alert-text"><strong>{{ __('Sukces!') }}</strong> {{ __('Sponsor został usunięty pomyślnie!') }}</span>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endif
        <div class="row">
            @forelse ($sponsors as $sponsor)
                <div class="col-xl-3 col-lg-4 col-md-6 mb-4 h-100">
                    <a href="{{ route('c.sponsor.show', [$sponsor->ivid]) }}">
                        <div class="card">
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <img class="w-100 h-auto" src="{{ $sponsor->logo_src }}" alt="Card image cap">
                            </div>

                            <div class="card-body">
                            <h3 class="card-title text-primary mb-2">{{ $sponsor->name }}</h3>
                            <h5>{!! Str::limit(strip_tags($sponsor->description), 30) !!}</h5>
                            <h4><b>{{ __('Zobacz więcej...') }}</b></h4>
                            </div>
                        </div>
                    </a>
                </div>
            @empty
            <div class="card w-100">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h1 class="text-center text-danger w-100">Brak sponsorów!</h1>
                </div>
            </div>
            @endforelse

        </div>

        @include('volunteer.include.footer')
      </div>
  </div>

@endsection
