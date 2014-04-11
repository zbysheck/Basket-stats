			Nazwa zawodniczki: <input type="text" name="player_name">
			zmień drużynę: 
			<?php
			$result = mysqli_query($con,'SELECT * FROM team');
			echo "<option>--</option>";

			while($row = mysqli_fetch_array($result)){
				$opt=trim($_POST['team']);
				echo "<option ";
				if(isset($_POST['case']) && $_POST['case']=="addteam"){
					if(!strcmp($opt,$row['team_id'])){
						echo "selected ";
					}
				}
				echo "value=\"";
				echo $row['team_id'] . "\">" . $row['name'];
				echo "</option><br>\n";
			}
			echo "</select>";
?>
			<br/><input type="submit">