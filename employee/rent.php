<!DOCTYPE html>
<html>
    <head>
        <title>Rent</title>
    </head>

    <body>

        <h3>Rent room dates:</h3>
        
        <form method='POST'>
            <?php
            $room_id = $_POST['room_id'];
            echo "<input type='hidden' name='room_id' value='$room_id'/><br>";
            ?>

            <label>Customer SIN: </label>
            <input name="sin_number" required="required" type="number" pattern="[0-9]{9,9}" value="<?php echo isset($_POST['sin_number'])? $_POST['sin_number']:'';?>"><br/>

            <label>Customer Name:</label>
            <input name="fullname" required="required" type="text" require="require" value="<?php echo isset($_POST['fullname'])? $_POST['fullname']:'';?>"><br/>

            <label>Customer Address: </label>
            <input name="address" required="required" type="address" require="require" value="<?php echo isset($_POST['address'])? $_POST['address']:'';?>"><br/>
           
            <label>Start date:</label>
            <input type="date" name="startDate" require="require" value="<?php echo isset($_POST['startDate'])? $_POST['startDate']:'';?>"/><br/>

            <label>End date :</label>
            <input type="date" name="endDate" require="require" required="required" value="<?php echo isset($_POST['endDate'])? $_POST['endDate']:'';?>"/><br/>

            <button type="submit">Calculate Price</button>
        
        </form>

        <?php

            if(empty($_POST) || !isset($_POST['sin_number'])) {
                return;
            }

            $today =  date('Y-m-d H:i:s');

            $room_id = $_POST["room_id"];
            $SIN = $_POST['sin_number'];
            $fullname = $_POST['fullname'];
            $address = $_POST['address'];

            $startDate = $_POST['startDate'];
            $endDate = $_POST['endDate'];
            
            if($startDate < $today){
                $startDate = date('Y-m-d');                    
            }
            if ($endDate < $today){
                $endDate = date('Y-m-d');
            }
            if ($endDate < $startDate){
                $endDate = $startDate;
            }
            
            $datesDifference =  floor(abs(strtotime($endDate) - strtotime($startDate)) / 86400); // Please make thiss a const.

            include $_SERVER['DOCUMENT_ROOT'] . "/php/database.php";

            $room_price = pg_query('SET search_path="HotelSystem"; SELECT price FROM room WHERE room_id=\''.$room_id.'\';');
            $price_array = pg_fetch_row($room_price, null, PGSQL_NUM);
            $price_per_stay = $price_array[0][0]; // Should be 1 row because we search by primary key.
             
            $price = $datesDifference * $price_per_stay;

            pg_free_result($room_price);
            pg_close($dbconn);

        ?>

        <br/>

        <form method='POST'>
        <?php
        if(isset($price) && $price !== 0) {
            echo "<input type='hidden' name='price' value='$price'/>\n";
            echo "Price: $" . $price . "<br/>\n";
            echo "<button type='submit' formaction='/php/rent_complete.php'>Rent</button>\n";
        }
        ?>
        </form>

    </body>

</html>
