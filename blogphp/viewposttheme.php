<!DOCTYPE html>
        <html>
        <head>
            <title>View Post</title>
            <link rel="stylesheet" type="text/css" href="./styles/styleview_post.css?v=2">
        </head>
        <body>
            
        <div id="header">
                <div class="container">
                    <div id="logo">
                        <p>BLOGS!</p>
                    </div>
                    <div id="profilelogo"><a href="profile.php"><?php echo "<img src= './profilepics/".$u[0]['user_image']."' width='50px'/>"; ?></a></div>
                    <div class="navbar">
                        <ul>
                            <li><a href="homepage_controller.php">Home</a></li>
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
   echo "<div id='postcontent'>";
    foreach($rows as $rowno){
                    if($rowno['user_image']){

                        echo "<img id='profileimg' src='./profilepics/".$rowno['user_image']."' width='50px' style='border-radius:50%' />";
                    }
                    echo "<h2>".$rowno['user_name']."</h2>";
                    if($rowno['upload_image']){

                    echo "<img id='uploadedimg' src='./postimages/".$rowno['upload_image']."' width='400px' height='250px'/>";
                    }
                    echo "<h3>".$rowno['post_title']."</h3>";
                    echo "<h5>Posted on : ".$rowno['post_date']."</h5>";
                    echo "<hr>";
                    echo "<div id='content' >";
                    echo "<h4>".$rowno['post_content']."</h4>";
                    echo "</div>";
                }          
     echo "</div>";         
?>  
                </div>
            </div>
</body>
</html>

