
<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
    <link rel="stylesheet" type="text/css" href="/php%20test/blogphp/styles/style_edit_profile.css">
</head>
<body>
   
        <div id="header">
        <div class="container">
            <div id="logo">
                <p>BLOGS!</p>
            </div>
            
            <div id="logout">
                <a href="/php%20test/blogphp/index.php/logout.php">Logout</a>
            </div>
            <div class="navbar">
                <ul>
                    <li><a href="/php%20test/blogphp/index.php/homepage_controller">Home</a></li>
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
                <input type="text" name="username" value='<?php echo $u[0]['user_name'];    ?>'>
                <h3>First Name: </h3>
                <input type="text" name="fname" value='<?php echo $u[0]['f_name'];    ?>'>
                
                <h3>Last Name:</h3>
                <input type="text" name="lname" value='<?php echo $u[0]['l_name'];    ?>'> 
                <h3>Status : </h3>
                <input type="text" name="status" value='<?php echo $u[0]['describe_user'];    ?>'>
                <h3>Country:</h3>
                <input type="text" name="country" value='<?php echo $u[0]['user_country'];    ?>'>
                <h3>Gender:</h3>
                <input type="text" name="gender" value='<?php echo $u[0]['user_gender'];   ?>'>
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
            
            if(move_uploaded_file($file_tmp,"./profilepics/".$file_name)) {
                
                echo "Success";
                //header('location:/php%20test/blogphp/index.php/logout.php');
            }
            else{   
                    echo " <script> alert('not sucessful');</script>";
                    $file_name = $u[0]['user_image'];
            }

            $username = $_POST['username'];
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $status = $_POST['status'];
            $country = $_POST['country'];
            $gender = $_POST['gender'];

            $user1->updateProfile($fname,$lname,$username,$status,$country,$gender,$file_name,$_SESSION['uid']);

        }
    ?>
</html>