
@extends('layouts.app')

@section('title') {{ __('Edytuj post') }} @endsection

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
        <li class="nav-item ps-1 pt-1">
            <a data-bs-toggle="collapse" href="#posts" class="nav-link active py-2" aria-controls="posts" role="button" aria-expanded="true">
                    <i class="fa-solid fa-table text-primary text-sm opacity-10"></i>
                <span class="nav-link-text ms-1">{{ __('Posty') }}</span>
            </a>
            <div class="collapse show" id="posts">
                <ul class="nav ms-4">
                    <li class="nav-item">
                        <a href="{{ route('c.post.list') }}" class="nav-link active">
                          <span class="sidenav-normal"> {{ __('Lista') }} </span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{ route('c.post.create') }}" class="nav-link">
                          <span class="sidenav-normal"> {{ __('Utwórz nowy') }} </span>
                        </a>
                      </li>
                </ul>
            </div>
        </li>
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
              <li class="breadcrumb-item text-sm text-white" aria-current="page">{{ __('Posty') }}</li>
              <li class="breadcrumb-item text-sm text-white active" aria-current="page">{{ __('Edycja') }}</li>
            </ol>
            <h6 class="font-weight-bolder text-white mb-0">{{ $post->post_translate->title }}</h6>
          </nav>
          @include('coordinator.include.nav')
        </div>
      </nav>

    <div class="container-fluid py-4 min-vh-100">
        <div class="row">
            <div class="col-lg-6 col-12 d-flex ms-auto">
               <a href="{{ route('c.post.show', [$post->ivid]) }}" class="btn btn-icon bg-gradient-dark ms-auto">
                <span class="btn-inner--icon me-2"><i class="fa-solid fa-arrow-left"></i></span>
               <span class="btn-inner--text">{{ __('Powrót') }}</span>
            </a>
            </div>
         </div>

         <div class="card">
            <div class="card-header"><h5 class="mb-0">{{ __('Edytuj post') }}</h5></div>
              <div class="card-body">
                        <form action="{{ route('c.post.update', [$post->ivid]) }}" method="post" role="form">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="locale" value="pl">
                            <div class="row">
                                <div class="col-lg-4 order-lg-2">
                                    <div class="form-group">
                                        <label for="name">{{ __('Tytuł posta') }}</label>
                                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" max="255" value="{{ $post->post_translate->title }}" required>
                                      @error('title')
                                        <div class="text-danger w-100 d-block">
                                            {{ $message }}
                                        </div>
                                      @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="required" for="post_type">{{ __('Typ posta') }}</label><br>
                                        <div class="form-check mb-2">
                                            <input type="radio" id="type_general" name="post_type" class="form-check-input" value="general" @checked($post->form == 0) required>
                                            <label class="custom-control-label" for="type_general">{{ __('Ogólny') }}</label>
                                        </div>
                                          <div class="form-check">
                                            <input type="radio" id="type_form" name="post_type" class="form-check-input" value="form" @checked($post->form > 0) required>
                                            <label class="custom-control-label" for="type_form">{{ __('Do formularza') }}</label>
                                          </div>
                                          
                                          <div class="@if($post->form == 0) d-none @endif" id="form_select_div">
                                            <label class="required" for="form_select">{{ __('Wybierz formularz') }}</label>
                                            <select name="form_select" id="form_select" class="form-control mt-3 @error('form_select') is-invalid @enderror">
                                                @forelse ($forms as $form)
                                                    <option value="{{ $form->id }}" @selected($post->form == $form->id)>{{ $form->form_translate->title }} (#{{ $form->id }})</option>
                                                @empty
                                                    <option value="0">{{ __('Brak formularzy') }}</option>
                                                @endforelse
                                            </select>
                                          </div>
                                    </div>
                                </div>
                                <div class="col-lg-8 order-lg-1">
                                    <div class="form-group">
                                        <label for="content">Zawartość</label>
                                        <textarea name="content" id="content"></textarea>
                                        @error('content')
                                            <div class="text-danger w-100 d-block">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-lg-6">
                                    <button class="btn btn-success w-100 my-2" id="create-button-post" type="submit">{{ __('Zaktualizuj post') }}</button>
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
        'removeformat help',
        font_formats: "Nunito-nunito",
      setup: function (editor) {
      editor.on('init', function (e) {
        editor.setContent("{!! str_replace('"', "'", str_replace('\r\n', '', $post->post_translate->content)) !!}");
      });
    }
    });
  </script>

@endsection

@push('scripts')
<script>
    const form_select = new Choices(document.getElementById("form_select"), {
        searchEnabled:false,
        shouldSort: false,
        placeholder: true,
    });
</script>

<script>
$(document).ready(function() {
    $('input:radio[name="post_type"]').change( function(){
        if ($(this).is(':checked') && $(this).val() == 'general') {
            $('#form_select_div').addClass('d-none');
        } else {
            $('#form_select_div').removeClass('d-none');
        }
});
});</script>

@if (session('edited_post'))
<script>
Swal.fire({
    icon: 'success',
    title: 'Edycja posta zakończyła się pomyślnie!',
    showConfirmButton: false,
    timer: 3000
})
</script>
@endif
@endpush
