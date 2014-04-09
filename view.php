<?php
	$con=mysqli_connect("localhost","root","","basket2");
	// Check connection
	if (mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	function perc($f, $s){
		if($s || $f>$s)
			return round($f*100/$s) . "%";
		else 
			return "100%";
	}

	function th($s){
		echo "<th>" . $s . "</th>";
	}

	if(isset($_POST['case'])){
		echo "lala";
		if($_POST['case']=="player"){
			$pl=$_POST['player'];
			echo "<table>";
			$result = mysqli_query($con,'SELECT * FROM stat WHERE player_id="'.$pl.'"');
			echo "<tr>";
			th("id");th("min");th("pkt");th("c3");th("w3");th("%3");th("c2");th("w2");th("%2");th("c1");th("w1");th("%1");th("zba");th("zbo");th("zbw");th("A");th("F");th("S");th("P");th("B");echo "</tr>";
			while($row = mysqli_fetch_array($result)){
				echo "<tr>";
				echo "<td>" . $row['stat_id'] . "</td>";
				echo "<td>" . $row['minutes'] . "</td>";
				echo "<td>" . ($row['fg3']*3+$row['fg2']*2+$row['fg1'])  . "</td>";
				echo "<td>" . $row['fg3'] . "</td>";
				echo "<td>" . $row['fga3'] . "</td>";
				echo "<td>" . perc($row['fg3'], $row['fga3']) . "</td>";
				echo "<td>" . $row['fg2'] . "</td>";
				echo "<td>" . $row['fga2'] . "</td>";
				echo "<td>" . perc($row['fg2'], $row['fga2']) . "</td>";
				echo "<td>" . $row['fg1'] . "</td>";
				echo "<td>" . $row['fga1'] . "</td>";
				echo "<td>" . perc($row['fg1'], $row['fga1']) . "</td>";
				echo "<td>" . $row['orb'] . "</td>";
				echo "<td>" . $row['drb'] . "</td>";
				echo "<td>" . ($row['drb']+$row['orb']) . "</td>";
				echo "<td>" . $row['assists'] . "</td>";
				echo "<td>" . $row['fauls'] . "</td>";
				echo "<td>" . $row['turnovers'] . "</td>";
				echo "<td>" . $row['steals'] . "</td>";
				echo "<td>" . $row['blocks'] . "</td>";

				echo "</tr>";
			}
			echo "</table>";
		}
		elseif($_POST['case']=="add_player"){

		}

		echo "1 record added";
		//mysqli_close($con);
	}
?>

<html>
	<head>
		<title> kosz</title>
		<link rel="stylesheet" type="text/css" href="style.css" />
		<meta charset="utf-8"/>
	</head>
	<body>
	<br/>
		
		<b>Pokaż zawodniczkę</b>
		<form action="view.php" method="post">
			<br/> <select name="player" id="myselect" onchange="this.form.submit()">
<?php
			$result = mysqli_query($con,'SELECT * FROM player');

			while($row = mysqli_fetch_array($result)){
				echo "<option value=\"";
				echo $row['player_id'] . "\">" . $row['name'];
				echo "</option><br>";
			}
?>
			<input type="hidden" name="case" value="player">
					</select>
			<input type="submit">
		</form>


	</body>
</html>