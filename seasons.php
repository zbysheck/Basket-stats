<?php
	require_once("functions.php");
if(isset($_POST['case']) && $_POST['case']=="chooseseason"){
			$sql="INSERT INTO season (year)
			VALUES
			('$_POST[year]')";
		if (!mysqli_query($con,$sql)){
			die('Error: ' . mysqli_error($con));
		}
		}
		?>
	<br/>
		<form action="" method="post">
			<b>Dodaj:</b><br> 
			<select name="year" onchange="this.form.submit()">
			<?php
				for($i=1990;$i<=2050;$i++){
					echo "<option value=\"$i\"";
					if($i==date("Y")){
						echo " selected";
					}
					echo ">";
					echo season($i);
					echo "</option>";
				}?>
			</select>
			<input type="hidden" name="case" value="chooseseason">
		</form>
<?php


	$query='SELECT * FROM season';
	$result = mysqli_query(connect(),$query);
	while($row = mysqli_fetch_array($result)){
		//var_dump($row);
		echo "<a href=>".season($row["year"])."</a><br/>";
	}