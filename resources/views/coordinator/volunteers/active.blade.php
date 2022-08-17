
@extends('layouts.app')

@section('title') {{ __('Lista wolontariuszy do aktywacji') }} @endsection

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
                        <a href="{{ route('c.v.list') }}" class="nav-link">
                          <span class="sidenav-normal"> {{ __('Lista') }} </span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{ route('c.v.active') }}" class="nav-link active">
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
              <li class="breadcrumb-item text-sm text-white active" aria-current="page">{{ __('Aktywacja') }}</li>
            </ol>
            <h6 class="font-weight-bolder text-white mb-0">{{ __('Lista wolontariuszy do aktywacji') }}</h6>
          </nav>
          @include('coordinator.include.nav')
        </div>
      </nav>

    <div class="container-fluid py-4 min-vh-100">
         <div class="card mt-5">
            <div class="card-header"><h5 class="mb-0">{{ __('Lista wolontariuszy') }}</h5></div>
            @if (!empty($volunteers) && count($volunteers) > 0)
            <div class="table-responsive">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">{{ __('Wolontariusz') }}</th>
                      <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">{{ __('Dane kontakowe') }}</th>
                      <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">{{ __('Wiek') }}</th>
                      <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">{{ __('Zgoda') }}</th>
                      <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">{{ __('Opcje') }}</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($volunteers as $volunteer)
                    <tr>
                        <td>
                            <a href="{{ route('c.v.volunteer', [$volunteer->volunteer->ivid]) }}">
                          <div class="d-flex px-2 py-1">
                            <div>
                              <img src="{{ url($volunteer->photo_src) }}" class="avatar avatar-sm me-3">
                            </div>
                            <div class="d-flex flex-column justify-content-center">
                              <span class="mb-0 font-weight-bold">{{ $volunteer->firstname." ".$volunteer->lastname }}</span>
                              <span class="text-secondary text-xs mb-0">{{ $volunteer->name }}</span>
                            </div>
                          </div>
                        </a>
                        </td>
                        <td>
                          <div class="d-flex px-2 py-1">
                            <div class="d-flex flex-column justify-content-center">
                              <span class="mb-0 text-secondary font-weight-bold"><a href="tel:{{ $volunteer->telephone }}">{{ $volunteer->telephone }}</a></span>
                              <span class="mb-0 text-secondary font-weight-bold"><a href="mailto:{{ $volunteer->email }}">{{ $volunteer->email }}</a></span>
                            </div>
                          </div>
                        </td>
                        <td class="align-middle">
                            @if ($volunteer->volunteer->birth <= date('Y-m-d', strtotime(date('Y-m-d'). ' - 18 years')))
                            @if ($volunteer->gender == "f")
                                    <span class="badge badge-danger">{{ __('Pełnoletna') }}</span>
                                @else
                                    <span class="badge badge-danger">{{ __('Pełnoletni') }}</span>
                                @endif
                            @elseif ($volunteer->volunteer->birth >= date('Y-m-d', strtotime(date('Y-m-d'). ' - 18 years')) && $volunteer->volunteer->birth < date('Y-m-d', strtotime(date('Y-m-d'). ' - 16 years')))
                            <span class="badge badge-info">+16</span>
                            @else
                                @if ($volunteer->gender == "f")
                                    <span class="badge badge-danger">{{ __('Niepełnoletna') }}</span>
                                @else
                                    <span class="badge badge-danger">{{ __('Niepełnoletni') }}</span>
                                @endif
                            @endif
                        </td>
                        <td class="align-middle"> <a href="{{ route('c.v.agreement', [$volunteer->ivid]) }}" class="btn btn-primary">{{ __('Zobacz zgodę') }}</a></td>
                        <td class="align-middle text-center">
                            <a href="#activemodal{{ $volunteer->id }}" data-bs-toggle="modal" data-bs-target="#activemodal{{ $volunteer->id }}" class="ms-2 text-success">
                                <i class="fa-solid fa-check fa-lg"></i>
                            </a>

                            <a href="#dactivemodal{{ $volunteer->id }}" data-bs-toggle="modal" data-bs-target="#dactivemodal{{ $volunteer->id }}" class="ms-2 text-danger">
                                <i class="fa-solid fa-xmark fa-lg"></i>
                            </a>

                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            @else
              <div class="card-body">
                <h4 class="text-center text-danger">{{ __('Brak wolontariuszy do aktywacji') }}</h4>
              </div>
            @endif
          </div>
      @include('coordinator.include.footer')
    </div>
  </main>

  @forelse ($volunteers as $volunteer)
  <div class="modal fade" id="activemodal{{ $volunteer->id }}" tabindex="-1" role="dialog" aria-labelledby="activeModalLabel{{ $volunteer->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="activeModalLabel{{ $volunteer->id }}">{{ __('Aktywuj wolontariusza') }}</h5>
        </div>
        <form action="{{ route('c.v.active') }}" method="post" role="form" id="active_form{{ $volunteer->id }}">
            @csrf
            <input type="hidden" name="id" value="{{ $volunteer->ivid }}">
            <div class="modal-body">
                <h4>{{ __('Uzupełnij datę wygaśnięcia zgody:') }}</h4>
                <div class="form-group">
                    <label for="date{{ $volunteer->id }}">{{ __('Data wygaśnięcia zgody') }}</label>
                    <input type="date" name="date" id="date{{ $volunteer->id }}" class="form-control" required>
                  </div>
                  <a href="{{ route('c.v.agreement', [$volunteer->ivid]) }}" target="_blank" rel="noopener noreferrer" class="btn btn-primary w-100">{{ __('Zobacz zgodę') }}</a>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('main.cancel') }}</button>
                <button type="submit" class="btn btn-primary" id="button_active_button{{ $volunteer->id }}">{{ __('Zatwierdź') }}</button>
              </div>
        </form>
      </div>
    </div>
  </div>

  <div class="modal fade" id="dactivemodal{{ $volunteer->id }}" tabindex="-1" role="dialog" aria-labelledby="dactiveModalLabel{{ $volunteer->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="dactiveModalLabel{{ $volunteer->id }}">{{ __('Odrzuć wolontariusza') }}</h5>
        </div>
        <form action="{{ route('c.v.dactive') }}" method="post" role="form" id="deactive_form{{ $volunteer->id }}">
            @csrf
            <input type="hidden" name="id" value="{{ $volunteer->ivid }}">
            <div class="modal-body">
                <h4>{{ __('Wybierz powód odrzucenia:') }}</h4>
                <div class="form-group">
                        <select name="reason" id="reason{{ $volunteer->id }}" class="form-control">
                            <option value="1">{{ __('Brak przedziału od kiedy można wykonywać wolontariat') }}</option>
                            <option value="2">{{ __('Podany przedział wykonywania wolontariatu jest nieprawidłowy') }}</option>
                            <option value="3">{{ __('Wysłany plik to nie jest wypełniona zgoda') }}</option>
                            <option value="4">{{ __('Zgoda jest niewyraźna') }}</option>
                            <option value="5">{{ __('Brak podpisu rodzica/opiekuna prawnego') }}</option>
                            <option value="6">{{ __('Źle wypełniona zgoda') }}</option>
                        </select>
                  </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('main.cancel') }}</button>
                <button type="submit" class="btn btn-primary" id="button_deactive_button{{ $volunteer->id }}">{{ __('Zatwierdź') }}</button>
              </div>
        </form>
      </div>
    </div>
  </div>

  @empty

  @endforelse
