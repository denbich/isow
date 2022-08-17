@extends('layouts.app')

@section('title')
{{ __('volunteer.id.title') }}
@endsection

@section('body')
bg-gray-200
@endsection

@section('content')

<nav class="navbar navbar-expand-lg position-absolute top-0 z-index-3 w-100 shadow-none my-3 navbar-transparent mt-4">
    <div class="container-fluid">
        <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 text-white" href="{{ route('home') }}">
          Wolontariat MOSiR Rybnik
        </a>
        <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon mt-2">
            <span class="navbar-toggler-bar bar1"></span>
            <span class="navbar-toggler-bar bar2"></span>
            <span class="navbar-toggler-bar bar3"></span>
          </span>
        </button>
        <div class="collapse navbar-collapse" id="navigation">
          <ul class="navbar-nav mx-auto">
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center me-2" aria-current="page" href="{{ route('home') }}">
                <i class="fa-solid fa-house me-1"></i>
                {{ __('home.title') }}
              </a>
            </li>
            @guest
            <li class="nav-item font-weight-bold">
              <a class="nav-link me-2 font-weight-bold" href="{{ route('login') }}">
                <i class="fas fa-key me-1"></i>
                {{ __('main.login') }}
              </a>
            </li>
            @endguest
            <li class="nav-item dropdown dropdown-hover mx-2">
                <a role="button" class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center" id="dropdownMenuBlocks" data-bs-toggle="dropdown" aria-expanded="false">
                    {{__('home.socialmedia.title')}}
                    <img src="/assets/img/down-arrow-white.svg " alt="down-arrow" class="arrow ms-1 d-lg-block d-none">
                    <img src="/assets/img/down-arrow-white.svg" alt="down-arrow" class="arrow ms-1 d-lg-none d-block">
                </a>
                <div class="dropdown-menu dropdown-menu-animation dropdown-md dropdown-md-responsive p-3 border-radius-lg mt-0 mt-lg-3 shadow-none shadow-lg-lg" aria-labelledby="dropdownMenuBlocks">
                    <div class="d-none d-lg-block">
                        <ul class="list-group">
                            <li class="nav-item dropdown dropdown-hover dropdown-subitem list-group-item border-0 p-0">
                                <a class="dropdown-item py-2 ps-3 border-radius-md" href="https://facebook.com/wolontariat.rybnik">
                                    <div class="d-flex">
                                        <div class="icon h-10 me-3 d-flex mt-1">
                                             <i class="fa-brands fa-facebook text-primary"></i>
                                        </div>
                                    <div class="w-100 d-flex align-items-center justify-content-between">
                                        <div>
                                            <p class="dropdown-header text-dark p-0">{{ __('home.socialmedia.facebook') }}</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item dropdown dropdown-hover dropdown-subitem list-group-item border-0 p-0">
                            <a class="dropdown-item py-2 ps-3 border-radius-md" href="https://instagram.com/wolontariat.rybnik">
                                <div class="d-flex">
                                    <div class="icon h-10 me-3 d-flex mt-1">
                                        <i class="fa-brands fa-instagram text-primary"></i>
                                    </div>
                                <div class="w-100 d-flex align-items-center justify-content-between">
                                    <div>
                                        <p class="dropdown-header text-dark p-0">{{ __('home.socialmedia.instagram') }}</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                </ul>
                </div>
                <div class="row d-lg-none">
                    <div class="col-md-12">
                        <a class="py-2 ps-3 border-radius-md" href="https://facebook.com/wolontariat.rybnik">
                            <div class="d-flex">
                                <div class="icon h-10 me-3 d-flex mt-1">
                                    <i class="fa-brands fa-facebook text-primary"></i>
                                </div>
                                <div class="w-100 d-flex align-items-center justify-content-between">
                                    <div>
                                        <p class="dropdown-header text-dark p-0">{{ __('home.socialmedia.facebook') }}</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a class="py-2 ps-3 border-radius-md" href="https://instagram.com/wolontariat.rybnik">
                            <div class="d-flex">
                                <div class="icon h-10 me-3 d-flex mt-1">
                                    <i class="fa-brands fa-instagram text-primary"></i>
                                </div>
                                <div class="w-100 d-flex align-items-center justify-content-between">
                                    <div>
                                        <p class="dropdown-header text-dark p-0">{{ __('home.socialmedia.instagram') }}</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link me-2 d-none" href="{{ route('home') }}">
              <i class="fa-solid fa-envelope me-1"></i>
              {{ __('home.contact') }}
            </a>
          </li>
          @auth
              <li class="nav-item">
                <a class="nav-link me-2" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                  {{ __('main.logout') }}
                </a>
              </li>
               @endauth
        <li class="nav-item dropdown dropdown-hover mx-2">
            <a role="button" class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center" id="dropdownMenuLanguage" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa-solid fa-language text-lg"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-animation dropdown-md dropdown-md-responsive p-3 border-radius-lg mt-0 mt-lg-3 shadow-none shadow-lg-lg" aria-labelledby="dropdownMenuLanguage">
                <div class="d-none d-lg-block">
                    <h6 class="text-center">{{ __('main.lang') }}</h6>
                    <ul class="list-group">
                        <li class="nav-item dropdown dropdown-hover dropdown-subitem list-group-item border-0 p-0 ">
                            <a class="dropdown-item py-2 ps-3 border-radius-md @if (session('locale') == 'pl') bg-gray-200 @endif" href="{{ route('language', 'pl') }}">
                                <div class="d-flex">
                                    <div class="icon h-15 me-3 d-flex mt-1">
                                        <img src="https://cdn.jsdelivr.net/npm/round-flag-icons/flags/pl.svg" alt="">
                                    </div>
                                <div class="w-100 d-flex align-items-center justify-content-between">
                                    <div>
                                        <h6 class="dropdown-header text-dark d-flex align-items-center p-0"><span class="font-weight-bolder">{{ __('main.langlist.current.polish') }}</span>&nbsp;({{ __('main.langlist.foreign.polish') }})</h6>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item dropdown dropdown-hover dropdown-subitem list-group-item border-0 p-0">
                        <a class="dropdown-item py-2 ps-3 border-radius-md @if (session('locale') == 'en') bg-gray-200 @endif" href="{{ route('language', 'en') }}">
                            <div class="d-flex">
                                <div class="icon h-15 me-3 d-flex mt-1">
                                    <img src="https://cdn.jsdelivr.net/npm/round-flag-icons/flags/gb.svg" alt="">
                                </div>
                            <div class="w-100 d-flex align-items-center justify-content-between">
                                <div>
                                    <h6 class="dropdown-header text-dark d-flex align-items-center p-0"><span class="font-weight-bolder">{{ __('main.langlist.current.english') }}</span>&nbsp;({{ __('main.langlist.foreign.english') }})</h6>
                                </div>
                            </div>
                        </div>
                    </a>
                </li>
                <li class="nav-item dropdown dropdown-hover dropdown-subitem list-group-item border-0 p-0">
                    <a class="dropdown-item py-2 ps-3 border-radius-md @if (session('locale') == 'uk') bg-gray-200 @endif" href="{{ route('language', 'uk') }}">
                        <div class="d-flex">
                            <div class="icon h-15 me-3 d-flex mt-1">
                                <img src="https://cdn.jsdelivr.net/npm/round-flag-icons/flags/ua.svg" alt="">
                            </div>
                        <div class="w-100 d-flex align-items-center justify-content-between">
                            <div>
                                <h6 class="dropdown-header text-dark d-flex align-items-center p-0"><span class="font-weight-bolder">{{ __('main.langlist.current.ukrainian') }}</span>&nbsp;({{ __('main.langlist.foreign.ukrainian') }})</h6>
                            </div>
                        </div>
                    </div>
                </a>
            </li>
        </ul>
        <div class="text-sm-center w-100 d-none"><a href="" class="text-primary">{{ __('main.morelang') }}</a></div>

    </div>
            <div class="row d-lg-none">
                <div class="col-md-12">
                    <a class="py-2 ps-3 border-radius-md" href="{{ route('language', 'pl') }}">
                        <div class="d-flex @if (session('locale') == 'pl') bg-gray-200 @endif">
                            <div class="icon h-10 me-3 d-flex mt-1">
                                <img src="https://cdn.jsdelivr.net/npm/round-flag-icons/flags/pl.svg" alt="">
                            </div>
                            <div class="w-100 d-flex align-items-center justify-content-between">
                                <div>
                                    <p class="dropdown-header text-dark p-0"><span class="font-weight-bolder">{{ __('main.langlist.current.polish') }}</span>&nbsp;({{ __('main.langlist.foreign.polish') }})</p>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a class="py-2 ps-3 border-radius-md" href="{{ route('language', 'en') }}">
                        <div class="d-flex @if (session('locale') == 'en') bg-gray-200 @endif">
                            <div class="icon h-10 me-3 d-flex mt-1">
                                <img src="https://cdn.jsdelivr.net/npm/round-flag-icons/flags/gb.svg" alt="">
                            </div>
                            <div class="w-100 d-flex align-items-center justify-content-between">
                                <div>
                                    <p class="dropdown-header text-dark p-0"><span class="font-weight-bolder">{{ __('main.langlist.current.english') }}</span>&nbsp;({{ __('main.langlist.foreign.english') }})</p>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a class="py-2 ps-3 border-radius-md" href="{{ route('language', 'uk') }}">
                        <div class="d-flex @if (session('locale') == 'uk') bg-gray-200 @endif">
                            <div class="icon h-10 me-3 d-flex mt-1">
                                <img src="https://cdn.jsdelivr.net/npm/round-flag-icons/flags/ua.svg" alt="">
                            </div>
                            <div class="w-100 d-flex align-items-center justify-content-between">
                                <div>
                                    <p class="dropdown-header text-dark p-0"><span class="font-weight-bolder">{{ __('main.langlist.current.ukrainian') }}</span>&nbsp;({{ __('main.langlist.foreign.ukrainian') }})</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="text-sm-center w-100 d-none"><a href="" class="text-primary">{{ __('main.morelang') }}</a></div>
            </div>
        </div>
    </li>
          </ul>
          <ul class="navbar-nav d-lg-block">
            <li class="nav-item">
                @guest <a href="{{ route('register') }}" class="btn btn-sm mb-0 me-1 btn-primary">{{ __('main.signin') }}</a> @endguest
                @auth <a href="{{ route('loginauth') }}" class="btn btn-sm mb-0 me-1 btn-primary">Przejdź do panelu</a> @endauth
              </li>
          </ul>
        </div>
      </div>
