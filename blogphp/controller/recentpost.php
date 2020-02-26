<?php 
      require('./vendor/autoload.php');
      use blogs\blog;
      use blogs\users;

        session_start();
        if(!isset($_SESSION['uid']) or !isset($_GET['authorid'])){
            header('Location:/php%20test/blogphp/index.php/logout.php');
        }
        $userid = $_SESSION['uid'];
        $authorid= $_GET['authorid'];

        $q = "select * from users where user_id = '".$userid."'";

        $user1 = new users();
        $rows = $user1->get_all_Users($q);
       
        $q1 = "select p.post_id,u.user_name,u.user_image,p.post_content,p.upload_image,p.post_date,p.post_title from posts p inner join users u on p.user_id = u.user_id where p.user_id = '".$authorid."' order by post_date desc";
        $blog1 = new blog();
        $blog_details = $blog1->get_all_Posts($q1);

        //Theme for recentpost
        include('./view/recentpost_theme.php');
?>