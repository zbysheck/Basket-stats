			<form action="" method="post">
			Drużyna 1: 
<?php
			$result = mysqli_query($con,'SELECT * FROM team');
			echo '<select name="team1" id="myselect">';
			echo "<option>--</option>";

			while($row = mysqli_fetch_array($result)){
				$opt=trim(g_team1($_POST['game']));
				echo "<option ";
				if(!strcmp($opt,$row['id'])){
					echo "selected ";
				}
				echo "value=\"";
				echo $row['id'] . "\">" . team_name($row['id']);
				echo "</option><br>\n";
			}
			echo "</select>";
?>
			<input type="hidden" name="game" value="<?php
	echo $_POST['game'];
?>
">
			Drużyna 2: 
<?php
			$result = mysqli_query($con,'SELECT * FROM team');
			echo '<select name="team2" id="myselect">';
			echo "<option>--</option>";

			while($row = mysqli_fetch_array($result)){
				$opt=trim(g_team2($_POST['game']));
				echo "<option ";
				if(!strcmp($opt,$row['id'])){
					echo "selected ";
				}
				echo "value=\"";
				echo $row['id'] . "\">" . team_name($row['id']);
				echo "</option><br>\n";
			}
			echo "</select>";
?>
			<input type="hidden" name="game" value="<?php
	echo $_POST['game'];
?>
">
			Data: <input type="date" name="match_date" value="<?php
	echo game_date($_POST['game']);
?>">

			<input type="hidden" name="case" value="addgame">
			<input type="submit" name="action" value="update" style="display:none">
			<input type="submit" value="[delete]" style="border: none; background: none;" name="action" value="delete">
			<br/><input type="submit" name="action" value="update">
			</form>