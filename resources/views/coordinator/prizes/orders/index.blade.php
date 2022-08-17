
@extends('layouts.app')

@section('title') {{ __('Lista zamówień') }} @endsection

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
                        <a href="{{ route('c.prize.list') }}" class="nav-link">
                          <span class="sidenav-normal"> {{ __('Lista') }} </span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{ route('c.prize.orders') }}" class="nav-link active">
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
              <li class="breadcrumb-item text-sm text-white" aria-current="page">{{ __('Zamówienia') }}</li>
              <li class="breadcrumb-item text-sm text-white" aria-current="page">{{ __('Lista') }}</li>
            </ol>
            <h6 class="font-weight-bolder text-white mb-0">{{ __('Lista zamówień') }}</h6>
          </nav>
          @include('coordinator.include.nav')
        </div>
      </nav>

    <div class="container-fluid py-4 min-vh-100">
        <div class="d-sm-flex justify-content-between">
            <div>
               <button data-bs-toggle="modal" data-bs-target="#createordermodal" class="btn btn-icon btn-outline-white"> {{ __('Nowe zamówienie') }} </button>
            </div>
            <div class="d-flex">
               <div class="dropdown d-inline d-none">
                  <a href="javascript:;" class="btn btn-outline-white dropdown-toggle " data-bs-toggle="dropdown" id="navbarDropdownMenuLink2">
                  Filtry (Wkrótce)
                  </a>
                  <ul class="dropdown-menu dropdown-menu-lg-start px-2 py-3" aria-labelledby="navbarDropdownMenuLink2" data-popper-placement="left-start">
                     <li><a class="dropdown-item border-radius-md" href="javascript:;">Status: Odebrany</a></li>
                     <li><a class="dropdown-item border-radius-md" href="javascript:;">Status: Nieodebrany</a></li>
                     <li>
                        <hr class="horizontal dark my-2">
                     </li>
                     <li><a class="dropdown-item border-radius-md text-danger" href="javascript:;">Usuń filtry</a></li>
                  </ul>
               </div>
               <button class="btn btn-icon btn-outline-white ms-2" type="button">
               <span class="btn-inner--icon"><i class="ni ni-archive-2"></i></span>
               <span class="btn-inner--text">Eksportuj listę</span>
               </button>
            </div>
         </div>
        <div class="card mt-4">
            <div class="card-header pb-0">
                <h5 class="mb-0">Lista zamówień</h5>
            </div>
            @if ($orders != null && count($orders) > 0)
            <div class="table-responsive">
                <table class="table align-items-center mb-0" id="orders_table">
                  <thead>
                    <tr>
                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">{{ __('ID') }}</th>
                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">{{ __('Nagroda i Kombinacja') }}</th>
                      <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">{{ __('Wolontariusz') }}</th>

                      <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">{{ __('Data zamówienia') }}</th>
                      <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">{{ __('Status') }}</th>
                      <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">{{ __('Opcje') }}</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($orders as $order)
                    <tr>
                        <td>
                            <p class="font-weight-bold mb-0 px-2">#{{ $order->id }}</p>
                        </td>
                        <td>
                            <div class="d-flex flex-column justify-content-center">
                                <span class="mb-0 font-weight-bold">{{ $order->prize->prize_translate->title }}</span>
                                <span class="text-secondary text-xs mb-0">@if ($order->combination_id != null) {{ $order->combination->translate->title }} @else {{ __('Nagroda bez kombinacji') }} @endif</span>
                              </div>
                          </td>
                          <td>
                            <div class="d-flex px-2 py-1">
                              <div>
                                <img src="{{ url($order->volunteer->photo_src) }}" class="avatar avatar-sm me-3">
                              </div>
                              <div class="d-flex flex-column justify-content-center">
                                <span class="mb-0 font-weight-bold">{{ $order->volunteer->firstname." ".$order->volunteer->lastname }}</span>
                                <span class="text-secondary text-xs mb-0">{{ $order->volunteer->name }}</span>
                              </div>
                            </div>
                          </td>
                        <td>
                            <p class="font-weight-bold mb-0">{{ date('d.m.Y H:i', strtotime($order->created_at)) }}</p>
                        </td>

                        <td class="align-middle">
                            @switch($order->status->last()->condition)
                                @case(0)
                                <div class="d-flex align-items-center">
                                    <button class="btn btn-icon-only btn-rounded btn-outline-danger mb-0 me-2 btn-sm d-flex align-items-center justify-content-center"><i class="fa-solid fa-times" aria-hidden="true"></i></button>
                                    <span>{{ __('Zamówione') }}</span>
                                </div>
                                @break
                                @case(1)
                                <div class="d-flex align-items-center">
                                    <button class="btn btn-icon-only btn-rounded btn-outline-info mb-0 me-2 btn-sm d-flex align-items-center justify-content-center"><i class="fa-solid fa-exclamation" aria-hidden="true"></i></button>
                                    <span>{{ __('Do odbioru') }}</span>
                                </div>
                                @break
                                @case(2)
                                <div class="d-flex align-items-center">
                                    <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-2 btn-sm d-flex align-items-center justify-content-center"><i class="fa-solid fa-check" aria-hidden="true"></i></button>
                                    <span>{{ __('Odebrane') }}</span>
                                </div>
                                @break
                            @endswitch
                        </td>
                        <td class="align-middle text-center">
                          <a href="{{ route('c.prize.order', [$order->ivid]) }}"><i class="fa-solid fa-magnifying-glass"></i></a>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            @else
              <div class="card-body">
                <h4 class="text-center text-danger">{{ __('Brak zamówień!') }}</h4>
              </div>
            @endif

        </div>
      @include('coordinator.include.footer')
    </div>
  </main>
  <div class="modal fade" id="createordermodal" tabindex="-1" role="dialog" aria-labelledby="createordermodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="createordermodalLabel">{{ __('Utwórz nowe zamówienie') }}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('c.prize.order.create') }}" method="post" role="form" id="create-order-form">
            @csrf
            <div class="modal-body">
                <div class="form-group mb-3">
                    <label for="prizes_select">{{ __('Wybierz nagrodę') }}</label>
                    <select class="form-control" id="prizes_select" name="prizes" required>
                        @forelse ($prizes as $prize)
                            <option value="{{ $prize->ivid }}">{{ $prize->prize_translate->title }}</option>
                        @empty
                            <option selected disabled>{{ __('Brak nagród') }}</option>
                        @endforelse
                    </select>
                    @error('prizes')
                    <div class="text-danger w-100 d-block">
                        {{ $message }}
                    </div>
                  @enderror

                </div>
                <div class="form-group mb-3">
                    <label for="prize">{{ __('Wybierz kombinację') }}</label>
                    <div>
                        @foreach ($prizes as $prize)
                        <div id="div_select_combination{{ $prize->ivid }}" class="combination_select @if ($loop->iteration > 1) d-none @endif">
                            <select class="form-control" name="select_combination{{ $prize->id }}" id="select_combination{{ $prize->id }}">
                                @forelse ($prize->combinations as $combination)
                                    <option value="{{ $combination->ivid }}">{{ $combination->translate->title }}</option>
                                @empty
                                    <option selected disabled>{{ __('Nagroda bez kombinacji') }}</option>
                                @endforelse
                            </select>
                            @error("select_combination".$prize->id)
                            <div class="text-danger w-100 d-block">
                                {{ $message }}
                            </div>
                          @enderror

                        </div>
                            @endforeach
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label for="volunteers_select">{{ __('Wybierz wolontariusza') }}</label>
                    <select class="form-control" id="volunteers_select" name="volunteers" required>
                        @foreach ($volunteers as $volunteer)
                            <option value="{{ $volunteer->ivid }}">{{ $volunteer->firstname." ".$volunteer->lastname." (".$volunteer->name.")" }}</option>
                        @endforeach
                    </select>
                    @error("volunteers")
                            <div class="text-danger w-100 d-block">
                                {{ $message }}
                            </div>
                          @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="info">{{ __('Dodatkowe informacje') }}</label>
                    <input class="form-control" type="text" name="info" id="info" max="255" placeholder="{{ __('Wpisz tutaj...') }}">
                    @error("info")
                            <div class="text-danger w-100 d-block">
                                {{ $message }}
                            </div>
                          @enderror
                </div>
                <div class="input-group mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="volunteercheck" name="volunteercheck" checked>
                        <label class="custom-control-label" for="volunteercheck">{{ __('Wolontariuszowi mają zostać odjęte punkty') }}</label>
                      </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('main.cancel') }}</button>
                <button type="submit" class="btn btn-success" id="submit_order_button_form">{{ __('Utwórz') }}</button>
              </div>
        </form>
      </div>
    </div>
  </div>

