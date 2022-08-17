
@extends('layouts.app')

@section('title') {{ __('volunteer.form.list.title') }} @endsection
@section('body') bg-gray-100 @endsection

@section('content')
<div class="min-height-300 bg-primary position-absolute w-100" id="background-color-div"></div>
  <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
    <div class="sidenav-header" style="min-height: 170px;">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      @include('volunteer.include.logo')
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse w-auto h-auto" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        @include('volunteer.include.dashboard')
        @include('volunteer.include.chat')
        @include('volunteer.include.posts')
        <li class="nav-item ps-1 pt-1">
            <a class="nav-link active" href="{{ route('v.form.index') }}">
                  <i class="fa-solid fa-clipboard-list text-primary text-sm opacity-10"></i>
                  <span class="nav-link-text ms-1">{{ __('volunteer.sidebar.forms') }}</span>
            </a>
          </li>
        @include('volunteer.include.prizes')
        @include('volunteer.include.other')

      </ul>
    </div>
  </aside>
  <main class="main-content position-relative border-radius-lg ">
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
        <div class="container-fluid py-1 px-3">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
              <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="{{ route('v.dashboard') }}"><i class="fa-solid fa-house"></i></a></li>
              <li class="breadcrumb-item text-sm text-white" aria-current="page">{{ __('volunteer.sidebar.forms') }}</li>
              <li class="breadcrumb-item text-sm text-white active" aria-current="page">{{ __('volunteer.form.name') }}</li>
            </ol>
            <h6 class="font-weight-bolder text-white mb-0">{{ __('volunteer.form.list.title') }}</h6>
          </nav>
          @include('volunteer.include.nav')
        </div>
      </nav>
    <div class="container-fluid py-4 min-vh-100">
        <div class="row">
            <div class="col-lg-6 col-12 d-flex ms-auto">
               <a href="{{ route('v.form.index') }}" class="btn btn-icon bg-gradient-dark ms-auto">
                <span class="btn-inner--icon me-2"><i class="fa-solid fa-arrow-left"></i></span>
               <span class="btn-inner--text">{{ __('Powrót') }}</span>
               </a>
            </div>
         </div>

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

         <div class="card mt-4">
            <div class="card-header pb-0">
                <h5 class="mb-0">@if ($signed_volunteer == null) {{ __('volunteer.form.form.title1') }} @else {{ __('volunteer.form.form.title2') }} @endif</h5>
            </div>
            <div class="card-body">
                @if ($signed_volunteer == null)
                    @if ($form->expiration <= date('Y-m-d H:i:s'))
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <div class="alert alert-danger text-center" role="alert">
                                    <span class="alert-icon"><i class="far fa-frown"></i></span>
                                    <span class="alert-text"><strong>{{ __('main.alert') }}!</strong> {{ __('volunteer.form.form.sign.alert') }} </span>
                                </div>
                            </div>
                        </div>
                    @else
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
                                        <form action="{{ route('v.form.show', [$form->ivid]) }}" method="post">
                                            @csrf
                                            <input type="hidden" name="position" value="{{ $position->ivid }}">
                                            <button class="btn btn-primary w-100">{{ __('volunteer.form.form.positions.button') }}</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    @endif
                @else
                    @switch($signed_volunteer->condition)
                        @case(0)
                            <div class="row justify-content-center">
                                <div class="col-lg-5 text-center">
                                    <span class="h3 font-bold">{{ __('volunteer.form.form.sign.0.text1') }}:</span><br>
                                    <span class="h4">{{ $signed_volunteer->position->form_position_translate->title }}</span>
                                    <p>{{ __('volunteer.form.form.sign.0.text3') }}</p>
                                    <p class="text-sm">* - {{ __('volunteer.form.form.sign.0.text4') }}</p>
                                </div>
                                <div class="col-lg-5 text-center">
                                    <p><b>Godziny pracy na tym stanowisku: </b>{{ date('H:i', strtotime($signed_volunteer->position->start))." - ".date('H:i', strtotime($signed_volunteer->position->end)) }}</p>
                                    <p><b>{{ __('volunteer.form.form.sign.0.text2') }}*: </b>{{ $signed_volunteer->position->points }}</p>
                                    <b>{{ __('Opis stanowiska:') }}</b>
                                    <p>{{ $signed_volunteer->position->form_position_translate->description }}</p>
                                </div>

                                <div class="col-lg-6">
                                    @if ($form->expiration > date('Y-m-d H:i:s'))
                                    <form action="{{ route('v.form.unsign', [$form->ivid]) }}" method="post">
                                        @csrf
                                        <input type="hidden" name="position" value="{{ $signed_volunteer->ivid }}">
                                        <button type="submit" class="btn btn-danger w-100">{{ __('volunteer.form.form.sign.0.button') }}</button>
                                    </form>
                                    @endif
                                </div>
                            </div>
                        @break
                        @case(1)
                        <div class="row justify-content-center">
                            <div class="col-lg-5 text-center">
                                <h3 class="text-success">{{ __('volunteer.form.form.sign.1.header') }}</h3>
                                    <span class="h4">
                                        @if (Auth::user()->gender == 'm')
                                            <b>{{ __('volunteer.form.form.sign.1.text-m') }}:</b>
                                        @elseif (Auth::user()->gender == 'f')
                                            <b>{{ __('volunteer.form.form.sign.1.text-f') }}:</b>
                                        @endif <br>
                                        {{ $signed_volunteer->position->form_position_translate->title }}
                                    </span>
                            </div>
                            <div class="col-lg-5 text-center">
                                <p><b>Godziny pracy na tym stanowisku: </b>{{ date('H:i', strtotime($signed_volunteer->position->start))." - ".date('H:i', strtotime($signed_volunteer->position->end)) }}</p>
                                <p><b>{{ __('volunteer.form.form.sign.0.text2') }}*: </b>{{ $signed_volunteer->position->points }}</p>
                                <b>{{ __('Opis stanowiska:') }}</b>
                                <p>{{ $signed_volunteer->position->form_position_translate->description }}</p>
                            </div>
                        </div>
                        @break
                        @case(2)
                            <div class="text-center">
                                @if (Auth::user()->gender == 'm')
                                    <h4 class="text-danger">{{ __('volunteer.form.form.sign.2.header-m') }} :(</h4>
                                    <p>{{ __('volunteer.form.form.sign.2.text-m') }}</p>
                                @elseif (Auth::user()->gender == 'f')
                                    <h4 class="text-danger">{{ __('volunteer.form.form.sign.2.header-f') }} :(</h4>
                                    <p>{{ __('volunteer.form.form.sign.2.text-f') }}</p>
                                @endif
                            </div>
                        @break
                        @case(3)
                        <div class="text-center">
                            <h2>{{ __('volunteer.form.form.sign.3.header') }}</h2>
                            @if (Auth::user()->gender == 'm')
                                <h4 class="text-success">{{ __('volunteer.form.form.sign.3.text-m') }}</h4>
                            @elseif (Auth::user()->gender == 'f')
                                <h4 class="text-success">{{ __('volunteer.form.form.sign.3.text-f') }}</h4>
                            @endif
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <form action="{{ route('v.form.certificate') }}" method="post" role="form" id="certificate_form">
                                    @csrf
                                    <input type="hidden" name="form" value="{{ $form->ivid }}">
                                    <button type="submit" id="certificate_button" class="btn btn-primary w-100">{{ __('volunteer.form.form.sign.3.cert') }}</button>
                                </form>
                                @if ($signed_volunteer->feedback == null)
                                    <button type="button" class="btn btn-primary my-2 w-100" data-bs-toggle="modal" data-bs-target="#feedbackmodal">
                                    {{ __('volunteer.form.form.sign.3.button') }}
                                    </button>
                                @endif
                            </div>
                        </div>
                        <div class="modal fade" id="feedbackmodal" tabindex="-1" role="dialog" aria-labelledby="feedbackLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <form action="{{ route('v.form.feedback', [$form->ivid]) }}" method="post">
                                    @csrf
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="feedbackLabel">{{ __('volunteer.form.form.sign.3.modal.title') }} {{ $form->form_translate->title }}</h5>
                                    </div>
                                    <div class="modal-body">
                                        <h4 class="text-center">{{ __('volunteer.form.form.sign.3.modal.text') }}</h4>
                                        <textarea id="info" class="form-control" style="resize: none;" name="info" cols="50" rows="3" maxlength="255" required></textarea>
                                        <p id="info_count" class="text-sm">0 / 255 {{ __('volunteer.form.form.sign.3.modal.count') }}</p>

                                        <small class="text-center w-100">Opinia jest anonimowa</small>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('main.cancel') }}</button>
                                        <button type="submit" class="btn btn-primary">{{ __('volunteer.form.form.sign.3.modal.send') }}</button>
                                    </div>
                                    </div>
                                </form>
                            </div>
                            </div>
                        @break
                    @endswitch
                @endif
            </div>
        </div>
        <div class="card mt-4">
            <div class="card-header pb-0">
                <h5 class="mb-0">{{ __('volunteer.form.form.map') }}</h5>
            </div>
            <div class="card-body">
                <div id="map" style="width: 100%; height: 500px"></div>
            </div>
          </div>

    </div>
      @include('volunteer.include.footer')
    </div>
  </main>
