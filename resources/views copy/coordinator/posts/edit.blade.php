@extends('layouts.app')

@section('title')
{{ __('Edycja postu') }}
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
            <span class="docs-normal">Moduły</span>
        </h6>
          <ul class="navbar-nav">
            @include('coordinator.include.forms')
            <li class="nav-item active">
                <a class="nav-link collapsed active" href="#posts" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="posts">
                  <i class="fas fa-table text-primary"></i>
                  <span class="nav-link-text">Posty</span>
                </a>
                <div class="collapse show" id="posts">
                  <ul class="nav nav-sm flex-column">
                    <li class="nav-item active">
                      <a href="{{ route('c.post.list') }}" class="nav-link">
                        <span class="sidenav-normal"> Lista </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="{{ route('c.post.create') }}" class="nav-link">
                        <span class="sidenav-normal"> Utwórz nowy </span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
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
              <h6 class="h2 text-white d-inline-block mb-0">Edycja postu #{{ $post->id }}</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="{{ route('c.dashboard') }}"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item" aria-current="page"><a href="{{ route('c.post.list') }}">Posty</a></li>
                  <li class="breadcrumb-item">Edycja</li>
                  <li class="breadcrumb-item active"><a href="{{ route('c.post.edit', [$post->ivid]) }}">{{ $post->id }}</a></li>
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
              <div class="card">
                <div class="card-header">
                  <div class="row align-items-center">
                    <div class="col-8">
                      <h3 class="mb-0">Edycja </h3>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('c.post.update', [$post->ivid]) }}" method="post" role="form">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="locale" value="pl">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                @if (session('edited_post') == true)
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <span class="alert-text"><strong>Sukces!</strong> Edycja postu przebiegła pomyślnie!</span>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif
                                <div class="form-group">
                                    <label class="required" for="title">Tytuł</label>
                                    <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" maxlength="255" type="text" name="title" id="title" value="{{ $post->post_translate->title }}" required>
                                    @if($errors->has('title'))
                                        <div class="text-danger w-100 d-block">
                                            {{ $errors->first('title') }}
                                        </div>
                                    @endif
                                    <p id="counter_title" class="text-sm">0 / 255 znaków</p>
                                </div>
                                <div class="form-group">
                                    <label for="content">Zawartość</label>
                                    <textarea name="content" id="content"></textarea>
                                    @if($errors->has('content'))
                                        <div class="text-danger w-100 d-block">
                                            {{ $errors->first('content') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary w-100">Zaaktualizuj post</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
              </div>

        @yield('coordinator.include.footer')
      </div>
  </div>

@endsection

@section('script')

<script>

    var chars = $('#title').val().length;
    $('#counter_title').html(chars +' / 255 znaków');

    $(document).ready(function() {
        $('#title').on('keyup propertychange paste', function(){
            var chars = $('#title').val().length;
            $('#counter_title').html(chars +' / 255 znaków');
        });

    });

</script>

@endsection

@section('style')

<script>
    tinymce.init({
      selector: 'textarea#content',
      skin: 'bootstrap',
      height: 350,
      language: '{{ session("locale") }}',
        plugins: [
            'advlist', 'autolink', 'lists', 'link', 'image', 'charmap',
            'anchor', 'searchreplace', 'visualblocks',
            'insertdatetime', 'media', 'table', 'help', 'wordcount'
        ],
        toolbar: 'undo redo | blocks | ' +
        'bold italic backcolor | alignleft aligncenter ' +
        'alignright alignjustify | bullist numlist outdent indent | ' +
        'removeformat | help',
        font_formats: "Nunito-nunito",
      setup: function (editor) {
      editor.on('init', function (e) {
        editor.setContent("{!! str_replace('"', "'", str_replace('\r\n', '', $post->post_translate->content)) !!}");
      });
    }
    });
  </script>

@endsection





