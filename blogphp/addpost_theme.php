
<!DOCTYPE html>
<html>
<head>
    <title>Edit Post</title>
    <link rel="stylesheet" type="text/css" href="./styles/editcontent.css">
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
                    <li><a href="edit_post.php">My Posts</a></li>
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
            
                <div id="editpost">
                    <form name="frm1" method="post" enctype="multipart/form-data">
                        <h2>Image</h2>
                        <input type="file" name="pic" ><br><br>
                        <h2>Title</h2>
                        <input type="text" name="title">
                        <h3>Content</h3>
                        <textarea cols="60" rows="10" name="content" ></textarea>
                        <input type="submit" name="submit" value="save">
                    </form>
                </div>
        </div>
    </div>
    <?php
                if(isset($_POST['submit'])){

                    $img = "";
                    $file_name = $_FILES['pic']['name'];
                    
                    $file_tmp =$_FILES['pic']['tmp_name'];
                    
                    if(move_uploaded_file($file_tmp,"postimages/".$file_name)){

                        $img = $_FILES['pic']['name'];
                    }
                    
                    $title = $_POST['title'];
                    $content = $_POST['content'];

                    $blog1->addPosts($_SESSION['uid'],$title,$content,$file_name);

                }

            ?>
</body>
</html>