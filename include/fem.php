		<form action="edit.php" method="post">
			<b>Edytuj mecz:</b><br/> <select name="game" id="myselect" onchange="this.form.submit()">
<?php
			$result = mysqli_query($con,'SELECT `d1`.name AS n1, `d2`.name AS n2, `game`.game_date AS d, `game`.game_id AS game_id FROM `game` INNER JOIN `team` AS d1 on `d1`.team_id=`game`.team1_id INNER JOIN `team` AS d2 on `d2`.team_id=`game`.team2_id');
			echo "<option>--</option>";

			while($row = mysqli_fetch_array($result)){
				echo "<option ";
				if(isset($_POST['case']) && $_POST['case']=="addgame"){
					if(!strcmp($_POST['game'],$row['game_id'])){
						echo "selected ";
					}
				}
				echo "value=\"";
				echo $row['game_id'] . "\">" . $row['n1'] . " vs. " . $row['n2'] . " (" . $row['d'] . ")";
				echo "</option><br>\n";
			}
			echo "</select><br/>";
			
			if(isset($_POST['case']) && $_POST['case']=="addgame"){
				include 'fem2.php';
			}
?>
			<input type="hidden" name="case" value="addgame">
		</form>