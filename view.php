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

	function td($s){
		echo "<td>" . $s . "</td>";
	}

	if(isset($_POST['case'])){
		echo "lala";
		if($_POST['case']=="player"){
			echo "<table border=\"5\">";
			$result = mysqli_query($con,'SELECT * FROM stat');
			echo "<tr>";
			td("id");
			td("min");
			td("pkt");
			td("c3");
			td("w3");
			td("%3");
			td("c2");
			td("w2");
			td("%2");
			td("c1");
			td("w1");
			td("%1");
			td("zba");
			td("zbo");
			td("zbw");
			TD("A");
			TD("F");
			TD("S");
			TD("P");
			TD("B");
			echo "</tr>";
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
		<meta charset="utf-8">
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