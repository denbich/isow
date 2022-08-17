@extends('layouts.app')

@section('title')
{{ __('lista nagród') }}
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
            @include('coordinator.include.forms')
            @include('coordinator.include.posts')
            <li class="nav-item active">
                <a class="nav-link active" href="#prizes" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="prizes">
                  <i class="fas fa-award text-primary"></i>
                  <span class="nav-link-text">Nagrody</span>
                </a>
                <div class="collapse show" id="prizes">
                  <ul class="nav nav-sm flex-column">
                    <li class="nav-item">
                      <a href="{{ route('c.prize.search') }}" class="nav-link">
                        <span class="sidenav-normal"> Wyszukaj </span>
                      </a>
                    </li>
                    <li class="nav-item active">
                      <a href="{{ route('c.prize.list') }}" class="nav-link">
                        <span class="sidenav-normal"> Lista </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="{{ route('c.prize.orders') }}" class="nav-link">
                        <span class="sidenav-normal"> Lista zamówień </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="{{ route('c.prize.create') }}" class="nav-link">
                        <span class="sidenav-normal"> Utwórz nową </span>
                      </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('c.prizecategory.list') }}" class="nav-link">
                          <span class="sidenav-normal"> Kategorie </span>
                        </a>
                      </li>
                  </ul>
                </div>
              </li>
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
              <h6 class="h2 text-white d-inline-block mb-0">Lista nagród</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="{{ route('c.dashboard') }}"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item" aria-current="page">Nagrody</li>
                  <li class="breadcrumb-item active"><a href="{{ route('c.prize.list') }}">Lista</a></li>
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
        @if (session('delete_prize') == true)
                    @php session()->forget('delete_prize'); @endphp
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <span class="alert-text"><strong>Sukces!</strong> Nagroda została usunięta pomyślnie!</span>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    @endif
        <div class="row">
            @forelse ($prizes as $prize)
                <div class="col-xl-3 col-lg-4 col-md-6 mb-4 h-100">
                    <a href="{{ route('c.prize.show', [$prize->ivid]) }}">
                        <div class="card">
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <img class="w-100 h-auto" src="{{ $prize->icon_src }}" alt="Card image cap">
                            </div>

                            <div class="card-body">
                            <h3 class="card-title text-primary">{{ $prize->prize_translate->title }}</h3>
                            <h4><i class="fas fa-star"></i> {{ $prize->points }}</h4>
                            <h4>Dostępnych sztuk: @php $c = 0; @endphp @foreach($prize->combination as $combination) @php $c = $c + $combination->quantity; @endphp @endforeach
                                {{ $c }}
                            </h4>
                            <h4 class="text-muted">Kategoria: <i>{{ $prize->category->name }}</i></h4>
                            </div>
                        </div>
                    </a>
                </div>
            @empty
            <div class="card w-100">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h1 class="text-center text-danger w-100">Brak nagród!</h1>
                </div>
            </div>

            @endforelse

        </div>

        @yield('coordinator.include.footer')
      </div>
  </div>

@endsection






