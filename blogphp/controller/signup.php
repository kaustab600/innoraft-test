<?php
    // controller of register.php 

    //var_dump($_POST);
    //autoloading model
    require('./vendor/autoload.php');
    use blogs\users;
            
    
    if(isset($_POST['submit'])){
        //echo "<script>alert('inside post');</script>";
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

        var_dump($_POST);
        $user1 = new users();

        //validation of the user inputs

        //checking fname or lname or email is valid or not
        if(!preg_match('/^[a-zA-Z]+$/', $fname) or !preg_match('/^[a-zA-Z]+$/', $lname) or !preg_match('/^\w*[-]?[.]?\w+@\w+(\.\w{2,3}){1,3}$/',$mail ) ){

            echo "<script>alert('invalid fname or lname or email');</script>";
            exit;
        }
        //checking if password and confirm password are same or not
        elseif($pass!=$crmp){

            echo "<script>alert('password and confirm password doesnot match');</script>";
            exit;
        }
      
        else{

            if( move_uploaded_file($file_tmp,"/php%20test/blogphp/profilepics/".$file_name)){   
                echo "Success";
                $img = $_FILES['profilepic']['name'];
            }
            
           // echo "all good";
            //echo "<script>alert('all good');</script>";
            $user1->insertUser($fname,$lname,$username,$status,$mail,$pass,$country,$gen,$img);
        }

    }


?> 