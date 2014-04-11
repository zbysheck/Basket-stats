<?php
	
			if(isset($_POST['sub']) && $_POST['sub']=="yes"){
				//echo "echo" . $_POST['team'] . $_POST['team_name'];
				$opt=trim($_POST['team']);
				$sql="UPDATE team
				SET name ='$_POST[team_name]'
				WHERE team_id = '$opt'
				";
				if (!mysqli_query($con,$sql)){
					die('Error: ' . mysqli_error($con));
				}
			}
?>
		<form action="edit.php" method="post">
			<b>Edytuj drużynę:</b><br> <select name="team" id="myselect" onchange="this.form.submit()">
<?php
			$result = mysqli_query($con,'SELECT * FROM team');
			echo "<option>--</option>";

			while($row = mysqli_fetch_array($result)){
				$opt=trim($_POST['team']);
				echo "<option ";
				if(isset($_POST['case']) && $_POST['case']=="addteam"){
					if(!strcmp($opt,$row['team_id'])){
						echo "selected ";
					}
				}
				echo "value=\"";
				echo $row['team_id'] . "\">" . $row['name'];
				echo "</option><br>\n";
			}
			echo "</select>";
?>
			<input type="hidden" name="case" value="addteam">
		</form>
<?php
			if(isset($_POST['case']) && $_POST['case']=="addteam"){
				include 'fet2.php';
			}
