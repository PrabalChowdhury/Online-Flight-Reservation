<html>
<head>
<title>Flight Details</title>
<style>
body{
	background-color: whitesmoke;
}
input{
	width:40%;
	height:5%;
	border:1px;
	border-radius:05px;
	padding: 8px 15px 8px 15px;
	margin : 10px 0px 15px 0px;
	box-shadow: 1px 1px 2px 1px grey;
}
</style>
</head>

<body>
<center>
<h1>Search Flight Details</h1>
<form action="" method ="POST">
<input type="text" name ="id" placeholder="Enter Flight ID,Dates & Destinations to Search"/><br/>
<input type = "submit" name ="database" value ="Flight Details Database"><br>
<input type = "submit" name ="add" value ="Add Data"><br>
<input type="submit" name ="search" value ="Search Data"><br>
<input type="submit" name ="home" value ="Home"><br>
</form>

<?php
include('dbConnect.php');
error_reporting(0);
if(isset($_POST['database'])){
	header("Location: ../admin/table.php");

;
}
?>
<?php
include('dbConnect.php');
error_reporting(0);
if(isset($_POST['home'])){
	header("Location: ../admin/index.php");

;
}
?>
<?php
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection,"online_flight_server");
if(isset($_POST['search'])){
	$id = $_POST['id'];
	$date = $_POST['id'];
	$to = $_POST['id'];
	$query = "SELECT * FROM flight_table where flight_id = '$id' or flight_date = '$date'or flight_to = '$to';";
	$query_run = mysqli_query($connection,$query)or die( mysqli_error($connection));
	if(!$query_run){
		echo "<font color ='red'>No Record found from Database";
	}
	while($row = mysqli_fetch_array($query_run)){
		
		
		?>
		<form action ="" method="POST">
		<input type ="text" name ="id" value ="<?php echo $row['flight_id']?>"/><br>
		<input type ="text" name ="name" value ="<?php echo $row['flight_name']?>"/><br>
		<input type ="text" name ="from" value ="<?php echo $row['flight_from']?>"/><br>
		<input type ="text" name ="time" value ="<?php echo $row['flight_time']?>"/><br>
		<input type ="text" name ="date" value ="<?php echo $row['flight_date']?>"/><br>
		<input type ="text" name ="to" value ="<?php echo $row['flight_to']?>"/><br>
		<input type ="text" name ="btype" value ="<?php echo $row['booking_type']?>"/><br>
		<input type ="text" name ="bid" value ="<?php echo $row['booking_id']?>"/><br>
		<input type ="text" name ="name" value ="<?php echo $row['passenger_name']?>"/><br>
		<input type ="text" name ="email" value ="<?php echo $row['passenger_email']?>"/><br>
		<input type ="text" name ="age" value ="<?php echo $row['passenger_age']?>"/><br>
		<input type ="text" name ="country" value ="<?php echo $row['passenger_country']?>"/><br>
		<input type = "submit" name ="add" value ="Add Data"><br>
		<input type = "submit" name ="update" value ="Update Data"><br>
		<input type = "submit" name ="delete" value ="Delete Data"><br>
		</form>
		<?php
	}
}
?>
</center>
</body>
</html>

<?php
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection,"online_flight_server");
if(isset($_POST['update'])){
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


$query = "UPDATE flight_table SET flight_id = '$_POST[id]',flight_name = '$_POST[name]',flight_from = '$_POST[from]',flight_time = '$_POST[time]',flight_date = '$_POST[date]',flight_to = '$_POST[to]',booking_type= '$_POST[btype]',booking_id = '$_POST[bid]',passenger_name = '$_POST[name]',passenger_email = '$_POST[email]',passenger_age = '$_POST[age]',passenger_country = '$_POST[country]' WHERE flight_id='$_POST[id]';";
$query_run = mysqli_query($connection,$query)or die( mysqli_error($connection));


if($query_run){
	echo '<script> alert("Record Updated in the Database")</script>';
}
else{
	echo '<script> alert("Record Failed to be updated in the Database")</script>';
}
}
?>
<?php
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection,"online_flight_server");
if(isset($_POST['delete'])){

$query = "DELETE FROM flight_table WHERE flight_id = '$_POST[id]'";
$query_run = mysqli_query($connection,$query)or die( mysqli_error($connection));


if($query_run){
	echo '<script> alert("Record Deleted in the Database")</script>';
}
else{
	echo '<script> alert("Record Failed to be Deleted from the Database")</script>';
}
}
?>
<?php
include_once 'dbConnect.php';
//flight_id`, `flight_name`, `flight_from`, `flight_time`, `flight_date`, `flight_to`, `booking_type`, `booking_id`, `passenger_name`, `passenger_email`, `passenger_age`, `passenger_country`
if(isset($_POST['add'])){
header("Location: ../admin/addform.php");
}
?>


