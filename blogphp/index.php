<!DOCTYPE html>
<html>
<head>
	<title>Blog Page</title>
	<link rel="stylesheet" type="text/css" href="./styles/styleindex.css">
</head>
<body>
	<div id="header">
		<div class="container">
			<div id="logo">
				<p>BLOG.</p>
			</div>
			<div id="sigup">
				<h4>Sign Up</h4>
			</div>
		</div>
	</div>
	<div id="main">
		<div class="container">
			<div id="signin">
				<h2>Login In</h2>
				<form name="frm1" method="post" >
					<h4>Username</h4>
					<input type="text" name="username">
					<h4>Password</h4>
					<input type="password" name="password">
					<input type="submit" name="submit" value="SignIn">
				</form>
			</div>
		</div>
	</div>
	<?php require('signin.php');?>
</body>
</html>