<?php 
        session_start();

        if(isset($_SESSION['uid']) ){
            
            
            include('modelMainpage.php');

            // getting users details
            $user1 = new users();
            
            $query = "select * from users where user_id = '".$_SESSION['uid']."'";
            $u = $user1->get_all_Users($query);

            // including view edit theme
            include('profile_theme.php');
        }
        else{
          header('Location:logout.php');
        }

            