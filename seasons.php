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

if(isset($_GET['delete'])){
	//var_dump($_GET);
	remove("season", $_GET['delete'], "sezonu");
}

if(isset($_GET['activate'])){
	update_option('BS_active', $_GET['activate']);
}
$active=get_option('BS_active');
		?>
		<form action="" method="post">
			<b>Dodaj:</b><br> 
			<select name="year">
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
			<input type="submit" value="Dodaj Sezon">
		</form>
<?php
//var_dump($_GET);

	$query='SELECT * FROM season ORDER BY year';
	$result = mysqli_query(connect(),$query);
	while($row = mysqli_fetch_array($result)){
		//var_dump($row);
		echo "<a href=admin.php?page=basket/basket.php&tab=season&season=".$row["id"].">".season($row["year"])." (edytuj)</a>
		<a href=admin.php?page=basket/basket.php&tab=seasons&delete=".$row["id"].">[usuń]</a>  ";
		if($active==$row["id"]){
			echo '<font color="lime">[aktywny]</font><br/>';
		}else{
			echo "<a href=admin.php?page=basket/basket.php&tab=seasons&activate=".$row["id"].">[aktywuj]</a><br/>";
		}
	}