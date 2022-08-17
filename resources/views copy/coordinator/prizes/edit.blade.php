@extends('layouts.app')

@section('title')
{{ __('Edycja nagrody') }}
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
              <h6 class="h2 text-white d-inline-block mb-0">Edycja nagrody</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="{{ route('c.dashboard') }}"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item" aria-current="page"><a href="{{ route('c.prize.list') }}">Nagrody</a></li>
                  <li class="breadcrumb-item">edycja</li>
                  <li class="breadcrumb-item active"><a href="{{ route('c.prize.show', [$prize->ivid]) }}">{{ $prize->id }}</a></li>
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
                    <h3 class="mb-0">Edytuj nagrodę </h3>
                  </div>
                </div>
              </div>
                <div class="card-body">
                    @if (session('edit_prize') == true)
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <span class="alert-text"><strong>Sukces!</strong> Edycja nagrody przebiegła pomyślnie!</span>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    @endif
                    <div id="form">
                        <form action="{{ route('c.prize.update', [$prize->ivid]) }}" method="post" role="form">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="locale" value="pl">
                            <div class="row">
                                <div class="col-lg-7">
                                    <div class="form-group">
                                        <label class="required" for="title">Tytuł</label>
                                        <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" maxlength="255" type="text" name="title" id="title" value="{{ $prize->prize_translate->title }}" required>
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
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <label class="required" for="points">Wartość punktowa</label>
                                        <input class="form-control {{ $errors->has('points') ? 'is-invalid' : '' }}" type="number" name="points" id="points" value="{{ $prize->points }}" required>
                                        @if($errors->has('points'))
                                            <div class="text-danger w-100 d-block">
                                                {{ $errors->first('points') }}
                                            </div>
                                        @endif
                                    </div>

                                    @if ($prize->with_combinations == 0)

                                    <div class="form-group">
                                        <label class="required" for="quantity">Ilość sztuk</label>
                                        <input class="form-control {{ $errors->has('quantity') ? 'is-invalid' : '' }}" type="number" name="quantity" id="quantity" value="{{ $prize->quantity }}" required>
                                        @if($errors->has('quantity'))
                                            <div class="text-danger w-100 d-block">
                                                {{ $errors->first('quantity') }}
                                            </div>
                                        @endif
                                    </div>

                                    @endif

                                    <h1 class="text-center">Kategoria nagrody</h1>
                                        <div class="row">
                                            <div class="form-group col-lg-6">
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
                                            <div class="form-group col-lg-6">
                                                <button class="btn btn-icon btn-primary w-100" type="button" data-toggle="modal" data-target="#modalcategory">
                                                    <span class="btn-inner--icon"><i class="fa-solid fa-plus"></i></span>
                                                    <span class="btn-inner--text">Lub dodaj nową kategorię</span>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="row justify-content-center">
                                            <div class="form-group col-lg-6">
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
                                            <div class="form-group col-lg-6">
                                                <button class="btn btn-icon btn-primary w-100" type="button" data-toggle="modal" data-target="#modalsponsor">
                                                    <span class="btn-inner--icon"><i class="fa-solid fa-plus"></i></span>
                                                    <span class="btn-inner--text">Lub dodaj nowego sponsora</span>
                                                </button>
                                            </div>
                                        </div>
                                        <label for="upload_image" class="w-100">
                                            <a class="btn btn-primary btn-icon w-100 text-white">
                                                <span class="btn-inner--icon"><i class="far fa-images"></i></span>
                                                <span class="btn-inner--text">Zmień ikonę nagrody</span>
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
                            <div class="row justify-content-center">
                                <div class="col-lg-7">
                                    @foreach ($prize->combinations as $combination)
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <label for='name_combination' class='mt-1'>Kombinacja nr {{ $loop->index+1 }}:</label>
                                            <input type='text' class='form-control' maxlength='255' id='name_combination{{ $loop->index+1 }}' name='name_combination{{ $loop->index+1 }}' value="{{ $combination->translate->title }}" onkeyup = '(counter_name_combination({{ $loop->index+1 }}))' required>
                                            <p id='counter_name_combination{{ $loop->index+1 }}' class='text-sm'>0 / 255 znaków</p>
                                            @if($errors->has('name_combination'.$loop->index+1))
                                            <div class="text-danger w-100 d-block">
                                                {{ $errors->first('name_combination'.$loop->index+1) }}
                                            </div>
                                         @endif
                                        </div>
                                        <div class="col-lg-4">
                                            <label for='name_combination{{ $loop->index+1 }}' class='mt-1'>Ilość:</label>
                                            <input type='number' name='quanitity_combination{{ $loop->index+1 }}' class='form-control' id='quanitity_combination{{ $loop->index+1 }}' value="{{ $combination->quantity }}">
                                            @if($errors->has('quanitity_combination'.$loop->index+1))
                                            <div class="text-danger w-100 d-block">
                                                {{ $errors->first('quanitity_combination'.$loop->index+1) }}
                                            </div>
                                         @endif
                                        </div>
                                        <input type="hidden" name="id_combination{{ $loop->index+1 }}" value="{{ $combination->id }}">
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <div class="form-group px-4 d-none">
                                        <h2 class="w-100 text-center">Ikona</h2>
                                        <a class="btn btn-icon btn-primary w-100 text-white">
                                            <i class="far fa-images"></i>
                                            <span class="ml-1">Zmień ikonę nagrody</span>
                                        </a>
                                    <input type="file" name="image" class="image d-none" id="upload_image" accept="image/*">
                                    </div>
                                    <hr>
                                    <div class="form-group px-4 w-100">
                                        <button type="submit" class="btn btn-primary w-100">Zapisz zmiany</button>
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
              </form>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Zamknij</button>
            <button type="button" class="btn btn-primary" id="create-button-sponsor">Utwórz</button>
          </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Wytnij zdjęcie</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="img-container">
                  <div class="row">
                      <div class="col-md-8">
                          <img src="" id="sample_image" class="img-crop"/>
                      </div>
                      <div class="col-md-4">
                          <div class="preview"></div>
                      </div>
                  </div>
              </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="crop" class="btn btn-primary">Wytnij</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Anuluj</button>
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
        editor.setContent("{!! str_replace('"', "'", str_replace('\r\n', '', $prize->prize_translate->description)) !!}");
      });
    }
    });

  </script>

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

    function change_counter(count)
    {
        var interval = window.setInterval(function() {}, 10);
    }
    function counter_name_combination(count)
    {
        var chars = $('#name_combination'+count).val().length;
        $("#counter_name_combination"+count).html(chars +" / 255 znaków");
    }

    @foreach ($prize->combinations as $combination)
        $("#counter_name_combination{{ $loop->index+1 }}").html($('#name_combination{{ $loop->index+1 }}').val().length +" / 255 znaków");
    @endforeach

</script>

<script>
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

@endsection









