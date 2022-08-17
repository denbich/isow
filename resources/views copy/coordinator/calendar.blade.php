@extends('layouts.app')

@section('title')
{{ __('Kalendarz') }}
@endsection

@section('meta')
<meta name="link" content="calendar">
@endsection

@section('content')

<nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      @include('coordinator.include.logo')
      <div class="navbar-inner">
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            @include('coordinator.include.dashboard')
        </ul>
        <hr class="my-3">
        <h6 class="navbar-heading p-0 text-muted">
            <span class="docs-normal">Ogólne</span>
        </h6>
          <ul class="navbar-nav">
            @include('coordinator.include.volunteer')
            @include('coordinator.include.chat')
            @include('coordinator.include.send-mail')
          </ul>
          <hr class="my-3">
        <h6 class="navbar-heading p-0 text-muted">
            <span class="docs-normal">Moduły</span>
        </h6>
          <ul class="navbar-nav">
            @include('coordinator.include.forms')
            @include('coordinator.include.posts')
            @include('coordinator.include.prizes')
            @include('coordinator.include.sponsors')
          </ul>

          <hr class="my-3">

          <ul class="navbar-nav mb-md-3">
            @include('coordinator.include.other')
          </ul>
        </div>
      </div>
    </div>
  </nav>
  <div class="main-content" id="panel">

    @include('coordinator.include.nav')

    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Kalendarz</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="{{ route('c.dashboard') }}"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item active" aria-current="page">Kalendarz</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
                <button class="btn btn-neutral" disabled><i class="fas fa-plus"></i> {{ __('Nowe wydarzenie') }}</button>
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


      </div>
      @yield('coordinator.include.footer')
  </div>

@endsection

@section('style')

    <!--<link href='/assets/fullcalendar/packages/core/main.css' rel='stylesheet' />
    <link href='/assets/fullcalendar/packages/daygrid/main.css' rel='stylesheet' />
    <link href='/assets/fullcalendar/packages/timegrid/main.css' rel='stylesheet' />
    <link href='/assets/fullcalendar/packages/list/main.css' rel='stylesheet' />
    <script src='/assets/fullcalendar/packages/core/main.js'></script>
    <script src='/assets/fullcalendar/packages/core/locales-all.js'></script>
    <script src='/assets/fullcalendar/packages/interaction/main.js'></script>
    <script src='/assets/fullcalendar/packages/daygrid/main.js'></script>
    <script src='/assets/fullcalendar/packages/timegrid/main.js'></script>
    <script src='/assets/fullcalendar/packages/list/main.js'></script>-->

    <link href='{{ url('/assets/calendar/main.css') }}' rel='stylesheet' />
    <script src='{{ url('/assets/calendar/main.js') }}'></script>
    <script src='{{ url('/assets/calendar/locales.all.js') }}'></script>

    <script src='https://unpkg.com/popper.js/dist/umd/popper.min.js'></script>
    <script src='https://unpkg.com/tooltip.js@1.3.3/dist/umd/tooltip.min.js'></script>
