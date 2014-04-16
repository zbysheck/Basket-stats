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
				//include 'fep2.php';
				echo '<form action="" method="post">
				Nazwa zawodniczki: <input type="text" name="player_name" value="';
				echo pl_name($_POST['player']);
				echo '">';
				echo "zmień drużynę:";
				
				$result = mysqli_query($con,'SELECT * FROM team');
				echo '<select name="team" id="myselect">';
				echo "<option>--</option>";
				while($row = mysqli_fetch_array($result)){
					$opt=trim(pl_team($_POST['player']));
					echo "<option ";
					if(!strcmp($opt,$row['id'])){
							echo "selected ";
					}
					echo "value=\"";
					echo $row['id'] . "\">" . $row['name'];
					echo "</option><br>\n";
				}
				echo "</select>";

				echo '<input type="hidden" name="player" value="';
				echo $_POST['player'];
				echo '">';
				buttons("chooseplayer");
				echo '</form>';
			}