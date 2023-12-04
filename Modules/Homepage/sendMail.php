<?php

use PHPMailer\PHPMailer\PHPMailer; 
use PHPMailer\PHPMailer\Exception;

    class sendEmail
    {
         function send($messages,$email,$name,$phone)
        {
        require '../../PHPMailer/src/Exception.php';
        require '../../PHPMailer/src/PHPMailer.php';
        require '../../PHPMailer/src/SMTP.php';

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
            $mail->setFrom($email, $name); // sender's email and name
            $mail->addAddress("academia728@gmail.com", "Academia");  // receiver's email and name
            $headers = 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 
            $mail->Subject = 'Contact Us Enquiry';
            $mail->Body    = "Name: $name"."<br>Email: $email"."<br>Phone: $phone"."<br>Message: $messages" ;

            $mail->send();
            echo "<script language='javascript'>window.alert('Message has been sent successfully');window.location='contact.php';</script>";
            
            exit();

            } 
            catch (Exception $e) { // handle error.
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
            }
        }
    }
    $sendMl = new sendEmail();

?>