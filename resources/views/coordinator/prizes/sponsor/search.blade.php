
@extends('layouts.app')

@section('title') {{ __('Lista sponsorów nagród') }} @endsection

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
              <li class="breadcrumb-item text-sm text-white active" aria-current="page">{{ __('Lista') }}</li>
            </ol>
            <h6 class="font-weight-bolder text-white mb-0">{{ __('Lista sponsorów nagród') }}</h6>
          </nav>
          @include('coordinator.include.nav')
        </div>
      </nav>

    <div class="container-fluid py-4 min-vh-100">
        <div class="row">
            <div class="col-lg-6 col-12 d-flex ms-auto">
                <a href="{{ route('c.sponsor.create') }}" class="btn btn-icon btn-outline-white ms-auto">
                    <span class="btn-inner--icon me-2"><i class="fa-solid fa-plus"></i></span>
                    <span class="btn-inner--text">{{ __('Utwórz nowego') }}</span>

                </a>
            </div>
         </div>

         <div class="card">
            <div class="card-header"><h5 class="mb-0">{{ __('Szukaj sponsora') }}</h5></div>
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <form action="{{ route('c.sponsor.search') }}" method="get">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="q" placeholder="Szukaj sponsora" aria-label="Szukaj sponsora" aria-describedby="button-addon2" value="@isset($_GET['q']){{ $_GET['q'] }}@endisset">
                                  <button class="btn btn-primary mb-0" type="submit" id="button-addon2">
                                    <i class="fa-solid fa-search"></i>
                                  </button>
                              </div>
                        </form>
                    </div>
                </div>
            </div>
         </div>
         @if (isset($_GET['q']) && $sponsors != null)
         <div class="row pt-4">
            @forelse ($sponsors as $sponsor)
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <a href="{{ route('c.sponsor.show', [$sponsor->ivid]) }}">
                        <div class="card-header p-0 mx-3 mt-3 position-relative z-index-1">
                        <div class="d-block">
                            <img src="{{ url($sponsor->logo_src) }}" class="img-fluid border-radius-lg w-100">
                        </div>
                        </div>

                        <div class="card-body pt-2">
                        <a class="text-gradient text-primary text-uppercase text-xs font-weight-bold my-2" href="{{ $sponsor->website }}" target="_blank" rel="noopener noreferrer">{{ $sponsor->website }}</a>
                        <h5 class="card-title d-block text-darker">{{ $sponsor->name }}</h5>
                        <p class="mb-2"><span class="text-dark">{{ __('Ilość nagród:')}} <span class="badge badge-primary">{{ 3 }}</span></span></p>
                        </div>
                    </a>
                  </div>
            </div>

            @empty

            <div class="card col-12 mb-8">
                <div class="card-body py-3 d-flex flex-row align-items-center justify-content-between">
                    <h4 class="text-center text-danger w-100 my-3">{{ __('Brak sponsorów!') }}</h4>
                </div>
            </div>

            @endforelse
         </div>
         @endif

      @include('coordinator.include.footer')
    </div>
  </main>
@endsection

@push('scripts')
@if (session('delete_sponsor'))
<script>
Swal.fire({
    icon: 'success',
    title: 'Sponsor nagród został usunięty pomyślnie!',
    showConfirmButton: false,
    timer: 3000
})
</script>
@endif
@endpush
