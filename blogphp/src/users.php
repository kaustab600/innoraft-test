<?php
namespace blogs;
use blogs\connect;

require('../vendor/autoload.php');

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
            }
            else{
                echo $conn->connect_error;
            }

      }

      
    }

    // $ob=new users();	