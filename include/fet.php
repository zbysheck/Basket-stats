		<form action="" method="post">
			<b>Edytuj drużynę:</b><br> <select name="team" id="myselect" onchange="this.form.submit()">
<?php
			$result = mysqli_query($con,'SELECT * FROM team');
			echo "<option>--</option>";

			while($row = mysqli_fetch_array($result)){
				echo "<option ";
				if(isset($_POST['case']) && $_POST['case']=="team"){
					if(!strcmp(trim($_POST['team']),$row['id'])){
						echo "selected ";
					}
				}
				echo "value=\"";
				echo $row['id'] . "\">" . $row['name'];
				echo "</option><br/>\n";
			}
			echo "</select>";
?>
			<input type="hidden" name="case" value="team">
		</form>
<?php
			if(isset($_POST['case']) && $_POST['case']=="team"){
				echo '<form action="" method="post">
				Nazwa drużyny: <input type="text" name="team_name" value="';
				echo team_name($_POST['team']);
				echo '">
						<input type="hidden" name="team" value="';
				echo $_POST['team'] .'">';
				buttons("team");
				echo '</form>';
			}
