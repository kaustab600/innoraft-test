<!DOCTYPE html>
        <html>
        <head>
            <title>View Post</title>
            <link rel="stylesheet" type="text/css" href="../styles/styleview_post.css?v=2">
        </head>
        <body>
              
        <div id="header">
                <div class="container">
                    <div id="logo">
                        <p>BLOGS!</p>
                    </div>
                    <div id="profilelogo"><a href="../controller/profile.php"><?php echo "<img src= '../profilepics/".$u[0]['user_image']."' width='50px'/>"; ?></a></div>
                    <div class="navbar">
                        <ul>
                            <li><a href="../controller/homepage_controller.php">Home</a></li>
                            <li><a href="../controller/edit_post.php">Myposts</a></li>
                        </ul>

                    </div>
                    <div id="logout">
                        <a href="../controller/logout.php">Logout</a>
                    </div>
                </div>
            </div>
       
            
            <div id="main">
                <div class="container">
 
                    <div id='postcontent'>
                <?php
                foreach($rows as $rowno){
                    if($rowno['user_image']){
                  ?>
                      <img id='profileimg' src='../profilepics/<?php echo $rowno['user_image']; ?>' width='50px' style='border-radius:50%' />
                    <?php
                    }
                    ?>
                     <h2><?php echo $rowno['user_name']; ?></h2>
                    <?php
                    if($rowno['upload_image']){
                      ?>
                    <img id='uploadedimg' src='../postimages/<?php echo $rowno['upload_image']; ?>' width='400px' height='250px'/>
                    <?php
                    }
                    ?>
                     <h3><?php echo $rowno['post_title']; ?></h3>
                     <h5>Posted on : <?php echo $rowno['post_date']; ?></h5>
                     <hr>
                     <div id='content' >
                     <h4><?php echo $rowno['post_content']; ?></h4>
                    </div>
              <?php
                } 
              ?>         
                    </div> 
                </div>
            </div>
</body>
</html>

