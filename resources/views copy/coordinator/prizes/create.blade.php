@extends('layouts.app')

@section('title')
{{ __('Nowa nagroda') }}
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
                    <li class="nav-item">
                      <a href="{{ route('c.prize.list') }}" class="nav-link">
                        <span class="sidenav-normal"> Lista </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="{{ route('c.prize.orders') }}" class="nav-link">
                        <span class="sidenav-normal"> Lista zamówień </span>
                      </a>
                    </li>
                    <li class="nav-item active">
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
                <h6 class="h2 text-white d-inline-block mb-0">Nowa nagroda</h6>
                <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                  <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                    <li class="breadcrumb-item"><a href="{{ route('c.dashboard') }}"><i class="fas fa-home"></i></a></li>
                    <li class="breadcrumb-item" aria-current="page"><a href="{{ route('c.prize.list') }}">Nagrody</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('c.prize.create') }}">Nowa</a></li>
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
                  <h3 class="mb-0">Nowa nagroda </h3>
                </div>
              </div>
            </div>
              <div class="card-body container">
                  <div id="form">
                    <div class="nav-wrapper">
                        <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-toggle="tab" href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true"><i class="fa-solid fa-award mr-2"></i>Nagroda</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab" href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2" aria-selected="false"><i class="fa-solid fa-table-list mr-2"></i>Kategoria i sponsor</a>
                            </li>
                            <li class="nav-item d-none" id="combination-nav-item">
                                <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-3-tab" data-toggle="tab" href="#tabs-icons-text-3" role="tab" aria-controls="tabs-icons-text-3" aria-selected="false"><i class="fa-solid fa-puzzle-piece mr-2"></i>Kombinacje</a>
                            </li>
                        </ul>
                    </div>
                    <hr class="my-2">
                    <form action="{{ route('c.prize.store') }}" method="post" role="form">
                        @csrf
                        <input type="hidden" name="locale" value="pl">
                        <div class="mb-0">
                            <div class="card-body "> <!-- row justify-content-center   col-lg-8-->
                                <div>
                                    <ul>
                                        @if ($errors->any())
                                            @foreach ($errors->all() as $error)
                                                <li>{{$error}}</li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </div>
                                <div class="tab-content " id="myTabContent">
                                    <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel" aria-labelledby="tabs-icons-text-1-tab">
                                        <div class="row">
                                            <div class="col-lg-8">
                                                <div class="form-group">
                                                    <label class="required" for="title">Tytuł</label>
                                                    <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" maxlength="255" type="text" name="title" id="title" value="{{ old('title', '') }}" required>
                                                    @if($errors->has('title'))
                                                        <div class="text-danger w-100 d-block">
                                                            {{ $errors->first('title') }}
                                                        </div>
                                                    @endif
                                                    <p id="counter_title" class="text-sm">0 / 255 znaków</p>
                                                </div>
                                                <div class="form-group">
                                                    <label for="description">Opis</label>
                                                    <textarea name="description" id="description"></textarea>
                                                    @if($errors->has('description'))
                                                        <div class="text-danger w-100 d-block">
                                                            {{ $errors->first('description') }}
                                                        </div>
                                                    @endif
                                                </div>

                                            </div>
                                            <div class="col-lg-4">

                                                <div class="form-group">
                                                    <label class="required" for="points">Wartość punktowa</label>
                                                    <input class="form-control {{ $errors->has('points') ? 'is-invalid' : '' }}" type="number" name="points" id="points" value="{{ old('points', '') }}" required>
                                                    @if($errors->has('points'))
                                                        <div class="text-danger w-100 d-block">
                                                            {{ $errors->first('points') }}
                                                        </div>
                                                    @endif
                                                </div>

                                                <div class="form-group" id="quantity-div">
                                                    <label class="required" for="quantity">Ilość sztuk</label>
                                                    <input class="form-control {{ $errors->has('quantity') ? 'is-invalid' : '' }}" type="number" name="quantity" id="quantity" value="{{ old('quantity', '') }}">
                                                    @if($errors->has('quantity'))
                                                        <div class="text-danger w-100 d-block">
                                                            {{ $errors->first('quantity') }}
                                                        </div>
                                                    @endif
                                                </div>

                                                <div class="form-group">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="combination-check" name="combination_check" @if (old('combination_check') == "on") checked @endif>
                                                        <label class="custom-control-label" for="combination-check">Nagroda zawiera kombinacje</label>
                                                      </div>
                                                </div>

                                                <div class="form-group">
                                                    <h2 class="w-100 text-center">Ikona</h2>
                                                    <label for="upload_image" class="w-100">
                                                        <a class="btn btn-primary btn-icon w-100 text-white">
                                                            <span class="btn-inner--icon"><i class="far fa-images"></i></span>
                                                            <span class="btn-inner--text">Dodaj ikonę nagrody</span>
                                                        </a>
                                                        <input type="file" name="image" class="image d-none" id="upload_image" accept="image/*">
                                                        <input type="hidden" name="icon" id="icon_photo" value="">
                                                    </label>
                                                    <p class="text-success text-center" id="text-photo"></p>
                                                    @if($errors->has('icon'))
                                                        <div class="text-danger w-100 d-block">
                                                            {{ $errors->first('icon') }}
                                                        </div>
                                                     @endif

                                                </div>
                                            </div>
                                        </div>

                                        <hr class="my-4">

                                        <div class="form-group row justify-content-center">
                                            <a class="btn btn-primary w-100 col-lg-6 mt-1" id="btn-next1" data-toggle="tab" href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-1">Dalej <i class="fa-solid fa-arrow-right ml-2"></i></a>
                                        </div>

                                    </div>
                                    <div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel" aria-labelledby="tabs-icons-text-2-tab">
                                        <h1 class="text-center">Kategoria nagrody</h1>
                                        <div class="row justify-content-center">
                                            <div class="form-group col-lg-4">
                                                <select class="form-control" id="category-dropdown" name="category">
                                                    @forelse ($categories as $cat)
                                                    <option value="{{ $cat->ivid }}">{{ $cat->prize_category_translate->name }}</option>
                                                    @empty
                                                    <option disabled selected>Brak kategorii</option>
                                                    @endforelse
                                                  </select>
                                                  @if($errors->has('category'))
                                                        <div class="text-danger w-100 d-block">
                                                            {{ $errors->first('category') }}
                                                        </div>
                                                     @endif
                                            </div>
                                            <div class="form-group col-lg-4">
                                                <button class="btn btn-icon btn-primary w-100" type="button" data-toggle="modal" data-target="#modalcategory">
                                                    <span class="btn-inner--icon"><i class="fa-solid fa-plus"></i></span>
                                                    <span class="btn-inner--text">Lub dodaj nową kategorię</span>
                                                </button>
                                            </div>
                                        </div>

                                        <h1 class="text-center">Sponsor nagrody</h1>
                                        <div class="row justify-content-center">
                                            <div class="form-group col-lg-4">
                                                <select class="form-control" id="sponsor-dropdown" name="sponsor">
                                                    @forelse ($sponsors as $sponsor)
                                                    <option value="{{ $sponsor->ivid }}">{{ $sponsor->name }}</option>
                                                    @empty
                                                    <option disabled selected>Brak sponsora</option>
                                                    @endforelse
                                                  </select>
                                                  @if($errors->has('sponsor'))
                                                  <div class="text-danger w-100 d-block">
                                                      {{ $errors->first('sponsor') }}
                                                  </div>
                                               @endif
                                            </div>
                                            <div class="form-group col-lg-4">
                                                <button class="btn btn-icon btn-primary w-100" type="button" data-toggle="modal" data-target="#modalsponsor">
                                                    <span class="btn-inner--icon"><i class="fa-solid fa-plus"></i></span>
                                                    <span class="btn-inner--text">Lub dodaj nowego sponsora</span>
                                                </button>
                                            </div>
                                        </div>
                                        <hr class="my-4">
                                        <div class="form-group row">
                                            <div class="col-lg-6">
                                                <a class="btn btn-primary w-100 mt-1" id="btn-previous2" data-toggle="tab" href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-2"><i class="fa-solid fa-arrow-left mr-2"></i>Wróć</a>
                                            </div>

                                            <div class="col-lg-6">
                                                <a class="btn btn-primary w-100 mt-1 d-none" id="btn-next2" data-toggle="tab" href="#tabs-icons-text-3" role="tab" aria-controls="tabs-icons-text-2">Dalej <i class="fa-solid fa-arrow-right ml-2"></i></a>
                                                <button type="submit" class="btn btn-primary w-100 mt-1" id="btn-submit1">Stwórz nagrodę</button>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="tab-pane fade" id="tabs-icons-text-3" role="tabpanel" aria-labelledby="tabs-icons-text-3-tab">

                                        <div class="form-group px-4">
                                            <h2 class="w-100 text-center">Kombinacje </h2>
                                            <h4 class="w-100 text-center">Ilość Kombinacji: <span id="combination_count">{{ old('combination_count', 0) }}</span></h4>
                                            <input type="hidden" name="combination_count" value="{{ old('combination_count', 0) }}">
                                            <button class="btn btn-icon btn-primary w-100 mb-2" type="button" id="add_combination">
                                                <span class="btn-inner--icon"><i class="fas fa-plus"></i></span>
                                                <span class="btn-inner--text">Dodaj kombinację</span>
                                            </button>
                                            <div id="combinations">

                                            </div>
                                        </div>
                                        <div class="form-group px-4 d-none">
                                            <h2 class="w-100 text-center">Kombinacje <span id="count_h2_pol">0</span> / 20</h2>
                                            <div class="row justify-content-center">
                                                <button class="btn btn-icon btn-primary mb-2" type="button" id="add_combinations">
                                                    <span class="btn-inner--icon"><i class="fas fa-plus"></i></span>
                                                    <span class="btn-inner--text">Dodaj Kombinację</span>
                                                </button>
                                            </div>
                                            <input type="hidden" name="combinations_count" id="combinations_count" value="0">
                                            @if($errors->has('combinations_count'))
                                                <div class="text-danger w-100 d-block">
                                                    {{ $errors->first('combinations_count') }}
                                                </div>
                                             @endif
                                            <div id="combinations_div">

                                            </div>
                                            @php $iserror = false; @endphp
                                            @for ($i = 0; $i <= 20; $i++)
                                                @if($errors->has('name_combination'.$i))
                                                    @php $iserror = true; @endphp
                                                @endif
                                            @endfor
                                            @if ($iserror == true)

                                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                    <strong>Problemy z kombinacjami: </strong><br>
                                                    <span class="alert-text">
                                                        <ul>
                                                            @for ($i = 0; $i <= 20; $i++)
                                                                @if($errors->has('name_combination'.$i))
                                                                    <li>{{ $errors->first('name_combination'.$i) }}</li>
                                                                @endif
                                                            @endfor
                                                        </ul>
                                                    </span>
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>

                                            @endif
                                        </div>
                                        <hr class="my-4">
                                        <div class="form-group row">
                                            <div class="col-lg-6">
                                                <a class="btn btn-primary w-100 mt-1" id="btn-previous3" data-toggle="tab" href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-3"><i class="fa-solid fa-arrow-left mr-2"></i>Wróć</a>
                                            </div>

                                            <div class="col-lg-6">
                                                <button type="submit" class="btn btn-primary w-100 mt-1">Stwórz nagrodę</button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                  </div>
              </div>
          </div>

        @yield('coordinator.include.footer')
      </div>
  </div>

