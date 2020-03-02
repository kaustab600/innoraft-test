<?php
//calling model
require('./vendor/autoload.php');
use blogs\users;
// Handle AJAX request (start)
if( isset($_POST['fname']) ){
  if(!preg_match('/^[a-zA-Z]+$/', $_POST['fname'])){

      echo "* enter valid name";
  }
 exit;
}

if( isset($_POST['lname']) ){
  if(!preg_match('/^[a-zA-Z]+$/', $_POST['lname'])){

      echo "* enter valid name";
  }
 exit;
}
if(isset($_POST['email'])){
  if(!preg_match('/^\w*[-]?[.]?\w+@\w+(\.\w{2,3}){1,3}$/', $_POST['email'])){
    echo "* enter valid emailid";
  }
  exit;
}

if(isset($_POST['crfmpass'])){

  if($_POST['pass'] == ""){
    echo "* enter password please";
    exit;
  }
  else{
      if($_POST['pass'] != $_POST['crfmpass']){
        echo "* password and confirm password doesnot match";
      }
    exit;
  }
  
}

if(isset($_POST['username'])){

  $user1 = new users();
  $res = $user1->usernameExits($_POST['username']);
  if($res == 1){
    echo "* username exits please enter a unique username";
  }
  exit;
}

// Handle AJAX request (end)

?>