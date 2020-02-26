<?php
   
   require('./vendor/autoload.php');
    use blogs\users;

    if(isset($_GET['uid'])){

        $userid = $_GET['uid'];
        $q = "select * from users where user_id =".$userid;
        $user1 = new users();
        $rows = $user1->get_all_Users($q);

    }
    elseif(!isset($_GET['uid'])){
        header('Location:/php%20test/blogphp/index.php/logout.php');
    }

    //seeprofile theme
    include('./view/seeprofiles_theme.php');
?>