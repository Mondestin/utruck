<!DOCTYPE html>
<html lang="en">
  <head>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  </head>

  <body>
    <div class="container ">
   
      <div id="calendar">
        
      </div>
   </div>
 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script type="text/javascript">
$('#calendar').fullCalendar({
  header: {
    left: 'prev,next today',
    center: 'addEventButton',
    right: 'month,agendaWeek,agendaDay,listWeek'
  },
  defaultDate: '2018-11-16',
  navLinks: true,
  editable: true,
  eventLimit: true,
  events: [{
      title: 'Simple static event',
      start: '2018-11-16',
      description: 'Super cool event'
    },

  ],
  customButtons: {
    addEventButton: {
      text: 'Add new event',
      click: function () {
        var dateStr = prompt('Enter date in YYYY-MM-DD format');
        var date = moment(dateStr);

        if (date.isValid()) {
          $('#calendar').fullCalendar('renderEvent', {
            title: 'Dynamic event',
            start: date,
            allDay: true
          });
        } else {
          alert('Invalid Date');
        }

      }
    }
  },
  dayClick: function (date, jsEvent, view) {
    var date = moment(date);

    if (date.isValid()) {
      $('#calendar').fullCalendar('renderEvent', {
        title: 'Dynamic event from date click',
        start: date,
        allDay: true
      });
    } else {
      alert('Invalid');
    }
  },
});
</script>

  </body>
</html>
<!-- <input type="email" id="email" name="email" required="required" class="form-control col-md-7 col-xs-12">

<input id="password" type="password" name="password" data-validate-length="6,8" class="form-control col-md-7 col-xs-12" required="required">

<input id="password2" type="password" name="password2" data-validate-linked="password" class="form-control col-md-7 col-xs-12" required="required">

<input type="number" id="number" name="number" required="required" data-validate-minmax="10,100" class="form-control col-md-7 col-xs-12"> -->
<select id="heard" class="form-control parsley-error" required="" data-parsley-id="38">