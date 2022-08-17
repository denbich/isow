
@extends('layouts.app')

@section('title') {{ __('Lista wolontariuszy') }} @endsection

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
        @include('coordinator.include.dashboard')

        <li class="nav-item ps-1 pt-1">
            <a data-bs-toggle="collapse" href="#volunteers" class="nav-link active py-2" aria-controls="volunteers" role="button" aria-expanded="true">
                    <i class="fa-solid fa-users text-primary text-sm opacity-10"></i>
                <span class="nav-link-text ms-1">{{ __('Wolontariusze') }}</span>
            </a>
            <div class="collapse show" id="volunteers">
                <ul class="nav ms-4">
                    <li class="nav-item">
                        <a href="{{ route('c.v.search') }}" class="nav-link">
                          <span class="sidenav-normal"> {{ __('Wyszukaj') }} </span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{ route('c.v.list') }}" class="nav-link active">
                          <span class="sidenav-normal"> {{ __('Lista') }} </span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{ route('c.v.active') }}" class="nav-link">
                          <span class="sidenav-normal"> {{ _('Aktywuj') }} </span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{ route('c.v.other') }}" class="nav-link">
                          <span class="sidenav-normal"> {{ __('Inne') }} </span>
                        </a>
                      </li>
                </ul>
            </div>
        </li>

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
              <li class="breadcrumb-item text-sm text-white" aria-current="page">{{ __('Wolonariusze') }}</li>
              <li class="breadcrumb-item text-sm text-white" aria-current="page">{{ __('Wolontariusz') }}</li>
              <li class="breadcrumb-item text-sm text-white active" aria-current="page">{{ __('Edycja') }}</li>
            </ol>
            <h6 class="font-weight-bolder text-white mb-0">{{ $volunteer->user->name }}</h6>
          </nav>
          @include('coordinator.include.nav')
        </div>
      </nav>

    <div class="container-fluid py-4 min-vh-100">

        <div class="card shadow-lg mb-4">
        <div class="card-body p-3">
            <a href="{{ route('c.v.volunteer', [$volunteer->ivid]) }}">
                <div class="row gx-4">
                    <div class="col-auto">
                       <div class="avatar avatar-xl position-relative">
                          <img src="{{ url($volunteer->user->photo_src) }}" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
                       </div>
                    </div>
                    <div class="col-auto my-auto">
                       <div class="h-100">
                          <h5 class="mb-1">{{ $volunteer->user->firstname." ".$volunteer->user->lastname }}</h5>
                          <p class="mb-0 font-weight-bold text-sm">{{ $volunteer->user->name }}</p>
                       </div>
                    </div>
                 </div>
            </a>
         </div>
        </div>
        <div class="card h-100">
            <div class="card-header pb-0 p-3">
                <h6 class="mb-0">{{ __('Edytuj wolontariusza') }}</h6>
             </div>
            <div class="card-body">
                <form method="post" action="{{ route('c.v.volunteer.edit', [$volunteer->user->ivid]) }}" role="form" id="register-form">
                    @csrf
                <input id="hidden" type="hidden" name="phone">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-lg-6">
                                  <div class="form-group">
                                    <label class="form-control-label" for="firstname">{{ __('Imię') }}</label>
                                    <input class="form-control @error('firstname') is-invalid @enderror" maxlength="255" type="text" name="firstname" id="firstname" value="{{ $volunteer->user->firstname }}" required>
                                    @error('firstname')
                                        <div class="text-danger w-100 d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                  </div>
                                </div>
                                <div class="col-lg-6">
                                  <div class="form-group">
                                    <label class="form-control-label" for="lastname">{{ __('Nazwisko') }}</label>
                                    <input class="form-control @error('lastname') is-invalid @enderror" maxlength="255" type="text" name="lastname" id="lastname" value="{{ $volunteer->user->lastname }}" required>
                                    @error('lastname')
                                        <div class="text-danger w-100 d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                  </div>
                                </div>
                              </div>
                            <div class="row">
                                <div class="col-lg-6">
                                  <div class="form-group">
                                    <label class="form-control-label" for="telephone">{{ __('Numer telefonu') }}</label>
                                    <input class="form-control @error('telephone') is-invalid @enderror" maxlength="255" type="text" name="telephone" id="telephone" value="{{ $volunteer->user->telephone }}" required>
                                    @error('telephone')
                                        <div class="text-danger w-100 d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                  </div>
                                </div>
                                <div class="col-lg-6">
                                  <div class="form-group">
                                    <label class="form-control-label" for="email">{{ __('Adres email') }}</label>
                                    <input class="form-control @error('email') is-invalid @enderror" maxlength="255" type="text" name="email" id="email" value="{{ $volunteer->user->email }}" required>
                                    @error('email')
                                        <div class="text-danger w-100 d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                  </div>
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="birth">{{ __('Data urodzenia') }}</label>
                                        <input class="form-control @error('birth') is-invalid @enderror" maxlength="255" type="date" name="birth" id="birth" value="{{ $volunteer->birth }}" required>
                                        @error('birth')
                                            <div class="text-danger w-100 d-block">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                  </div>
                                <div class="col-lg-6">
                                  <div class="form-group">
                                    <label class="form-control-label">{{ __('index.register.gender') }}</label>
                                    <select class="form-control @error('gender') is-invalid @enderror w-100" id="gender" name="gender" required>
                                        <option>{{ __('index.register.gender') }}</option>
                                        <option value="m" @selected($volunteer->user->gender == "m")>{{ __('index.register.gender-m') }}</option>
                                        <option value="f" @selected($volunteer->user->gender == "f")>{{ __('index.register.gender-f') }}</option>
                                    </select>
                                    @error('gender')
                                        <span class="text-danger text-sm" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-lg-6">
                                    <label class="form-control-label" for="pesel">{{ __('index.register.pesel') }}</label>
                                    <input class="form-control @error('pesel') is-invalid @enderror" maxlength="255" type="texy" name="pesel" id="pesel" value="{{ Crypt::decrypt($volunteer->pesel) }}" required>
                                    @error('pesel')
                                        <div class="text-danger w-100 d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                  </div>
                                <div class="col-lg-6">
                                  <div class="form-group">
                                    <label for="tshirt_size"> {{ __('index.register.tshirt') }}</label>
                                        <select class="form-control @error('tshirt_size') is-invalid @enderror w-100" id="tshirt_size" name="tshirt_size" required>
                                            <option>{{ __('index.register.tshirt') }}</option>
                                            <option value="XS" @selected($volunteer->tshirt_size == "XS")>XS</option>
                                            <option value="S" @selected($volunteer->tshirt_size == "S")>S</option>
                                            <option value="M" @selected($volunteer->tshirt_size == "M")>M</option>
                                            <option value="L" @selected($volunteer->tshirt_size == "L")>L</option>
                                            <option value="XL" @selected($volunteer->tshirt_size == "XL")>XL</option>
                                            <option value="XXL" @selected($volunteer->tshirt_size == "XXL")>XXL</option>
                                        </select>
                                        @error('tshirt_size')
                                            <span class="text-danger text-sm" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                  </div>
                                </div>
                              </div>
                            <hr class="my-2"/>
                          <h6 class="heading-small text-muted mb-4">{{ __('Adres zamieszkania') }}</h6>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="form-control-label" for="street">{{ __('index.register.street') }}</label>
                                        <input class="form-control @error('street') is-invalid @enderror" type="text" name="street" value="{{ $volunteer->street }}" max="255" required>
                                        @error('street')
                                            <span class="text-danger text-sm" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                              <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="house_number">{{ __('index.register.number') }}</label>
                                    <input class="form-control @error('house_number') is-invalid @enderror" type="text" name="house_number" value="{{ $volunteer->house_number }}" max="255" required>
                                    @error('house_number')
                                        <span class="text-danger text-sm" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                              </div>
                              <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="city">{{ __('index.register.city') }}</label>
                                    <input class="form-control @error('city') is-invalid @enderror" type="text" name="city" value="{{ $volunteer->city }}" max="255" required>
                                    @error('city')
                                        <span class="text-danger text-sm" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                              </div>
                            </div>
                            <hr class="my-2" />
                            <div class="form-group">
                                <h6 class="heading-small text-muted mb-4">{{ __('O wolontariuszu') }}</h6>
                                <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" style="resize: none" cols="30" rows="4">{{ $volunteer->description }}</textarea>
                                @error('description')
                                    <span class="text-danger text-sm" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button class="btn bg-gradient-dark w-100">{{ __('Zaktualizuj wolontariusza') }}</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
      @include('coordinator.include.footer')
    </div>
  </main>
@endsection

@section('style')
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
    utilsScript:
       "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
    });

    $("#register-form").submit(function() {
        $("#telephone").val($("#telephone").val().replace(/[^+\d]+/g, ""));
        $("#hidden").val(iti.getNumber().replace(/[^+\d]+/g, ""));
    });

</script>

<script>
    const gender_choices = new Choices(document.getElementById("gender"), {
            searchEnabled:false,
            shouldSort: false,
            placeholder: true,
        });
        const tshirt_size = new Choices(document.getElementById("tshirt_size"), {
            searchEnabled:false,
            shouldSort: false,
            placeholder: true,
        });
</script>

    @if (session('update_volunteer'))
    <script>
    Swal.fire({
        icon: 'success',
        title: 'Aktualizacja wolontariusza przebiegła pomyślnie!',
        showConfirmButton: false,
        timer: 3000
    })
    </script>
    @endif
@endpush
