<?php
require('../Application/tcpdf/tcpdf.php');

// Get the form data from the POST request
$course = $_POST['course'];
$specialisation = $_POST['specialisation'];
$semester = $_POST['semester'];

// Create a new PDF document
$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8');

// Set document information
$pdf->SetCreator('Academia');
$pdf->SetAuthor('Academia');
$pdf->SetTitle('Exam Timetable');
$pdf->SetSubject('Exam Timetable');

// Add a page
$pdf->AddPage();

// Set font
$pdf->SetFont('helvetica', 'B', 16);

// Output course information
$pdf->Cell(0, 10, "Course: $course - $specialisation", 0, 1, 'C');
$pdf->Cell(0, 10, "Semester: $semester", 0, 1, 'C');

// Set font for table header
$pdf->SetFont('helvetica', 'B', 12);

$subject1Data = isset($_POST['subject1Data']) ? $_POST['subject1Data'] : "";
$subject2Data = isset($_POST['subject2Data']) ? $_POST['subject2Data'] : "";
$subject3Data = isset($_POST['subject3Data']) ? $_POST['subject3Data'] : "";
$subject4Data = isset($_POST['subject4Data']) ? $_POST['subject4Data'] : "";
$subject5Data = isset($_POST['subject5Data']) ? $_POST['subject5Data'] : "";
$subject6Data = isset($_POST['subject6Data']) ? $_POST['subject6Data'] : "";

$startTime1Data = isset($GLOBALS['startTime1Data']) ? $GLOBALS['startTime1Data'] : "";
$endTime1Data = isset($GLOBALS['endTime1Data']) ? $GLOBALS['endTime1Data'] : "";
$examDate1Data = isset($GLOBALS['examDate1Data']) ? $GLOBALS['examDate1Data'] : "";

$subject1 = $subject1Data;
$subject2 = $subject2Data;
$subject3 = $subject3Data;
$subject4 = $subject4Data;
$subject5 = $subject5Data;
$subject6 = $subject6Data;

// Get the subject data from the POST request
$subjects = array(
    $subject1,
    $subject2,
    $subject3,
    $subject4,
    $subject5,
    $subject6
);

$startTimes = array(
    $_POST['startTime1'],
    $_POST['startTime2'],
    $_POST['startTime3'],
    $_POST['startTime4'],
    $_POST['startTime5'],
    $_POST['startTime6']
);

$endTimes = array(
    $_POST['endTime1'],
    $_POST['endTime2'],
    $_POST['endTime3'],
    $_POST['endTime4'],
    $_POST['endTime5'],
    $_POST['endTime6']
);

$examDates = array(
    $_POST['examDate1'],
    $_POST['examDate2'],
    $_POST['examDate3'],
    $_POST['examDate4'],
    $_POST['examDate5'],
    $_POST['examDate6']
);

// Set table header
$header = array('Subject', 'Start Time', 'End Time', 'Date');

// Set table column widths
$columnWidths = array(40, 30, 30, 40);

// Print the table header
$pdf->Cell($columnWidths[0], 10, $header[0], 1, 0, 'C');
$pdf->Cell($columnWidths[1], 10, $header[1], 1, 0, 'C');
$pdf->Cell($columnWidths[2], 10, $header[2], 1, 0, 'C');
$pdf->Cell($columnWidths[3], 10, $header[3], 1, 1, 'C');

// Set font for table content
$pdf->SetFont('helvetica', '', 12);

// Print the table content
for ($i = 0; $i < count($subjects); $i++) {
    $pdf->Cell($columnWidths[0], 10, $subjects[$i], 1, 0, 'C');
    $pdf->Cell($columnWidths[1], 10, $startTimes[$i], 1, 0, 'C');
    $pdf->Cell($columnWidths[2], 10, $endTimes[$i], 1, 0, 'C');
    $pdf->Cell($columnWidths[3], 10, $examDates[$i], 1, 1, 'C');
}

// Output the PDF as a file (downloadable)
$pdf->Output('course_schedule.pdf', 'D');
