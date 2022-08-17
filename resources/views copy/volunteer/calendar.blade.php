@extends('layouts.app')

@section('title')
{{ __('volunteer.sidebar.calendar') }}
@endsection

@section('content')

<nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      @include('volunteer.include.logo')
      <div class="navbar-inner">
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <ul class="navbar-nav">
                @include('volunteer.include.dashboard')
            </ul>
        <hr class="my-3">
        <h6 class="navbar-heading p-0 text-muted">
            <span class="docs-normal">{{ __('volunteer.sidebar.general') }}</span>
        </h6>
          <ul class="navbar-nav">
            @include('volunteer.include.chat')
            @include('volunteer.include.posts')
            @include('volunteer.include.forms')
            @include('volunteer.include.prizes')

          </ul>

          <hr class="my-3">
          <h6 class="navbar-heading p-0 text-muted">
            <span class="docs-normal">{{ __('volunteer.sidebar.other') }}</span>
          </h6>

          <ul class="navbar-nav mb-md-3">
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('v.calendar') }}">
                    <i class="far fa-calendar text-primary"></i>
                    <span class="nav-link-text">{{ __('volunteer.sidebar.calendar') }}</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('v.settings') }}">
                    <i class="fas fa-cog text-primary"></i>
                    <span class="nav-link-text">{{ __('volunteer.menu.dropdown.settings') }}</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('v.info') }}">
                    <i class="fas fa-info-circle text-primary"></i>
                    <span class="nav-link-text">{{ __('volunteer.sidebar.info') }}</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt text-primary"></i>
                    <span class="nav-link-text">{{ __('main.logout') }}</span>
                </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
  <div class="main-content" id="panel">

    @include('volunteer.include.nav')

    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">{{ __('volunteer.sidebar.calendar') }}</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="{{ route('v.dashboard') }}"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item active" aria-current="page">{{ __('volunteer.sidebar.calendar') }}</li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Page content -->

    <div class="container-fluid mt--6">

        <div class="card card-calendar">
            <div class="card-header d-none">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Kalendarz </h3>
                </div>
              </div>
            </div>
              <div class="card-body">
                  <div id="calendar" class="w-100"></div>
              </div>
          </div>
      @include('volunteer.include.footer')
    </div>
  </div>

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
                contentHeight: 600,
                aspectRatio: 2,
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
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay' //,listWeek
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
