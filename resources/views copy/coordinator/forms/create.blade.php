@extends('layouts.app')

@section('title')
{{ __('Nowy formularz') }}
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
                      <a class="nav-link active" href="{{ route('c.form.create') }}">
                        <span class="sidenav-normal"> Utwórz nowy </span>
                      </a>
                    </li>
                    <li class="nav-item">
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
              <h6 class="h2 text-white d-inline-block mb-0">Nowy formularz</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="{{ route('c.dashboard') }}"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item" aria-current="page"><a href="{{ route('c.form.list') }}">Formularze</a></li>
                  <li class="breadcrumb-item active"><a href="{{ route('c.form.create') }}">Nowy</a></li>
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
                    <h3 class="mb-0">Tworzenie nowego formularza</h3>
                  </div>
                </div>
              </div>
                <div class="card-body container">
                    <div id="form">
                        @if($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <div class="alert-text">
                                    <p>Formularz zawiera następujące błędy:</p>
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <form action="{{ route('c.form.store') }}" method="post" id="new_form">
                            @csrf
                            <input type="hidden" name="locale" value="pl">
                            <div class="nav-wrapper">
                                <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-toggle="tab" href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true"><i class="fa-solid fa-clipboard-list mr-2"></i>Formularz</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab" href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2" aria-selected="false"><i class="fa-solid fa-map-location-dot mr-2"></i>Miejsce imprezy</a>
                                    </li>
                                    <li class="nav-item" id="combination-nav-item">
                                        <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-3-tab" data-toggle="tab" href="#tabs-icons-text-3" role="tab" aria-controls="tabs-icons-text-3" aria-selected="false"><i class="fa-solid fa-puzzle-piece mr-2"></i>Stanowiska</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel" aria-labelledby="tabs-icons-text-1-tab">

                                    <div class="row">
                                        <div class="col-lg-8">
                                            <div class="form-group">
                                                <label class="required" for="title">Tytuł</label>
                                                <input class="form-control {{ $errors->has('pl_title') ? 'is-invalid' : '' }}" maxlength="255" type="text" name="pl_title" id="pl_title_pl" value="{{ old('pl_title', '') }}" required>
                                                @if($errors->has('pl_title'))
                                                    <div class="text-danger w-100 d-block">
                                                        {{ $errors->first('pl_title') }}
                                                    </div>
                                                @endif
                                                <p id="counter_pl_title_pol" class="text-sm">0 / 255 znaków</p>
                                            </div>
                                            <div class="form-group">
                                                <label for="pl_description_pol">Opis</label>
                                                <textarea name="pl_description" id="pl_description_pol"></textarea>
                                                @if($errors->has('pl_description'))
                                                    <div class="text-danger w-100 d-block">
                                                        {{ $errors->first('pl_description') }}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="expiration">Data wygaśnięcia formularza</label>
                                                <input class="form-control" type="datetime-local" name="expiration" id="expiration"  value="{{ old('expiration') }}"required>
                                                @if($errors->has('expiration'))
                                                    <div class="text-danger w-100 d-block">
                                                        {{ $errors->first('expiration') }}
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label for="start">Data rozpoczęcia imprezy</label>
                                                <input class="form-control" type="datetime-local" name="start" id="start" value="{{ old('start') }}" required>
                                                @if($errors->has('start'))
                                                    <div class="text-danger w-100 d-block">
                                                        {{ $errors->first('start') }}
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label for="stop">Data zakończenia imprezy</label>
                                                <input class="form-control" type="datetime-local" name="stop" id="stop" value="{{ old('stop') }}" required>
                                                @if($errors->has('stop'))
                                                    <div class="text-danger w-100 d-block">
                                                        {{ $errors->first('stop') }}
                                                    </div>
                                                @endif
                                            </div>
                                            <div>
                                                <label for="upload_image" class="w-100">
                                                    <a class="btn btn-primary btn-icon w-100 text-white">
                                                        <span class="btn-inner--icon"><i class="far fa-images"></i></span>
                                                        <span class="btn-inner--text">Dodaj ikonę formularza</span>
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
                                            <hr class="my-3">
                                            <label for="category-dropdown">Kategoria formularza</label>
                                            <div class="justify-content-center">
                                                <div class="form-group">
                                                    <select class="form-control" id="category-dropdown" name="category">
                                                        @forelse ($categories as $cat)
                                                        <option value="{{ $cat->ivid }}">{{ $cat->form_category_translate->name }}</option>
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
                                                <div class="form-group">
                                                    <button class="btn btn-icon btn-primary w-100" type="button" data-toggle="modal" data-target="#modalcategory">
                                                        <span class="btn-inner--icon"><i class="fa-solid fa-plus"></i></span>
                                                        <span class="btn-inner--text">Lub dodaj nową kategorię</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                    <hr class="my-4">

                                    <div class="form-group row justify-content-center">
                                        <a class="btn btn-primary w-100 col-lg-6 mt-1" id="btn-next1" data-toggle="tab" href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-1">Dalej <i class="fa-solid fa-arrow-right ml-2"></i></a>
                                    </div>

                                </div>
                                <div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel" aria-labelledby="tabs-icons-text-2-tab">
                                    <div class="form-group px-4">
                                        <h2 class="w-100 text-center">Miejsce imprezy</h2>
                                        <input type="hidden" name="place_longitude_pol" value="50.1076061">
                                        <input type="hidden" name="place_latitude_pol" value="18.5471027">
                                      <div id="map_pl" style="width: 100%; height: 500px;"></div>
                                    </div>
                                    <hr class="my-4">
                                    <div class="form-group row">
                                        <div class="col-lg-6">
                                            <a class="btn btn-primary w-100 mt-1" id="btn-previous2" data-toggle="tab" href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-2"><i class="fa-solid fa-arrow-left mr-2"></i>Wróć</a>
                                        </div>

                                        <div class="col-lg-6">
                                            <a class="btn btn-primary w-100 mt-1" id="btn-next2" data-toggle="tab" href="#tabs-icons-text-3" role="tab" aria-controls="tabs-icons-text-2">Dalej <i class="fa-solid fa-arrow-right ml-2"></i></a>
                                        </div>
                                    </div>

                                </div>
                                <div class="tab-pane fade" id="tabs-icons-text-3" role="tabpanel" aria-labelledby="tabs-icons-text-3-tab">
                                    <div class="form-group px-4">
                                        <h2 class="w-100 text-center">Stanowiska </h2>
                                        <h4 class="w-100 text-center">Ilość stanowisk: <span id="position_count">{{ old('position_count', 0) }}</span></h4>
                                        <input type="hidden" name="position_count" value="{{ old('position_count', 0) }}">
                                        <button class="btn btn-icon btn-primary w-100 mb-2" type="button" id="add_position">
                                            <span class="btn-inner--icon"><i class="fas fa-plus"></i></span>
                                            <span class="btn-inner--text">Dodaj stanowisko</span>
                                        </button>
                                        <div id="positions">
                                            @for ($i = 1; $i <= old('position_count', 0); $i++)
                                                <div class='position' data-id='{{ $i }}' id='div-position{{ $i }}'>
                                                    <div class='w-100 text-right'>
                                                        <button class='btn btn-icon btn-danger btn-sm text-right delete_position' id='delete_button{{ $i }}' data-id='{{ $i }}' type='button' onclick='delete_position(this)'>
                                                            <span class='btn-inner--icon'><i class='fas fa-trash-alt'></i></span> </button>
                                                         </div>
                                                         <div class='form-group'>
                                                                <label for='name_position{{ $i }}' class='mt-1'>Nazwa stanowiska {{ $i }}:</label>
                                                                <input type='text' class='form-control counter_name_position' maxlength='255' id='name_position{{ $i }}' name='name_position{{ $i }}' data-id='{{ $i }}' value="{{ old('name_position'.$i, '') }}" required>
                                                                <p id='counter_name_position{{ $i }}' data-counter-id='{{ $i }}' class='text-sm'>0 / 255 znaków</p>
                                                            </div>
                                                            <div class='form-group'>
                                                                <label for='description_position{{ $i }}' class='mt-1'>Opis stanowiska:</label>
                                                                <textarea class='form-control counter_description_position mt-1' rows='2' maxlength='255' id='description_position{{ $i }}' style='resize: none;' name='description_position{{ $i }}' data-id='{{ $i }}' required>{{ old('description_position'.$i, '') }}</textarea>
                                                                <p id='counter_description_position{{ $i }}' data-counter-id='{{ $i }}'  class='text-sm'>0 / 255 znaków</p>
                                                            </div>
                                                            <div class='row form-group'>
                                                                <div class='col-lg-6'>
                                                                    <label for='start_position{{ $i }}'>Godzina rozpoczęcia pracy</label>
                                                                    <input type='time' name='start_position{{ $i }}' id='start_position{{ $i }}' class='form-control' value="{{ old('start_position'.$i, '') }}" required> </div>
                                                                <div class='col-lg-6 form-group'>
                                                                    <label for='end_position{{ $i }}'>Godzina zakończenia pracy</label>
                                                                    <input type='time' name='end_position{{ $i }}' id='end_position{{ $i }}' class='form-control' value="{{ old('end_position'.$i, '') }}" required>
                                                                    </div>
                                                                </div>
                                                                <div class='form-group'>
                                                                    <div class='row'>
                                                                        <div class='col'>
                                                                            <label for='points_position{{ $i }}'>Wartość punktowa:</label>
                                                                            <input type='number' class='form-control' id='points_position{{ $i }}' name='points_position{{ $i }}' value="{{ old('points_position'.$i, '') }}" required>
                                                                        </div>
                                                                        <div class='col'>
                                                                            <label for='max_position{{ $i }}'>Max. ilość wolontariuszy:</label>
                                                                            <input type='number' class='form-control' id='max_position{{ $i }}' name='max_position{{ $i }}' value="{{ old('max_position'.$i, '') }}" required>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <hr class='w-100 text-center ml-0' style='color: #707070'>
                                                            </div>
                                            @endfor
                                        </div>
                                    </div>

                                    <hr class="my-4">
                                    <div class="form-group row">
                                        <div class="col-lg-6">
                                            <a class="btn btn-primary w-100 mt-1" id="btn-previous3" data-toggle="tab" href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-3"><i class="fa-solid fa-arrow-left mr-2"></i>Wróć</a>
                                        </div>

                                        <div class="col-lg-6">
                                            <button type="submit" class="btn btn-primary w-100 mt-1">Stwórz formularz</button>
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
            <h5 class="modal-title" id="modalcategoryLabel">Utwórz kategorię dla formularza</h5>
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
        'alignright alignjustify | bullist numlist outdent indent | ' +
        'removeformat | help',
        font_formats: "Nunito-nunito",
      setup: function (editor) {
      editor.on('init', function (e) {
        editor.setContent("{!! str_replace('"', "'", str_replace('\r\n', '', old('pl_description', ''))) !!}");
      });
    }
    });
  </script>
