
@extends('layouts.app')

@section('title') {{ __('Formularz') }} @endsection

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
        @include('coordinator.include.volunteer')
        @include('coordinator.include.chat')
        @include('coordinator.include.send_mail')
        <li class="nav-item mt-3">
            <h6 class="ps-3 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">{{ __('Moduły') }}</h6>
          </li>
          <li class="nav-item ps-1 pt-1">
            <a data-bs-toggle="collapse" href="#forms" class="nav-link active py-2" aria-controls="forms" role="button" aria-expanded="true">
                    <i class="fa-solid fa-clipboard-list text-primary text-sm opacity-10"></i>
                <span class="nav-link-text ms-1">{{ __('Formularze') }}</span>
            </a>
            <div class="collapse show" id="forms">
                <ul class="nav ms-4">
                    <li class="nav-item active">
                        <a href="{{ route('c.form.list') }}" class="nav-link">
                          <span class="sidenav-normal"> {{ __('Lista') }} </span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="{{ route('c.form.archive') }}">
                          <span class="sidenav-normal"> {{ __('Archiwum') }} </span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{ route('c.formcategory.list') }}" class="nav-link">
                          <span class="sidenav-normal"> {{ __('Kategorie') }} </span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{ route('c.form.create') }}" class="nav-link">
                          <span class="sidenav-normal"> {{ __('Utwórz nowy') }} </span>
                        </a>
                      </li>
                </ul>
            </div>
        </li>
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
              <li class="breadcrumb-item text-sm text-white" aria-current="page">{{ __('Formularze') }}</li>
              <li class="breadcrumb-item text-sm text-white active" aria-current="page">{{ __('Formularz') }}</li>
            </ol>
            <h6 class="font-weight-bolder text-white mb-0">{{ $form->form_translate->title }}</h6>
          </nav>
          @include('coordinator.include.nav')
        </div>
      </nav>

    <div class="container-fluid py-4 min-vh-100">
        <div class="row">
            <div class="col-lg-3 order-lg-2">
                <div class="card h-100">
                    <div class="card-header pb-1">
                        <h5 class="mb-0 text-capitalize">{{ __('Opcje') }}</h5>
                    </div>
                  <div class="card-body pt-1">
                      @if ($form->expiration <= date('Y-m-d H:i:s'))
                          @if (!empty($signs->pluck('condition')->countBy()->toArray()) && (isset($signs->pluck('condition')->countBy()->toArray()[0]) || isset($signs->pluck('condition')->countBy()->toArray()[1])))
                            @if (isset($signs->pluck('condition')->countBy()->toArray()[0]) && $signs->pluck('condition')->countBy()->toArray()[0] > 0)
                                <button type="button" class="btn btn-success w-100" data-bs-toggle="modal" data-bs-target="#Modalstart">{{ __('Wznów zapisy') }}</button>
                                <a href="{{ route('c.form.positions', [$form->ivid]) }}" class="btn btn-primary w-100 my-2">{{ __('Przydziel stanowiska') }}</a>
                            @elseif(isset($signs->pluck('condition')->countBy()->toArray()[1]) && !isset($signs->pluck('condition')->countBy()->toArray()[0]))
                                @if ($signs->pluck('condition')->countBy()->toArray()[1] > 0)
                                <a href="{{ route('c.form.positions', [$form->ivid]) }}" class="btn btn-primary w-100 my-2">{{ __('Przydziel stanowiska') }}</a>
                                <a href="{{ route('c.form.presence', [$form->ivid]) }}" class="btn btn-primary w-100 my-2">{{ __('Przydziel obecność') }}</a>
                                <a href="{{ route('c.form.sign', [$form->ivid]) }}" class="btn btn-primary w-100 my-2 d-none">Zapisz obecność (BETA)</a>
                                @endif
                            @endif
                            @else
                            <a href="{{ route('c.form.viewpresence', [$form->ivid]) }}" class="btn btn-primary w-100 my-2">{{ __('Sprawdź obecność') }}</a>
                          @endif
                      @else
                              <button type="button" class="btn btn-success w-100 my-2" data-bs-toggle="modal" data-bs-target="#stopmodal">{{ __('Zakończ zapisy') }}</button>
                      @endif
                      <hr class="my-2">
                      <a href="{{ route('c.post.create') }}" class="btn btn-primary w-100 my-2">{{ __('Utwórz post') }}</a>
                      <button type="button" class="btn btn-primary w-100 my-2" data-bs-toggle="modal" data-bs-target="#addvolunteermodal">{{ __('Dodaj wolontariusza do formularza') }}</button>
                      <hr class="my-2">
                      <button type="button" class="btn btn-primary w-100 my-2" data-bs-toggle="modal" data-bs-target="#idmodal">{{ __('Generuj identyfikatory') }}</button>
                      <button data-bs-toggle="modal" data-bs-target="#generatemodal" class="btn btn-primary w-100 my-2">{{ __('Generuj listę wolontariuszy') }}</button>
                      <a href="{{ route('c.form.raport', [$form->ivid]) }}" class="btn btn-primary w-100 my-2">{{ __('Generuj raport formularza') }}</a>
                      <hr class="my-2">
                      <a href="{{ route('c.form.edit', [$form->ivid]) }}" class="btn btn-success w-100 my-2 text-white">{{ __('Edytuj formularz') }}</a>
                      <button class="btn btn-danger w-100 my-2" data-bs-toggle="modal" data-bs-target="#deletemodal">{{ __('Usuń formularz') }}</button>
                  </div>
                </div>
              </div>
              <div class="col-lg-9 order-lg-1">
                <div class="card h-100">
                    <div class="card-header pb-1">
                        <h5 class="mb-0 text-capitalize">{{ __('Ogólne informacje') }}</h5>
                    </div>
                    <div class="card-body">
                        <div class="row pt-2">
                            <div class="col-lg-4">
                                <img src="{{ $form->icon_src }}" alt="icon form" class="w-100 img-responsive">
                            </div>
                            <div class="col-lg-8">
                                <div class="text-center">
                                    <h5>{{ __('Kategoria formularza') }} - <a class="text-dark" href="{{ route('c.formcategory.show', [$form->form_category->ivid]) }}">{{ $form->form_category->form_category_translate->name }}</a></h5>
                                    <h5>{{ date('d.m.Y H:i', strtotime($form->calendar->start)) }} - {{ date('d.m.Y H:i', strtotime($form->calendar->end)) }}</h5>
                                </div>

                                {!! $form->form_translate->description !!}
                            </div>
                        </div>
                    </div>
                </div>
              </div>
        </div>

        <div class="card mt-4">
            <div class="card-header pb-0">
                <h5 class="mb-0">@lang('Lista stanowisk')</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    @foreach ($positions as $position)
                    <div class="col-lg-3 my-1">
                        <div class="card shadow-lg h-100">
                            <div class="card-header pb-0"><h6 class="mb-0">{{ $position->form_position_translate->title }}</h6></div>
                            <div class="card-body">
                                <p><b>{{ __('volunteer.form.form.positions.workhours') }}:</b> {{ date('H:i', strtotime($position->start))." - ".date('H:i', strtotime($position->end)) }}</p>
                                <p><b>{{ __('volunteer.form.form.positions.points') }}:</b> {{ $position->points }}</p>
                                <p><b>{{ __('volunteer.form.form.positions.demand') }}:</b> {{ $position->max_volunteer }}</p>
                                <p><b>{{ __('volunteer.form.form.positions.count') }}:</b> {{ $position->signed_form_count }}</p>
                                <p>{{ $position->form_position_translate->description }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="card mt-4">
            <div class="card-header">
                <h5 class="mb-0">Lista zapisanych wolontariuszy </h5>
            </div>
            @if ($signs != null && count($signs) > 0)
            <div class="table-responsive">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Wolontariusz</th>
                      <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Dane kontakowe</th>
                      <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Stanowisko</th>
                      <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Wiek</th>
                      <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Opcje</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($signs as $sign)
                    <tr>
                        <td>
                          <div class="d-flex px-2 py-1">
                            <div>
                              <img src="{{ url($sign->volunteer->photo_src) }}" class="avatar avatar-sm me-3">
                            </div>
                            <div class="d-flex flex-column justify-content-center">
                              <span class="mb-0 font-weight-bold">{{ $sign->volunteer->firstname." ".$sign->volunteer->lastname }}</span>
                              <span class="text-secondary text-xs mb-0">{{ $sign->volunteer->name }}</span>
                            </div>
                          </div>
                        </td>
                        <td>
                          <div class="d-flex px-2 py-1">
                            <div class="d-flex flex-column justify-content-center">
                              <span class="mb-0 text-secondary font-weight-bold"><a href="tel:{{ $sign->volunteer->telephone }}">{{ $sign->volunteer->telephone }}</a></span>
                              <span class="mb-0 text-secondary font-weight-bold"><a href="mailto:{{ $sign->volunteer->email }}">{{ $sign->volunteer->email }}</a></span>
                            </div>
                          </div>
                        </td>
                        <td>
                          <p class="font-weight-bold mb-0">{{ $sign->position->form_position_translate->title }}</p>
                        </td>
                        <td class="align-middle">
                            @if ($sign->volunteer->volunteer->birth <= date('Y-m-d', strtotime(date('Y-m-d'). ' - 18 years')))
                            @if ($sign->volunteer->gender == "f")
                                    <span class="badge badge-success">{{ __('Pełnoletna') }}</span>
                                @else
                                    <span class="badge badge-danger">{{ __('Pełnoletni') }}</span>
                                @endif
                            @elseif ($sign->volunteer->volunteer->birth >= date('Y-m-d', strtotime(date('Y-m-d'). ' - 18 years')) && $sign->volunteer->volunteer->birth < date('Y-m-d', strtotime(date('Y-m-d'). ' - 16 years')))
                            <span class="badge badge-info">+16</span>
                            @else
                                @if ($sign->volunteer->gender == "f")
                                    <span class="badge badge-success">{{ __('Niepełnoletnia') }}</span>
                                @else
                                    <span class="badge badge-danger">{{ __('Niepełnoletni') }}</span>
                                @endif
                            @endif


                        </td>
                        <td class="align-middle text-center">
                          <a href="#deletevolunteermodal{{ $sign->id }}"  data-bs-toggle="modal" data-bs-target="#deletevolunteermodal{{ $sign->id }}" class="font-weight-bold" data-toggle="tooltip" data-original-title="Edit user"><i class="fa-solid fa-xmark text-danger"></i></a>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            @else
              <div class="card-body">
                <h4 class="text-center text-danger">{{ __('Żaden wolontariusz się nie zapisał!') }}</h4>
              </div>
            @endif

        </div>

      @include('coordinator.include.footer')
    </div>
  </main>

  <div class="modal fade" id="Modalstart" tabindex="-1" role="dialog" aria-labelledby="startModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
      <form action="{{ route('c.form.startsign', [$form->ivid]) }}" method="post">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title" id="startModalLabel">{{ __('Wznów zapisy') }}</h5>
        </div>
        <div class="modal-body">

            <div class="form-group">
                <label for="end">{{ __('Wybierz datę do kiedy mają trwać zapisy') }}</label>
                <div class="input-group input-group-merge input-group-alternative mb-3">
                    <input type="datetime-local" id="end" class="form-control" name="end" required>
                  </div>

            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('main.cancel') }}</button>
          <button type="submit" class="btn btn-primary">{{ __('Zatwierdź') }}</button>
        </div>
    </form>
      </div>
    </div>
  </div>

  <div class="modal fade" id="stopmodal" tabindex="-1" role="dialog" aria-labelledby="stopModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="stopModalLabel">{{ __('Zakończenie zapisów') }}</h5>
        </div>
        <div class="modal-body">
          <h3 class="w-100 text-wrap text-center">{{ __('Czy jesteś pewnien, że chcesz zakończyć zapisy?') }}</h3>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('main.cancel') }}</button>
          <form action="{{ route('c.form.stopsign', [$form->ivid]) }}" method="post">
            @csrf
            <button type="submit" class="btn btn-danger">{{ __('Zakończ') }}</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="ModalLabel">{{ __('Usuń formularz') }}</h5>
        </div>
        <div class="modal-body">
          <h4 class="w-100 text-wrap text-center">{{ __('Czy jesteś pewnien, że chcesz usunąć formularz') }} "{{ $form->form_translate->title  }}"?</h4>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('main.cancel') }}</button>
          <form action="{{ route('c.form.destroy', [$form->ivid]) }}" method="post" id="delete_form">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger" id="delete_button">{{ __('Usuń') }}</button>
          </form>
        </div>
      </div>
    </div>
  </div>


  <div class="modal fade" id="idmodal" tabindex="-1" role="dialog" aria-labelledby="idModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
      <form action="{{ route('c.form.id', [$form->ivid]) }}" method="post" role="form" id="generete_id_form">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title" id="idModalLabel">{{ __('Generuj indentyfikatory') }}</h5>
        </div>
        <div class="modal-body pt-0">
            <div class="form-group">
                <h4 class="text-center">{{ __('Motyw') }}</h4>
                <div class="form-group">
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" id="themewithlogin" name="theme" value="1" required checked>
                        <label class="custom-control-label" for="themewithlogin">{{ __('Nowoczesny') }}</label>
                      </div>
                      <div class="form-check mb-2 d-none">
                        <input class="form-check-input" type="radio" id="themewithoutlogin" name="theme" value="2" required disabled>
                        <label class="custom-control-label" for="themewithoutlogin">{{ __('Nowoczesny z flagami') }}</label>
                      </div>
                      <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" id="themewithyellowlogo" name="theme" value="3" required>
                        <label class="custom-control-label" for="themewithyellowlogo">{{ __('Nowoczesny z białymi logo') }}</label>
                      </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" id="themesimpleyellow" name="theme" value="4" required>
                        <label class="custom-control-label" for="themesimpleyellow">{{ __('Prosty - Żółty') }}</label>
                      </div>
                      <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" id="themesimpleblue" name="theme" value="5" required>
                        <label class="custom-control-label" for="themesimpleblue">{{ __('Klasyczny - niebieski') }}</label>
                      </div>
                </div>

                  <h4 class="text-center">{{ __('Logo') }}</h4>
                    <div class="form-group">
                        <div class="form-check">
                            <input type="checkbox" name="logocustom" class="form-check-input" id="logocustom" checked>
                            <label class="custom-control-label" for="logocustom">{{ __('Dodaj logo formularza') }}</label>
                        </div>
                    </div>
                    <h4 class="text-center">{{ __('Tył identyfikatora z numerami') }}</h4>
                        <div class="form-group">
                            <div class="form-check">
                                <input type="checkbox" name="withnumbers" class="form-check-input" id="withnumbers" checked>
                                <label class="custom-control-label" for="withnumbers">{{ __('Tył z numerami') }}</label>
                            </div>
                        </div>
                        <div id="id_numbers" class="">
                            <div class="form-group">
                                <label for="name1" class="form-control-label">{{ _('Nazwa działu 1') }}</label>
                                <input type="text" class="form-control" name="name1" id="name1" max="255">

                                <label for="number1" class="form-control-label">{{ _('Imię i nazwisko - numer #1') }}</label>
                                <input type="tel" class="form-control" name="number1" id="number1" max="255">
                            </div>
                            <hr>
                            <div class="form-group">
                                <label for="name2" class="form-control-label">{{ _('Nazwa działu 2') }}</label>
                                <input type="text" class="form-control" name="name2" id="name2" max="255">

                                <label for="number2" class="form-control-label">{{ _('Imię i nazwisko - numer #2') }}</label>
                                <input type="tel" class="form-control" name="number2" id="number2" max="255">
                            </div>
                            <hr>
                            <div class="form-group">
                                <label for="name3" class="form-control-label">{{ _('Nazwa działu 3') }}</label>
                                <input type="text" class="form-control" name="name3" id="name3" max="255">

                                <label for="number3" class="form-control-label">{{ _('Imię i nazwisko - numer #3') }}</label>
                                <input type="tel" class="form-control" name="number3" id="number3" max="255">
                            </div>
                            <hr>
                            <div class="form-group">
                                <label for="name4" class="form-control-label">{{ _('Nazwa działu 4') }}</label>
                                <input type="text" class="form-control" name="name4" id="name4" max="255">

                                <label for="number4" class="form-control-label">{{ _('Imię i nazwisko - numer #4') }}</label>
                                <input type="tel" class="form-control" name="number4" id="number4" max="255">
                            </div>
                            <hr>
                            <div class="form-group">
                                <label for="name5" class="form-control-label">{{ _('Nazwa działu 5') }}</label>
                                <input type="text" class="form-control" name="name5" id="name5" max="255">

                                <label for="number5" class="form-control-label">{{ _('Imię i nazwisko - numer #5') }}</label>
                                <input type="tel" class="form-control" name="number5" id="number5" max="255">
                            </div>
                            <hr>
                            <div class="form-group">
                                <label for="name6" class="form-control-label">{{ _('Nazwa działu 6') }}</label>
                                <input type="text" class="form-control" name="name6" id="name6" max="255">

                                <label for="number6" class="form-control-label">{{ _('Imię i nazwisko - numer #6') }}</label>
                                <input type="tel" class="form-control" name="number6" id="number6" max="255">
                            </div>
                        </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('main.cancel') }}</button>
          <button type="submit" class="btn btn-primary" id="generete_id_button">{{ __('Generuj') }}</button>
        </div>
    </form>
      </div>
    </div>
  </div>

  <div class="modal fade" id="generatemodal" tabindex="-1" role="dialog" aria-labelledby="generatemodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="generatemodalLabel">{{ __('Generuj listę wolontariuszy') }}</h5>
        </div>
        <form action="{{ route('c.form.volunteers', [$form->ivid]) }}" method="post" role="form" id="generate_list_form">
        <div class="modal-body pt-1">
          <h4 class="text-center mb-5">{{ __('Wybierz typ pliku') }}</h4>
              @csrf
                  <div class="form-group">
                    <div class="form-check">
                        <input type="radio" id="pdftype" name="filetype" value="pdf" class="form-check-input" checked>
                        <label class="custom-control-label" for="pdftype">{{ __('Plik PDF (.pdf)') }}</label>
                      </div>
                      <div class="form-check">
                        <input type="radio" id="exceltype" name="filetype" value="excel" class="form-check-input">
                        <label class="custom-control-label" for="exceltype">{{ __('Excel (.xlsx)') }}</label>
                      </div>
                      <div class="form-check">
                        <input type="radio" id="htmltype" name="filetype" value="html" class="form-check-input">
                        <label class="custom-control-label" for="htmltype">{{ __('HTML (.html)') }}</label>
                      </div>
                </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('main.cancel') }}</button>
          <button type="submit" class="btn btn-primary" id="generate_list_button">{{ __('Generuj') }}</button>
        </div>
        </form>
      </div>
    </div>
  </div>

  <div class="modal fade" id="addvolunteermodal" tabindex="-1" role="dialog" aria-labelledby="addvolunteerLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addvolunteerLabel">{{ __('Dodaj wolontariusza do formularza') }}</h5>
        </div>
        <form action="{{ route('c.form.addvolunteer', [$form->ivid]) }}" method="post" role="" id="add_volunteer_form">
        <div class="modal-body pt-1">
              @csrf
                  <div class="form-group">
                    <label for="volunteer_select">{{ __('Wybierz wolontariusza') }}</label>
                    <select name="volunteer" id="volunteer_select" class="form-control" required>
                        @forelse ($volunteers as $volunteer)
                            <option value="{{ $volunteer->ivid }}">{{ $volunteer->firstname." ".$volunteer->lastname." (".$volunteer->name.")" }}</option>
                        @empty
                            <option selected disabled>{{ __('Brak wolontariuszy lub każdy wolontariusz się zapisał!') }}</option>
                        @endforelse
                    </select>
                </div>
                <div class="form-group">
                    <label for="volunteer_select">{{ __('Wybierz stanowisko') }}</label>
                    <select name="position" id="position_select" class="form-control" required>
                        @foreach ($positions as $position)
                            <option value="{{ $position->ivid }}">{{ $position->form_position_translate->title }}</option>
                        @endforeach
                    </select>
                </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('main.cancel') }}</button>
          <button type="submit" class="btn btn-primary" id="add_volunteer_button">{{ __('Dodaj') }}</button>
        </div>
        </form>
      </div>
    </div>
  </div>

  @forelse ($signs as $sign)
  <div class="modal fade" id="deletevolunteermodal{{ $sign->id }}" tabindex="-1" role="dialog" aria-labelledby="deletevolunteermodal{{ $sign->id }}Label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deletevolunteermodal{{ $sign->id }}Label">{{ __('Usuń wolontariusza z formularza') }}</h5>
        </div>
        <form action="{{ route('c.form.removevolunteer') }}" method="post" role="form" id="delete_volunteer_form{{ $sign->id }}">
        <div class="modal-body pt-1">
              @csrf
              <input type="hidden" name="ivid" value="{{ $sign->volunteer->ivid }}">
              <h4 class="w-100 text-wrap text-center">{{ __('Czy jesteś pewnien, że chcesz usunąć tego wolontariusza z formularza?') }} - {{ $sign->volunteer->firstname." ".$sign->volunteer->lastname." (".$sign->volunteer->name.")" }}</h4>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('main.cancel') }}</button>
          <button type="submit" class="btn btn-danger" id="delete_volunteer_button{{ $sign->id }}">{{ __('Usuń') }}</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  @empty

  @endforelse
