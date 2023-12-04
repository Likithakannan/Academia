<?php
 $connection = mysqli_connect("localhost", "root", "", "academia");

 // Check if the connection was successful
 if (!$connection) {
   die("Database connection failed: " . mysqli_connect_error());
 }

 $pdfPath="SELECT pdf FROM student_details";
 $pdfPath_run = mysqli_query($connection, $pdfPath);
 if (mysqli_num_rows($pdfPath_run) > 0) {
        while ($row = mysqli_fetch_assoc($pdfPath_run)) {
                echo $row['pdf'];
        }

// if (isset($_POST['pdf'])) {
//     $pdfPath = $_POST['pdf'];
    
    // Rest of the code remains the same as before
    // Set the appropriate headers for PDF download or display
    header('Content-Type: application/pdf');
    header('Content-Disposition: inline; filename="document.pdf"');
    
    // Output the PDF data
    readfile($pdfPath);
} else {
    echo 'PDF path not provided.';
}
?>
