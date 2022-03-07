document.addEventListener('DOMContentLoaded', function() {
    var Calendar = FullCalendar.Calendar;
    var Draggable = FullCalendarInteraction.Draggable

    /* read archive json */
    /*-----------------------------------------------------------------*/

    // const { read } = require('fs')
    // const readJsonFile = file => {
    //     if (file.split('.')[file.split('.').length - 1] !== 'json') return {}

    //     const fileContent = read(file)

    //     if (!fileContent) return {}

    //     return JSON.parse(fileContent)
    // }

    // readJsonFile('../examples/json/events.json')

    /* initialize the external events
    -----------------------------------------------------------------*/

    var containerEl = document.getElementById('external-events-list');
    new Draggable(containerEl, {
      itemSelector: '.fc-event',
      eventData: function(eventEl) {
        return {
          title: eventEl.innerText.trim()
        }
      }
    });

    /* initialize the calendar
    -----------------------------------------------------------------*/

    var calendarEl = document.getElementById('calendar');
    var calendar = new Calendar(calendarEl, {
      plugins: [ 'interaction', 'dayGrid', 'timeGrid', 'list' ],
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
      },
      locale: 'pt-br',
      navLinks: true,
      eventLimit: true,
      selectable: true,
      editable: true,
      droppable: true, // this allows things to be dropped onto the calendar
      drop: function(arg) {
        // is the "remove after drop" checkbox checked?
        if (document.getElementById('drop-remove').checked) {
          // if so, remove the element from the "Draggable Events" list
          arg.draggedEl.parentNode.removeChild(arg.draggedEl);
        }
      },

      eventDrop: function(element) {
        let start = moment(element.event.start).format("YYYY-MM-DD HH:mm:ss");
        let end = moment(element.event.end).format("YYYY-MM-DD HH:mm:ss");

        let newEvent = {
            _method: 'PUT',
            id: element.event.id,
            start: start,
            end: end
        };

        sendEvent(routeEvents('routeEventUpdate'), newEvent);
      },

      eventClick: function(element) {

        resetForm('#formEvent');

        $('#modalCalendar').modal('show');
        $('#modalCalendar #titleModal').text('Alterar Evento');
        $('#modalCalendar button.deleteEvent').css('display', 'flex');

        $("#modalCalendar input[name='id']").val(element.event.id);
        $("#modalCalendar input[name='title']").val(element.event.title);
        $("#modalCalendar input[name='start']").val(moment(element.event.start).format("DD/MM/YYYY HH:mm:ss"));
        $("#modalCalendar input[name='end']").val(moment(element.event.end).format("DD/MM/YYYY HH:mm:ss"));
        $("#modalCalendar input[name='color']").val(element.event.backgroundColor);
        $("#modalCalendar textarea[name='description']").val(element.event.extendedProps.description);
      },

      eventResize: function(element) {
        let start = moment(element.event.start).format("YYYY-MM-DD HH:mm:ss");
        let end = moment(element.event.end).format("YYYY-MM-DD HH:mm:ss");

        let newEvent = {
            _method: 'PUT',
            id: element.event.id,
            start: start,
            end: end
        };

        sendEvent(routeEvents('routeEventUpdate'), newEvent);
      },

      select: function(element) {

        resetForm('#formEvent');

        $('#modalCalendar').modal('show');
        $('#modalCalendar #titleModal').text('Inserir Evento');
        $('#modalCalendar button.deleteEvent').css('display', 'none');

        $("#modalCalendar input[name='start']").val(moment(element.start).format("DD/MM/YYYY HH:mm:ss"));
        $("#modalCalendar input[name='end']").val(moment(element.end).format("DD/MM/YYYY HH:mm:ss"));
        $("#modalCalendar input[name='color']").val('#3788D8');
      },

      events: routeEvents('routeLoadEvents'),

    });
    calendar.render();

  });

