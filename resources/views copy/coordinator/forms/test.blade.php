@extends('layouts.app')

@section('title')
{{ __('TEST') }}
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
            <span class="docs-normal">Ogólne</span>
        </h6>
        <ul class="navbar-nav">
            @include('coordinator.include.volunteer')
            @include('coordinator.include.posts')
            @include('coordinator.include.chat')
            @include('coordinator.include.send-mail')
          </ul>
          <hr class="my-3">
        <h6 class="navbar-heading p-0 text-muted">
            <span class="docs-normal">Formularze</span>
        </h6>
          <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link active" href="#forms" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="forms">
                  <i class="fas fa-clipboard-list text-primary"></i>
                  <span class="nav-link-text">Formularze</span>
                </a>
                <div class="collapse show" id="forms">
                  <ul class="nav nav-sm flex-column">
                    <li class="nav-item">
                      <a class="nav-link" href="{{ route('c.form.list') }}">
                        <span class="sidenav-normal"> Lista </span>
                      </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('c.form.archive') }}">
                          <span class="sidenav-normal"> Archiwum </span>
                        </a>
                      </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{{ route('c.form.create') }}">
                        <span class="sidenav-normal"> Utwórz nowy </span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
            @include('coordinator.include.form-category')
          </ul>
          <hr class="my-3">
        <h6 class="navbar-heading p-0 text-muted">
            <span class="docs-normal">Nagrody</span>
        </h6>
          <ul class="navbar-nav">
            @include('coordinator.include.prizes')
            @include('coordinator.include.sponsors')
            @include('coordinator.include.prize-category')
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
              <h6 class="h2 text-white d-inline-block mb-0">TEST</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="{{ route('c.dashboard') }}"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item" aria-current="page"><a href="{{ route('c.form.list') }}">Formularze</a></li>
                  <li class="breadcrumb-item active"><a href="{{ route('c.form.create') }}">TEST</a></li>
                </ol>
              </nav>
            </div>
          </div>
        </div><
      </div>
    </div>

    <!-- Page content -->

    <div class="container-fluid mt--6">
            <div class="card">
              <div class="card-header">
                <div class="row align-items-center">
                  <div class="col-8">
                    <h3 class="mb-0">TEST </h3>
                  </div>
                </div>
              </div>
                <div class="card-body container">
                    <h2 class="w-100 text-center">Stanowiska </h2>
                    <h4 class="w-100 text-center">Ilość stanowisk: <span id="position_count">0</span></h4>
                    <input type="hidden" name="position_count" value="0">
                    <button class="btn btn-icon btn-primary w-100 mb-2" type="button" id="add_position">
                        <span class="btn-inner--icon"><i class="fas fa-plus"></i></span>
                        <span class="btn-inner--text">Dodaj stanowisko</span>
                    </button>
                    <div id="positions">
                    </div>

                </div>
            </div>

        @yield('coordinator.include.footer')
      </div>
  </div>


@endsection

@section('script')

<script src="{{ url('/js/functions/forms.min.js') }}"></script>

@endsection
