<!----Recent Post Theme--------->
<!DOCTYPE html>
<html>
<head>
    <title>My Posts</title>
    <link rel="stylesheet" type="text/css" href="../styles/stylehome.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="./myscript.js"></script>
</head>
<body>
    <div id="header">
        <div class="container">
            <div id="logo">
                <p>BLOGS!</p>
            </div>
            <div id="userprofile"><a href="profile.php"><?php echo "<img src= '../profilepics/".$rows[0]['user_image']."' width='50px'/>"; ?></a></div>
            <div class="navbar">
                <ul>
                    <li><a href="../controller/addpost.php">Add Post</a></li>
                    <li><a href="../controller/homepage_controller.php">Home</a></li>
                </ul>

            </div>
            <div id="logout">
                <a href="../controller/logout.php">Logout</a>
            </div>
        </div>
    </div>
    <div id="main">
        <div class="container">
            <?php

              if(!empty($blog_details)){

                foreach($blog_details as $rowno){

                    echo "<div class='allposts'>";
                    echo "<div class='title'>";
                    if($rowno['user_image'])
                    {

                        echo "<img id='profileimg' src='../profilepics/".$rowno['user_image']."' width='50px' style='border-radius:50%' />";
                    }
                    echo "<h2>".$rowno['user_name']."</h2>";
                    if($rowno['upload_image']){

                    echo "<img id='uploadedimg' src='../postimages/".$rowno['upload_image']."' width='150px'/>";
                    }
                    echo "<h3>".$rowno['post_title']."</h3>";
                    echo "</div>";
                    echo "<div class='postbrief'>";
                    echo "<h5>Posted on : ".$rowno['post_date']."</h5>";
                    echo "<hr>";
                    echo "<h5>".$rowno['post_content']."</h5>";
                    echo "</div>";
                    echo "</div>";
                }
              }
            else{

                echo "<div class='allposts'>";
                echo "<h4>No Posts Yet!/h4>";
                echo "</div>";
            }
        ?>
        </div>
    </div>
</body>
</html>
