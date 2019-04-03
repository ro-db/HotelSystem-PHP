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
        <ul class="dropdown-menu">
          <?php
            include '../database.php';
            $get_cities_query = 'SET search_path = "HotelSystem"; SELECT city FROM hotel;';
            $cities = pg_query($get_cities_query) or die('Query failed: ' . pg_last_error());

            while ($cities_array = pg_fetch_row($cities, null, PGSQL_NUM)) {
              echo "<li>$cities_array[0]</li>";
            }

          ?>
        </ul>
      </div>
    </div>
    <!--END DROP DOWN-->

    <h3>
      Available hotels at this city:
      <ul>
        (List of hotels in that city)
      </ul>
    </h3>
    

    <!--DATE RANGE -->
    <h3>Booking dates:</h3>
    <form method="post">
      <label for="start date:">start date:</label>
      <input type="date" name="startdate" id="startdate"/>
    
      <label for="enddate:">end date:</label>
      <input type="date" name="enddate" id="enddate"/>

      <input type="submit" value="Check Dates" name="checkDateID"/>
    </form>
    
    <?php
    if ( isset( $_POST['checkDateID'] ) ) { 
        $startDate = $_REQUEST['startdate'];
        $endDate = $_REQUEST['enddate'];

        $today = date("Y/m/d");
        echo "today: ", $today;
        echo "<br>";
        echo "START: ".$startDate, "   END: ".$endDate;
        echo "<br>";
        echo "IF 1",( $startDate < $today);
        echo "<br>";

        if($startDate > $today){
          $startDate = $today;
          echo "first ";
          echo "<br>";

        }
        if($endDate > $today){
          $endDate = $today;
          echo "second ";
          echo "<br>";

        }

        if ($endDate < $startDate){
          $endDate = $startDate;
          echo "third\n ";
          echo "<br>";

        } else if ($startDate > $endDate){
          $temp = $startDate;
          $startDate = $endDate;
          $endDate = $temp;
          echo "second\n ";
          echo "<br>";

        }

        echo "START: ".$startDate, "   END: ".$endDate;
    }
    ?>
    
  </body>

  <button><a href="/booking/bookingConfirmation.php">Complete booking</a></button>

</html>
