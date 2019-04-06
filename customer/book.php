<!DOCTYPE html>
<html lang="en">

<head>
    <title>Book a Room</title>
</head>

<body>

    <h3>Book a Room</h3>
    <form method="POST">
        <?php
        $room_id = $_POST['room_id'];
        echo "<input type='hidden' name='room_id' value='$room_id'/><br>";
        ?>
        SIN: <input name="SIN" required="required" type="number" pattern="[0-9]{9,9}"/><br/>
        Full Name: <input name="fullname" required="required" type="text"/><br/>
        Address: <input name="address" required="required" type="address"/><br/>
        Start Date: <input name="startDate" required="required" type="date"/><br/>
        End Date: <input name="endDate" required="required" type="date"/><br/>
        <button type="submit" formaction="/php/create_booking.php">Complete Booking</button>
        
</form>

</body>

</html>