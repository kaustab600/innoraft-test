<?php
    
    $server = "localhost";
    $user = "root";
    $pass = "";
    $db = "blogdb";

    //$conn  = mysqli_connect($server,$user,$pass,$db);
    $conn = new mysqli($server,$user,$pass,$db);

    if($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }
    
?>