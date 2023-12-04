
<?php

use PHPMailer\PHPMailer\PHPMailer; 
use PHPMailer\PHPMailer\Exception;

    class sendEmail
    {
         function send($name,$pass,$email)
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
            $mail->setFrom('academia728@gmail.com', "Academia"); // sender's email and name
            $mail->addAddress($email, "Receiver");  // receiver's email and name
            $headers = 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 
            $mail->Subject = ' Congratulations! Application Approved';
            
            $mail->Body    = '<h1>Congratulations!</h1>
            
            <p>Dear ' . $name .',<br>

            We are thrilled to inform you that your application for admission to Academia has been approved! Congratulations on this achievement, and we warmly welcome you to our institution.</p>
            <p>You have been selected based on your outstanding qualifications, achievements, and potential to contribute to our academic community. We believe that you will thrive in our Institution and make significant contributions to your chosen field of study.</p>
            <p>To access your student account and begin your journey with us, please find below your login credentials:</p>
            <ul>
                <li>Email Address: ' . $email .'</li>
                <li>Password : ' . $pass . '</li>
            </ul>
            <p>Please note that this is a temporary password, and we highly recommend that you change it after your registeration for security purposes.</p>
            <p>To access your student account, please visit our website and navigate to the register page. Use the provided email address and password to register. Once registered, you will be prompted to reset your password after which you can login with the same password thereafter.</p>
            <p>We understand that starting a new educational journey can be both exciting and overwhelming. Our dedicated support team is here to assist you every step of the way. If you have any questions, concerns, or need assistance, please do not hesitate to reach out to us at academia728@gmail.com. We are here to provide guidance and support as you embark on this exciting chapter of your academic life</p>
            <p>Once again, congratulations on your admission to Academia. We look forward to meeting you and witnessing your growth and success during your time at our institution.</p>
            <p>Warm regards,</p>
            <p>Academia</p>';

            $mail->send();
//             echo '<script>';
// echo 'alert("Message has been sent");';
// echo '</script>';
            if($mail->send()){
                include('db.php');
                // $sendpass="INSERT INTO student_details (pass) VALUES ($pass)";
                // $result = mysqli_query($con,$sendpass);
                // if ($con->query($sendpass) === TRUE) {
                //     echo "Password stored in the database successfully.";
                // } else {
                //     echo "Error storing password in the database " . $con->error;
                // }
            }
            
            //header("Location: Studs2.php?email=" . $email);
            exit();

            } 
            catch (Exception $e) { // handle error.
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
            }
        }
    }
    $sendMl = new sendEmail();

    
?>