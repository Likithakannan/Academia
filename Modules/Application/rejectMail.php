
<?php

use PHPMailer\PHPMailer\PHPMailer; 
use PHPMailer\PHPMailer\Exception;

    class sendREmail
    {
         function send($name,$email)
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
            $mail->Subject = 'Application Status - Rejection Notification';
            
            $mail->Body    = '
            <p>Dear ' . $name .',<br>

            We hope this email finds you well. We appreciate your interest in Academia and the time and effort you invested in submitting your application. </p>
            <p>After careful consideration by our admissions committee, we regret to inform you that we are unable to offer you a place in our Institution for the upcoming academic year. We understand that this news may be disappointing, but please be aware that the selection process was highly competitive, and we had a limited number of spots available.</p>
            <p>We would like to emphasize that this decision does not reflect on your abilities or qualifications. Our application process involves a comprehensive review, taking into account various factors such as academic achievements, personal statements, recommendation letters, and the overall fit with our program.</p>
           
            <p>While we are unable to offer you admission at this time, we encourage you to explore other educational opportunities that align with your interests and goals. We believe that you possess valuable skills and potential that will make you successful in your academic journey.</p>
            <p>If you have any questions or would like feedback on your application, please do not hesitate to reach out to us. We are more than willing to provide any assistance or guidance that we can.</p>
            <p>Once again, we appreciate your interest in Academia, and we wish you the best of luck in your future endeavors. We hope you find the right path to achieve your academic and career aspirations.</p>
            <p>Warm regards,</p>
            <p>Academia</p>';

            $mail->send();
//             echo '<script>';
// echo 'alert("Message has been sent");';
// echo '</script>';
            if($mail->send()){
                include('db.php');
                $insert_query="INSERT INTO rejected (name,email) VALUES ('$name','$email')";
                $result = mysqli_query($con,$insert_query);
                if ($result) {
                     echo "Rejected Student ";
                     $delete_query = "DELETE FROM student_details WHERE email='$email'";
                     $result = mysqli_query($con,$delete_query);
                    if($result){
                       echo "deleted successfully";
                    }
                    }else{
                        echo "Error while deleting student details " . $con->error; 
                    }
                }else{
                     echo "Error storing rejected student in the database " . $con->error;
                }
            
            
            header("Location: Studs2.php?email=" . $email);
            exit();

            } 
            catch (Exception $e) { // handle error.
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
            }
        }
    }
    $sendRMl = new sendREmail();

    
?>