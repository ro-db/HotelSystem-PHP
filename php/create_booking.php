<?php
echo '<script>console.log("Made it to create_booking")</script>';
include $_SERVER['DOCUMENT_ROOT'] . "/php/database.php";

$room_id = $_POST['room_id'];
$SIN = $_POST['SIN'];
$fullname = $_POST['fullname'];
$address = $_POST['address'];

echo "Inserting: room id=$room_id, SIN=$SIN, fullname=$fullname, address=$address";

header("Location:/index.html");
exit();
?>