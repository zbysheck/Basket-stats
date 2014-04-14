<?php
	
			if(isset($_POST['action']) && $_POST['action']=="update" && isset($_POST['case']) && $_POST['case']=="addgame"){
				//echo "echo" . $_POST['team'] . $_POST['team_name'];
				$opt=trim($_POST['game']);
				$sql="UPDATE game SET 
				team1_id ='$_POST[team1]',
				team2_id ='$_POST[team2]',
				game_date = '$_POST[match_date]'
				WHERE id = '$opt'
				";
				if (!mysqli_query($con,$sql)){
					die('Error: ' . mysqli_error($con));
				}else{
					say("edycja meczu zakończona sukcesem");
				}
			}

			if(isset($_POST['action']) && $_POST['action']=="delete" && isset($_POST['case']) && $_POST['case']=="addgame"){
				//echo "echo" . $_POST['team'] . $_POST['team_name'];
				$opt=trim($_POST['game']);
				$sql="DELETE FROM game
				WHERE id = '$opt'
				";
				if (!mysqli_query($con,$sql)){
					die('Error: ' . mysqli_error($con));
				}else{
					say("usunięcie meczu zakończone sukcesem");
				}
			}
?>

		<form action="" method="post">
			<b>Edytuj mecz:</b><br/> <select name="game" id="myselect" onchange="this.form.submit()">
<?php
			$result = mysqli_query($con,'SELECT * FROM game');
			echo "<option>--</option>";
			while($row = mysqli_fetch_array($result)){
				echo "<option ";
				if(isset($_POST['case']) && $_POST['case']=="addgame"){
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
			<input type="hidden" name="case" value="addgame">
		</form>			
<?php
			if(isset($_POST['case']) && $_POST['case']=="addgame"){
				include 'feg2.php';
			}