<?php

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$foldername = basename($_SERVER['REQUEST_URI']);
//echo $url;
$array = explode('/', $url);
var_dump($array);
$len = count($array);

echo "<br>".$array[$len-2];
echo "<br>".$array[$len-3];


if($foldername == 'blogphp'){

    $url = './controller/index_controller.php';
    header('Location:'.$url);
}
else{

    if(isset($_GET['pid'])){
        $pid = $_GET['pid'];
    }

     if ('controller' == $array[$len-3]){
            header('location:../blogphp/view/'.$array[2]);
            exit;
        } /*else if ('/php%20test/blogphp/index.php/controller/viewpostNotlogged.php?pid='.$pid == $url) {

            header("location:/php%20test/blogphp/controller/viewpostNotlogged.php?pid=".$pid);
            exit;
        } else if ('/PHP/BLOG/home.php/create_post' == $url) {
            header('location:../blog/view/create_post.php');
            exit;
        } else if ('/PHP/BLOG/home.php/login' == $url) {
            header('location:../authentication/login.html');
            exit;
        } else if ('/PHP/BLOG/home.php/register' == $url) {
            header('location:../authentication/register.html');
            exit;
        } else if ('/PHP/BLOG/home.php' == $url) {
            header('location:../BLOG/blog/view/index.php');
            exit;
        }*/
    
}


?>