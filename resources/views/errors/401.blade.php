@php App::setLocale(session('locale')); @endphp
@extends('layouts.app')

@section('title')
{{ __('Błąd 401') }}
@endsection

@section('content')
<div class="container position-sticky z-index-sticky top-0">
    <div class="row">
      <div class="col-12">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg blur border-radius-lg top-0 z-index-3 shadow position-absolute mt-4 py-2 start-0 end-0 mx-4">
          <div class="container-fluid">
            <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 " href="{{ route('home') }}">
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
                  <a class="nav-link d-flex align-items-center me-2 active" aria-current="page" href="{{ route('home') }}">
                    <i class="fa-solid fa-house opacity-6 text-dark me-1"></i>
                    {{ __('home.title') }}
                  </a>
                </li>
                @guest
                <li class="nav-item font-weight-bold">
                  <a class="nav-link me-2 font-weight-bold" href="{{ route('login') }}">
                    <i class="fas fa-key opacity-6 text-dark me-1"></i>
                    {{ __('main.login') }}
                  </a>
                </li>
                @endguest
                <li class="nav-item dropdown dropdown-hover mx-2">
                    <a role="button" class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center" id="dropdownMenuBlocks" data-bs-toggle="dropdown" aria-expanded="false">
                        {{__('home.socialmedia.title')}}
                        <img src="/assets/img/down-arrow-dark.svg " alt="down-arrow" class="arrow ms-1 d-lg-block d-none">
                        <img src="/assets/img/down-arrow-dark.svg" alt="down-arrow" class="arrow ms-1 d-lg-none d-block">
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
                                                <p class="dropdown-header text-dark p-0">Facebook</p>
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
                                            <p class="dropdown-header text-dark p-0">Instagram</p>
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
                                            <p class="dropdown-header text-dark p-0">Facebook</p>
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
                                            <p class="dropdown-header text-dark p-0">Instagram</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link me-2" href="{{ route('home') }}">
                  <i class="fa-solid fa-envelope opacity-6 text-dark me-1"></i>
                  Kontakt
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
              <ul class="navbar-nav d-lg-block d-none">
                <li class="nav-item">
                  @guest <a href="{{ route('register') }}" class="btn btn-sm mb-0 me-1 btn-primary">{{ __('main.signin') }}</a> @endguest
                  @auth <a href="{{ route('loginauth') }}" class="btn btn-sm mb-0 me-1 btn-primary">Przejdź do panelu</a> @endauth
                </li>
              </ul>
            </div>
          </div>
        </nav>
        <!-- End Navbar -->
      </div>
    </div>
  </div>

  <main class="main-content mt-0 ps">
    <div class="page-header min-vh-100" style="background-image: url('{{ url('/assets/img/illustrations/404.svg') }}');">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-7 mx-auto text-center">
                    <h1 class="display-1 text-bolder text-primary">{{ __('Błąd 401') }}</h1>
                    <h2>{{ __('Nieautoryzowany dostęp') }}</h2>
                    <p class="lead">{{ __('Nie masz uprawnień do tej ścieżki. Przejdź na stronę główną') }}</p>
                    <a href="{{ route('home') }}" class="btn bg-gradient-dark mt-4">{{ Str::upper(__('home.title')) }}</a>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection

