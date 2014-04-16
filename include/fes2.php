<?php		
		echo '<form action="" method="post">
			<select name="player" id="myselect" onchange="this.form.submit()">';

		$result = mysqli_query($con,'SELECT * FROM stat WHERE game_id = "'.$_POST['game'].'"');
		echo "<option>--</option>";
		while($row = mysqli_fetch_array($result)){
			echo "<option ";
			if(isset($_POST['player'])){
			if(!strcmp($_POST['player'],$row['id'])){
				echo "selected ";
			}}
			echo "value=\"";
			echo $row['id'] . "\">" . pl_name($row['player_id']) . " - ";
			echo game_label($row['game_id']);
			echo "</option><br>\n";
		}
		echo "</select><br/>";

		echo '<input type="hidden" name="game" value="'; 
		echo $_POST['game'];
		echo'">
			<input type="hidden" name="case" value="choosestat">
		</form>';
		
		if(isset($_POST['case']) && $_POST['case']=="choosestat" && isset($_POST['player'])){
				include 'fes3.php';
		}