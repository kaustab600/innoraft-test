<?php
require('./vendor/autoload.php');
use blogs\blog;
use blogs\users;
 session_start();
if(isset($_GET['pid']) and isset($_SESSION['uid'])){

    // getting blog posts
    $blog1 = new blog();
    $postid = $_GET['pid'];

    $q1 = "select u.user_name , u.user_image, p.post_title , p.post_id, p.post_date , p.upload_image ,p.post_content from posts p inner join users u on p.user_id =u.user_id where p.post_id =".$postid;
    $rows = $blog1->get_all_Posts($q1);

    // getting users details
    $user1 = new users();
   
    $query = "select * from users where user_id = '".$_SESSION['uid']."'";
    $u = $user1->get_all_Users($query);

    // including view post theme
    include('./view/viewposttheme.php');

}
else{
        
    header('Location:/php%20test/blogphp/index.php/logout.php');
}









