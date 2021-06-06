<?php
    $conn = new mysqli("localhost", "root", "", "online_flight_server") or die("cannot connect database");
   
    $sql1 ="SELECT DISTINCT flight_from FROM flight_table;" ;
    $sql2 = "SELECT DISTINCT flight_date FROM flight_table;";
    $sql3 = "SELECT DISTINCT flight_time FROM flight_table;";
    $sql4 = "SELECT DISTINCT flight_to FROM flight_table;";
    $result1 = mysqli_query($conn, $sql1) or die("cannot connect query1");
    $result2 = mysqli_query($conn, $sql2) or die("cannot connect query2");
    $result3 = mysqli_query($conn, $sql3) or die("cannot connect query3");
    $result4 = mysqli_query($conn, $sql4) or die("cannot connect query4");
    $a1=array();
    $a2=array();
    $a3=array();
    $a4=array();
    $row = mysqli_fetch_assoc($result1);
    $x = $row["flight_from"];
    array_push($a1, $x);
    while ($row = mysqli_fetch_assoc($result1)){
        array_push($a1, $row["flight_from"]) ;
    }
    // print_r($a1) ;
    $row1 = mysqli_fetch_assoc($result4);
    $y = $row1["flight_to"];
    array_push($a4, $y);
    while ($row = mysqli_fetch_assoc($result4)){
        array_push($a4, $row["flight_to"]) ;
    }
    
    while ($row = mysqli_fetch_assoc($result2)){
        array_push($a2, $row["flight_date"]) ;
    }
    
    while ($row = mysqli_fetch_assoc($result3)){
        array_push($a3, $row["flight_time"]) ;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bookstyle.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    <link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="footer.css">   
</head>
<body>
    <h1> Welcome to Booking Class 
        <hr>
    </h1>
    <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente, nulla, ullam rerum veritatis impedit dolorum necessitatibus neque excepturi voluptates voluptatum maiores placeat quisquam harum blanditiis.
        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Fugiat tempore placeat quasi optio culpa totam, voluptate nihil! Tempore consequuntur, numquam omnis exercitationem nostrum ab praesentium tenetur dicta illo sint temporibus!
    </p>
    <p ><h2 style="text-align:center;
                    font-size: 40px;
                    transition: width .5s ease-in-out;
    "> For booking you need to fillup a from. </h2>
    <hr> <p id="page" 
    style="color: red;
    background-color: black;
    font-family: system-ui;
    text-align: center;"
    > *** PLEASE MAKE SURE YOU HAVE CHOISEN CORRECT DATE TIME DESTINATION FROM PREVIOUS PAGE *** </p>
</p>
    <form action="bookresult.php"  target="blank" method="post">
        
                    <label for="to">Destination :</label>
                    <?php
                          $i =0;
                         while ($i< count($a4)){
                    ?>
                        <select 
                        style="display: block;
                                text-align: center;
                                width: 10%;
                                margin: 10px auto;"
                        id="from"placeholder="from" name="searchdestination">
                                        <option value="<?php echo $a4[$i]?>">
                                            <?php
                                             echo $a4[$i]; 
                                             $i++;
                                        ?></option>
                                        <option value="<?php echo $a4[$i]?>">
                                            <?php
                                             echo $a4[$i]; 
                                             $i++;
                                        ?></option>
                                         <option value="<?php echo $a4[$i]?>">
                                            <?php
                                             echo $a4[$i]; 
                                             $i++;
                                        ?></option>
                                         <option value="<?php echo $a4[$i]?>">
                                            <?php
                                             echo $a4[$i]; 
                                             $i++;
                                        ?></option>
                        </select>
                        <?php
                            } 
                        ?>
                        <label for="from">Starting from:</label>
                        <?php
                             $i =0;
                            while ($i< count($a1)){
                         ?>
                         <select 
                         style="display: block;
                                text-align: center;
                                width: 10%;
                                margin: 10px auto;"
                         id="to"placeholder="to" name="searchstartingfrom">
                                        <option value="<?php echo $a1[$i]?>">
                                            <?php
                                             echo $a1[$i]; 
                                             $i++;
                                            ?></option>
                                        <option value="<?php echo $a1[$i]?>"> <?php
                                             echo $a1[$i]; 
                                             $i++;
                                            ?></option>
                                        <option value="<?php echo $a1[$i]?>"> <?php
                                             echo $a1[$i]; 
                                             $i++;
                                            ?></option>
                                        <option value="<?php echo $a1[$i]?>"> <?php
                                             echo $a1[$i]; 
                                             $i++;
                                            ?></option>
                                       
                                        </select>
                                    <?php
                                    } 
                                    ?>
                       <label for="departuredate">Departure Date:</label>
                       <?php
                          $i =0;
                          while ($i< count($a2)){
                        ?>
                            <select 
                            style="display: block;
                                text-align: center;
                                width: 10%;
                                margin: 10px auto;"
                            id="to" name="searchdeparture_date">
                            <option value="<?php echo $a2[$i] ?>">
                                <?php
                                 echo $a2[$i]; 
                                 $i++;
                                ?></option>
                            <option value="<?php echo $a2[$i] ?>"> <?php
                                 echo $a2[$i]; 
                                 $i++;
                                ?></option>
                            <option value="<?php echo $a2[$i] ?>"> <?php
                                 echo $a2[$i]; 
                                 $i++;
                                ?></option>
                             
                            </select>
                        <?php
                        }
                        ?>
                        <label for="departuretime">Departure Time:</label>
                        <?php
                            $i =0;
                            while ($i< count($a3)){
                            ?>
                                <select  name = "booktime" style="display: block;
                                text-align: center;
                                width: 10%;
                                margin: 10px auto;">
                                <option value="<?php echo $a3[$i] ?>">
                                    <?php
                                    echo $a3[$i]; 
                                    $i++;
                                    ?></option>
                                <option value="<?php echo $a3[$i] ?>"> <?php
                                    echo $a3[$i]; 
                                    $i++;
                                    ?></option>
                                <option value="<?php echo $a3[$i] ?>"> <?php
                                    echo $a3[$i]; 
                                    $i++;
                                    ?></option>
                               
                               
                                </select>
                            <?php
                            } 
                            ?>

                        <label for="adults">Seat:</label>
                        <select
                        style="display: block;
                                text-align: center;
                                width: 5%;
                                margin: 10px auto;"
                        id="adults" name="searchadults">
                            <option value="a1">1</option>
                            <option value="a2">2</option>
                            <option value="a3">3</option>
                            <option value="a4">4</option>
                        </select>
                        <label for="userid" >User ID</label>
                        <input type="text" placeholder="Your ID" name="userid" id="promo"> 
                        <label for="payment">Payment:</label>
                        <input type="text" placeholder="Payment Method" name="method" id="method"> 
        
                        <input type="submit" value="Book">
                        <input type="reset" value="Reset" id="reset">
     </form>
     <!-- <div class="main"> FOOTER DESIGN IN HTML CSS</div> -->
		<footer class="footer-distributed">

			<div class="footer-left">

				<h3>Novo<span>Air</span></h3>

				<p class="footer-links">
					<a href="index.php">Home</a>
					·
					<!-- <a href="#">Blog</a> -->
					<a href="#">Pricing</a>
					·
					<a href="#">About</a>
					·
					<a href="#">Faq</a>
					·
					<a href="#">Contact</a>
				</p>

				<p class="footer-company-name">novoair &copy; 2021</p>
			</div>

			<div class="footer-center">

				<div>
					<i class="fa fa-map-marker"></i>
					<p><span>Dhanmondi 36</span> Dhaka, Bangladesh</p>
				</div>

				<div>
					<i class="fa fa-phone"></i>
					<p>+88 0181 7470 168</p>
				</div>

				<div>
					<i class="fa fa-envelope"></i>
					<p><a href="#">contact@novoairlines.com</a></p>
				</div>

			</div>

			<div class="footer-right">

				<p class="footer-company-about">
					<span>About the company</span>
					 NovoAir is a airline service provider &amp; Best Management.
				</p>

				<div class="footer-icons">

					<a href="#"><i class="fa fa-facebook"></i></a>
					<a href="#"><i class="fa fa-twitter"></i></a>
					<a href="#"><i class="fa fa-linkedin"></i></a>
					<a href="#"><i class="fa fa-github"></i></a>

				</div>

			</div>

		</footer>
      
</body>
</html>