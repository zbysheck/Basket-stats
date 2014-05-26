<?php
	require_once("functions.php");
	if(isset($_POST['case']) && $_POST['case']=="addgames"){
			$sql="INSERT INTO game ()
			VALUES
			()";
		for($i=0;$i<$_POST['games'];$i++)
		if (!mysqli_query($con,$sql)){
			die('Error: ' . mysqli_error($con));
		}
	}
		?>
		<form action="" method="post">
			<b>Dodaj mecze:</b><br> 
			<select name="games" onchange="this.form.submit()">

			<?php
				for($i=1;$i<=20;$i++){
					echo "<option value=\"$i\"";
					if($i==date("Y")){
						echo " selected";
					}
					echo "> Dodaj ";
					echo $i;
					echo " meczy</option>";
				}?>
			</select>
			<input type="hidden" name="case" value="addgames">
		</form>
<?php
	$query='SELECT * FROM game';
	$result = mysqli_query(connect(),$query);
	while($row = mysqli_fetch_array($result)){
		//var_dump($row);
		echo "<a href=>".$row["team1_id"]." vs. ".$row["team2_id"]." (".$row["game_date"].")</a><br/>";
	}
	?>
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