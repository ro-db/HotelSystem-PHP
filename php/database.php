<?php

    $db_conf = parse_ini_file($_SERVER["DOCUMENT_ROOT"] . "/.db.ini");

    // Connecting, selecting database
    $dbconn = pg_connect("host=" . $db_conf["host"] . " dbname=" . $db_conf["dbname"] . " port=" . $db_conf["port"] . " user=" . $db_conf["user"] . " password=" . $db_conf["password"]);

    $connection_status = pg_connection_status($dbconn);

?>
