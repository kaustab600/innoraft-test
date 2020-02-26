<?php

require('./vendor/autoload.php');
use blogs\users;
session_start();

if(isset($_GET['userid']) and isset($_SESSION['uid'])){

        //getting blog author details
        $authorid = $_GET['userid'];
        $q = "select * from users where user_id =".$authorid;
        $user1 = new users();
        $author = $user1->get_all_Users($q);

        //getting users data
        $userid = $_SESSION['uid'];
        $q1 = "select * from users where user_id = '".$userid."'";
        $rows = $user1->get_all_Users($q1);

    }
elseif(!isset($_GET['userid']) or !isset($_SESSION['uid'])){
       // header('Location:logout.php');
        echo "session id".$_SESSION['uid']." and getid =".$_GET['userid'];
    }
      
    include('./view/seeprofilesLogged_theme.php'); 
        
?>