
@extends('layouts.app')

@section('title') {{ __('Lista wolontariuszy') }} @endsection

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
              <li class="breadcrumb-item text-sm text-white active" aria-current="page">{{ __('Lista') }}</li>
            </ol>
            <h6 class="font-weight-bolder text-white mb-0">{{ __('Lista wolontariuszy') }}</h6>
          </nav>
          @include('coordinator.include.nav')
        </div>
      </nav>

    <div class="container-fluid py-4 min-vh-100">
        <div class="row">
            <div class="col-lg-6 col-12 d-flex ms-auto">
                <button type="button" data-bs-toggle="modal" data-bs-target="#generatemodal" class="btn btn-icon bg-gradient-dark ms-auto">
                <span class="btn-inner--icon me-2"><i class="fa-solid fa-rectangle-list"></i></span>
               <span class="btn-inner--text">{{ __('Generuj listę') }}</span>
            </button>
            <button type="button" data-bs-toggle="modal" data-bs-target="#resetpointsmodal" class="btn btn-icon btn-outline-white ms-3">
                <span class="btn-inner--icon me-2"><i class="fa-solid fa-circle-xmark"></i></span>
               <span class="btn-inner--text">{{ __('Resetuj punkty') }}</span>
            </button>
            </div>
         </div>
         <div class="card">
            <div class="card-header"><h5 class="mb-0">{{ __('Lista wolontariuszy') }}</h5></div>
            @if (!empty($volunteers))
            <div class="table-responsive">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">{{ __('Wolontariusz') }}</th>
                      <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">{{ __('Dane kontakowe') }}</th>
                      <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">{{ __('Punkty') }}</th>
                      <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">{{ __('Wiek') }}</th>
                      <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">{{ __('Status') }}</th>
                      <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">{{ __('Opcje') }}</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($volunteers as $volunteer)
                    <tr>
                        <td>
                          <div class="d-flex px-2 py-1">
                            <div>
                              <img src="{{ url($volunteer->user->photo_src) }}" class="avatar avatar-sm me-3">
                            </div>
                            <div class="d-flex flex-column justify-content-center">
                              <span class="mb-0 font-weight-bold">{{ $volunteer->user->firstname." ".$volunteer->user->lastname }}</span>
                              <span class="text-secondary text-xs mb-0">{{ $volunteer->user->name }}</span>
                            </div>
                          </div>
                        </td>
                        <td>
                          <div class="d-flex px-2 py-1">
                            <div class="d-flex flex-column justify-content-center">
                              <span class="mb-0 text-secondary font-weight-bold"><a href="tel:{{ $volunteer->user->telephone }}">{{ $volunteer->user->telephone }}</a></span>
                              <span class="mb-0 text-secondary font-weight-bold"><a href="mailto:{{ $volunteer->user->email }}">{{ $volunteer->user->email }}</a></span>
                            </div>
                          </div>
                        </td>
                        <td>
                          <p class="font-weight-bold mb-0">{{ $volunteer->points }}</p>
                        </td>
                        <td class="align-middle">
                            @if ($volunteer->birth <= date('Y-m-d', strtotime(date('Y-m-d'). ' - 18 years')))
                            @if ($volunteer->user->gender == "f")
                                    <span class="badge badge-success">{{ __('Pełnoletnia') }}</span>
                                @else
                                    <span class="badge badge-success">{{ __('Pełnoletni') }}</span>
                                @endif
                            @elseif ($volunteer->birth >= date('Y-m-d', strtotime(date('Y-m-d'). ' - 18 years')) && $volunteer->birth < date('Y-m-d', strtotime(date('Y-m-d'). ' - 16 years')))
                            <span class="badge badge-info">+16</span>
                            @else
                                @if ($volunteer->user->gender == "f")
                                    <span class="badge badge-danger">{{ __('Niepełnoletnia') }}</span>
                                @else
                                    <span class="badge badge-danger">{{ __('Niepełnoletni') }}</span>
                                @endif
                            @endif
                        </td>
                        <td class="align-middle">
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
                        <td class="align-middle text-center">
                          <a href="{{ route('c.v.volunteer', [$volunteer->ivid]) }}"><i class="fa-solid fa-magnifying-glass fa-lg"></i></a>
                          <a href="{{ route('c.v.volunteer.edit', [$volunteer->ivid]) }}" class="ms-2"><i class="fa-solid fa-user-pen fa-lg"></i></a>
                          @if ($volunteer->user->condition != 2)
                          <a href="#blockvolunteer{{ $volunteer->id }}modal" data-bs-toggle="modal" data-bs-target="#blockvolunteer{{ $volunteer->id }}modal" class="ms-2">
                            <i class="fa-solid fa-user-slash fa-lg"></i></a>
                          @else
                            <a href="#unblockvolunteer{{ $volunteer->id }}modal" data-bs-toggle="modal" data-bs-target="#unblockvolunteer{{ $volunteer->id }}modal" class="ms-2"><i class="fa-solid fa-user-check fa-lg"></i></a>
                          @endif
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              {!! $volunteers->links() !!}
            @else

            @endif
          </div>
      @include('coordinator.include.footer')
    </div>
  </main>

  <div class="modal fade" id="generatemodal" tabindex="-1" role="dialog" aria-labelledby="generatemodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="generatemodalLabel">{{ __('Generowanie listy wolontariuszy') }}</h5>
        </div>
        <form action="{{ route('c.v.exportlist') }}" method="post">
            <div class="modal-body pt-1">
              <h5 class="text-center mt-3 mb-4">{{ __('Wybierz typ pliku') }}</h5>
                  @csrf
                  <div class="row">
                    <div class="col-4">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" id="pdftype" name="filetype" value="pdf" checked>
                            <label class="custom-control-label" for="pdftype">{{ __('Plik PDF (.pdf)') }}</label>
                          </div>
                    </div>
                    <div class="col-4">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" id="exceltype" name="filetype" value="excel">
                            <label class="custom-control-label" for="exceltype">{{ __('Excel (.xlsx)') }}</label>
                          </div>
                    </div>
                    <div class="col-4">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" id="htmltype" name="filetype" value="html">
                            <label class="custom-control-label" for="htmltype">{{ __('HTML (.html)') }}</label>
                          </div>
                    </div>
                  </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('main.cancel') }}</button>
              <button type="submit" class="btn btn-primary">{{ __('Generuj') }}</button>
            </div>
            </form>
      </div>
    </div>
  </div>

  <div class="modal fade" id="resetpointsmodal" tabindex="-1" role="dialog" aria-labelledby="resetpointsmodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="resetpointsmodalLabel">{{ __('Resetowanie punktów') }}</h5>
        </div>
            <div class="modal-body pt-1">
                  <h4 class="text-center">{{ __('Czy jesteś pewien, że chcesz zresetować wszystkim wolontariuszom punkty?') }}</h4>
                  <h5 class="text-center text-danger">{{ __('Tego procesu nie da się cofnąć!') }}</h5>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('main.cancel') }}</button>
              <form action="{{ route('c.v.exportlist') }}" method="post">
                @csrf
              <button type="submit" class="btn btn-primary">{{ __('Zatwierdź') }}</button>
            </form>
            </div>
      </div>
    </div>
  </div>

