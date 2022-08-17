@extends('layouts.app')

@section('title')
{{ __('Chmura') }}
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
              <span class="docs-normal">{{ __('Moduły') }}</span>
          </h6>
            <ul class="navbar-nav">
              @include('coordinator.include.forms')
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
              <h6 class="h2 text-white d-inline-block mb-0">Chmura plików</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="{{ route('c.dashboard') }}"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item active" aria-current="page">Chmura</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
                <button href="#" class="btn btn-sm btn-neutral" disabled><i class="fas fa-plus"></i> {{ __('Utwórz plik') }}</button>
              </div>

          </div>
        </div>
      </div>
    </div>

    <!-- Page content -->

    <div class="container-fluid mt--6">
            <div class="card">
              <div class="card-header">
                <div class="row align-items-center">
                  <div class="col-8">
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
                        <ol class="breadcrumb breadcrumb-links mb-0">
                          <li class="breadcrumb-item"><a href="#"><i class="fa-solid fa-house"></i></a></li>
                          <li class="breadcrumb-item active text-dark" aria-current="page">asas</li>
                        </ol>
                      </nav>
                  </div>
                  <div class="col-4 text-right">
                    <button class="btn btn-outline-primary" type="button" data-toggle="modal" data-target="#createfoldermodal">
                        <i class="fa-solid fa-folder-plus"></i>
                    </button>
                    <button class="btn btn-outline-primary" type="button" id="upload_file_button">
                        <i class="fa-solid fa-file-arrow-up"></i>
                    </button>
                    <form id="file_form" class="w-auto" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="file" class="d-none" id="upload_file_input">
                    </form>
                  </div>
                </div>
              </div>
                <div class="card-body">
                    <div id="folder-div">
                        <button class="btn btn-outline-primary mt-1" type="button"><i class="fa-solid fa-folder mr-2"></i> Nowy folder</button>
                    </div>

                    <hr>
                </div>
            </div>

        @yield('coordinator.include.footer')
      </div>
  </div>


  <div class="modal fade" id="createfoldermodal" tabindex="-1" role="dialog" aria-labelledby="createfoldermodallabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="createfoldermodallabel">Utwórz folder</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
              <label for="folder_name">Nazwa folderu</label>
              <input type="text" name="folder_name" id="folder_name" class="form-control" value="Nowy folder">
          </div>
          <div class="form-group">
            <label for="folder_color">kolor folderu</label>
            <select name="folder_color" id="folder_color" class="form-control">
                <option value="primary" selected>Niebieski</option>
                <option value="success">Zielony</option>
                <option value="info">Żółty</option>
                <option value="danger">Czerwony</option>
                <option value="warning">Pomarańczowy</option>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Zamknij</button>
          <button type="button" class="btn btn-primary" id="create_folder_button">Utwórz</button>
        </div>
      </div>
    </div>
  </div>

@endsection

@section('script')
<script src="{{ url('/js/functions/cloud.js?v=7') }}"></script>
@endsection
