<?php
    include 'header.php';
?>


<h1>Online Flight Booking System</h1>
<h2>Admin Panel</h2>

<div class="article-container">
    <?php
            echo "<h3>Booked Flights:<h3>";
            $book = "booked";
            $sql1="SELECT * FROM flight_table WHERE booking_type LIKE '%$book%'";
            $result1 = mysqli_query($conn, $sql1);
            $queryResults1 = mysqli_num_rows($result1);
			
            if($queryResults1 > 0){
				while ($row = mysqli_fetch_assoc($result1)){
					echo "<div class='article-box'>
						<h4> Booking ID: ".$row['booking_id']."</h4>
						<h4> Flight Details </h4>
						<p>-----------------------------------------</p>
						<p> Flight ID: ".$row['flight_id']."</p>
						<p> From: ".$row['flight_from']."</p>
						<p> To: ".$row['flight_to']."</p>
						<p> Date: ".$row['flight_date']."</p>
						<p> Time: ".$row['flight_time']."</p>
						<h4> Passenger Details </h4>
						<p>-----------------------------------------</p>
						<p> Name: ".$row['passenger_name']."</p>
						<p> Email: ".$row['passenger_email']."</p>
						<p> Age: ".$row['passenger_age']."</p>
						<p> Country: ".$row['passenger_country']."</p>
						<p></p>
						<p></p>
						<p>==================================================================================</p>
						<br>
					</div>";
				}
			}
			else{
                echo "There is no booked flights!";
            }

            echo "<h3>Cancelled Flights:<h3>";
            $canc = "cancelled";
            $sql3="SELECT * FROM flight_table WHERE booking_type LIKE '%$canc%'";
            $result3 = mysqli_query($conn, $sql3);
            $queryResults3 = mysqli_num_rows($result3);


            if($queryResults3 > 0){
                while ($row = mysqli_fetch_assoc($result3)) {
                    echo "<div class='article-box'>
                        <h4 > Booking ID: ".$row['booking_id']."</h4>
                        <h4> Flight Details </h4> 
						<p>-----------------------------------------</p>
						<p> Flight ID: ".$row['flight_id']."</p>
                        <p> From: ".$row['flight_from']."</p>
                        <p> To: ".$row['flight_to']."</p>
                        <p> Date: ".$row['flight_date']."</p>
                        <p> Time: ".$row['flight_time']."</p>
                        <h4> Passenger Details </h4>
						<p>-----------------------------------------</p>
                        <p> Name: ".$row['passenger_name']."</p>
                        <p> Email: ".$row['passenger_email']."</p>
                        <p> Age: ".$row['passenger_age']."</p>
                        <p> Country: ".$row['passenger_country']."</p>
                        <p></p>
                        <p></p>
                        <p>==================================================================================</p>
                        <br>
                    </div>";
                }
            }else{
                echo "There is no cancelled flights!";
            }

    ?>
</div>