<?php
	require('connection.php');

	if(isset($_GET['pid'])){

		$postid = $_GET['pid'];
	}
	elseif(!isset($_GET['pid'])){
		header('Location:Loginpage.php');
	}

	$q = "delete from posts where post_id =".$postid;

	$deleted = mysqli_query($conn,$q);

	if($deleted){
		
		header('Location:edit_post.php');
	}
	else{
		echo "not sucessful";
	}
?>