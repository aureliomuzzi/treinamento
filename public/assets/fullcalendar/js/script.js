$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.date-time').mask('00/00/0000 00:00:00');
    $('.time').mask('00:00:00');

    $('#newFastEvent').click(function () {
        clearMessages('.mensagem');
        resetForm('#formFastEvent');

        $('#modalFastEvent').modal('show');
        $('#modalFastEvent #titleModal').text('Criar Evento Rápido');
        $('#modalFastEvent button.deleteFastEvent').css("display", "none");
    });

    $('.deleteEvent').click(function () {
        let id = $("#modalCalendar input[name='id']").val();

        let Event = {
            id: id,
            _method: 'DELETE'
        };

        let route = routeEvents('routeEventDelete')

        sendEvent(route, Event);

    });

    $('.fc-event').click(function () {
        clearMessages('.mensagem');
        resetForm('#formFastEvent');

        let Event = JSON.parse($(this).attr('data-event'));

        $('#modalFastEvent').modal('show');
        $('#modalFastEvent #titleModal').text('Alterar Evento Rápido');
        $('#modalFastEvent button.deleteFastEvent').css("display", "flex");

        $("#modalFastEvent input[name='id']").val(Event.id);
        $("#modalFastEvent input[name='title']").val(Event.title);
        $("#modalFastEvent input[name='start']").val(Event.start);
        $("#modalFastEvent input[name='end']").val(Event.end);
        $("#modalFastEvent input[name='color']").val(Event.color);
    });

    $('.saveFastEvent').click(function () {
        let id = $("#modalFastEvent input[name='id']").val();
        let title = $("#modalFastEvent input[name='title']").val();
        let start = $("#modalFastEvent input[name='start']").val();
        let end = $("#modalFastEvent input[name='end']").val();
        let color = $("#modalFastEvent input[name='color']").val();

        let Event = {
            title: title,
            start: start,
            end: end,
            color: color,
        };

        let route;

        if (id == '') {
            route = routeEvents('routeFastEventStore');
        } else {
            route = routeEvents('routeFastEventUpdate');
            Event.id = id;
            Event._method = 'PUT';
        }

        console.log(route);
        sendEvent(route, Event);
    });

    $('.closeModal').click(function () {
        $('#modalCalendar').modal('hide');
        $('#modalFastEvent').modal('hide');
        objCalendar.refetchEvents();
    });

    $('.saveEvent').click(function () {
        let id = $("#modalCalendar input[name='id']").val();
        let title = $("#modalCalendar input[name='title']").val();
        let start = moment($("#modalCalendar input[name='start']").val(), "DD/MM/YYYY HH:mm:ss" ).format("YYYY-MM-DD HH:mm:ss");
        let end = moment($("#modalCalendar input[name='end']").val(), "DD/MM/YYYY HH:mm:ss" ).format("YYYY-MM-DD HH:mm:ss");
        let color = $("#modalCalendar input[name='color']").val();
        let description = $("#modalCalendar textarea[name='description']").val();

        let Event = {
            title: title,
            start: start,
            end: end,
            color: color,
            description: description,
        };

        let route;

        if (id == '') {
            route = routeEvents('routeEventStore');
        } else {
            route = routeEvents('routeEventUpdate');
            Event.id = id;
            Event._method = 'PUT';
        }

        sendEvent(route, Event);
    });
});

function sendEvent(route, data_) {
    $.ajax({
        url: route,
        data: data_,
        method: 'POST',
        dataType: 'json',
        success: function (json) {
            if (json.success == true) {
                $(".mensagem").html('<div class="alert alert-success" role="alert">'+json.message+'</div>');
                objCalendar.refetchEvents();
                $('#modalCalendar').modal('hide');
            }
        },
        error: function (json) {
            let responseJSON = json.responseJSON.errors;
            $(".mensagem").html(loadErrors(responseJSON));
        }
    });
}

function loadErrors(response)
{
    let boxAlert = `<div class="alert alert-danger"`;

    for (let fields in response) {
        boxAlert += `<span>${response[fields]}</span><br/>`;
    }

    boxAlert += `</div>`;

    return boxAlert.replace(/\,/g, "<br/>");
}

function clearMessages(element)
{
    $(element).text('');
}

function routeEvents(route)
{
    return document.getElementById('calendar').dataset[route];
}

function resetForm(form)
{
    $(form)[0].reset();
}
