<?php
	if(isset($_POST['case'])){
		echo $_POST['case'];
	}else echo "nie";
	


	$con=mysqli_connect("localhost","root","","basket");
	// Check connection
	if (mysqli_connect_errno()){
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	$sql="INSERT INTO druzyny (nazwa)
	VALUES
	('$_POST[team_name]')";

	if (!mysqli_query($con,$sql)){
		die('Error: ' . mysqli_error($con));
	}
	echo "1 record added";
	mysqli_close($con);
?>