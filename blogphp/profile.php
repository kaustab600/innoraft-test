<?php

require('connection.php');

		session_start();
		$userid = $_SESSION['uid'];
		if(!isset($_SESSION['uid'])){
			header('Location:Loginpage.php');
		}
		$q = "select * from users where user_id = '".$userid."'";
		$user_details = mysqli_query($conn,$q);
		if(mysqli_num_rows($user_details) == 1){
			$rows = mysqli_fetch_assoc($user_details);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
	<link rel="stylesheet" type="text/css" href="./styles/styleprofile.css?v=1">
</head>
<body>
		<div id="header">
		<div class="container">
			<div id="logo">
				<p>BLOG.</p>
			</div>
			
			<div id="logout">
				<a href="logout.php">Logout</a>
			</div>
			<div class="navbar">
				<ul>
					<li><a href="edit_profile.php">Edit Profile</a></li>
					<li><a href="homepage.php">Home</a></li>
				</ul>				
			</div>
		</div>
		</div>
		<div id="main">
			<div id="profiledetails">
				<?php if( empty($rows['user_image']))
						{ 
							echo "No Profile pic. please update profile pic";
						}
						else{
							//echo $rows['user_image'];
							echo "<img src='profilepics/".$rows['user_image']."' width='200px' style='border:1px solid black' />";		
						}

				 ?>
				<h2>Welcome <?php echo $rows['user_name'];    ?></h2><br>
				<hr>
				<h3>First Name: <?php echo $rows['f_name'];    ?></h3>
				<h3>Last Name: <?php echo $rows['l_name'];    ?></h3>
				<h3>Status : <?php echo $rows['describe_user'];    ?></h3>
				<h3>Country: <?php echo $rows['user_country'];    ?></h3>
				<h3>Gender: <?php echo $rows['user_gender'];    ?></h3>
				<h3>Joined On: <?php echo $rows['user_reg_date']; }   ?></h3>
			</div>
		</div>
</body>
</html>
			