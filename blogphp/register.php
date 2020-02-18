<?php
	require('connection.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
	<link rel="stylesheet" type="text/css" href="./styles/registerpage.css">
</head>
<body>
	<div id="header">
		<div class="container">
			<div id="logo">
				<p>BLOG.</p>
			</div>
			<div id="sigup">
				<a href="Loginpage.php">Sign In</a>
			</div>
			<div id="sigup">
				<a href="index.php">Home</a>
			</div>
		</div>
	</div>
	<div id="main">
		<div class="container">
			<div id="signin">
				<h2>Create your Acount To Explore the World of Blogs</h2>
				<form name="frm1" method="post" enctype="multipart/form-data">
					<h4>Profile Pic</h4>
					<input type="file" name="profilepic">
					<h4>First Name</h4>
					<input type="text" name="fname">
					<h4>Last Name</h4>
					<input type="text" name="lname">
					<h4>Username</h4>
					<input type="text" name="username">
					<h4>Describe user</h4>
					<input type="text" name="describeuser">
					<h4>email</h4>
					<input type="text" name="email">
					<h4>password</h4>
					<input type="password" name="pass">
					<h4>confirm password</h4>
					<input type="password" name="crfmpass">
					<select name="country">
						<option selected>please select your country</option>
						<option value="India">India</option>
						<option value="USA">USA</option>
						<option value="UK">UK</option>
					</select>
					<h4>Gender</h4>
					<input type="radio" name="gender" value="male"/>Male<input type="radio" name="gender" value="male"/>Female<br>
					
					<input type="submit" name="submit" value="Register">
				</form>
			</div>
			<div id="wallpaper"><img src="./images/blogregister.jpeg"></div>
		</div>
	</div>
</body>
<?php 
	require('signup.php');
?>
</html>