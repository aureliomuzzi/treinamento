<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8' />
<link href='{{asset('assets/fullcalendar/packages/core/main.css')}}' rel='stylesheet' />
<link href='{{asset('assets/fullcalendar/packages/daygrid/main.css')}}' rel='stylesheet' />
<link href='{{asset('assets/fullcalendar/packages/timegrid/main.css')}}' rel='stylesheet' />
<link href='{{asset('assets/fullcalendar/packages/list/main.css')}}' rel='stylesheet' />

{{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"> --}}
<link rel="stylesheet" href='{{asset('assets/fullcalendar/css/bootstrap.min.css')}}'>

<link href='{{asset('assets/fullcalendar/css/style.css')}}' rel='stylesheet' />

<meta name="csrf-token" content="{{ csrf_token() }}">

</head>
<body>

    @include('fullcalendar.modal-calendar')
    @include('fullcalendar.modal-fastEvents')

  <div id='wrap'>

    <div id='external-events'>
      <h4>Eventos Rápidos</h4>
        <div id='external-events-list'>

            @if ($fastEvents)
                @foreach ( $fastEvents as $fastEvent)
                    <div
                        style="padding: 4px; border: 1px solid {{ $fastEvent->color }}; background-color: {{ $fastEvent->color }}"
                        class="fc-event"
                        data-event='{"id":"{{$fastEvent->id}}", "title":"{{$fastEvent->title}}", "color":"{{$fastEvent->color}}", "start":"{{$fastEvent->start}}", "end":"{{$fastEvent->end}}"}'>
                        {{ $fastEvent->title }}
                    </div>
                @endforeach
            @endif

        </div>
      <p>
        <input type='checkbox' id='drop-remove' />
        <label for='drop-remove'>Remover item</label>
        <button class="btn btn-sm btn-info" id="newFastEvent">Criar Novo Evento</button>
      </p>
    </div>

    <div
        id='calendar'
        data-route-load-events={{ route('routeLoadEvents') }}
        data-route-event-store={{ route('routeEventStore') }}
        data-route-event-update={{ route('routeEventUpdate') }}
        data-route-event-delete={{ route('routeEventDelete') }}

        data-route-fast-event-store={{ route('routeFastEventStore') }}
        data-route-fast-event-update={{ route('routeFastEventUpdate') }}
        data-route-fast-event-delete={{ route('routeFastEventDelete') }}
    ></div>

    <div style='clear:both'></div>

  </div>

<script src='{{asset('assets/fullcalendar/packages/core/main.js')}}'></script>
<script src='{{asset('assets/fullcalendar/packages/interaction/main.js')}}'></script>
<script src='{{asset('assets/fullcalendar/packages/daygrid/main.js')}}'></script>
<script src='{{asset('assets/fullcalendar/packages/timegrid/main.js')}}'></script>
<script src='{{asset('assets/fullcalendar/packages/list/main.js')}}'></script>

<script src='{{asset('assets/fullcalendar/packages/core/locales-all.js')}}'></script>

{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
<script src="{{asset('assets/fullcalendar/js/jquery-3.6.0.min.js')}}"></script>

{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script> --}}
<script src="{{asset('assets/fullcalendar/js/jquery.mask.min.js')}}"></script>

{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script> --}}
<script src="{{asset('assets/fullcalendar/js/bootstrap.bundle.min.js')}}"></script>

{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script> --}}
<script src="{{asset('assets/fullcalendar/js/moment.min.js')}}"></script>

<script>let objCalendar; </script>

<script src='{{asset('assets/fullcalendar/js/script.js')}}'></script>

<script src='{{asset('assets/fullcalendar/js/calendar.js')}}'></script>
</body>
</html>
