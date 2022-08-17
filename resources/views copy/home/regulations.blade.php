@extends('layouts.app')

@section('title')
{{ __('index.footer.regulations') }}
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
              <a class="" href="{{ route('help_ukraine')  }}" target="_blank" rel="noopener noreferrer">
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
              <a href="{{ route('help_ukraine') }}" class="w-100 text-center mx-auto" target="_blank" rel="noopener noreferrer">
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
                <h1 class="display-1 text-white mt-3 font-weight-700">{{ Str::upper(__('index.footer.regulations')) }}</h1>
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

    <div class="container-fluid mt--8">

        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <ol type="I">
                            <li>ORGANIZATOR <br>
                                Miejski Ośrodek Sportu i Rekreacji w Rybniku
                                ul. Gliwicka 72, 44-200 Rybnik
                                <a href="mailto:wolontariat.mosirrybnik@gmail.com">wolontariat.mosirrybnik@gmail.com</a>
                                <a href="mailto:administrator@wolontariat.rybnik.pl">administrator@wolontariat.rybnik.pl</a>
                            </li>
                            <li>POSTANOWIENIA OGÓLNE <br>
                                <ol>
                                    <li>Regulamin określa ogólne zasady wolontariatu organizowanego przez MOSiR Rybnik.</li>
                                    <li>Wolontariuszem zostaje osoba, która zarejestruje się w systemie wolontariatu na stronie <a href="https://wolontariat.rybnik.pl">wolontariat.rybnik.pl</a>, dostarczy wszystkie potrzebne zgody oraz podpisze porozumienie o wolontariacie.</li>
                                    <li>Wolontariusz ochotniczo i bez wynagrodzenia wykonuje świadczenia na zasadach określonych w ustawie z dnia 24 kwietnia 2003 r. o działalności pożytku publicznego i o wolontariacie (tekst jedn. Dz. U. z 2016 r., poz. 1817, z późn. zm.).</li>
                                    <li>Wolontariuszem może być osoba, która ukończyła 13 lat.</li>
                                    <li>Wolontariuszem mogą zostać osoby niepełnoletnie pod warunkiem dostarczenia podpisanej zgody przez rodzica/opiekuna prawnego.</li>
                                    <li>Rodzic/opiekun prawny przyjmuje do wiadomości, że organizator wolontariatu nie bierze odpowiedzialności za dojazd i powrót wolontariusza z miejsca wykonywania powierzonych zadań.</li>
                                </ol>
                            </li>
                            <li>NABÓR I PRZYGOTOWANIE <br>
                                <ol>
                                    <li>Rejestracja w systemie wolontariatu dostępnym na stronie <a href="https://wolontariat.rybnik.pl/register">wolontariat.rybnik.pl/register</a></li>
                                    <li>Weryfikacja wszystkich danych, załączonych dokumentów przez Koordynatora.</li>
                                    <li>Wybór imprezy, a następnie wybór preferowanej funkcji, którą chce się pełnić podczas organizowanej imprezy.</li>
                                    <li>Weryfikacja listy zapisanych wolontariuszy przez Koordynatora, podział zadań i funkcji.</li>
                                    <li>Otrzymanie właściwych materiałów oraz informacji niezbędnych do wykonania przydzielonych zadań.</li>
                                    <li>Przeszkolenie do wykonywania przydzielonych zadań (w dniu imprezy lub wcześniej, uzależnione od charakteru wydarzenia)</li>
                                    <li>Odprawa w dniu imprezy, wyjaśnienie bieżących kwestii</li>
                                    <li>IMPREZA</li>
                                    <li>Informacja zwrotna na linii - WOLONTARIUSZ - KOORDYNATOR - podsumowanie</li>
                                </ol>
                            </li>
                            <li>ZASADY WSPÓŁPRACY I ZOBOWIĄZANIA ORGANIZATORA <br>
                                <ol>
                                    <li>Za wykonywane przez Wolontariusza świadczenia w ramach Wolontariatu nie przysługuje wynagrodzenie pieniężne.</li>
                                    <li>Organizator jest zobowiązany wystawić zaświadczenie/certyfikat/opinię o wykonywanej przez wolontariusza pracy.</li>
                                    <li>Organizator jest zobowiązany do informowania wolontariusza o ewentualnym ryzyku dla zdrowia i bezpieczeństwa, związanym z wykonywanymi przez niego zadaniami oraz o zasadach ochrony przed zagrożeniami,</li>
                                    <li>Organizator jest zobowiązany do informowania wolontariusza o przysługujących mu prawach i obowiązkach.</li>
                                    <li>Ubezpieczenie NNW – ubezpieczenie takie jest opłacane przez Organizatora wolontariatu w przypadku, gdy porozumienie z wolontariuszem zostało zawarte na okres nie dłuższy niż 30 dni. Przy podpisaniu porozumienia na okres dłuższy niż 30 dni, takie ubezpieczenie gwarantowane jest ustawą o działalności pożytku publicznego i wolontariacie.</li>
                                    <li>Organizator powinien wskazać wolontariuszowi elementy, które są niezbędne do prawidłowego wypełniania przez niego zadań, m.in.: zapewnienie wolontariuszowi bezpiecznych i higienicznych warunków wykonywania przez niego zadań, w tym też odpowiednie środki ochrony indywidualnej. Dotyczy to chociażby przebywania wolontariuszy poza budynkami w temperaturach ujemnych, czy też dostępu do sanitariatów przy wykonywaniu świadczeń podczas imprez sportowych.</li>
                                    <li>Decyzję o przydziale zadań poszczególnym wolontariuszom podejmuje Koordynator.</li>
                                    <li>Działaniami wolontariuszy zarządza Koordynator, lider wolontariuszy a także inni kierownicy stref.</li>
                                    <li>Każdy wolontariusz otrzyma unikalny ID i login (np. wolontariusz1), za pomocą tego
                                        będzie weryfikowany.</li>
                                </ol>
                            </li>
                            <li>ZOBOWIĄZANIA WOLONTARIUSZ <br>
                                <ol>
                                    <li>Wolontariusz zobowiązany jest do współpracy z Organizatorem, uczestnikami wydarzenia i innymi wolontariuszami z zachowaniem wysokich standardów kultury osobistej, zaangażowania i życzliwości.</li>
                                    <li>Wolontariusz zobowiązany jest do wykonywania poleceń Koordynatora w zakresie realizacji powierzonych zadań lub podejmowania innych zadań wynikających z bieżącej potrzeby Organizatora.</li>
                                    <li>Wolontariusz zobowiązany jest do dbania o mienie powierzone mu przez Organizatora na czas realizacji zadań.</li>
                                    <li>Wolontariusz zobowiązany jest do brania odpowiedzialności za swoje zobowiązania, np. w kwestii stawienia się na wolontariacie.</li>
                                    <li>Wolontariusz zobowiązany jest do nie spożywania i nie pozostawania pod wpływem alkoholu lub środków odurzających podczas realizacji zadań.</li>
                                    <li>O rezygnacji z wolontariatu Wolontariusz jest zobowiązany niezwłocznie powiadomić Koordynatora/Organizatora.</li>
                                    <li>Wolontariusz zobowiązuje się przestrzegać zasad zawartych w Regulaminie Wolontariatu, kodeksu wolontariusza oraz innych regulamin związanych z realizacją wydarzenia.</li>
                                    <li>Wolontariusz jest zobowiązany, by powiadomić koordynatora o ewentualnym spóźnieniu na daną imprezę.</li>
                                    <li>Wolontariusz nie może opuścić miejsca pracy bez poinformowania koordynatora</li>
                                    <li>Wolontariuszowi, który nie stawił się w miejscu imprezy (bez wcześniejszego powiadomienia), na którą się zapisał, zostaną odjęte punkty o wartości, którą otrzymałby za wykonanie zadania (nie dotyczy nagłych zdarzeń np. śmierć bliskiej osoby, wypadek komunikacyjny).</li>
                                </ol>
                            </li>
                            <li>SYSTEM MOTYWACYJNY <br>
                                <ol>
                                    <li>System motywacyjny został wprowadzony w celu aktywizacji osób zainteresowanych wolontariatem sportowym.</li>
                                    <li>Podczas zapisów na poszczególne imprezy będzie do zdobycia określona liczba punktów, w zależności od zadania.</li>
                                    <li>Dodatkowo, każdy wolontariusz będzie miał szansę powiększyć pulę swoich punktów poprzez dodatkowe zadania</li>
                                    <li>Wolontariusz może wymienić zdobyte punkty na nagrody, które znajdzie w zakładce Nagrody → Lista.</li>
                                    <li>Wolontariusz otrzymuje informację zwrotną zawierającą status przyznania nagrody.</li>
                                    <li>Nagroda jest przypisywana wolontariuszowi pod warunkiem, że ilość posiadanych przez niego punktów pozwala na wybraną nagrodę, a ono same jest nadal dostępne.</li>
                                    <li>Punktów nie można wymienić na gotówkę (nie dotyczy bonów pieniężnych).</li>
                                    <li>Raz wymienione punkty nie podlegają zwrotowi.</li>
                                    <li>Koordynator może przyznać Bonusowe Punkty każdemu wolontariuszowi bez podawania uzasadnienia.</li>
                                </ol>
                            </li>
                            <li>DANE OSOBOWE <br>
                                <ol>
                                    <li>Operatorem serwisu oraz Administratorem danych osobowych jest: MOSiR Rybnik ul. Gliwicka 72, 44-200 Rybnik</li>
                                    <li>Adres kontaktowy poczty elektronicznej administratora strony: <a href="mailto:administrator@wolontariat.rybnik.pl">administrator@wolontariat.rybnik.pl</a></li>
                                    <li>Wolontariuszowi przysługuje prawo dostępu do jego danych bądź żądania ich sprostowania. Jest to możliwe drogą mailową (mail wysyła rodzic/prawny opiekun wolontariusza, w przypadku, kiedy wolontariusz jest niepełnoletni), na adres: <a href="mailto:administrator@wolontariat.rybnik.pl">administrator@wolontariat.rybnik.pl</a></li>
                                    <li>Wolontariusz ma prawo również do wycofania zgody, ograniczenia przetwarzania lub usunięcia danych. Lecz będzie się to wiązać z tym, iż wolontariusz zostanie usunięty z systemu. Jest to możliwe drogą mailową (mail wysyła rodzic/prawny opiekun wolontariusza, w przypadku, kiedy wolontariusz jest niepełnoletni), na adres: <a href="mailto:administrator@wolontariat.rybnik.pl">administrator@wolontariat.rybnik.pl</a></li>
                                </ol>
                            </li>
                            <li>POSTANOWIENIA KOŃCOWE <br>
                                <ol>
                                    <li>MOSiR Rybnik i Wolontariusz mogą w każdym czasie rozwiązać porozumienie bez podania przyczyn, z zachowaniem 7 – dniowego okresu wypowiedzenia. Oświadczenie o rozwiązaniu porozumienia musi być złożone w formie pisemnej na adres email podany w punkcie I. pod rygorem nieważności.</li>
                                    <li>Jeżeli wolontariusz w ciągu dwóch lat nie weźmie udziału w imprezie, jego konto zostanie zawieszone. Ponowna aktywacja będzie możliwa po wysłaniu zdjęcia oraz niezbędnych dokumentów.</li>
                                    <li>W sprawach nieuregulowanych regulaminem zastosowanie mają przepisy Ustawy o działalności pożytku publicznego i o wolontariacie (t.j.Dz.U.z 2010r. Nr 234, poz.1536 ze zm.).</li>
                                    <li>Regulamin wchodzi w życie w dniu opublikowania.</li>
                                </ol>
                            </li>
                        </ol>
                    </div>
                  </div>
            </div>
        </div>
    </div>
  </div>

  @include('auth.footer')

@endsection

