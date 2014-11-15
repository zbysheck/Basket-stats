<?php
	require_once("functions.php");
	$game = $_GET["edit"] ?: 1;

	if(isset($_POST['addplayer'])){
		//var_dump($_POST);
			$sql="INSERT INTO player (name, number)
			VALUES
			('$_POST[addplayer]', '$_POST[numer]')";
		if (!mysqli_query($con,$sql)){
			die('Error: ' . mysqli_error($con));
		}
		echo "zawodniczka dodana";
	}

	if(isset($_POST['addstat'])){
		//var_dump($_POST);
			$sql="INSERT INTO stat (player_id, game_id)
			VALUES
			('$_POST[addstat]','$game')";
		if (!mysqli_query($con,$sql)){
			die('Error: ' . mysqli_error($con));
		}
		echo "zawodniczka dodana";
	}

	if(isset($_POST['stat_id'])){
		//var_dump($_POST);
		$labels=array("minutes", "fg3", "fga3", "fg2", "fga2", "fg1", "fga1", "orb", "drb", "assists", "fauls", "turnovers", "steals", "blocks");
	
		$sql = "";
			foreach ($labels as $i){
				$sql .= $i . " = " . $_POST[$i] . ", ";
			}
			$sql=rtrim($sql, " ,") . ' ';
			update_table("stat", $_POST['stat_id'], $sql, "statystyki");
	}

	if(isset($_GET['delete'])){
		//var_dump($_GET);
		remove("stat", $_GET['delete'], "statystyki");
	}

	//var_dump($_POST);
?>
	<form action="" method="post">
	Nowa zawodniczka: <input type="text" name="addplayer"> nr <input type="number" name="numer">
	<input type="submit"></form>

			<form action="" method="post">
			<b>Dodaj mecze:</b><br> 
			<select name="addstat">
			<?php
				$query='SELECT * FROM player';
				$result = mysqli_query(connect(),$query);
				while($row = mysqli_fetch_array($result)){
					echo "<option value=";
					echo $row['id'];
					echo ">";
					echo $row['name'];
					echo "</option>";
				}?>
			</select>
			<input type="submit" value="Dodaj zawodniczke do meczu">
		</form>
<?php
	$query='SELECT *, stat.id AS stat_id FROM stat INNER JOIN player ON stat.player_id=player.id WHERE game_id=';
	$query.=$game;
	$result = mysqli_query(connect(),$query);
	$labels=array("minutes", "fg3", "fga3", "fg2", "fga2", "fg1", "fga1", "orb", "drb", "assists", "fauls", "turnovers", "steals", "blocks");
	echo "<table border='1'><tr><th>Zawodniczka</th>";
	foreach ($labels as $i) {
		echo "<th>$i</th>";
	}
	echo "<th>opcje</th></tr>";

	while($row = mysqli_fetch_array($result)){
		//var_dump($row);
		//echo "<a href=>".$row["team1_id"]." vs. ".$row["team2_id"]." (".$row["game_date"].")</a><br/>";
		echo "<tr>";
		echo '<form action="" method="post"><td>
				<input type="text" readonly name="name" value="';
		echo $row['name'];
		echo "\">";
		echo "<input type=\"hidden\" name=\"player_id\" value=\"";
		echo $row['player_id'];
		echo "\">";
		echo "<input type=\"hidden\" name=\"stat_id\" value=\"";
		echo $row['stat_id'];
		echo "\">";

		foreach ($labels as $i) {
		echo "</td><td style=\"width: 20px\">";
				echo "<input type=\"number\" name=".$i." style=\"width: 45px\" value=\"";
				echo $row[$i];
				echo '">';
		echo "</td>";
		}
		echo "<td><input type='submit' value='aktualizuj'/>";
		echo "<input type='hidden' name='case' value='update'>";
		echo "<input type='hidden' name='id' value='";
		echo $row['id'];
		echo "'>";//admin.php?page=basket/basket.php&tab=game
		echo "</form><a href=admin.php?page=basket/basket.php&tab=game&season=".$season."&delete=".$row["stat_id"].">[usuń]</a>
		</td></tr>";
	}
	echo "</table>";
	?>