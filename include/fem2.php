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