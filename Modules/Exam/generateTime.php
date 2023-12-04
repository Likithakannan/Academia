<?php


session_start();
    function fetch_data(){
        $output = '';
        $output = '<style>
        table {
                align-items: center;
                margin: auto;
                background-color: white;
        }

        table {
                border-collapse: collapse;
                margin-bottom: 40px;
        }

        th{
                font-size:15px;
                border: 0.1px solid black;
                width: 75%;
                padding: 10px;
                font-weight: bold;
        }
        td {
                border: 0.1px solid black;
                width: 75%;
                padding: 10px;
        }

        .table-wrapper {
                
                display: flex;
                justify-content: center;
        }
</style>
<section class="home-section">
                <div class="card" data-step>
                        <div class="table-wrapper">';
                        if (isset($_POST['generate'])) {
                                $course = $_POST['course'];
                                $specialisation = $_POST['specialisation'];
                                $semester=$_POST['semester'];
                                if ($course && $course !== "Select a course") {
                                    if ($specialisation && $specialisation !== "Select a specialisation") {
                                        $subjects = array();
                            
                                        for ($i = 1; $i <= 6; $i++) {
                                            $subjectKey = 'subject' . $i;
                                            $startTimeKey = 'startTime' . $i;
                                            $endTimeKey = 'endTime' . $i;
                                            $examDateKey = 'examDate' . $i;
                                            if (!empty($_POST[$subjectKey]) && !empty($_POST[$startTimeKey]) && !empty($_POST[$endTimeKey]) && !empty($_POST[$examDateKey])) {
                                                $subject = $_POST[$subjectKey];
                                                $startTime = $_POST[$startTimeKey];
                                                $endTime = $_POST[$endTimeKey];
                                                $examDate = $_POST[$examDateKey];
                                                $subjects[] = array('subject' => $subject, 'startTime' => $startTime, 'endTime' => $endTime, 'examDate' => $examDate);
                                            }
                                        }
                            
                                        if (!empty($subjects)) {
                                            $output .= '<table style="width:100%">';
                                            $output .= '<thead>';
                                            $output .= '<h1>Timetable for ' . $course . '</h1>';
                                            $output .= '<tr>';
                                            $output .= '<th style="width:25%">Subject</th>';
                                            $output .= '<th style="width:25%">Start Time</th>';
                                            $output .= '<th style="width:25%">End Time</th>';
                                            $output .= '<th style="width:25%">Date</th>';
                                            $output .= '</tr>';
                                            $output .= '</thead>';
                                            $output .= '<tbody>';
                            
                                            foreach ($subjects as $subject) {
                                                $output .= '<tr>';
                                                $output .= '<td style="width:25%">' . $subject['subject'] . '</td>';
                                                $output .= '<td style="width:25%">' . $subject['startTime'] . '</td>';
                                                $output .= '<td style="width:25%">' . $subject['endTime'] . '</td>';
                                                // $output .= '<td >' . $subject['examDate'] . '</td>';
                                                if (isset($subject['examDate'])) {
                                                        $output .= '<td style="width:25%">' . $subject['examDate'] . '</td>';
                                                } else {
                                                        $output .= '<td>N/A</td>';
                                                }  
                                                
                                                // $output .= isset($subject['examDate']) ? '<td>' . $subject['examDate'] . '</td>' : '<td>N/A</td>';
                                                $output .= '</tr>';
                                            }
                            
                                            $output .= '</tbody>';
                                            $output .= '</table>';
                                        } else {
                                            $output .= '<p>No subjects and timings provided.</p>';
                                        }
                                    }
                                } else {
                                    $output .= '<p>Please select a course.</p>';
                                }
                            }
                            
                            $output .= '</div>';
                            $output .= '</div>';
                            $output .= '</section>';
                            
                            return $output;
                            
    }
    $content = '';
    if (isset($_POST['generate'])) {
        require_once("../Application/tcpdf/tcpdf.php");        
        $obj_pdf = new TCPDF('P',PDF_UNIT,PDF_PAGE_FORMAT,true,'UTF-8',false);
        $obj_pdf->SetCreator(PDF_CREATOR);  
        $obj_pdf->SetTitle("Time Table");  
        $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
        $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
        $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
        $obj_pdf->SetDefaultMonospacedFont('helvetica');  
        $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
        $obj_pdf->SetMargins(3, 5, 20, 'mm');
 
        $obj_pdf->setPrintHeader(false);  
        $obj_pdf->setPrintFooter(false);  
        $obj_pdf->SetAutoPageBreak(TRUE, 10);  
        $obj_pdf->SetFont('helvetica', '', 15);  
        $obj_pdf->AddPage();  
        $content .= fetch_data();
        $obj_pdf->writeHTML($content);
        $obj_pdf->Output("time_table.pdf","I");
    }
    