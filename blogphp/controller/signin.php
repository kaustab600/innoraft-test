<?php
require('./vendor/autoload.php');
use blogs\users;
if(isset($_POST['submit'])){
  
    $email= $_POST['username'];
    $password = $_POST['password'];

    $user1 = new users();
    
    $user1->check($email,$password);      
}




