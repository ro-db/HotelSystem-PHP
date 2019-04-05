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
        SIN: <input name="SIN" type="number"/><br/>
        Full Name: <input name="fullname" type="text"/><br/>
        Address: <input name="address" type="address"/><br/>
        <!-- date -->
        <button type="submit" formaction="/php/create_booking.php">Complete Booking</button>
        
</form>

</body>

</html>