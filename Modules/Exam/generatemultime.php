<?php
require('../Application/tcpdf/tcpdf.php');

if (isset($_POST['generate'])) {
    $numberOfTimetables = intval($_POST['no']);
    
    // Create a TCPDF object
    $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8');

    // Set document information
    $pdf->SetCreator('Academia');
    $pdf->SetAuthor('Academia');
    $pdf->SetTitle('Timetable');
    $pdf->SetSubject('Generated Timetables');

    // Generate multiple timetables
    for ($i = 1; $i <= $numberOfTimetables; $i++) {
        // Get the timetable data from the form inputs
        $course = $_POST['course'];
        $specialisation = $_POST['specialisation'];
        $semester = $_POST['semester'];
        $subjects = array();
        $startTimes = array();
        $endTimes = array();
        $examDates = array();
        
        for ($j = 1; $j <= 6; $j++) {
            $subject = $_POST['subject' . $j];
            $startTime = $_POST['startTime' . $j];
            $endTime = $_POST['endTime' . $j];
            $examDate = $_POST['examDate' . $j];
            
            if (!empty($subject) && !empty($startTime) && !empty($endTime) && !empty($examDate)) {
                $subjects[] = $subject;
                $startTimes[] = $startTime;
                $endTimes[] = $endTime;
                $examDates[] = $examDate;
            }
        }
        
        // Add a new page for each timetable
        if ($i > 1) {
            $pdf->AddPage();
        }

        // Set font and styles for the timetable
        $pdf->SetFont('helvetica', 'B', 16);
        $pdf->Cell(0, 10, "Timetable $i", 0, 1, 'C');
        $pdf->Ln(10);

        $pdf->SetFont('helvetica', 'B', 12);
        $pdf->Cell(40, 10, 'Course:', 0);
        $pdf->SetFont('helvetica', '', 12);
        $pdf->Cell(0, 10, $course, 0, 1);

        $pdf->SetFont('helvetica', 'B', 12);
        $pdf->Cell(40, 10, 'Specialisation:', 0);
        $pdf->SetFont('helvetica', '', 12);
        $pdf->Cell(0, 10, $specialisation, 0, 1);

        $pdf->SetFont('helvetica', 'B', 12);
        $pdf->Cell(40, 10, 'Semester:', 0);
        $pdf->SetFont('helvetica', '', 12);
        $pdf->Cell(0, 10, $semester, 0, 1);

        $pdf->SetFont('helvetica', 'B', 12);
        $pdf->Cell(40, 10, 'Subjects:', 0);
        $pdf->Ln(10);

        // Print the table header
        $pdf->SetFont('helvetica', 'B', 12);
        $pdf->Cell(60, 10, 'Subject', 1, 0, 'C');
        $pdf->Cell(40, 10, 'Start Time', 1, 0, 'C');
        $pdf->Cell(40, 10, 'End Time', 1, 0, 'C');
        $pdf->Cell(50, 10, 'Exam Date', 1, 1, 'C');

        // Print the table rows
        $pdf->SetFont('helvetica', '', 12);
        for ($k = 0; $k < count($subjects); $k++) {
            $pdf->Cell(60, 10, $subjects[$k], 1, 0, 'C');
            $pdf->Cell(40, 10, $startTimes[$k], 1, 0, 'C');
            $pdf->Cell(40, 10, $endTimes[$k], 1, 0, 'C');
            $pdf->Cell(50, 10, $examDates[$k], 1, 1, 'C');
        }
    }

    // Output the PDF as a file
    $pdf->Output('timetables.pdf', 'D');
}
?>
