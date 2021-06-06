<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Finger Authentication</title> 
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <link rel="stylesheet" href="assets/css/AdminLTE.min.css">  <!-- Theme style -->
        <link rel="stylesheet" href="assets/css/_all-skins.min.css">
        <link rel="stylesheet" href="assets/css/blue.css">   <!-- iCheck -->
        <link rel="stylesheet" href="assets/css/bookstyle.css">   
        <script src="assets/js/jquery-3.2.1.min.js"></script>  
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>     
        <script src="assets/js/app.min.js"></script>  
        <script src="assets/js/demo.js"></script> 
        <link rel="shortcut icon" href="assets/ico/favicon.jpg">
    </head>

    <body class="hold-transition skin-blue sidebar-mini

          <?php
          session_start();
          require_once('dbConnect.php');
          if (isset($_POST['logout'])) {
              $_SESSION = array();
              session_destroy();
              header("location: ../../index.php");
          }
          $email = $_SESSION["id"];
          ?>

          <?php
          $conn = new mysqli("localhost", "root", "", "online_flight_server") or die("cannot connect database");
          $sql1 = "SELECT DISTINCT flight_to FROM flight_table;";
          $sql2 = "SELECT DISTINCT flight_date FROM flight_table;";
          $sql3 = "SELECT DISTINCT flight_time FROM flight_table;";
          $result1 = mysqli_query($conn, $sql1) or die("cannot connect query1");
          $result2 = mysqli_query($conn, $sql2) or die("cannot connect query2");
          $result3 = mysqli_query($conn, $sql3) or die("cannot connect query3");
          $a1 = array();
          $a2 = array();
          $a3 = array();
          $row = mysqli_fetch_assoc($result1);
          $x = $row["flight_to"];
          array_push($a1, $x);
          while ($row = mysqli_fetch_assoc($result1)) {
              array_push($a1, $row["flight_to"]);
          }

          while ($row = mysqli_fetch_assoc($result2)) {
              array_push($a2, $row["flight_date"]);
          }

          while ($row = mysqli_fetch_assoc($result3)) {
              array_push($a3, $row["flight_time"]);
          }
          ?>

          <div class="wrapper">
  <!--            <%
                      String loginFlag = (String) session.getAttribute("LOGIN") ;  
                      if ( loginFlag == null) {
                          String redirectURL = "index.jsp";
                          response.sendRedirect(redirectURL); 
                      } 

%>-->
          <?php include 'topbar.php'; ?>
          <?php include 'sidebar.php'; ?>  

          <div class="content-wrapper"> 


            <!-- Main content -->
            <section class="content">

                <?php
                if (isset($_POST['submit'])) {
                    $destination = $_POST["searchdestination"];
                    $date = $_POST["searchdeparture_date"];
                    $time = $_POST["booktime"];
                    $start = $_POST["searchfrom"];
                    $uid = $email;
                    $umethod = $_POST["method"];
// echo $destination ." " . $date . " " . $time . " " . $start . " " . $uid . " " . $umethod;
                    $sql1 = "SELECT flight_id, flight_name from flight_table;";
                    $result1 = mysqli_query($conn, $sql1) or die("sql1 failed");
                    foreach ($result1 as $row) {
                        if(empty($row['flight_id'])){
                           echo 'This line is printed, because the $var1 is empty.';
                        }else{
                            $flight_id = $row['flight_id'];
                        }
                    
                    }
                    foreach ($result1 as $row) {
                        $flight_name = $row['flight_name'];
                        echo $flight_name; 
                    }
                    $bookid = rand(10, 100);
                    $sql2 = "SELECT `first_name`,`email` FROM `user` WHERE email = '$uid';";

                    $result2 = mysqli_query($conn, $sql2) or die("sql2 failed");
                    foreach ($result2 as $row) {
                        $pname = $row['first_name'];
                    }
                    $pemail = $email;

                    $page = 21;
                    $sql3 = "INSERT INTO `flight_table` (`flight_id`, `flight_from`, `flight_to`, 
                        `flight_date`, `flight_time`, `flight_name`, `booking_id`,
        `passenger_name`, `passenger_email`, `passenger_age`, `passenger_country`, `booking_type`)
         VALUES ('$flight_id', '$start','$destination',  '$date', '$time', '$flight_name', '$bookid',  '$pname', 
         '$pemail', '$page', '$start', 'booked');";
                    echo $sql3;  
                    $result3 = mysqli_query($conn, $sql3) or die("\n sql3 failed");
                    $message = '<div class="alert alert-success" role="alert">Booking is successfull</div>';
                    echo $message;
                }
                ?>

                <form action="booking.php"   method="post">

                    <label for="to">Starting from :</label>
                    <select 
                        style="display: block;
                        text-align: center;
                        width: 10%;
                        margin: 10px auto;"
                        id="from"placeholder="from" name="searchfrom">
                        <option value="Bangladesh">Bangladesh</option>
                    </select>
                    <label for="from">Destination :</label>


                    <select
                        style = "display: block;
                        text-align: center;
                        width: 10%;
                        margin: 10px auto;"
                        id = "to"placeholder = "to" name = "searchdestination">
                            <?php
                            $i = 0;
                            while ($i < count($a1)) {
                                ?>
                            <option value="<?php echo $a1[$i] ?>">
                                <?php
                                echo $a1[$i];
                                $i++;
                                ?></option>
                            <option value="<?php echo $a1[$i] ?>"> <?php
                                echo $a1[$i];
                                $i++;
                                ?></option>
                            <option value="<?php echo $a1[$i] ?>"> <?php
                                echo $a1[$i];
                                $i++;
                                ?></option>
                            <option value="<?php echo $a1[$i] ?>"> <?php
                                echo $a1[$i];
                                $i++;
                                ?></option>
                            <?php
                        }
                        ?>
                    </select>

                    <label for="departuredate">Departure Date:</label>
                    <?php
                    $i = 0;
                    while ($i < count($a2)) {
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
                    $i = 0;
                    while ($i < count($a3)) {
                        ?>
                        <select  name = "booktime">
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

                    <input type="submit" value="Book" name = "submit">
                    <input type="reset" value="Reset" id="reset">
                </form>
            </section>
        </div> 
        <div class="control-sidebar-bg"></div>
    </div>  
</body>
</html>
