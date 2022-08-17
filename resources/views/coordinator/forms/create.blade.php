
@extends('layouts.app')

@section('title') {{ __('Tworzenie formularza') }} @endsection

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
                    <li class="nav-item">
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
                      <li class="nav-item active">
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
              <li class="breadcrumb-item text-sm text-white active" aria-current="page">{{ __('Nowy') }}</li>
            </ol>
            <h6 class="font-weight-bolder text-white mb-0">{{ __('Tworzenie formularze') }}</h6>
          </nav>
          @include('coordinator.include.nav')
        </div>
      </nav>

    <div class="container-fluid py-4 min-vh-100">
<div class="row">
   <div class="col-12">
      <div class="w-100 text-center">
        <h3 class="mt-5 text-white">{{ __('Utwórz formularz') }}</h3>
        <h5 class="text-white font-weight-normal">{{ __('Utwórz formularz, jeśli chcesz, aby wolontariusze zapisywali się na wydarzenie!') }}</h5>
      </div>
      <div class="multisteps-form mb-5">
         <div class="row mt-5">
            <div class="col-12 col-lg-8 mx-auto my-5">
               <div class="multisteps-form__progress">
                  <button class="multisteps-form__progress-btn js-active" type="button" title="info">
                  <span>{{ __('Formularz') }}</span>
                  </button>
                  <button class="multisteps-form__progress-btn" type="button" title="place">
                  <span>{{ __('Miejsce imprezy') }}</span>
                  </button>
                  <button class="multisteps-form__progress-btn" type="button" title="positions">
                  <span>{{ __('Stanowiska') }}</span>
                  </button>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-12 col-lg-10 m-auto">
               <form class="multisteps-form__form" style="height: 463px;" action="{{ route('c.form.store') }}" method="post" id="new_form">
                    @csrf
                    <input type="hidden" name="locale" value="pl">
                  <div class="card multisteps-form__panel p-3 border-radius-xl bg-white js-active" data-animation="FadeIn">
                     <div class="multisteps-form__content">
                        <div class="row mt-3 text-left">
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <label class="required" for="pl_title_pl">{{ __('Tytuł') }}</label>
                                    <input class="form-control @error('pl_title') is-invalid @enderror" maxlength="255" type="text" name="pl_title" id="pl_title_pl" value="{{ old('pl_title', '') }}" required>
                                    @error('pl_title')
                                        <div class="text-danger w-100 d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <p id="counter_pl_title_pol" class="text-sm">0 / 255 znaków</p>
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
                                    <label for="expiration">Data wygaśnięcia formularza</label>
                                    <input class="form-control" type="datetime-local" name="expiration" id="expiration"  value="{{ old('expiration') }}"required>
                                    @error('expiration')
                                    <div class="text-danger w-100 d-block">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="start">Data rozpoczęcia imprezy</label>
                                    <input class="form-control" type="datetime-local" name="start" id="start" value="{{ old('start') }}" required>
                                    @error('start')
                                    <div class="text-danger w-100 d-block">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="stop">Data zakończenia imprezy</label>
                                    <input class="form-control" type="datetime-local" name="stop" id="stop" value="{{ old('stop') }}" required>
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
                                            <span class="btn-inner--text">Dodaj ikonę formularza</span>
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
                                            @forelse ($categories as $cat)
                                            <option value="{{ $cat->ivid }}">{{ $cat->form_category_translate->name }}</option>
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
                        <div class="button-row d-flex mt-4">
                           <button class="btn bg-gradient-dark ms-auto mb-0 js-btn-next" type="button" title="Next">{{ __('Dalej') }}</button>
                        </div>
                     </div>
                  </div>
                  <div class="card multisteps-form__panel p-3 border-radius-xl bg-white" data-animation="FadeIn">
                     <div class="row text-center">
                        <div class="col-10 mx-auto">
                           <h5 class="font-weight-normal">{{ __('Miejsce imprezy') }}</h5>
                           <p>{{ __('Zaznacz na mapie miejsce (Poprzez przesunięcie pinezki), gdzie odbędzie się wydarzenie.') }}</p>
                        </div>
                     </div>
                     <div class="multisteps-form__content">
                        <div class="form-group px-4">
                            <input type="hidden" name="place_longitude_pol" value="50.1076061">
                            <input type="hidden" name="place_latitude_pol" value="18.5471027">
                          <div id="map_pl" style="width: 100%; height: 500px;"></div>
                        </div>

                        <div class="button-row d-flex mt-4">
                           <button class="btn bg-gradient-light mb-0 js-btn-prev" type="button" title="Prev">{{ __('Wróć') }}</button>
                           <button class="btn bg-gradient-dark ms-auto mb-0 js-btn-next" type="button" title="Next">{{ __('Dalej') }}</button>
                        </div>
                     </div>
                  </div>
                  <div class="card multisteps-form__panel p-3 border-radius-xl bg-white" data-animation="FadeIn">
                     <div class="row text-center">
                        <div class="col-10 mx-auto">
                           <h5 class="font-weight-normal">{{ __('Stanowiska') }}</h5>
                           <p>{{ __('Ilość stanowisk:') }} <span id="position_count">{{ old('position_count', 0) }}</p>
                        </div>
                     </div>
                     <div class="multisteps-form__content">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <input type="hidden" name="position_count" value="{{ old('position_count', 0) }}">
                                <button class="btn btn-icon btn-primary w-100 mb-2" type="button" id="add_position">
                                    <span class="btn-inner--icon"><i class="fas fa-plus"></i></span>
                                    <span class="btn-inner--text">{{ __('Dodaj stanowisko') }}</span>
                                </button>
                            </div>
                            <div id="positions" class="col-lg-8">
                                @for ($i = 1; $i <= old('position_count', 0); $i++)
                                <div class='position' data-id='{{ $i }}' id='div-position{{ $i }}'>
                                   <div class='w-100 text-right'> <button class='btn btn-icon btn-danger btn-sm text-right delete_position' id='delete_button{{ $i }}' data-id='{{ $i }}' type='button' onclick='delete_position(this)'> <span class='btn-inner--icon'><i class='fas fa-trash-alt'></i></span> </button> </div>
                                   <div class='form-group'>
                                      <label for='name_position{{ $i }}' class='mt-1'>{{ __('Nazwa stanowiska') }} {{ $i }}:</label> <input type='text' class='form-control counter_name_position' maxlength='255' id='name_position{{ $i }}' name='name_position{{ $i }}' data-id='{{ $i }}' value="{{ old('name_position'.$i, '') }}" required>
                                      <p id='counter_name_position{{ $i }}' data-counter-id='{{ $i }}' class='text-sm'>0 / 255 znaków</p>
                                   </div>
                                   <div class='form-group'>
                                      <label for='description_position{{ $i }}' class='mt-1'>{{ __('Opis stanowiska:') }}</label>
                                      <textarea class='form-control counter_description_position mt-1' rows='2' maxlength='255' id='description_position{{ $i }}' style='resize: none;' name='description_position{{ $i }}' data-id='{{ $i }}' required>{{ old('description_position'.$i, '') }}</textarea>
                                      <p id='counter_description_position{{ $i }}' data-counter-id='{{ $i }}'  class='text-sm'>0 / 255 znaków</p>
                                   </div>
                                   <div class='row form-group'>
                                      <div class='col-lg-6'> <label for='start_position{{ $i }}'>{{ __('Godzina rozpoczęcia pracy') }}</label> <input type='time' name='start_position{{ $i }}' id='start_position{{ $i }}' class='form-control' value="{{ old('start_position'.$i, '') }}" required> </div>
                                      <div class='col-lg-6 form-group'> <label for='end_position{{ $i }}'>{{ __('Godzina zakończenia pracy') }}</label> <input type='time' name='end_position{{ $i }}' id='end_position{{ $i }}' class='form-control' value="{{ old('end_position'.$i, '') }}" required> </div>
                                   </div>
                                   <div class='form-group'>
                                      <div class='row'>
                                         <div class='col'> <label for='points_position{{ $i }}'>{{ __('Wartość punktowa:') }}</label> <input type='number' class='form-control' id='points_position{{ $i }}' name='points_position{{ $i }}' value="{{ old('points_position'.$i, '') }}" required> </div>
                                         <div class='col'> <label for='max_position{{ $i }}'>{{ __('Max. ilość wolontariuszy:') }}</label> <input type='number' class='form-control' id='max_position{{ $i }}' name='max_position{{ $i }}' value="{{ old('max_position'.$i, '') }}" required> </div>
                                      </div>
                                   </div>
                                   <hr class='w-100 text-center ml-0' style='color: #707070'>
                                   @endfor
                                </div>
                        </div>

                        <div class="row">
                           <div class="button-row d-flex mt-4 col-12">
                              <button class="btn bg-gradient-light mb-0 js-btn-prev" type="button" title="Prev">{{ __('Wróć') }}</button>
                              <button class="btn bg-gradient-dark ms-auto mb-0" type="submit" title="Send" id="new_form_button">{{ __('Utwórz formularz') }}</button>
                           </div>
                        </div>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>

      @include('volunteer.include.footer')
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

            <div class="input-group">
                <label for="category-icon" class="form-control-label">{{ __('Ikona') }}</label>
                <div class="text-center" role="group" aria-label="Basic example">
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
        editor.setContent("{!! str_replace('"', "'", str_replace('\r\n', '', old('pl_description', ''))) !!}");
      });
    }
    });
  </script>
