
@extends('layouts.app')

@section('title') {{ __('Tworzenie nagrody') }} @endsection

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
        @include('coordinator.include.forms')
        @include('coordinator.include.posts')
        <li class="nav-item ps-1 pt-1">
            <a data-bs-toggle="collapse" href="#prizes" class="nav-link active py-2" aria-controls="prizes" role="button" aria-expanded="true">
                    <i class="fa-solid fa-award text-primary text-sm opacity-10"></i>
                <span class="nav-link-text ms-1">{{ __('Nagrody') }}</span>
            </a>
            <div class="collapse show" id="prizes">
                <ul class="nav ms-4">
                    <li class="nav-item">
                        <a href="{{ route('c.prize.search') }}" class="nav-link">
                          <span class="sidenav-normal"> {{ __('Wyszukaj') }} </span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{ route('c.prize.list') }}" class="nav-link">
                          <span class="sidenav-normal"> {{ __('Lista') }} </span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{ route('c.prize.orders') }}" class="nav-link">
                          <span class="sidenav-normal"> {{ __('Lista zamówień') }} </span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{ route('c.prizecategory.list') }}" class="nav-link">
                          <span class="sidenav-normal"> {{ __('Kategorie') }} </span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{ route('c.prize.create') }}" class="nav-link active">
                          <span class="sidenav-normal"> {{ __('Utwórz nową') }} </span>
                        </a>
                      </li>
                </ul>
            </div>
        </li>
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
        <h3 class="mt-5 text-white">{{ __('Utwórz nagrodę') }}</h3>
        <h5 class="text-white font-weight-normal">{{ __('Po zakończonym procesie tworzenia, nagroda będzie automatycznie dostępna dla wolontariuszy!') }}</h5>
      </div>
      <div class="multisteps-form mb-5">
         <div class="row mt-5">
            <div class="col-12 col-lg-8 mx-auto my-5">
               <div class="multisteps-form__progress">
                  <button class="multisteps-form__progress-btn js-active" type="button" title="info">
                  <span>{{ __('Nagroda') }}</span>
                  </button>
                  <button class="multisteps-form__progress-btn" type="button" title="place">
                  <span>{{ __('Kategoria i sponsor') }}</span>
                  </button>
                  <button class="multisteps-form__progress-btn" type="button" title="positions">
                  <span>{{ __('Kombinacje') }}</span>
                  </button>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-12 col-lg-10 m-auto">
               <form class="multisteps-form__form" style="height: 463px;" action="{{ route('c.prize.store') }}" method="post" id="create_prize_form">
                    @csrf
                    <input type="hidden" name="locale" value="pl">
                  <div class="card multisteps-form__panel p-3 border-radius-xl bg-white js-active" data-animation="FadeIn">
                     <div class="multisteps-form__content">
                        <div class="row mt-3 text-left">
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <label class="required" for="title">{{ __('Nazwa nagrody') }}</label>
                                    <input class="form-control @error('title') is-invalid @enderror" maxlength="255" type="text" name="title" id="title" value="{{ old('title', '') }}" required>
                                    @error('title')
                                        <div class="text-danger w-100 d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="description">Opis</label>
                                    <textarea name="description" id="description"></textarea>
                                    @error('description')
                                        <div class="text-danger w-100 d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4">

                                <div class="form-group">
                                    <label class="required" for="points">{{ __('Wartość punktowa') }}</label>
                                    <input class="form-control @error('points') is-invalid @enderror" type="number" name="points" id="points" value="{{ old('points', '') }}" required>
                                    @error('points')
                                        <div class="text-danger w-100 d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group @if(old('combination_check') == "on") d-none @endif" id="quantity-div">
                                    <label class="required" for="quantity">{{ __('Ilość sztuk') }}</label>
                                    <input class="form-control @error('quantity') is-invalid @enderror" type="number" name="quantity" id="quantity" value="{{ old('quantity', '') }}">
                                    @error('quantity')
                                        <div class="text-danger w-100 d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="combination-check" name="combination_check" @checked(old('combination_check') == "on")>
                                        <label class="custom-control-label" for="combination-check">{{ __('Nagroda zawiera kombinacje') }}</label>
                                      </div>
                                </div>

                                <div class="form-group">
                                    <h4 class="w-100 text-center">{{ __('Ikona') }}</h4>
                                    <label for="upload_image" class="w-100">
                                        <a class="btn btn-primary btn-icon w-100 text-white">
                                            <span class="btn-inner--icon"><i class="far fa-images"></i></span>
                                            <span class="btn-inner--text">{{ __('Dodaj ikonę nagrody') }}</span>
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
                           <h5 class="font-weight-normal">{{ __('Kategoria i sponsor nagrody') }}</h5>
                           <p>{{ __('Tu możesz wybrać kategorię nagrody oraz oznaczyć, kto jest sponsorem nagrody!') }}</p>
                        </div>
                     </div>
                     <div class="multisteps-form__content">
                        <h5 class="text-center">{{ __('Kategoria nagrody') }}</h5>
                        <div class="row justify-content-center">
                            <div class="form-group col-lg-4">
                                <select class="form-control" id="category-dropdown" name="category">
                                    <option>{{ __('Wybierz kategorię') }}</option>
                                    @forelse ($categories as $category)
                                    <option value="{{ $category->ivid }}" @selected(old('category') == $category->ivid)>{{ $category->prize_category_translate->name }}</option>
                                    @empty
                                    <option disabled selected>{{ __('Brak kategorii') }}</option>
                                    @endforelse
                                  </select>
                                  @error('category')
                                        <div class="text-danger w-100 d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                            </div>
                            <div class="form-group col-lg-4">
                                <button class="btn btn-icon btn-primary w-100" type="button" data-bs-toggle="modal" data-bs-target="#modalcategory">
                                    <span class="btn-inner--icon"><i class="fa-solid fa-plus"></i></span>
                                    <span class="btn-inner--text">{{ __('Lub dodaj nową kategorię') }}</span>
                                </button>
                            </div>
                        </div>

                        <h5 class="text-center">{{ __('Sponsor nagrody') }}</h5>
                        <div class="row justify-content-center">
                            <div class="form-group col-lg-4">
                                <select class="form-control" id="sponsor-dropdown" name="sponsor">
                                    <option>{{ __('Wybierz sponsora') }}</option>
                                    @forelse ($sponsors as $sponsor)
                                    <option value="{{ $sponsor->ivid }}" @selected(old('sponsor') == $sponsor->ivid)>{{ $sponsor->name }}</option>
                                    @empty
                                    <option disabled selected>{{ __('Brak sponsora') }}</option>
                                    @endforelse
                                  </select>
                                  @error('sponsor')
                                  <div class="text-danger w-100 d-block">
                                      {{ $message }}
                                  </div>
                               @enderror
                            </div>
                            <div class="form-group col-lg-4">
                                <button class="btn btn-icon btn-primary w-100" type="button" data-bs-toggle="modal" data-bs-target="#modalsponsor">
                                    <span class="btn-inner--icon"><i class="fa-solid fa-plus"></i></span>
                                    <span class="btn-inner--text">{{ __('Lub dodaj nowego sponsora') }}</span>
                                </button>
                            </div>
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
                           <h5 class="font-weight-normal">{{ __('Kombinacje') }}</h5>
                        </div>
                     </div>
                     <div class="multisteps-form__content">
                        <div id="combination-multistep-content" class="@if(old('combination_check') != "on") d-none @endif">
                            <p class="text-center">{{ __('Ilość kombinacji:') }} <span id="combination_count">{{ old('combination_count', 0) }}</p>
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <input type="hidden" name="combination_count" value="{{ old('combination_count', 0) }}">
                                    <button class="btn btn-icon btn-primary w-100 mb-2" type="button" id="add_combination">
                                        <span class="btn-inner--icon"><i class="fas fa-plus"></i></span>
                                        <span class="btn-inner--text">{{ __('Dodaj kombinację') }}</span>
                                    </button>
                                </div>
                                <div id="combinations" class="col-lg-8">
                                    @for ($i = 1; $i <= old('combination_count', 0); $i++)
                                    <div id='combination{{ $i }}' data-id='{{ $i }}'>
                                        <div id='divcombination{{ $i }}'>
                                            <div class='w-100 text-right' id='buttoncombination{{ $i }}'>
                                                <button class='btn btn-icon btn-danger btn-sm text-right delete_combination' id='delete_button{{ $i }}' data-id='{{ $i }}' type='button' onclick='delete_combination(this)'>
                                                    <span class='btn-inner--icon'><i class='fas fa-trash-alt'></i></span>
                                                </button>
                                            </div>
                                        </div>
                                        <div class='pb-0' id='div-combination{{ $i }}'>
                                            <label for='name_combination{{ $i }}' class='mt-1'>Kombinacja nr {{ $i }}:</label>
                                            <input type='text' class='form-control' maxlength='255' data-id='{{ $i }}' id='name_combination{{ $i }}' name='name_combination{{ $i }}' value="{{ old('name_combination'.$i) }}" required>

                                            <label for='quanitity_combination{{ $i }}' class='mt-1'>Ilość:</label>
                                            <input type='number' name='quanitity_combination{{ $i }}' class='form-control' data-id='{{ $i }}' value="{{ old('quanitity_combination'.$i) }}" id='quanitity_combination{{ $i }}'>
                                        </div>
                                        <hr class='w-100 text-center ml-0' style='color: #707070'>
                                    </div>
                                    @endfor
                                </div>
                            </div>
                        </div>
                        <div id="combination-multistep-alert" class="@if(old('combination_check') == "on") d-none @endif">
                            <h4 class="text-danger text-center">{{ __('Kombinacje są wyłączone! Aby je włączyć, przejdź do pierwszej zakładki "Nagroda" i zaznacz odpowiednie okienko.') }}</h4>
                        </div>

                        <div class="row">
                           <div class="button-row d-flex mt-4 col-12">
                              <button class="btn bg-gradient-light mb-0 js-btn-prev" type="button" title="Prev">{{ __('Wróć') }}</button>
                              <button class="btn bg-gradient-dark ms-auto mb-0" type="submit" title="Send" id="create_prize_button">{{ __('Utwórz nagrodę') }}</button>
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
            <h5 class="modal-title" id="modalcategoryLabel">Utwórz kategorię dla nagród</h5>
          </div>
          <div class="modal-body">
            <div class="form-group">
                <label for="category-name" class="form-control-label">{{ __('Nazwa kategorii') }}</label>
                <input type="text" class="form-control" name="category-name" id="category-name" max="255">
            </div>
            <div class="form-group">
                <label for="category-description" class="form-control-label">{{ __('Krótki opis kategorii (Nie wymagany)') }}</label>
                <input type="text" class="form-control" name="category-description" id="category-description" max="255">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('main.cancel') }}</button>
            <button type="button" class="btn btn-primary" id="create-button-category">{{ __('Utwórz') }}</button>
          </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="modalsponsor" tabindex="-1" role="dialog" aria-labelledby="modalsponsorLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="modalsponsorLabel">Utwórz sponsora nagród</h5>
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
                          <label for="sponsor_facebook" class="form-control-label">Facebook (Nie wymagany)</label>
                          <div class="input-group">
                              <div class="input-group">
                                  <span class="input-group-text" id="basic-addon1">@</span>
                                  <input type="text" class="form-control" name="sponsor_facebook" id="sponsor_facebook" max="255" aria-describedby="basic-addon1">
                              </div>

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
                              <div class="input-group">
                                  <span class="input-group-text" id="basic-addon2">@</span>
                                  <input type="text" class="form-control" name="sponsor_instagram" id="sponsor_instagram" max="255" aria-describedby="basic-addon2">
                              </div>

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
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('main.cancel') }}</button>
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
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('main.cancel') }}</button>
                  <button type="button" id="crop1" class="btn btn-primary">Wytnij</button>
              </div>
          </div>
      </div>
  </div>
