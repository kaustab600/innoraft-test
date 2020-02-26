
<!DOCTYPE html>
<html>
<head>
    <title>Main Page</title>
    <link rel="stylesheet" type="text/css" href="/php%20test/blogphp/styles/stylehome.css?v=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="/php%20test/blogphp/myscript.js"></script>
</head>
<body>

        
    <div id="header">
        <div class="container">
            <div id="logo">
                <p>BLOGS!</p>
            </div>
            <div class="navbar">
                <ul>
                    <li><a href="/php%20test/blogphp/index.php/index.php/view/Loginpage">Sign In</a></li>
                    <li><a href="/php%20test/blogphp/index.php/index/view/register">Sign Up</a></li>
                </ul>

            </div>
        </div>
    </div>
    <div id="main">
        <div class="container">
        <?php
              if(!empty($p)){
                  foreach($p as $rowno){
        ?>
                   <div class='allposts'>
                   <div class='title'>
                    <?php 
                    if($rowno['user_image'])
                    {

                    ?>
                        <a href='/php%20test/blogphp/index.php/controller/seeprofiles.php?uid=<?php echo $rowno['user_id']; ?>'><img id='profileimg' src='/php%20test/blogphp/profilepics/<?php echo $rowno['user_image'];?>' width='50px' style='border-radius:50%' /></a>
                    <?php 

                    }

                    ?>

                    <h2><a id='viewpost' href='/php%20test/blogphp/index.php/controller/viewpostNotlogged.php?pid=<?php echo $rowno['post_id'];?>'><?php echo $rowno['post_title'];?></a></h2>

                    <?php
                    if($rowno['upload_image']){

                    ?>
                    <a id='viewpost' href='/php%20test/blogphp/index.php/controller/viewpostNotlogged.php?pid=<?php echo $rowno['post_id'];?>'><img id='uploadedimg' src='/php%20test/blogphp/postimages/<?php echo $rowno['upload_image'];?>' width='250px' style='border-radius:10px'/></a>
                    <?php
                    }
                    ?>
                    <h3><?php echo $rowno['user_name']; ?></h3>
                    </div>
                    <div class='postbrief'>
                    <h5>Posted on : <?php echo $rowno['post_date']; ?></h5>
                   
                    </div>
                    </div>
        <?php
                }

            }
            else{
        ?>
                    <div class='allposts'>
                    <div class='title'>
                    <h2>No Posts Are Present Login And Become The first To Add a Blog</h2>
                    </div>
                    </div>
        <?php

            }
        ?>
    </div>
    </div>

</body>
</html>
