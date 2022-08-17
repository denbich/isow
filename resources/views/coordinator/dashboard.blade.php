
@extends('layouts.app')

@section('title') {{ __('Panel koordynatora') }} @endsection

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
        <li class="nav-item ps-1 pt-1">
          <a class="nav-link active" href="{{ route('c.dashboard') }}">
                <i class="fa-solid fa-tv text-primary text-sm opacity-10"></i>
            <span class="nav-link-text ms-1">{{ __('Panel') }}</span>
          </a>
        </li>
        @include('coordinator.include.volunteer')
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
              <li class="breadcrumb-item text-sm text-white active" aria-current="page">{{ __('Panel koordynatora') }}</li>
            </ol>
            <h6 class="font-weight-bolder text-white mb-0">{{ __('Panel koordynatora') }}</h6>
          </nav>
          @include('coordinator.include.nav')
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
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">{{ __('Twoje ID') }}</p>
                    <h5 class="font-weight-bolder">{{ Auth::user()->id }}</h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
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
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">{{ __('Liczba wolontariuszy') }}</p>
                    <h5 class="font-weight-bolder">{{ $count['volunteers'] }}</h5>
                    <p class="mb-0">
                        @if ($count['volunteers_p'] > 0)
                        <span class="text-success text-sm font-weight-bolder"><i class="fa fa-arrow-up"></i> {{ $count['volunteers_p'] }} {{ __('Od ostatniego miesiąca') }}</span>
                        @else
                        <span class="text-danger text-sm font-weight-bolder"> {{ $count['volunteers_p'] }} {{ __('Od ostatniego miesiąca') }}</span>
                        @endif
                    </p>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                    <i class="fa-solid fa-users text-lg opacity-10" aria-hidden="true"></i>
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
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">{{ __('Wolontariuszy do aktywowania') }}</p>
                    <h5 class="font-weight-bolder">{{ $count['volunteers_active'] }}</h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                    <i class="fa-solid fa-user-plus text-lg opacity-10" aria-hidden="true"></i>
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
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">{{ __('Nagrody') }}</p>
                    <h5 class="font-weight-bolder">{{ $count['prizes'] }}</h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                    <i class="fa-solid fa-award text-lg opacity-10" aria-hidden="true"></i>
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
              <h6 class="text-capitalize">{{ __('Statystyki rejestracji') }}</h6>
            </div>
            <div class="card-body p-3">
              <div class="chart d-flex" style="min-height: 300px">
                <canvas id="signinchart" class="chart-canvas" style="max-height: 100%;"></canvas>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-5">
            <div class="card h-100">
                <div class="card-header pb-0 p-3">
                  <div class="d-flex justify-content-between">
                    <h6 class="mb-2">{{ __('Urodziny wolontariuszy') }}</h6>
                  </div>
                </div>
                <div class="card-body pt-0">
                        @php $c = 0; @endphp
                        <ul>
                          @foreach ($volunteers as $volunteer)
                          @php
                          $v_birthday = date ('m-d', strtotime($volunteer->birth));
                          $uro0 = date('m-d');
                          $uro1 = date( 'm-d', strtotime( date( 'Y-m-d', strtotime( date( 'Y-m-d') .' +1 day'))));
                          $uro2 = date( 'm-d', strtotime( date( 'Y-m-d', strtotime( date( 'Y-m-d') .' +2 day'))));
                          $uro3 = date( 'm-d', strtotime( date( 'Y-m-d', strtotime( date( 'Y-m-d') .' +3 day'))));
                          $uro4 = date( 'm-d', strtotime( date( 'Y-m-d', strtotime( date( 'Y-m-d') .' +4 day'))));
                          $uro5 = date( 'm-d', strtotime( date( 'Y-m-d', strtotime( date( 'Y-m-d') .' +5 day'))));

                          if ($uro0 == $v_birthday)
                          {
                              $tekst_li = "ma <b class='cz'>dziś</b>";
                              $c = 1;
                          } elseif ($uro1 == $v_birthday) {
                              $tekst_li = "ma<b class='gr'>jutro</b>";
                              $c = 1;
                          }elseif ($uro2 == $v_birthday) {
                              $tekst_li = "ma za<b> 2 dni</b>";
                              $c = 1;
                          }elseif ($uro3 == $v_birthday) {
                              $tekst_li = "ma za<b> 3 dni</b>";
                              $c = 1;
                          }elseif ($uro4 == $v_birthday) {
                              $tekst_li = "ma za<b> 4 dni</b>";
                              $c = 1;
                          }elseif ($uro5 == $v_birthday) {
                              $tekst_li = "ma za<b> 5 dni</b>";
                              $c = 1;
                          }

                          if ($v_birthday >= $uro0 && $v_birthday <= $uro5)
                          {
                              echo "<li><p>".$volunteer->user->firstname." ".$volunteer->user->lastname." (".$volunteer->user->name.") ".$tekst_li." urodziny!</p></li>";
                          }
                          @endphp
                          @endforeach
                        </ul>
                        @if ($c == 0) <h4 class="text-center text-danger">{{ __('W najbliższych dniach żadnen wolonariusz nie ma urodzin!') }}</h4> @endif
                </div>
              </div>
        </div>
      </div>
      <div class="row mt-4">
        <div class="col-lg-5 col-md-6 mb-4 mb-lg-0">
          <div class="card h-100">
            <div class="card-header pb-0 p-3">
              <h6 class="mb-0">{{ __('Twoje zamówienia') }}</h6>
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush list">
                    @forelse ($forms as $form)
                    @php $p_count = 0; foreach($form->form_positions as $position) { $p_count = $p_count + $position->max_volunteer; } $a = count($form->signedform)/$p_count; $b = $a * 100; $c = ceil($b); if ($c <= 25) { $class_bar = "bg-danger"; } else if ($c <= 55) { $class_bar = "bg-warning"; } else if ($c <= 99) { $class_bar = "bg-info"; } else if ($c >= 100) { $class_bar = "bg-success"; } @endphp
                    <li class="list-group-item px-0">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <a href="{{ route('c.form.show', [$form->ivid]) }}" class="avatar rounded-circle">
                                    <i class="fa-solid fa-person-running fa-2x text-primary"></i>
                                </a>
                            </div>
                            <div class="col">
                                <div class="d-flex align-items-center mb-2">
                                    <span class="text-sm font-weight-bold text-capitalize me-2"><a href="{{ route('c.form.show', [$form->ivid]) }}"><h6> {{ $form->form_translate->title }}</h6></a></span>
                                    <span class="ms-auto text-sm font-weight-bold">{{ $c }}%</span>
                                    </div>

                                <div class="progress progress-xs mb-0">
                                    <div class="progress-bar {{ $class_bar }}"  role="progressbar" aria-valuenow="{{ $c }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $c }}%;"></div>
                                </div>
                            </div>
                        </div>
                    </li>
                    @empty
                    <h4 class="text-danger m-auto ">{{ __('Brak aktywnych formularzy') }}</h4>

                    @endforelse
                </ul>
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
                  <h4 class="text-center text-danger">Brak</h4>
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

