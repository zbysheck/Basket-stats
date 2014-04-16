<?php
	
			if(isset($_POST['action']) && $_POST['action']=="update" && isset($_POST['case']) && $_POST['case']=="chooseteam"){
				//echo "echo" . $_POST['team'] . $_POST['team_name'];
				$opt=trim($_POST['team']);
				$sql="UPDATE team
				SET name ='$_POST[team_name]'
				WHERE id = '$opt'
				";
				if (!mysqli_query($con,$sql)){
					die('Error: ' . mysqli_error($con));
				}else{
					say("edycja drużyny zakończona sukcesem");
				}
			}

			if(isset($_POST['action']) && $_POST['action']=="delete" && isset($_POST['case']) && $_POST['case']=="chooseteam"){
				delete_team($_POST['team']);
			}

?>
		<form action="" method="post">
			<b>Edytuj drużynę:</b><br> <select name="team" id="myselect" onchange="this.form.submit()">
<?php
			$result = mysqli_query($con,'SELECT * FROM team');
			echo "<option>--</option>";

			while($row = mysqli_fetch_array($result)){
				echo "<option ";
				if(isset($_POST['case']) && $_POST['case']=="chooseteam"){
					if(!strcmp(trim($_POST['team']),$row['id'])){
						echo "selected ";
					}
				}
				echo "value=\"";
				echo $row['id'] . "\">" . $row['name'];
				echo "</option><br>\n";
			}
			echo "</select>";
?>
			<input type="hidden" name="case" value="chooseteam">
		</form>
<?php
			if(isset($_POST['case']) && $_POST['case']=="chooseteam"){
				echo '<form action="" method="post">
				Nazwa drużyny: <input type="text" name="team_name" value="';
				echo team_name($_POST['team']);
				echo '">
						<input type="hidden" name="team" value="';
				echo $_POST['team'] .'">';
				buttons("chooseteam");
				echo '</form>';
			}
