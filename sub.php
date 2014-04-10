<?php
	$con=mysqli_connect("localhost","root","","basket2");
	include "functions.php";
	// Check connection
	if (mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	if(isset($_POST['case'])){
		if($_POST['case']=="add_team"){
			$sql="INSERT INTO team (name)
			VALUES
			('$_POST[team_name]')";
		}
		elseif($_POST['case']=="add_player"){
			$sql="INSERT INTO player (name, team_id)
			VALUES
			('$_POST[imie_nazwisko]','$_POST[team]')";
		}
		elseif($_POST['case']=="add_game"){
			$sql="INSERT INTO game (team1_id, team2_id, game_date)
			VALUES
			('$_POST[id_team1]','$_POST[id_team2]','$_POST[match_date]')";
		}
		elseif($_POST['case']=="add_stat"){
			$sql="INSERT INTO stat (game_id, player_id, minutes, fg3, fga3, fg2, fga2, fg1, fga1, orb, drb, assists, fauls, turnovers, steals, blocks)
			VALUES
			('$_POST[game_id]','$_POST[player_id]','$_POST[minuty]','$_POST[celne3]','$_POST[wykonane3]','$_POST[celne2]','$_POST[wykonane2]','$_POST[celne1]','$_POST[wykonane1]','$_POST[zbiorki_atak]','$_POST[zbiorki_obrona]','$_POST[asysty]','$_POST[faule]','$_POST[straty]','$_POST[przechwyty]','$_POST[bloki]')";
		}
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
		<link rel="stylesheet" type="text/css" href="style2.css" />
		<meta charset="utf-8"/>
	</head>
	<body>
	<?php //bom("lala");?>
	<br/>
		<b>Dodaj drużynę</b>
		<form action="sub.php" method="post">
			Nazwa drużyny: <input type="text" name="team_name">
			<input type="hidden" name="case" value="add_team">
			<input type="submit">
		</form>

		<b>Dodaj zawodniczkę</b>
		<form action="sub.php" method="post">
			Imię i Nazwisko: <input type="text" name="imie_nazwisko">
			Drużyna: <select name="team" id="myselect">
<?php
			$result = mysqli_query($con,'SELECT * FROM team');

			while($row = mysqli_fetch_array($result)){
				echo "<option value=\"";
				echo $row['team_id'] . "\">" . $row['name'];
				echo "</option><br>";
			}
			
			dropDown("team", "team_id", "name");
?>

					</select>
			<input type="hidden" name="case" value="add_player">
			<input type="submit">
		</form>

		<b>Dodaj mecz</b>
		<form action="sub.php" method="post">
			Drużyna: <select name="id_team1" id="myselect">
<?php
			$result = mysqli_query($con,'SELECT * FROM team');

			while($row = mysqli_fetch_array($result)){
				echo "<option value=\"";
				echo $row['team_id'] . "\">" . $row['name'];
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
				echo $row['team_id'] . "\">" . $row['name'];
				echo "</option><br>";
			}
?>

					</select>
			Data: <input type="date" name="match_date">
			<input type="hidden" name="case" value="add_game">
			<input type="submit">
		</form>

		<b>Dodaj statystyki</b>
		<form action="sub.php" method="post">
			mecz: <select name="game_id" id="myselect">
<?php
			$result = mysqli_query($con,'SELECT `d1`.name AS n1, `d2`.name AS n2, `game`.game_date AS d, `game`.game_id AS id FROM `game` INNER JOIN `team` AS d1 on `d1`.team_id=`game`.team1_id INNER JOIN `team` AS d2 on `d2`.team_id=`game`.team2_id');

			while($row = mysqli_fetch_array($result)){
				echo "<option value=\"" . $row['id'] . "\">" . $row['n1'] . " vs. " . $row['n2'] . " (" . $row['d'] . ")" . "</option><br>";
			}
?>
			</select>
			Zawodniczka: <select name="player_id" id="myselect">
<?php
			$result = mysqli_query($con,'SELECT `z`.name AS n, `d`.name AS n2, `z`.player_id as id FROM `player` as z INNER JOIN `team` as d ON `d`.team_id=`z`.team_id');

			while($row = mysqli_fetch_array($result)){
				echo "<option value=\"";
				echo $row['id'] . "\">" . $row['n'] . " (" . $row['n2'] . ")";
				echo "</option><br>";
			}
?>
			</select>
			<br/><?php
			$labels=array("minuty","celne3","wykonane3","celne2","wykonane2","celne1","wykonane1","zbiorki_atak","zbiorki_obrona","asysty","faule","straty","przechwyty","bloki");
			numberTable($labels);
			?>
			<input type="hidden" name="case" value="add_stat">
			<input type="submit">
		</form>

	</body>
</html>