@endsection

@section('script')
<script src="https://demos.creative-tim.com/argon-dashboard-pro/assets/js/plugins/multistep-form.js"></script>
<script src="{{ url('/js/functions/forms.js?v=5') }}"></script>

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

<script>
    $('#new_form').submit(function(){
        $('#new_form_button').prop('disabled', true);
        $('#new_form_button').prepend('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> ');
    });
</script>

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

  var marker_pl = new google.maps.Marker({
      position: myLatlng,
      map: map_pl,
      draggable:true,
      //title:"Weź mnie!"
  });

  window.setInterval(function() {
      $("[name='place_longitude_pol']").val(marker_pl.getPosition().lat());
      $("[name='place_latitude_pol']").val(marker_pl.getPosition().lng());
  }, 5);
  }

  </script>

<script>
    var current_color = "primary";
    var category_icon;
    $('#category-color').change(function() {
        var color = $(this).val();
        $(".icon-button").removeClass("btn-outline-"+current_color);
        $(".icon-button").addClass("btn-outline-"+color);
        $("#button-choice-"+category_icon).removeClass("btn-"+current_color);
        $("#button-choice-"+category_icon).addClass("btn-"+color);
        current_color = color;
    });

    $(".icon-button").click(function(){
    if(category_icon != null)
    {
        $("#button-choice-"+category_icon).removeClass('btn-'+current_color);
    }
    category_icon = $(this).attr('data-icon-name');
    $(this).addClass('btn-'+current_color);

    });

    $('#create-button-category').on('click', function(){
        $('#modalcategory').modal('hide');
        var name = $("input[name=category-name]");
        var description = $("input[name=category-description]");
        $.ajax({
        url: "{{ route('c.form.createcategory') }}",
        type:"POST",
        data:{
          name:name.val(),
          description:description.val(),
          icon:category_icon,
          color:current_color,
        },
        success:function(response){
          var response_value = response.ivid;
          var response_name = response.name;
          if(response) {
            Swal.fire({
                icon: 'success',
                title: 'Kategoria została utworzona pomyślnie!',
                showConfirmButton: false,
                timer: 3000
            })
            name.val("");
            description.val("");
            category.setChoices( [ { value: response_value, label: response_name, selected: true }, ], 'value', 'label', false, );
          }
        },
        error: function(error) {
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
                name.val("");
                description.val("");
            }
        }
       });
    });
</script>

<script>

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
</script>
@endsection
