<?php require('connection.php');
        include('./users/users.php');
        include('./blog/blog.php');

 ?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Post</title>
    <link rel="stylesheet" type="text/css" href="./styles/editcontent.css?v=2">
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
                <p>BLOG.</p>
            </div>
            <div id="profilelogo"><?php echo "<img src= './profilepics/".$user1->img."' width='50px'/>"; ?></div>
            <div class="navbar">
                <ul>
                    <li><a href="profile.php"><?php echo $user1->username; } ?></a></li>
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
            <?php 
                if(isset($_GET['pid'])){
                    $postid = $_GET['pid'];
                }

                $q1 = "select * from posts where post_id = '".$postid ."'";
                $post = $conn->query($q1);
                if($post){
                        $rowno = $post->fetch_assoc();

                        //calling blog constructor
                    $blog1 = new blog($rowno['post_id'],$rowno['post_date'],$rowno['post_title'],$rowno['post_content']);
            ?>
                
                <div id="editpost">
                    <form name="frm1" method="post" enctype="multipart/form-data">
                        <h2>Image</h2>
                        <input type="file" name="pic" ><br><br>
                        <?php 
                            if($rowno['upload_image']){
                                echo "<img src='./postimages/".$rowno['upload_image']."' width='200px'>";
                            }
                            
                        ?>
                        
                        <h2>Title</h2>
                        <input type="text" name="title" value='<?php echo $blog1->post_title;    ?>'>
                        <h3>Content</h3>
                        <textarea cols="60" rows="10" name="content" ><?php echo $blog1->post_content;?></textarea>
                        <!--<input type="text" name="content" value='<?php //echo $rowsno['post_content'];    ?>'>-->
                        <input type="submit" name="submit" value="save">
                    </form>
                </div>
                
            <?php

                }

                if(isset($_POST['submit'])){

                    $img ="";
                    $file_name = $_FILES['pic']['name'];
                    
                    $file_tmp =$_FILES['pic']['tmp_name'];
                    
                    if(move_uploaded_file($file_tmp,"postimages/".$file_name)){

                        $img = $_FILES['pic']['name'];
                    }
                    
                    $title = $_POST['title'];
                    $content = $_POST['content'];

                    if($img!=""){

                    $q2 = "update posts set post_title = '".$title."' , post_content = '".$content."' , upload_image ='".$img."' where post_id = ".$postid;
                    }
                    else{

                        $q2 = "update posts set post_title = '".$title."' , post_content = '".$content."' where post_id = ".$postid;
                    }

                    $update_content = $conn->query($q2);
                    if($update_content){
                        //echo "sucessfully updated";
                        header('Location:edit_post.php');
                    }
                    else{
                        echo "not updated";
                        echo $conn->connect_error;
                    }
                }

            ?>
        </div>
    </div>
</body>
</html>