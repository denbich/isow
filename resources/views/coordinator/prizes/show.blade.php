
@extends('layouts.app')

@section('title') {{ __('Nagroda') }} @endsection

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
                        <a href="{{ route('c.prize.list') }}" class="nav-link active">
                          <span class="sidenav-normal"> {{ __('Lista') }} </span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{ route('c.prize.orders') }}" class="nav-link">
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
              <li class="breadcrumb-item text-sm text-white active" aria-current="page">{{ __('Nagroda') }}</li>
            </ol>
            <h6 class="font-weight-bolder text-white mb-0">{{ $prize->prize_translate->title }}</h6>
          </nav>
          @include('coordinator.include.nav')
        </div>
      </nav>

    <div class="container-fluid py-4 min-vh-100">
        <div class="row">
            <div class="col-lg-6 col-12 d-flex ms-auto">
               <a href="{{ route('c.prize.list') }}" class="btn btn-icon bg-gradient-dark ms-auto">
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
                        <a href="{{ route('c.prize.edit', [$prize->ivid]) }}" class="btn btn-success w-100 my-2 text-white">{{ __('Edytuj nagrodę') }}</a>
                        <button class="btn btn-danger w-100 my-2" data-bs-toggle="modal" data-bs-target="#deletemodal">{{ __('Usuń nagrodę') }}</button>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 order-lg-1 my-2">
                <div class="card h-100">
                    <div class="card-header">
                        <h5 class="mb-0">{{ __('Nagroda') }}</h5>
                  </div>
                  <div class="card-body">
                    <div class="row">
                        <div class="col-lg-5 ">
                            <img src="{{ $prize->icon_src }}" alt="" class="w-100">
                        </div>
                        <div class="col-lg-7">
                                <h6>Ilość dostępnych sztuk: <b>@if ($prize->with_combinations == 0)
                                    {{ $prize->quantity }}
                                @else
                                @php $c = 0; @endphp
                                @foreach($prize->combinations as $combination) @php $c = $c + $combination->quantity; @endphp @endforeach
                                {{ $c }}
                                @endif</b></h6>
                                <h6>Wartość punktowa: <b>{{ $prize->points }}</b></h6>
                                <h6>Ilość wolontariuszy, którzy wybrali tę nagrodę: <b>{{ count($prize->orders) }}</b></h6>
                                <h6>Sponsor nagrody: <a href="{{ route('c.sponsor.show', [$prize->sponsor->ivid]) }}">{{ $prize->sponsor->name }}</a></h6>
                                <h6><i>Kategoria: <a href="{{ route('c.prizecategory.show', [$prize->category->ivid]) }}">{{ $prize->category->prize_category_translate->name }}</a></i></h6>
                                @if ($prize->with_combinations == 1)
                                <div class="">
                                    <h4>Kombinacje</h4>
                                        <div class="table-responsive">
                                            <table class="table align-items-center">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th scope="col" class="sort" data-sort="name">Nazwa</th>
                                                        <th scope="col" class="sort" data-sort="budget">Dostępna ilość</th>
                                                        <th scope="col" class="sort" data-sort="status">Ilość zamówień</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="list">
                                                    @foreach ($prize->combinations as $comb)
                                                    <tr>
                                                        <th>{{ $comb->translate->title }}</th>
                                                        <th>{{ $comb->quantity }}</th>
                                                        <th>{{ count($comb->orders) }}</th>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                </div>
                                @endif
                        </div>
                    </div>
                    <h4>Opis</h4>
                    {!! $prize->prize_translate->description !!}
                </div>
            </div>
        </div>
        </div>
        <div class="card mt-4">
            <div class="card-header">
                <h5 class="mb-0">Lista zamówień</h5>
            </div>
            @if ($prize->orders != null && count($prize->orders) > 0)
            <div class="table-responsive">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Wolontariusz</th>
                      <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Kombinacja</th>
                      <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Data zamówienia</th>
                      <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">status</th>
                      <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Opcje</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($prize->orders as $order)
                    <tr>
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
                            <p class="font-weight-bold mb-0">@if ($order->combination_id != null) {{ $order->combination->translate->title }} @endif</p>
                          </td>
                        <td>
                            <p class="font-weight-bold mb-0">{{ date('d.m.Y H:i', strtotime($order->created_at)) }}</p>
                        </td>

                        <td class="align-middle">
                            @if ($order->condition == 0)
                            <span class="badge badge-dot me-4 h4">
                                <i class="bg-danger"></i>
                                <span class="text-dark text-xs">{{ __('Nieodebrane') }}</span>
                              </span>
                            @else
                            <span class="badge badge-dot me-4 h4">
                                <i class="bg-success"></i>
                                <span class="text-dark text-xs">{{ __('Odebrane') }}</span>
                              </span>
                            @endif
                        </td>
                        <td class="align-middle text-center">
                          <a href="{{ route('c.prize.order', [$order->ivid]) }}" class="btn btn-primary btn-sm" data-toggle="tooltip" data-original-title="Edit user">{{ __('Zarządzaj zamówieniem') }}</a>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            @else
              <div class="card-body">
                <h4 class="text-center text-danger">{{ __('Żaden wolontariusz nie zamówił tej nagrody!') }}</h4>
              </div>
            @endif

        </div>
      @include('coordinator.include.footer')
    </div>
  </main>

  <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="ModalLabel">{{ __('Usuń nagrodę') }}</h5>
        </div>
        <div class="modal-body">
          <h4 class="w-100 text-wrap text-center">{{ __('Czy jesteś pewnien, że chcesz usunąć nagrodę') }} "{{ $prize->prize_translate->title  }}"?</h4>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('main.cancel') }}</button>
          <form action="{{ route('c.prize.destroy', [$prize->ivid]) }}" method="post">
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
@if (session('create_prize'))
<script>
Swal.fire({
    icon: 'success',
    title: 'Nagroda została utworzona pomyślnie!',
    showConfirmButton: false,
    timer: 3000
})
</script>
@endif
@endpush
