		<form action="edit.php" method="post">
			edytuj drużynę: <select name="team" id="myselect" onchange="this.form.submit()">
<?php
			$result = mysqli_query($con,'SELECT * FROM team');
			echo "<option>--</option>";

			while($row = mysqli_fetch_array($result)){
				echo "<option ";
				if(isset($_POST['case']) && $_POST['case']=="addteam"){
					if(!strcmp($_POST['team'],$row['team_id'])){
						echo "selected ";
					}
				}
				echo "value=\"";
				echo $row['team_id'] . "\">" . $row['name'];
				echo "</option><br>\n";
			}
			echo "</select><br/>";
			
			if(isset($_POST['case']) && $_POST['case']=="addteam"){
				include 'fet2.php';
			}
?>
			<input type="hidden" name="case" value="addteam">
		</form>