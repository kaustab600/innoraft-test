<?php require('connection.php'); 
      require('./vendor/autoload.php');
      use blogs\blog ;
?>
<!DOCTYPE html>
<html>
<head>
    <title>Main Page</title>
    <link rel="stylesheet" type="text/css" href="./styles/stylehome.css?v=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="./myscript.js"></script>
</head>
<body>

        
    <div id="header">
        <div class="container">
            <div id="logo">
                <p>BLOGS!</p>
            </div>
            <div class="navbar">
                <ul>
                    <li><a href="Loginpage.php">Sign In</a></li>
                    <li><a href="register.php">Sign Up</a></li>
                </ul>

            </div>
        </div>
    </div>
    <div id="main">
        <div class="container">
        <?php
            $q1 = "select u.user_id,p.post_id ,u.user_name,u.user_image,p.post_title, p.post_date,p.post_content,p.upload_image from posts p inner join users u on p.user_id =u.user_id order by p.post_date desc";

            $allposts = $conn->query($q1);
            if($allposts){
                while($rowno = $allposts->fetch_assoc()){

                    //calling blog constructor
                    $blog1 = new blog($rowno['post_id'],$rowno['post_date'],$rowno['post_title'],$rowno['post_content']);

                    echo "<div class='allposts'>";
                    echo "<div class='title'>";
                    if($rowno['user_image'])
                    {

                        echo "<a href='seeprofiles.php?uid=".$rowno['user_id']."'><img id='profileimg' src='./profilepics/".$rowno['user_image']."' width='50px' style='border-radius:50%' /></a>";
                    }
                    echo "<h2><a id='viewpost' href='viewpostNotlogged.php?pid=".$blog1->pid."'>".$blog1->post_title."</a></h2>";
                    if($rowno['upload_image']){

                    echo "<img id='uploadedimg' src='./postimages/".$rowno['upload_image']."' width='150px' style='border-radius:10px'/>";
                    }
                    echo "<h3>".$rowno['user_name']."</h3>";
                    echo "</div>";
                    echo "<div class='postbrief'>";
                    echo "<h5>Posted on : ".$blog1->post_date."</h5>";
                   
                    echo "</div>";
                    echo "</div>";
                }

            }
            else{

                    echo "<div class='allposts'>";
                    echo "<div class='title'>";
                    echo "<h2>No Posts Are Present Login And Become The first To Add a Blog</h2>";
                    echo "</div>";
                    echo "</div>";

            }
        ?>
    </div>
    </div>

</body>
</html>
