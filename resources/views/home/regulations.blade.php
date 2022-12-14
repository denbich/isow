@extends('layouts.app')

@section('title')
{{ __('index.footer.regulations') }}
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
                @auth <a href="{{ route('loginauth') }}" class="btn btn-sm mb-0 me-1 btn-primary">Przejd?? do panelu</a> @endauth
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
            <h1 class="text-white mb-2 mt-5">{{ __('index.footer.regulations') }}</h1>
            <h5 class="text-lead text-white d-none">{{ __('Na twojego maila przyjdzie kod i wpisz go poni??ej.') }}</h5>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row mt-lg-n10 mt-md-n11 mt-n10 justify-content-center">
        <div class="col-xl-9 col-lg-10 col-md-11 mx-auto">
          <div class="card z-index-0">
            <div class="card-body text-dark">
                <ol type="I">
                    <li>ORGANIZATOR <br>
                        Miejski O??rodek Sportu i Rekreacji w Rybniku
                        ul. Gliwicka 72, 44-200 Rybnik
                        <a href="mailto:wolontariat.mosirrybnik@gmail.com">wolontariat.mosirrybnik@gmail.com</a>
                        <a href="mailto:administrator@wolontariat.rybnik.pl">administrator@wolontariat.rybnik.pl</a>
                    </li>
                    <li>POSTANOWIENIA OG??LNE <br>
                        <ol>
                            <li>Regulamin okre??la og??lne zasady wolontariatu organizowanego przez MOSiR Rybnik.</li>
                            <li>Wolontariuszem zostaje osoba, kt??ra zarejestruje si?? w systemie wolontariatu na stronie <a href="https://wolontariat.rybnik.pl">wolontariat.rybnik.pl</a>, dostarczy wszystkie potrzebne zgody oraz podpisze porozumienie o wolontariacie.</li>
                            <li>Wolontariusz ochotniczo i bez wynagrodzenia wykonuje ??wiadczenia na zasadach okre??lonych w ustawie z dnia 24 kwietnia 2003 r. o dzia??alno??ci po??ytku publicznego i o wolontariacie (tekst jedn. Dz. U. z 2016 r., poz. 1817, z p????n. zm.).</li>
                            <li>Wolontariuszem mo??e by?? osoba, kt??ra uko??czy??a 13 lat.</li>
                            <li>Wolontariuszem mog?? zosta?? osoby niepe??noletnie pod warunkiem dostarczenia podpisanej zgody przez rodzica/opiekuna prawnego.</li>
                            <li>Rodzic/opiekun prawny przyjmuje do wiadomo??ci, ??e organizator wolontariatu nie bierze odpowiedzialno??ci za dojazd i powr??t wolontariusza z miejsca wykonywania powierzonych zada??.</li>
                        </ol>
                    </li>
                    <li>NAB??R I PRZYGOTOWANIE <br>
                        <ol>
                            <li>Rejestracja w systemie wolontariatu dost??pnym na stronie <a href="https://wolontariat.rybnik.pl/register">wolontariat.rybnik.pl/register</a></li>
                            <li>Weryfikacja wszystkich danych, za????czonych dokument??w przez Koordynatora.</li>
                            <li>Wyb??r imprezy, a nast??pnie wyb??r preferowanej funkcji, kt??r?? chce si?? pe??ni?? podczas organizowanej imprezy.</li>
                            <li>Weryfikacja listy zapisanych wolontariuszy przez Koordynatora, podzia?? zada?? i funkcji.</li>
                            <li>Otrzymanie w??a??ciwych materia????w oraz informacji niezb??dnych do wykonania przydzielonych zada??.</li>
                            <li>Przeszkolenie do wykonywania przydzielonych zada?? (w dniu imprezy lub wcze??niej, uzale??nione od charakteru wydarzenia)</li>
                            <li>Odprawa w dniu imprezy, wyja??nienie bie????cych kwestii</li>
                            <li>IMPREZA</li>
                            <li>Informacja zwrotna na linii - WOLONTARIUSZ - KOORDYNATOR - podsumowanie</li>
                        </ol>
                    </li>
                    <li>ZASADY WSP????PRACY I ZOBOWI??ZANIA ORGANIZATORA <br>
                        <ol>
                            <li>Za wykonywane przez Wolontariusza ??wiadczenia w ramach Wolontariatu nie przys??uguje wynagrodzenie pieni????ne.</li>
                            <li>Organizator jest zobowi??zany wystawi?? za??wiadczenie/certyfikat/opini?? o wykonywanej przez wolontariusza pracy.</li>
                            <li>Organizator jest zobowi??zany do informowania wolontariusza o ewentualnym ryzyku dla zdrowia i bezpiecze??stwa, zwi??zanym z wykonywanymi przez niego zadaniami oraz o zasadach ochrony przed zagro??eniami,</li>
                            <li>Organizator jest zobowi??zany do informowania wolontariusza o przys??uguj??cych mu prawach i obowi??zkach.</li>
                            <li>Ubezpieczenie NNW ??? ubezpieczenie takie jest op??acane przez Organizatora wolontariatu w przypadku, gdy porozumienie z wolontariuszem zosta??o zawarte na okres nie d??u??szy ni?? 30 dni. Przy podpisaniu porozumienia na okres d??u??szy ni?? 30 dni, takie ubezpieczenie gwarantowane jest ustaw?? o dzia??alno??ci po??ytku publicznego i wolontariacie.</li>
                            <li>Organizator powinien wskaza?? wolontariuszowi elementy, kt??re s?? niezb??dne do prawid??owego wype??niania przez niego zada??, m.in.: zapewnienie wolontariuszowi bezpiecznych i higienicznych warunk??w wykonywania przez niego zada??, w tym te?? odpowiednie ??rodki ochrony indywidualnej. Dotyczy to chocia??by przebywania wolontariuszy poza budynkami w temperaturach ujemnych, czy te?? dost??pu do sanitariat??w przy wykonywaniu ??wiadcze?? podczas imprez sportowych.</li>
                            <li>Decyzj?? o przydziale zada?? poszczeg??lnym wolontariuszom podejmuje Koordynator.</li>
                            <li>Dzia??aniami wolontariuszy zarz??dza Koordynator, lider wolontariuszy a tak??e inni kierownicy stref.</li>
                            <li>Ka??dy wolontariusz otrzyma unikalny ID i login (np. wolontariusz1), za pomoc?? tego
                                b??dzie weryfikowany.</li>
                        </ol>
                    </li>
                    <li>ZOBOWI??ZANIA WOLONTARIUSZ <br>
                        <ol>
                            <li>Wolontariusz zobowi??zany jest do wsp????pracy z Organizatorem, uczestnikami wydarzenia i innymi wolontariuszami z zachowaniem wysokich standard??w kultury osobistej, zaanga??owania i ??yczliwo??ci.</li>
                            <li>Wolontariusz zobowi??zany jest do wykonywania polece?? Koordynatora w zakresie realizacji powierzonych zada?? lub podejmowania innych zada?? wynikaj??cych z bie????cej potrzeby Organizatora.</li>
                            <li>Wolontariusz zobowi??zany jest do dbania o mienie powierzone mu przez Organizatora na czas realizacji zada??.</li>
                            <li>Wolontariusz zobowi??zany jest do brania odpowiedzialno??ci za swoje zobowi??zania, np. w kwestii stawienia si?? na wolontariacie.</li>
                            <li>Wolontariusz zobowi??zany jest do nie spo??ywania i nie pozostawania pod wp??ywem alkoholu lub ??rodk??w odurzaj??cych podczas realizacji zada??.</li>
                            <li>O rezygnacji z wolontariatu Wolontariusz jest zobowi??zany niezw??ocznie powiadomi?? Koordynatora/Organizatora.</li>
                            <li>Wolontariusz zobowi??zuje si?? przestrzega?? zasad zawartych w Regulaminie Wolontariatu, kodeksu wolontariusza oraz innych regulamin zwi??zanych z realizacj?? wydarzenia.</li>
                            <li>Wolontariusz jest zobowi??zany, by powiadomi?? koordynatora o ewentualnym sp????nieniu na dan?? imprez??.</li>
                            <li>Wolontariusz nie mo??e opu??ci?? miejsca pracy bez poinformowania koordynatora</li>
                            <li>Wolontariuszowi, kt??ry nie stawi?? si?? w miejscu imprezy (bez wcze??niejszego powiadomienia), na kt??r?? si?? zapisa??, zostan?? odj??te punkty o warto??ci, kt??r?? otrzyma??by za wykonanie zadania (nie dotyczy nag??ych zdarze?? np. ??mier?? bliskiej osoby, wypadek komunikacyjny).</li>
                        </ol>
                    </li>
                    <li>SYSTEM MOTYWACYJNY <br>
                        <ol>
                            <li>System motywacyjny zosta?? wprowadzony w celu aktywizacji os??b zainteresowanych wolontariatem sportowym.</li>
                            <li>Podczas zapis??w na poszczeg??lne imprezy b??dzie do zdobycia okre??lona liczba punkt??w, w zale??no??ci od zadania.</li>
                            <li>Dodatkowo, ka??dy wolontariusz b??dzie mia?? szans?? powi??kszy?? pul?? swoich punkt??w poprzez dodatkowe zadania</li>
                            <li>Wolontariusz mo??e wymieni?? zdobyte punkty na nagrody, kt??re znajdzie w zak??adce Nagrody ??? Lista.</li>
                            <li>Wolontariusz otrzymuje informacj?? zwrotn?? zawieraj??c?? status przyznania nagrody.</li>
                            <li>Nagroda jest przypisywana wolontariuszowi pod warunkiem, ??e ilo???? posiadanych przez niego punkt??w pozwala na wybran?? nagrod??, a ono same jest nadal dost??pne.</li>
                            <li>Punkt??w nie mo??na wymieni?? na got??wk?? (nie dotyczy bon??w pieni????nych).</li>
                            <li>Raz wymienione punkty nie podlegaj?? zwrotowi.</li>
                            <li>Koordynator mo??e przyzna?? Bonusowe Punkty ka??demu wolontariuszowi bez podawania uzasadnienia.</li>
                        </ol>
                    </li>
                    <li>DANE OSOBOWE <br>
                        <ol>
                            <li>Operatorem serwisu oraz Administratorem danych osobowych jest: MOSiR Rybnik ul. Gliwicka 72, 44-200 Rybnik</li>
                            <li>Adres kontaktowy poczty elektronicznej administratora strony: <a href="mailto:administrator@wolontariat.rybnik.pl">administrator@wolontariat.rybnik.pl</a></li>
                            <li>Wolontariuszowi przys??uguje prawo dost??pu do jego danych b??d?? ????dania ich sprostowania. Jest to mo??liwe drog?? mailow?? (mail wysy??a rodzic/prawny opiekun wolontariusza, w przypadku, kiedy wolontariusz jest niepe??noletni), na adres: <a href="mailto:administrator@wolontariat.rybnik.pl">administrator@wolontariat.rybnik.pl</a></li>
                            <li>Wolontariusz ma prawo r??wnie?? do wycofania zgody, ograniczenia przetwarzania lub usuni??cia danych. Lecz b??dzie si?? to wi??za?? z tym, i?? wolontariusz zostanie usuni??ty z systemu. Jest to mo??liwe drog?? mailow?? (mail wysy??a rodzic/prawny opiekun wolontariusza, w przypadku, kiedy wolontariusz jest niepe??noletni), na adres: <a href="mailto:administrator@wolontariat.rybnik.pl">administrator@wolontariat.rybnik.pl</a></li>
                        </ol>
                    </li>
                    <li>POSTANOWIENIA KO??COWE <br>
                        <ol>
                            <li>MOSiR Rybnik i Wolontariusz mog?? w ka??dym czasie rozwi??za?? porozumienie bez podania przyczyn, z zachowaniem 7 ??? dniowego okresu wypowiedzenia. O??wiadczenie o rozwi??zaniu porozumienia musi by?? z??o??one w formie pisemnej na adres email podany w punkcie I. pod rygorem niewa??no??ci.</li>
                            <li>Je??eli wolontariusz w ci??gu dw??ch lat nie we??mie udzia??u w imprezie, jego konto zostanie zawieszone. Ponowna aktywacja b??dzie mo??liwa po wys??aniu zdj??cia oraz niezb??dnych dokument??w.</li>
                            <li>W sprawach nieuregulowanych regulaminem zastosowanie maj?? przepisy Ustawy o dzia??alno??ci po??ytku publicznego i o wolontariacie (t.j.Dz.U.z 2010r. Nr 234, poz.1536 ze zm.).</li>
                            <li>Regulamin wchodzi w ??ycie w dniu opublikowania.</li>
                        </ol>
                    </li>
                </ol>
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
            Copyright ?? 2019 -<script> document.write(new Date().getFullYear()) </script> <a href="https://linktr.ee/denis.bichler" class="font-weight-bold ml-1" target="_blank">Denis Bichler for MOSiR Rybnik</a>
          </p>
        </div>
      </div>
    </div>
  </footer>

@endsection
