<?php
	
	$server = "localhost";
	$user = "root";
	$pass = "";
	$db = "blogdb";

	$conn  = mysqli_connect($server,$user,$pass,$db);

	if(!$conn){
		echo "connection not successful";
	}
	
?>