@endsection


@push('scripts')

<script>
    $("#withnumbers").change(function (){
        if($(this).is(":checked")){
            $('#id_numbers').removeClass('d-none');
        } else {
            $('#id_numbers').addClass('d-none');
        }
    });
</script>

<script>
    $('#generete_id_form').submit(function(){
        $('#generete_id_button').prop('disabled', true);
        $('#generete_id_button').prepend('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> ');
    });

    $('#add_volunteer_form').submit(function(){
        $('#add_volunteer_button').prop('disabled', true);
        $('#add_volunteer_button').prepend('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> ');
    });

    $('#generate_list_form').submit(function(){
        $('#generate_list_button').prop('disabled', true);
        $('#generate_list_button').prepend('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> ');
    });

    $('#delete_form').submit(function(){
        $('#delete_button').prop('disabled', true);
        $('#delete_button').prepend('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> ');
    });

    @forelse ($signs as $sign)
    $('#delete_volunteer_form{{ $sign->id }}').submit(function(){
        $('#delete_volunteer_button{{ $sign->id }}').prop('disabled', true);
        $('#delete_volunteer_button{{ $sign->id }}').prepend('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> ');
    });
    @empty

    @endforelse
</script>

<script>
     var volunteer_select = new Choices(document.getElementById("volunteer_select"), {
            searchEnabled:false,
            shouldSort: false,
            placeholder: true,
        });
        var position_select = new Choices(document.getElementById("position_select"), {
            searchEnabled:false,
            shouldSort: false,
            placeholder: true,
        });
