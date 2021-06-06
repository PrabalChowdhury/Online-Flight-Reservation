<html>
<head><title>Add</title>
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
<form action = "add.php" method ="POST">
<center>
<h1>Add Flight Details</h1>
         <input type ="text" name ="id" placeholder = Flight-ID><br>
		<input type ="text" name ="name" placeholder = Flight-Name><br>
		<input type ="text" name ="from" placeholder = Flight-From ><br>
		<input type ="text" name ="time" placeholder = Flight-time><br>
		<input type ="text" name ="date" placeholder = Flight-date><br>
		<input type ="text" name ="to" placeholder = Flight-to><br>
		<input type ="text" name ="btype" placeholder = Booking-type><br>
		<input type ="text" name ="bid" placeholder = Booking-ID><br>
		<input type ="text" name ="name" placeholder = Passenger-Name><br>
		<input type ="text" name ="email" placeholder = Passenger-Email><br>
		<input type ="text" name ="age" placeholder = Passenger-age><br>
		<input type ="text" name ="country" placeholder = Passenger-Country><br>
        <input type = "submit" name ="new" value ="Add Data"><br>
		<input type="submit" name ="home" value ="Home"><br>
		</center>
		</form>


</body>
</html>
