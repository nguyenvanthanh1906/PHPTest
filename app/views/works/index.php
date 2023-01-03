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
                eventSources: [
                    {
                        events: data,
                        color: 'black',     // an option!
                        textColor: 'yellow'
                    }
                ]
            });
            calendar.render();
        });
    });

</script>
