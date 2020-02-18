<?php

require('connection.php');

if(isset($_GET['pid'])){
	$postid = $_GET['pid'];
}
elseif(!isset($_GET['pid'])){
	header('Location:Loginpage.php');
}

$q1 = "select u.user_name , u.user_image, p.post_title , p.post_date , p.upload_image ,p.post_content from posts p inner join users u on p.user_id =u.user_id where p.post_id =".$postid;
$contents = mysqli_query($conn,$q1);

if($contents)
{
	$rowno = mysqli_fetch_assoc($contents);
 ?>
		<!DOCTYPE html>
		<html>
		<head>
			<title>View Post</title>
			<link rel="stylesheet" type="text/css" href="./styles/styleview_post.css?v=1">
		</head>
		<body>
		<div id="header">
				<div class="container">
					<div id="logo">
						<p>BLOG.</p>
					</div>
					<div id="profilelogo"><?php echo "<img src= './profilepics/".$rowno['user_image']."' width='50px'/>"; ?></div>
					<div class="navbar">
						<ul>
							<li><a href="homepage.php">Home</a></li>
							<li><a href="edit_post.php">Myposts</a></li>
						</ul>

					</div>
					<div id="logout">
						<a href="logout.php">Logout</a>
					</div>
				</div>
			</div>
			<div id="main">
				<div class="container">
 <?php
			echo "<div id='postcontent'>";
					if($rowno['user_image']){

						echo "<img id='profileimg' src='./profilepics/".$rowno['user_image']."' width='50px' style='border-radius:50%' />";
					}
					echo "<h2>".$rowno['user_name']."</h2>";
					if($rowno['upload_image']){

					echo "<img id='uploadedimg' src='./postimages/".$rowno['upload_image']."' width='200px'/>";
					}
					echo "<h3>Title : ".$rowno['post_title']."</h3>";
					echo "<h5>Posted on : ".$rowno['post_date']."</h5>";
					echo "<hr>";
					echo "<div id='content' >";
					echo "<h4>".$rowno['post_content']."</h4>";
					echo "</div>";
			echo "</div>";
}

?>	
				</div>
			</div>
</body>
</html>