@endsection

@section('style')
<script>
    tinymce.init({
      selector: 'textarea#description',
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
        editor.setContent("{!! str_replace('"', "'", str_replace('\r\n', '', old('description', ''))) !!}");
      });
    }
    });
  </script>
@endsection

@section('script')
<script src="https://demos.creative-tim.com/argon-dashboard-pro/assets/js/plugins/multistep-form.js"></script>
<script src="{{ url('/js/functions/prizes.js?v=1.3') }}"></script>

<script>
    var category_dropdown = new Choices(document.getElementById("category-dropdown"), {
            searchEnabled:false,
            shouldSort: false,
            placeholder: true,
        });
        var sponsor_dropdown = new Choices(document.getElementById("sponsor-dropdown"), {
            searchEnabled:false,
            shouldSort: false,
            placeholder: true,
        });
</script>

<script>
    $('#combination-check').on('click', function(){
        isChecked = $(this).is(':checked')
        if(isChecked) {
            $('#combination-nav-item').removeClass("d-none");
            $('#quantity-div').addClass("d-none");
            $('#combination-multistep-content').removeClass("d-none");
            $('#combination-multistep-alert').addClass("d-none");
        } else {
            $('#combination-nav-item').addClass("d-none");
            $('#quantity-div').removeClass("d-none");
            $('#combination-multistep-content').addClass("d-none");
            $('#combination-multistep-alert').removeClass("d-none");
        }
    });
