<!DOCTYPE html>
<html lang="en">

<head>
    <title>Book a Room</title>
</head>

<body>

    <h3>Book a Room</h3>
    <form action="/php/create_booking.php" method="POST">
        <?php
        $room_id = 1;//$_POST['room_id'];
        echo "<input type='hidden' name='room_id' value=''/><br>";
        ?>
        SIN: <input name="SIN" type="number"/><br/>
        Full Name: <input name="fullname" type="text"/><br/>
        Address: <input name="address" type="address"/><br/>
        <!-- date -->
        <button type="submit" formaction="/customer/book.php">Complete Booking</button>
        
</form>

</body>

</html>