@endsection

@section('script')

<script src="{{ url('/js/functions/forms.js?v=5') }}"></script>

<script>
    "use strict";

  function initMap() {
    var myLatlng = new google.maps.LatLng(50.1076061,18.5471027);
  var mapOptions = {
      zoom: 13,
      center: myLatlng,
      mapTypeControl: false,
      fullscreenControl: false,
      zoomControl: true,
      streetViewControl: false
  }
  var map_pl = new google.maps.Map(document.getElementById("map_pl"), mapOptions);
  //var map_en = new google.maps.Map(document.getElementById("map_en"), mapOptions);

  // Place a draggable marker on the map
  var marker_pl = new google.maps.Marker({
      position: myLatlng,
      map: map_pl,
      draggable:true,
      //title:"Weź mnie!"
  });

  /*var marker_en = new google.maps.Marker({
      position: myLatlng,
      map: map_en,
      draggable:true,
      //title:"Weź mnie!"
  });*/

  window.setInterval(function() {
      $("[name='place_longitude_pol']").val(marker_pl.getPosition().lat());
      $("[name='place_latitude_pol']").val(marker_pl.getPosition().lng());
  }, 5);

  /*window.setInterval(function() {
      $("[name='place_longitude']").val(marker_en.getPosition().lat());
      $("[name='place_latitude']").val(marker_en.getPosition().lng());
  }, 5);*/


  }

  </script>