</script>

    @error('end')
    <script>
        Swal.fire({
            icon: 'error',
            title: '{{ $message }}',
            showConfirmButton: false,
            timer: 3000
        })
    </script>
@enderror
@if (session('succes_start'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Zapisy zostały wznowione!',
        showConfirmButton: false,
        timer: 3000
    })
</script>
@endif
@if (session('succes_stop'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Zapisy zostały zakończone!',
        showConfirmButton: false,
        timer: 3000
    })
</script>
@endif
@if (session('succes_presence'))
<script>
Swal.fire({
    icon: 'success',
    title: 'Obecność została zapisana!',
    showConfirmButton: false,
    timer: 3000
})
</script>
@endif

@if (session('created_form'))
<script>
Swal.fire({
    icon: 'success',
    title: 'Formularz został utworzony pomyślnie!',
    showConfirmButton: false,
    timer: 3000
})
</script>
@endif

@if (session('remove_volunteer'))
<script>
Swal.fire({
    icon: 'success',
    title: 'Wolontariusz został usunięty pomyślnie!',
    showConfirmButton: false,
    timer: 3000
})
</script>
@endif

@if (session('add_volunteer'))
<script>
// Swal.fire({
//     icon: 'success',
//     title: 'Wolontariusz został dodany pomyślnie!',
//     showConfirmButton: false,
//     timer: 3000
// })
$(document).ready(function(){
$('#addvolunteermodal').modal('show');
});

</script>
@endif
@endpush
