<?php
session_start();
include('DbConnection.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
// require 'vendor/autoload.php';
 
// function sendemail_verify($name,$email,$verify_token){
//  require 'PHPMailer/PHPMailer.php';
//  require 'PHPMailer/Exception.php';
//  require 'PHPMailer/SMTP.php';
    
//     $mail = new PHPMailer(true);
//     try {
//         //Server settings
//         $mail->isSMTP();                                            //Send using SMTP
//         $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
//         $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
//         $mail->Username   = 'iitspl89@gmail.com';                     //SMTP username
//         $mail->Password   = 'yywtcjssestdopzb';                               //SMTP password
//         $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
//         $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
//         //Recipients
//         $mail->setFrom('iitspl89@gmail.com', 'Mailer');
//         $mail->addAddress($_POST['email']);     //Add a recipient
       

    
//         //Content
//         $mail->isHTML(true);                                  //Set email format to HTML
//         $mail->Subject = 'Email verification'; 
//         $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
//         $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
//         $mail->send();
//         return true;
//     } catch (Exception $e) {
//     //    return false;
//     echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
//     }

// }
if (isset($_POST['register_btn'] )) {
    $password_error='';
    $email=$_POST['email'];
   $name=$_POST['name'];
   $password=$_POST['password'];
   $verify_token=md5(rand());
   $retype_password=$_POST['retype_password'];
   $encrypted_pass=md5($password);

   //     $retypePassword = $_POST['retype_password'];

       if ($password !== $retype_password) {
        //    echo "<span class='text-red-700'>Password Didnot Match</span>";
           $_SESSION['status'] = 'Passwords do not match';
         header("Location: Register.php"); 
            exit;
       }

    $check_email_query="SELECT email FROM users where email='$email' limit 1";
    $check_email_result=mysqli_query($conn,$check_email_query);
    if (mysqli_num_rows($check_email_result) > 0) {
       $_SESSION['status'] = 'Email Exists';
       header('location:Register.php');
    }
    else {
       
        $query="INSERT INTO users (email,name,password,verify_token) VALUES ('$email','$name','$encrypted_pass','$verify_token')";
        //  $query="insert into users (email,name, password,verify_token) values ('84748','djdjjd','shhs','shhshsh')";
        $query_run=mysqli_query($conn,$query);
        if ($query_run) {
           $verify = sendemail_verify('$name','$email','$verify_token');
            if ($verify) {
               echo "<script>
               alert('Registered Successfully done');
               </script>";
            }
            else {
               echo "<script>
               alert('Something went wrong');
               </script>";
            }
            $_SESSION['status'] = 'Registrations Successfull.Please verify your email address';
        
            // header('location:LogIn.php');
            
        }
        else{
            $_SESSION['status'] = 'Registrations Failed';
       header('location:Register.php');
        }
    }
}
function sendemail_verify($name,$email,$verify_token){
    require 'PHPMailer/PHPMailer.php';
    require 'PHPMailer/Exception.php';
    require 'PHPMailer/SMTP.php';
       
       $mail = new PHPMailer(true);
       try {
           //Server settings
           $mail->isSMTP();                                            //Send using SMTP
           $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
           $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
           $mail->Username   = 'iitspl89@gmail.com';                     //SMTP username
           $mail->Password   = 'yywtcjssestdopzb';                               //SMTP password
           $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
           $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
       
           //Recipients
           $mail->setFrom('iitspl89@gmail.com', 'Mailer');
           $mail->addAddress($_POST['email']);     //Add a recipient
          
   
       
           //Content
           $mail->isHTML(true);                                  //Set email format to HTML
           $mail->Subject = 'Email verification'; 
           $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
           $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
       
           $mail->send();
           return true;
       } catch (Exception $e) {
       //    return false;
       echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
       }
   
   }
?>