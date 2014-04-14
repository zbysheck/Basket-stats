<?php
	class choose{
		static public function player(){
			$con=connect();
			echo '<form action="" method="post">
			<br/> <select name="player" id="myselect" onchange="this.form.submit()">';
			$result = mysqli_query($con,'SELECT * FROM player');
			echo "<option>--</option>";
			while($row = mysqli_fetch_array($result)){
				echo "<option ";
				if(isset($_POST['choose']) && $_POST['choose']=="player"){
					if(!strcmp($_POST['player'],$row['id'])){
						echo "selected ";
					}
				}
				echo "value=\"";
				echo $row['id'] . "\">" . $row['name'];
				echo "</option><br>";
			}
			echo '</select>
			<input type="hidden" name="choose" value="player">
		</form>';
		}

		static public function team(){
			$con=connect();
			echo '<form action="" method="post">
			<br/> <select name="team" id="myselect" onchange="this.form.submit()">';
			$result = mysqli_query($con,'SELECT * FROM team');
			echo "<option>--</option>";
			while($row = mysqli_fetch_array($result)){
				echo "<option ";
				if(isset($_POST['choose']) && $_POST['choose']=="team"){
					if(!strcmp($_POST['team'],$row['id'])){
						echo "selected ";
					}
				}
				echo "value=\"";
				echo $row['id'] . "\">" . $row['name'];
				echo "</option><br>";
			}
			echo '</select>
			<input type="hidden" name="choose" value="team">
		</form>';
		}



















	}
