<!DOCTYPE html>
<html>
    <head>
        <title>Rent</title>
    </head>

    <body>
        <?php
            $roomID = $_POST["roomID"];
        ?>

        <h3>Rent room dates:</h3>
        
        <form method='POST' id="requestBookingForm">
            <label>Customer SIN: </label>
            <input name="SIN" required="required" type="number" pattern="[0-9]{9,9}"/><br/>

            <label>Customer Name:</label>
            <input name="fullname" required="required" type="text"/><br/>

            <label>Customer Address: </label>
            <input name="address" required="required" type="address"/><br/>
           
            <label>Start date:</label>
            <input type="date" name="startDate" value=<?php echo $_POST['startDate'];?> /><br/>

            <label>End date :</label>
            <input type="date" name="endDate" value=<?php echo $_POST['endDate'];?> /><br/>

            <button type="submit" name="submit" value="submit">Submit</button>
        
        </form>

        <?php
            $today =  date('Y-m-d H:i:s');

            $sin = $_POST['SIN'];
            $fullname = $_POST['fullname'];
            $address = $_POST['address'];

            if ( isset($_POST['submit']) ){
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

                $_POST['startDate'];
                $_POST['endDate'];

                // calculate price
                include $_SERVER['DOCUMENT_ROOT'] . "/php/database.php";

                $room_price = pg_query('SET search_path="HotelSystem"; SELECT price FROM room WHERE room_id=4;');
                while ($price_array = pg_fetch_row($room_price, null, PGSQL_NUM)){
                    $price_per_stay = $price_array[0];
                }
                $price = $datesDifference * $price_per_stay;
                pg_close($dbconn);
            }
        ?>

        <br/>
        Price:<?php echo" ". $price ?>

        <form id="createRentingForm">
            <button type='submit' name="submit" formaction='/php/rent_complete.php'n>Rent</button>
        </form>

        <?php
            if ( isset($_POST['submit']) ){
                
                include $_SERVER['DOCUMENT_ROOT'] . "/php/database.php";
            
                $create_renting=pg_query('SET search_path="HotelSystem"; INSERT INTO rental (sin, room_id, start_date, end_date, price) 
                                        VALUES ($customer_sin, $room_id, $start_date, $end_date, $price)');
                
                pg_close($dbconn);
            
                exit();

            }
        ?>


    </body>

</html>
