@extends('layouts.app')

@section('title')
{{ __('Edytuj sponsora') }}
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
                  <li class="breadcrumb-item" aria-current="page">Edycja</li>
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
        <form action="{{ route('c.sponsor.update', [$sponsor->ivid]) }}" method="post">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-lg-4 order-lg-2">
                  <div class="card">
                    <div class="card-body text-center">
                        <img src="{{ url($sponsor->logo_src) }}" class="w-100 h-auto" style="max-height: 300px; max-width:300px" alt="logo">
                                <div class="form-group">
                                    <label for="upload_image" class="w-100">
                                        <a class="btn btn-primary btn-icon w-100 text-white">
                                            <span class="btn-inner--icon"><i class="far fa-images"></i></span>
                                            <span class="btn-inner--text">Zmień logo sponsora</span>
                                        </a>
                                        <input type="file" name="image" class="image d-none" id="upload_image" accept="image/*">
                                        <input type="hidden" name="logo" id="icon_photo" value="">
                                    </label>
                                    <p class="text-success text-center" id="text-photo"></p>
                                    @if($errors->has('logo'))
                                        <div class="text-danger w-100 d-block">
                                            {{ $errors->first('logo') }}
                                        </div>
                                     @endif
                                </div>
                        <h3 class="text-center">Opcje</h3>
                        <button class="btn btn-success w-100 my-2" type="submit">Zapisz</button>
                        <a href="{{ route('c.sponsor.edit', [$sponsor->ivid]) }}" class="btn btn-danger w-100 my-2 text-white">Anuluj</a>
                    </div>
                  </div>
                </div>
                <div class="col-lg-8 h-100 order-lg-1">
                  <div class="card">
                    <div class="card-header">
                      <div class="row align-items-center">
                        <div class="col-8">
                          <h3 class="mb-0">{{ __('Informacja o sponsorze') }}</h3>
                        </div>
                      </div>
                    </div>
                    <div class="card-body">
                        @if (session('edited_sponsor') == true)
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <span class="alert-text"><strong>{{ __('Sukces!') }}</strong> {{ __('Sponsor został zedytowany pomyślnie!') }}</span>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <div class="pt-2">
                                <div class="row">
                                    <div class="col-lg-6">
                                      <div class="form-group">
                                        <label class="form-control-label">Nazwa</label>
                                        <input type="text" name="name" id="name" class="form-control" value="{{ $sponsor->name }}">
                                        @if($errors->has('name'))
                                            <div class="text-danger w-100 d-block">
                                                {{ $errors->first('name') }}
                                            </div>
                                        @endif
                                      </div>
                                    </div>
                                    <div class="col-lg-6">
                                      <div class="form-group">
                                        <label class="form-control-label">Opis</label>
                                        <input type="text" name="description" id="description" class="form-control" value="{{ $sponsor->description }}">
                                        @if($errors->has('description'))
                                            <div class="text-danger w-100 d-block">
                                                {{ $errors->first('description') }}
                                            </div>
                                        @endif
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-lg-6">
                                      <div class="form-group">
                                        <label class="form-control-label">Telefon</label>
                                        <input type="tel" name="telephone" id="telephone" class="form-control" value="{{ $sponsor->telephone }}">
                                        @if($errors->has('telephone'))
                                            <div class="text-danger w-100 d-block">
                                                {{ $errors->first('telephone') }}
                                            </div>
                                        @endif
                                      </div>
                                    </div>
                                    <div class="col-lg-6">
                                      <div class="form-group">
                                        <label class="form-control-label">Adres email</label>
                                        <input type="email" name="email" id="email" class="form-control" value="{{ $sponsor->email }}">
                                        @if($errors->has('email'))
                                            <div class="text-danger w-100 d-block">
                                                {{ $errors->first('email') }}
                                            </div>
                                        @endif
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-lg-6">
                                      <div class="form-group">
                                        <label class="form-control-label">Adres sponsora</label>
                                        <input type="text" name="address" id="address" class="form-control" value="{{ $sponsor->address }}">
                                        @if($errors->has('address'))
                                            <div class="text-danger w-100 d-block">
                                                {{ $errors->first('address') }}
                                            </div>
                                        @endif
                                      </div>
                                    </div>
                                    <div class="col-lg-6">
                                      <div class="form-group">
                                        <label class="form-control-label">Strona WWW</label>
                                        <input type="text" name="website" id="website" class="form-control" value="{{ $sponsor->website }}">
                                        @if($errors->has('website'))
                                            <div class="text-danger w-100 d-block">
                                                {{ $errors->first('website') }}
                                            </div>
                                        @endif
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-lg-6">
                                      <div class="form-group">
                                        <label class="form-control-label">Facebook</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">@</span>
                                            </div>
                                            <input type="text" class="form-control" name="facebook" id="facebook" max="255" value="{{ $sponsor->facebook }}" aria-describedby="basic-addon1">
                                        </div>
                                        @if($errors->has('facebook'))
                                            <div class="text-danger w-100 d-block">
                                                {{ $errors->first('facebook') }}
                                            </div>
                                        @endif
                                      </div>
                                    </div>
                                    <div class="col-lg-6">
                                      <div class="form-group">
                                        <label class="form-control-label">Instagram</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">@</span>
                                            </div>
                                            <input type="text" class="form-control" name="instagram" id="instagram" max="255" value="{{ $sponsor->instagram }}" aria-describedby="basic-addon1">
                                        </div>
                                        @if($errors->has('instagram'))
                                            <div class="text-danger w-100 d-block">
                                                {{ $errors->first('instagram') }}
                                            </div>
                                        @endif
                                      </div>
                                    </div>
                                  </div>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
        </form>

        @yield('coordinator.include.footer')
      </div>
  </div>

@endsection






