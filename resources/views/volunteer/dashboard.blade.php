
@extends('layouts.app')

@section('title')
{{ __('volunteer.dashboard.title') }}
@endsection

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
        <li class="nav-item ps-1 pt-1">
          <a class="nav-link active" href="{{ route('v.dashboard') }}">
                <i class="fa-solid fa-tv text-primary text-sm opacity-10"></i>
            <span class="nav-link-text ms-1">{{ __('volunteer.sidebar.dashboard') }}</span>
          </a>
        </li>
        @include('volunteer.include.chat')
        @include('volunteer.include.posts')
        @include('volunteer.include.forms')
        @include('volunteer.include.prizes')

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
              <li class="breadcrumb-item text-sm text-white active" aria-current="page">{{ __('volunteer.dashboard.title') }}</li>
            </ol>
            <h6 class="font-weight-bolder text-white mb-0">{{ __('volunteer.dashboard.title') }}</h6>
          </nav>
          @include('volunteer.include.nav')
        </div>
      </nav>

    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">{{ __('volunteer.dashboard.id') }}</p>
                    <h5 class="font-weight-bolder">{{ $volunteer->id }}</h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-primary shadow-primary text-center rounded-circle">
                    <i class="ni ni-circle-08 text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">{{ __('volunteer.dashboard.points') }}</p>
                    <h5 class="font-weight-bolder">{{ $volunteer->points }}</h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-danger shadow-danger text-center rounded-circle">
                    <i class="fa-solid fa-star text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">{{ __('volunteer.dashboard.c-forms') }}</p>
                    <h5 class="font-weight-bolder">{{ $count['forms'] }}</h5>

                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-success shadow-success text-center rounded-circle">
                    <i class="fa-solid fa-clipboard-list text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">{{ __('volunteer.dashboard.agreement') }}</p>
                    <h5 class="font-weight-bolder">{{ show_agreement_date() }}</h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-warning shadow-warning text-center rounded-circle">
                    <i class="fa-solid fa-clock text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-4">
        <div class="col-lg-7 mb-lg-0 mb-4">
          <div class="card z-index-2 h-100">
            <div class="card-header pb-0 pt-3 bg-transparent">
              <h6 class="text-capitalize">{{ __('volunteer.dashboard.posts.title') }}</h6>
            </div>
            <div class="card-body p-3">
              <div class="chart d-flex" style="min-height: 300px">
                @if (count($posts) > 0)
                        <div class="table-responsive w-100">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light text-center">
                                    <tr>
                                        <th scope="col">{{ __('volunteer.dashboard.posts.post-title') }}</th>
                                        <th scope="col">{{ __('volunteer.dashboard.posts.date') }}</th>
                                        <th scope="col">{{ __('volunteer.dashboard.posts.options') }}</th>
                                    </tr>
                                </thead>
                                <tbody class="list">
                                        @foreach ($posts as $post)
                                        <tr>
                                            <td class="text-center">{{ $post->post_translate->title }}</td>
                                            <td class="text-center">{{ $post->created_at }}</td>
                                            <td class="text-center">
                                                <h4>
                                                    <a class="mx-1" href="{{ route('v.post', [$post->ivid]) }} ">
                                                        <i class="fas fa-search"></i>
                                                    </a>
                                                </h4>
                                            </td>
                                        </tr>
                                        @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <h3 class="text-danger m-auto ">{{ __('volunteer.dashboard.posts.err') }}</h3>
                    @endif
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-5">
            <div class="card h-100">
                <div class="card-header pb-0 p-3">
                  <div class="d-flex justify-content-between">
                    <h6 class="mb-2">{{ __('volunteer.dashboard.forms.title') }}</h6>
                  </div>
                </div>
                <div class="card-body pt-0">
                    <ul class="list-group list-group-flush list">
                        @forelse ($forms as $form)
                        @php $p_count = 0; foreach($form->form_positions as $position) { $p_count = $p_count + $position->max_volunteer; } $a = count($form->signedform)/$p_count; $b = $a * 100; $c = ceil($b); if ($c <= 25) { $class_bar = "bg-danger"; } else if ($c <= 55) { $class_bar = "bg-warning"; } else if ($c <= 99) { $class_bar = "bg-info"; } else if ($c >= 100) { $class_bar = "bg-success"; } @endphp
                        <li class="list-group-item px-0">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <a href="{{ route('v.form.show', [$form->ivid]) }}" class="avatar rounded-circle">
                                        <i class="fa-solid fa-{{ $form->form_category->icon }} fa-2x text-{{ $form->form_category->color }}"></i>
                                    </a>
                                </div>
                                <div class="col">
                                    <div class="d-flex align-items-center mb-2">
                                        <span class="text-sm font-weight-bold text-capitalize me-2"><a href="{{ route('v.form.show', [$form->ivid]) }}"><h6> {{ $form->form_translate->title }}</h6></a></span>
                                        <span class="ms-auto text-sm font-weight-bold">{{ $c }}%</span>
                                        </div>

                                    <div class="progress progress-xs mb-0">
                                        <div class="progress-bar {{ $class_bar }}"  role="progressbar" aria-valuenow="{{ $c }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $c }}%;"></div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @empty
                        <h4 class="text-danger m-auto ">{{ __('volunteer.dashboard.events.err') }}</h4>

                        @endforelse
                    </ul>
                </div>
                <div class="card-body d-none">
                    @forelse ($forms as $form)
                    @if (date('Y-m-d H:i:s') > date('Y-m-d H:i:s', strtotime($form->calendar->end . " + 2 days")))
                    <div class="progress-wrapper pt-0">
                        <div class="progress-info">
                        <a href="{{ route('v.form.show', [$form->ivid]) }}"><span class="badge badge-lg badge-pill badge-primary mb-1">{{ $form->form_translate->title }}</span></a>
                        @php
                            $p_count = 0;
                            foreach($form->formposition as $position)
                            {
                                $p_count = $p_count + $position->max_volunteer;
                            }
                        $a = count($form->signedform)/$p_count;
                        $b = $a * 100;
                        $c = ceil($b);

                        if ($c <= 25)
                        {
                            $class_bar = "bg-danger";

                        } else if ($c <= 55)
                        {
                            $class_bar = "bg-warning";

                        } else if ($c <= 99)
                        {
                            $class_bar = "bg-info";

                        } else if ($c >= 100)
                        {
                            $class_bar = "bg-success";
                        }
                        @endphp
                        <div class="progress-info">
                            <div class="progress-percentage">
                              <span class="text-sm font-weight-bold">{{ $c }}%</span>
                            </div>
                          </div>
                        </div>
                        <div class="progress">
                        <div class="progress-bar {{ $class_bar }}" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: {{ $c }}%;"></div>
                        </div>
                    </div>
                    @endif

                    @empty
                        <h4 class="text-center text-danger">{{ __('volunteer.dashboard.forms.err') }}</h4>
                    @endforelse
                </div>
              </div>
        </div>
      </div>
      <div class="row mt-4">
        <div class="col-lg-5 col-md-6 mb-4 mb-lg-0">
          <div class="card h-100">
            <div class="card-header pb-0 p-3">
              <h6 class="mb-0">{{ __('volunteer.dashboard.orders.title') }}</h6>
            </div>
            <div class="table-responsive">
                <table class="table align-items-center ">
                    <tbody>
                        @forelse ($orders as $order)
                            <tr>
                                <td class="w-30">
                                    <div class="d-flex px-2 py-1 align-items-center">
                                        <div>
                                        <i class="fa-solid fa-award text-primary fa-lg"></i>
                                        </div>
                                        <div class="ms-4">
                                            <h6 class="text-sm mb-0">{{ $order->prize->prize_translate->title }}</h6>
                                            <p class="text-xs font-weight-bold mb-0">{{ __('volunteer.dashboard.orders.date') }} <br> {{ $order->created_at }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{ __('volunteer.dashboard.orders.status') }}</p>
                                        <h6 class="text-sm mb-0">
                                            @switch($order->status->last()->condition)
                                            @case(0)
                                            <span class="badge badge-danger badge-sm">{{ __('volunteer.dashboard.orders.ordered') }}</span>
                                            @break
                                            @case(1)
                                            <span class="badge badge-info badge-sm">{{ __('volunteer.dashboard.orders.ready') }}</span>
                                            @break
                                            @case(2)
                                            <span class="badge badge-success badge-sm">{{ __('volunteer.dashboard.orders.collected') }}</span>
                                            @break
                                        @endswitch
                                            </h6>
                                    </div>
                                </td>
                            </tr>
                        @empty
                        <tr>
                            <td><h3 class="text-danger text-center">{{ __('volunteer.dashboard.orders.error') }}</h3></td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
            <div class="card h-100">
              <div class="card-header pb-0 p-3">
                <div class="d-flex justify-content-between">
                  <h6 class="mb-2">{{ __('Aktualizacje ISOW') }}</h6>
                </div>
              </div>
              <div class="card-body pt-0">
                  <ul>
                    <li>v. 1.0.0 - Nowy wygląd, połączenie konta z Google i Facebook, zarządzanie powiadomieniami</li>
                  </ul>
              </div>
            </div>
          </div>
        <div class="col-lg-3">
            <div class="card h-100">
                <div class="card-header pb-0 p-3">
                  <h6 class="mb-0">{{ __('volunteer.dashboard.help.title') }}</h6>
                </div>
                <div class="card-body text-center">
                    <h6>{{ __('volunteer.dashboard.help.text') }}
                        <a target="_blank" rel="nofollow" href="mailto:administrator@wolontariat.rybnik.pl"><b>administrator@wolontariat.rybnik.pl</b></a>
                    </h6>
                </div>
          </div>
    </div>
</div>
      @include('volunteer.include.footer')
    </div>
  </main>

  @include('volunteer.include.sidebar')
@endsection
