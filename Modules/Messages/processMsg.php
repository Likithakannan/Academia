<?php
include('db.php');
session_start();
if(isset($_SESSION['email'])){
	$email = $_SESSION['email'];
}else{
	header("Location: ../Register & login/login.php");
}

// Retrieve form data
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

// Prepare and execute SQL query to insert the message into the "messages" table
$sql = "INSERT INTO messages (student_id, email, message) VALUES ('$name', '$email', '$message')";

if ($con->query($sql) === TRUE) {
    echo "<script>alert('Message sent successfully!')</script>";
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}
header("Location: stuMsg.php");
// Close the database connection
$con->close();
?>
