
<!DOCTYPE html>
<html>
<head>
    <title>My Posts</title>
    <link rel="stylesheet" type="text/css" href="../styles/stylehome.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- <script src="../myscript.js"></script>  -->
</head>
<body>
    <div id="header">
        <div class="container">
            <div id="logo">
                <p>BLOGS!</p>
            </div>
            <div id="userprofile"><a href="/php%20test/blogphp/index.php/profile"><?php echo "<img src= '../profilepics/".$u[0]['user_image']."' width='50px'/>"; ?></a></div>
            <div class="navbar">
                <ul>
                    <li><a href="/php%20test/blogphp/index.php/addpost">Add Post</a></li>
                    <li><a href="/php%20test/blogphp/index.php/homepage_controller">Home</a></li>
                </ul>

            </div>
            <div id="logout">
                <a href="/php%20test/blogphp/index.php/controller/logout.php">Logout</a>
            </div>
        </div>
    </div>

    <div id="main">
        <div class="container">
            <?php
            if(!empty($rows)){
                foreach($rows as $rowno){
            ?>
                    <div class='allposts'>
                    <div class='title'>
            <?php        
                    if($rowno['upload_image']){
                ?>
                     <img id='uploadedimg' src='../postimages/<?php echo $rowno['upload_image']; ?>' width='250px'/>
                <?php
                    }
                ?>
                    <h3><?php echo $rowno['post_title']; ?></h3>
                    </div>
                    <div class='postbrief'>
                    <h5>Posted on :<?php echo $rowno['post_date'];?></h5>
                    <hr>
                    <h5><?php echo $rowno['post_content'];?></h5>
                    </div>
                    <a id='viewpost' href='/php%20test/blogphp/index.php/edit?pid=<?php echo $rowno['post_id']; ?>'>Edit</a>
                <?php
                    echo "<a id='viewpost' onClick=\"javascript: return confirm('Please confirm deletion');\" href='/php%20test/blogphp/index.php/deletepost?pid=".$rowno['post_id']."'>Delete</a>";
                ?>
                    </div>
                <?php
                }

            }
            else{
            ?>
                 <div class='allposts'>
                 <h4>No Posts Yet! You can Add Posts from Addpost section at navbar</h4>
                 </div>
        <?php 
            }
        ?>
        </div>
    </div>
</body>
</html>
