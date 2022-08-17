@extends('layouts.app')

@section('title')
{{ __('Idetyfikator wolontariusza') }}
@endsection

@section('body')
class="bg-default"
@endsection

@section('content')

<nav id="navbar-main" class="navbar navbar-horizontal navbar-transparent navbar-main navbar-expand-lg navbar-light">
    <div class="container text-primary">
        <div class="navbar-brand">
            <a class="" href="{{ route('home') }}">
                <img class="h-25" style="max-height: 110px" src="{{ url('/img/logowmrwhite.svg') }}">
              </a>
              <a class="" href="{{ route('help_ukraine') }}" rel="noopener noreferrer">
                <img src="https://upload.wikimedia.org/wikipedia/commons/4/49/Flag_of_Ukraine.svg" alt="">
              </a>
        </div>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars"></i>
      </button>
      <div class="navbar-collapse navbar-custom-collapse collapse" id="navbar-collapse">
        <div class="navbar-collapse-header">
          <div class="row">
            <div class="col-8 collapse-brand text-center mx-auto">
              <a href="{{ route('home') }}">
                <img class="h-100" style="max-height: 110px; min-height:100px;" src="{{ url('/img/logowmr1.svg') }}" alt="wmr logo">

              </a>
              <a href="{{ route('help_ukraine') }}" class="w-100 text-center mx-auto" rel="noopener noreferrer">
                <img src="https://upload.wikimedia.org/wikipedia/commons/4/49/Flag_of_Ukraine.svg" class="text-center mx-auto my-2" alt="Ukraine flag">
            </a>
            </div>
            <div class="col-4 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a href="{{ route('home') }}" class="nav-link text-center">
                <span class="nav-link-inner--text">{{ __('home.title') }}</span>
              </a>
            </li>
            <li class="nav-item">
                <li class="nav-item text-center">
                    <div class="dropdown">
                      <a class="nav-link dropdown-toggle text-center" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{__('home.socialmedia.title')}}</a>

                      <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item d-none" href=""><i class="fas fa-info-circle"></i> O nas</a>
                        <a class="dropdown-item" href="https://facebook.com/wolontariat.rybnik" target="_blank"><i class="fab fa-facebook-square"></i> {{ __('home.socialmedia.facebook') }}</a>
                        <a class="dropdown-item" href="https://instagram.com/wolontariat.rybnik" target="_blank"><i class="fab fa-instagram"></i> {{ __('home.socialmedia.instagram') }}</a>
                      </div>
                    </div>
                  </li>
            </li>
            <li class="nav-item">
                <a href="{{ route('login') }}" class="nav-link text-center">
                    <span class="nav-link-inner--text">{{ __('main.login') }}</span>
                </a>
            </li>

          </ul>
        <hr class="d-lg-none" />
        <ul class="navbar-nav align-items-lg-center ml-lg-auto">
          @include('include.lang')

          <li class="nav-item d-lg-block ml-lg-4 text-center">
            <a href="{{ route('register') }}" class="btn btn-neutral btn-icon text-center">
              <span class="btn-inner--icon">
                <i class="fas fa-handshake mr-2"></i>
              </span>
              <span class="nav-link-inner--text">{{ __('main.signin') }}</span>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="main-content">
    <div class="header bg-gradient-primary py-8 py-lg-8 pt-lg-9">
        <div class="container">
          <div class="header-body text-center mb-6">
            <div class="row justify-content-center">
              <div class="col-xl-8 col-lg-8 col-md-8 px-5">
              </div>
            </div>
          </div>
        </div>
        <div class="separator separator-bottom separator-skew zindex-100">
            <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
              <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
            </svg>
          </div>
      </div>
    <!-- Page content -->
    <div class="container mt--8 pb-5">
      <div class=""> <!-- row justify-content-center col-lg-5 col-md-7 -->
          <div class="card bg-secondary border-0 mb-0">
            <div class="row">
                <div class="col-lg-6 order-md-2">
                    <div class="card-body px-0 h-100">
                        <div class="h-100 d-flex justify-content-center align-items-center">
                            <img class="" style="max-height:350px; max-width:350px; " src="{{ $volunteer->photo_src }}">
                        </div>

                    </div>
                </div>
                <div class="col-lg-6 order-md-2">
                    <div class="card-header bg-transparent text-center">
                        <a href="{{ route('home') }}"><img src="https://mosir.rybnik.pl/typo3conf/ext/dqtemplate/Resources/Public/img/mosir-logo.svg" class="text-center"></a>
                        <div class="mt-2 h1">Idetyfikator wolontariusza</div>
                      </div>
                      <div class="card-body pt-lg-3 pb-lg-4 px-lg-5">
                        @isset($volunteer)
                            <div class="w-100">
                                <h3>Dane wolontariusza:</h3>
                                <p><b>Imię wolontariusza: </b>{{ $volunteer->firstname }}</p>
                                <p><b>Nazwisko wolontariusza: </b>{{ $volunteer->lastname }}</p>
                                <p><b>ID: </b>{{ substr($volunteer->name, 12) }}</p>
                                <h3>Akcje w których uczestniczy dziś <br> ({{ date('d-m-Y'); }}):</h3>
                                @php $i = 0 @endphp
                                @if (count($events) > 0)
                                    <ul>
                                    @foreach ($events as $event)
                                    @if (date('Y-m-d') == date('Y-m-d', strtotime($event->start)) || date('Y-m-d') == date('Y-m-d', strtotime($event->end)))
                                        <li>{{ $event->title }}</li>
                                        @php $i++ @endphp
                                    @endif
                                    @endforeach
                                    </ul>
                                @if ($i == 0)
                                    <div class="w-100">
                                        <h3 class="text-danger">Dziś wolontariusz nie uczestniczy w żadnej imprezie!</h3>
                                    </div>
                                @endif
                                @else
                                    <div class="w-100">
                                        <h3 class="text-danger">Dziś wolontariusz nie uczestniczy w żadnej imprezie!</h3>
                                    </div>
                                @endif
                            </div>
                        @endisset
                      </div>
                </div>
            </div>
          </div>
      </div>
    </div>
  </div>
  @include('auth.footer')

@endsection



