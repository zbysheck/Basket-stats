<?php
	class player{

		static private function stats($id, $sql){
			$con=connect();
			echo "<table>";
			$result = mysqli_query($con,$sql);
			echo "<tr>";
			$labels=array("id","min","pkt","c3","w3","%3","c2","w2","%2","c1","w1","%1","zba","zbo","zbw","A","F","S","P","B");
			foreach ($labels as $i) {
				th($i);
			}
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

		static public function all($id){
			player::stats($id,'SELECT * FROM stat WHERE player_id="'.$id.'"');
		}

		static public function avg($id){
			player::stats($id,'SELECT stat_id, AVG(minutes) AS minutes, AVG(fg3) AS fg3, AVG(fga3) AS fga3, AVG(fg2) AS fg2, AVG(fga2) AS fga2, AVG(fg1) AS fg1, AVG(fga1) AS fga1, AVG(orb) AS orb, AVG(drb) AS drb, AVG(assists) AS assists, AVG(fauls) AS fauls, AVG(turnovers) AS turnovers, AVG(steals) AS steals, AVG(blocks) AS blocks FROM stat WHERE player_id="'.$id.'"');
		}

		static public function sum($id){
			player::stats($id,'SELECT stat_id, SUM(minutes) AS minutes, SUM(fg3) AS fg3, SUM(fga3) AS fga3, SUM(fg2) AS fg2, SUM(fga2) AS fga2, SUM(fg1) AS fg1, SUM(fga1) AS fga1, SUM(orb) AS orb, SUM(drb) AS drb, SUM(assists) AS assists, SUM(fauls) AS fauls, SUM(turnovers) AS turnovers, SUM(steals) AS steals, SUM(blocks) AS blocks FROM stat WHERE player_id="'.$id.'"');
		}


	}


?>