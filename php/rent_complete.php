
<?php

include $_SERVER['DOCUMENT_ROOT'] . "/php/database.php";
                
$new_customer = array("sin_number" => $SIN, "full_name" => $fullname, "address" => $address);
$new_renting = array("sin_number" => $SIN, "room_id" => $room_id, "start_date" => $startDate, "end_date" => $endDate, "price" => $price);

pg_insert($dbconn, "HotelSystem.customer", $new_customer);
pg_insert($dbconn, "HotelSystem.rental", $new_renting);

pg_close($dbconn);

?>

Rent is complete.
<br/>

<form>
    <button type='submit' formaction='/'n>Return to home page</button>
</form>