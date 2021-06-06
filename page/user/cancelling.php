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
        <link rel="stylesheet" href="assets/css/cancelflight.css">   
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

          function escapeJavaScriptText($string) {
              return str_replace("\n", '\n', str_replace('"', '\"', addcslashes(str_replace("\r", '', (string) $string), "\0..\37'\\")));
          }
          ?>



          <?php
          $id = $email;
          $sql = "select flight_id, flight_from, flight_to, flight_date, flight_time, flight_name, passenger_name, passenger_email,booking_id "
                  . "FROM flight_table Where passenger_email = '$id' and booking_type='booked';";
          $result = mysqli_query($conn, $sql) or die("cannot connect query1");
           
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
                if (isset($_POST['YES'])) { 
                    $bookingid = $_POST['bookingid'];
                    $sql1 = "update flight_table set booking_type = 'cancelled' WHERE booking_id = $bookingid;";
//                    echo $sql1; 
                    $result1 = mysqli_query($conn, $sql1) or die("cannot connect query1");
                }
                ?>


                <form method="post" action="cancelling.php">        
                    <table align="center" width="70%" border="2px" height="auto">

                        <tr>
                            <th colspan="10"><h2>Selected Flights</h2></th>
                        </tr>
                        <t>
                            <th> Flight ID </th>
                            <th> Flight From </th>
                            <th> Flight To </th>
                            <th> Flight Date </th>
                            <th> Flight Time </th>
                            <th> Flight Name </th>
                            <th> Passenger Name </th>
                            <th> Passenger Email </th>
                            <th> Bookin Number </th>
                            <th>Cancel</th>
                        </t>

                        <?php
                        foreach ($result as $row) {
                            ?>  

                            <tr>

                                <td><?php echo $row['flight_id']; ?></td>
                                <td><?php echo $row['flight_from']; ?></td>
                                <td><?php echo $row['flight_to']; ?></td>
                                <td><?php echo $row['flight_date']; ?></td>
                                <td><?php echo $row['flight_time']; ?></td>
                                <td><?php echo $row['flight_name']; ?></td>
                                <td><?php echo $row['passenger_name']; ?></td>
                                <td><?php echo $row['passenger_email']; ?></td>
                                <td><?php echo $row['booking_id']; ?></td>
                                <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter">
                                        Cancel
                                    </button></td>


                            </tr>

                            <?php
                        }
                        ?>

                    </table> 
                </form> 

            </section>
        </div> 
        <div class="control-sidebar-bg"></div>
    </div>  


    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <form action="cancelling.php" method="post">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Do you want to delete data?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body"> 
                        <div class="form-group">
                            <label for="usr">Name:</label>
                            <input type="text" class="form-control" id="bookingid" name="bookingid">
                        </div> 

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                        <button type="submit" name="YES" class="btn btn-primary">yes</button>
                    </div>
                </div>
            </div>
        </form>
    </div>


</body>
</html>
