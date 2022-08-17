
@extends('layouts.app')

@section('title') {{ __('Sponsor nagród') }} @endsection

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
        @include('coordinator.include.prizes')

        <li class="nav-item ps-1 pt-1">
            <a data-bs-toggle="collapse" href="#sponsors" class="nav-link active py-2" aria-controls="sponsors" role="button" aria-expanded="true">
                    <i class="fa-solid fa-hand-holding-dollar text-primary text-sm opacity-10"></i>
                <span class="nav-link-text ms-1">{{ __('Sponsorzy nagród') }}</span>
            </a>
            <div class="collapse show" id="sponsors">
                <ul class="nav ms-4">
                    <li class="nav-item">
                        <a href="{{ route('c.sponsor.search') }}" class="nav-link">
                          <span class="sidenav-normal"> {{ __('Szukaj') }} </span>
                        </a>
                      </li>
                    <li class="nav-item">
                      <a href="{{ route('c.sponsor.list') }}" class="nav-link active">
                        <span class="sidenav-normal"> {{ __('Lista') }} </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="{{ route('c.sponsor.create') }}" class="nav-link">
                        <span class="sidenav-normal"> {{ __('Utwórz nowy') }} </span>
                      </a>
                    </li>
                </ul>
            </div>
        </li>
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
              <li class="breadcrumb-item text-sm text-white" aria-current="page">{{ __('Sponsorzy') }}</li>
              <li class="breadcrumb-item text-sm text-white active" aria-current="page">{{ __('Sponsor') }}</li>
            </ol>
            <h6 class="font-weight-bolder text-white mb-0">{{ $sponsor->name }}</h6>
          </nav>
          @include('coordinator.include.nav')
        </div>
      </nav>

    <div class="container-fluid py-4 min-vh-100">
        <div class="row">
            <div class="col-lg-6 col-12 d-flex ms-auto">
               <a href="{{ route('c.sponsor.list') }}" class="btn btn-icon bg-gradient-dark ms-auto">
                <span class="btn-inner--icon me-2"><i class="fa-solid fa-arrow-left"></i></span>
               <span class="btn-inner--text">{{ __('Powrót') }}</span>
            </a>
            </div>
         </div>

        <div class="row">
            <div class="col-lg-3 order-lg-2 my-2">
                <div class="card">
                    <div class="card-header pb-0">
                        <h5 class="mb-0 text-capitalize">{{ __('Opcje') }}</h5>
                    </div>
                    <div class="card-body pt-0">
                        <a href="{{ route('c.sponsor.edit', [$sponsor->ivid]) }}" class="btn btn-success w-100 my-2 text-white">{{ __('Edytuj sponsora') }}</a>
                        <button class="btn btn-danger w-100 my-2" data-bs-toggle="modal" data-bs-target="#deletemodal">{{ __('Usuń sponsora') }}</button>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 order-lg-1 my-2">
                <div class="card h-100">
                    <div class="card-header">
                        <h5 class="mb-0">{{ __('Sponsor') }}</h5>
                  </div>
                  <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <img src="{{ url($sponsor->logo_src) }}" alt="logo sponsora" class="w-100">
                        </div>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-lg-6">
                                  <div class="form-group">
                                      <label for="sponsor_name" class="form-control-label">Nazwa</label>
                                      <p>{{ $sponsor->name }}</p>
                                  </div>
                                  <div class="form-group">
                                      <label for="sponsor_address" class="form-control_label">Adres oddziału</label>
                                      <p>{{ $sponsor->address }}</p>
                                  </div>
                                  <div class="form-group">
                                      <label for="sponsor_website" class="form-control-label">Strona WWW</label><br>
                                      <a href="{{ $sponsor->website }}">{{ $sponsor->website }}</a>
                                  </div>
                                  <div class="form-group">
                                      <label for="sponsor_name" class="form-control-label">Facebook</label><br>
                                      <a href="https://facebook.com/{{ $sponsor->facebook }}">{{ "@".$sponsor->facebook }}</a>

                                  </div>
                                </div>
                                <div class="col-lg-6">
                                  <div class="form-group">
                                      <label for="sponsor_description" class="form-control-label">Krótki opis sponsora</label>
                                        <p>{{ $sponsor->description }}</p>
                                  </div>
                                  <div class="form-group">
                                      <label for="sponsor_telephone" class="form-control-label">Numer telefonu</label><br>
                                      <a href="tel:{{ $sponsor->telephone }}">{{ $sponsor->telephone }}</a>
                                  </div>
                                  <div class="form-group">
                                      <label for="sponsor_email" class="form-control-label">Adres email</label><br>
                                      <a href="mailto:{{ $sponsor->email }}">{{ $sponsor->email }}</a>
                                  </div>
                                  <div class="form-group">
                                      <label for="sponsor_instagram" class="form-control-label">Instagram</label><br>
                                      <a href="https://instagram.com/{{ $sponsor->instagram }}">{{ "@".$sponsor->instagram }}</a>
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
      @include('coordinator.include.footer')
    </div>
  </main>

  <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="ModalLabel">{{ __('Usuń sponsora') }}</h5>
        </div>
        <div class="modal-body">
          <h4 class="w-100 text-wrap text-center">{{ __('Czy jesteś pewnien, że chcesz usunąć sponsora') }} "{{ $sponsor->name  }}"?</h4>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('main.cancel') }}</button>
          <form action="{{ route('c.sponsor.destroy', [$sponsor->ivid]) }}" method="post">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger">{{ __('Usuń') }}</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('scripts')
@if (session('create_sponsor'))
<script>
Swal.fire({
    icon: 'success',
    title: 'Sponsor został utworzony pomyślnie!',
    showConfirmButton: false,
    timer: 3000
})
</script>
@endif
@endpush
