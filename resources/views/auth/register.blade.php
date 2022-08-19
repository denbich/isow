@extends('layouts.app')

@section('title')
{{ __('main.signin') }}
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
          <ul class="navbar-nav d-lg-block d-none">
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
            <h1 class="text-white mb-2 mt-5">{{ __('index.register.title') }}</h1>
            <h5 class="text-lead text-white">{{ __('Wypełnij formularz i dołącz do społeczności wolontariuszy MOSiR Rybnik') }}</h5>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row mt-lg-n10 mt-md-n11 mt-n10 justify-content-center">
        <div class="col-xl-6 col-lg-6 col-md-8 mx-auto">
          <div class="card z-index-0">
            <div class="card-body">
              <form method="post" action="{{ route('register') }}" role="form" id="register-form" enctype="multipart/form-data">
                @csrf
                <input id="hidden" type="hidden" name="phone">
                <div class="form-group">
                    <input class="form-control @error('firstname') is-invalid @enderror" placeholder="{{ __('index.register.firstname') }}" type="text" name="firstname" id="firstname" value="{{ old('firstname', '') }}" max="255" required>
                    @error('firstname')
                        <span class="text-danger text-sm" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <input class="form-control @error('lastname') is-invalid @enderror" placeholder="{{ __('index.register.lastname') }}" type="text" name="lastname" id="lastname" value="{{ old('lastname', '') }}" max="255" required>
                    @error('lastname')
                        <span class="text-danger text-sm" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <input class="form-control @error('password') is-invalid @enderror" placeholder="{{ __('index.register.password') }}" type="password" name="password" max="255" id="password" required>
                    <div class="text-muted font-italic d-none">
                        <small>password strength: <span class="text-success font-weight-700">strong</span></small>
                    </div>
                    @error('password')
                        <span class="text-danger text-sm" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <input class="form-control" placeholder="{{ __('index.register.c-password') }}" type="password" name="password_confirmation" max="255" id="password_confirmation" required>
                    @error('repeat_password')
                        <span class="text-danger text-sm" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <input class="form-control @error('email') is-invalid @enderror" placeholder="{{ __('index.register.email') }}" type="email" name="email" value="{{ old('email', '') }}" max="255" id="email" required>
                    @error('email')
                        <span class="text-danger text-sm" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <input class="form-control @error('telephone') is-invalid @enderror @error('phone') is-invalid @enderror w-100" placeholder="{{ __('index.register.phone') }}" type="tel" name="telephone" value="{{ old('telephone', '') }}" max="255" id="telephone" required>
                </div>
                <div class="form-group">
                    @error('telephone')
                        <span class="text-danger text-sm" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    @error('phone')
                        <span class="text-danger text-sm" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <input class="form-control @error('pesel') is-invalid @enderror" placeholder="{{ __('index.register.pesel') }}" type="number" name="pesel" value="{{ old('pesel', '') }}" maxlength="11" id="pesel" required>
                    @error('pesel')
                        <span class="text-danger text-sm" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                              <input class="form-control @error('street') is-invalid @enderror" placeholder="{{ __('index.register.street') }}" type="text" name="street" value="{{ old('street', '') }}" max="255" required>
                            @error('street')
                                <span class="text-danger text-sm" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        </div>
                          <div class="col-lg-6">
                            <div class="form-group">
                              <input class="form-control @error('house_number') is-invalid @enderror" placeholder="{{ __('index.register.number') }}" type="text" name="house_number" value="{{ old('house_number', '') }}" max="255" required>
                            @error('house_number')
                                <span class="text-danger text-sm" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                          </div>
                          </div>
                      </div>
                      <div class="input-group">
                        <input class="form-control @error('city') is-invalid @enderror" placeholder="{{ __('index.register.city') }}" type="text" name="city" value="{{ old('city', '') }}" max="255" required>
                        @error('city')
                            <span class="text-danger text-sm" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" style="resize: none" cols="30" rows="4" placeholder="{{ __('Powiedz coś o sobie w paru słowach') }}">{{ old('description', '') }}</textarea>
                    @error('description')
                        <span class="text-danger text-sm" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                    <label for="tshirt_size" class="d-none"> {{ __('index.register.tshirt') }}<span class="text-danger" role="alert">*</span></label>
                      <div class="form-group">
                        <select class="form-control @error('tshirt_size') is-invalid @enderror w-100" id="tshirt_size" name="tshirt_size" required>
                            <option>{{ __('index.register.tshirt') }}</option>
                            <option value="XS" @selected(old('tshirt_size') == "XS")>XS</option>
                            <option value="S" @selected(old('tshirt_size') == "S")>S</option>
                            <option value="M" @selected(old('tshirt_size') == "M")>M</option>
                            <option value="L" @selected(old('tshirt_size') == "L")>L</option>
                            <option value="XL" @selected(old('tshirt_size') == "XL")>XL</option>
                            <option value="XXL" @selected(old('tshirt_size') == "XXL")>XXL</option>
                        </select>
                        @error('tshirt_size')
                            <span class="text-danger text-sm" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>

                <div class="form-group">
                    <label for="Gender" class="text-sm ms-0 d-none">{{ __('index.register.gender') }}</label>
                    <select class="form-control @error('gender') is-invalid @enderror w-100" id="gender" name="gender" required>
                        <option>{{ __('index.register.gender') }}</option>
                        <option value="m" @selected(old('gender') == "m")>{{ __('index.register.gender-m') }}</option>
                        <option value="f" @selected(old('gender') == "f")>{{ __('index.register.gender-f') }}</option>
                    </select>
                    @error('gender')
                        <span class="text-danger text-sm" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group mt-2">
                    <label for="birth" class="text-sm ms-0">{{ __('index.register.birth') }}</label>
                    <input type="date" class="form-control @error('birth') is-invalid @enderror" name="birth" id="birth" value="{{ old('birth', '') }}" >
                      @error('birth')
                        <span class="text-danger text-sm" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="upload_image" class="mb-1 text-sm ms-0">{{ __('index.register.profile.text') }}</label><br>
                    <a href="#ProfileexampleModal" class="text-sm text-primary" data-bs-toggle="modal" data-bs-target="#ProfileexampleModal">Krótki poradnik jak poprawnie dodać zdjęcie</a>
                    <label for="upload_image" class="w-100 mt-2">
                        <a class="btn btn-info text-dark btn-icon w-100 mb-0">
                            <span class="btn-inner--icon"><i class="fas fa-camera"></i></span>
                            <span class="btn-inner--text">{{ __('index.register.profile.button') }}</span>
                        </a>
                        <input type="file" name="image" class="image d-none" id="upload_image" accept="image/*">
                        <input type="hidden" name="profile" id="icon_photo" value="" required>
                    </label>
                    <p class="text-success text-center" id="text-photo"></p>
                    @error('profile')
                        <span class="text-danger text-sm" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group mb-2">
                    <label class="text-sm m-0" for="agreement">{{ __('index.register.agreement.text1') }}</label><br>
                        <span class="font-weight-400 text-sm">{{ __('index.register.agreement.text2') }}:
                        <a class="font-weight-700 text-primary" href="{{ url('/files/zgoda_wolontariat_pelnoletni.pdf') }}" target="_blank">{{ __('index.register.agreement.adult') }}</a> |
                        <a class="font-weight-700 text-primary" href="{{ url('/files/zgoda_wolontariat_niepelnoletni.pdf') }}" target="_blank">{{ __('index.register.agreement.minor') }}</a></span><br>
                    <a href="#AgreementexampleModal" class="text-sm text-primary" data-bs-toggle="modal" data-bs-target="#AgreementexampleModal">Krótki poradnik jak poprawnie dodać zgodę</a>
                    <input type="file" class="form-control mt-2" accept=".pdf,.png,.jpg,.jepg" name="agreement[]" multiple required>
                    <small class="text-xs">{{ __('index.register.agreement.size') }}: 7MB</small>
                    @error('agreement')
                        <span class="text-danger text-sm" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    {!! NoCaptcha::display() !!}
                    @error('g-recaptcha-response')
                        <span class="text-danger text-sm" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-check form-check-info text-start">
                    <input class="form-check-input" type="checkbox" type="checkbox" name="terms" id="terms" >
                    <label class="form-check-label" for="terms">{{ __('index.register.accept') }} <a class="text-primary" href="{{ route('regulations') }}" target="_blank">{{ __('index.register.accept-r') }}</a> {{ __('main.and') }} <a class="text-primary" href="{{ route('codex') }}" target="_blank">{{ __('index.register.accept-c') }}</a>
                    </label><br>
                    @error('terms')
                          <span class="text-danger text-sm" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
                <div class="text-center">
                  <button type="submit" class="btn bg-gradient-dark w-100 my-2">{{ __('main.signin') }}</button>
                </div>
                <p class="text-sm mt-3 mb-0">Already have an account? <a href="javascript:;" class="text-dark font-weight-bolder">Sign in</a></p>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
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

  <div class="modal fade" id="ProfileexampleModal" tabindex="-1" role="dialog" aria-labelledby="ProfileexampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="ProfileexampleModalLabel">Jak poprawnie dodać zdjęcie profilowe</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <ol>
              <li>{{ __('Kliknij poniższy przycisk') }}</li>
              <li>{{ __('Wybierz zdjęcie z galerii (z widoczną twarzą - zdjęcie będzie wykorzystywane w identyfikatorach)') }}</li>
              <li>{{ __('Przytnij zdjęcie tak, by zdjęcie przedstawiało ciebie :)') }}</li>
          </ol>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zamknij</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="AgreementexampleModal" tabindex="-1" role="dialog" aria-labelledby="AgreementexampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="AgreementexampleModalLabel">Jak poprawnie dodać zgodę</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <ol>
              <li>{{ __('Wybierz odpowiednią zgodę (czy jesteś pełnoletni czy niepełnoletni)') }}</li>
              <li>{{ __('Ty lub opiekun prawny wypełnia zgodę') }}</li>
              <li>{{ __('Robisz skan lub zdjęcie/a zgody') }}</li>
              <li>{{ __('Wrzucasz plik (plik PDF lub zdjęcie/a JPG lub PNG)') }}</li>
          </ol>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zamknij</button>
        </div>
      </div>
    </div>
  </div>