@endsection

@push('scripts')
<script>
    "use strict";

    function initMap() {
    var myLatlng = new google.maps.LatLng({!! $form->place_longitude !!}, {!! $form->place_latitude !!});

var mapOptions = {
    zoom: 13,
    center: myLatlng,
    mapTypeControl: false,
    fullscreenControl: false,
    zoomControl: true,
    streetViewControl: false
}
var map = new google.maps.Map(document.getElementById("map"), mapOptions);

var marker = new google.maps.Marker({
    position: myLatlng,
    map: map,
    draggable:false, });

}
</script>

<script>
    $(document).ready(function() {

        $('#info').on('keyup propertychange paste', function(){
            var chars = $('#info').val().length;
            $('#info_count').html(chars +" / 255 {{ __('volunteer.form.form.sign.3.modal.count') }}");
        });
        });
</script>

<script>
    $('#certificate_form').submit(function(){
        $('#certificate_button').prop('disabled', true);
        $('#certificate_button').prepend('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> ');
    });
</script>

@if (session('signed_form'))
<script>
Swal.fire({
    icon: 'success',
    title: "{{ __('volunteer.form.form.info1') }}",
    showConfirmButton: false,
    timer: 3000
})
</script>
@endif

@if (session('delete_sign'))
<script>
Swal.fire({
    icon: 'success',
    title: "{{ __('volunteer.form.form.info2') }}",
    showConfirmButton: false,
    timer: 3000
})
</script>
@endif
@endpush
