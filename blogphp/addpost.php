<?php require('connection.php'); 
    require('./vendor/autoload.php');
    use blogs\blog;
    use blogs\users;
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Post</title>
    <link rel="stylesheet" type="text/css" href="./styles/editcontent.css">
</head>
<body>

        <?php 
        session_start();
        if(!isset($_SESSION['uid'])){
            header('Location:Loginpage.php');
        }
        $userid = $_SESSION['uid'];
        $q = "select * from users where user_id = '".$userid."'";
        $user_details  = $conn->query($q);
        if($user_details){
            $rows = $user_details->fetch_assoc();

            //creating object of user
            $user1 = new users($rows['user_id'],$rows['f_name'],$rows['l_name'],$rows['user_name'],$rows['user_email'],$rows['user_pass'],$rows['describe_user'],$rows['user_country'],$rows['user_gender'],$rows['user_reg_date'],$rows['user_image']);
        ?>
    <div id="header">
        <div class="container">
            <div id="logo">
                <p>BLOGS!</p>
            </div>
            <div id="profilelogo"><a href="profile.php"><?php echo "<img src= './profilepics/".$user1->img."' width='50px'/>"; }?></a></div>
            <div class="navbar">
                <ul>
                    <li><a href="edit_post.php">My Posts</a></li>
                    <li><a href="homepage.php">Home</a></li>
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

                     $blog1 = new blog(0,'now()',$title,$content);

                    

                    $q2 = "insert into  posts(user_id,post_content,upload_image,post_date,post_title) values('".$userid."','".$blog1->post_content."','".$img."',now(),'".$blog1->post_title."')";
                    

                    $update_content = $conn->query($q2);
                    if($update_content){
                        echo "sucessfully updated";
                        header('Location:homepage.php');
                    }
                    else{
                        echo "not updated";
                        echo mysqli_error($conn);
                    }
                }

            ?>
</body>
</html>