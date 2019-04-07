
<?php

// $room_id = pg_escape_string($_POST['room_id']);
// $startDate = pg_escape_string($_POST['startDate']);
// $endDate = pg_escape_string($_POST['endDate']);
// $SIN = pg_escape_string($_POST['SIN']);
// $fullname = pg_escape_string($_POST['fullname']);
// $address = pg_escape_string($_POST['address']);

$room_id = $_POST['room_id'];
$startDate = $_POST['startDate'];
$endDate = $_POST['endDate'];
$SIN = $_POST['sin_number'];
$fullname = $_POST['fullname'];
$address = $_POST['address'];

include $_SERVER['DOCUMENT_ROOT'] . "/php/database.php";

$new_customer = array("sin_number" => $SIN, "full_name" => $fullname, "address" => $address);
$new_booking = array("sin_number" => $SIN, "room_id" => $room_id, "start_date" => $startDate, "end_date" => $endDate);

pg_insert($dbconn, "HotelSystem.customer", $new_customer);
pg_insert($dbconn, "HotelSystem.booking", $new_booking);

pg_close($dbconn);

// header("/index.html");
// echo  "<script type="text/javascript"> location.href = '/index.html';</script>";

echo '<script type="text/javascript">';
echo 'location.href = "/index.html"';
echo '</script>';

exit();
?>
