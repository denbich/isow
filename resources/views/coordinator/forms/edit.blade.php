
@extends('layouts.app')

@section('title') {{ __('Edycja formularza') }} @endsection

@section('body') bg-gray-100 @endsection

@section('content')
<div class="min-height-300 bg-primary position-absolute w-100" id="background-color-div"></div>
  <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
    <div class="sidenav-header" style="min-height: 170px;">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      @include('coordinator.include.logo')
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse w-auto h-auto" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        @include('coordinator.include.dashboard')
        @include('coordinator.include.volunteer')
        @include('coordinator.include.chat')
        @include('coordinator.include.send_mail')
        <li class="nav-item mt-3">
            <h6 class="ps-3 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">{{ __('Moduły') }}</h6>
          </li>
          <li class="nav-item ps-1 pt-1">
            <a data-bs-toggle="collapse" href="#forms" class="nav-link active py-2" aria-controls="forms" role="button" aria-expanded="true">
                    <i class="fa-solid fa-clipboard-list text-primary text-sm opacity-10"></i>
                <span class="nav-link-text ms-1">{{ __('Formularze') }}</span>
            </a>
            <div class="collapse show" id="forms">
                <ul class="nav ms-4">
                    <li class="nav-item active">
                        <a href="{{ route('c.form.list') }}" class="nav-link">
                          <span class="sidenav-normal"> {{ __('Lista') }} </span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="{{ route('c.form.archive') }}">
                          <span class="sidenav-normal"> {{ __('Archiwum') }} </span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{ route('c.formcategory.list') }}" class="nav-link">
                          <span class="sidenav-normal"> {{ __('Kategorie') }} </span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{ route('c.form.create') }}" class="nav-link">
                          <span class="sidenav-normal"> {{ __('Utwórz nowy') }} </span>
                        </a>
                      </li>
                </ul>
            </div>
        </li>
        @include('coordinator.include.posts')
        @include('coordinator.include.prizes')
        @include('coordinator.include.sponsors')
        <li class="nav-item mt-3">
            <h6 class="ps-3 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">{{ __('Inne') }}</h6>
          </li>
          @include('coordinator.include.other')
      </ul>
    </div>
  </aside>
  <main class="main-content position-relative border-radius-lg ">
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
        <div class="container-fluid py-1 px-3">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
              <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="{{ route('c.dashboard') }}"><i class="fa-solid fa-house"></i></a></li>
              <li class="breadcrumb-item text-sm text-white" aria-current="page">{{ __('Formularze') }}</li>
              <li class="breadcrumb-item text-sm text-white active" aria-current="page">{{ __('Edycja') }}</li>
            </ol>
            <h6 class="font-weight-bolder text-white mb-0">{{ $form->form_translate->title }}</h6>
          </nav>
          @include('coordinator.include.nav')
        </div>
      </nav>

    <div class="container-fluid py-4 min-vh-100">
        <div class="row">
            <div class="col-lg-6 col-12 d-flex ms-auto">
               <a href="{{ route('c.form.show', [$form->ivid]) }}" class="btn btn-icon bg-gradient-dark ms-auto">
                <span class="btn-inner--icon me-2"><i class="fa-solid fa-arrow-left"></i></span>
               <span class="btn-inner--text">{{ __('Wróć do formularza') }}</span>
               </a>
            </div>
         </div>
        <div class="card mt-4">
            <div class="card-header pb-0">
                <h5 class="mb-0">Formularz </h5>
            </div>
            <div class="card-body">
                <form action="{{ route('c.form.update', [$form->ivid]) }}" method="post" role="form" id="update_form">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="locale" value="pl">
                    <input type="hidden" name="positions_number" value="{{ count($form_positions) }}">
                    @if($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                        <div class="alert-text">
                            <p>Formularz zawiera następujące błędy:</p>
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                        @endif
                    <div class="row mt-3 text-left">
                        <div class="col-lg-8">
                            <div class="form-group">
                                <label class="required" for="pl_title_pl">{{ __('Tytuł') }}</label>
                                <input class="form-control @error('pl_title') is-invalid @enderror" maxlength="255" type="text" name="pl_title" id="pl_title_pl" value="{{ $form->form_translate->title }}" required>
                                @error('pl_title')
                                    <div class="text-danger w-100 d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="pl_description_pol">Opis</label>
                                <textarea name="pl_description" id="pl_description_pol"></textarea>
                                @error('pl_description')
                                    <div class="text-danger w-100 d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="start">Data rozpoczęcia imprezy</label>
                                <input class="form-control" type="datetime-local" name="start" id="start" value="{{strftime('%Y-%m-%dT%H:%M:%S', strtotime($form->calendar->start)) }}" required>
                                @error('start')
                                        <div class="text-danger w-100 d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                            </div>
                            <div class="form-group">
                                <label for="stop">Data zakończenia imprezy</label>
                                <input class="form-control" type="datetime-local" name="stop" id="stop" value="{{strftime('%Y-%m-%dT%H:%M:%S', strtotime($form->calendar->end)) }}" required>
                                @error('stop')
                                        <div class="text-danger w-100 d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                            </div>
                            <div>
                                <label for="upload_image" class="w-100">
                                    <a class="btn btn-primary btn-icon w-100 text-white">
                                        <span class="btn-inner--icon"><i class="far fa-images"></i></span>
                                        <span class="btn-inner--text">Zmień ikonę formularza</span>
                                    </a>
                                    <input type="file" name="image" class="image d-none" id="upload_image" accept="image/*">
                                    <input type="hidden" name="icon" id="icon_photo" value="">
                                </label>
                                <p class="text-success text-center" id="text-photo"></p>
                                @error('icon')
                                        <div class="text-danger w-100 d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                            </div>
                            <hr class="my-3">
                            <label for="category-dropdown">Kategoria formularza</label>
                            <div class="justify-content-center">
                                <div class="form-group">
                                    <select class="form-control" id="category-dropdown" name="category">
                                        @forelse ($categories as $category)
                                        <option value="{{ $category->ivid }}" @selected($form->category_id == $category->id)>{{ $category->form_category_translate->name }}</option>
                                        @empty
                                        <option disabled selected>Brak kategorii</option>
                                        @endforelse
                                    </select>
                                    @error('category')
                                        <div class="text-danger w-100 d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-icon btn-primary w-100" type="button" data-bs-toggle="modal" data-bs-target="#modalcategory">
                                        <span class="btn-inner--icon"><i class="fa-solid fa-plus"></i></span>
                                        <span class="btn-inner--text">Lub dodaj nową kategorię</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="form-group">
                                <h4 class="w-100 text-center">{{ __('Miejsce imprezy') }}</h4>
                                <input type="hidden" name="place_longitude" value="{{ $form->place_longitude }}">
                                <input type="hidden" name="place_latitude" value="{{ $form->place_latitude }}">
                              <div id="map" style="width: 100%; height: 350px;"></div>
                              @error('place_longitude')
                                <div class="text-danger w-100 d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                            @error('place_latitude')
                                <div class="text-danger w-100 d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                            </div>
                            <hr>
                            <div>
                            <h2 class="w-100 text-center">{{ __('Stanowiska') }}</h2>
                            @foreach ($form_positions as $position)
                                    <input type="hidden" name="position_{{ $loop->iteration }}" value="{{ $position->id }}">
                                    <div class="form-group">
                                        <label for="name_position{{ $loop->iteration }}" class="mt-1">Nazwa stanowiska {{ $loop->iteration }}:</label>
                                        <input type="text" class="form-control @error('name_position'.$loop->iteration) is-invalid @enderror" maxlength="255" id="name_position{{ $loop->iteration }}" name="name_position{{ $loop->iteration }}" onkeyup="(counter_name_position({{ $loop->iteration }}))" value="{{ $position->form_position_translate->title }}" required>
                                        <p id="counter_name_position{{ $loop->iteration }}" class="text-sm">0 / 255 znaków</p>
                                        @error('name_position'.$loop->iteration)
                                            <div class="text-danger w-100 d-block">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="description_position{{ $loop->iteration }}">Opis stanowiska:</label>
                                        <textarea class="form-control mt-1 @error('description_position'.$loop->iteration) is-invalid @enderror" rows="3" maxlength="255" id="description_position{{ $loop->iteration }}" style="resize: none;" name="description_position{{ $loop->iteration }}" onkeyup="(counter_description_position({{ $loop->iteration }}))" required>{{ $position->form_position_translate->description }}</textarea>
                                        <p id="counter_description_position{{ $loop->iteration }}" class="text-sm">0 / 255 znaków</p>
                                        @error('description_position'.$loop->iteration)
                                            <div class="text-danger w-100 d-block">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class='row form-group'>
                                        <div class='col-lg-6'>
                                            <label for='start_position{{ $loop->iteration }}'>Godzina rozpoczęcia pracy</label>
                                            <input type='time' name='start_position{{ $loop->iteration }}' id='start_position{{ $loop->iteration }}' class='form-control @error('start_position'.$loop->iteration) is-invalid @enderror' value="{{ $position->start }}" required>
                                            @error('start_position'.$loop->iteration)
                                            <div class="text-danger w-100 d-block">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        </div>
                                        <div class='col-lg-6 form-group'>
                                            <label for='end_position{{ $loop->iteration }}'>Godzina zakończenia pracy</label>
                                            <input type='time' name='end_position{{ $loop->iteration }}' id='end_position{{ $loop->iteration }}' class='form-control @error('end_position'.$loop->iteration) is-invalid @enderror' value="{{ $position->end }}" required>
                                            @error('end_position'.$loop->iteration)
                                            <div class="text-danger w-100 d-block">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="points_position{{ $loop->iteration }}">Wartość punktowa:</label>
                                                    <input type="number" class="form-control @error('points_position'.$loop->iteration) is-invalid @enderror" id="points_position{{ $loop->iteration }}" name="points_position{{ $loop->iteration }}" value="{{ $position->points }}" required>
                                                    @error('points_position'.$loop->iteration)
                                                        <div class="text-danger w-100 d-block">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="max_position{{ $loop->iteration }}">Max. ilość wolontariuszy:</label>
                                                    <input type="number" class="form-control @error('max_position'.$loop->iteration) is-invalid @enderror" id="max_position{{ $loop->iteration }}" name="max_position{{ $loop->iteration }}" value="{{ $position->max_volunteer }}" required>
                                                    @error('max_position'.$loop->iteration)
                                                        <div class="text-danger w-100 d-block">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                            @endforeach
                        </div>
                            <button type="submit" class="btn btn-primary w-100" id="update_button">@lang('Zaaktualizuj formularz')</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>

      @include('coordinator.include.footer')
    </div>
  </main>

  <div class="modal fade" id="modalcategory" tabindex="-1" role="dialog" aria-labelledby="modalcategoryLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="modalcategoryLabel">{{ __('Utwórz kategorię dla formularza') }}</h5>
            <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">x</span>
              </button>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
                <label for="category-name" class="form-control-label">{{ _('Nazwa kategorii') }}</label>
                <input type="text" class="form-control" name="category-name" id="category-name" max="255">
            </div>
            <div class="form-group">
                <label for="category-description" class="form-control-label">{{ __('Krótki opis kategorii (Nie wymagany)') }}</label>
                <input type="text" class="form-control" name="category-description" id="category-description" max="255">
            </div>

            <div class="form-group">
                <label for="category-color" class="form-control-label">Kolor</label>
                <select name="category-color" id="category-color" class="form-control">
                    <option value="primary">{{ __('Niebieski') }}</option>
                    <option value="dark">{{ __('Czarny') }}</option>
                    <option value="success">{{ __('Zielony') }}</option>
                    <option value="info">{{ __('Żółty') }}</option>
                    <option value="danger">{{ __('Czerwony') }}</option>
                    <option value="warning">{{ __('Pomarańczowy') }}</option>
                </select>
            </div>

            <div class="nput-group">
                <label for="category-icon" class="form-control-label">{{ __('Ikona') }}</label>
                <div class="btn-group text-center" role="group" aria-label="Basic example">
                    <button type="button" class="btn btn-outline-primary icon-button" id="button-choice-run" data-icon-name="run"><i class="fa-solid fa-person-running fa-xl"></i></button>
                    <button type="button" class="btn btn-outline-primary icon-button" id="button-choice-swim" data-icon-name="swim"><i class="fa-solid fa-person-swimming fa-xl"></i></button>
                    <button type="button" class="btn btn-outline-primary icon-button" id="button-choice-bike" data-icon-name="bike"><i class="fa-solid fa-person-biking fa-xl"></i></button>
                    <button type="button" class="btn btn-outline-primary icon-button" id="button-choice-ski" data-icon-name="ski"><i class="fa-solid fa-person-skiing fa-xl"></i></button>
                    <button type="button" class="btn btn-outline-primary icon-button" id="button-choice-basketball" data-icon-name="basketball"><i class="fa-solid fa-basketball fa-xl"></i></button>
                    <button type="button" class="btn btn-outline-primary icon-button" id="button-choice-volleyball" data-icon-name="volleyball"><i class="fa-solid fa-volleyball fa-xl"></i></button>
                    <button type="button" class="btn btn-outline-primary icon-button" id="button-choice-other" data-icon-name="other"><i class="fa-solid fa-people-group fa-xl"></i></button>
                  </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('main.cancel') }}</button>
            <button type="button" class="btn btn-primary" id="create-button-category">{{ __('Utwórz') }}</button>
          </div>
      </div>
    </div>
  </div>
