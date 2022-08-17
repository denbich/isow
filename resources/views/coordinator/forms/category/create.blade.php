
@extends('layouts.app')

@section('title') {{ __('Nowa kategoria formularza') }} @endsection

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
                      <li class="nav-item active">
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
              <li class="breadcrumb-item text-sm text-white" aria-current="page">{{ __('Kategorie') }}</li>
              <li class="breadcrumb-item text-sm text-white active" aria-current="page">{{ __('Nowy') }}</li>
            </ol>
            <h6 class="font-weight-bolder text-white mb-0">{{ __('Nowa kategoria formularza') }}</h6>
          </nav>
          @include('coordinator.include.nav')
        </div>
      </nav>

    <div class="container-fluid py-4 min-vh-100">
        <div class="row">
            <div class="col-lg-6 col-12 d-flex ms-auto">
               <a href="{{ route('c.formcategory.list') }}" class="btn btn-icon bg-gradient-dark ms-auto">
                <span class="btn-inner--icon me-2"><i class="fa-solid fa-arrow-left"></i></span>
               <span class="btn-inner--text">{{ __('Powrót') }}</span>
            </a>
            </div>
         </div>

         <div class="card">
            <div class="card-header"><h5 class="mb-0">{{ __('Utwórz nową kategorię') }}</h5></div>
              <div class="card-body">
                  <div class="row justify-content-center">
                      <div class="col-lg-8">
                        <form action="{{ route('c.formcategory.store') }}" method="post">
                            @csrf
                            <div class="row pt-2">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="name">{{ __('Nazwa kategorii') }}</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" max="255" required>
                                      @error('name')
                                        <div class="text-danger w-100 d-block">
                                            {{ $message }}
                                        </div>
                                      @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                  <div class="form-group">
                                      <label for="name">{{ __('Opis kategorii') }}</label>
                                      <input type="text" class="form-control @error('description') is-invalid @enderror" name="description" id="description" max="255">
                                  @error('description')
                                        <div class="text-danger w-100 d-block">
                                            {{ $message }}
                                        </div>
                                      @enderror
                                  </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="category-color" class="form-control-label">Kolor</label>
                                        <select name="color" id="category-color" class="form-control @error('color') is-invalid @enderror">
                                            <option value="primary">{{ __('Niebieski') }}</option>
                                            <option value="dark">{{ __('Czarny') }}</option>
                                            <option value="success">{{ __('Zielony') }}</option>
                                            <option value="info">{{ __('Żółty') }}</option>
                                            <option value="danger">{{ __('Czerwony') }}</option>
                                            <option value="warning">{{ __('Pomarańczowy') }}</option>
                                        </select>
                                        @error('color')
                                        <div class="text-danger w-100 d-block">
                                            {{ $message }}
                                        </div>
                                      @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label for="category-icon" class="form-control-label">{{ __('Ikona') }}</label>
                                    <input type="hidden" name="icon" id="input-icon" value="">
                                    <div class="input-group text-center">
                                        <button type="button" class="btn btn-outline-primary icon-button" id="button-choice-person-running" data-icon-name="person-running"><i class="fa-solid fa-person-running fa-xl"></i></button>
                                        <button type="button" class="btn btn-outline-primary icon-button" id="button-choice-person-swimming" data-icon-name="person-swimming"><i class="fa-solid fa-person-swimming fa-xl"></i></button>
                                        <button type="button" class="btn btn-outline-primary icon-button" id="button-choice-person-biking" data-icon-name="person-biking"><i class="fa-solid fa-person-biking fa-xl"></i></button>
                                        <button type="button" class="btn btn-outline-primary icon-button" id="button-choice-person-skiing" data-icon-name="person-skiing"><i class="fa-solid fa-person-skiing fa-xl"></i></button>
                                        <button type="button" class="btn btn-outline-primary icon-button" id="button-choice-basketball" data-icon-name="basketball"><i class="fa-solid fa-basketball fa-xl"></i></button>
                                        <button type="button" class="btn btn-outline-primary icon-button" id="button-choice-volleyball" data-icon-name="volleyball"><i class="fa-solid fa-volleyball fa-xl"></i></button>
                                        <button type="button" class="btn btn-outline-primary icon-button" id="button-choice-people-group" data-icon-name="people-group"><i class="fa-solid fa-people-group fa-xl"></i></button>
                                    </div>
                                    @error('icon')
                                        <div class="text-danger w-100 d-block">
                                            {{ $message }}
                                        </div>
                                      @enderror
                                </div>
                            </div>
                            <button class="btn btn-success w-100 my-2" id="create-button-category" type="submit">{{ __('Utwórz kategorię') }}</button>
                        </form>
                      </div>
                  </div>
              </div>
          </div>

      @include('coordinator.include.footer')
    </div>
  </main>
@endsection

@push('scripts')
<script>
    var color = new Choices(document.getElementById("category-color"), {
            searchEnabled:false,
            shouldSort: false,
            placeholder: true,
        });
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
        $('#input-icon').val(category_icon);
    });
</script>
@endpush
