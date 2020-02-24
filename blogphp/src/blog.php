<?php
namespace blogs;
/*require('../vendor/autoload.php');*/

  class blog extends connect{

        public  $posts = [];

        

      function get_all_Posts($query){

        $conn = $this->connection();

       

        $q = $query;

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

      function editPosts($file_name,$file_tmp,$title,$content,$img =""){

                    $conn = $this->connection();

                     $postid = $_GET['pid'];
                    /*$img ="";*/
                  
                    if(move_uploaded_file($file_tmp,"postimages/".$file_name)){

                        $img = $_FILES['pic']['name'];
                    }

                    if($img!=""){

                    $q2 = "update posts set post_title = '".$title."' , post_content = '".$content."' , upload_image ='".$img."' where post_id = ".$postid;
                    }
                    else{

                        $q2 = "update posts set post_title = '".$title."' , post_content = '".$content."' where post_id = ".$postid;
                    }

                    $update_content = $conn->query($q2);
                    if($update_content){
                        //echo "sucessfully updated";
                        header('Location:../controller/edit_post.php');
                    }
                    else{
                        echo "not updated";
                        echo $conn->connect_error;
                    }
               
      }

      function addPosts($userid,$title,$content,$file_name){

        $conn = $this->connection();

        $q2 = "insert into  posts(user_id,post_content,upload_image,post_date,post_title) values('".$userid."','".$content."','".$file_name."',now(),'".$title."')";

          $update_content = $conn->query($q2);
                    if($update_content){
                        echo "sucessfully updated";
                        header('Location:../controller/homepage_controller.php');
                    }
                    else{
                        echo "not updated";
                        echo mysqli_error($conn);
                    }
      }


    }

$blog1 = new blog();
