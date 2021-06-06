<?php
$conn = new mysqli("localhost", "root", "", "online_flight_server") or die("cannot connect database");
$destination = $_POST["searchdestination"];
$date = $_POST["searchdeparture_date"];
$time = $_POST["booktime"];
$start = $_POST["searchstartingfrom"];
$uid = $_POST["userid"];
$umethod = $_POST["method"];
// echo $destination ." " . $date . " " . $time . " " . $start . " " . $uid . " " . $umethod;
$sql1 = "SELECT `flight_id`,`flight_name` FROM `flight_table` WHERE `flight_from`='$start' 
        AND `flight_to`='$destination' AND `flight_time`='$time' AND `flight_date`='$date';";
$result1 = mysqli_query($conn, $sql1) or die ("sql1 failed");
foreach ($result1 as $row){
    $flight_id =  $row['flight_id'];
}
foreach ($result1 as $row){
    $flight_name = $row['flight_name'];
}
$bookid = $flight_id."_".$uid;
$sql2 = "SELECT `first_name`,`email` FROM `user` WHERE id = '$uid';";
$result2 = mysqli_query($conn, $sql2) or die ("sql2 failed");
foreach ($result2 as $row){
    $pname = $row['first_name'];
}
foreach ($result2 as $row){
    $pemail = $row['email'];
}

$sql3 = "INSERT INTO `booking` (`flight_id`, `flight_from`, `flight_to`, `flight_date`, `flight_time`, `flight_name`, `book_id`,
         `passenger_id`, `method`, `passenger_name`, `passenger_email`, `passenger_age`, `passenger_country`, `booking_type`)
         VALUES ('$flight_id', '$destination', '$start', '$date', '$time', '$flight_name', '$bookid', '$uid', '$umethod', '$pname', 
         '$pemail', '', '', '$umethod');";
$result3 = mysqli_query($conn, $sql3) or die ("sql3 failed");
$sql8 = "UPDATE flight_table set booking_type='booked' where flight_id='$flight_id';";
$result8 = mysqli_query($conn, $sql8) or die ("sql8 failed");


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="text-align: center;
            font-family: sans-serif;
            background-color: gray;
">
    <p><h1> Successfully Booked </h1></p>
    <span> <a href="checkbook.html"> See Booked Flights</a> </span>
</body>
</html>