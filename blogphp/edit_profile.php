<?php

require('connection.php');
require('./vendor/autoload.php');
use blogs\users;

        session_start();
        if(!isset($_SESSION['uid'])){
            header('Location:Loginpage.php');
        }
        $userid = $_SESSION['uid'];
        $q = "select * from users where user_id = '".$userid."'";
        $user_details = $conn->query($q);
        if($user_details->num_rows == 1){
            $rows = $user_details->fetch_assoc();

            //creating object of user
            $user1 = new users($rows['user_id'],$rows['f_name'],$rows['l_name'],$rows['user_name'],$rows['user_email'],$rows['user_pass'],$rows['describe_user'],$rows['user_country'],$rows['user_gender'],$rows['user_reg_date'],$rows['user_image']);
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
                <p>BLOGS!</p>
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
                <input type="text" name="username" value='<?php echo $user1->username;    ?>'>
                <h3>First Name: </h3>
                <input type="text" name="fname" value='<?php echo $user1->fname;    ?>'>
                
                <h3>Last Name:</h3>
                <input type="text" name="lname" value='<?php echo $user1->lname;    ?>'> 
                <h3>Status : </h3>
                <input type="text" name="status" value='<?php echo $user1->desc;    ?>'>
                <h3>Country:</h3>
                <input type="text" name="country" value='<?php echo $user1->country;    ?>'>
                <h3>Gender:</h3>
                <input type="text" name="gender" value='<?php echo $user1->gender; }   ?>'>
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
            $update_profile = $conn->query($q);
            if($update_profile){
                echo "sucessfully updated";
            }
            else{
                echo $conn->connect_error;
            }
        }
    ?>
</html>