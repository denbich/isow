
@extends('layouts.app')

@section('title') {{ __('Edycja nagrody') }} @endsection

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
                        <a href="{{ route('c.prize.list') }}" class="nav-link active">
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
                        <a href="{{ route('c.prize.create') }}" class="nav-link">
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
              <li class="breadcrumb-item text-sm text-white" aria-current="page">{{ __('Nagrody') }}</li>
              <li class="breadcrumb-item text-sm text-white" aria-current="page">{{ __('Nagroda') }}</li>
              <li class="breadcrumb-item text-sm text-whiteactive" aria-current="page">{{ __('Edycja') }}</li>
            </ol>
            <h6 class="font-weight-bolder text-white mb-0">{{ $prize->prize_translate->title }}</h6>
          </nav>
          @include('coordinator.include.nav')
        </div>
      </nav>

    <div class="container-fluid py-4 min-vh-100">
        <div class="row">
            <div class="col-lg-6 col-12 d-flex ms-auto">
               <a href="{{ route('c.prize.show', [$prize->ivid]) }}" class="btn btn-icon bg-gradient-dark ms-auto">
                <span class="btn-inner--icon me-2"><i class="fa-solid fa-arrow-left"></i></span>
               <span class="btn-inner--text">{{ __('Powrót') }}</span>
            </a>
            </div>
         </div>

        <div class="card mt-4">
            <div class="card-header">
                <h5 class="mb-0">Nagroda</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('c.prize.update', [$prize->ivid]) }}" method="post" id="form" role="form">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="locale" value="pl">
                    <div class="row mt-3 text-left">
                        <div class="col-lg-8">
                            <div class="form-group">
                                <label class="required" for="title">{{ __('Nazwa nagrody') }}</label>
                                <input class="form-control @error('title') is-invalid @enderror" maxlength="255" type="text" name="title" id="title" value="{{ $prize->prize_translate->title }}" required>
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
                                <input class="form-control @error('points') is-invalid @enderror" type="number" name="points" id="points" value="{{ $prize->points }}" required>
                                @error('points')
                                    <div class="text-danger w-100 d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            @if ($prize->with_combinations == 0)
                            <div class="form-group">
                                <label class="required" for="quantity">{{ __('Ilość') }}</label>
                                <input class="form-control @error('quantity') is-invalid @enderror" type="number" name="quantity" id="quantity" value="{{ $prize->quantity }}" required>
                                @error('quantity')
                                    <div class="text-danger w-100 d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            @endif

                            <div class="form-group">
                                <h4 class="w-100 text-center">{{ __('Ikona') }}</h4>
                                <label for="upload_image" class="w-100">
                                    <a class="btn btn-primary btn-icon w-100 text-white">
                                        <span class="btn-inner--icon"><i class="far fa-images"></i></span>
                                        <span class="btn-inner--text">{{ __('Zmień ikonę nagrody') }}</span>
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
                            <div class="form-group">
                                <h5 class="text-center">{{ __('Kategoria nagrody') }}</h5>
                        <div>
                            <div class="form-group">
                                <select class="form-control" id="category-dropdown" name="category">
                                    <option>{{ __('Wybierz kategorię') }}</option>
                                    @forelse ($categories as $category)
                                    <option value="{{ $category->ivid }}" @selected($prize->category_id == $category->id)>{{ $category->prize_category_translate->name }}</option>
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
                            <div class="form-group">
                                <button class="btn btn-icon btn-primary w-100" type="button" data-bs-toggle="modal" data-bs-target="#modalcategory">
                                    <span class="btn-inner--icon"><i class="fa-solid fa-plus"></i></span>
                                    <span class="btn-inner--text">{{ __('Lub dodaj nową kategorię') }}</span>
                                </button>
                            </div>
                        </div>

                        <h5 class="text-center">{{ __('Sponsor nagrody') }}</h5>
                        <div>
                            <div class="form-group">
                                <select class="form-control" id="sponsor-dropdown" name="sponsor">
                                    <option>{{ __('Wybierz sponsora') }}</option>
                                    @forelse ($sponsors as $sponsor)
                                    <option value="{{ $sponsor->ivid }}" @selected($prize->sponsor_id == $sponsor->id)>{{ $sponsor->name }}</option>
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
                            <div class="form-group">
                                <button class="btn btn-icon btn-primary w-100" type="button" data-bs-toggle="modal" data-bs-target="#modalsponsor">
                                    <span class="btn-inner--icon"><i class="fa-solid fa-plus"></i></span>
                                    <span class="btn-inner--text">{{ __('Lub dodaj nowego sponsora') }}</span>
                                </button>
                            </div>
                        </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <h4 class="text-center">{{ __('Kombinacje') }}</h4>
                    <div class="row justify-content-center">
                        <div id="combinations" class="col-lg-7">
                            @foreach($prize->combinations as $combination)
                                <div id='combination"{{ $loop->iteration }}'>
                                    <div class='pb-0' id='div-combination{{ $loop->iteration }}'>
                                        <label for='name_combination{{ $loop->iteration }}' class='mt-1'>Kombinacja nr {{ $loop->iteration }}:</label>
                                        <input type='text' class='form-control' maxlength='255' id='name_combination{{ $loop->iteration }}' name='name_combination{{ $loop->iteration }}' value="{{ $combination->translate->title }}" required>

                                        <label for='quantity_combination{{ $loop->iteration }}' class='mt-1'>Ilość:</label>
                                        <input type='number' name='quantity_combination{{ $loop->iteration }}' class='form-control' value="{{ $combination->quantity }}" id='quantity_combination"{{ $loop->iteration }}'>
                                    </div>
                                    <hr class='w-100 text-center ml-0' style='color: #707070'>
                                </div>
                            @endforeach
                            <button type="submit" class="btn bg-gradient-dark w-100">@lang('Zakutalizuj nagrodę')</button>
                        </div>
                    </div>

                </form>
            </div>

        </div>
      @include('coordinator.include.footer')
    </div>
  </main>
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
        editor.setContent("{!! str_replace('"', "'", str_replace('\r\n', '', $prize->prize_translate->description)) !!}");
      });
    }
    });
  </script>
@endsection

@push('scripts')
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
@if (session('edit_prize'))
<script>
Swal.fire({
    icon: 'success',
    title: 'Nagroda została zaaktualizowana pomyślnie!',
    showConfirmButton: false,
    timer: 3000
})
</script>
@endif
@endpush
