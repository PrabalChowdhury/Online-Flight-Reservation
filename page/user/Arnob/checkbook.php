<?php
$conn = new mysqli("localhost", "root", "", "online_flight_server") or die("cannot connect database");
$uid = $_POST["id"];
$sql1 = "SELECT `flight_name`, `flight_id`, `flight_from`,`passenger_name`,`passenger_email`, `book_id` FROM `booking` WHERE `passenger_id`='$uid';";
$result1 = mysqli_query($conn, $sql1) or die ("sql1 failed");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data</title>
    <link rel="stylesheet" href="usersearchresult_css.php">
</head>
<body>
    <div class="updiv">
        <div class="updivmid">
            <div class="logo">
            <img src="logo.jpg" class="img-responsive">
            </div>
            <div class="menu">
                  <ul>
                    <li><a href="../home.php">Home</a></li>
                    <li><a href="#">About</a></li>
                  </ul>
            </div>
        </div>
    </div>
    <div class="tablediv">
        <table align="center" width="70%" border="2px" height="auto">
            
            <tr>
            <th colspan="7"><h2>Booked Flights</h2></th>
            </tr>
            <t>
                    <th> Flight ID </th>
                    <th> Flight Name </th>
                    <th> Flight Destination </th>
                    <th> Passenger Name </th>
                    <th> Passenger Email </th>
                    <th> Book ID </th>
                    <th>Cancl</th>
            </t>
        
            <?php 
                foreach ($result1 as $row) {
            ?>  
                
                <tr>
                    
                    <td><?php echo $row['flight_id']; ?></td>
                    <td><?php echo $row['flight_name']; ?></td>
                    <td><?php echo $row['flight_from']; ?></td>
                    <td><?php echo $row['passenger_name']; ?></td>
                    <td><?php echo $row['passenger_email']; ?></td>
                    <td><?php echo $row['book_id']; ?></td>
                    <td><button><a href="../cancelling.php" target="_blank">Cancel</a></button></td>
                </tr>

            <?php 
                    }
            ?>
    
        </table>
    </div>
</body>
</html>