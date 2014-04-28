<?php
	if(isset($_POST['case']) && isset($_POST['action'])) {
		//echo "pech";
		var_dump($_POST);
		if($_POST['case']=="team"){
			$table = "team";
			$id = $_POST['team'];
			$sql = "name ='$_POST[team_name]' ";
			$label = "drużyny";
		}elseif($_POST['case']=="player"){
			$table = "player";
			$id = $_POST['player'];
			$sql = "name ='$_POST[player_name]', 
					team_id = '$_POST[team]' ";
			$label = "zawodniczki";
		}elseif($_POST['case']=="game"){
			$table = "game";
			$id = $_POST['game'];
			$sql = "team1_id ='$_POST[team1]',
					team2_id ='$_POST[team2]',
					game_date = '$_POST[match_date]' ";
			$label = "meczu";
		}elseif($_POST['case']=="stat"){
			$table = "stat";
			$id = $_POST['player'];
			$labels=array("minutes", "fg3", "fga3", "fg2", "fga2", "fg1", "fga1", "orb", "drb", "assists", "fauls", "turnovers", "steals", "blocks");
			$sql = "";
			foreach ($labels as $i){
				$sql .= $i . " = " . $_POST[$i] . ", ";
			}
			$sql=rtrim($sql, " ,") . ' ';
			$label = "statystyki";
		}

		if($_POST['action']=="update"){
			update_table($table, $id, $sql, $label);
		}elseif($_POST['action']=="delete"){
			remove($table, $id, $label);
		}
	}