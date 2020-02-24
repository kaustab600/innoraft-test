
<!-----Theme for Registration page-------->
<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
    <link rel="stylesheet" type="text/css" href="../styles/registerpage.css">
</head>
<body>
    <div id="header">
        <div class="container">
            <div id="logo">
                <p>BLOGS!</p>
            </div>
            <div id="sigup">
                <a href="Loginpage.php">Sign In</a>
            </div>
            <div id="sigup">
                <a href="../controller/index_controller.php">Home</a>
            </div>
        </div>
    </div>
    <div id="main">
        <div class="container">
            <div id="signin">
                <h2>Create your Account To Explore the World of Blogs</h2>
                <form name="frm1" method="post" enctype="multipart/form-data">
                    <h4>Profile Pic</h4>
                    <input type="file" name="profilepic">
                    <h4>First Name</h4>
                    <input type="text" name="fname" required>
                    <h4>Last Name</h4>
                    <input type="text" name="lname" required>
                    <h4>Username</h4>
                    <input type="text" name="username" required>
                    <h4>Describe user</h4>
                    <input type="text" name="describeuser" required>
                    <h4>email</h4>
                    <input type="text" name="email" required>
                    <h4>password</h4>
                    <input type="password" name="pass" required>
                    <h4>confirm password</h4>
                    <input type="password" name="crfmpass" required>
                    <select name="country">
                        <option selected>please select your country</option>
                        <option value="India">India</option>
                        <option value="USA">USA</option>
                        <option value="UK">UK</option>
                    </select>
                    <h4>Gender</h4>
                    <div id="radiobutton" required>
                    <input type="radio" name="gender" value="male">Male<input type="radio" name="gender" value="female">Female<br>
                    </div>
                    <input type="submit" name="submit" value="Register">
                </form>
            </div>
            <div id="wallpaper"><img src="../images/blogregister.jpeg"></div>
        </div>
    </div>
</body>
<?php 
    //including controller of register.php
    require('../controller/signup.php');
?>
</html>