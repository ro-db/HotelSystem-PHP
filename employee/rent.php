<!DOCTYPE html>
<html>
    <head>
        <title>Rent</title>
        <script type="text/javascript" src="/javascript/form_handler.js"></script>
    </head>

    <body>
        <?php
            $roomID = $_POST["roomID"];
        ?>

        <h3>Rent room dates:</h3>
        
        <form method='POST' id="requestBookingForm">

            <label>Start date:</label>
            <input type="date" name="startDate" value=<?php echo $_POST['startDate'];?> />
            <br/>
            <label>End date :</label>
            <input type="date" name="endDate" value=<?php echo $_POST['endDate'];?> />
            <br/>
            <button type="submit" name="submit" value="submit">Submit</button>
        
        </form>
        
        <?php
            $today =  date('Y-m-d H:i:s');

            if ( isset($_POST['submit']) ){
                $startDate = $_POST['startDate'];
                $endDate = $_POST['endDate'];
                
                echo "<br/>";
                if($startDate < $today){
                    $startDate = date('Y-m-d');
                    echo "start date is: ".$startDate;
                    
                }
                if ($endDate < $today){
                    $endDate = date('Y-m-d');
                }
                if ($endDate < $startDate){
                    $endDate = $startDate;
                }
                $_POST['startDate'];
                $_POST['endDate'];
            }
            
            
        ?>

        <br/>
        Price:


    </body>

</html>