<div class="modal fade" id="modalcategory" tabindex="-1" role="dialog" aria-labelledby="modalcategoryLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="modalcategoryLabel">Utwórz kategorię dla nagród</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
                <label for="category-name" class="form-control-label">Nazwa kategorii</label>
                <input type="text" class="form-control" name="category-name" id="category-name" max="255">
            </div>
            <div class="form-group">
                <label for="category-description" class="form-control-label">Krótki opis kategorii (Nie wymagany)</label>
                <input type="text" class="form-control" name="category-description" id="category-description" max="255">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Zamknij</button>
            <button type="button" class="btn btn-primary" id="create-button-category">Utwórz</button>
          </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="modalsponsor" tabindex="-1" role="dialog" aria-labelledby="modalsponsorLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="modalsponsorLabel">Utwórz sponsora nagród</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <form id="sponsor_form">
                <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                          <label for="sponsor_name" class="form-control-label">Nazwa</label>
                          <input type="text" class="form-control" name="sponsor_name" id="sponsor_name" max="255" title="Pole nazwa nie może być pusty!" required>
                      </div>
                      <div class="form-group">
                          <label for="sponsor_address" class="form-control_label">Adres oddziału</label>
                          <input type="text" class="form-control" name="sponsor_address" id="sponsor_address" max="255" title="Pole adres nie może być pusty!" required>
                      </div>
                      <div class="form-group">
                          <label for="sponsor_website" class="form-control-label">Strona WWW (Nie wymagany)</label>
                          <input type="text" class="form-control" name="sponsor_website" id="sponsor_website" max="255">
                      </div>
                      <div class="form-group">
                          <label for="sponsor_name" class="form-control-label">Facebook (Nie wymagany)</label>
                          <div class="input-group">
                              <div class="input-group-prepend">
                                  <span class="input-group-text" id="basic-addon1">@</span>
                              </div>
                              <input type="text" class="form-control" name="sponsor_facebook" id="sponsor_facebook" max="255" aria-describedby="basic-addon1">
                          </div>

                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                          <label for="sponsor_description" class="form-control-label">Krótki opis sponsora (Nie wymagany)</label>
                          <input type="text" class="form-control" name="sponsor_description" id="sponsor_description" max="255">
                      </div>
                      <div class="form-group">
                          <label for="sponsor_telephone" class="form-control-label">Numer telefonu</label>
                          <input type="tel" class="form-control" name="sponsor_telephone" id="sponsor_telephone" max="255" title="Pole numer telefonu nie może być pusty!" required>
                      </div>
                      <div class="form-group">
                          <label for="sponsor_email" class="form-control-label">Adres email (Nie wymagany)</label>
                          <input type="email" class="form-control" name="sponsor_email" id="sponsor_email" max="255">
                      </div>
                      <div class="form-group">
                          <label for="sponsor_instagram" class="form-control-label">Instagram (Nie wymagany)</label>
                          <div class="input-group">
                              <div class="input-group-prepend">
                                  <span class="input-group-text" id="basic-addon2">@</span>
                              </div>
                              <input type="text" class="form-control" name="sponsor_instagram" id="sponsor_instagram" max="255" aria-describedby="basic-addon2">
                          </div>
                      </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <label for="upload_image1" class="w-100">
                            <a class="btn btn-primary btn-icon w-100 text-white">
                                <span class="btn-inner--icon"><i class="far fa-images"></i></span>
                                <span class="btn-inner--text">Dodaj logo</span>
                            </a>
                            <input type="file" name="logo" class="image d-none" id="upload_image1" accept="image/*">
                            <input type="hidden" name="logo_photo" id="logo_photo" value="">
                        </label>
                        <p class="text-success text-center" id="text-logo"></p>
                    </div>
                </div>
              </form>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Zamknij</button>
            <button type="button" class="btn btn-primary" id="create-button-sponsor">Utwórz</button>
          </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="cropmodal1" tabindex="-1" role="dialog" aria-labelledby="cropmodalLabel1" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title">Wytnij zdjęcie</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                </div>
                <div class="modal-body">
                     <div class="img-container">
                         <div class="row">
                             <div class="col-md-8">
                                 <img src="" id="sample_image1" class="img-crop"/>
                            </div>
                            <div class="col-md-4">
                                <div class="preview"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="crop1" class="btn btn-primary">Wytnij</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Anuluj</button>
                </div>
            </div>
        </div>
    </div>

  @yield('coordinator.include.footer')

