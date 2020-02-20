<?php

require('connection.php');
require('./vendor/autoload.php');
use blogs\blog;

if(isset($_GET['pid'])){
    $postid = $_GET['pid'];
}
elseif(!isset($_GET['pid'])){
    header('Location:Loginpage.php');
}

$q1 = "select u.user_name , u.user_image, p.post_title , p.post_id, p.post_date , p.upload_image ,p.post_content from posts p inner join users u on p.user_id =u.user_id where p.post_id =".$postid;
$contents = $conn->query($q1);

if($contents)
{
    $rowno = $contents->fetch_assoc();

    //calling blog constructor
    $blog1 = new blog($rowno['post_id'],$rowno['post_date'],$rowno['post_title'],$rowno['post_content']);
 ?>
        <!DOCTYPE html>
        <html>
        <head>
            <title>View Post</title>
            <link rel="stylesheet" type="text/css" href="./styles/styleview_post.css">
        </head>
        <body>
        <div id="header">
                <div class="container">
                    <div id="logo">
                        <p>BLOGS!</p>
                    </div>
                    
                    <div class="navbar">
                        <ul>
                            <li><a href="index.php">Home</a></li>
                        </ul>

                    </div>
                    
                </div>
            </div>
            <div id="main">
                <div class="container">
 <?php
            echo "<div id='postcontent'>";
                    if($rowno['user_image']){

                        echo "<img id='profileimg' src='./profilepics/".$rowno['user_image']."' width='50px' style='border-radius:50%' />";
                    }
                    echo "<h2>".$rowno['user_name']."</h2>";
                    if($rowno['upload_image']){

                    echo "<img id='uploadedimg' src='./postimages/".$rowno['upload_image']."' width='400px' height='250px'/>";
                    }
                    echo "<h3>".$blog1->post_title."</h3>";
                    echo "<h5>Posted on : ".$blog1->post_date."</h5>";
                    echo "<hr>";
                    echo "<div id='content' >";
                    echo "<h4>".$blog1->post_content."</h4>";
                    echo "</div>";
            echo "</div>";
}

?>  
                </div>
            </div>
</body>
</html>

