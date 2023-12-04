<?php

use PHPMailer\PHPMailer\PHPMailer; 
use PHPMailer\PHPMailer\Exception;

    class sendEmail
    {
         function send($code,$email)
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
            $mail->setFrom('academia728@gmail.com', "Academia"); // sender's email and name
            $mail->addAddress($_POST['email'], "Receiver");  // receiver's email and name
            $headers = 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 
            $mail->Subject = 'Email verification';
            $mail->Body    = 'Verification Code: '.$code ;

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
    $sendMl = new sendEmail();

?>