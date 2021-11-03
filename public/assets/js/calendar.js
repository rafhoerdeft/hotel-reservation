function showCalendar(data, date) {
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            // themeSystem: themeSystem,
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
            },
            // timeZone: 'UTC',
            locale: 'id',
            initialDate: date,
            weekNumbers: true,
            navLinks: true, // can click day/week names to navigate views
            // editable: true,
            selectable: true,
            nowIndicator: true,
            dayMaxEvents: true, // allow "more" link when too many events
            // showNonCurrentDates: false,
            events: data
        });
        calendar.render();
    });
}