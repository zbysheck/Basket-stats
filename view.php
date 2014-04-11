<?php
	include 'functions.php';
	include 'player.php';
	include 'include/header.php';

	$con=connect();
	// Check connection
	if (mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	if(isset($_POST['case'])){
		if($_POST['case']=="player"){
			$pl=$_POST['player'];
			player::all($pl);
			player::avg($pl);
			player::sum($pl);
			player::allavg();
			player::allsum();
		}
		elseif($_POST['case']=="team"){
			
		}
		//mysqli_close($con);
	}
?>

<html>
	<head>
		<title> kosz</title>
		<link rel="stylesheet" type="text/css" href="style.css" />
		<meta charset="utf-8"/>
	</head>
	<body>
	<br/>
		<b>Pokaż zawodniczkę</b>
		<form action="view.php" method="post">
			<br/> <select name="player" id="myselect" onchange="this.form.submit()">
<?php
			$result = mysqli_query($con,'SELECT * FROM player');
			echo "<option>--</option>";
			while($row = mysqli_fetch_array($result)){
				echo "<option value=\"";
				echo $row['player_id'] . "\">" . $row['name'];
				echo "</option><br>";
			}
?>
			<input type="hidden" name="case" value="player">
					</select>
			<input type="submit">
		</form>


	</body>
</html>