@endsection

@push('scripts')

@forelse ($volunteers as $volunteer)
<script>
    const select{{ $volunteer->id }} = new Choices(document.getElementById("reason{{ $volunteer->id }}"), {
        searchEnabled:false,
        shouldSort: false,
        placeholder: true,
    });
</script>

<script>
    $('#active_form{{ $volunteer->id }}').submit(function(){
        $('#button_active_button{{ $volunteer->id }}').prop('disabled', true);
        $('#button_active_button{{ $volunteer->id }}').prepend('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> ');
    });
</script>

<script>
    $('#deactive_form{{ $volunteer->id }}').submit(function(){
        $('#button_deactive_button{{ $volunteer->id }}').prop('disabled', true);
        $('#button_deactive_button{{ $volunteer->id }}').prepend('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> ');
    });
</script>
@empty

@endforelse

@if (session('active_volunteer'))
<script>
Swal.fire({
    icon: 'success',
    title: 'Wolontariusz został aktywowany pomyślnie!',
    showConfirmButton: false,
    timer: 3000
})
</script>
@endif

@if (session('deactive_volunteer'))
<script>
Swal.fire({
    icon: 'success',
    title: 'Wolontariusz został dezaktywowany pomyślnie!',
    showConfirmButton: false,
    timer: 3000
})
</script>
@endif

@endpush
