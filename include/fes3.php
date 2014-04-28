<?php
	echo '<form action="" method="post">';
	/*echo 'pole: <input type="text>
			<input type="hidden" name="stat" value="';*/
	echo '<input type="hidden" name="player" value="';
	echo $_POST['player'] .'">';
	echo '<input type="hidden" name="game" value="';
	echo $_POST['game'] .'">';

	//$labels=array("minuty","celne3","wykonane3","celne2","wykonane2","celne1","wykonane1","zbiorki_atak","zbiorki_obrona","asysty","faule","straty","przechwyty","bloki");
	$labels=array("minutes", "fg3", "fga3", "fg2", "fga2", "fg1", "fga1", "orb", "drb", "assists", "fauls", "turnovers", "steals", "blocks");
	numberTable($labels, $_POST['player']);

	buttons("stat");
	echo '</form>';
	
	