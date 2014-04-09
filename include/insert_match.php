<?php
	$con=mysqli_connect("localhost","root","","basket2");
	// Check connection
	if (mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	$sql="INSERT INTO game (team1_id, team2_id, game_date)
	VALUES
	('$_POST[id_team1]','$_POST[id_team2]','$_POST[match_date]')";

	if (!mysqli_query($con,$sql)){
		die('Error: ' . mysqli_error($con));
	}
	echo "1 record added";
	mysqli_close($con);
?>