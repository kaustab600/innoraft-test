
<!DOCTYPE html>
<html>
<head>
    <title>Edit Post</title>
    <link rel="stylesheet" type="text/css" href="/php%20test/blogphp/styles/editcontent.css?v=2">
       <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
</head>
<body>
  
    <div id="header">
        <div class="container">
            <div id="logo">
                <p>BLOG.</p>
            </div>
            <div id="profilelogo"><?php echo "<img src= '/php%20test/blogphp/profilepics/".$u[0]['user_image']."' width='50px'/>"; ?></div>
            <div class="navbar">
                <ul>
                    <li><a href="profile.php"><?php echo $u[0]['user_name'];  ?></a></li>
                    <li><a href="homepage_controller">Home</a></li>
                </ul>

            </div>
            <div id="logout">
                <a href="logout.php">Logout</a>
            </div>
        </div>
    </div>

    <div id="main">
        <div class="container">
            
                
                <div id="editpost">
                    <form name="frm1" method="post" enctype="multipart/form-data">
                        <h2>Image</h2>
                        <input type="file" name="pic" ><br><br>
                        <?php 
                            if($rows[0]['upload_image']){
                                echo "<img src='/php%20test/blogphp/postimages/".$rows[0]['upload_image']."' width='200px'>";
                            }
                            
                        ?>
                        
                        <h2>Title</h2>
                        <input type="text" name="title" value='<?php echo $rows[0]['post_title'];    ?>'>
                        <h3>Content</h3>
                        <textarea cols="60" rows="10" name="content" ><?php echo $rows[0]['post_content'];?></textarea>
                        <script>
                                CKEDITOR.replace( 'content' );
                        </script>
                        <!--<input type="text" name="content" value='<?php //echo $rowsno['post_content'];    ?>'>-->
                        <input type="submit" name="submit" value="save">
                    </form>
                </div>
                
            <?php
                 if(isset($_POST['submit'])){

                     $file_name = $_FILES['pic']['name'];
                    
                     $file_tmp =$_FILES['pic']['tmp_name'];

                    $title = $_POST['title'];
                    $content = $_POST['content'];

                    $blog1->editPosts($file_name,$file_tmp,$title,$content,$file_name);

                 }

            ?>
        </div>
    </div>
</body>
</html>