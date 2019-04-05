
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
$SIN = $_POST['SIN'];
$fullname = $_POST['fullname'];
$address = $_POST['address'];

// echo '<script>console.log("Inserting: room id="$room_id", SIN="$SIN", fullname="$fullname", address="$address"")</script>\n';

include $_SERVER['DOCUMENT_ROOT'] . "/php/database.php";

// pg_query("set search_path='public'; INSERT INTO test (first) VALUES ('12');");

// ("sin_number", full_name, address)
// (sin_number, room_id, start_date, end_date)

// INSERT INTO customer VALUES ($SIN, \'$fullname\', \'$address\'); INSERT INTO booking VALUES ($SIN, $room_id, \'$startDate\', \'$endDate\');';

$insert_customer_and_booking_query = 'SET search_path = "HotelSystem";';
$insert_customer_and_booking_query .= "INSERT INTO customer (SIN_NUMBER, full_name, address) VALUES ('$SIN', '$fullname', '$address');";
$insert_customer_and_booking_query .= "INSERT INTO booking (SIN_NUMBER, room_id, start_date, end_date) VALUES ('$SIN', '$room_id', '$startDate', '$endDate');";

pg_close($dbconn);

header("Location:/index.html");
exit();
?>
