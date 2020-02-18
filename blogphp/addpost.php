<?php require('connection.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit Post</title>
	<link rel="stylesheet" type="text/css" href="./styles/editcontent.css?v=1">
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
					<li><a href="edit_post.php">My Posts</a></li>
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
			
				<div id="editpost">
					<form name="frm1" method="post" enctype="multipart/form-data">
						<h2>Image</h2>
						<input type="file" name="pic" ><br><br>
						<h2>Title</h2>
						<input type="text" name="title">
						<h3>Content</h3>
						<textarea cols="60" rows="10" name="content" ></textarea>
						<input type="submit" name="submit" value="save">
					</form>
				</div>
		</div>
	</div>
	<?php
		  		if(isset($_POST['submit'])){

					$img ="";
					$file_name = $_FILES['pic']['name'];
		      		
		      		$file_tmp =$_FILES['pic']['tmp_name'];
		     		
					if(move_uploaded_file($file_tmp,"postimages/".$file_name)){

						$img = $_FILES['pic']['name'];
					}
					
					$title = $_POST['title'];
					$content = $_POST['content'];

					if($img!=""){

					$q2 = "insert into  posts(user_id,post_content,upload_image,post_date,post_title) values('".$userid."','".$content."','".$img."',now(),'".$title."')";
					}
					else{

						$q2 = "insert into  posts(user_id,post_content,post_date,post_title) values('".$userid."','".$content."',now(),'".$title."')";
					}

					$update_content = mysqli_query($conn,$q2);
					if($update_content){
						echo "sucessfully updated";
						header('Location:homepage.php');
					}
					else{
						echo "not updated";
						echo mysqli_error($conn);
					}
				}

		    ?>
</body>
</html>