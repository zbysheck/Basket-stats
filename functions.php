<?php 
	include 'base.php';
	$con=connect();

	function perc($f, $s){
		if($s && $f<$s)
			return strval($f*100/$s);
		else 
			return "100";
	}

	function season($y){
		$s=$y;
		$s.="/";
		$s.=$y+1;
		return $s;
	}

	function cell($content, $char=""){
		return "<td>" . round($content,2) . $char . "</td>";
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
			echo "</option><br/>";
		}
	}

	function selectBox($name,$costam){

	}

	function numberBox($name, $id=0){

		echo "<table><tr><td>";
		echo $name;
		echo ": </td></tr><tr><td><input type='number' min='0' max='999' value='";
		if($id){
			echo get_value("stat", $name, $id);
		}else{
			echo 0;
		}
		echo "' name='";
		echo $name;
		echo "'></td></tr></table>";
	}

	function numberTable($labels, $id=0){
		$labels =array("minutes", "fg3", "fga3", "fg2", "fga2", "fg1", "fga1", "orb", "drb", "assists", "fauls", "turnovers", "steals", "blocks");
		echo "<table><tr>";
		foreach ($labels as $i){
			echo "<td>";
			numberBox($i,$id);
			echo "</td>";
		}
		echo "</tr></table>";
	}

	function nb($name, $id){

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
		return get_value("player", "team_id", $i);
	}

	function pl_name($i){
		return get_value("player", "name", $i);
	}

	function g_team1($i){
		return get_value("game", "team1_id", $i);
	}

	function g_team2($i){
		return get_value("game", "team2_id", $i);
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
		return get_value("game", "game_date", $i);
	}

	function get_value($table, $value, $i){
		$sql="SELECT * FROM " . $table . " WHERE '".$i."' = id";
		$result = mysqli_query(connect(),$sql);
		if (mysqli_connect_errno()){
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
		$row = mysqli_fetch_array($result);
		return trim($row["$value"]);
	}

	function get_id($table, $value, $i){
		$sql="SELECT * FROM " . $table . " WHERE '".$i."' = $value";
		$result = mysqli_query(connect(),$sql);
		if (mysqli_connect_errno()){
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
		$row = mysqli_fetch_array($result);
		return trim($row["id"]);
	}

	function update_table($table, $id, $sql, $label){

		$sql ='UPDATE ' . $table . " SET " . $sql . 'WHERE id = ' . trim($id);
		//echo $sql;
		if (!mysqli_query(connect(),$sql)){
			die('Error: ' . mysqli_error($con));
		}else{
			$s="edycja " . $label . " zakończona sukcesem";
			say($s);
		}
	}

	function game_stats($i){
		$sql="SELECT * FROM stats WHERE '".$i."' = game_id";
		$result = mysqli_query(connect(),$sql);
		if (mysqli_connect_errno()){
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
		return mysqli_fetch_array($result);
	}

	function buttons($case)
	{
		echo '<input type="hidden" name="case" value="' . $case . '">
			<input type="submit" name="action" value="update" style="display:none">
			<button type="submit" style="border: none; background: none;" name="action" value="delete">[delete]</button>
			<br/><input type="submit" name="action" value="update">
			';
	}

	function fc($id, $label){
		echo ' Wklej statystyki na stronę zawodniczki: <input type="text" value="[' . $label . " " . $id . ']" name="tb1" readonly onclick="select()"/>';
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
	//echo game_date(6);
	//echo get_value("game","game_date",1);
?>