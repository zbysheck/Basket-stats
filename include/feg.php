		<form action="" method="post">
			<b>Edytuj mecz:</b><br/> <select name="game" id="myselect" onchange="this.form.submit()">
<?php
			$result = mysqli_query($con,'SELECT * FROM game');
			echo "<option>--</option>";
			while($row = mysqli_fetch_array($result)){
				echo "<option ";
				if(isset($_POST['case']) && $_POST['case']=="game"){
					if(!strcmp($_POST['game'],$row['id'])){
						echo "selected ";
					}
				}
				echo "value=\"";
				echo $row['id'] . "\">";
				echo game_label($row['id']);
				echo "</option><br>\n";
			}
			echo "</select><br/>";

?>
			<input type="hidden" name="case" value="game">
		</form>			
<?php
			if(isset($_POST['case']) && $_POST['case']=="game"){
				//include 'feg2.php';
				echo '<form action="" method="post">
						Drużyna 1: ';
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
				echo '<input type="hidden" name="game" value="';
				echo $_POST['game'];
				echo '">
				Drużyna 2:'; 

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

				echo '<input type="hidden" name="game" value="';
				echo $_POST['game'];
				echo '">;
				Data: <input type="date" name="match_date" value="';
				echo game_date($_POST['game']);
				echo '">';

				buttons("game");
				echo '</form>';
			}