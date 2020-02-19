<?php
    require ('connection.php');
    include('./users/users.php');

    if(isset($_GET['uid'])){

        $userid = $_GET['uid'];
        $q = "select * from users where user_id =".$userid;
        $res = $conn->query($q);
        if($res){
            $rows = $res->fetch_assoc();
            
            //creating object of users
            $user1 = new users($rows['user_id'],$rows['f_name'],$rows['l_name'],$rows['user_name'],$rows['user_email'],$rows['user_pass'],$rows['describe_user'],$rows['user_country'],$rows['user_gender'],$rows['user_reg_date'],$rows['user_image']);
        }

    }
    elseif(!isset($_GET['uid'])){
        header('Location:index.php');
    }


?>

<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
    <link rel="stylesheet" type="text/css" href="./styles/styleprofile.css?v=1">
</head>
<body>
        <div id="header">
        <div class="container">
            <div id="logo">
                <p>BLOG.</p>
            </div>
            
            
            <div class="navbar">
                <ul>
                    <li><a href="index.php">Home</a></li>
                </ul>               
            </div>
        </div>
        </div>
        <div id="main">
            <div id="profiledetails">
               <h2>About The Author </h2><br><br>
                <?php if( empty($user1->img))
                        { 
                            echo "No Profile pic. please update profile pic";
                        }
                        else{
                            //echo $rows['user_image'];
                            echo "<img src='profilepics/".$user1->img."' width='200px' style='border:1px solid black' /><br>";      
                        }

                 ?>

                <h2>Username: <?php echo $user1->username;    ?></h2><br>
                <hr>
                <h3>First Name: <?php echo $user1->fname;    ?></h3>
                <h3>Last Name: <?php echo $user1->lname;    ?></h3>
                <h3>Status : <?php echo $user1->desc;    ?></h3>
                <h3>Country: <?php echo $user1->country;    ?></h3>
                <h3>Gender: <?php echo $user1->gender;    ?></h3>
                <h3>Joined On: <?php echo $user1->regdate;    ?></h3>
            </div>
        </div>
</body>
</html>