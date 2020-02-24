<?php
namespace blogs;
/*use blogs\connect;*/

class users extends connect{

        public  $users = [];

      function get_all_Users($query){

        $conn = $this->connection();

       
        $q = $query;
        /*$q = "select * from users";*/

        $res = $conn->query($q);

        if($res){

          while($rows = $res->fetch_assoc()){
            $users[] = $rows;
          }
        }

        return $users;
      }

      function updateProfile($fname,$lname,$username,$status,$country,$gender,$file_name,$userid){

            $conn = $this->connection();


            $q = "update users set f_name = '".$fname."',l_name = '".$lname."',user_name = '".$username."',describe_user = '".$status."',user_country = '".$country."',user_gender = '".$gender."',user_image = '".$file_name."' where user_id =".$userid;

           $update_profile = $conn->query($q);
            if($update_profile){
                echo "sucessfully updated";
                header('Location:../controller/homepage_controller.php');
            }
            else{
                echo $conn->connect_error;
            }

      }

      function insertUser($fname,$lname,$username,$status,$mail,$pass,$country,$gen,$img){

        $conn = $this->connection();

        $q = "insert into users(f_name, l_name, user_name, describe_user, user_pass, user_email, user_country, user_gender, user_image, user_reg_date,posts) values( '".$fname."','".$lname."','".$username."','".$status."','".$pass."','".$mail."','".$country."','".$gen."','".$img."',now(),'no')";

         $insertuser = $conn->query($q);

         if($insertuser){
            echo "sucessfully registered";
            header("Location:Loginpage.php");
           
         }
         else{
          echo $conn->connect_error;
         }
      }

      function check($email,$password){

          $conn = $this->connection();

          $q1 = "select user_id from users where user_email = '".$email."' and user_pass = '".$password."'";

          $no_of_users = $conn->query($q1);
          
          echo $no_of_users->num_rows;
                
            if( $no_of_users->num_rows ==1){
              
                session_start();
                $row = $no_of_users->fetch_assoc();
                $_SESSION['uid'] = $row['user_id'];
                header('Location:../controller/homepage_controller.php');
            }
            else{

               header('Location:Loginpage.php?msg=invalid details');
            }
          
      }

      
    }

    // $ob=new users();	