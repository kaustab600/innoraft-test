<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require('credential.php');
$emailid = $_POST['emailid'];
// Load Composer's autoloader
require('../vendor/autoload.php');

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true); 
  
try { 
    $mail->SMTPDebug = 4;                                        
    $mail->isSMTP();                                             
    $mail->Host       = 'smtp.gmail.com';                     
    $mail->SMTPAuth   = true;                              
    $mail->Username   = $username;                  
    $mail->Password   = $password;                         
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;                               
    $mail->Port       = 587;   
  
    $mail->setFrom('kaustab.roy@innoraft.com','kaustab',0);            
    $mail->addAddress($_POST['emailid']); 
   // $mail->addAddress('receiver2@gfg.com', 'Name'); 
       
    $mail->isHTML(true);                                   
    $mail->Subject = 'Welcome'; 
    $mail->Body    = 'Thank you for your submission.'; 
    $mail->AltBody = 'Thank you for your submission.'; 
    $mail->send(); 
    echo "Mail has been sent successfully!"; 
} catch (Exception $e) { 
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}"; 
} 
?>