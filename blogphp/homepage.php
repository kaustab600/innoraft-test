
<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="./styles/stylehome.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="./myscript.js"></script>
</head>
<body>
   
    <div id="header">
        <div class="container">
            <div id="logo">
                <p>BLOGS.</p>
            </div>
            <div id="userprofile"><a href="profile.php"><?php echo "<img src= './profilepics/".$p[0]['user_image']."' width='50px'/>"; ?></a></div>
            <div class="navbar">
                <ul>
                    <li><a href="addpost.php">Add Post</a></li>
                    <li><a href="edit_post.php">Myposts</a></li>
                   
                </ul>

            </div>
            <div id="logout">
                <a href="logout.php">Logout</a>
            </div>
        </div>
    </div>
    <div id="main">
        <div class="container">
        <?php
            
            if($rows){
                foreach($rows as $rowno){

                    echo "<div class='allposts'>";
                    echo "<div class='title'>";
                    if($rowno['user_image'])
                    {

                        echo "<a href='seeprofileLogged.php?uid=".$rowno['user_id']."'><img id='profileimg' src='./profilepics/".$rowno['user_image']."' width='50px' style='border-radius:50%' /></a>";
                    }
                    echo "<h2><a id='viewpost' href='viewpost.php?pid=".$rowno['post_id']."'>".$rowno['post_title']."</a></h2>";
                    if($rowno['upload_image']){

                    echo "<a id='viewpost' href='viewpost.php?pid=".$rowno['post_id']."'><img id='uploadedimg' src='./postimages/".$rowno['upload_image']."' width='200px' height='150px' style='border-radius:10px'/></a>";
                    }
                    echo "<h3>".$rowno['user_name']."</h3>";
                    echo "</div>";
                    echo "<div class='postbrief'>";
                    echo "<h5>Posted on : ".$rowno['post_date']."</h5>";
                    echo "</div>";
                    //$_SESSION['pid'] = $rowno['post_id'];
                    
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