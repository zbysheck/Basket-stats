<?php
	
			if(isset($_POST['action']) && $_POST['action']=="update" && isset($_POST['case']) && $_POST['case']=="chooseplayer"){
				//echo "echo" . $_POST['team'] . $_POST['team_name'];
				$opt=trim($_POST['player']);
				$sql="UPDATE player SET 
				name ='$_POST[player_name]',
				team_id = '$_POST[team]'
				WHERE id = '$opt'
				";
				if (!mysqli_query($con,$sql)){
					die('Error: ' . mysqli_error($con));
				}else{
					say("edycja zawodnika zakończona sukcesem");
				}
			}

			if(isset($_POST['action']) && $_POST['action']=="delete" && isset($_POST['case']) && $_POST['case']=="chooseplayer"){
				delete_player($_POST['player']);
			}

			echo '<b>Edytuj zawodniczkę:</b>';
			choose::player("case");
			if(isset($_POST['case']) && $_POST['case']=="chooseplayer"){
				include 'fep2.php';
			}