<style>

    /*
    tooltip css


    .popper,
    .tooltip {
        position: absolute;
        z-index: 9999;
        background: #FFC107;
        color: black;
        width: 150px;
        border-radius: 3px;
        box-shadow: 0 0 2px rgba(0,0,0,0.5);
        padding: 10px;
        text-align: center;
    }
    .style5 .tooltip {
        background: #1E252B;
        color: #FFFFFF;
        max-width: 200px;
        width: auto;
        font-size: .8rem;
        padding: .5em 1em;
    }
    .popper .popper__arrow,
    .tooltip .tooltip-arrow {
        width: 0;
        height: 0;
        border-style: solid;
        position: absolute;
        margin: 5px;
    }

    .tooltip .tooltip-arrow,
    .popper .popper__arrow {
        border-color: #FFC107;
    }
    .style5 .tooltip .tooltip-arrow {
        border-color: #1E252B;
    }
    .popper[x-placement^="top"],
    .tooltip[x-placement^="top"] {
        margin-bottom: 5px;
    }
    .popper[x-placement^="top"] .popper__arrow,
    .tooltip[x-placement^="top"] .tooltip-arrow {
        border-width: 5px 5px 0 5px;
        border-left-color: transparent;
        border-right-color: transparent;
        border-bottom-color: transparent;
        bottom: -5px;
        left: calc(50% - 5px);
        margin-top: 0;
        margin-bottom: 0;
    }
    .popper[x-placement^="bottom"],
    .tooltip[x-placement^="bottom"] {
        margin-top: 5px;
    }
    .tooltip[x-placement^="bottom"] .tooltip-arrow,
    .popper[x-placement^="bottom"] .popper__arrow {
        border-width: 0 5px 5px 5px;
        border-left-color: transparent;
        border-right-color: transparent;
        border-top-color: transparent;
        top: -5px;
        left: calc(50% - 5px);
        margin-top: 0;
        margin-bottom: 0;
    }
    .tooltip[x-placement^="right"],
    .popper[x-placement^="right"] {
        margin-left: 5px;
    }
    .popper[x-placement^="right"] .popper__arrow,
    .tooltip[x-placement^="right"] .tooltip-arrow {
        border-width: 5px 5px 5px 0;
        border-left-color: transparent;
        border-top-color: transparent;
        border-bottom-color: transparent;
        left: -5px;
        top: calc(50% - 5px);
        margin-left: 0;
        margin-right: 0;
    }
    .popper[x-placement^="left"],
    .tooltip[x-placement^="left"] {
        margin-right: 5px;
    }
    .popper[x-placement^="left"] .popper__arrow,
    .tooltip[x-placement^="left"] .tooltip-arrow {
        border-width: 5px 0 5px 5px;
        border-top-color: transparent;
        border-right-color: transparent;
        border-bottom-color: transparent;
        right: -5px;
        top: calc(50% - 5px);
        margin-left: 0;
        margin-right: 0;
    }

    #script-warning {
        display: none;
        background: #eee;
        border-bottom: 1px solid #ddd;
        padding: 0 10px;
        line-height: 40px;
        text-align: center;
        font-weight: bold;
        font-size: 12px;
        color: red;
    }

    #loading {
        display: none;
        top: 10px;
        right: 10px;
    }
j-
    #calendar {

        margin: 40px auto;
        padding: 0 10px;
    }

    p {
        color: white;
    }

    @media (max-width: 576px){
        #calosc {
            display: none;
        }
        #blad {
            display: block;
            text-align:center;
        }
    }

     @media (min-width: 577px){
        #blad {
            display: none;
        }
    }*/

</style>

<script>

    /*document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            //width: '100%',
            //height: 600,
            contentHeight: 600,
            themeSystem: 'bootstrap4',
            plugins: [ 'interaction', 'dayGrid', 'timeGrid'], //, 'list'
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
            },
            //editable: false,
            navLinks: true, // can click day/week names to navigate views
            /*eventRender: function(info) {
              var tooltip = new Tooltip(info.el, {
                title: info.event.extendedProps.description,
                placement: 'top',
                trigger: 'hover',
                container: 'body'
              });
            },*
            events: [
                @foreach($events as $event)
                {
                    title : '{{ $event->title }}',
                    description : '{{ $event->title }}',
                    start : '{{ $event->start }}',
                    end: '{{ $event->end }}',
                }
                @endforeach
            ]
        });

        calendar.setOption('locale', 'pl');

        calendar.render();
    });*/

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
                today:    'Dziś',
                month:    'Miesiąc',
                week:     'Tydzień',
                day:      'Dzień',
                list:     'Lista'
            },
          events: [
                @foreach($events as $event)
                {
                    title : '{{ $event->title }}',
                    description : '{{ $event->title }}',
                    start : '{{ $event->start }}',
                    end: '{{ $event->end }}',
                    url: '{{ route("c.form.show", [$event->form->ivid]) }}',
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
