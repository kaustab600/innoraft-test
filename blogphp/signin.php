<?php
require('connection.php');

if(isset($_POST['submit'])){

	$email= $_POST['username'];
	$password = $_POST['password'];

	$q1 = "select user_id from users where user_email = '".$email."' and user_pass = '".$password."'";
	$no_of_users = mysqli_query($conn,$q1);
	if(mysqli_num_rows($no_of_users) == 1){
		$row = mysqli_fetch_assoc($no_of_users);
		session_start();
		$_SESSION['uid'] = $row['user_id'];
		header('Location:homepage.php');
	}
	else{

		header('Location:index.php?msg=invalid');
	}
	
}

?>