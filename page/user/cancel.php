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
                 $search = mysqli_real_escape_string($conn, $email);
                $canc = "cancelled";
                $sql3 = "SELECT * FROM flight_table WHERE passenger_email LIKE '%$search%' AND booking_type LIKE '%$canc%'";
                $result3 = mysqli_query($conn, $sql3);
                $queryResults3 = mysqli_num_rows($result3);


                if ($queryResults3 > 0) {
                    while ($row = mysqli_fetch_assoc($result3)) {
                        echo "<div class='article-box'>
                        <h4 > Booking ID: " . $row['booking_id'] . "</h4>
                        <h4> Flight Details </h4> 
						<p>-----------------------------------------</p>
						<p> Flight ID: " . $row['flight_id'] . "</p>
                        <p> From: " . $row['flight_from'] . "</p>
                        <p> To: " . $row['flight_to'] . "</p>
                        <p> Date: " . $row['flight_date'] . "</p>
                        <p> Time: " . $row['flight_time'] . "</p>
                        <h4> Passenger Details </h4>
						<p>-----------------------------------------</p>
                        <p> Name: " . $row['passenger_name'] . "</p>
                        <p> Email: " . $row['passenger_email'] . "</p>
                        <p> Age: " . $row['passenger_age'] . "</p>
                        <p> Country: " . $row['passenger_country'] . "</p>
                        <p></p>
                        <p></p>
                        <p>==================================================================================</p>
                        <br>
                    </div>";
                    }
                } else {
                    echo "There is no cancelled flights!";
                }
                ?>
            </section>
        </div> 
        <div class="control-sidebar-bg"></div>
    </div>  
</body>
</html>