@endsection

@section('style')

<script>
    tinymce.init({
      selector: 'textarea#pl_description_pol',
      skin: 'bootstrap',
      height: 400,
      language: '{{ session("locale") }}',
        plugins: [
            'advlist', 'autolink', 'lists', 'link', 'image', 'charmap',
            'anchor', 'searchreplace', 'visualblocks',
            'insertdatetime', 'media', 'table', 'help', 'wordcount'
        ],
        toolbar: 'undo redo | blocks | ' +
        'bold italic backcolor | alignleft aligncenter ' +
        'alignright alignjustify | bullist numlist | ' +
        'removeformat help',
        font_formats: "Open sans",
      setup: function (editor) {
      editor.on('init', function (e) {
        editor.setContent("{!! str_replace('"', "'", str_replace('\r\n', '', $form->form_translate->description)) !!}");
      });
    }
    });
  </script>
@endsection

@push('scripts')

<script>
    $('#update_form').submit(function(){
        $('#update_button').prop('disabled', true);
        $('#update_button').prepend('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> ');
    });
</script>

<script>
    "use strict";

  function initMap() {
    var myLatlng = new google.maps.LatLng({!! $form->place_longitude !!}, {!! $form->place_latitude !!});
  var mapOptions = {
      zoom: 13,
      center: myLatlng,
      mapTypeControl: false,
      fullscreenControl: false,
      zoomControl: true,
      streetViewControl: false
  }
  var map = new google.maps.Map(document.getElementById("map"), mapOptions);

  var marker = new google.maps.Marker({
      position: myLatlng,
      map: map,
      draggable:true,
  });

  window.setInterval(function() {
      $("[name='place_longitude']").val(marker.getPosition().lat());
      $("[name='place_latitude']").val(marker.getPosition().lng());
  }, 5);
  }

  </script>

<script>
    var category = new Choices(document.getElementById("category-dropdown"), {
            searchEnabled:false,
            shouldSort: false,
            placeholder: true,
        });


        var color_category = new Choices(document.getElementById("category-color"), {
            searchEnabled:false,
            shouldSort: false,
            placeholder: true,
        });
</script>


@if (session('edit_form'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Edycja formularza przebiegła pomyślnie!',
        showConfirmButton: false,
        timer: 3000
    })
</script>
@endif
@endpush
