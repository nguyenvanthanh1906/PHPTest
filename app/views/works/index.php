<div id='calendar'></div>

<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.0.2/index.global.min.js'></script>
<script>

    document.addEventListener('DOMContentLoaded', function() {
        $.ajax({
            url: "/works",
            type: 'GET',
            
        }).done(function(res) {
            let data = JSON.parse(res).data
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                displayEventEnd: true,
                eventColor: '#1976d2',
                selectable: true,
                editable: true,
                eventSources: [
                    {
                        events: data,
                    }
                ],
                eventTimeFormat: {
                    hour: '2-digit',
                    minute: '2-digit',
                    meridiem: false
                },
                eventClick: function(info) {
                    location.href = `/works/edit/${info.event.id}`;
                },
                customButtons: {
                    myCustomButton: {
                    text: 'New',
                    click: function() {
                        location.href = "/works/add";
                    }
                    }
                },
                headerToolbar: {
                    left: 'prev,next today myCustomButton',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                }
            });
            calendar.render();
        });
    });

</script>
