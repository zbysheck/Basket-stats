<?php 
	include 'base.php';
	
	function perc($f, $s){
		if($s || $f>$s)
			return round($f*100/$s) . "%";
		else 
			return "100%";
	}

	function th($s){
		echo "<th>" . $s . "</th>";
	}

?>