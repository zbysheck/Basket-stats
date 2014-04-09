<?php
	$con=mysqli_connect("localhost","root","","basket");
	// Check connection
	if (mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

if(isset($_POST['case'])){
		
	$sql="INSERT INTO druzyny (nazwa)
	VALUES
	('$_POST[team_name]')";

	if (!mysqli_query($con,$sql)){
		die('Error: ' . mysqli_error($con));
	}
	echo "1 record added";
	//mysqli_close($con);
}


//
	function dropDown($table, $option, $text){
		$result = mysqli_query($con,'SELECT * FROM table');
		while($row = mysqli_fetch_array($result)){
			echo "<option value=\"";
			echo $row['option'] . "\">" . $row['text'];
			echo "</option><br>";
		}
	}

	//dropDown("druzyny", "druzyny_id", "nazwa");//*/
?>

<html>
	<head>
		<meta charset="utf-8">
	</head>
	<body>
	<?php //bom("lala");?>
	<br/>
		<b>Dodaj drużynę</b>
		<form action="sub.php" method="post">
			Nazwa drużyny: <input type="text" name="team_name">
			<input type="hidden" name="case" value="team">
			<input type="submit">
		</form>

		<b>Dodaj zawodniczkę</b>
		<form action="include/insert_player.php" method="post">
			Zawodniczka: <input type="text" name="imie_nazwisko">
			Drużyna: <select name="team" id="myselect">
<?php
			$result = mysqli_query($con,'SELECT * FROM druzyny');

			while($row = mysqli_fetch_array($result)){
				echo "<option value=\"";
				echo $row['druzyny_id'] . "\">" . $row['nazwa'];
				echo "</option><br>";
			}
			
			//dropDown("druzyny", "druzyny_id", "nazwa");
?>

					</select>
			<input type="submit">
		</form>

		<b>Dodaj mecz</b>
		<form action="include/insert_match.php" method="post">
			Drużyna1: <input type="text" name="id_team1">
			Drużyna2: <input type="text" name="id_team2">
			Data: <input type="date" name="match_date">
			<input type="submit">
		</form>

		<b>Dodaj statystyki</b>
		<form action="include/insert_stat.php" method="post">
			mecza: <select name="mecze_id" id="myselect">
<?php
			$result = mysqli_query($con,'SELECT * FROM mecze');

			while($row = mysqli_fetch_array($result)){
				echo "<option value=\"";

				$v=$row['id_team1'] . " vs. " . $row['id_team2'];
				echo $row['mecze_id'] . "\">" . $v . " (" . $row['data_meczu'] . ")";
				echo "</option><br>";
			}
?></select>
			zawodniczki_id: <input type="number" name="zawodniczki_id">
			minuty: <input type="number" name="minuty">
			celne3: <input type="number" name="celne3">
			wykonane3: <input type="number" name="wykonane3">
			celne2: <input type="number" name="celne2">
			wykonane2: <input type="number" name="wykonane2">
			celne1: <input type="number" name="celne1">
			wykonane1: <input type="number" name="wykonane1">
			zbiorki_atak: <input type="number" name="zbiorki_atak">
			zbiorki_obrona: <input type="number" name="zbiorki_obrona">
			asysty: <input type="number" name="asysty">
			faule: <input type="number" name="faule">
			straty: <input type="number" name="straty">
			przechwyty: <input type="number" name="przechwyty">
			bloki: <input type="number" name="bloki">
			<input type="submit">
		</form>

	</body>
</html>