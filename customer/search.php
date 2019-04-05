<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Search for Room</title>
    </head>
    <body>
        <h3>Search for a hotel room:</h3>
        <form id="searchRoomForm" method="POST">
        City: <select name="city">
            <?php
            include $_SERVER['DOCUMENT_ROOT'] . "/php/database.php";
            
            $city_query = 'SET search_path="HotelSystem"; SELECT DISTINCT city FROM hotel;';
            $result = pg_query($city_query);

            while ($cities_array = pg_fetch_row($result, null, PGSQL_NUM)) {
                $city = $cities_array[0];
                echo "<option value=$city>$city</option>\n";
              }
  
            pg_free_result($result);
            pg_close($dbconn);

            ?>
        </select><br/>
        Minimum Star Rating: <input type="number" name="minimumStars" value="0"/><br/>
        Minimum Capacity: <input type="number" name="minimumCapacity" value="0"/><br/>
        Hotel Chain: <select name="hotelChain">
            <option value="">Any</option>
        <?php
            include $_SERVER['DOCUMENT_ROOT'] . "/php/database.php";
            
            $hotel_chains_query = 'SET search_path="HotelSystem"; SELECT hotel_chain_id, address FROM hotel_chain;';
            $result = pg_query($hotel_chains_query);

            while($hotel_chain_array = pg_fetch_row($result, null, PGSQL_ASSOC)) {
                $hotel_chain_id = $hotel_chain_array["hotel_chain_id"];
                $hotel_chain_address = $hotel_chain_array["address"];
                echo "<option value=$hotel_chain_id>$hotel_chain_address</option>\n";
            }

            pg_free_result($result);
            pg_close($dbconn);
            
            ?>

        </select><br/>
        Minimum number of Rooms: <input type="number" name="minimumRooms" value="0"/><br/>
        Maximum Price: <input type="number" name="maximumPrice" value="0"/><br/>
        <input type="submit" value="Search"/>
</form>

<br/>

We need to search for:<br/><br/>
<ul>
<?php

if(empty($_POST)) {
    return;
}

$city = $_POST['city'];
$minimumStars = $_POST['minimumStars'];
$minimumCapacity = $_POST['minimumCapacity'];
$hotelChain = $_POST['hotelChain'];
$minimumRooms = $_POST['minimumRooms'];
$maximumPrice = $_POST['maximumPrice'];

// echo "City: " . $city . "<br/>";
// echo "Minimum Starts: " . $minimumStars . "<br/>";
// echo "minimum Capacity: " . $minimumCapacity . "<br/>";
// echo "Hotel Chain: " . $hotelChain . "<br/>";
// echo "Minimum number of Rooms: " . $minimumRooms . "<br/>";
// echo "Maximum Price: " . $maximumPrice . "<br/>";

include $_SERVER['DOCUMENT_ROOT'] . "/php/database.php";

$room_query = "SELECT hotel_id FROM hotel WHERE city='$city'";

if($minimumStars > 0) {
    // $room_query = $room_query . " AND (SELECT hotel_id, stars FROM hotel WHERE (hotel.hotel_id = room.hotel_id AND hotel.stars >= $minimumStars))";
}

if($minimumCapacity > 0) {
    // $room_query = $room_query . " AND capacity >= $minimumCapacity";
}

if($hotelChain != "Any") {
    // $room_query = $room_query . " AND (SELECT hotel_id, hotel_chain_id FROM hotel_chain WHERE (hotel_chain.hotel_id = room.hotel_id AND hotel_chain.hotel_chain_id = $hotelChain))";
}

if($minimumRooms > 0) {
    // $room_query = $room_query . " AND (SELECT hotel_id, number_of_rooms FROM hotel WHERE (hotel.hotel_id = room.hotel_id AND hotel.number_of_rooms = $minimumRooms))";
}

if($maximumPrice > 0) {
    // $room_query = $room_query . " AND price <= $maximumPrice";
}

$result = pg_query("SET search_path = 'HotelSystem'; " . $room_query . ";");

while ($room = pg_fetch_row($result, null, PGSQL_ASSOC)) {

    $room_number = $room['room_number'];
    $price = $room['price'];
    $capacity = $room['capacity'];

    echo "<form>\n";
    echo "<li>\n";
    echo "Room: $room_number | Price: \$$price | Capacity: $capacity";
    echo "<button>Book</button>";
    echo "<li>";
    echo "</form>";

}

pg_free_result($result);
pg_close($dbconn);

?>
</ul>

</body>
</html>