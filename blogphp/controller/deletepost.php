<?php
    require('./connection.php');

    if(isset($_GET['pid'])){

        $postid = $_GET['pid'];
    }
    elseif(!isset($_GET['pid'])){
        header('Location:/php%20test/blogphp/index.php/logout.php');
    }

    $q = "delete from posts where post_id =".$postid;

    $deleted = $conn->query($q);

    if($deleted){
        
        header('Location:/php%20test/blogphp/index.php/edit_post');
    }
    else{
        echo "not sucessful";
    }
?>