<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <H1>Booking</H1>
    <title>Booking</title>

    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"
    />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <link
      rel="stylesheet"
      href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"
    />
    <link
      rel="stylesheet"
      href="http://cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css"
    />
  </head>

  <body>

    <!--DROP DOWN-->
    <div class="container">
      <h3>City where you want to book a hotel:</h3>
      <div class="dropdown">
        <button
          class="btn btn-primary dropdown-toggle"
          type="button"
          data-toggle="dropdown"
          id="citiesDropdown"
        >
          Cities <span class="caret"></span>
        </button>
        <ul class="dropdown-menu"></ul>
      </div>
    </div>
    <!--END DROP DOWN-->

    <h3>
      Available hotels at this city:
      <ul>
        (List of hotels in that city)
      </ul>
    </h3>

    <h3>Booking dates:</h3>
    <label for="start date:">start date:</label>
    <input type="date" name="startdate" id="startdate" />

    <label for="enddate:">end date:</label>
    <input type="date" name="enddate" id="enddate" />

    <button
      type="button"
      action="/views/bookingComplete.html"
      id="submit"
      value="Submit"
    >
      Submit
    </button>

    <!--SCRIPTS-->
    <script type="javascript" src="/src/validator.min.js"></script>
    <script type="text/javascript">
      console.log('RECIEVED');

      var didClickIt = false;
      document.getElementById('submit').addEventListener('click', function() {
        didClickIt = true;
      });

      setInterval(function() {
        var todayDate = new Date();

        if (didClickIt) {
          didClickIt = false;
          var start = document.getElementById('startdate').value;
          var startYear = start.substring(0, 4);
          var startMonth = start.substring(5, 7);
          var startDay = start.substring(8, 10);
          // start date to use in comparison
          var startDate = new Date(startYear, startMonth, startDay);

          var end = document.getElementById('enddate').value;
          var endYear = end.substring(0, 4);
          var endMonth = end.substring(5, 7);
          var endDay = end.substring(8, 10);
          // end date to use in comparison
          var endDate = new Date(endYear, endMonth, endDay);

          // if start is before today, then start = today
          if (comp(startDate, todayDate) == 1) {
            startDate = new Date();
            console.log('before start XX: ', startDate);
            console.log('before end XX: ', endDate);
          }
          // if end is before today, then end = today
          if (comp(endDate, todayDate) == 1) {
            endDate = new Date();
            console.log('before start YY: ', startDate);
            console.log('before end YY: ', endDate);
          }
          // if end is before today, then end = today
          if (comp(endDate, startDate) == 2) {
            endDate = startDate;
            console.log('before start ZZ: ', startDate);
            console.log('before end ZZ: ', endDate);
          }
          function comp(date1, date2) {
            if (date1 > date2) return 1;
            else if (date1 < date2) return 2;
            else return 0;
          }
        }
      }, 500);
    </script>

    <!--DROP DOWN SCRIPT-->
    <script type="javascript" src="/src/middleware.js">
      cities = getCities();
      console.log(cities);
      var dropdown = document.getElementById('citiesDropdown');

      for (var i = 0; i < cities.length; ++i) {
        addOption(dropdown, cities[i], cities[i]);
      }

      addOption = function(selectbox, text, value) {
        var optn = document.createElement('OPTION');
        optn.text = text;
        optn.value = value;
        selectbox.options.add(optn);
      };
    </script>
  </body>
</html>
