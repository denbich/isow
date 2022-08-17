
@extends('layouts.app')

@section('title') {{ __('volunteer.sidebar.calendar') }} @endsection
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
        @include('volunteer.include.forms')
        @include('volunteer.include.prizes')

        <li class="nav-item mt-3">
            <h6 class="ps-3 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">{{ __('volunteer.sidebar.other') }}</h6>
          </li>
          <li class="nav-item ps-1 pt-1">
            <a class="nav-link active" href="{{ route('v.calendar') }}">
                <i class="fa-solid fa-calendar-days text-primary text-sm opacity-10"></i>
              <span class="nav-link-text ms-1">{{ __('volunteer.sidebar.calendar') }}</span>
            </a>
          </li>
          <li class="nav-item ps-1 pt-1">
            <a class="nav-link " href="{{ route('v.settings') }}">
                <i class="fa-solid fa-cog text-primary text-sm opacity-10"></i>
              <span class="nav-link-text ms-1">{{ __('volunteer.menu.dropdown.settings') }}</span>
            </a>
          </li>
          <li class="nav-item ps-1 pt-1">
            <a class="nav-link " href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fa-solid fa-arrow-right-from-bracket text-primary text-sm opacity-10"></i>
              <span class="nav-link-text ms-1">{{ __('main.logout') }}</span>
            </a>
          </li>

      </ul>
    </div>
  </aside>
  <main class="main-content position-relative border-radius-lg ">
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
        <div class="container-fluid py-1 px-3">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
              <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="{{ route('v.dashboard') }}"><i class="fa-solid fa-house"></i></a></li>
              <li class="breadcrumb-item text-sm text-white active" aria-current="page">{{ __('volunteer.sidebar.calendar') }}</li>
            </ol>
            <h6 class="font-weight-bolder text-white mb-0">{{ __('volunteer.sidebar.calendar') }}</h6>
          </nav>
          @include('volunteer.include.nav')
        </div>
      </nav>
    <div class="container-fluid py-4 min-vh-100">
        <div class="row mt-lg-4">
            <div class="col-xl-9">
                <div class="card card-calendar">
                    <div class="card-body p-3">
                        <div class="" id="calendar"></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3">
                <div class="row">
                    <div class="col-xl-12 col-md-6 mt-xl-0 mt-4">
                        <div class="card">
                            <div class="card-header p-3 pb-0">
                                <h6 class="mb-0">{{ __('Najbliższe wydarzenia') }}</h6>
                            </div>
                            <div class="card-body border-radius-lg p-3">
                                @forelse ($future_events as $event)
                                    <div class="d-flex my-2">
                                        <div>
                                            <div class="icon-shape bg-{{ $event->form->form_category->color }}-soft shadow text-center border-radius-md shadow-none">
                                                <i class="fa-solid @switch($event->form->form_category->icon)
                                                    @case('run') fa-person-running @break
                                                    @case('swim') fa-person-swimming @break
                                                    @case('bike') fa-person-biking @break
                                                    @case('ski') fa-person-skiing @break
                                                    @case('basketball') fa-basketball @break
                                                    @case('volleyball') fa-volleyball @break
                                                    @case('other') fa-people-group @break
                                                @endswitch fa-xl text-{{ $event->form->form_category->color }} opacity-10" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                        <div class="ms-3">
                                            <div class="numbers">
                                                <h6 class="mb-1 text-dark text-sm">{{ $event->title }}</h6>
                                                <span class="text-sm">{{ date('d.m.Y', strtotime($event->start)) }}, {{ __('o godzinie') }} {{ date('H:i', strtotime($event->start)) }}</span>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <h4 class="text-danger text-center">{{ __('Brak najbliższych wydarzeń!') }}</h4>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
      @include('volunteer.include.footer')
    </div>
  </main>

  @include('volunteer.include.sidebar')
@endsection

@section('style')

    <link href='{{ url('/assets/calendar/main.css') }}' rel='stylesheet' />
    <script src='{{ url('/assets/calendar/main.js') }}'></script>
    <script src='{{ url('/assets/calendar/locales.all.js') }}'></script>

    <script src='https://unpkg.com/popper.js/dist/umd/popper.min.js'></script>
    <script src='https://unpkg.com/tooltip.js@1.3.3/dist/umd/tooltip.min.js'></script>

    <script>

        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                width: '100%',
                contentHeight: 'auto',
            locale: '{{ session("locale") }}',
              initialView: 'dayGridMonth',
              themeSystem: 'bootstrap',
              editable: false,
              navLinks: true,
              eventRender: function(info) {
                  var tooltip = new Tooltip(info.el, {
                    title: info.event.extendedProps.description,
                    placement: 'top',
                    trigger: 'hover',
                    container: 'body'
                  });
                },
                headerToolbar: {
                    start: 'title', // will normally be on the left. if RTL, will be on the right
                    center: '',
                    end: 'today prev,next' // will normally be on the right. if RTL, will be on the left
                },
                firstDay: 1,
                buttonText : {
                    today:    '{{ __("main.today") }}',
                    month:    '{{ __("main.month") }}',
                    week:     '{{ __("main.week") }}',
                    day:      '{{ __("main.day") }}'
                },
              events: [
                    @foreach($events as $event)
                    {
                        title : '{{ $event->title }}',
                        description : '{{ $event->title }}',
                        start : '{{ $event->start }}',
                        end: '{{ $event->end }}',
                        url: '{{ route("v.form.show", [$event->form->ivid]) }}',
                    }
                    @endforeach
                ],
                eventClick: function(info) {
                    info.jsEvent.preventDefault(); // don't let the browser navigate

                    if (info.event.url) {
                        window.location.replace(info.event.url);
                    //window.open(info.event.url);
                    }
                }
            });
            calendar.setOption('locale', '{{ session("locale") }}');
            calendar.render();
          });
    </script>
    @endsection

@section('script')
    <script>
      $('#calendar').addClass('mt-0');
    </script>

@endsection