@endsection

@push('scripts')
<script src="{{ url('/assets/js/datatables.js') }}"></script>
<script>
  $(document).ready( function () {
    const dataTableSearch = new simpleDatatables.DataTable("#orders_table", {
      searchable: true,
      fixedHeight: false,
      perPageSelect: false,
      language: {
            url: 'dataTables.polish.json'
        }
    });
} );
</script>
<script>
    var prizes_select = new Choices(document.getElementById("prizes_select"), {
        searchEnabled:true,
        shouldSort: false,
        placeholder: true,
        searchPlaceholderValue: "{{ __('Szukaj tutaj...') }}",
    });
</script>
<script>
    var volunteers_select = new Choices(document.getElementById("volunteers_select"), {
        searchEnabled:true,
        shouldSort: false,
        placeholder: true,
        searchPlaceholderValue: "{{ __('Szukaj tutaj...') }}",
    });
</script>
@foreach ($prizes as $prize)
<script>
    var select_combination{{ $prize->id }} = new Choices(document.getElementById("select_combination{{ $prize->id }}"), {
        searchEnabled:true,
        shouldSort: false,
        placeholder: true,
        searchPlaceholderValue: "{{ __('Szukaj tutaj...') }}",
    });
</script>

@endforeach

<script>
    $('#prizes_select').change(function() {
        var prize = $(this).val();
        $(".combination_select").addClass("d-none");
        $("#div_select_combination"+prize).removeClass("d-none");
    });
</script>

<script>
    $('#create-order-form').submit(function(){
        $('#submit_order_button_form').prop('disabled', true);
        $('#submit_order_button_form').prepend('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> ');
    });
</script>

@if (session('delete_order'))
<script>
Swal.fire({
    icon: 'success',
    title: 'Zamówienie zostało usunięte pomyślnie!',
    showConfirmButton: false,
    timer: 3000
})
</script>
@endif

@if ($errors->any())
<script>
    $('#createordermodal').modal('show');
</script>
@endif
@endpush
