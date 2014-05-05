<?php
	//class player{
		function stats($sql){
			$con=connect();
			$result = mysqli_query($con,$sql);
			$labels=array("id","min","pkt","c3","w3","%3","c2","w2","%2","c1","w1","%1","zba","zbo","zbw","A","F","S","P","B");
			drawTable($labels, $result);
		}

		function drawTable($labels, $result)
		{
			echo "<table>";
			echo "<tr>";
			foreach ($labels as $i) {
				th($i);
			}
			echo "</tr>";
			while($row = mysqli_fetch_array($result)){
				echo "<tr>";
				echo cell($row['id']);
				echo cell($row['minutes']);
				echo cell(($row['fg3']*3+$row['fg2']*2+$row['fg1']) );
				echo cell($row['fg3']);
				echo cell($row['fga3']);
				echo cell(perc($row['fg3'], $row['fga3']), "%");
				echo cell($row['fg2']);
				echo cell($row['fga2']);
				echo cell(perc($row['fg2'], $row['fga2']) , "%");
				echo cell($row['fg1']);
				echo cell($row['fga1']);
				echo cell(perc($row['fg1'], $row['fga1']) , "%");
				echo cell($row['orb']);
				echo cell($row['drb']);
				echo cell(($row['drb']+$row['orb']));
				echo cell($row['assists']);
				echo cell($row['fauls']);
				echo cell($row['turnovers']);
				echo cell($row['steals']);
				echo cell($row['blocks']);

				echo "</tr>";
			}
			echo "</table>";
		}

		function all($id){
			echo "wszystko<br>";
			stats('SELECT * FROM stat WHERE player_id="'.$id.'"');
		}

		function avg($id){
			echo "srednia<br>";
			stats('SELECT id, AVG(minutes) AS minutes, AVG(fg3) AS fg3, AVG(fga3) AS fga3, AVG(fg2) AS fg2, AVG(fga2) AS fga2, AVG(fg1) AS fg1, AVG(fga1) AS fga1, AVG(orb) AS orb, AVG(drb) AS drb, AVG(assists) AS assists, AVG(fauls) AS fauls, AVG(turnovers) AS turnovers, AVG(steals) AS steals, AVG(blocks) AS blocks FROM stat WHERE player_id="'.$id.'"');
		}

		function sum($id){
			echo "suma<br>";
			stats('SELECT id, SUM(minutes) AS minutes, SUM(fg3) AS fg3, SUM(fga3) AS fga3, SUM(fg2) AS fg2, SUM(fga2) AS fga2, SUM(fg1) AS fg1, SUM(fga1) AS fga1, SUM(orb) AS orb, SUM(drb) AS drb, SUM(assists) AS assists, SUM(fauls) AS fauls, SUM(turnovers) AS turnovers, SUM(steals) AS steals, SUM(blocks) AS blocks FROM stat WHERE player_id="'.$id.'"');
		}

		function allsum(){
			echo "suma wszystkich<br>";
			stats('SELECT id, SUM(minutes) AS minutes, SUM(fg3) AS fg3, SUM(fga3) AS fga3, SUM(fg2) AS fg2, SUM(fga2) AS fga2, SUM(fg1) AS fg1, SUM(fga1) AS fga1, SUM(orb) AS orb, SUM(drb) AS drb, SUM(assists) AS assists, SUM(fauls) AS fauls, SUM(turnovers) AS turnovers, SUM(steals) AS steals, SUM(blocks) AS blocks FROM stat GROUP BY player_id');
		}

		function allavg(){
			echo "srednia wszystkich<br>";
			stats('SELECT id, AVG(minutes) AS minutes, AVG(fg3) AS fg3, AVG(fga3) AS fga3, AVG(fg2) AS fg2, AVG(fga2) AS fga2, AVG(fg1) AS fg1, AVG(fga1) AS fga1, AVG(orb) AS orb, AVG(drb) AS drb, AVG(assists) AS assists, AVG(fauls) AS fauls, AVG(turnovers) AS turnovers, AVG(steals) AS steals, AVG(blocks) AS blocks FROM stat GROUP BY player_id');
		}

	//}


?>