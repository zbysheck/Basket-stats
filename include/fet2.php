<?php			
	echo '<form action="" method="post">
	Nazwa drużyny: <input type="text" name="team_name" value="';
	echo team_name($_POST['team']);
	echo '">
			<input type="hidden" name="team" value="';
	echo $_POST['team'] .'">';
	buttons("chooseteam");
	echo '</form>';