<?php
// Assuming you have established a database connection

// Insert Semester Data
if (isset($_POST['submit'])) {
    $semesterNames = $_POST['semester_name'];
    $semesterDurations = $_POST['semester_duration'];

    foreach ($semesterNames as $key => $semesterName) {
        $semesterName = mysqli_real_escape_string($conn, $semesterName);
        $semesterDuration = mysqli_real_escape_string($conn, $semesterDurations[$key]);

        // Insert into 'semester' table
        $semesterQuery = "INSERT INTO semester (semester_name, duration) VALUES ('$semesterName', '$semesterDuration')";
        mysqli_query($conn, $semesterQuery);
        $semesterId = mysqli_insert_id($conn);

        // Insert Subjects
        if (isset($_POST['subject_name'][$key]) && isset($_POST['subject_code'][$key])) {
            $subjectNames = $_POST['subject_name'][$key];
            $subjectCodes = $_POST['subject_code'][$key];

            foreach ($subjectNames as $subKey => $subjectName) {

                $subjectName = mysqli_real_escape_string($conn, $subjectName);
                $subjectCode = mysqli_real_escape_string($conn, $subjectCodes[$subKey]);

                // Insert into 'subject' table
                $subjectQuery = "INSERT INTO subject (semester_id, subject_name, subject_code) VALUES ('$semesterId', '$subjectName', '$subjectCode')";
                mysqli_query($conn, $subjectQuery);
            }
        }

        // Insert Electives
        if (isset($_POST['elective_name'][$key]) && isset($_POST['elective_code'][$key])) {
            $electiveNames = $_POST['elective_name'][$key];
            $electiveCodes = $_POST['elective_code'][$key];

            foreach ($electiveNames as $eleKey => $electiveName) {
                $electiveName = mysqli_real_escape_string($conn, $electiveName);
                $electiveCode = mysqli_real_escape_string($conn, $electiveCodes[$eleKey]);

                // Insert into 'elective' table
                $electiveQuery = "INSERT INTO elective (semester_id, elective_name, elective_code) VALUES ('$semesterId', '$electiveName', '$electiveCode')";
                mysqli_query($conn, $electiveQuery);
            }
        }
    }

    // Redirect or display success message
    header("Location: success.php");
    exit();
}