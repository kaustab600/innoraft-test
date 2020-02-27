<!-- theme for author profiles------>
<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
    <link rel="stylesheet" type="text/css" href="/php%20test/blogphp/styles/styleprofile.css?v=1">
</head>
<body>
        <div id="header">
        <div class="container">
            <div id="logo">
                <p>BLOG.</p>
            </div>
            
            
            <div class="navbar">
                <ul>
                    <li><a href="index_controller">Home</a></li>
                </ul>               
            </div>
        </div>
        </div>
        <div id="main">
            <div id="profiledetails">
               <h2>About The Author </h2><br><br>
                <?php if( empty($rows[0]['user_image']))
                        { 
                            echo "No Profile pic. please update profile pic";
                        }
                        else{
                            //echo $rows['user_image'];
                            echo "<img src='/php%20test/blogphp/profilepics/".$rows[0]['user_image']."' width='200px' style='border:1px solid black' /><br>";      
                        }

                 ?>

                <h2>Username: <?php echo $rows[0]['user_name'];    ?></h2><br>
                <hr>
                <h3>First Name: <?php echo $rows[0]['f_name'];    ?></h3>
                <h3>Last Name: <?php echo $rows[0]['l_name'];    ?></h3>
                <h3>Status : <?php echo $rows[0]['describe_user'];    ?></h3>
                <h3>Country: <?php echo $rows[0]['user_country'];    ?></h3>
                <h3>Gender: <?php echo $rows[0]['user_gender'];    ?></h3>
                <h3>Joined On: <?php echo $rows[0]['user_reg_date'];    ?></h3>
            </div>
        </div>
</body>
</html>