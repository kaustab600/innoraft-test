<?php require('connection.php'); 
    
    require('./vendor/autoload.php');
    use blogs\blog;
    use blogs\users;


?>
<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="./styles/stylehome.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="./myscript.js"></script>
</head>
<body>

        <?php 
        session_start();
        if(!isset($_SESSION['uid'])){
            header('Location:Loginpage.php');
        }
        $userid = $_SESSION['uid'];
        $q = "select * from users where user_id = '".$userid."'";
        $user_details = $conn->query($q);
        if($user_details->num_rows == 1){
            $rows = $user_details->fetch_assoc();

            //creating object of user
            $user1 = new users($rows['user_id'],$rows['f_name'],$rows['l_name'],$rows['user_name'],$rows['user_email'],$rows['user_pass'],$rows['describe_user'],$rows['user_country'],$rows['user_gender'],$rows['user_reg_date'],$rows['user_image']);

        }
        ?>
    <div id="header">
        <div class="container">
            <div id="logo">
                <p>BLOGS.</p>
            </div>
            <div id="userprofile"><a href="profile.php"><?php echo "<img src= './profilepics/".$user1->img."' width='50px'/>"; ?></a></div>
            <div class="navbar">
                <ul>
                    <li><a href="addpost.php">Add Post</a></li>
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
            $q1 = "select p.post_id ,p.user_id,u.user_name,u.user_image,p.post_title, p.post_date,p.post_content,p.upload_image from posts p inner join users u on p.user_id =u.user_id order by p.post_date desc";
            $allposts = $conn->query($q1);
            if($allposts){
                while($rowno =$allposts->fetch_assoc()){

                    //calling blog constructor
                    $blog1 = new blog($rowno['post_id'],$rowno['post_date'],$rowno['post_title'],$rowno['post_content']);

                    echo "<div class='allposts'>";
                    echo "<div class='title'>";
                    if($rowno['user_image'])
                    {

                        echo "<a href='seeprofileLogged.php?uid=".$rowno['user_id']."'><img id='profileimg' src='./profilepics/".$rowno['user_image']."' width='50px' style='border-radius:50%' /></a>";
                    }
                    echo "<h2><a id='viewpost' href='viewpost.php?pid=".$blog1->pid."'>".$blog1->post_title."</a></h2>";
                    if($rowno['upload_image']){

                    echo "<img id='uploadedimg' src='./postimages/".$rowno['upload_image']."' width='200px' height='150px' style='border-radius:10px'/>";
                    }
                    echo "<h3>".$rowno['user_name']."</h3>";
                    echo "</div>";
                    echo "<div class='postbrief'>";
                    echo "<h5>Posted on : ".$blog1->post_date."</h5>";
                    echo "</div>";
                    //$_SESSION['pid'] = $rowno['post_id'];
                    
                    echo "</div>";
                }

            }
            else{

                    echo "<div class='allposts'>";
                    echo "<div class='title'>";
                    echo "<h2>No Posts Are Present Login And Become The first To Add a Blog</h2>";
                    echo "</div>";
                    echo "</div>";

            }
        ?>
    </div>
    </div>

</body>
</html>