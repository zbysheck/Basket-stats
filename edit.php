<html>
	<head>
		<title>dodaj</title>
		<link rel="stylesheet" type="text/css" href="style2.css" />
		<meta charset="utf-8"/>
	</head>
	<body>
<?php

	include 'functions.php';
	if(isset($_POST['case'])){
		if($_POST['case']=="addteam"){		
			include 'fet.php';
		}
		elseif($_POST['case']=="player"){

		}
		elseif($_POST['case']=="game"){

		}
		elseif($_POST['case']=="stat"){

		}
	}else{
		include 'fet.php';
	}