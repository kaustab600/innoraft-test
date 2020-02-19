<!DOCTYPE html>
<html>
<head>
    <title>Blog Page</title>
    <link rel="stylesheet" type="text/css" href="./styles/styleindex.css?v=1">
</head>
<body>
    <div id="header">
        <div class="container">
            <div id="logo">
                <p>BLOG.</p>
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
            <div id="signin">
                <h2>Login In</h2>
                <form name="frm1" method="post" >
                    <h4>Username</h4>
                    <input type="text" name="username">
                    <h4>Password</h4>
                    <input type="password" name="password">
                    <input type="submit" name="submit" value="SignIn">
                </form>
            </div>
            <div id="wallpaper"><img src="./images/blogimg.jpg"></div>
        </div>
    </div>
    <?php require('signin.php'); 

        if(isset($_GET['msg'])){
            echo "<script>alert('invalid details!');</script>";
        }

    ?>
</body>
</html>