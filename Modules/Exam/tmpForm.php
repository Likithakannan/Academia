<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Exam</title>
        <!-- <link rel="stylesheet" href="adm.css"> -->
        <!-- <link rel="stylesheet" type="text/css" href="/css/font-awesome.css"> -->
        <link rel="stylesheet" type="text/css" href="../Dashboard/dashboard.css">
        <!-- <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Rounded" rel="stylesheet"> -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@48,400,0,0" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
        <script src="https://kit.fontawesome.com/3b822bcb84.js" crossorigin="anonymous"></script>
        <!-- <script src="adm.js" defer></script> -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</head>

<body>
<h2>Generate Timetable</h2>
                                <div class='table-wrapper'>
<?php
   
    require('fpdf/fpdf.php');

    $categoryDropdown = $_POST['categoryDropdown'];
    $subCategoryDropdown = $_POST['subCategoryDropdown'];
    $semCategoryDropdown = $_POST['semCategoryDropdown'];

    $connection = mysqli_connect("localhost", "root", "", "academia");
    if (!$connection) {
        die("Database connection failed: " . mysqli_connect_error());
    }

    $query = "SELECT * FROM syllabus";
    $query_run = mysqli_query($connection, $query);
    echo $categoryDropdown;
    echo $subCategoryDropdown;
    echo $semCategoryDropdown;

    if (mysqli_num_rows($query_run) > 0) {
        
        // $pdf = new FPDF();
        // $pdf->AddPage();

        // $pdf->SetFont('Arial', 'B', 16);
        // $pdf->Cell(0, 10, 'Timetable for ' . $categoryDropdown, 0, 1, 'C');

        while ($row = mysqli_fetch_assoc($query_run)) {
          
            // $subject = $row['subject1'];
            // $startTime = $row['startTime1'];
            // $endTime = $row['endTime1'];
            // $examDate = $row['examDate1'];

            // // Output subject, start time, end time, and exam date in the PDF
            // $pdf->SetFont('Arial', '', 12);
            // $pdf->Cell(50, 10, 'Subject: ' . $subject);
            // $pdf->Cell(50, 10, 'Start Time: ' . $startTime);
            // $pdf->Cell(50, 10, 'End Time: ' . $endTime);
            // $pdf->Cell(50, 10, 'Exam Date: ' . $examDate, 0, 1);
        }

        // $pdf->Output();


                                                include('db.php');

                                                if (isset($_POST['load'])) {
                                                    $course = $_POST['categoryDropdown'];
                                                    $specialisation = $_POST['subCategoryDropdown'];
                                                    $semester = $_POST['semCategoryDropdown'];
                                                        
                                                    // Escape the variables to prevent SQL injection
                                                    $escapedCourse = mysqli_real_escape_string($con, $course);
                                                    $escapedSpecialisation = mysqli_real_escape_string($con, $specialisation);
                                                    $escapedSemester = mysqli_real_escape_string($con, $semester);
                                                    //echo "$escapedCourse $escapedSpecialisation $escapedSemester";
                                                      echo $escapedCourse;  
                                                    // Construct the SQL query
                                                    $extract = "SELECT sub1,sub2,sub3,sub4,sub5,sub6 FROM syllabus WHERE course='$escapedCourse' AND sem='$escapedSemester'";
                                                    $extract1 = mysqli_query($con, $extract);
                                                    $extract_rows = mysqli_num_rows($extract1);
                                                    if ($extract_rows > 0) {
                                                        // Loop through the result rows
                                                        while ($row = mysqli_fetch_assoc($extract1)) {
                                                            $sub1 = $row['sub1'];
                                                            $sub2 = $row['sub2'];
                                                            $sub3 = $row['sub3'];
                                                            $sub4 = $row['sub4'];
                                                            $sub5 = $row['sub5'];
                                                            $sub6 = $row['sub6'];
                                                    
                                                            // Print the values
                                                            echo "
                                                            
                                                            <tr>
                                                            <td name='subject1' id='subject1'>Subject 1:</td>
                                                            <td> $sub1 </td>
                                                            ";
                                                            echo "<td><input type='time' name='startTime1' id='startTime1'></td>
                                                            <td><input type='time' name='endTime1' id='endTime1'></td>
                                                            <td><input type='date' name='examDate1' id='examDate1'></td>
                                                            </tr>
                                                            <tr>
                                                        <td>Subject 2:</td>
                                                        <td name='subject2' id='subject2'>$sub2</td>
                                                        <td><input type='time' name='startTime2' id='startTime'></td>
                                                        <td><input type='time' name='endTime2' id='endTime2'></td>
                                                        <td><input type='date' name='examDate2' id='examDate2'></td>
                                                </tr>
                                                <tr>
                                                        <td>Subject 3:</td>
                                                        <td name='subject3' id='subject3'>$sub3</td>
                                                        <td><input type='time' name='startTime3' id='startTime3'></td>
                                                        <td><input type='time' name='endTime3' id='endTime3'></td>
                                                        <td><input type='date' name='examDate3' id='examDate3'></td>
                                                </tr>
                                                <tr>
                                                        <td>Subject 4:</td>
                                                        <td name='subject4' id='subject4'>$sub4</td>
                                                        <td><input type='time' name='startTime4' id='startTime4'></td>
                                                        <td><input type='time' name='endTime4' id='endTime4'></td>
                                                        <td><input type='date' name='examDate4' id='examDate4'></td>
                                                </tr>
                                                <tr>
                                                        <td>Subject 5:</td>
                                                        <td name='subject5' id='subject5'>$sub5</td>
                                                        <td><input type='time' name='startTime5' id='startTime5'></td>
                                                        <td><input type='time' name='endTime5' id='endTime5'></td>
                                                        <td><input type='date' name='examDate5' id='examDate5'></td>
                                                </tr>
                                                <tr>
                                                        <td>Subject 6:</td>
                                                        <td name='subject6' id='subject6'>$sub6</td>
                                                        <td><input type='time' name='startTime6' id='startTime6'></td>
                                                        <td><input type='time' name='endTime6' id='endTime6'></td>
                                                        <td><input type='date' name='examDate6' id='examDate6'></td>
                                                </tr>
                                                ";
                                                        }
                                                    } else {
                                                        echo "No subjects found.";
                                                    }
                                                }
                                                
                                                
    }
?>
</table>
</div>
</body>
</html>