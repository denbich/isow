@extends('layouts.app')

@section('title')
{{ __('Sponsor') }}
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
              <h6 class="h2 text-white d-inline-block mb-0">{{ $sponsor->name }}</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="{{ route('c.dashboard') }}"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item" aria-current="page"><a href="{{ route('c.sponsor.list') }}">Sponsor</a></li>
                  <li class="breadcrumb-item active">{{ $sponsor->id }}</li>
                </ol>
              </nav>
            </div>
            @include('coordinator.include.button')
          </div>
        </div>
      </div>
    </div>

    <!-- Page content -->

    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-lg-3 order-lg-2">
              <div class="card">
                <div class="card-body">
                    <h3 class="text-center">Informacje</h3>
                    <div class="my-2"></div>
                        <b class="mb-0">Data utworzenia:</b>
                        <p>{{ $sponsor->created_at }}</p>
                    <hr class="my-2">
                    <h3 class="text-center">Opcje</h3>
                    <a href="{{ route('c.sponsor.edit', [$sponsor->ivid]) }}" class="btn btn-success w-100 my-2 text-white">Edytuj sponsora</a>
                    <button class="btn btn-danger w-100 my-2" data-toggle="modal" data-target="#deletemodal">Usuń sponsora</button>
                </div>
              </div>
            </div>
            <div class="col-lg-9 h-100 order-lg-1">
              <div class="card">
                <div class="card-header">
                  <div class="row align-items-center">
                    <div class="col-8">
                      <h3 class="mb-0">{{ __('Informacja o sponsorze') }}</h3>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                    @if (session('created_sponsor') == true)
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <span class="alert-text"><strong>{{ __('Sukces!') }}</strong> {{ __('Sponsor został utworzony pomyślnie!') }}</span>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="row pt-2">
                        <div class="col-lg-4 text-center">
                            <img src="{{ url($sponsor->logo_src) }}" class="w-100 h-auto" style="max-height: 400px; max-width:400px" alt="logo">
                        </div>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-lg-6">
                                  <div class="form-group">
                                    <label class="form-control-label">Nazwa</label>
                                    <p>{{ $sponsor->name }}</p>
                                  </div>
                                </div>
                                <div class="col-lg-6">
                                  <div class="form-group">
                                    <label class="form-control-label">Opis</label>
                                    <p>{{ $sponsor->description }}</p>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-lg-6">
                                  <div class="form-group">
                                    <label class="form-control-label">Telefon</label>
                                    <p><a href="tel:{{ $sponsor->telephone }}">{{ $sponsor->telephone }}</a></p>
                                  </div>
                                </div>
                                <div class="col-lg-6">
                                  <div class="form-group">
                                    <label class="form-control-label">Adres email</label>
                                    <p><a href="mailto:{{ $sponsor->email }}">{{ $sponsor->email }}</a></p>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-lg-6">
                                  <div class="form-group">
                                    <label class="form-control-label">Adres sponsora</label>
                                    <p>{{ $sponsor->address }}</p>
                                  </div>
                                </div>
                                <div class="col-lg-6">
                                  <div class="form-group">
                                    <label class="form-control-label">Strona WWW</label>
                                    <p><a href="https://{{ $sponsor->website }}">{{ $sponsor->website }}</a></p>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-lg-6">
                                  <div class="form-group">
                                    <label class="form-control-label">Facebook</label>
                                    <p>@if ($sponsor->facebook!=null) <a href="https://facebook.com/{{ $sponsor->facebook }}" target="_blank">{{ $sponsor->facebook }}</a> @else Brak Facebooka @endif</p>
                                  </div>
                                </div>
                                <div class="col-lg-6">
                                  <div class="form-group">
                                    <label class="form-control-label">Instagram</label>
                                    <p>@if ($sponsor->instagram!=null) <a href="https://instagram.com/{{ "@".$sponsor->instagram }}" target="_blank">{{ "@".$sponsor->instagram }}</a> @else Brak Instagrama @endif</p>
                                  </div>
                                </div>
                              </div>
                        </div>
                    </div>
                </div>
              </div>
            </div>
          </div>

        @yield('coordinator.include.footer')
      </div>
  </div>

  <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="ModalLabel">{{ __('Usuń spnosora') }}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <h3 class="w-100 text-wrap text-center">{{ __('Czy jesteś pewnien, że chcesz usunąć sponsora') }} {{ $sponsor->name}}?</h3>
        </div>
        <div class="modal-footer">
            <form action="{{ route('c.sponsor.destroy', [$sponsor->ivid]) }}" method="post">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger">{{ __('Usuń') }}</button>
              </form>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Anuluj') }}</button>
        </div>
      </div>
    </div>
  </div>

@endsection






