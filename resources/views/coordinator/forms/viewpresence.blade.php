
@extends('layouts.app')

@section('title') {{ __('Zobacz obecność') }} @endsection

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
                    <li class="nav-item active">
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
              <li class="breadcrumb-item text-sm text-white active" aria-current="page">{{ __('Zoacz obecność') }}</li>

            </ol>
            <h6 class="font-weight-bolder text-white mb-0">{{ $form->form_translate->title }}</h6>
          </nav>
          @include('coordinator.include.nav')
        </div>
      </nav>

    <div class="container-fluid py-4 min-vh-100">
            <div class="row">
                <div class="col-lg-6 col-12 d-flex ms-auto">
                   <a href="{{ route('c.form.show', [$form->ivid]) }}" class="btn btn-icon bg-gradient-dark ms-auto">
                    <span class="btn-inner--icon me-2"><i class="fa-solid fa-arrow-left"></i></span>
                   <span class="btn-inner--text">{{ __('Powrót') }}</span>
                   </a>
                </div>
             </div>
            <div class="card mt-4">
                <div class="card-header">
                    <h5 class="mb-0">Zobacz obecność</h5>
                </div>
                @if ($signed_volunteers != null && count($signed_volunteers) > 0)
                <div class="card-body h-100">
                    <div class="table-responsive min-vh-100">
                        <table class="table align-items-center mb-0 h-100">
                          <thead>
                            <tr>
                              <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Wolontariusz</th>
                              <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Dane kontakowe</th>
                              <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Stanowisko</th>
                              <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Obecność</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($signed_volunteers as $sign)
                            <tr>
                                <td>
                                  <div class="d-flex px-2 py-1">
                                    <div>
                                      <img src="{{ url($sign->volunteer->photo_src) }}" class="avatar avatar-sm me-3">
                                    </div>
                                    <div class="d-flex flex-column justify-content-center">
                                      <span class="mb-0 font-weight-bold">{{ $sign->volunteer->firstname." ".$sign->volunteer->lastname }}</span>
                                      <span class="text-secondary text-xs mb-0">{{ $sign->volunteer->name }}</span>
                                    </div>
                                  </div>
                                </td>
                                <td>
                                  <div class="d-flex px-2 py-1">
                                    <div class="d-flex flex-column justify-content-center">
                                      <span class="mb-0 text-secondary font-weight-bold"><a href="tel:{{ $sign->volunteer->telephone }}">{{ $sign->volunteer->telephone }}</a></span>
                                      <span class="mb-0 text-secondary font-weight-bold"><a href="mailto:{{ $sign->volunteer->email }}">{{ $sign->volunteer->email }}</a></span>
                                    </div>
                                  </div>
                                </td>
                                <td>
                                  <p class="font-weight-bold mb-0">{{ $sign->position->form_position_translate->title }}</p>
                                </td>
                                <td class="align-middle text-center">
                                        @if ($sign->volunteer->gender == 'f')
                                            @if ($sign->condition == 3)
                                            <span class="mb-0 text-secondary font-weight-bold">{{ __('Obecna') }}</span>
                                            @else
                                            <span class="mb-0 text-secondary font-weight-bold">{{ __('Nieobecna') }}</span>
                                            @endif
                                        @else
                                            @if ($sign->condition == 3)
                                            <span class="mb-0 text-secondary font-weight-bold">{{ __('Obecny') }}</span>
                                            @else
                                            <span class="mb-0 text-secondary font-weight-bold">{{ __('Nieobecny') }}</span>
                                            @endif
                                        @endif
                                </td>
                              </tr>
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                </div>
                @else
                  <div class="card-body">
                    <h4 class="text-center text-danger">{{ __('Żaden wolontariusz się nie zapisał!') }}</h4>
                  </div>
                @endif

            </div>

      @include('coordinator.include.footer')
    </div>
  </main>
@endsection
