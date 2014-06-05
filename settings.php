<?php
	if(isset($_POST['BS_team_name'])){
		update_option("BS_team_name",$_POST['BS_team_name']);
	}

	echo '<form action="" method="post">
	Nazwa Klubu: <input type="text" name="BS_team_name" value="';
	echo get_option("BS_team_name");
	echo '">
	<input type="submit">';