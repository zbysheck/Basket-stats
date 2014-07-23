<?php
	require_once("functions.php");
	$active=get_option('BS_active');
	if(isset($_GET['season'])){
		$season=$_GET['season'];
	}else{
		$season=$active;
	}
	var_dump($_POST);
	if(isset($_POST['case']) && $_POST['case']=="addgames"){
		if($season){
			$con=connect();
			/*$sql="INSERT INTO game (team_id, season_id)
				VALUES
				(0,";
			$sql.=$season;*/
			$sql="INSERT INTO game (team_id, queue_id)
				VALUES
				(0,";
			$sql.=$_POST['queue'];/**/
			$sql.=")";
			var_dump($sql);
			for($i=0;$i<$_POST['games'];$i++){
				if (!mysqli_query($con,$sql)){
					die('Error: ' . mysqli_error($con));
					echo $sql;
				}echo "-";
			}
		}else{
			echo "Brak aktywnego sezonu!";
		}
	}
	if(isset($_POST['case']) && $_POST['case']=="addqueues"){
		if($season){
			$con=connect();
			$sql="INSERT INTO queue (season_id)
				VALUES
				(";
			$sql.=$season;
			$sql.=")";//var_dump($sql);
			for($i=0;$i<$_POST['queues'];$i++){
				if (!mysqli_query($con,$sql)){
					die('Error: ' . mysqli_error($con));
					echo $sql;
				}echo "0";}
		}else{
			echo "Brak aktywnego sezonu!";
		}
	}

	if(isset($_POST['case']) && $_POST['case']=="update"){
		$con=connect();
		$sql = "team_id ='$_POST[team]',
				season_id ='$season',
				game_date = '$_POST[match_date]' ";
		update_table("game", $_POST['id'],$sql,"meczu");
	}
	if(isset($_POST['add_team'])){
		//var_dump($_POST);
		$sql="INSERT INTO team (name)
			VALUES
			('$_POST[add_team]')";
		if (!mysqli_query($con,$sql)){
			die('Error: ' . mysqli_error($con));
		}
		echo "drużyna dodana";
	}


	if(isset($_GET['delete'])){
		//var_dump($_GET);
		remove("game", $_GET['delete'], "meczu");
	}
		
		echo '
		<form action="" method="post">
			<b>Dodaj mecze:</b><br> 
			<select name="games">';
				for($i=1;$i<=20;$i++){
					echo "<option value=\"$i\"";
					echo "> Dodaj ";
					echo $i;
					echo " mecz";
					if($i>1){
						if($i>4){
							echo "y";
						}else
							echo "e";
					}
					echo "</option>";
				}
			echo '</select>
			<input type="hidden" name="case" value="addgames">
			<input type="submit" value="Dodaj Mecze">
			<input type="submit" name="action" value="usun">
		</form>';?>
		<form action="" method="post">
			<b>Dodaj kolejki:</b><br> 
			<select name="queues">

			<?php
				for($i=1;$i<=20;$i++){
					echo "<option value=\"$i\"";
					echo "> Dodaj ";
					echo $i;
					echo " kolej";
					if($i>1){
						if($i>4){
							echo "ek";
						}else
						echo "ki";
					}else{
						echo "kę";
					}
					echo "</option>";
				}?>
			</select>
			<input type="hidden" name="case" value="addqueues">
			<input type="submit" value="Dodaj Kolejki">
		</form>
	<form action="" method="post">
	Nowa drużyna: <input type="text" name="add_team">
	<input type="submit"></form>
<?php
	$query='SELECT * FROM queue WHERE season_id='.$season;
	$esult = mysqli_query(connect(),$query);
	$queue=1;
	echo "<table border='1'><tr><th>Kolejka</th><th>Mecze</th><th>opcje</th></tr>";
	while($crow = mysqli_fetch_array($esult)){
		//var_dump($crow);

		echo "<tr><td>$queue</td><td>";
		echo "<table border='1'><tr><th>Drużyny</th><th>Data</th><th>opcje</th></tr>";
		$query='SELECT * FROM game WHERE season_id='.$season;
		$result = mysqli_query(connect(),$query);
		echo '
		<form action="" method="post">
			<b>Dodaj mecze:</b><br> 
			<select name="games">';
				for($i=1;$i<=20;$i++){
					echo "<option value=\"$i\"";
					echo "> Dodaj ";
					echo $i;
					echo " mecz";
					if($i>1){
						if($i>4){
							echo "y";
						}else
							echo "e";
					}
					echo "</option>";
				}
			//echo $crow;
			echo '</select>
			<input type="hidden" name="queue" value="';
			echo $crow['id'];
			echo '">
			<input type="hidden" name="case" value="addgames">
			<input type="submit" value="Dodaj Mecze">
			<input type="submit" name="action" value="usun">
		</form>';
		while($row = mysqli_fetch_array($result)){
			//var_dump($row);
			//echo "<a href=>".$row["team1_id"]." vs. ".$row["team2_id"]." (".$row["game_date"].")</a><br/>";
			echo "<tr>";
			echo '<form action="" method="post"><td>
					<input type="text" readonly name="BS_team_name" value="';
			echo get_option("BS_team_name");
			echo "\">vs.";
			echo '<select name="team">';
			echo "<option>--</option>";
			//var_dump($row);
			$con=connect();
			$res = mysqli_query($con,'SELECT * FROM team ORDER BY name');
			while($brow = mysqli_fetch_array($res)){
				$opt=trim(g_team1($_POST['game']));
				echo "<option ";
				if(!strcmp($brow['id'],$row['team_id'])){
					echo "selected ";
				}
				echo "value=\"";
				echo $brow['id'] . "\">" . team_name($brow['id']);
				echo "</option>\n";
			}
			echo "</select>";
			echo "</td><td>";
					echo '<input type="date" name="match_date" value="';
					echo $row['game_date'];
					echo '">';
			echo "</td><td><input type='submit' value='aktualizuj'/>";
			echo "<input type='hidden' name='case' value='update'>";
			echo "<input type='hidden' name='id' value='";
			echo $row['id'];
			echo "'>";
			echo "</form><a href=admin.php?page=basket/basket.php&tab=season&season=".$season."&delete=".$row["id"].">[usuń]</a>  <a href=admin.php?page=basket/basket.php&tab=game&edit=".$row["id"]."> (edycja szczegółowa)</a>
			</td></tr>";
		}
		echo "</table>";
		$queue++;
	}echo "</td></tr></table>";
	?><!--
			<form action="" method="post">
				Imię i Nazwisko: <input type="text" name="imie_nazwisko">
				<input type="hidden" name="case" value="chooseplayer">
				<input type="submit">
			</form>
		<?php
			$query='SELECT * FROM player';
			$result = mysqli_query(connect(),$query);
			while($row = mysqli_fetch_array($result)){
				//var_dump($row);
				echo "<a href=>".$row["name"]."</a><br/>";
			}
		?>