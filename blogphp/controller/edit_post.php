<?php
session_start();
require('./vendor/autoload.php');
use blogs\blog;
use blogs\users;

if(isset($_SESSION['uid'])){
    // getting blog posts
    $blog1 = new blog();
    

   $q1 = "select p.post_id,u.user_name,u.user_image,p.post_content,p.upload_image,p.post_date,p.post_title from posts p inner join users u on p.user_id = u.user_id where p.user_id = '".$_SESSION['uid']."' order by post_date desc";
    $rows = $blog1->get_all_Posts($q1);

    // getting users details
    $user1 = new users();
    
    $query = "select * from users where user_id = '".$_SESSION['uid']."'";
    $u = $user1->get_all_Users($query);

    // including view post theme
    include('./view/mypost_theme.php');

}
else{

    header('Location:/php%20test/blogphp/index.php/logout.php');
}