		<form action="edit.php" method="post">
			<b>Edytuj zawodniczkę:</b><br/> <select name="player" id="myselect" onchange="this.form.submit()">
<?php
			$result = mysqli_query($con,'SELECT * FROM player');
			echo "<option>--</option>";

			while($row = mysqli_fetch_array($result)){
				echo "<option ";
				if(isset($_POST['case']) && $_POST['case']=="addplayer"){
					if(!strcmp($_POST['player'],$row['player_id'])){
						echo "selected ";
					}
				}
				echo "value=\"";
				echo $row['player_id'] . "\">" . $row['name'];
				echo "</option><br>\n";
			}
			echo "</select><br/>";
			
			if(isset($_POST['case']) && $_POST['case']=="addplayer"){
				include 'fep2.php';
			}
?>
			<input type="hidden" name="case" value="addplayer">
		</form>