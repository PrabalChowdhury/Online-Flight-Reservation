<?php
include_once 'dbh.inc.php';
		$flight_id= $_POST['id'];
	$flight_name= $_POST['name'];
	$flight_from= $_POST['from'];
	$flight_time= $_POST['time'];
	$flight_date= $_POST['date'];
	$flight_to= $_POST['to'];
	$booking_type= $_POST['btype'];
	$booking_id= $_POST['bid'];
	$passenger_name= $_POST['name'];
	$passenger_email= $_POST['email'];
	$passenger_age= $_POST['age'];
$passenger_country = $_POST['country'];
$sql = "INSERT INTO flight_table(flight_id,flight_name,flight_from,flight_time,flight_date,flight_to,booking_type,booking_id,passenger_name,passenger_email,passenger_age,passenger_country) VALUES('$flight_id','$flight_name','$flight_from','$flight_time','$flight_date','$flight_to','$booking_type','$booking_id','$passenger_name','$passenger_email','$passenger_age','$passenger_country');";
$query_run = mysqli_query($conn,$sql);
if($query_run){
	echo '<script> alert("Record is added in the Database")</script>';
}
else{
	echo '<script> alert("Record Failed to be added in the Database")</script>';
}
?>
<?php
include('dbh.inc.php');
error_reporting(0);
if(isset($_POST['home'])){
	header("Location: ../php/admin/search.php");

;
}
?>