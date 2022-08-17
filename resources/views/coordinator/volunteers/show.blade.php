
@extends('layouts.app')

@section('title') {{ __('Wolontariusz') }} @endsection

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

        <li class="nav-item ps-1 pt-1">
            <a data-bs-toggle="collapse" href="#volunteers" class="nav-link active py-2" aria-controls="volunteers" role="button" aria-expanded="true">
                    <i class="fa-solid fa-users text-primary text-sm opacity-10"></i>
                <span class="nav-link-text ms-1">{{ __('Wolontariusze') }}</span>
            </a>
            <div class="collapse show" id="volunteers">
                <ul class="nav ms-4">
                    <li class="nav-item">
                        <a href="{{ route('c.v.search') }}" class="nav-link">
                          <span class="sidenav-normal"> {{ __('Wyszukaj') }} </span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{ route('c.v.list') }}" class="nav-link active">
                          <span class="sidenav-normal"> {{ __('Lista') }} </span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{ route('c.v.active') }}" class="nav-link">
                          <span class="sidenav-normal"> {{ _('Aktywuj') }} </span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{ route('c.v.other') }}" class="nav-link">
                          <span class="sidenav-normal"> {{ __('Inne') }} </span>
                        </a>
                      </li>
                </ul>
            </div>
        </li>

        @include('coordinator.include.chat')
        @include('coordinator.include.send_mail')
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
              <li class="breadcrumb-item text-sm text-white" aria-current="page">{{ __('Wolonariusze') }}</li>
              <li class="breadcrumb-item text-sm text-white active" aria-current="page">{{ __('Wolontariusz') }}</li>
            </ol>
            <h6 class="font-weight-bolder text-white mb-0">{{ $volunteer->user->name }}</h6>
          </nav>
          @include('coordinator.include.nav')
        </div>
      </nav>

    <div class="container-fluid py-4 min-vh-100">
        <div class="row">
            <div class="col-lg-6 col-12 d-flex ms-auto">
                <a href="{{ route('c.v.volunteer.edit', [$volunteer->ivid]) }}" class="btn btn-icon bg-gradient-dark ms-auto">
                    <span class="btn-inner--icon me-2"><i class="fa-solid fa-user-pen"></i></span>
                   <span class="btn-inner--text">{{ __('Edytuj') }}</span>
                </a>
                <button type="button" data-bs-toggle="modal" data-bs-target="#setpointsmodal" class="btn btn-icon bg-gradient-dark ms-3">
                    <span class="btn-inner--icon me-2"><i class="fa-solid fa-arrows-rotate"></i></span>
                   <span class="btn-inner--text">{{ __('Zmień ilość punktów') }}</span>
                </button>
                <a href="{{ route('c.v.agreement', [$volunteer->user->ivid]) }}" class="btn btn-icon bg-gradient-dark ms-3">
                    <span class="btn-inner--icon me-2"><i class="fa-solid fa-file-lines"></i></span>
                   <span class="btn-inner--text">{{ __('Zobacz zgodę') }}</span>
                </a>
            </div>
         </div>
        <div class="card shadow-lg mb-4">
        <div class="card-body p-3">
            <div class="row gx-4">
               <div class="col-auto">
                  <div class="avatar avatar-xl position-relative">
                     <img src="{{ url($volunteer->user->photo_src) }}" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
                  </div>
               </div>
               <div class="col-auto my-auto">
                  <div class="h-100">
                     <h5 class="mb-1">{{ $volunteer->user->firstname." ".$volunteer->user->lastname }}</h5>
                     <p class="mb-0 font-weight-bold text-sm">{{ $volunteer->user->name }}</p>
                     @if ($volunteer->user->gender == 'f')
                                @switch($volunteer->user->condition)
                                @case(0)
                                <span class="badge badge-dot me-4">
                                    <i class="bg-warning"></i>
                                    <span class="text-dark text-xs">{{ __('Nieaktywna') }}</span>
                                    </span>
                                @break

                                @case(1)
                                <span class="badge badge-dot me-4">
                                    <i class="bg-success"></i>
                                    <span class="text-dark text-xs">{{ __('Aktywna') }}</span>
                                    </span>
                                @break

                                @case(2)
                                <span class="badge badge-dot me-4">
                                    <i class="bg-danger"></i>
                                    <span class="text-dark text-xs">{{ __('Zablokowana') }}</span>
                                    </span>
                                @break
                            @endswitch
                            @else
                                @switch($volunteer->user->condition)
                                    @case(0)
                                    <span class="badge badge-dot me-4">
                                        <i class="bg-warning"></i>
                                        <span class="text-dark text-xs">{{ __('Nieaktywny') }}</span>
                                        </span>
                                    @break
                                    @case(1)
                                    <span class="badge badge-dot me-4">
                                        <i class="bg-success"></i>
                                        <span class="text-dark text-xs">{{ __('Aktywny') }}</span>
                                        </span>
                                    @break

                                    @case(2)
                                    <span class="badge badge-dot me-4">
                                        <i class="bg-danger"></i>
                                        <span class="text-dark text-xs">{{ __('Zablokowany') }}</span>
                                        </span>
                                    @break
                                @endswitch
                            @endif
                        </td>
                  </div>
               </div>
               <div class="ms-auto col-auto text-right me-4">
                    <h5 class="mb-1 text-right">{{ __('Liczba punktów') }}</h5>
                    <span class="ms-auto badge badge-primary badge-lg"><i class="fa-solid fa-star"></i> {{ $volunteer->points }}</span>
               </div>
            </div>
         </div>
        </div>
        <div class="row">
            <div class="col-lg-8">
                <div class="card h-100">
                    <div class="card-header pb-0 p-3">
                        <div class="row">
                           <div class="col-md-8 d-flex align-items-center">
                              <h6 class="mb-0">{{ __('Informacje o wolontariuszu') }}</h6>
                           </div>
                           <div class="col-md-4 text-end">
                              <a href="{{ route('c.v.volunteer.edit', [$volunteer->ivid]) }}">
                              <i class="fa-solid fa-user-edit text-secondary text-sm" data-bs-toggle="tooltip" data-bs-placement="top" aria-hidden="true" aria-label="Edytuj wolontariusza"></i><span class="sr-only">{{ __('Edytuj wolontariusza') }}</span>
                              </a>
                           </div>
                        </div>
                     </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                              <div class="form-group">
                                <label class="form-control-label">{{ __('Numer telefonu') }}</label>
                                <p>{{ $volunteer->user->telephone }}</p>
                              </div>
                            </div>
                            <div class="col-lg-6">
                              <div class="form-group">
                                <label class="form-control-label">{{ __('Adres email') }}</label>
                                <p>{{ $volunteer->user->email }}</p>
                              </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-lg-6">
                                <label class="form-control-label">{{ __('Data urodzenia') }}</label>
                                  <p>{{ date('d.m.Y', strtotime($volunteer->birth)) }} r.</p>
                              </div>
                            <div class="col-lg-6">
                              <div class="form-group">
                                <label class="form-control-label">{{ __('Płeć') }}</label>
                                <p>@if ($volunteer->user->gender == 'f'){{ __('Kobieta') }}@else{{ __('Mężczyzna') }}@endif</p>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-6">
                                <label class="form-control-label">{{ __('PESEL') }}</label>
                                  <p>{{ Crypt::decrypt($volunteer->pesel) }}</p>
                              </div>
                            <div class="col-lg-6">
                              <div class="form-group">
                                <label class="form-control-label">{{ __('Rozmiar koszulki') }}</label>
                                <p>{{ $volunteer->tshirt_size }}</p>
                              </div>
                            </div>
                          </div>
                        <hr class="my-2"/>
                      <h6 class="heading-small text-muted mb-4">{{ __('Adres zamieszkania') }}</h6>
                        <div class="row">
                          <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label">{{ __('Ulica i numer domu/mieszkania') }}</label>
                                <p>{{ $volunteer->street }} {{ $volunteer->house_number }}</p>
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label">{{ __('Miasto') }}</label>
                                <p>{{ $volunteer->city }}</p>
                            </div>
                          </div>
                        </div>
                        <hr class="my-2" />
                        <h6 class="heading-small text-muted mb-4">{{ __('O wolontariuszu') }}</h6>
                        <div>
                            <p>{{ $volunteer->description }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card h-100">
                    <div class="card-header pb-0 p-3">
                        <h6 class="mb-0">{{ __('Wydarzenia, w których wolontariusz uczestniczył') }}</h6>
                    </div>
                    <div class="card-body">
                        @if (count($signed) > 0)
                        <ul>
                            @foreach ($signed as $sign)
                                <li><a href="{{ route('c.form.show', [$sign->form->ivid]) }}">{{ $sign->form->form_translate->title }} - {{ $sign->position->title }}</a></li>
                            @endforeach
                        </ul>
                        @else <p class="text-center text-danger">{{ __('Wolontariusz nie uczestniczył w żadnej imprezie!') }}</p> @endif
                    </div>
                </div>
            </div>
        </div>
      @include('coordinator.include.footer')
    </div>
  </main>

  <div class="modal fade" id="setpointsmodal" tabindex="-1" role="dialog" aria-labelledby="setpointsmodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="setpointsmodalLabel">{{ __('Zmień ilość punktów') }}</h5>
        </div>
        <form action="{{ route('c.v.volunteer.points', [$volunteer->ivid]) }}" method="post" role="form" id="setpointsform">
            @csrf
            <div class="modal-body pt-1">
                <div class="form-group">
                    <label class="form-control-label" for="points">{{ __('Ustaw ilość punktów wolonariuszowi') }}</label>
                    <input class="form-control @error('points') is-invalid @enderror" type="number" name="points" id="points" value="{{ $volunteer->points }}" required>
                    @error('points')
                        <div class="text-danger w-100 d-block">
                            {{ $message }}
                        </div>
                    @enderror
                  </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('main.cancel') }}</button>
              <button type="submit" class="btn btn-primary" id="add_points_modal_button">{{ __('Zatwierdź') }}</button>

            </div>
        </form>
      </div>
    </div>
  </div>
@endsection

@push('scripts')

<script>
    $('#setpointsform').submit(function(){
        $('#add_points_modal_button').prop('disabled', true);
        $('#add_points_modal_button').prepend('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> ');
    });
</script>
    @error('points')
    <script>
        Swal.fire({
            icon: 'info',
            title: '{{ $message }}',
            showConfirmButton: false,
            timer: 3000
        })
        </script>
    @enderror
    @if (session('updated_points'))
    <script>
    Swal.fire({
        icon: 'success',
        title: 'Aktualizacja liczby punktów przebiegła pomyślnie!',
        showConfirmButton: false,
        timer: 3000
    })
    </script>
    @endif
@endpush
