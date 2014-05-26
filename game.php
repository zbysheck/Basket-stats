<?php
require_once("functions.php");
	$query='SELECT * FROM game';
	$result = mysqli_query(connect(),$query);
	while($row = mysqli_fetch_array($result)){
		//var_dump($row);
		echo "<a href=>".$row["team1_id"]." vs. ".$row["team2_id"]." (".$row["game_date"].")</a><br/>";
	}
	?>