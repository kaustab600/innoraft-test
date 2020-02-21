
<!DOCTYPE html>
<html>
<head>
    <title>My Posts</title>
    <link rel="stylesheet" type="text/css" href="./styles/stylehome.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="./myscript.js"></script>
</head>
<body>
    <div id="header">
        <div class="container">
            <div id="logo">
                <p>BLOGS!</p>
            </div>
            <div id="userprofile"><a href="profile.php"><?php echo "<img src= './profilepics/".$u[0]['user_image']."' width='50px'/>"; ?></a></div>
            <div class="navbar">
                <ul>
                    <li><a href="addpost.php">Add Post</a></li>
                    <li><a href="homepage_controller.php">Home</a></li>
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
            if(!empty($rows)){
                foreach($rows as $rowno){

                    //calling blog constructor
                    $blog1 = new blog($rowno['post_id'],$rowno['post_date'],$rowno['post_title'],$rowno['post_content']);

                    echo "<div class='allposts'>";
                    echo "<div class='title'>";
                    
                    if($rowno['upload_image']){

                    echo "<img id='uploadedimg' src='./postimages/".$rowno['upload_image']."' width='250px'/>";
                    }
                    echo "<h3>".$rowno['post_title']."</h3>";
                    echo "</div>";
                    echo "<div class='postbrief'>";
                    echo "<h5>Posted on : ".$rowno['post_date']."</h5>";
                    echo "<hr>";
                    echo "<h5>".$rowno['post_content']."</h5>";
                    echo "</div>";
                    //$_SESSION['pid'] = $rowno['post_id'];
                    echo "<a id='viewpost' href='edit.php?pid=".$rowno['post_id']."'>Edit</a>";
                    //echo "<a id='viewpost' href='delete.php?pid=".$rowno['post_id']."'>delete</a>";
                    echo "<a id='viewpost' onClick=\"javascript: return confirm('Please confirm deletion');\" href='deletepost.php?pid=".$rowno['post_id']."'>Delete</a>";
                    echo "</div>";
                }

            }
            else{

                echo "<div class='allposts'>";
                echo "<h4>No Posts Yet! You can Add Posts from Addpost section at navbar</h4>";
                echo "</div>";
            }
        ?>
        </div>
    </div>
</body>
</html>
