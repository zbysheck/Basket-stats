<?php
	$con=mysqli_connect("localhost","root","","basket");
	// Check connection
	if (mysqli_connect_errno()){
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	$sql="INSERT INTO mecze (id_team1, id_team2, data_meczu)
	VALUES
	('$_POST[id_team1]','$_POST[id_team2]','$_POST[match_date]')";

	if (!mysqli_query($con,$sql)){
	  die('Error: ' . mysqli_error($con));
	}
	echo "1 record added";
	mysqli_close($con);
?>