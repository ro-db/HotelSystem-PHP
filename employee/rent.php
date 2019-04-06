<!DOCTYPE html>
<html>
    <head>
        <title>Rent</title>
    </head>

    <body>

        <h3>Rent room dates:</h3>
        
        <form method='POST' id="requestBookingForm">
            <label>Customer SIN: </label>
            <input name="SIN" required="required" type="number" pattern="[0-9]{9,9}" value=<?php echo $_POST['SIN'];?>><br/>

            <label>Customer Name:</label>
            <input name="fullname" required="required" type="text" value=<?php echo $_POST['fullname'];?>><br/>

            <label>Customer Address: </label>
            <input name="address" required="required" type="address" value=<?php echo $_POST['address'];?>><br/>
           
            <label>Start date:</label>
            <input type="date" name="startDate" value=<?php echo $_POST['startDate'];?> /><br/>

            <label>End date :</label>
            <input type="date" name="endDate" value=<?php echo $_POST['endDate'];?> /><br/>

            <button type="submit" name="submit" value="submit">Submit</button>
        
        </form>

        <?php
            $today =  date('Y-m-d H:i:s');

            $room_id = $_POST["roomID"];
            $SIN = $_POST['SIN'];
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

                $room_price = pg_query('SET search_path="HotelSystem"; SELECT price FROM room WHERE room_id=room_id;');
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
            <button type='submit' name="rent" formaction='/php/rent_complete.php'n>Rent</button>
        </form>

        <?php
            if ( isset($_POST['rent']) ){
                
                include $_SERVER['DOCUMENT_ROOT'] . "/php/database.php";
                
                $new_customer = array("sin_number" => $SIN, "full_name" => $fullname, "address" => $address);
                $new_renting = array("sin_number" => $SIN, "room_id" => $room_id, "start_date" => $startDate, "end_date" => $endDate, "price" => $price);

                pg_insert($dbconn, "HotelSystem.customer", $new_customer);
                pg_insert($dbconn, "HotelSystem.rental", $new_renting);
                
                pg_close($dbconn);
            
                exit();

            }
        ?>


    </body>

</html>