@section('script')

    <script>
        var ctx2 = document.getElementById("signinchart").getContext("2d");

   var gradientStroke1 = ctx2.createLinearGradient(0, 230, 0, 50);

   gradientStroke1.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
   gradientStroke1.addColorStop(0.2, 'rgba(72,72,176,0.0)');
   gradientStroke1.addColorStop(0, 'rgba(94, 114, 228,0)'); //purple colors

   new Chart(ctx2, {
     type: "line",
     data: {
        labels: [{!! "'".$stats['sixth']['month']."', '".$stats['fifth']['month']."', '".$stats['fourth']['month']."', '".$stats['third']['month']."', '".$stats['second']['month']."', '".$stats['first']['month']."'" !!}],
       datasets: [{
           label: "Ilość rejestracji",
           tension: 0.4,
           borderWidth: 0,
           pointRadius: 0,
           borderColor: "#5e72e4",
           borderWidth: 3,
           backgroundColor: gradientStroke1,
           fill: true,
           data: [{!! "'".$stats['sixth']['data']."', '".$stats['fifth']['data']."', '".$stats['fourth']['data']."', '".$stats['third']['data']."', '".$stats['second']['data']."', '".$stats['first']['data']."'" !!}],
           maxBarThickness: 6

         },
       ],
     },
     options: {
       responsive: true,
       maintainAspectRatio: false,
       plugins: {
         legend: {
           display: false,
         }
       },
       interaction: {
         intersect: false,
         mode: 'index',
       },
       scales: {
         y: {
           grid: {
             drawBorder: false,
             display: true,
             drawOnChartArea: true,
             drawTicks: false,
             borderDash: [5, 5]
           },
           ticks: {
             display: true,
             padding: 10,
             color: '#b2b9bf',
             font: {
               size: 11,
               family: "Open Sans",
               style: 'normal',
               lineHeight: 2
             },
           }
         },
         x: {
           grid: {
             drawBorder: false,
             display: false,
             drawOnChartArea: false,
             drawTicks: false,
             borderDash: [5, 5]
           },
           ticks: {
             display: true,
             color: '#b2b9bf',
             padding: 10,
             font: {
               size: 11,
               family: "Open Sans",
               style: 'normal',
               lineHeight: 2
             },
           }
         },
       },
     },
   });
        </script>
@endsection