</nav>

<main class="main-content  mt-0">
    <div class="page-header align-items-start min-vh-60 pt-5 pb-11 m-3 border-radius-lg" style="background-image: url('https://mosir.rybnik.pl/fileadmin/user_files/o-nas/wolontariat/72841164_2518600048193514_3649408641687093248_n.jpg'); background-position: center;">
      <span class="mask bg-gradient-dark opacity-6"></span>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-5 text-center mx-auto">
            <h1 class="text-white mb-2 mt-5">{{ __('volunteer.id.title') }}</h1>
            <h5 class="text-lead text-white d-none">{{ __('Na twojego maila przyjdzie kod i wpisz go poniżej.') }}</h5>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row mt-lg-n10 mt-md-n11 mt-n10 justify-content-center">
        <div class="col-xl-9 col-lg-10 col-md-11 mx-auto">
          <div class="card z-index-0">
            <div class="card-body text-dark">
            <div class="row justify-content-center">
                <div class="col-5">
                    <img src="{{ url(Auth::user()->photo_src) }}" alt="profile_image" class="w-100 border-radius-lg shadow-sm align-content-center m-auto d-block my-2" style="max-height:300px; max-width:300px">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <h3>{{ __('volunteer.id.data') }}:</h3>
                    <p><b>{{ __('volunteer.id.firstname') }}: </b>{{ Auth::user()->firstname }}</p>
                    <p><b>{{ __('volunteer.id.lastname') }}: </b>{{ Auth::user()->lastname }}</p>
                    <p><b>ID: </b>{{ Auth::user()->id }}</p>
                </div>
                <div class="col-lg-6">
                    <h4>{{ __('volunteer.id.today') }} <br> ({{ date('d-m-Y'); }}):</h4>
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
                            <h5 class="text-danger">{{ __('volunteer.id.err') }}</h5>
                        </div>
                    @endif
                    @else
                    <div class="w-100">
                        <h5 class="text-danger">{{ __('volunteer.id.err') }}</h5>
                    </div>
                    @endif
                </div>
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

  <footer class="footer py-3">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mb-4 mx-auto text-center">
          <a href="{{ route('regulations') }}" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">{{ __('index.footer.regulations') }} </a>
          <a href="{{ route('codex') }}" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">{{ __('index.footer.codex') }}</a>
          <a href="{{ route('privacy_policy') }}" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">{{ __('index.footer.privacypolicy') }}</a>
        </div>
      </div>
      <div class="row">
        <div class="col-8 mx-auto text-center mt-1">
          <p class="mb-0 text-secondary">
            Copyright © 2019 -<script> document.write(new Date().getFullYear()) </script> <a href="https://linktr.ee/denis.bichler" class="font-weight-bold ml-1" target="_blank">Denis Bichler for MOSiR Rybnik</a>
          </p>
        </div>
      </div>
    </div>
  </footer>

@endsection
