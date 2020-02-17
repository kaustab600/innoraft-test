<?php

require('connection.php');

		session_start();
		$userid = $_SESSION['uid'];
		$q = "select * from users where user_id = '".$userid."'";
		$user_details = mysqli_query($conn,$q);
		if(mysqli_num_rows($user_details) == 1){
			$rows = mysqli_fetch_assoc($user_details);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
	<link rel="stylesheet" type="text/css" href="./styles/style_edit_profile.css">
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
					<li><a href="homepage.php">Home</a></li>
				</ul>				
			</div>
		</div>
		</div>
		<div id="main">
			<div id="profiledetails">
				<form name="frm1" method="post" enctype="multipart/form-data">
				<h2>Profile Pic</h2>
				<input type="file" name="profilepic" ><br><br>
				<h2>Username :</h2>
				<input type="text" name="username" value='<?php echo $rows['user_name'];    ?>'>
				<h3>First Name: </h3>
				<input type="text" name="fname" value='<?php echo $rows['f_name'];    ?>'>
				
				<h3>Last Name:</h3>
				<input type="text" name="lname" value='<?php echo $rows['l_name'];    ?>'> 
				<h3>Status : </h3>
				<input type="text" name="status" value='<?php echo $rows['describe_user'];    ?>'>
				<h3>Country:</h3>
				<input type="text" name="country" value='<?php echo $rows['user_country'];    ?>'>
				<h3>Gender:</h3>
				<input type="text" name="gender" value='<?php echo $rows['user_gender']; }   ?>'>
				<input type="submit" name="submit" value="save">
				</form>
			</div>
		</div>
</body>
	<?php
		if(isset($_POST['submit'])){
			  $file_name = $_FILES['profilepic']['name'];
		      $file_size =$_FILES['profilepic']['size'];
		      $file_tmp =$_FILES['profilepic']['tmp_name'];
		      $file_type=$_FILES['profilepic']['type'];
		      if(move_uploaded_file($file_tmp,"profilepics/".$file_name)) {
         		
         		echo "Success";

      			}
      		else{
        			echo "not sucessful";
      		}

      		$username = $_POST['username'];
      		$fname = $_POST['fname'];
      		$lname = $_POST['lname'];
      		$status = $_POST['status'];
      		$country = $_POST['country'];
      		$gender = $_POST['gender'];

      		$q = "update users set f_name = '".$fname."',l_name = '".$lname."',user_name = '".$username."',describe_user = '".$status."',user_country = '".$country."',user_gender = '".$gender."',user_image = '".$file_name."' where user_id =".$_SESSION['uid'];
      		$update_profile = mysqli_query($conn,$q);
      		if($update_profile){
      			echo "sucessfully updated";
      		}
      		else{
      			echo mysqli_error($conn);
      		}
		}
	?>
</html>