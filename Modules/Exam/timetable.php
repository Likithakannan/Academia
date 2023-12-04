<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Timetable</title>
        <style>
                /*tables*/
                table {
                        align-items: center;
                        margin: auto;
                        background-color: white;
                }

                /* CSS for table */
                /*table .fees{
	 width: 100%; 
	 border-collapse: collapse; 
	 table-layout: fixed; 
}*/
                table {
                        border-collapse: collapse;
                        margin-bottom: 40px;
                }

                /* th,td .fees {
	  padding: 10px;
	 text-align: left;
	  border: 1px solid #ddd;
} */

                th,
                td {
                        border: 0.1px solid black;
                        width: 75%;
                        padding: 10px;
                        
                }

                .table-wrapper {
                        /* display:inline-table; */
                        /* margin-right: 10px; */
                        display: flex;
                        justify-content: center;
                }
        </style>
</head>

<body>
        <section class="home-section">
                <div class="card" data-step>
                        <div class="table-wrapper">
                                <?php
                                if (isset($_POST['generate'])) {
                                        $course = $_POST['course'];
                                        $specialisation = $_POST['specialisation'];

                                        // Check if the course field is selected
                                        if ($course && $course !== "Select a course") {
                                                if ($specialisation && $specialisation !== "Select a specialisation") {
                                                        $subjects = array();

                                                        // Retrieve subjects and examdate timings
                                                        for ($i = 1; $i <= 6; $i++) {
                                                                $subjectKey = 'subject' . $i;
                                                                $startTimeKey = 'startTime' . $i;
                                                                $endTimeKey = 'endTime' . $i;
                                                                $examDate = 'examDate' . $i;
                                                                if (!empty($_POST[$subjectKey]) && !empty($_POST[$startTimeKey]) && !empty($_POST[$endTimeKey]) && !empty($_POST[$examDate])) {
                                                                        $subject = $_POST[$subjectKey];
                                                                        $startTime = $_POST[$startTimeKey];
                                                                        $endTime = $_POST[$endTimeKey];
                                                                        $examDate = $_POST[$examDate];
                                                                        $subjects[] = array('subject' => $subject, 'startTime' => $startTime, 'endTime' => $endTime, 'examDate' => $examDate);
                                                                }
                                                        }

                                                        // Display the generated timetable

                                                        if (!empty($subjects)) {
                                                                echo "<table>
                                                                <thead>";
                                                                echo "<tr><th colspan='4'><h1>Timetable for $course</h1></th></tr>";
                                                                echo "<tr>
                                                                <th>Subject</th>
                                                                <th>Start Time</th>
                                                                <th>End Time</th>
                                                                <th>Date</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>";

                                                                foreach ($subjects as $subject) {
                                                                        echo "<tr>";
                                                                        echo "<td>" . $subject['subject'] . "</td>";
                                                                        echo "<td>" . $subject['startTime'] . "</td>";
                                                                        echo "<td>" . $subject['endTime'] . "</td>";
                                                                        if (isset($subject['examDate'])) {
                                                                                echo "<td>" . $subject['examDate'] . "</td>";
                                                                        } else {
                                                                                echo "<td>N/A</td>"; // Display N/A if exam date is not provided
                                                                        }
                                                                        echo "</tr>";
                                                                }

                                                                echo "</tbody>
                                                                        </table>";
                                                        } else {
                                                                echo "<p>No subjects and timings provided.</p>";
                                                        }
                                                }
                                        } else {
                                                echo "<p>Please select a course.</p>";
                                        }
                                }
                                ?>
                        </div>
                </div>
        </section>
</body>
</html>