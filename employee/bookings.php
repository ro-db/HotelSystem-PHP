<!DOCTYPE html>
<html>
<head>
    <title>Current Bookings</title>
</head>
<body>
    <h3>Current Bookings</h3>
    <ul>
    <?php
    
    include $_SERVER["DOCUMENT_ROOT"] . "/php/database.php";

    $bookings_query = 'SET search_path = "HotelSystem"; SELECT * FROM booking;';

    $result = pg_query($bookings_query);

    if(pg_num_rows($result) > 0) {
    while ($booking = pg_fetch_row($result, null, PGSQL_ASSOC)) {

        $booking_id = $booking["booking_id"];
        $customer_sin = $booking["sin_number"];
        $room_id = $booking["room_id"];
        $start_date = $booking["start_date"];
        $end_date = $booking["end_date"];

        echo "<li>\n";
        echo "<form method='POST'>\n";
        echo "<input type='hidden' name='booking_id' value='$booking_id'/>\n";
        echo "<input type='hidden' name='customer_sin' value='$customer_sin'/>\n";
        echo "<input type='hidden' name='room_id' value='$room_id'/>\n";
        echo "<input type='hidden' name='start_date' value='$start_date'/>\n";
        echo "<input type='hidden' name='end_date' value='$end_date'/>\n";
        echo "Customer SIN: $customer_sin<br/>\n";
        echo "Price: <input type='number' name='price' value='0'/><br/>\n";
        echo "<button type='submit' formaction='/php/create_renting.php'>Confirm Renting</button>\n";
        echo "</form>\n";
        echo "</li>\n";

    }
    } else {
        echo "No bookings found.";
    }

    pg_free_result($result);
    pg_close($dbconn);

    ?>
    </ul>
</body>
</html>