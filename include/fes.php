<?php
			if(isset($_POST['action']) && $_POST['action']=="delete" && isset($_POST['case']) && $_POST['case']=="addstat"){
				delete_stat($_POST['stat']);
			}
?>
		<form action="" method="post">
			<b>Edytuj statystyki:</b><br> <select name="game" id="myselect" onchange="this.form.submit()">
<?php
			$result = mysqli_query($con,'SELECT * FROM game');
			echo "<option>--</option>";

			while($row = mysqli_fetch_array($result)){
				echo "<option ";
				if(isset($_POST['case']) && $_POST['case']=="addstat"){
					if(!strcmp(trim($_POST['game']),$row['id'])){
						echo "selected ";
					}
				}
				echo "value=\"";
				echo $row['id'] . "\">";
				echo game_label($row['id']);
				echo "</option><br>\n";
			}
			echo "</select>";
?>
			<input type="hidden" name="case" value="addstat">
		</form>
<?php
			if(isset($_POST['case']) && $_POST['case']=="addstat"){
				include 'fes2.php';
			}