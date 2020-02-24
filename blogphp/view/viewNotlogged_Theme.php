<!DOCTYPE html>
<html>
<head>
  <title>View Post</title>
   <link rel="stylesheet" type="text/css" href="../styles/styleview_post.css">
</head>
<body>
  <div id="header">
      <div class="container">
          <div id="logo">
               <p>BLOGS!</p>
          </div>
                    
          <div class="navbar">
              <ul>
                  <li><a href="../controller/index_controller.php">Home</a></li>
              </ul>
          </div>
        </div>
        </div>
          <div id="main">
              <div class="container">
                  <div id='postcontent'>
                  <?php 
                    if($rowno[0]['user_image']){
                  ?>
                      <img id='profileimg' src='../profilepics/<?php echo $rowno[0]['user_image']; ?>' width='50px' style='border-radius:50%'/>
                  <?php
                    }
                  ?>
                    <h2><?php echo $rowno[0]['user_name']; ?></h2>
                  <?php
                    if($rowno[0]['upload_image']){
                  ?>
                    <img id='uploadedimg' src='../postimages/<?php echo $rowno[0]['upload_image']; ?>' width='400px' height='250px'/>
                  <?php
                    }
                  ?>
                    <h3><?php echo $rowno[0]['post_title']; ?></h3>
                    <h5>Posted on :<?php echo $rowno[0]['post_date']; ?></h5>
                    <hr>
                    <div id='content' >
                    <h4><?php echo $rowno[0]['post_content']; ?></h4>
                    </div>
                  </div>
              </div>
          </div>
</body>
</html>