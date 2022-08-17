
@extends('layouts.app')

@section('title') {{ __('volunteer.prizes.order.title') }} @endsection
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
              <li class="breadcrumb-item text-sm text-white" aria-current="page">{{ __('volunteer.sidebar.prizes.prizes') }}</li>
              <li class="breadcrumb-item text-sm text-white active" aria-current="page">{{ __('volunteer.sidebar.prizes.orders') }}</li>
            </ol>
            <h6 class="font-weight-bolder text-white mb-0">{{ __('volunteer.prizes.order.title') }}</h6>
          </nav>
          @include('volunteer.include.nav')
        </div>
      </nav>
    <div class="container-fluid py-4 min-vh-100">
        <div class="row">
            <div class="col-lg-6 col-12 d-flex ms-auto">
               <a href="{{ route('v.prize.list') }}" class="btn btn-icon bg-gradient-dark ms-auto">
                <span class="btn-inner--icon me-2"><i class="fa-solid fa-arrow-left"></i></span>
               <span class="btn-inner--text">{{ __('volunteer.prizes.list.title') }}</span>
               </a>
            </div>
         </div>
        <div class="row">
            <div class="card">
                <div class="table-responsive">
                    <table class="table align-items-center mb-0">
                      <thead>
                        <tr>
                          <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">{{ __('ID') }}</th>
                          <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">{{ __('Nagroda i Kombinacja') }}</th>
                          <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">{{ __('Data zamówienia') }}</th>
                          <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">{{ __('Status') }}</th>
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
                                <div class="d-flex px-2 py-1">
                                    <div>
                                      <img src="{{ $order->prize->icon_src }}" class="avatar avatar-sm me-3">
                                    </div>
                                    <div class="d-flex flex-column justify-content-center">
                                        <span class="mb-0 font-weight-bold">{{ $order->prize->prize_translate->title }}</span>
                                        <span class="text-secondary text-xs mb-0">@if ($order->combination_id != null) {{ $order->combination->translate->title }} @else {{ __('Nagroda bez kombinacji') }} @endif</span>
                                    </div>
                                  </div>
                            </td>
                            <td class="align-middle text-center">
                                <span class="text-secondary font-weight-bold">{{ date('d.m.Y H:i', strtotime($order->created_at)) }}</span>
                              </td>
                            <td class="align-middle text-center text-sm">
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
                              <a href="{{ route('v.prize.order', [$order->ivid]) }}" class="font-weight-bold" data-toggle="tooltip" data-original-title="Edit user"><i class="fa-solid fa-magnifying-glass fa-xl"></i></a>
                              <a href="{{ route('v.prize.order.confirmation', [$order->ivid]) }}" class="font-weight-bold ms-2" data-toggle="tooltip" data-original-title="Drukuj"><i class="fa-solid fa-print fa-xl"></i></a>
                            </td>
                          </tr>
                        @endforeach
                    </tbody>

                    </table>
                </div>

                <div class="col-12 mb-8 d-none">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h4 class="text-center text-danger w-100">{{ __('volunteer.prizes.list.err') }}</h4>
                    </div>
                </div>

            </div>
        </div>


      @include('volunteer.include.footer')
    </div>
  </main>
@endsection
