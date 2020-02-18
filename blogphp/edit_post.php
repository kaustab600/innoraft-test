<?php require('connection.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>My Posts</title>
	<link rel="stylesheet" type="text/css" href="./styles/stylehome.css">
</head>
<body>

		<?php 
		session_start();
		if(!isset($_SESSION['uid'])){
			header('Location:Loginpage.php');
		}
		$userid = $_SESSION['uid'];
		$q = "select * from users where user_id = '".$userid."'";
		$user_details  = mysqli_query($conn,$q);
		if($user_details){
			$rows = mysqli_fetch_assoc($user_details);
		?>
	<div id="header">
		<div class="container">
			<div id="logo">
				<p>BLOG.</p>
			</div>
			<div id="profilelogo"><?php echo "<img src= './profilepics/".$rows['user_image']."' width='50px'/>"; }?></div>
			<div class="navbar">
				<ul>
					<li><a href="addpost.php">Add Post</a></li>
					<li><a href="homepage.php">Home</a></li>
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
			$q1 = "select p.post_id,u.user_name,u.user_image,p.post_content,p.upload_image,p.post_date,p.post_title from posts p inner join users u on p.user_id = u.user_id where p.user_id = '".$userid."' order by post_date desc";
			$allposts = mysqli_query($conn,$q1);
			if( mysqli_num_rows($allposts)){
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
					echo "<hr>";
					echo "<h5>".$rowno['post_content']."</h5>";
					echo "</div>";
					//$_SESSION['pid'] = $rowno['post_id'];
					echo "<a id='viewpost' href='edit.php?pid=".$rowno['post_id']."'>Edit</a>";
					//echo "<a id='viewpost' href='delete.php?pid=".$rowno['post_id']."'>delete</a>";
					echo "<a id='viewpost' onClick=\"javascript: return confirm('Please confirm deletion');\" href='deletepost.php?pid=".$rowno['post_id']."'>Delete</a>";
					echo "</div>";
				}

			}
			else{

				echo "<div class='allposts'>";
				echo "<h4>No Posts Yet! You can Add Posts from Addpost section at navbar</h4>";
				echo "</div>";
			}
		?>
		</div>
	</div>
</body>
</html>
