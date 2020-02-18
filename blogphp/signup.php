<?php
	
	if(isset($_POST['submit'])){

		$img ="";
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$username = $_POST['username'];
		$status = $_POST['describeuser'];
		$mail = $_POST['email'];
		$pass = $_POST['pass'];
		$crmp = $_POST['crfmpass'];
		$country = $_POST['country'];
		$gen = $_POST['gender'];
		
		$file_name = $_FILES['profilepic']['name'];
		$file_size =$_FILES['profilepic']['size'];
		$file_tmp =$_FILES['profilepic']['tmp_name'];
		$file_type=$_FILES['profilepic']['type'];

		//validation of the user inputs

		if(!preg_match('/^[a-zA-Z]+$/', $fname) or !preg_match('/^[a-zA-Z]+$/', $lname) or !preg_match('/^\w*[-]?\w+@\w+(\.\w{2,3}){1,3}$/',$mail ) ){

			echo "<script>alert('invalid fname or lname or email');</script>";
		}
		elseif($pass!=$crmp){

			echo "<script>alert('password and confirm password doesnot match');</script>";
		}
		else{

			if( move_uploaded_file($file_tmp,"profilepics/".$file_name)){
         		
         		echo "Success";
         		$img = $_FILES['profilepic']['name'];

         	}
         	

      		$q = "insert into users(f_name, l_name, user_name, describe_user, user_pass, user_email, user_country, user_gender, user_image, user_reg_date,posts) values( '".$fname."','".$lname."','".$username."','".$status."','".$pass."','".$mail."','".$country."','".$gen."','".$img."',now(),'no')";

      		$insertuser = mysqli_query($conn,$q);
      		
      		if($insertuser){
      			header('Location:index.php');
      			//echo "sucess";
      		}
      		else{

      			echo mysqli_error($conn);
      		}
		}

	}

?>