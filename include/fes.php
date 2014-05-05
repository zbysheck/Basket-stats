<?php
			if(isset($_POST['action']) && $_POST['action']=="delete" && isset($_POST['case']) && $_POST['case']=="choosestat"){
				delete_stat($_POST['stat']);
			}
?>
		<form action="" method="post">
			<b>Edytuj statystyki:</b><br> <select name="game" onchange="this.form.submit()">
<?php
			$result = mysqli_query($con,'SELECT * FROM game');
			echo "<option>--</option>";

			while($row = mysqli_fetch_array($result)){
				echo "<option ";
				if(isset($_POST['case']) && $_POST['case']=="stat"){
					if(!strcmp(trim($_POST['game']),$row['id'])){
						echo "selected ";
					}
				}
				echo "value=\"";
				echo $row['id'] . "\">";
				echo game_label($row['id']);
				echo "</option>\n";
			}
			echo "</select>";
?>
			<input type="hidden" name="case" value="stat">
		</form>
<?php
			if(isset($_POST['case']) && $_POST['case']=="stat"){
				//include 'fes2.php';
				echo '<form action="" method="post">
					<select name="player" onchange="this.form.submit()">';

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
					echo "</option>\n";
				}
				echo "</select><br/>";

				echo '<input type="hidden" name="game" value="'; 
				echo $_POST['game'];
				echo'">
					<input type="hidden" name="case" value="stat">
				</form>';
				
				if(isset($_POST['case']) && $_POST['case']=="stat" && isset($_POST['player'])){
						include 'fes3.php';
				}
			}