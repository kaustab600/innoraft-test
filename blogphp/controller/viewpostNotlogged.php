<?php

require('../vendor/autoload.php');
use blogs\blog;
use blogs\users;

if(isset($_GET['pid'])){
    $postid = $_GET['pid'];

    $q1 = "select u.user_name , u.user_image, p.post_title , p.post_id, p.post_date , p.upload_image ,p.post_content from posts p inner join users u on p.user_id =u.user_id where p.post_id =".$postid;
    $contents = new blog();
    $rowno = $contents->get_all_Posts($q1);

    include('../view/viewNotlogged_Theme.php');
}
else{

    header('Location:logout.php');
}


