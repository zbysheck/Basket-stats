<?php
	include 'functions.php';
	include 'player.php';
	include 'choose.php';
	include 'include/header.php';

	$con=connect();
	// Check connection
	if (mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	if(isset($_POST['choose'])){
		if($_POST['choose']=="player"){
			$pl=$_POST['player'];
			all($pl);
			avg($pl);
			sum($pl);
			allavg();
			allsum();
		}
		elseif($_POST['choose']=="team"){
			
		}
		//mysqli_close($con);
	}
?>

<html>
	<head>
		<title> kosz</title>
		<link rel="stylesheet" type="text/css" href="css/style.css" />
		<meta charset="utf-8"/>
	</head>
	<body>
	<br/>
	<b>Wybierz zawodniczkę</b>
<?php
			choose::playerr();
			choose::team();
?>


	</body>
</html>