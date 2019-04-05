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
                echo "<option value='$city'>$city</option>\n";
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

if(strcmp($hotelChain, "Any")) {
    $room_query = "SELECT DISTINCT * FROM room NATURAL JOIN hotel WHERE city='$city'";
} else {
    $room_query = "SELECT DISTINCT * FROM room NATURAL JOIN hotel, hotel_chain WHERE city = '$city' AND hotel_chain.address = '$hotelChain'";
}

if($minimumStars > 0) {
    // $room_query = $room_query . " AND (SELECT hotel_id, stars FROM hotel WHERE (hotel.hotel_id = room.hotel_id AND hotel.stars >= $minimumStars))";
    $room_query .= " AND >= $minimumStars";
}

if($minimumCapacity > 0) {
    // $room_query = $room_query . " AND capacity >= $minimumCapacity";
    $room_query .= " AND capacity >= '$minimumCapacity'";
}

if($minimumRooms > 0) {
    // $room_query = $room_query . " AND (SELECT hotel_id, number_of_rooms FROM hotel WHERE (hotel.hotel_id = room.hotel_id AND hotel.number_of_rooms = $minimumRooms))";
    $room_query .= " AND number_of_rooms >= '$minimumRooms'";
}

if($maximumPrice > 0) {
    // $room_query = $room_query . " AND price <= $maximumPrice";
    $room_query .= " AND price <= '$maximumPrice'";
}

$room_query = "SET search_path = 'HotelSystem'; " . $room_query . ";";

include $_SERVER['DOCUMENT_ROOT'] . "/php/database.php";

$result = pg_query($room_query);

if(pg_num_rows($result) > 0) {
    while ($room = pg_fetch_row($result, null, PGSQL_ASSOC)) {
        
        $room_id = $room['room_id'];
        $room_number = $room['room_number'];
        $price = $room['price'];
        $capacity = $room['capacity'];

        echo "<li>\n";
        echo "<form method='POST'>\n";
        echo "<input type='hidden' name='room_id' value='$room_id'/>";
        echo "Room: $room_number | Price: \$$price | Capacity: $capacity";
        echo "<button type='submit' formaction='/customer/book.php'n>Book</button>";
        echo "</form>";
        echo "</li>";

    }
} else {
    echo "No rooms found.<br/>";
}

pg_free_result($result);
pg_close($dbconn);

?>
</ul>

</body>
</html>
