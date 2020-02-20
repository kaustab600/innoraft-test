<!DOCTYPE html>
<html>
<head>
    <title>Blog Page</title>
    <link rel="stylesheet" type="text/css" href="./styles/styleindex.css">
</head>
<body>
    <div id="header">
        <div class="container">
            <div id="logo">
                <p>BLOGS!</p>
            </div>
            <div id="sigup">
                <a href="register.php">Sign Up</a>
            </div>
            <div id="sigup">
                <a href="index.php">Home</a>
            </div>
        </div>
    </div>
    <div id="main">
        <div class="container">
            <div id="signin1">
                
                <form name="frm1" id="signin" method="post" >
                    <h2>Login In</h2>
                    <label for="username">Username</label>
                    <input type="text" name="username">
                    <br><label for="password">Password</label>
                    <input type="password" name="password">
                    <br><input type="submit" name="submit" value="SignIn">
                </form>
            </div>
            <!-- <div id="wallpaper"><img src="./images/blogimg.jpg"></div> -->
        </div>
    </div>
    <?php require('signin.php'); 

        if(isset($_GET['msg'])){
            echo "<script>alert('invalid details!');</script>";
        }

    ?>
</body>
</html>