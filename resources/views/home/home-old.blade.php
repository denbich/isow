@extends('layouts.app')

@section('title')
{{ __('home.title') }}
@endsection

@section('body')
    bg-gray-100
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
                  <a class="nav-link d-flex align-items-center me-2 active font-weight-bold" aria-current="page" href="{{ route('home') }}">
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
                <a class="nav-link me-2" href="{{ route('home') }}">
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
  <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-100 pt-8">
        <div class="container">
            <div class="row justify-content-between">
            <div class="col-lg-5 order-md-2 order-lg-1">
            <span class="subheading mb-2 aos-init aos-animate" data-aos="fade-up">Internetowy System Obsługi Wolontariatu</span>
            <h1 class="heading mb-3 aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">Wolontariat MOSiR Rybnik</h1>
            <p class="mb-5 aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">Wolontariusze MOSiR Rybnik to aktywna społeczność, która angażuje się w organizację wydarzeń na terenie całego Rybnika organizowanych przez Miejski Ośrodek Sportu i Rekreacji w Rybniku!</p>
            <p data-aos="fade-up" data-aos-delay="300" class="aos-init aos-animate"><a href="{{ route('login') }}" class="btn btn-primary mr-2">Zaloguj się</a> <a href="{{ route('register') }}" class="btn btn-outline-primary">Dołącz do nas!</a></p>
            </div>
            <div class="col-lg-6 order-md-1 order-lg-2">
            <div class="img-wrap aos-init aos-animate" data-aos="fade-left">
            <img src="https://preview.colorlib.com/theme/echo/images/xhero_1.png.pagespeed.ic.DAujTKLG4F.webp" alt="Image" class="img-fluid" data-pagespeed-url-hash="3169690791" onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
            </div>
            </div>
            </div>
            </div>
      </div>
    </section>
    <section>
        <div class="section pt-2">
            <div class="container">
                <div class="row mb-2">
                    <div class="col-lg-6 mx-auto text-center aos-init aos-animate" data-aos="fade-up">
                        <h1 class="heading">Jak do nas dołączyć?</h1>
                        <p>Wykonaj parę prostych kroków by stać się wolontariuszem MOSiR Rybnik!</p>
                    </div>
                </div>
                <div class="row g-5 text-center">
                    <div class="col-lg-4 aos-init aos-animate" data-aos="fade-up" data-aos-delay="0">
                        <div class="feature text-center">
                            <div class="text-lg text-dark"><i class="fa-solid fa-user-pen h2"></i></div>
                            <h3>Zrejestracja</h3>
                            <p>Kliknij poniższy przycisk by prześć do formularza rejestracji i wypełniasz wymagane pola</p>
                            <a href="{{ route('register') }}" class="btn btn-primary btn-sm">Zarejestruj się</a>
                        </div>
                    </div>
                    <div class="col-lg-4 aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
                        <div class="feature text-center">
                            <div class="text-lg text-dark"><i class="fa-solid fa-file-import h2"></i></div>
                            <h3>Zgoda</h3>
                            <p>Przesyłasz zgodę w formie zdjęcia (JPG lub PNG) lub w formie pliku PDF. (Wzory zgód znajdziesz podczas rejestracji)</p>
                        </div>
                    </div>
                    <div class="col-lg-4 aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
                        <div class="feature text-center">
                            <div class="text-lg text-dark"><i class="fa-solid fa-person-circle-check h2"></i></div>
                                <h3>Zaloguj się</h3>
                                <p>Po rejestracji możesz się zalogować! (Do czasu aktywacji przez koordynatora nie możesz zapisać się na żadne wydarzenie)</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <section>
        <div class="section pt-8">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-lg-6 h-100" data-aos="fade-up">
                        <img src="{{ url('img/volunteers.jpg') }}" alt="" class="w-100 my-1">
                    </div>
                <div class="col-lg-6 aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
                    <h2 class="heading mb-4">O nas</h2>
                    <p>Grupa Wolontariuszy MOSiR Rybnik powstała w 2017 roku. Zrzeszamy osoby w różnym wieku, które są zainteresowane pomocą przy organizacji imprez, a także są chętne do rozwoju własnych kompetencji. W początkowych latach grupa liczyła ponad 300 osób, które wybierały sobie pojedyncze imprezy zgodnie ze swoimi upodobaniami sportowymi.</p>
                    <p class="mb-3">W ramach wolontariatu braliśmy udział w 3 projektach europejskich Erasmus + Sport:</p>
                    <ul class="text-left">
                        <li><a href="https://vol4life.aiij.org/" target="_blank" rel="noopener noreferrer">Volunteering for Sporty and Healthy Life</a></li>
                        <li><a href="https://svt.aiij.org/" target="_blank" rel="noopener noreferrer">Skills Development for Sports Volunteering Trainers</a></li>
                        <li><a href="https://sport4change.aiij.org/" target="_blank" rel="noopener noreferrer">Sport for Change</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    </section>
    <section>
        <div class="section pt-5">
            <div class="container">
                <div class="row text-center mb-5 aos-init aos-animate" data-aos="fade-up">
                    <div class="col-lg-6 mx-auto text-center">
                        <h2 class="heading mb-4">Co możesz zyskać?</h2>
                    </div>
                </div>
                <div class="row justify-content-center text-center">
                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h3 class="text-primary">{{ __('home.section3.column1.header') }}</h3>
                                        <p class="text-dark font-weight-500">{{ __('home.section3.column1.text') }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h3 class="text-primary">{{ __('home.section3.column2.header') }}</h3>
                                        <p class="text-dark font-weight-500">{{ __('home.section3.column2.text') }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h3 class="text-primary">{{ __('home.section3.column3.header') }}</h3>
                                        <p class="text-dark font-weight-500">{{ __('home.section3.column3.text') }}</p>
                                    </div>
                                </div>
                            </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="section">
            <div id="sponsor_slider">

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
    AOS.init({
        startEvent: 'DOMContentLoaded',
        debounceDelay: 50,
        duration: 800,
        easing: 'slide',
        once: true
});
  </script>

<script>
var tnsSlider = tns({
    container: '#sponsor_slider',
    mode: 'carousel',
    speed: 700,
    items: 3,
    gutter: 10,
    autoplay: true,
    autoplayButtonOutput: false,
    controlsContainer: '#testimonial-nav',
    responsive: {
        0: {
            items: 1
        },
        700: {
            items: 2
        },
        1000: {
            items: 3
        }
    }
});</script>
@endpush

