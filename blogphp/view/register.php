
<!-----Theme for Registration page-------->
<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
    <link rel="stylesheet" type="text/css" href="../styles/registerpage.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
       
    $(document).ready(function(){

        $('#frm1').submit(function(event){

                event.preventDefault();
                var formData = $('#frm1').serialize();
                console.log(formData);
                $.ajax({
                    url: '../controller/signup.php',
                    method: 'post',
                    data: formData,
                    success: function(){  
                        console.log(formData);
                    },
                }).done(function(result){
                    $('#alert').show();
                    $('#alertshow').html(result);
                })
            });
    });
    </script>
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
                <form name="frm1" id="frm1" method="post" enctype="multipart/form-data">
                    <h4>Profile Pic</h4>
                    <input type="file" name="profilepic">
                    <div id="alert"><h5 id="alertshow"></h5></div>
                    <h4>First Name</h4>
                    <input type="text" name="fname" id="fname" required>
                    <h4>Last Name</h4>
                    <input type="text" name="lname" id="lname" required>
                    <h4>Username</h4>
                    <input type="text" name="username"  required>
                    <h4>Describe user</h4>
                    <input type="text" name="describeuser"  required>
                    <h4>email</h4>
                    <input type="text" name="email" id="mail" required>
                    <h4>password</h4>
                    <input type="password" name="pass" id="pass" required>
                    <h4>confirm password</h4>
                    <input type="password" name="crfmpass" id="crfmpass" required>
                    <select name="country" required>
                        <option selected>please select your country</option>
                        <option value="India">India</option>
                        <option value="USA">USA</option>
                        <option value="UK">UK</option>
                    </select>
                    <h4>Gender</h4>
                    <div id="radiobutton" required>
                    <input type="radio" name="gender" value="male">Male<input type="radio" name="gender" value="female">Female<br>
                    </div>
                    <input type="submit" id="register" name="submit" value="Register">
                </form>
            </div>
            <div id="wallpaper"><img src="../images/blogregister.jpeg"></div>
        </div>
    </div>
    <!-- <script src="../validation.js"></script> -->
</body>
<?php 
    //including controller of register.php
   /* require('../controller/signup.php');*/
?>
</html>