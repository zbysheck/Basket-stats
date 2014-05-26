<?php
	function delete_query($table, $id, $msg){
		$con=connect();
		$opt=trim($id);
		$sql="DELETE FROM " . $table .  
		" WHERE id = '$opt'
		";
		echo $sql;
		if (!mysqli_query($con,$sql)){
			die('Error: ' . mysqli_error($con));
		}else{
			say($msg);
		}
	}

	function remove ($table, $id, $label){
		delete_query($table, $id, "usunięcie " . $label . " zakończone sukcesem");
	}

	function delete_player($id){
		delete_query("player", $id, "usunięcie zawodnika zakończone sukcesem");
	}

	function delete_team($id){
		delete_query("team", $id, "usunięcie drużyny zakończone sukcesem");
	}

	function delete_game($id){
		delete_query("game", $id, "usunięcie meczu zakończone sukcesem");
	}

	function delete_stat($id){
		delete_query("stat", $id, "usunięcie statystyki zakończone sukcesem");
	}




