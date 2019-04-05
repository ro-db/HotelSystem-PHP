<?php
include $_SERVER['DOCUMENT_ROOT'] . "/php/database.php";

$startDate = $_POST['startDate'];

pg_free_result($result);
pg_close($dbconn);

header("Location:/index.html");
exit();
?>