
@extends('layouts.app')

@section('title') {{ __('Zamówienie') }} @endsection
@section('body') bg-gray-100 @endsection

@section('content')
<div class="min-height-300 bg-primary position-absolute w-100" id="background-color-div"></div>
  <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
    <div class="sidenav-header" style="min-height: 170px;">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      @include('volunteer.include.logo')
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse w-auto h-auto" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        @include('volunteer.include.dashboard')
        @include('volunteer.include.chat')
        @include('volunteer.include.posts')
        @include('volunteer.include.forms')
        <li class="nav-item ps-1 pt-1">
            <a data-bs-toggle="collapse" href="#prizes" class="nav-link active py-2" aria-controls="prizes" role="button" aria-expanded="true">
                <i class="fa-solid fa-award text-primary text-sm opacity-10"></i>
                <span class="nav-link-text ms-1">{{ __('volunteer.sidebar.prizes.prizes') }}</span>
            </a>
            <div class="collapse show" id="prizes">
                <ul class="nav ms-4">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('v.prize.list') }}">
                            <span class="sidenav-normal"> {{ __('volunteer.sidebar.prizes.list') }} </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('v.prize.orders') }}">
                          <span class="sidenav-normal"> {{ __('volunteer.sidebar.prizes.orders') }} </span>
                        </a>
                      </li>
                </ul>
            </div>
        </li>

        @include('volunteer.include.other')

      </ul>
    </div>
  </aside>
  <main class="main-content position-relative border-radius-lg ">
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
        <div class="container-fluid py-1 px-3">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
              <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="{{ route('v.dashboard') }}"><i class="fa-solid fa-house"></i></a></li>
              <li class="breadcrumb-item text-sm text-white" aria-current="page">{{ __('volunteer.prizes.list.title') }}</li>
              <li class="breadcrumb-item text-sm text-white active" aria-current="page">{{ __('Zamówienie') }}</li>
            </ol>
            <h6 class="font-weight-bolder text-white mb-0">{{ __('Zamówienie') }} #{{ $order->id }}</h6>
          </nav>
          @include('volunteer.include.nav')
        </div>
      </nav>
    <div class="container-fluid py-4 min-vh-100">
        <div class="row">
            <div class="col-lg-6 col-12 d-flex ms-auto">
               <a href="{{ route('v.prize.orders') }}" class="btn btn-icon bg-gradient-dark ms-auto">
                <span class="btn-inner--icon me-2"><i class="fa-solid fa-arrow-left"></i></span>
               <span class="btn-inner--text">{{ __('Powrót') }}</span>
               </a>
            </div>
         </div>
         <div class="row mb-lg-5">
            <div class="col-lg-8 mx-auto">
                <div class="card my-5">
                    <div class="card-header p-3 pb-0">
                       <div class="d-flex justify-content-between align-items-center">
                          <div>
                             <h6>{{ __('Szczegóły znamówienia') }}</h6>
                             <p class="text-sm mb-0">
                                {{ __('Zamówienie nr') }} <b>{{ $order->id }}</b> {{ __('z dnia') }} <b>{{ date('d.m.Y', strtotime($order->created_at)) }}</b>
                             </p>
                             <p class="text-sm">
                                {{ __('Unikalny numer:') }} <b>{{ $order->ivid }}</b>
                             </p>
                          </div>
                          <a href="{{ route('v.prize.order.confirmation', [$order->ivid]) }}" class="btn btn-secondary ms-auto mb-0">{{ __('Potwierdzenie') }}</a>
                       </div>
                    </div>
                    <div class="card-body p-3 pt-0">
                       <hr class="horizontal dark mt-0 mb-4">
                       <div class="row">
                          <div class="col-lg-12 col-md-12 col-12"> <!-- col-lg-6 col-md-6 col-12 -->
                             <div class="d-flex">
                                <div>
                                   <img src="{{ $order->prize->icon_src }}" class="avatar avatar-xxl me-3" alt="product image">
                                </div>
                                <div>
                                   <h6 class="text-lg mb-0 mt-2">{{ $order->prize->prize_translate->title }}</h6>
                                   <p class="text-sm mb-3">@if($order->prize->with_combinations == 1) {{ $order->combination->translate->title }} @else {{ __('Nagroda nie posiada kombinacji') }} @endif</p>
                                   <span class="badge badge-sm bg-gradient-success">@switch($order->status->last()->condition)
                                    @case(0) {{ __('Zamówione') }} @break
                                    @case(1) {{ __('Do odbioru') }} @break
                                    @case(2) {{ __('Odebrane') }} @break
                                @endswitch</span>
                                </div>
                             </div>
                          </div>
                          <div class="col-lg-6 col-md-6 col-12 my-auto text-end d-none">
                          </div>
                       </div>
                       <hr class="horizontal dark mt-4 mb-4">
                       <div class="row">
                          <div class="col-lg-3 col-md-6 col-12">
                             <h6 class="mb-3">{{ __('Śledź zamówienie') }}</h6>
                             <div class="timeline timeline-one-side">
                                @php
                                    $m_en = array("Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec");

                                    $m_pol = array("Sty", "Lut", "Mar", "Kwi", "Maj", "Cze", "Lip", "Sie", "Wrz", "Paź", "Lis", "Gru");
                                @endphp
                                @foreach ($order->status as $status)
                                    @switch($status->condition)
                                        @case(0)
                                            <div class="timeline-block mb-3">
                                                <span class="timeline-step">
                                                    <i class="fa-solid fa-cart-shopping text-secondary"></i>
                                                </span>
                                                <div class="timeline-content">
                                                <h6 class="text-dark text-sm font-weight-bold mb-0">{{ __('Złożono zamówienie') }}</h6>
                                                <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">
                                                    {{ date('d', strtotime($status->created_at))." ".str_replace($m_en, $m_pol, date('M', strtotime($status->created_at)))." ".date('H:i', strtotime($status->created_at)) }}</p>
                                                </div>
                                            </div>
                                        @break
                                        @case(1)
                                            <div class="timeline-block mb-3">
                                                <span class="timeline-step">
                                                    <i class="fa-solid fa-box text-secondary"></i>
                                                </span>
                                                <div class="timeline-content">
                                                <h6 class="text-dark text-sm font-weight-bold mb-0">{{ __('Gotowe do odbioru') }}</h6>
                                                <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">{{ date('d', strtotime($status->created_at))." ".str_replace($m_en, $m_pol, date('M', strtotime($status->created_at)))." ".date('H:i', strtotime($status->created_at)) }}</p>
                                                </div>
                                            </div>
                                        @break
                                        @case(2)
                                            <div class="timeline-block mb-3">
                                                <span class="timeline-step">
                                                <i class="fa-solid fa-check text-success"></i>
                                                </span>
                                                <div class="timeline-content">
                                                <h6 class="text-dark text-sm font-weight-bold mb-0">{{ __('Odebrane') }}</h6>
                                                <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">{{ date('d', strtotime($status->created_at))." ".str_replace($m_en, $m_pol, date('M', strtotime($status->created_at)))." ".date('H:i', strtotime($status->created_at)) }}</p>
                                                </div>
                                            </div>
                                        @break
                                    @endswitch
                                @endforeach
                             </div>
                          </div>
                          <div class="col-lg-5 col-md-6 col-12">
                             <h6 class="mb-3 mt-4">{{ __('Informacje o zamawiającym') }}</h6>
                             <ul class="list-group">
                                <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                                   <div class="d-flex flex-column">
                                      <h6 class="mb-3 text-sm">{{ $order->volunteer->firstname." ".$order->volunteer->lastname }}</h6>
                                      <span class="mb-2 text-xs">{{ __('Login:') }} <span class="text-dark ms-2 font-weight-bold">{{ $order->volunteer->name }}</span></span>
                                      <span class="mb-2 text-xs">{{ __('Numer telefonu:') }} <span class="text-dark font-weight-bold ms-2"><a href="tel:{{ $order->volunteer->telephone }}">{{ $order->volunteer->telephone }}</a></span></span>
                                      <span class="text-xs">{{ __('Adres email:') }} <span class="text-dark ms-2 font-weight-bold"><a href="emailto:{{ $order->volunteer->email }}">{{ $order->volunteer->email }}</a></span></span>

                                   </div>
                                </li>
                             </ul>
                          </div>
                          <div class="col-lg-3 col-12 ms-auto">
                             <h6 class="mb-3">{{ __('Podsumowanie') }}</h6>
                             <div class="d-flex justify-content-between">
                                <span class="mb-2 text-sm">
                                {{ __('Koszt punktowy') }}
                                </span>
                                <span class="text-dark font-weight-bold ms-2">{{ $order->prize_points }}</span>
                             </div>
                             <div class="d-flex justify-content-between">
                                <span class="text-sm">
                                {{ __('Punkty przed zamówieniem') }}
                                </span>
                                <span class="text-dark ms-2 font-weight-bold">{{ $order->volunteer_points }}</span>
                             </div>
                             <div class="d-flex justify-content-between mt-4">
                                <span class="mb-2 text-lg">
                                {{ __('Punkty po zamówieniu') }}
                                </span>
                                <span class="text-dark text-lg ms-2 font-weight-bold">{{ $order->volunteer_points-$order->prize_points }}</span>
                             </div>
                          </div>
                       </div>
                    </div>
                 </div>
        </div>
        </div>


      @include('volunteer.include.footer')
    </div>
  </main>
@endsection

@push('scripts')
@if (session('order'))
<script>
Swal.fire({
    icon: 'success',
    title: 'Zamówienie zostało złożone pomyślnie!',
    showConfirmButton: false,
    timer: 3000
})
</script>
@endif
@endpush
