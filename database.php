<?php

$db_conf = parse_ini_file(".db.ini");

// Connecting, selecting database
$dbconn = pg_connect("host=" . $db_conf["host"] . " dbname=" . $db_conf["dbname"] . " port=" . $db_conf["port"] . " user=" . $db_conf["user"] . " password=" . $db_conf["password"])
    or die('Could not connect: ' . pg_last_error());

?>
