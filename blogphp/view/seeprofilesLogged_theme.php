<!----view profileLogged Theme------>
<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
    <link rel="stylesheet" type="text/css" href="../styles/styleprofile.css?v=2">
</head>
<body>
        <div id="header">
        <div class="container">
            <div id="logo">
                <p>BLOG.</p>
            </div>
            
            <div id="profilelogo"><?php echo "<img src= '../profilepics/".$rows[0]['user_image']."' width='50px'/>"; ?></div>
            <div id="logout">
                <a href="/php%20test/blogphp/index.php/controller/logout.php">Logout</a>
            </div>
            <div class="navbar">
                <ul>
                    <li><a href="/php%20test/blogphp/index.php/homepage_controller">Home</a></li>
                    <li><a href="/php%20test/blogphp/index.php/recentpost.php?authorid=<?php echo $author[0]['user_id']; ?>">Recent Posts</a></li>
                </ul>               
            </div>
        </div>
        </div>
        <div id="main">
            <div id="profiledetails">
              <h2>About The Author </h2><br><br>
                <?php if( empty($author[0]['user_image']))
                        { 
                            echo "No Profile pic";
                        }
                        else{
                            
                            echo "<img src='../profilepics/".$author[0]['user_image']."' width='200px' style='border:1px solid black' /><br>";      
                        }

                 ?>
                
                <h2>Username: <?php echo $author[0]['user_name'];    ?></h2><br>
                <hr>
                <h3>First Name: <?php echo $author[0]['f_name'];    ?></h3>
                <h3>Last Name: <?php echo $author[0]['l_name'];    ?></h3>
                <h3>Status : <?php echo $author[0]['describe_user'];    ?></h3>
                <h3>Country: <?php echo $author[0]['user_country'];    ?></h3>
                <h3>Gender: <?php echo $author[0]['user_gender'];    ?></h3>
                <h3>Joined On: <?php echo $author[0]['user_reg_date'];    ?></h3>
            </div>
        </div>
</body>
</html>
            