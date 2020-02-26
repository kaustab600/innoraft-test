<?php
$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$foldername = basename($_SERVER['REQUEST_URI']);
if($foldername == 'blogphp'){
    echo "inside if";
    include('./controller/index_controller.php');
    exit;
}
else{
      $pid = 0;
      $uid =0;
      $userid =0;
      $authorid =0;
      $msg =0;
      if(isset($_GET['pid'])){
           $pid = $_GET['pid'];
      }
      if(isset($_GET['userid'])){
           $userid = $_GET['userid'];
      }
      if(isset($_GET['uid'])){
           $uid = $_GET['uid'];
      }
      if(isset($_GET['authorid'])){
        $authorid = $_GET['authorid'];
      }
      if(isset($_GET['msg'])){
        $msg = $_GET['msg'];
      }

        if($foldername == 'Loginpage'){
      
           //include(__DIR__.'/view/Loginpage.php');*/
           include('./view/Loginpage.php');
           exit;
       }
        else if ($foldername == 'homepage_controller') {
            include("./controller/homepage_controller.php");
            exit;
        }
        elseif($foldername == 'logout.php'){
            //echo "inside logout";
            include("./controller/logout.php");
            exit;
        }
        elseif($foldername == 'index_controller'){
          include('./controller/index_controller.php');
          exit;
        }
        elseif($foldername == 'seeprofiles.php?uid='.$uid){
          include("./controller/seeprofiles.php");
          exit;
        }
        elseif($foldername == 'seeprofilesLogged.php?userid='.$userid){
          include("./controller/seeprofilesLogged.php");
          exit;
        }
        elseif($foldername == 'viewpostNotlogged.php?pid='.$pid){
      
          include('./controller/viewpostNotlogged.php');
          exit;
        }
        elseif($foldername == 'viewpost.php?pid='.$pid){
          
          include('./controller/viewpost.php');
          exit;
        }
        elseif($foldername == 'recentpost.php?authorid='.$authorid){
          include('./controller/recentpost.php');
          exit;
        }
        elseif($foldername == 'profile'){
          include('./controller/profile.php');
          exit;
        }
        elseif($foldername == 'edit_profile'){
          include('./controller/edit_profile.php');
          exit;
        }
        elseif($foldername == 'edit_post'){
          include('./controller/edit_post.php');
          exit;
        }
        elseif($foldername == 'addpost'){
          include('./controller/addpost.php');
          exit;
        }
        elseif($foldername == 'edit?pid='.$pid){
          include('./controller/edit.php');
          exit;
        }
        elseif($foldername == 'deletepost?pid='.$pid){
          include('./controller/deletepost.php');
          exit;
        }
        elseif($foldername == 'Loginpage?msg=invalid%20details'){
           echo "<script>alert('invalid details!');</script>";
           include('./view/Loginpage.php');
           exit;
        }
        elseif($foldername == 'register'){
          include('./view/register.php');
          exit;
        }
    
}


?>