<?php 
	include 'base.php';
	$con=connect();

	function perc($f, $s){
		if($s && $f<$s)
			return round($f*100/$s) . "%";
		else 
			return "100%";
	}

	function th($s){
		echo "<th>" . $s . "</th>";
	}

	function show($query){
		$result = mysqli_query(connect(),$query);
		if (mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
		while($row = mysqli_fetch_array($result)){
			print_r($row);
			echo "<br/>";
		}
	}

	//show("SELECT * FROM team");
	//show('SELECT `z`.name AS n, `d`.name AS n2, `z`.player_id as id FROM `player` as z INNER JOIN `team` as d ON `d`.team_id=`z`.team_id');
	//show("SELECT stat_id, AVG(minutes) AS minutes, AVG(fg3) AS fg3, AVG(fga3) AS fga3, AVG(fg2) AS fg2, AVG(fga2) AS fga2, AVG(fg1) AS fg1, AVG(fga1) AS fga1, AVG(orb) AS orb, AVG(drb) AS drb, AVG(assists) AS assists, AVG(fauls) AS fauls, AVG(turnovers) AS turnovers, AVG(steals) AS steals, AVG(blocks) AS blocks FROM stat where player_id=9");
?>