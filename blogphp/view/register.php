<?php require('./Ajaxverification.php'); ?> 
<!DOCTYPE html>
<html>
 <head>
  
   <!-- Script -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script>
    $(document).ready(function(){

      //flag for important input fields
      var allfields = 0;

      $('#submit').attr("disabled", true);
  

    $('#fname').keyup(function(){
     var name = $('#fname').val();
     $.ajax({
      type: 'post',
      data: {fname: name},
      success: function(response){
       $('#response').text(response);
       allfields++;
           if(allfields >= 5){
            //alert('submitted');
            $("#submit").attr("disabled", false);
          }
      }
     });

    });

    $('#lname').keyup(function(){
        var name = $('#lname').val();
        $.ajax({
          type:'post',
          data:{lname:name},
          success:function(response){
            $('#response1').text(response);
            allfields++;

            if(allfields >= 5){
              //alert('submitted');
              $("#submit").attr("disabled", false);
              
            }
          },
        });

    });

    $('#email').keyup(function(){
      var email = $('#email').val();
      $.ajax({
        type:'post',
        data:{email:email},
        success:function(response){
          $('#response3').text(response);
          allfields++;

          if(allfields >= 5){
            //alert('submitted');
            $("#submit").attr("disabled", false); 
          }
        }

      });

      
    });

    $('#crfmpass').change(function(){
      var pass = $('#pass').val();
      var crfmpass =$('#crfmpass').val();
      $.ajax({
        type:'post',
        data:{pass:pass,crfmpass:crfmpass},
        success:function(response){
          $('#response4').text(response);
          allfields++;

          if(allfields >= 5){
            //alert('submitted');
            $("#submit").attr("disabled", false);
            
          }
        }
      });

      
    });

    $('#username').change(function(){
      $.ajax({
          type:'post',
          data:{'username':$('#username').val()},
          success:function(response){
            $('#response2').text(response);
            allfields++;

            if(allfields >= 5){
              //alert(' submitted');
              $("#submit").attr("disabled", false);
            
            }
          }
      });

      
    });

});
  </script>
 </head>
 <title>Sign Up</title>
 <link rel="stylesheet" type="text/css" href="/php%20test/blogphp/styles/registerpage.css?v=1">
 <body>
  <div id="header">
      <div class="container">
          <div id="logo">
                <p>BLOGS!</p>
            </div>
            <div id="sigup">
                <a href="Loginpage">Sign In</a>
            </div>
            <div id="sigup">
                <a href="index_controller">Home</a>
            </div>
        </div>
    </div>
    <div id="main">
        <div class="container">
            <div id="signin">
                <h2>Create your Account To Explore the World of Blogs</h2>
                    <form name="frm1" id="frm1" method='post' enctype="multipart/form-data" action="../controller/signup">
                     <h6>Profile Pic</h6>
                    <input type="file" name="profilepic">
                    <div id='response'></div>
                    <h6>First name</h6>
                     <input type='text' name='fname' placeholder='Enter your first name' id='fname'>
                     <div id='response1'></div>
                     <h6>Last name</h6>
                     <input type="text" name="lname" placeholder="Enter your Last name" id="lname">
                     <div id='response2'></div>
                     <h6>Username</h6>
                     <input type="text" name="username" placeholder="enter username" id="username">
                     <div id='response3'></div>
                     <h6>Email</h6>
                     <input type="text" name="email" placeholder="Enter your email" id="email">
                     <div id='response4'></div>
                     <h6>Password</h6>
                     <input type="password" name="pass" placeholder="Enter password" id="pass">
                     <h6>Confirm password</h6>
                     <input type="password" name="crfmpass" placeholder="Enter confirm password" id="crfmpass">
                     <h6>Describe about yourself</h6>
                     <input type="text" name="describeuser" placeholder="enter status" required>
                     <h6>Country</h6>
                     <select name="country" required>
                        <option selected>please select your country</option>
                        <option value="India">India</option>
                        <option value="USA">USA</option>
                        <option value="UK">UK</option>
                     </select>
                     <h6>Gender</h6>
                     <div id="radiobutton" required>
                    <input type="radio" name="gender" value="male">Male<input type="radio" name="gender" value="female">Female<br>
                    </div>
                     <input type='submit' id="submit" value='submit' name='submit'><br>
                    </form>
              </div>
              <div id="wallpaper"><img src="/php%20test/blogphp/images/blogregister.jpeg"></div>
        </div>
    </div>
 </body>
    
 </html>
