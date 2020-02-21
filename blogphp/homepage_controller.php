<?php

session_start();
if(!isset($_SESSION['uid'])){
   header('Location:Loginpage.php');
  }
$userid = $_SESSION['uid'];

include('modelMainpage.php');


$user1 = new users();

$query = "select * from users where user_id = '".$userid."'";
$p = $user1->get_all_Users($query);


$blog1 = new blog();

$q1 = "select p.post_id ,p.user_id,u.user_name,u.user_image,p.post_title, p.post_date,p.post_content,p.upload_image from posts p inner join users u on p.user_id =u.user_id order by p.post_date desc";

$rows = $blog1->get_all_Posts($q1);

include('homepage.php');