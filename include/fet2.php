			<form action="edit.php" method="post">
			Nazwa drużyny: <input type="text" name="team_name" value="
<?php
	echo team_name($_POST['team']);
?>
">
			<input type="hidden" name="team" value="
<?php
	echo $_POST['team'];
?>
">
			<input type="hidden" name="sub" value="yes">
			<input type="hidden" name="case" value="addteam">
			<br/><input type="submit">
			</form>