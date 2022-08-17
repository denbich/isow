@extends('layouts.app')

@section('title')
{{ __('Panel koordynatora') }}
@endsection

@section('content')

<nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      @include('coordinator.include.logo')
      <div class="navbar-inner mt-2">
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" href="{{ route('c.dashboard') }}">
                <i class="ni ni-tv-2 "></i>
                <span class="nav-link-text">{{ __('Panel') }}</span>
              </a>
            </li>
        </ul>
        <hr class="my-3">
        <h6 class="navbar-heading p-0 text-muted">
            <span class="docs-normal">{{ __('Ogólne') }}</span>
        </h6>
          <ul class="navbar-nav">
            @include('coordinator.include.volunteer')
            @include('coordinator.include.chat')
            @include('coordinator.include.send-mail')
          </ul>
          <hr class="my-3">
        <h6 class="navbar-heading p-0 text-muted">
            <span class="docs-normal">{{ __('Moduły') }}</span>
        </h6>
          <ul class="navbar-nav">
            @include('coordinator.include.forms')
            @include('coordinator.include.posts')
            @include('coordinator.include.prizes')
            @include('coordinator.include.sponsors')
          </ul>

          <hr class="my-3">

          <ul class="navbar-nav mb-md-3">
            @include('coordinator.include.other')
          </ul>
        </div>
      </div>
    </div>
  </nav>
  <div class="main-content" id="panel">

    @include('coordinator.include.nav')

    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">{{ __('Panel koordynatora') }}</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="{{ route('c.dashboard') }}"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item active" aria-current="page">{{ __('Panel') }}</li>
                </ol>
              </nav>
            </div>
            @include('coordinator.include.button')
          </div>
          <div class="row" style="display: flex;
          flex-wrap: wrap;">
            <div class="col-xl-3 col-md-6 h-100">
              <div class="card card-stats">
                <div class="card-body my-3">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">{{ __('Twoje ID') }}</h5>
                      <span class="h2 font-weight-bold mb-0">{{ Auth::user()->id }}</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-primary text-white rounded-circle shadow">
                        <i class="fas fa-id-card-alt"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6 h-100">
              <div class="card card-stats">
                <div class="card-body my-3">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">{{ __('Liczba wolontariuszy') }}</h5>
                      <span class="h2 font-weight-bold mb-0">{{ $count['volunteers'] }}</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                        <i class="fas fa-users"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm d-none">
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> {{ $count['volunteers_p'] }}</span>
                    <span class="text-nowrap">{{ __('Od ostatniego miesiąca') }}</span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6 h-100">
              <div class="card card-stats">
                <div class="card-body my-3">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">{{ __('Wolontariuszy do aktywowania') }}</h5>
                      <span class="h2 font-weight-bold mb-0">{{ $count['volunteers_active'] }}</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                        <i class="fas fa-user-plus"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6 h-100">
              <div class="card card-stats">
                <div class="card-body my-3">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">{{ __('Nagrody') }}</h5>
                      <span class="h2 font-weight-bold mb-0">{{ $count['prizes'] }}</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-success text-white rounded-circle shadow">
                        <i class="fas fa-award"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm d-none">
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> {{ $count['prizes_p'] }}</span>
                    <span class="text-nowrap">{{ __('Od ostatniego miesiąca') }}</span>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Page content -->

    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col-xl-8">
          <div class="card">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col">
                  <h5 class="h3 mb-0">{{ __('Statystyki rejestracji wolontariouszy') }}</h5>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="chart">
                <canvas id="signinchart" class="chart-canvas" style="max-height: 100%;"></canvas>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-4">
          <div class="card">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col">
                  <h5 class="h3 mb-0">{{ __('Urodziny wolontariuszy') }}</h5>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="chart overflow-auto">
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
                  @if ($c == 0) <h2 class="text-center text-danger">{{ __('W najbliższych dniach żadnen wolonariusz nie ma urodzin!') }}</h2> @endif
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xl-6">
          <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">{{ __('Zapełnienie formularzy') }}</h3>
                </div>
                <div class="col text-right">
                  <a href="{{ route('c.form.list') }}" class="btn btn-sm btn-primary">{{ __('Zobacz formularze') }}</a>
                </div>
              </div>
            </div>
            <div class="card-body">
                @forelse ($forms as $form)
                    <div class="progress-wrapper pt-0">
                        <div class="progress-info">
                        <a href="{{ route('c.form.show', [$form->ivid]) }}"><span class="badge badge-lg badge-pill badge-primary mb-1">{{ $form->form_translate->title }}</span></a>
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
                        <div class="progress-percentage">
                            <span>{{ $c }}%</span>
                        </div>
                        </div>
                        <div class="progress">
                        <div class="progress-bar {{ $class_bar }}" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: {{ $c }}%;"></div>
                        </div>
                    </div>
                @empty
                    <h2 class="text-center text-danger">{{ __('Brak aktywnych formularzy!') }}</h2>
                @endforelse
            </div>
          </div>

          <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">{{ __('Powiadomienia') }}</h3>
                </div>
              </div>
            </div>
            <div class="card-body">
                <div class='onesignal-customlink-container'></div>
            </div>
          </div>
        </div>
        <div class="col-xl-6">
            <div class="card">
              <div class="card-header">
                <div class="row align-items-center">
                  <div class="col">
                    <h3 class="mb-0">{{ __('Pomoc') }}</h3>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div class="text-center">
                    <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;"
                    src="{{ url('/img/undraw_instant_support_re_s7un.svg') }}" alt="">
                  </div>
                <p>{{ __('Jeśli masz probem, propozycję bądź pytanie to śmiało pisz na adres:') }}
                    <a target="_blank" rel="nofollow" href="mailto:administrator@wolontariat.rybnik.pl">administrator@wolontariat.rybnik.pl</a>
                </p>
                <!--<a target="_blank" rel="nofollow" href="#"><i class="far fa-question-circle"></i> Centrum pomocy</a>-->
              </div>
            </div>
          </div>
      </div>

      <div class="row">
        <div class="col-xl-6">

        </div>

      </div>

      @include('coordinator.include.footer')
    </div>
  </div>

@endsection

@section('script')
<script>
    const ctx = document.getElementById('signinchart');
    const data = {
    labels: [{!! "'".$stats['sixth']['month']."', '".$stats['fifth']['month']."', '".$stats['fourth']['month']."', '".$stats['third']['month']."', '".$stats['second']['month']."', '".$stats['first']['month']."'" !!}],
    datasets: [{
        label: 'My First Dataset',
        data: [{!! "'".$stats['sixth']['data']."', '".$stats['fifth']['data']."', '".$stats['fourth']['data']."', '".$stats['third']['data']."', '".$stats['second']['data']."', '".$stats['first']['data']."'" !!}],
        backgroundColor: [
        'rgba(255, 99, 132, 0.2)',
        'rgba(255, 159, 64, 0.2)',
        'rgba(255, 205, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(153, 102, 255, 0.2)',
        'rgba(201, 203, 207, 0.2)'
        ],
        borderColor: [
        'rgb(255, 99, 132)',
        'rgb(255, 159, 64)',
        'rgb(255, 205, 86)',
        'rgb(75, 192, 192)',
        'rgb(54, 162, 235)',
        'rgb(153, 102, 255)',
        'rgb(201, 203, 207)'
        ],
        borderWidth: 1
    }]
};
    const config = {
    type: 'bar',
    data: data,
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        },
        plugins: {
    legend: {
      display: false
    }
  }
    },
    };
    const myChart = new Chart(ctx, config);
    </script>
@endsection

