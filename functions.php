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
		$query='SELECT * FROM team WHERE "'.$i.'" = id';
		$result = mysqli_query(connect(),$query);
		if (mysqli_connect_errno()){
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
		$row = mysqli_fetch_array($result);
		return trim($row['name']);
	}

	function pl_team_name($i){
		return team_name(pl_team($i));
	}

	function pl_team($i){
		$query='SELECT * FROM player WHERE "'.$i.'" = id';
		$result = mysqli_query(connect(),$query);
		if (mysqli_connect_errno()){
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
		$row = mysqli_fetch_array($result);
		return trim($row['team_id']);
	}

	function pl_name($i){
		$query='SELECT * FROM player WHERE "'.$i.'" = id';
		$result = mysqli_query(connect(),$query);
		if (mysqli_connect_errno()){
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
		$row = mysqli_fetch_array($result);
		return trim($row['name']);
	}

	function g_team1($i){
		$query='SELECT * FROM game WHERE "'.$i.'" = id';
		$result = mysqli_query(connect(),$query);
		if (mysqli_connect_errno()){
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
		$row = mysqli_fetch_array($result);
		return trim($row['team1_id']);
	}

	function g_team2($i){
		$query='SELECT * FROM game WHERE "'.$i.'" = id';
		$result = mysqli_query(connect(),$query);
		if (mysqli_connect_errno()){
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
		$row = mysqli_fetch_array($result);
		return trim($row['team2_id']);
	}

	function say($s){
		echo "<font color='orange'>";
		echo $s;
		echo "</font>";
	}

	function game_label($i){
		$result = mysqli_query(connect(),
			'SELECT 
			`d1`.name AS n1,
			`d2`.name AS n2, 
			`game`.game_date AS d, 
			`game`.id AS id FROM `game`
			INNER JOIN `team` AS d1 on `d1`.id=`game`.team1_id 
			INNER JOIN `team` AS d2 on `d2`.id=`game`.team2_id WHERE `game`.id="'.$i.'"');
		$row = mysqli_fetch_array($result);
		echo $row['n1'] . " vs. " . $row['n2'] . " (" . $row['d'] . ")";
	}

	function game_date($i){
		$query='SELECT * FROM game WHERE "'.$i.'" = id';
		echo $query;
		$result = mysqli_query(connect(),$query);
		if (mysqli_connect_errno()){
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
		$row = mysqli_fetch_array($result);
		return trim($row['game_date']);
	}

	function get_value($table, $value, $i){
		$query="SELECT * FROM " . $table . " WHERE '".$i."' = id";
		echo $query;
		$result = mysqli_query(connect(),$query);
		if (mysqli_connect_errno()){
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
		$row = mysqli_fetch_array($result);
		return trim($row["$value"]);
	}


	//show("SELECT * FROM team");
	//show('SELECT `z`.name AS n, `d`.name AS n2, `z`.player_id as id FROM `player` as z INNER JOIN `team` as d ON `d`.team_id=`z`.team_id');
	//show("SELECT stat_id, AVG(minutes) AS minutes, AVG(fg3) AS fg3, AVG(fga3) AS fga3, AVG(fg2) AS fg2, AVG(fga2) AS fga2, AVG(fg1) AS fg1, AVG(fga1) AS fga1, AVG(orb) AS orb, AVG(drb) AS drb, AVG(assists) AS assists, AVG(fauls) AS fauls, AVG(turnovers) AS turnovers, AVG(steals) AS steals, AVG(blocks) AS blocks FROM stat where player_id=9");
	//show("SELECT `z`.name AS n, `d`.name AS n2, `z`.player_id as id FROM `player` as z INNER JOIN `team` as d ON `d`.team_id=`z`.team_id");
	//echo player_name(5);
	//echo team_name('8');
	//echo pl_team_name('1');
	//echo pl_team_name('2');
	//echo pl_team_name('4');
	//echo game_label('6');
	echo game_date(3);
	echo get_value("game","game_date",1);
?>