<script>
    //switch-lang
    $("#switch-lang").change(function(){
    if($(this).is(':checked') === true) {
        $("#form-pl").addClass('d-none');
        $("#form-en").removeClass('d-none');
    }
    else {
        $("#form-pl").removeClass('d-none');
        $("#form-en").addClass('d-none');
    }
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
</script>

<script>
    $('#create-button-category').on('click', function(){
        $('#modalcategory').modal('hide');
        let name = $("input[name=category-name]").val();
        let description = $("input[name=category-description]").val();
        let _token = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
        url: "{{ route('c.form.createcategory') }}",
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
</script>

<script>
    var $englishForm = $('#english-form');
   var $polishForm = $('#polish-form');
   var $englishLink = $('#english-link');
   var $polishLink = $('#polish-link');

   //$('#english-form-position"+newnount+"').toggleClass('d-none'); $('#english-link-position"+newnount+"').toggleClass('active'); $('#polish-link-position"+newnount+"').toggleClass('active'); $('#polish-form-position"+newnount+"').toggleClass('d-none');

   $polishLink.click(function() {
     $englishLink.removeClass('active');
     $englishForm.addClass('d-none');
     $polishLink.addClass('active');
     $polishForm.removeClass('d-none');
   });

   $englishLink.click(function() {
     $englishLink.addClass('active');
     $englishForm.removeClass('d-none');
     $polishLink.removeClass('active');
     $polishForm.addClass('d-none');
   });

    $('#pl_description').on('keyup propertychange paste', function(){
        var chars = $('#pl_description').val().length;
        $('#counter_pl_description').html(chars +' / 255 znaków');
    });

    $('#pl_title').on('keyup propertychange paste', function(){
        var chars = $('#pl_title').val().length;
        $('#counter_pl_title').html(chars +' / 255 znaków');
    });

    $('#pl_description_pol').on('keyup propertychange paste', function(){
        var chars = $('#pl_description_pol').val().length;
        $('#counter_pl_description_pol').html(chars +' / 255 znaków');
    });

    $('#pl_title_pl').on('keyup propertychange paste', function(){
        var chars = $('#pl_title_pl').val().length;
        $('#counter_pl_title_pol').html(chars +' / 255 znaków');
    });

function change_counter(count)
{
    var interval = window.setInterval(function() {}, 10);
}

function counter_name_position_pl(count)
{
    var chars = $('#name_position_pl'+count).val().length;
    $("#counter_name_position_pl"+count).html(chars +" / 255 znaków");
}

function counter_desc_position_pl(count)
{
    var chars = $("#desc_position_pl"+count).val().length;
    $("#counter_desc_position_pl"+count).html(chars +" / 255 znaków");
}

function counter_name_position_pl_pol(count)
{
    var chars = $('#name_position_pl_pol'+count).val().length;
    $("#counter_name_position_pl_pol"+count).html(chars +" / 255 znaków");
}

function counter_desc_position_pl_pol(count)
{
    var chars = $("#desc_position_pl_pol"+count).val().length;
    $("#counter_desc_position_pl_pol"+count).html(chars +" / 255 znaków");
}

/*function counter_name_position_en(count)
{
    var chars = $('#name_position_en'+count).val().length;
    $("#counter_name_position_en"+count).html(chars +" / 255 znaków");
}

function counter_desc_position_en(count)
{
    var chars = $("#desc_position_en"+count).val().length;
    $("#counter_desc_position_en"+count).html(chars +" / 255 znaków");
}

$('#en_description').on('keyup propertychange paste', function(){
        var chars = $('#en_description').val().length;
        $('#counter_en_description').html(chars +' / 255 znaków');
    });

    $('#en_title').on('keyup propertychange paste', function(){
        var chars = $('#en_title').val().length;
        $('#counter_en_title').html(chars +' / 255 znaków');
    });*/
</script>

@endsection
