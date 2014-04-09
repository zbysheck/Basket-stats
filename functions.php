<?php 
	include 'base.php';
	$con=connect();

	function perc($f, $s){
		if($s || $f>$s)
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
?>