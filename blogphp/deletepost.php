<?php
	require('connection.php');

	if($_GET['pid']){
		$postid = $_GET['pid'];
	}

	$q = "delete from posts where post_id =".$postid;

	$deleted = mysqli_query($conn,$q);

	if($deleted){
		echo "sucessfully deleted";
	}
	else{
		echo "not sucessful";
	}
?>