@forelse ($volunteers as $volunteer)
    @if ($volunteer->user->condition != 2)
    <div class="modal fade" id="blockvolunteer{{ $volunteer->id }}modal" tabindex="-1" role="dialog" aria-labelledby="blockvolunteer{{ $volunteer->id }}modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="blockvolunteer{{ $volunteer->id }}modalLabel">{{ __('Blokowanie wolontariusza') }}</h5>
            </div>
                <div class="modal-body pt-1">
                    <h4 class="text-center w-100">{{ __('Czy jesteś pewien, że chcesz zablokować wolontariusza') }} "{{ $volunteer->user->firstname." ".$volunteer->user->lastname." (".$volunteer->user->name.")" }}"?</h4>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('main.cancel') }}</button>
                  <form action="{{ route('c.v.volunteer.block') }}" method="post">
                    @csrf
                    <input type="hidden" name="ivid" value="{{ $volunteer->user->ivid }}">
                  <button type="submit" class="btn btn-primary">{{ __('Zatwierdź') }}</button>
                </form>
                </div>
          </div>
        </div>
      </div>
    @else
    <div class="modal fade" id="unblockvolunteer{{ $volunteer->id }}modal" tabindex="-1" role="dialog" aria-labelledby="unblockvolunteer{{ $volunteer->id }}modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="unblockvolunteer{{ $volunteer->id }}modalLabel">{{ __('Odblokowanie wolontariusza') }}</h5>
            </div>
            <form action="{{ route('c.v.volunteer.unblock') }}" method="post">
                @csrf
                <input type="hidden" name="ivid" value="{{ $volunteer->user->ivid }}">
                <div class="modal-body pt-1">
                    <h4 class="text-center w-100">{{ __('Wybierz status wolontariusza') }}</h4>
                    <div class="row">
                        @if ($volunteer->user->gender == 'f')
                            <div class="col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="condition" id="active{{ $volunteer->id }}radio1" value="1" required>
                                    <label class="custom-control-label" for="active{{ $volunteer->id }}radio1">{{ __('AktywnA') }}</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="condition" id="active{{ $volunteer->id }}radio2" value="0" required>
                                    <label class="custom-control-label" for="active{{ $volunteer->id }}radio2">{{ __('NieaktywnA') }}</label>
                                </div>
                            </div>
                        @else
                            <div class="col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="condition" id="active{{ $volunteer->id }}radio1" value="1" required>
                                    <label class="custom-control-label" for="active{{ $volunteer->id }}radio1">{{ __('Aktywny') }}</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="condition" id="active{{ $volunteer->id }}radio2" value="0" required>
                                    <label class="custom-control-label" for="active{{ $volunteer->id }}radio2">{{ __('Nieaktywny') }}</label>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('main.cancel') }}</button>

                  <button type="submit" class="btn btn-primary">{{ __('Zatwierdź') }}</button>
                </div>
            </form>
          </div>
        </div>
      </div>
    @endif

@empty

@endforelse
@endsection

@push('scripts')
@if (session('block_volunteer'))
<script>
Swal.fire({
    icon: 'success',
    title: 'Wolontariusz został zablokowany pomyślnie!',
    showConfirmButton: false,
    timer: 3000
})
</script>
@endif

@if (session('unblock_volunteer'))
<script>
Swal.fire({
    icon: 'success',
    title: 'Wolontariusz został odblokowany pomyślnie!',
    showConfirmButton: false,
    timer: 3000
})
</script>
@endif

@error('ivid')
<script>
    Swal.fire({
        icon: 'error',
        title: '{{ $message }}',
        showConfirmButton: false,
        timer: 3000
    })
    </script>
@enderror

@error('condition')
<script>
    Swal.fire({
        icon: 'error',
        title: '{{ $message }}',
        showConfirmButton: false,
        timer: 3000
    })
    </script>
@enderror
@endpush
