			<form action="" method="post">
			Nazwa zawodniczki: <input type="text" name="player_name" value="
<?php
	echo pl_name($_POST['player']);
?>
">
			zmień drużynę: 
<?php
			$result = mysqli_query($con,'SELECT * FROM team');
			echo '<select name="team" id="myselect">';
			echo "<option>--</option>";

			while($row = mysqli_fetch_array($result)){
				$opt=trim(pl_team($_POST['player']));
				echo "<option ";
				if(!strcmp($opt,$row['id'])){
						echo "selected ";
				}
				echo "value=\"";
				echo $row['id'] . "\">" . $row['name'];
				echo "</option><br>\n";
			}
			echo "</select>";
?>
			<input type="hidden" name="player" value="<?php
	echo $_POST['player'];
?>
">
			<?php buttons("addplayer");?>
			</form>