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

	function dropDown($table, $option, $text){
		$result = mysqli_query($con,'SELECT * FROM "'.$table.'"');
		while($row = mysqli_fetch_array($result)){
			echo "<option value=\"";
			echo $row[$option] . "\">" . $row[$text];
			echo "</option><br>";
		}
	}

	function selectBox($name,$costam){

	}

	function numberBox($name){

		echo "<table><tr>";
		echo $name;
		echo ": </tr><tr><input type='number' min='0' value='0' name='";
		echo $name;
		echo "'></tr></table>";
	}

	function numberTable($labels){
		echo "<table>";
		foreach ($labels as $i) {
			echo "<td>";
			numberBox($i);
			echo "</td>";
		}
		echo "</table>s";
	}

	function team_name($i){
		$i=trim($i);
		$query='SELECT * FROM team WHERE "'.$i.'" = team_id';
		$result = mysqli_query(connect(),$query);
		if (mysqli_connect_errno()){
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
		$row = mysqli_fetch_array($result);
		return trim($row['name']);
	}

	function pl_team_name($i){
		$i=
		return team_name($i)
	}

	



	//show("SELECT * FROM team");
	//show('SELECT `z`.name AS n, `d`.name AS n2, `z`.player_id as id FROM `player` as z INNER JOIN `team` as d ON `d`.team_id=`z`.team_id');
	//show("SELECT stat_id, AVG(minutes) AS minutes, AVG(fg3) AS fg3, AVG(fga3) AS fga3, AVG(fg2) AS fg2, AVG(fga2) AS fga2, AVG(fg1) AS fg1, AVG(fga1) AS fga1, AVG(orb) AS orb, AVG(drb) AS drb, AVG(assists) AS assists, AVG(fauls) AS fauls, AVG(turnovers) AS turnovers, AVG(steals) AS steals, AVG(blocks) AS blocks FROM stat where player_id=9");
	//show("SELECT `z`.name AS n, `d`.name AS n2, `z`.player_id as id FROM `player` as z INNER JOIN `team` as d ON `d`.team_id=`z`.team_id");
	//echo player_name(5);

?>