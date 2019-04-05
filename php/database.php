<?php

    // $db_conf = parse_ini_file($_SERVER["DOCUMENT_ROOT"] . "/.db.ini");

    // Connecting, selecting database
    // $dbconn = pg_connect("host=" . $db_conf["host"] . " dbname=" . $db_conf["dbname"] . " port=" . $db_conf["port"] . " user=" . $db_conf["user"] . " password=" . $db_conf["password"]);
    $dbconn = pg_connect("host=web0.site.uottawa.ca port=15432 dbname=oalmo028 user=oalmo028 password=MKUMK56Taap");
    $connection_status = pg_connection_status($dbconn);

?>
