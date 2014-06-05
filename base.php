<?php
	$host="localhost";
	$login="root";
	$pswd="";
	$db="wordpress";

	function Qconnect(){
		return mysqli_connect($host,$login,$pswd,$db);
	}

	function connect(){
		//return mysqli_connect("localhost","root","","wordpress");
		return mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
	}