@endsection

@section('style')

<script>
    tinymce.init({
      selector: 'textarea#description',
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
        editor.setContent("{!! str_replace('"', "'", str_replace('\r\n', '', old('description', ''))) !!}");
      });
    }
    });

  </script>

@endsection

@section('script')

<script src="{{ url('/js/functions/prizes.js?v=8') }}"></script>

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

<script>
    $('#btn-next1').click(function(){
        $('#btn-next1').removeClass("active");
        $('#btn-next2').removeClass("active");
        $('#btn-previous2').removeClass("active");
        $('#btn-previous3').removeClass("active");
        $('#tabs-icons-text-1-tab').removeClass("active");
        $('#tabs-icons-text-2-tab').addClass("active");
    });

    $('#btn-next2').click(function(){
        $('#btn-next1').removeClass("active");
        $('#btn-next2').removeClass("active");
        $('#btn-previous2').removeClass("active");
        $('#btn-previous3').removeClass("active");
        $('#tabs-icons-text-2-tab').removeClass("active");
        $('#tabs-icons-text-3-tab').addClass("active");
    });

    $('#btn-previous2').click(function(){
        $('#btn-next1').removeClass("active");
        $('#btn-next2').removeClass("active");
        $('#btn-previous2').removeClass("active");
        $('#btn-previous3').removeClass("active");
        $('#tabs-icons-text-2-tab').removeClass("active");
        $('#tabs-icons-text-1-tab').addClass("active");
    });

    $('#btn-previous3').click(function(){
        $('#btn-next1').removeClass("active");
        $('#btn-next2').removeClass("active");
        $('#btn-previous2').removeClass("active");
        $('#btn-previous3').removeClass("active");
        $('#tabs-icons-text-3-tab').removeClass("active");
        $('#tabs-icons-text-2-tab').addClass("active");
    });

    if($('#combination-check').is(':checked'))
    {
        $('#combination-nav-item').removeClass("d-none");
        $('#quantity-div').addClass("d-none");
        $('#btn-submit1').addClass("d-none");
        $('#btn-next2').removeClass("d-none");
    }

    $('#combination-check').on('click', function(){
        isChecked = $(this).is(':checked')
        if(isChecked) {
            $('#combination-nav-item').removeClass("d-none");
            $('#quantity-div').addClass("d-none");
            $('#btn-submit1').addClass("d-none");
            $('#btn-next2').removeClass("d-none");
        } else {
            $('#combination-nav-item').addClass("d-none");
            $('#quantity-div').removeClass("d-none");
            $('#btn-submit1').removeClass("d-none");
            $('#btn-next2').addClass("d-none");
        }
    });

    $('#create-button-category').on('click', function(){
        $('#modalcategory').modal('hide');
        let name = $("input[name=category-name]").val();
        let description = $("input[name=category_description]").val();

        let _token = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
        url: "{{ route('c.prize.createcategory') }}",
        type:"POST",
        data:{
          name:name,
          description:description,
          _token: _token
        },
        success:function(response){
          console.log(response);
          if(response) {
            Swal.fire({
                icon: 'success',
                title: 'Kategoria została utworzona pomyślnie!',
                showConfirmButton: false,
                timer: 3000
            })
            $("input[name=category-name]").val('');
            $("input[name=category-description]").val('');
            $('#category-dropdown').html(response);
          }
        },
        error: function(error) {
            console.log(error);
            if(error.status == 422)
            {
                Swal.fire({
                    icon: 'error',
                    title: 'Błąd!',
                    text: 'Upewnij się, że wszystkie luki zostały uzupełnione!',
                    showConfirmButton: false,
                    timer: 4000
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Błąd!',
                    text: 'Wystąpił błąd podczas dodawania kategorii! Spróbuj ponownie później.',
                    showConfirmButton: false,
                    timer: 3000
                })
                $("input[name=category-name]").val('');
                $("input[name=category-description]").val('');
            }
        }
       });
    });


    $('#create-button-sponsor').on('click', function(){
        $('#modalsponsor').modal('hide');
        let name = $("input[name=sponsor_name]").val();
        let description = $("input[name=sponsor_description]").val();
        let address = $("input[name=sponsor_address]").val();
        let telephone = $("input[name=sponsor_telephone]").val();
        let website = $("input[name=sponsor_website]").val();
        let email = $("input[name=sponsor_email]").val();
        let facebook = $("input[name=sponsor_facebook]").val();
        let instagram = $("input[name=sponsor_instagram]").val();
        let logo = $("input[name=logo_photo]").val();
        let _token = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
        url: "{{ route('c.prize.createsponsor') }}",
        type:"POST",
        data:{
          name:name,
          description:description,
          address:address,
          telephone:telephone,
          website:website,
          email:email,
          facebook:facebook,
          instagram:instagram,
          logo: logo,
          _token: _token
        },
        success:function(response){
          console.log(response);
          if(response) {
            Swal.fire({
                icon: 'success',
                title: 'Sponsor został utworzony pomyślnie!',
                showConfirmButton: false,
                timer: 3000
            })
            /*$("input[name=sponsor_name]").val('');
            $("input[name=sponsor_description]").val('');
            $("input[name=sponsor_address]").val('');
            $("input[name=sponsor_telephone]").val('');
            $("input[name=sponsor_website]").val('');
            $("input[name=sponsor_email]").val('');
            $("input[name=sponsor_facebook]").val('');
            $("input[name=sponsor_instagram]").val('');*/
            $('#sponsor-dropdown').html(response);
          }
        },
        error: function(error) {
            console.log(error);
            if(error.status == 422)
            {
                Swal.fire({
                    icon: 'error',
                    title: 'Błąd!',
                    text: 'Upewnij się, że wszystkie luki zostały uzupełnione!',
                    showConfirmButton: false,
                    timer: 4000
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Błąd!',
                    text: 'Wystąpił błąd podczas dodawania sponsora! Spróbuj ponownie później.',
                    showConfirmButton: false,
                    timer: 3000
                });
                /*$("input[name=sponsor_name]").val('');
                $("input[name=sponsor_description]").val('');
                $("input[name=sponsor_address]").val('');
                $("input[name=sponsor_telephone]").val('');
                $("input[name=sponsor_website]").val('');
                $("input[name=sponsor_email]").val('');
                $("input[name=sponsor_facebook]").val('');
                $("input[name=sponsor_instagram]").val('');*/
            }
        }
       });
    });
