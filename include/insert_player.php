<?php
	$con=mysqli_connect("localhost","root","","basket");
	// Check connection
	if (mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	$sql="INSERT INTO zawodniczki (nazwa, id_team)
	VALUES
	('$_POST[imie_nazwisko]','$_POST[team]')";

	if (!mysqli_query($con,$sql)){
		die('Error: ' . mysqli_error($con));
	}
	echo "1 record added";
	mysqli_close($con);
?>