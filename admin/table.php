<html>
<head>
<title>User Details</title>
<style>
body{
	background-color: whitesmoke;
}
input{
	width:90%;
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
<table>
<tr>

 <th>Flight-Name   </th>
		 <th>---Flight-From---</th>
		 <th>---Flight-time--- </th>
		<th>---Flight-date---</th>
		<th>---Flight-to---</th>
		<th>---Booking-type---</th>
		<th>---Booking-ID---</th>
		<th>---Passenger-Name---</th>
		<th>---Passenger-Email---</th>
		<th>---Passenger-age---</th>
		<th>---Passenger-Country---</th>
		<th>---Operation---</th>
</tr>
<?php
$conn = mysqli_connect("localhost","root","","online_flight_server");
$query = "select * from flight_table";
$data = mysqli_query($conn,$query);
$total = mysqli_num_rows($data);
//echo $result['flight_id']." ".$result['flight_name']." ".$result['flight_from']" ".$result['flight_time']." ".$result['flight_date']." ".$result['flight_to']." ".$result['booking_type']." ".$result['booking_id']." ".$result['passenger_name']." ".$result['passenger_email']." ".$result['passenger_age']." ".$result['passenger_country'];
if($total!=0)
{
while($result=mysqli_fetch_assoc($data))
{
echo"
<tr>
<td>".$result['flight_id']."</td>
<td>".$result['flight_name']."</td>
<td>".$result['flight_from']."</td>
<td>".$result['flight_time']."</td>
<td>".$result['flight_date']."</td>
<td>".$result['flight_to']."</td>
<td>".$result['booking_type']."</td>
<td>".$result['booking_id']."</td>
<td>".$result['passenger_name']."</td>
<td>".$result['passenger_email']."</td>
<td>".$result['passenger_age']."</td>
<td>".$result['passenger_country']."</td>
<td><a href='update.php?id=$result[flight_id]'><input type ='submit' name ='edit'value='Edit/Update'></td>
<td><a href='delete.php?id=$result[flight_id]'><input type ='submit'name ='delete' value='Delete'></td>
</tr>
";
}
}
else{
echo "No records found";
}
?>
</body>
</html>