</script>

<!--<script>
    $(document).ready(function() {

        $('#add_combinations').click(function() {
            var count = $('#combinations_count').val();
            if (count < 20)
            {
                var newnount = +count + +1;
                $('#buttoncombination1').remove();
                $('#combinations_count').val(+count + +1);//count_h2_pol
                $('#count_h2_pol').html(newnount);

                $('#combinations_div').append("<div id='combination"+newnount+"'><div id='divcombination"+newnount+"'><div class='w-100 text-right' id='buttoncombination"+newnount+"'><button class='btn btn-icon btn-danger btn-sm text-right' type='button' onclick='"+'$("#combination'+newnount+'").remove(); $("#combinations_count").val(+$("#combinations_count").val() - +1); $("#count_h2_pol").html('+count+'); $("#divcombination'+count+'").removeClass("d-none"); clearInterval(interval); '+"'><span class='btn-inner--icon'><i class='fas fa-trash-alt'></i></span></button></div></div>  <div class='pb-0' id='polish-form-combination"+newnount+"'><label for='name_combination"+newnount+"' class='mt-1'>Kombinacja nr "+newnount+":</label><input type='text' class='form-control' maxlength='255' id='name_combination"+newnount+"' name='name_combination"+newnount+"' onkeyup = '(counter_name_combination("+newnount+"))' required><p id='counter_name_combination"+newnount+"' class='text-sm'>0 / 255 znaków</p><label for='name_combination"+newnount+"' class='mt-1'>Ilość:</label><input type='number' name='quanitity_combination"+newnount+"' class='form-control' id='quanitity_combination"+newnount+"'></div> <hr class='w-100 text-center ml-0' style='color: #707070'></div>");
                $("#divcombination"+count).addClass("d-none");
                $("#divcombination"+newnount).removeClass("d-none");
            }
        });
    });

    function change_counter(count)
    {
        var interval = window.setInterval(function() {}, 10);
    }
    function counter_name_combination(count)
    {
        var chars = $('#name_combination'+count).val().length;
        $("#counter_name_combination"+count).html(chars +" / 255 znaków");
    }
