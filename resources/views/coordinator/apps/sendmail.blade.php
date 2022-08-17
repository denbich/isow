
@extends('layouts.app')

@section('title') {{ __('Wyślij maila') }} @endsection

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

        <li class="nav-item ps-1 pt-1">
            <a class="nav-link active" href="{{ route('c.mail') }}">
              <i class="fa-solid fa-paper-plane text-primary text-sm opacity-10"></i>
              <span class="nav-link-text ms-1">{{ __('Wyślij maila') }}</span>
            </a>
          </li>

        @include('coordinator.include.forms')
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
              <li class="breadcrumb-item text-sm text-white active" aria-current="page">{{ __('Wyślij maila') }}</li>
            </ol>
            <h6 class="font-weight-bolder text-white mb-0">{{ __('Wyślij maila') }}</h6>
          </nav>
          @include('coordinator.include.nav')
        </div>
      </nav>

    <div class="container-fluid py-4 min-vh-100">
        <div class="row d-none">
            <div class="col-lg-6 col-12 d-flex ms-auto">
               <a href="" class="btn btn-icon bg-gradient-dark ms-auto">
                <span class="btn-inner--icon me-2"><i class="fa-solid fa-arrow-left"></i></span>
               <span class="btn-inner--text">{{ __('Wysłane') }}</span>
            </a>
            </div>
         </div>
         <div class="card">
            <div class="card-header"><h5 class="mb-0">{{ __('Wyślij maila') }}</h5></div>
              <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <form action="{{ route('c.mail') }}" method="post" role="form" id="send_mail_form">
                            @csrf
                            <div class="form-group">
                                <label for="title">{{ __('Tytuł maila') }}</label>
                                <input type="text" name="title" id="title" class="form-control @error('title') is-invaid @enderror" required>
                                @error('title')
                                    <div class="text-danger w-100 d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="receiver" value="all" id="receiverradio1" checked>
                                            <label class="custom-control-label" for="receiverradio1">{{ __('Wszyscy wolontariusze') }}</label>
                                          </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" value="choose" name="receiver" id="receiverradio2">
                                            <label class="custom-control-label" for="receiverradio2">{{ __('Wybierz wolontariuszy') }}</label>
                                          </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" value="custom" name="receiver" id="receiverradio3">
                                            <label class="custom-control-label" for="receiverradio3">{{ __('Wprowadź email odbiorcy') }}</label>
                                          </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-input d-none" id="choose-volunteers-div">
                                <div class="w-100 text-center">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#volunteersModal">{{ __('Wybierz wolontariuszy') }}</button>
                                </div>

                                <div class="modal fade" id="volunteersModal" tabindex="-1" role="dialog" aria-labelledby="volunteersModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="volunteersModalLabel">{{ __('Wybierz wolontariuszy') }}</h5>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">
                                            <label for="receiver-select">{{ __('Kliknij w polę poniżej by widzieć listę') }}</label>
                                            <select name="receiver-select" id="receiver-select" class="form-control @error('title') is-invaid @enderror" multiple>
                                                @forelse ($volunteers as $volunteer)
                                                    <option value="{{ $volunteer->ivid }}">{{ $volunteer->firstname." ".$volunteer->lastname." (".$volunteer->name.")" }}</option>
                                                @empty
                                                    <option disabled selected>{{ __('Brak wolontariuszy!') }}</option>
                                                @endforelse
                                            </select>
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn bg-gradient-dark" data-bs-dismiss="modal">{{ __('Zamknij') }}</button>
                                        </div>
                                      </div>
                                    </div>
                                  </div>

                                @error('receiver-select')
                                    <div class="text-danger w-100 d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-input d-none" id="enter-email-div">
                                <label for="email">{{ __('Wprowadź email odbiorcy') }}</label>
                                <input type="email" name="email" id="email" class="form-control @error('email') is-invaid @enderror" placeholder="{{ __('Wpisz email...') }}" required>
                                @error('email')
                                    <div class="text-danger w-100 d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-input">
                                <label for="content">{{ __('Treść maila') }}</label>
                                <textarea name="content" id="content" cols="30" rows="10"></textarea>
                            </div>
                            <div class="form-input">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <button type="button" class="btn bg-gradient-dark w-100 mt-3">{{ __('Podgląd') }}</button>
                                    </div>
                                    <div class="col-lg-6">
                                        <button type="submit" id="send_mail_button" class="btn btn-primary w-100 mt-3">{{ __('Wyślij') }}</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
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
        editor.setContent("{!! str_replace('"', "'", str_replace('\r\n', '', old('content', ''))) !!}");
      });
    }
    });
  </script>

@endsection

@push('scripts')

<script>
    var receiver_select = new Choices(document.getElementById("receiver-select"), {
            searchEnabled: true,
            shouldSort: false,
            placeholder: true,
            removeItemButton: true,
            searchPlaceholderValue: "Szukaj",
            placeholderValue: 'Szukaj',
            allowHTML: true,
        });
</script>

<script>
    $('input[type=radio][name=receiver]').on('change', function() {
  switch ($(this).val()) {
    case 'all':
        $('#choose-volunteers-div').addClass('d-none');
        $('#enter-email-div').addClass('d-none');
      break;
    case 'choose':
        $('#choose-volunteers-div').removeClass('d-none');
        $('#enter-email-div').addClass('d-none');
      break;
    case 'custom':
        $('#choose-volunteers-div').addClass('d-none');
        $('#enter-email-div').removeClass('d-none');
        break;
  }
});
</script>

<script>
    $('#send_mail_form').submit(function(){
        $('#send_mail_button').prop('disabled', true);
        $('#send_mail_button').prepend('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> ');
    });
</script>


@if (session('sent_mail'))
<script>
Swal.fire({
    icon: 'success',
    title: 'Mail został wysłany pomyślnie!',
    showConfirmButton: false,
    timer: 3000
})
</script>
@endif
@endpush
