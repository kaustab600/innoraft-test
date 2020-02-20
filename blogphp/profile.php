<?php

require('connection.php');

require('./vendor/autoload.php');
use blogs\users;

        session_start();
        $userid = $_SESSION['uid'];
        if(!isset($_SESSION['uid'])){
            header('Location:Loginpage.php');
        }
        $q = "select * from users where user_id = '".$userid."'";
        $user_details = $conn->query($q);
        if($user_details->num_rows == 1){
            $rows = $user_details->fetch_assoc();

            //creating object of users
            $user1 = new users($rows['user_id'],$rows['f_name'],$rows['l_name'],$rows['user_name'],$rows['user_email'],$rows['user_pass'],$rows['describe_user'],$rows['user_country'],$rows['user_gender'],$rows['user_reg_date'],$rows['user_image']);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
    <link rel="stylesheet" type="text/css" href="./styles/styleprofile.css">
</head>
<body>
        <div id="header">
        <div class="container">
            <div id="logo">
                <p>BLOG.</p>
            </div>
        
            <div class="navbar">
                <ul>
                    <li><a href="edit_profile.php">Edit Profile</a></li>
                    <li><a href="homepage.php">Home</a></li>
                </ul>               
            </div>
            <div id="logout">
                <a href="logout.php">Logout</a>
            </div>
        </div>
        </div>
        <div id="main">
            <div id="profiledetails">
                <?php if( empty($user1->img))
                        { 
                            echo "No Profile pic. please update profile pic";
                        }
                        else{
                            //echo $rows['user_image'];
                            echo "<img src='profilepics/".$user1->img."' width='200px' style='border:1px solid black' />";      
                        }

                 ?>
                <h2>Welcome <?php echo $user1->username;    ?></h2><br>
                <hr>
                <h3>First Name: <?php echo $user1->fname;    ?></h3>
                <h3>Last Name: <?php echo $user1->lname;    ?></h3>
                <h3>Status : <?php echo $user1->desc;    ?></h3>
                <h3>Country: <?php echo $user1->country;    ?></h3>
                <h3>Gender: <?php echo $user1->gender;    ?></h3>
                <h3>Joined On: <?php echo $user1->regdate; }   ?></h3>
            </div>
        </div>
</body>
</html>
            