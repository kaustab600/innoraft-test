<?php 
        session_start();
        require('./vendor/autoload.php');
        use blogs\blog;
        use blogs\users;

        if(isset($_SESSION['uid']) ){
 
      // getting users details
            $user1 = new users();
            
            $query = "select * from users where user_id = '".$_SESSION['uid']."'";
            $u = $user1->get_all_Users($query);

            // including view edit theme
            include('./view/edit_profile_theme.php');
        }
        else{
          header('Location:/php%20test/blogphp/index.php/logout.php');
        }