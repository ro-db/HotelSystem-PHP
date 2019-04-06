<!DOCTYPE html>
<html>
    <head>
        <title>Rent</title>
    </head>

    <body>

        <h3>Rent room dates:</h3>
        
        <form method='POST'>
            <label>Customer SIN: </label>
            <input type='hidden' name='room_id' value=<?php echo $_POST['room_id'];?>/>
            <input name="SIN" required="required" type="number" pattern="[0-9]{9,9}" value=<?php echo $_POST['SIN'];?>><br/>

            <label>Customer Name:</label>
            <input name="fullname" required="required" type="text" value=<?php echo $_POST['fullname'];?>><br/>

            <label>Customer Address: </label>
            <input name="address" required="required" type="address" value=<?php echo $_POST['address'];?>><br/>
           
            <label>Start date:</label>
            <input type="date" name="startDate" value=<?php echo $_POST['startDate'];?> /><br/>

            <label>End date :</label>
            <input type="date" name="endDate" value=<?php echo $_POST['endDate'];?> /><br/>

            <button type="submit" name="submit" value="submit">Calculate Price</button>
        
        </form>

        <?php

            if(empty($_POST)) {
                return;
            }

            $today =  date('Y-m-d H:i:s');

            $room_id = $_POST["room_id"];
            $SIN = $_POST['SIN'];
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
            
            $datesDifference =  floor(abs(strtotime($endDate) - strtotime($startDate)) / 86400);

            // calculate price
            include $_SERVER['DOCUMENT_ROOT'] . "/php/database.php";

            $room_price = pg_query('SET search_path="HotelSystem"; SELECT price FROM room WHERE room_id=room_id;');
            while ($price_array = pg_fetch_row($room_price, null, PGSQL_NUM)){
                $price_per_stay = $price_array[0];
            }
            
            $price = $datesDifference * $price_per_stay;

            pg_free_result($room_price);
            pg_close($dbconn);

        ?>

        <br/>

        <form method='POST'>
        <?php
        if(isset($price)) {
            echo "<input type='hidden' name='price' value='$price'/>\n";
            echo "Price: $" . $price . "<br/>\n";
            echo "<button type='submit' formaction='/php/rent_complete.php'>Rent</button>\n";
        }
        ?>
        </form>

    </body>

</html>
