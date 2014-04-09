<?php
	$con=mysqli_connect("localhost","root","","basket2");
	// Check connection
	if (mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	$sql="INSERT INTO stat (game_id, player_id, minutes, fg3, fga3, fg2, fga2, fg1, fga1, orb, drb, assists, fauls, turnovers, steals, blocks)
	VALUES
	('$_POST[game_id]','$_POST[player_id]','$_POST[minuty]','$_POST[celne3]','$_POST[wykonane3]','$_POST[celne2]','$_POST[wykonane2]','$_POST[celne1]','$_POST[wykonane1]','$_POST[zbiorki_atak]','$_POST[zbiorki_obrona]','$_POST[asysty]','$_POST[faule]','$_POST[straty]','$_POST[przechwyty]','$_POST[bloki]')";

	if (!mysqli_query($con,$sql)){
		die('Error: ' . mysqli_error($con));
	}
	echo "1 record added";
	mysqli_close($con);
//game_id, player_id, minutes, fg3, fga3, fg2, fga2, fg1, fga1, orb, drb, assists, fauls, turnovers, steals, blocks
?>




