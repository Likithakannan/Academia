<?php
require_once 'dbconfig.php';
session_start();
$student_id=$_SESSION['student_id'];
class STUDENT {

	private $conn;

	public function __construct() {
		$database = new Database();
		$db = $database->dbConnection();
		$this->conn = $db;
	}

	public function runQuery( $sql ) {
		$stmt = $this->conn->prepare( $sql );
		return $stmt;
	}

	public function lasdID() {
		$stmt = $this->conn->lastInsertId();
		return $stmt;
	}


	public function razorPayOnline($student_id,$email,$phone, $toValue, $message,$razorpayOrderId,$razorpayPaymentId,$paymentStatus,$makerstamp,$updatestamp,$fee_type) {
		try {
			$stmt = $this->conn->prepare( "INSERT INTO onlinepayment(student_id,email, phone, toValue, message, razorpayOrderId, razorpayPaymentId, paymentStatus,makerstamp,updatestamp,type) 	
			VALUES(:student_id_o,:email_o,:phone_o,:toValue_o,:message_o,:razorpayOrderId_o,:razorpayPaymentId_o,:paymentStatus_o,:makerstamp_o,:updatestamp_o,:type_o)" );
			//$stmt->bindparam( ":name_o", $name );
			$stmt->bindparam( ":student_id_o", $student_id );
  			$stmt->bindparam( ":email_o", $email );
  			$stmt->bindparam( ":phone_o", $phone );
  			//$stmt->bindparam( ":service_o", $service );
  			//$stmt->bindparam( ":typeProduct_o", $typeProduct ); 
			$stmt->bindparam( ":toValue_o", $toValue ); 
			$stmt->bindparam( ":message_o", $message );
			$stmt->bindparam( ":razorpayOrderId_o", $razorpayOrderId );
			$stmt->bindparam( ":razorpayPaymentId_o", $razorpayPaymentId );
			$stmt->bindparam( ":paymentStatus_o", $paymentStatus );
			$stmt->bindparam( ":makerstamp_o", $makerstamp );
			$stmt->bindparam( ":updatestamp_o", $updatestamp );
			$stmt->bindparam( ":type_o", $fee_type);
			$stmt->execute();
			return $stmt;

			
		

		} catch ( PDOException $ex ) {
			echo $ex->getMessage();
		}
	}
	
	// ...

public function updatePayStatus($email, $razorpayOrderId, $razorpayPaymentId, $paymentStatus, $updatestamp,$fee_type,$toValue) {
    try {
        $stmt = $this->conn->prepare( "UPDATE onlinepayment SET razorpayPaymentId=:razorpayPaymentId,paymentStatus=:paymentStatus,updatestamp=:updatestamp WHERE email=:email and razorpayOrderId=:razorpayOrderId");
        $stmt->bindparam( ":email", $email );
        $stmt->bindparam( ":razorpayPaymentId", $razorpayPaymentId );
        $stmt->bindparam( ":paymentStatus", $paymentStatus );
        $stmt->bindparam( ":updatestamp", $updatestamp );
        $stmt->bindparam( ":razorpayOrderId", $razorpayOrderId );
        $stmt->execute();

        // Check if the payment is successful and the type is 'course_fee'
        if ($paymentStatus == 'SUCCESS' && $fee_type == 'course_fees') {
            // Retrieve the course IDs from the session variable
            $course_ids = $_SESSION['course_ids'];
			$student_id=$_SESSION['student_id'];

            // Insert the enrollment details into the enrollment table
            foreach ($course_ids as $course_id) {
                $enrollment_stmt = $this->conn->prepare("INSERT INTO enrollment (student_id, course_id, order_id) VALUES (:student_id, :course_id, :order_id)");
				$enrollment_stmt->bindParam(":student_id", $student_id);
                $enrollment_stmt->bindParam(":course_id", $course_id);
                $enrollment_stmt->bindParam(":order_id", $razorpayOrderId);
				$enrollment_stmt->execute();
				$cart_stmt = $this->conn->prepare("DELETE FROM cart WHERE course_id=:course_id and student_id=:student_id");
                $cart_stmt->bindParam(":student_id", $student_id);
                $cart_stmt->bindParam(":course_id", $course_id);
				$cart_stmt->execute();
               
            }
			
        }
		if ($paymentStatus == 'SUCCESS' && $fee_type == 'admission_fees') {
			$student_id=$_SESSION['student_id'];
			
			$select_query = "SELECT * FROM fees WHERE student_id = :student_id";
			$stmt = $this->conn->prepare($select_query);
			$stmt->bindParam(':student_id', $student_id);
			$stmt->execute();
			$fetch_query = $stmt->fetch(PDO::FETCH_ASSOC);
			$current_bal = $fetch_query['current_bal']; 
			$current_bal = $current_bal - $toValue;
			$update_query = "UPDATE fees SET current_bal = :current_bal WHERE student_id = :student_id";
			$stmt = $this->conn->prepare($update_query);
			$stmt->bindParam(':current_bal', $current_bal);
			$stmt->bindParam(':student_id', $student_id);
			$stmt->execute();

		}	
        return $stmt;
		
    } catch (PDOException $ex) {
        echo $ex->getMessage();
    }
}

}