@endsection

@section('style')
{!! NoCaptcha::renderJs(session('locale')) !!}
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.16/js/intlTelInput.min.js" integrity="sha512-Po9nSdYOcWIcoADdRjkAbRYPpR8OHjxzA/3RDUERZcDewTLzRTxbG4bUX7Sr7lVEcO3wTCzphdOBWgNFKVmxaA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.16/css/intlTelInput.css" integrity="sha512-gxWow8Mo6q6pLa1XH/CcH8JyiSDEtiwJV78E+D+QP0EVasFs8wKXq16G8CLD4CJ2SnonHr4Lm/yY2fSI2+cbmw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@push('scripts')
<script>
    var input = document.querySelector("#telephone");
    var iti = window.intlTelInput(input, {
    initialCountry: "auto",
    nationalMode: true,
    preferredCountries: ['pl', 'ua', 'cz'],
    formatOnDisplay:true,
    onlyCountries: ["al", "ad", "at", "by", "be", "ba", "bg", "hr", "cz", "dk",
    "ee", "fo", "fi", "fr", "de", "gi", "gr", "va", "hu", "is", "ie", "it", "lv",
    "li", "lt", "lu", "mk", "mt", "md", "mc", "me", "nl", "no", "pl", "pt", "ro",
    "ru", "sm", "rs", "sk", "si", "es", "se", "ch", "ua", "gb"],
    initialCountry: 'pl',
    utilsScript:
       "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
    });

    $("#register-form").submit(function() {$("#hidden").val(iti.getNumber());});

