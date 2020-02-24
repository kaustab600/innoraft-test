<?php
namespace blogs;

class connect{

    function connection(){

        $server = "localhost";
        $user = "root";
        $pass = "";
        $db = "blogdb";

        $conn =  mysqli_connect($server,$user,$pass,$db);

        if(!$conn){
          die("connection failed:".mysqli_error($conn));
        }
        else{
          return $conn;
        }
      }

  }
?>