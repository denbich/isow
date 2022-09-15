@extends('layouts.app')

@section('title')
{{ __('main.login') }}
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
                <li class="nav-item font-weight-bold">
                  <a class="nav-link d-flex align-items-center me-2 font-weight-bold" aria-current="page" href="{{ route('home') }}">
                    <i class="fa-solid fa-house opacity-6 text-dark me-1"></i>
                    {{ __('home.title') }}
                  </a>
                </li>
                @guest
                <li class="nav-item">
                  <a class="nav-link me-2" href="{{ route('login') }}">
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
                  <i class="fa-solid fa-envelope opacity-6 text-dark me-1"></i>
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
                    <i class="fa-solid fa-language text-lg opacity-6"></i>
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
                  <a href="{{ route('register') }}" class="btn btn-sm mb-0 me-1 btn-primary">{{ __('main.signin') }}</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
        <!-- End Navbar -->
      </div>
    </div>
  </div>
  <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-100 pt-8">
        <div class="container">
          <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
              <div class="card card-plain">
                <div class="card-header pb-0 text-start">
                <div class="w-100 text-center"><a href="{{ route('home') }}"><img src="{{ url('/img/logowmr.svg') }}" class="text-center mb-1" style="max-height: 120px"></a>
                  <h4 class="font-weight-bolder mb-1">{{ __('index.login.title') }}</h4>
                </div>
                </div>
                <div class="card-body pt-2">
                  <form role="form" method="POST" action="{{ route('login') }}" id="login_form">
                      @csrf
                    <div class="mb-3">
                      <input type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" placeholder="{{ __('index.login.type-login') }}" autofocus required>
                      @error('email')
                        <span class="text-danger small" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                      <input type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" autocomplete="current-password" placeholder="{{ __('index.login.type-password') }}" aria-label="Password" required>
                      <div class="text-sm mt-2">
                        <a href="{{ route('password.request') }}" class="mx-2">{{ __('index.footer.rememberpwd') }}</a>
                      </div>
                      @error('password')
                        <span class="text-danger small" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        @error('google')
                            <span class="text-danger small" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        @if(session('user_check') == true)
                            <span class="text-danger small" role="alert">
                                <strong>{{ __('alerts.login.active') }}</strong>
                            </span>
                        @endif
                        @if(session('agreement') == true)
                            <span class="text-success small" role="alert">
                                <strong>{{ __('alerts.login.agreement') }}</strong>
                            </span>
                        @endif
                        @if(session('block') == true)
                            <span class="text-danger small" role="alert">
                                <strong>{{ __('') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                      <label class="form-check-label" for="remember">{{ __('index.login.rememberme') }}</label>
                    </div>
                    <div class="text-center">
                      <button type="submit" id="login_button" class="btn btn-lg btn-primary w-100 mt-3 mb-0">{{ __('main.login') }}</button>
                    </div>
                    <hr>
                    <div class="btn-wrapper text-center mb-2">
                        <a href="{{ route('google.redirect') }}" class="btn btn-youtube w-100 mt-2 mb-0" ><!-- disabled  -->
                          <span class="btn-inner--icon"><i class="fa-brands fa-google"></i> </span>
                          <span class="btn-inner--text"> {{ __('index.login.google') }}</span>
                        </a>
                        <a href="{{ route('facebook.redirect') }}" class="btn btn-facebook w-100 mt-2 mb-0" ><!-- disabled  -->
                            <span class="btn-inner--icon"><i class="fa-brands fa-facebook"></i> </span>
                            <span class="btn-inner--text"> {{ __('index.login.facebook') }}</span>
                          </a>
                      </div>
                  </form>
                </div>
                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                  <p class="mb-4 text-sm mx-auto">
                    {{ __('index.footer.createaccount') }}
                    <a href="{{ route('register') }}" class="text-primary text-gradient font-weight-bold">{{ __('main.signin') }}</a>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
              <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden" style="background-image: url('{{ url('/assets/img/loginpage.jpg') }}'); background-size: cover; background-repeat: no-repeat; background-position: center;">
                <span class="mask bg-gradient-primary opacity-7"></span>
                <h4 class="mt-5 text-white font-weight-bolder position-relative">"Największą satysfakcję odczuwamy właśnie wtedy, gdy dajemy innym coś z siebie, gdy za cel stawiamy sobie poprawienie warunków życia innych ludzi, gdy przyłączamy się do jakiejś większej sprawy i staramy się wywrzeć pozytywny wpływ na otaczający świat."</h4>
                <p class="text-white position-relative">Nick Vujicic</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

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
  </main>

@endsection

@push('scripts')
<script>
    $('#login_form').submit(function(){
        $('#login_button').prop('disabled', true);
        $('#login_button').prepend('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> ');
    });
</script>
@endpush
