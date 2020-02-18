<?php require('connection.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit Post</title>
	<link rel="stylesheet" type="text/css" href="./styles/editcontent.css?v=2">
</head>
<body>

		<?php 
		session_start();
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
			<div id="profilelogo"><?php echo "<img src= './profilepics/".$rows['user_image']."' width='50px'/>"; ?></div>
			<div class="navbar">
				<ul>
					<li><a href="profile.php"><?php echo $rows['user_name']; } ?></a></li>
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
				if($_GET['pid']){
					$postid = $_GET['pid'];
				}

				$q1 = "select * from posts where post_id = '".$postid ."'";
				$post = mysqli_query($conn,$q1);
				if($post){
						$rowno = mysqli_fetch_assoc($post);
			?>
				
				<div id="editpost">
					<form name="frm1" method="post" enctype="multipart/form-data">
						<h2>Image</h2>
						<input type="file" name="pic" ><br><br>
						<?php 
							if($rowno['upload_image']){
								echo "<img src='./postimages/".$rowno['upload_image']."' width='200px'>";
							}
							
						?>
						
						<h2>Title</h2>
						<input type="text" name="title" value='<?php echo $rowno['post_title'];    ?>'>
						<h3>Content</h3>
						<textarea cols="60" rows="10" name="content" ><?php echo $rowno['post_content'];?></textarea>
						<!--<input type="text" name="content" value='<?php //echo $rowsno['post_content'];    ?>'>-->
						<input type="submit" name="submit" value="save">
					</form>
				</div>
				
			<?php

				}

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

					$q2 = "update posts set post_title = '".$title."' , post_content = '".$content."' , upload_image ='".$img."' where post_id = ".$postid;
					}
					else{

						$q2 = "update posts set post_title = '".$title."' , post_content = '".$content."' where post_id = ".$postid;
					}

					$update_content = mysqli_query($conn,$q2);
					if($update_content){
						echo "sucessfully updated";
					}
					else{
						echo "not updated";
						echo mysqli_error($conn);
					}
				}

		    ?>
		</div>
	</div>
</body>
</html>