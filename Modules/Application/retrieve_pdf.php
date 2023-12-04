<?php
$con = mysqli_connect("localhost", "root", "", "academia");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit;
}

$query = "SELECT pdf FROM student_details WHERE sid = '11'";
$result = mysqli_query($con, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $pdfData = $row['pdf'];

    // Save the BLOB data as a file on the server
    $filePath = 'path/to/save/file.pdf';
    file_put_contents($filePath, $pdfData);

    // Open the saved file
    header("Content-type: application/pdf");
    header("Content-Disposition: inline; filename='file.pdf'");
    readfile($filePath);

    // Delete the temporary file from the server
    unlink($filePath);
} else {
    echo "PDF data not found.";
}

mysqli_close($con);
?>
