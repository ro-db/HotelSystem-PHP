<html>
    <head>
        <title>Hello World from PHP</title>
</head>
<body>
<?php

$db_conf = parse_ini_file(".db.ini");

// Connecting, selecting database
$dbconn = pg_connect("host=" . $db_conf["host"] . " dbname=" . $db_conf["dbname"] . " port=" . $db_conf["port"] . " user=" . $db_conf["user"] . " password=" . $db_conf["password"])
    or die('Could not connect: ' . pg_last_error());

// Performing SQL query
$query = 'SET search_path="HotelSystem"; SELECT * FROM hotel_chain';
$result = pg_query($query) or die('Query failed: ' . pg_last_error());

// Printing results in HTML
echo "<table>\n";
while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
    echo "\t<tr>\n";
    foreach ($line as $col_value) {
        echo "\t\t<td>$col_value</td>\n";
    }
    echo "\t</tr>\n";
}
echo "</table>\n";

// Free resultset
pg_free_result($result);

// Closing connection
pg_close($dbconn);

?>
</body>
</html>
