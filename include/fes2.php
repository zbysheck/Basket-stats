		<form action="" method="post">
			<select name="player" id="myselect" onchange="this.form.submit()">
<?php
			$result = mysqli_query($con,'SELECT * FROM stat WHERE game_id = "'.$_POST['game'].'"');
			//echo 'SELECT * FROM stats WHERE game_id = "'.$_POST['game'].'"';
			echo "<option>--</option>";
			while($row = mysqli_fetch_array($result)){
				echo "<option ";
				if(!strcmp($_POST['player'],$row['id'])){
					echo "selected ";
				}
				echo "value=\"";
				echo $row['id'] . "\">" . pl_name($row['player_id']) . " - ";
				echo game_label($row['game_id']);
				echo "</option><br>\n";
			}
			echo "</select><br/>";
?>
			<input type="hidden" name="game" value="<?php echo $_POST['game'];?>">
			<input type="hidden" name="case" value="addstat">
		</form>