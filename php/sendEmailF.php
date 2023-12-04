<?php

use PHPMailer\PHPMailer\PHPMailer; 
use PHPMailer\PHPMailer\Exception;

class sendEmailF
    {
        function send($token,$email)
        {
        require '../PHPMailer/src/Exception.php';
        require '../PHPMailer/src/PHPMailer.php';
        require '../PHPMailer/src/SMTP.php';
        // create object of PHPMailer class with boolean parameter which sets/unsets exception.
        $mail = new PHPMailer(true);                              
        try {
            $mail->isSMTP(); // using SMTP protocol                                     
            $mail->Host = 'smtp.gmail.com'; // SMTP host as gmail 
            $mail->SMTPAuth = true;  // enable smtp authentication                             
            $mail->Username = 'academia728@gmail.com';  // sender gmail host              
            $mail->Password = 'kfzkiagkzazepeox'; // sender gmail host password                          
            $mail->SMTPSecure = 'tls';  // for encrypted connection                           
            $mail->Port = 587;   // port for SMTP     
            $mail->isHTML(true); 
            $mail->setFrom('academia728@gmail.com', "Sender"); // sender's email and name
            $mail->addAddress($_POST['email'], "Receiver");  // receiver's email and name
            $headers = 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 
            $mail->Subject = 'Reset Password verification';
            $mail->Body    = 'Reset Password Verification Code:'.$code ;

            $mail->send();

            echo 'Message has been sent';
            
            header("Location: verify.php?email=" . $email);
            exit();

        } 
        catch (Exception $e) { // handle error.
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }
    }
    }
    $sendMailF = new sendEmailF();
   
    
    /*if(isset($_POST['password-reset-link'])){
      $email = mysqli_real_escape_string($conn,$_POST['email']);
      $token=md5(rand());

      $check_email="SELECT email FROM student WHERE email='$email' LIMIT 1";
      $check_email_run=mysqli_query($conn,$check_email);
      //check if user exists
      if(mysqli_num_rows($check_email_run)>0){
        $row=mysqli_fetch_array($check_email_run);
        $get_name=$row['username'];
        $get_email=$row['email'];

        //generate new verification code
        $update_token="UPDATE student SET code='$token' WHERE email='$get_email' LIMIT 1";
        $update_token_run=mysqli_query($conn,$update_token);

        if($update_token_run){
            send_password_reset($get_name,$get_email,$token);
            echo "<script>alert('Verification Successfull')</script>";
            header("Location : reset_pass.php");
            exit(0);
        }
        else{
          echo "Error updating verification code";
          header("Location : Forgot_Password.php");
          exit(0);
        }
      }
      else{
        echo "No email found";
        header("Location: Forgot_Password.php");
        exit(0);
      }
    } */

?>