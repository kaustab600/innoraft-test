<?php require('connection.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Main Page</title>
	<link rel="stylesheet" type="text/css" href="./styles/stylehome.css?v=1">
</head>
<body>

		
	<div id="header">
		<div class="container">
			<div id="logo">
				<p>BLOG.</p>
			</div>
			<div class="navbar">
				<ul>
					<li><a href="Loginpage.php">Sign In</a></li>
					<li><a href="register.php">Sign Up</a></li>
				</ul>

			</div>
		</div>
	</div>
	<div id="main">
		<div class="container">
		<?php
			$q1 = "select p.post_id ,u.user_name,u.user_image,p.post_title, p.post_date,p.upload_image from posts p inner join users u on p.user_id =u.user_id order by p.post_date desc";
			$allposts = mysqli_query($conn,$q1);
			if($allposts){
				while($rowno = mysqli_fetch_assoc($allposts)){

					echo "<div class='allposts'>";
					echo "<div class='title'>";
					if($rowno['user_image'])
					{

						echo "<img id='profileimg' src='./profilepics/".$rowno['user_image']."' width='50px' style='border-radius:50%' />";
					}
					echo "<h2>".$rowno['user_name']."</h2>";
					if($rowno['upload_image']){

					echo "<img id='uploadedimg' src='./postimages/".$rowno['upload_image']."' width='150px'/>";
					}
					echo "<h3>Title : ".$rowno['post_title']."</h3>";
					echo "</div>";
					echo "<div class='postbrief'>";
					echo "<h5>Posted on : ".$rowno['post_date']."</h5>";
					echo "</div>";
					//$_SESSION['pid'] = $rowno['post_id'];
					echo "<a id='viewpost' href='viewpost.php?pid=".$rowno['post_id']."'>View</a>";
					echo "</div>";
				}

			}
		?>
	</div>
	</div>

</body>
</html>