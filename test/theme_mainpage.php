
<!DOCTYPE html>
<html>
<head>
    <title>Main Page</title>
    <link rel="stylesheet" type="text/css" href="./stylehome.css">
    
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
                  foreach($p as $rowno){ 

                    echo "<div class='allposts'>";
                    echo "<div class='title'>";
                    if($rowno['user_image'])
                    {

                        echo "<a href='seeprofiles.php?uid=".$rowno['user_id']."'><img id='profileimg' src='./profilepics/".$rowno['user_image']."' width='50px' style='border-radius:50%' /></a>";
                    }
                    echo "<h2><a id='viewpost' href='viewpostNotlogged.php?pid=".$rowno['post_id']."'>".$rowno['post_title']."</a></h2>";
                    if($rowno['upload_image']){

                    echo "<a id='viewpost' href='viewpostNotlogged.php?pid=".$rowno['post_id']."'><img id='uploadedimg' src='./postimages/".$rowno['upload_image']."' width='250px' style='border-radius:10px'/></a>";
                    }
                    echo "<h3>".$rowno['user_name']."</h3>";
                    echo "</div>";
                    echo "<div class='postbrief'>";
                    echo "<h5>Posted on : ".$rowno['post_date']."</h5>";
                   
                    echo "</div>";
                    echo "</div>";
                }

            
            /*else{

                    echo "<div class='allposts'>";
                    echo "<div class='title'>";
                    echo "<h2>No Posts Are Present Login And Become The first To Add a Blog</h2>";
                    echo "</div>";
                    echo "</div>";

            }*/
        ?>
    </div>
    </div>

</body>
</html>
