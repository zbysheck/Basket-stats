<?php
	
			if(isset($_POST['sub']) && $_POST['sub']=="yes" && isset($_POST['case']) && $_POST['case']=="addplayer"){
				//echo "echo" . $_POST['team'] . $_POST['team_name'];
				$opt=trim($_POST['player']);
				$sql="UPDATE player SET 
				name ='$_POST[player_name]',
				team_id = '$_POST[team]'
				WHERE id = '$opt'
				";
				if (!mysqli_query($con,$sql)){
					die('Error: ' . mysqli_error($con));
				}else{
					say("edycja zawodnika zakończona sukcesem");
				}
			}
?>

		<form action="" method="post">
			<b>Edytuj zawodniczkę:</b><br/> <select name="player" id="myselect" onchange="this.form.submit()">
<?php
			$result = mysqli_query($con,'SELECT * FROM player');
			echo "<option>--</option>";
			while($row = mysqli_fetch_array($result)){
				echo "<option ";
				if(isset($_POST['case']) && $_POST['case']=="addplayer"){
					if(!strcmp($_POST['player'],$row['id'])){
						echo "selected ";
					}
				}
				echo "value=\"";
				echo $row['id'] . "\">" . $row['name'];
				echo "</option><br>\n";
			}
			echo "</select><br/>";

?>
			<input type="hidden" name="case" value="addplayer">
		</form>			
<?php
			if(isset($_POST['case']) && $_POST['case']=="addplayer"){
				include 'fep2.php';
			}