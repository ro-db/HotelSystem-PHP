<!DOCTYPE html>
<html>
    <head>
        <title>Rent</title>
        <script type="text/javascript" src="/javascript/form_handler.js"></script>
        <script type="text/javascript" src="/javascript/dateVaildator.js"></script>
    </head>

    <body>
        <?php
            $roomID = $_POST["roomID"];
        ?>

        <h3>Rent room dates:</h3>
        
        <form method='POST' id="requestBookingForm">

        <label>Start date:</label>
        <input type="date" name="startDate" />
        <br/>
        <label>End date :</label>
        <input type="date" name="endDate" />
        <br/>
        <button type="submit" value="submit">Submit</button>
        
        </form>
        
        <br/>
        Price:
        

        <script type="text/javascript">
                console.log("reached");
                var form = document.getElementById("requestBookingForm");
                if(form.addEventListener) {
                form.addEventListener("submit", processBookingForm, false);
                } else if(form.attachEvent) {
                form.attachEvent("onsubmit", processBookingForm);
                }
        </script>

    </body>

</html>
