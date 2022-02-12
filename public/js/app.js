
document.addEventListener('DOMContentLoaded', function() {
  var base_url = 'http://localhost/PROYECTOS/PHP-CRUD-main/index.php?';
  var calendarEl = document.getElementById('calendar');
  var calendar = new FullCalendar.Calendar(calendarEl, {
    initialView: 'dayGridMonth',

    headerToolbar:{
        // left: 'prev, next, today',
        // center: 'title',
        // right:'dayGridMonth, timeGridWeek, listWeek'
    },
    eventSources: [
      {
        url: `./index.php?c=listarCalendario`, // use the `url` property
        method: 'POST',
          extraParams: {
            custom_param1: 'something',
            custom_param2: 'somethingelse'
          },
          failure: function() {
            alert('there was an error while fetching events!');
          },
          color: 'yellow',   // a non-ajax option
          textColor: 'black' // a non-ajax option
      
    }

    ]
  });
  calendar.render();
});


