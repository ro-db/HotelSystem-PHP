<!DOCTYPE html>
<html>
    <head>
        <title>Rent</title>
        <script type="text/javascript" src="/javascript/form_handler.js"></script>
    </head>

    <body>
        <?php
            $roomID = $_POST["roomID"];
        ?>

        <h3>Rent room dates:</h3>
        
        <form id="requestBookingForm">

        <label for="start date:">Start date:</label>
        <input type="date" name="startdate" id="startdate" />
        <br/>
        <label for="enddate:">End date :</label>
        <input type="date" name="enddate" id="enddate" />
        </form>
        
        <button id="submitFormButton" type="submit" value="submit" form="requestBookingForm">
            Submit
        </button>
   
        <br/>
        Price:
        <?php
            // include $_SERVER["DOCUMENT_ROOT"] . '/php/database.php';
            $price = 13;
            // $get_room_price_query = pg_query('SET search_path = "HotelSystem"; SELECT price FROM room WHERE room_id=1');
            // while ($price_array = pg_fetch_row($get_room_price_query, null, PGSQL_NUM)){
            //      $price = (int)$price_array[0]; 
            // }
            
            '<script type="text/javascript">
                console.log("reached");
                var form = document.getElementById("requestBookingForm");

                if(form.addEventListener) {

                form.addEventListener("submit", processBookingForm, false);
                } else if(form.attachEvent) {
                form.attachEvent("onsubmit", processBookingForm);
                }

            </script>';
            echo $price . "<br/>";
            echo "\tStart Date: " . $_POST["startDate"] . "<br/>";
            echo "\tEnd Date: " . $_POST["endDate"]. "<br/>";
          ?>

    </body>

</html>
