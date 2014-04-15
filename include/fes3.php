<?php
	if(isset($_POST['case']) && $_POST['case']=="addstat"){
		echo '<form action="" method="post">
		pole: <input type="text>
				<input type="hidden" name="stat" value="';
		echo $_POST['player'] .'">';
		echo '<input type="hidden" name="game" value="';
		echo $_POST['game'] .'">';

		buttons("addstat");
		echo '</form>';
	}