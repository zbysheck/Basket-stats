<?php
	$con=mysqli_connect("localhost","root","","basket");
	// Check connection
	if (mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	$sql="INSERT INTO statystyki (mecze_id, zawodniczki_id, minuty, celne3, wykonane3, celne2, wykonane2, celne1, wykonane1, zbiorki_atak, zbiorki_obrona, asysty, faule, straty, przechwyty, bloki)
	VALUES
	('$_POST[mecze_id]','$_POST[zawodniczki_id]','$_POST[minuty]','$_POST[celne3]','$_POST[wykonane3]','$_POST[celne2]','$_POST[wykonane2]','$_POST[celne1]','$_POST[wykonane1]','$_POST[zbiorki_atak]','$_POST[zbiorki_obrona]','$_POST[asysty]','$_POST[faule]','$_POST[straty]','$_POST[przechwyty]','$_POST[bloki]')";

	if (!mysqli_query($con,$sql)){
		die('Error: ' . mysqli_error($con));
	}
	echo "1 record added";
	mysqli_close($con);
?>