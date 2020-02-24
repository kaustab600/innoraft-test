<?php
    

   /* $server = "localhost";
    $user = "root";
    $pass = "12345";
    $db = "blogdb";*/
  class connect{

    function connection(){

        $server = "localhost";
        $user = "root";
        $pass = "12345";
        $db = "blogdb";

        $conn = new mysqli($server,$user,$pass,$db);

        if(!$conn){
          die("connection failed:".$conn->connect_error);
        }
        else{
          return $conn;
        }
      }

  }

  class users extends connect{

        public  $users = [];

        

      function get_all_Users(){

        $conn = $this->connection();

       

        $q = "select * from users";

        $res = $conn->query($q);

        if($res){

          while($rows = $res->fetch_assoc()){
            $users[] = $rows;
          }
        }

        return $users;
      }

      
    }

  class blog extends connect{

        public  $posts = [];

        

      function get_all_Posts(){

        $conn = $this->connection();

       

        $q = "select * from posts";

        $res = $conn->query($q);

        if($res){

          while($rows = $res->fetch_assoc()){
            $posts[] = $rows;
          }
        }

        return $posts;
      }


      function getPosts(){

        $conn = $this->connection();

        $q1 = "select u.user_id,p.post_id ,u.user_name,u.user_image,p.post_title, p.post_date,p.post_content,p.upload_image from posts p inner join users u on p.user_id =u.user_id order by p.post_date desc";

         $res = $conn->query($q1);

        if($res){

          while($rows = $res->fetch_assoc()){
            $posts[] = $rows;
          }
        }

        return $posts;


      }
    }