</script>-->

<script>
    $(document).ready(function(){
	var $modal1 = $('#cropmodal1');
	var image1 = document.getElementById('sample_image1');
	var cropper1;
	$('#upload_image1').change(function(event){
		var files1 = event.target.files;
		var done1 = function(url){
			image1.src = url;
			$modal1.modal('show');
		};
		if(files1 && files1.length > 0)
		{
			reader1 = new FileReader();
			reader1.onload = function(event)
			{
				done1(reader1.result);
			};
			reader1.readAsDataURL(files1[0]);
		}
	});
	$modal1.on('shown.bs.modal', function() {
		cropper1 = new Cropper(image1, {
			aspectRatio: 1,
			viewMode: 3,
			preview:'.preview'
		});
	}).on('hidden.bs.modal', function(){
		cropper1.destroy();
   		cropper1 = null;
	});
	$('#crop1').click(function(){
		canvas1 = cropper1.getCroppedCanvas({
			width:500,
			height:500
		});
		canvas1.toBlob(function(blob){
			url1 = URL.createObjectURL(blob);
			var reader1 = new FileReader();
			reader1.readAsDataURL(blob);
			reader1.onloadend = function(){
				var base64data1 = reader1.result;
				const time1 = setInterval(() => {
                    document.getElementById("logo_photo").value = base64data1;
                }, 1);
				document.getElementById("logo_photo").value = base64data1;
				document.getElementById("text-logo").innerHTML = "Logo zostało załadowane";
				$modal1.modal('hide');
			};
		});
	});

});

</script>

@endsection
