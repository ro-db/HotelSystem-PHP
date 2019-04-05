<?php
include $_SERVER['DOCUMENT_ROOT'] . "/php/database.php";

$booking_id = $_POST["booking_id"];
$customer_sin = $_POST["sin_number"];
$room_id = $_POST["room_id"];
$start_date = $_POST["start_date"];
$end_date = $_POST["end_date"];
$price = $_POST["price"];

$new_rental = array("sin_number" => $customer_sin, "room_id" => $room_id, "start_date" => $start_date, "end_date" => $end_date, "price" => $price);

pg_insert($dbconn, "HotelSystem.rental", $new_rental);

$delete_booking_query = 'DELETE FROM "HotelSystem.booking" WHERE booking_id = $booking_id';

$delete_result = pg_query($delete_booking_query);

pg_free_result($delete_result);
pg_close($dbconn, "HotelSystem.rental", $new_rental);

header("Location:/index.html");
exit();
?>