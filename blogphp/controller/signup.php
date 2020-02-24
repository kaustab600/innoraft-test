<?php
    // controller of register.php 

    //autoloading model
    require('../vendor/autoload.php');
    use blogs\users;
    
    if(isset($_POST['submit'])){

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

            if( move_uploaded_file($file_tmp,"../profilepics/".$file_name)){
                
                echo "Success";
                $img = $_FILES['profilepic']['name'];

            }
            
            $user1->insertUser($fname,$lname,$username,$status,$mail,$pass,$country,$gen,$img);
        }

    }


?>