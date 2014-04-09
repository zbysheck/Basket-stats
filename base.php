<?php
	$host="localhost";
	$login="root";
	$pswd="";
	$db="basket2";

	function Qconnect(){
		return mysqli_connect($host,$login,$pswd,$db);
	}

	function connect(){
		return mysqli_connect("localhost","root","","basket2");
	}