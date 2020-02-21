
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
                    <li><a href="homepage_controller.php">Home</a></li>
                </ul>               
            </div>
            <div id="logout">
                <a href="logout.php">Logout</a>
            </div>
        </div>
        </div>
        <div id="main">
            <div id="profiledetails">
                <?php 

                if( empty($u[0]['user_image']))
                        { 
                            echo "No Profile pic. please update profile pic";
                        }
                else{
                        //echo $rows['user_image'];
                        echo "<img src='profilepics/".$u[0]['user_image']."' width='200px' style='border:1px solid black' />";      
                    }

                 ?>
                <h2>Welcome <?php echo $u[0]['user_name'];    ?></h2><br>
                <hr>
                <h3>First Name: <?php echo $u[0]['f_name'];    ?></h3>
                <h3>Last Name: <?php echo $u[0]['l_name'];    ?></h3>
                <h3>Status : <?php echo $u[0]['describe_user'];    ?></h3>
                <h3>Country: <?php echo $u[0]['user_country'];    ?></h3>
                <h3>Gender: <?php echo $u[0]['user_gender'];    ?></h3>
                <h3>Joined On: <?php echo $u[0]['user_reg_date'];    ?></h3>
            </div>
        </div>
</body>
</html>