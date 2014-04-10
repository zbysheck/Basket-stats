<?php
	include 'functions.php';
	include 'include/header.php';
	if(isset($_POST['case'])){
		if($_POST['case']=="addteam"){		
			include 'fet.php';
			if(isset($_POST['case'])){
				
			}
		}
		elseif($_POST['case']=="addplayer"){
			include 'fep.php';
		}
		elseif($_POST['case']=="game"){

		}
		elseif($_POST['case']=="stat"){

		}
	}else{
		include 'fet.php';
		include 'fep.php';
	}