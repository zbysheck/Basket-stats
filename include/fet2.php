			<form action="" method="post">
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
			<input type="hidden" name="case" value="addteam">
			<input type="submit" name="action" value="update" style="display:none">
			<input type="submit" value="[delete]" style="border: none; background: none;" name="action" value="delete">
			<br/><input type="submit" name="action" value="update">
			</form>