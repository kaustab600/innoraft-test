<?php
require('connection.php');

if(isset($_POST['submit'])){

    $email= $_POST['username'];
    $password = $_POST['password'];

    $q1 = "select user_id from users where user_email = '".$email."' and user_pass = '".$password."'";
    $no_of_users = $conn->query($q1);
    if($no_of_users->num_rows == 1){
        $row = $no_of_users->fetch_assoc();
        session_start();
        $_SESSION['uid'] = $row['user_id'];
        header('Location:homepage_controller.php');
    }
    else{

        header('Location:Loginpage.php?msg=invalid');
    }
    
}

?>