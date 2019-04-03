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
  
            ?>
        </select><br/>
        Minimum Star Rating: <input type="number" name="minimumStars" value="0"/><br/>
        Minimum Capacity: <input type="number" name="minimumCapacity" value="0"/><br/>
        Hotel Chain: <select name="hotelChain">
        <?php
            include $_SERVER['DOCUMENT_ROOT'] . "/php/database.php";
            
            $hotel_chains_query = 'SET search_path="HotelSystem"; SELECT hotel_chain_id, address FROM hotel_chain;';
            $result = pg_query($hotel_chains_query);

            while($hotel_chain_array = pg_fetch_row($result, null, PGSQL_ASSOC)) {
                $hotel_chain_id = $hotel_chain_array["hotel_chain_id"];
                $hotel_chain_address = $hotel_chain_array["address"];
                echo "<option value=$hotel_chain_id>$hotel_chain_address</option>\n";
            }

            ?>

        </select><br/>
        Minimum number of Rooms: <input type="number" name="minimumRooms" value="0"/><br/>
        Maximum Price: <input type="number" name="maximumPrice"/><br/>
        <input type="submit" value="Search"/>
</form>

<br/>

We need to search for:<br/><br/>
<?php
echo "City: " . $_POST['city'] . "<br/>";
echo "Minimum Starts: " . $_POST['minimumStars'] . "<br/>";
echo "minimum Capacity: " . $_POST['minimumCapacity'] . "<br/>";
echo "Hotel Chain: " . $_POST['hotelChain'] . "<br/>";
echo "Minimum number of Rooms: " . $_POST['minimumRooms'] . "<br/>";
echo "Maximum Price: " . $_POST['maximumPrice'] . "<br/>";
?>

</body>
</html>