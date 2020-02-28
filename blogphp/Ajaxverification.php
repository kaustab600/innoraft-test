<?php
//calling model
require('./vendor/autoload.php');
use blogs\users;
// Handle AJAX request (start)
if( isset($_POST['fname']) ){
  if(!preg_match('/^[a-zA-Z]+$/', $_POST['fname'])){

      echo "enter valid name";
  }
 exit;
}

if( isset($_POST['lname']) ){
  if(!preg_match('/^[a-zA-Z]+$/', $_POST['lname'])){

      echo "enter valid name";
  }
 exit;
}
if(isset($_POST['email'])){
  if(!preg_match('/^\w*[-]?[.]?\w+@\w+(\.\w{2,3}){1,3}$/', $_POST['email'])){
    echo "enter valid emailid";
  }
  exit;
}

if(isset($_POST['crfmpass'])){

  if($_POST['pass'] == ""){
    echo "enter password please";
    exit;
  }
  else{
      if($_POST['pass'] != $_POST['crfmpass']){
        echo "password and confirm password doesnot match";
      }
    exit;
  }
  
}

if(isset($_POST['username'])){

  $user1 = new users();
  $res = $user1->usernameExits($_POST['username']);
  if($res == 1){
    echo "username exits please enter a unique username";
  }
  exit;
}

// Handle AJAX request (end)


/*if(isset($_POST['submit'])){
        echo "<script>alert('inside post');</script>";
        $img ="";
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $username = $_POST['username'];
        $status = $_POST['describeuser'];
        $mail = $_POST['email'];
        $pass = $_POST['pass'];
        $crmp = $_POST['crfmpass'];
        $country = $_POST['country'];
        $gen = $_POST['gender'];
        
        $file_name = $_FILES['profilepic']['name'];
        $file_size =$_FILES['profilepic']['size'];
        $file_tmp =$_FILES['profilepic']['tmp_name'];
        $file_type=$_FILES['profilepic']['type'];


        $user1 = new users();

        //validation of the user inputs

        //checking if any other user with same username is present or not
        $query = "select user_id from users where user_email='".$mail."' or user_name = '".$username."'";
        $row = $user1->get_all_Users($query);
        

        //checking fname or lname or email is valid or not
        if(!preg_match('/^[a-zA-Z]+$/', $fname) or !preg_match('/^[a-zA-Z]+$/', $lname) or !preg_match('/^\w*[-]?\w+@\w+(\.\w{2,3}){1,3}$/',$mail ) ){

            echo "<script>alert('invalid fname or lname or email');</script>";
        }
        //checking if password and confirm password are same or not
        elseif($pass!=$crmp){

            echo "<script>alert('password and confirm password doesnot match');</script>";
        }
        elseif(!empty($row)){

            echo "<script>alert('username exits! please enter a unique username');</script>";
        }
        else{

            if( move_uploaded_file($file_tmp,"/php%20test/blogphp/profilepics/".$file_name)){
                
                echo "Success";
                $img = $_FILES['profilepic']['name'];

            }
            
           // echo "all good";
            echo "<script>alert('all good');</script>";
            //$user1->insertUser($fname,$lname,$username,$status,$mail,$pass,$country,$gen,$img);
        }

    }*/
?>