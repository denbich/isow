@extends('layouts.app')

@section('title')
{{ __('Kategoria') }}
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
            @include('coordinator.include.chat')
            @include('coordinator.include.send-mail')
          </ul>
          <hr class="my-3">
        <h6 class="navbar-heading p-0 text-muted">
            <span class="docs-normal">ISOW</span>
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
                    <li class="nav-item active">
                        <a href="{{ route('c.formcategory.list') }}" class="nav-link">
                          <span class="sidenav-normal"> Kategorie </span>
                        </a>
                      </li>
                  </ul>
                </div>
              </li>
              @include('coordinator.include.posts')
            @include('coordinator.include.prizes')
            @include('coordinator.include.sponsors')
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
              <h6 class="h2 text-white d-inline-block mb-0">Utwórz nową kategorię</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="{{ route('c.dashboard') }}"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item" aria-current="page"><a href="{{ route('c.formcategory.list') }}">Kategorie</a></li>
                  <li class="breadcrumb-item active">Utwórz</li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Page content -->

    <div class="container-fluid mt--6">
        <form action="{{ route('c.formcategory.store') }}" method="post">
            @csrf
        <div class="row justify-content-center">
                  <div class="col-lg-6">
                    <div class="card">
                      <div class="card-header">
                        <div class="row align-items-center">
                          <div class="col-8">
                            <h3 class="mb-0">Utwórz kategorię</h3>
                          </div>
                        </div>
                      </div>
                      <div class="card-body">
                          <div class="row pt-2">
                              <div class="col-lg-6">
                                  <div class="form-group">
                                      <label for="name">Nazwa kategorii</label>
                                      <input type="text" class="form-control" name="name" id="name" max="255" required>
                                    @if($errors->has('name'))
                                        <div class="text-danger w-100 d-block">
                                            {{ $errors->first('name') }}
                                        </div>
                                    @endif
                                  </div>
                              </div>
                              <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="name">Opis kategorii</label>
                                    <input type="text" class="form-control" name="description" id="description" max="255">
                                    @if($errors->has('description'))
                                    <div class="text-danger w-100 d-block">
                                        {{ $errors->first('description') }}
                                    </div>
                                @endif
                                </div>
                              </div>
                          </div>
                          <button class="btn btn-success w-100 my-2" type="submit">Utwórz kategorię</button>
                      </div>
                    </div>
                  </div>
            </div>
        </form>
        @yield('coordinator.include.footer')
      </div>
  </div>

@endsection
