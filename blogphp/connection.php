<?php
	
	$server = "localhost";
	$user = "root";
	$pass = "12345";
	$db = "blogdb";

	$conn  = mysqli_connect($server,$user,$pass,$db);

	if(!$conn){
		echo "connection not successful";
	}
	
?>