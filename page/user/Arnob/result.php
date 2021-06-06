<?php
        $mysqli = new mysqli("localhost", "root", "", "online_flight_server");
        $start = $_POST["searchstartingfrom"];
        $destination = $_POST["searchdestination"];
        $date = $_POST["searchdeparture_date"];
        $result = $mysqli->query("SELECT * FROM flight_table Where flight_date='$date' and flight_from = '$start' and flight_to = '$destination'");
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
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About</a></li>
                  </ul>
            </div>
        </div>
    </div>
    <div class="tablediv">
        <table align="center" width="70%" border="2px" height="auto">
            
            <tr>
            <th colspan="7"><h2>Selected Flights</h2></th>
            </tr>
            <t>
                    <th> Flight ID </th>
                    <th> Flight Name </th>
                    <th> Flight Destination </th>
                    <th> Flight From </th>
                    <th> Flight Time </th>
                    <th> Flight Date </th>
                    <th>BOOK</th>
            </t>
        
            <?php 
                foreach ($result as $row) {
            ?>  
                
                <tr>
                    
                    <td><?php echo $row['flight_id']; ?></td>
                    <td><?php echo $row['flight_name']; ?></td>
                    <td><?php echo $row['flight_to']; ?></td>
                    <td><?php echo $row['flight_from']; ?></td>
                    <td><?php echo $row['flight_time']; ?></td>
                    <td><?php echo $row['flight_date']; ?></td>
                    <td><button><a href="book.php" target="_blank">BOOK NOW</a></button></td>
                </tr>

            <?php 
                    }
            ?>
    
        </table>
    </div>
</body>
</html>