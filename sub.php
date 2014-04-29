<?php
	$con=mysqli_connect("localhost","root","","basket2");
	require_once("functions.php");
	// Check connection
	if (mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	if(isset($_POST['case'])){
		if($_POST['case']=="chooseteam"){
			$sql="INSERT INTO team (name)
			VALUES
			('$_POST[team_name]')";
		}
		elseif($_POST['case']=="chooseplayer"){
			$sql="INSERT INTO player (name, team_id)
			VALUES
			('$_POST[imie_nazwisko]','$_POST[team]')";
		}
		elseif($_POST['case']=="choosegame"){
			$sql="INSERT INTO game (team1_id, team2_id, game_date)
			VALUES
			('$_POST[id_team1]','$_POST[id_team2]','$_POST[match_date]')";
		}
		elseif($_POST['case']=="choosestat"){
			$sql="INSERT INTO stat (game_id, player_id, minutes, fg3, fga3, fg2, fga2, fg1, fga1, orb, drb, assists, fauls, turnovers, steals, blocks)
			VALUES
			('$_POST[game_id]','$_POST[player_id]','$_POST[minuty]','$_POST[celne3]','$_POST[wykonane3]','$_POST[celne2]','$_POST[wykonane2]','$_POST[celne1]','$_POST[wykonane1]','$_POST[zbiorki_atak]','$_POST[zbiorki_obrona]','$_POST[asysty]','$_POST[faule]','$_POST[straty]','$_POST[przechwyty]','$_POST[bloki]')";
		//NAPRAWIAMY
		}
		var_dump($_POST['case']);
		if (!mysqli_query($con,$sql)){
			die('Error: ' . mysqli_error($con));
		}
		echo "1 record added";
		//mysqli_close($con);
	}
?>

<html>
	<head>
		<title>dodaj</title>
		<link rel="stylesheet" type="text/css" href="css/style2.css" />
		<meta charset="utf-8"/>
	</head>
	<body>
	<?php //bom("lala");?>
	<br/>
		<b>Dodaj drużynę</b>
		<form action="" method="post">
			Nazwa drużyny: <input type="text" name="team_name">
			<input type="hidden" name="case" value="chooseteam">
			<input type="submit">
		</form>

		<b>Dodaj zawodniczkę</b>
		<form action="" method="post">
			Imię i Nazwisko: <input type="text" name="imie_nazwisko">
			Drużyna: <select name="team" id="myselect">
<?php
			$result = mysqli_query($con,'SELECT * FROM team');

			while($row = mysqli_fetch_array($result)){
				echo "<option value=\"";
				echo $row['id'] . "\">" . $row['name'];
				echo "</option><br>";
			}
			
			//dropDown("team", "team_id", "name");
?>

					</select>
			<input type="hidden" name="case" value="chooseplayer">
			<input type="submit">
		</form>

		<b>Dodaj mecz</b>
		<form action="" method="post">
			Drużyna: <select name="id_team1" id="myselect">
<?php
			$result = mysqli_query($con,'SELECT * FROM team');

			while($row = mysqli_fetch_array($result)){
				echo "<option value=\"";
				echo $row['id'] . "\">" . $row['name'];
				echo "</option><br>";
			}
			
			//dropDown("team", "team_id", "name");
?>

					</select>
			Drużyna: <select name="id_team2" id="myselect">
<?php
			$result = mysqli_query($con,'SELECT * FROM team');

			while($row = mysqli_fetch_array($result)){
				echo "<option value=\"";
				echo $row['id'] . "\">" . $row['name'];
				echo "</option><br>";
			}
?>

					</select>
			Data: <input type="date" name="match_date">
			<input type="hidden" name="case" value="choosegame">
			<input type="submit">
		</form>

		<b>Dodaj statystyki</b>
		<form action="" method="post">
			mecz: <select name="id" id="myselect">
<?php
			$result = mysqli_query($con,'SELECT `d1`.name AS n1, `d2`.name AS n2, `game`.game_date AS d, `game`.id AS id FROM `game` INNER JOIN `team` AS d1 on `d1`.id=`game`.team1_id INNER JOIN `team` AS d2 on `d2`.id=`game`.team2_id');

			while($row = mysqli_fetch_array($result)){
				echo "<option value=\"" . $row['id'] . "\">" . $row['id'] . $row['n1'] . " vs. " . $row['n2'] . " (" . $row['d'] . ")" . "</option><br>";
			}
?>
			</select>
			Zawodniczka: <select name="player_id" id="myselect">
<?php
			$result = mysqli_query($con,'SELECT `p`.name AS n, `t`.name AS n2, `p`.id as id FROM `player` as p INNER JOIN `team` as t ON `t`.id=`p`.team_id');

			while($row = mysqli_fetch_array($result)){
				echo "<option value=\"";
				echo $row['id'] . "\">" . $row['n'] . " (" . $row['n2'] . ")";
				echo "</option><br>";
			}
?>
			</select>
			<br/><?php
			//$labels=array("minuty","celne3","wykonane3","celne2","wykonane2","celne1","wykonane1","zbiorki_atak","zbiorki_obrona","asysty","faule","straty","przechwyty","bloki");
			$labels=array("minutes", "fg3", "fga3", "fg2", "fga2", "fg1", "fga1", "orb", "drb", "assists", "fauls", "turnovers", "steals", "blocks");
			
			numberTable($labels);
			?>
			<input type="hidden" name="case" value="choosestat">
			<input type="submit">
		</form>

	</body>
</html>