</script>

<script>
        const tshirt_size = new Choices(document.getElementById("tshirt_size"), {
            searchEnabled:false,
            shouldSort: false,
            placeholder: true,
        });

        const gender_choices = new Choices(document.getElementById("gender"), {
            searchEnabled:false,
            shouldSort: false,
            placeholder: true,
        });

</script>

<script>
    $(document).ready(function(){
        $("#pesel").focusout(function()
        {
            var s = $('#pesel').val();
            //Sprawdź długość, musi być 11 znaków
            if (SetError(s.length != 11))
            return;

            //Sprawdź, czy wszystkie znaki to cyfry
            var aInt = new Array();
            for (i=0;i<11; i++)
            {
            aInt[i] = parseInt(s.substring(i,i+1));
            if (isNaN(aInt[i]))
            {
                SetError(1);
                return;
            }
            }

            //Sprawdź sumę kontrolną
            var wagi = [1,3,7,9,1,3,7,9,1,3,1];
            var sum=0;
            for (i=0;i<11;i++)
            sum+=wagi[i]*aInt[i];
            if (SetError((sum%10)!=0))
            return;

            //Policz rok z uwzględnieniem XIX, XXI, XXII i XXIII wieku
            var year = 1900+aInt[0]*10+aInt[1];
            if (aInt[2]>=2 && aInt[2]<8)
            year+=Math.floor(aInt[2]/2)*100;
            if (aInt[2]>=8)
            year-=100;

            var month = (aInt[2]%2)*10+aInt[3];
            var day = aInt[4]*10+aInt[5];

            //Sprawdź poprawność daty urodzenia
            if (SetError(!checkDate(day,month,year)))
            return;
            var gender = (aInt[9]%2==1)?"m":"f";

            //Uzupełnij pola wchodzące w skład numeru PESEL
            if(month < 9)
            {
                month = "0"+month;
            }
            var birthday = year+"-"+month+"-"+day;
            $('#birth').val(birthday);
            if(gender == "f")
            {
                gender_choices.setChoiceByValue('f');
            } else {
                gender_choices.setChoiceByValue('m');
            }
        });
  function SetError(c){
    return c;
  }
  function checkDate(d,m,y)
  {
    var dt = new Date(y,m-1,d);
    return dt.getDate()==d &&
          dt.getMonth()==m-1 &&
          dt.getFullYear()==y;
  }
    });
</script>
@endpush