</script>

<script>

    $('#create-button-category').on('click', function(){
        $('#modalcategory').modal('hide');
        var name = $("input[name=category-name]");
        var description = $("input[name=category-description]");
        $.ajax({
        url: "{{ route('c.prize.createcategory') }}",
        type:"POST",
        data:{
          name:name.val(),
          description:description.val(),
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
            category_dropdown.setChoices( [ { value: response_value, label: response_name, selected: true }, ], 'value', 'label', false, );
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
            var response_value = response.ivid;
            var response_name = response.name;
            Swal.fire({
                icon: 'success',
                title: 'Sponsor został utworzony pomyślnie!',
                showConfirmButton: false,
                timer: 3000
            })
            $("input[name=sponsor_name]").val('');
            $("input[name=sponsor_description]").val('');
            $("input[name=sponsor_address]").val('');
            $("input[name=sponsor_telephone]").val('');
            $("input[name=sponsor_website]").val('');
            $("input[name=sponsor_email]").val('');
            $("input[name=sponsor_facebook]").val('');
            $("input[name=sponsor_instagram]").val('');
            sponsor_dropdown.setChoices( [ { value: response_value, label: response_name, selected: true }, ], 'value', 'label', false, );
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
            }
        }
       });
    });
</script>

<script>
    $('#create_prize_form').submit(function(){
        $('#create_prize_button').prop('disabled', true);
        $('#create_prize_button').prepend('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> ');
    });
</script>

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
