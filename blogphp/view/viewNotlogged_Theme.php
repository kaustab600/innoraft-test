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
                <?php

                  echo "<div id='postcontent'>";
                    if($rowno[0]['user_image']){

                        echo "<img id='profileimg' src='../profilepics/".$rowno[0]['user_image']."' width='50px' style='border-radius:50%'/>";
                    }
                    echo "<h2>".$rowno[0]['user_name']."</h2>";
                    if($rowno[0]['upload_image']){

                    echo "<img id='uploadedimg' src='../postimages/".$rowno[0]['upload_image']."' width='400px' height='250px'/>";
                    }
                    echo "<h3>".$rowno[0]['post_title']."</h3>";
                    echo "<h5>Posted on : ".$rowno[0]['post_date']."</h5>";
                    echo "<hr>";
                    echo "<div id='content' >";
                    echo "<h4>".$rowno[0]['post_content']."</h4>";
                    echo "</div>";
                  echo "</div>";

                ?>
              </div>
          </div>
</body>
</html>