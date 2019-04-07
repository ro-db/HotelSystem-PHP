
<?php

$room_id = $_POST['room_id'];
$startDate = $_POST['startDate'];
$endDate = $_POST['endDate'];
$sin_number = $_POST['sin_number'];
$fullname = $_POST['fullname'];
$address = $_POST['address'];
$price = $_POST['price'];

include $_SERVER['DOCUMENT_ROOT'] . "/php/database.php";

$new_customer = array("sin_number" => $sin_number, "full_name" => $fullname, "address" => $address);
$new_renting = array("sin_number" => $sin_number, "room_id" => $room_id, "start_date" => $startDate, "end_date" => $endDate, "price" => $price);

pg_insert($dbconn, "HotelSystem.customer", $new_customer);
pg_insert($dbconn, "HotelSystem.rental", $new_renting);

pg_close($dbconn);

?>

Rent is complete.
<br/>

<!-- TODO: Make this work, WITHOUT form -->
<button> 
    <a href="/">Home<span></span></a>
</button>