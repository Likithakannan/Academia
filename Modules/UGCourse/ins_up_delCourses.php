<?php
session_start();
include('db_config_co.php');
if(isset($_SESSION['email'])){
	$email = $_SESSION['email'];
}else{
	header("Location: ../Register & login/login.php");
}

$connection=mysqli_connect("localhost","root","","academia");

if(isset($_POST['save'])){
    $ugname = $_POST['ugname'];
    $image = $_FILES['image'];
    $img = file_get_contents($image["tmp_name"]);
    $short_desc = $_POST['short_desc'];
    $desc = $_POST['desc'];
    $prerequisites = $_POST['prerequisites'];
    $fees = $_POST['fees'];
    
    $query = "SELECT * FROM ugc WHERE ugname='$ugname'";
    $result = mysqli_query($connection,$query);
    $row_count = mysqli_num_rows($result);
    if($row_count > 0){
        echo "<script language='javascript'>window.alert('Data already exists');window.location='ugcourses.php';</script>";
    }else{
        $query = "INSERT INTO ugc (ugname,image,short_desc,`desc`,prerequisites,fees) VALUES (?, ?, ?, ?, ?, ?)";
        $query_run = mysqli_prepare($connection, $query);
        mysqli_stmt_bind_param($query_run, "sssssi", $ugname, $img, $short_desc, $desc, $prerequisites, $fees);
        //mysqli_stmt_execute($query_run);

        if (mysqli_stmt_execute($query_run)) {
            $ugid = mysqli_insert_id($connection);
        } else {
            echo "Error: " . mysqli_error($connection);
        }
        // Get the semester names from the form
$semesters = isset($_POST['sem_name']) ? $_POST['sem_name'] : [];

// Insert data into the semesters table
foreach ($semesters as $semesterID => $semesterName) {
    $sql = "INSERT INTO semester (ugid, sem_name) VALUES ('$ugid', '$semesterName')";
    mysqli_query($connection, $sql);

     echo "prev".$semesterID;

    // Get the ID of the last inserted row in semesters table
    $semID = mysqli_insert_id($connection);
    echo "prev1 : ".$semID;

    // Insert data into the subjects table
    $subjectNames = isset($_POST['sub_name'][$semesterID]) ? $_POST['sub_name'][$semesterID] : [];
    $subjectNames = $_POST['sub_name'][$semesterID];
    foreach ($subjectNames as $subjectName) {
        $subjectName = trim($subjectName);
                if (empty($subjectName)) {
                    continue;
                }
        echo "sub_name1 : ".$subjectName;
        $sql = "INSERT INTO subject (sem_id, sub_name) VALUES ('$semID', '$subjectName')";
        mysqli_query($connection, $sql);
        echo "after1 : ".$semID;
    }
    echo "after".$semesterID;

    // Insert data into the electives table
    $electiveNames = isset($_POST['elective_name'][$semesterID]) ? $_POST['elective_name'][$semesterID] : [];
    $subjectNames = $_POST['elective_name'][$semesterID];
    foreach ($electiveNames as $electiveName) {
        if (!empty($electiveName)) {
            $sql = "INSERT INTO elective (sem_id, elective_name) VALUES ('$semID', '$electiveName')";
            mysqli_query($connection, $sql);
        }
    }
}

    echo "<script language='javascript'>window.alert('Data published successfully');window.location='ugcourses.php';</script>";

        
    }
}

if (isset($_POST['update'])) {
    // Retrieve form data
    $editedID = $_POST['edited_id'];
    $ugname = $_POST['ugname'];
    $image = $_FILES['image'];
    $img = file_get_contents($image["tmp_name"]);
    $short_desc = $_POST['short_desc'];
    $desc = $_POST['desc'];
    $prerequisites = $_POST['prerequisites'];

    // Update existing data in the database
    $updateQuery = "UPDATE ugc SET ugname = ?, image = ?, short_desc = ?, `desc` = ?, prerequisites = ? WHERE ugid = ?";
    $updateResult = mysqli_prepare($connection, $updateQuery);
    mysqli_stmt_bind_param($updateResult, "sssssi", $ugname, $img, $short_desc, $desc, $prerequisites, $editedID);
    mysqli_stmt_execute($updateResult);

    if (mysqli_stmt_affected_rows($updateResult) >= 0) {
        // Data updated successfully

        // Update semesters, subjects, and electives
        $semesters = isset($_POST['sem_name']) ? $_POST['sem_name'] : [];
        echo "=========================";
        print_r($semesters);
        echo "=========================";
        foreach ($semesters as $index => $semesterName) {
            echo "index inside semesters=$index";
            echo "semesterName=$semesterName";
            // Remove any empty semester names
            $semesterName = trim($semesterName);
            if (empty($semesterName)) {
                continue;
            }

            $semesterID = isset($_POST['sem_id'][$index]) ? $_POST['sem_id'][$index] : null;
            echo "semesterId=$semesterID";
            // Check if the semester already exists
            if (!$semesterID) {
                // Insert new semester
                $insertSemesterQuery = "INSERT INTO semester (ugid, sem_name) VALUES (?, ?)";
                $insertSemesterResult = mysqli_prepare($connection, $insertSemesterQuery);
                mysqli_stmt_bind_param($insertSemesterResult, "is", $editedID, $semesterName);
                mysqli_stmt_execute($insertSemesterResult);

                $semesterID = mysqli_insert_id($connection);
                 /*if(!(mysqli_stmt_execute($insertSemesterResult))){
                    mysqli_connect_error($connection);
                }*/
            } 
            // else {
            //     // Update existing semester
            //     $updateSemesterQuery = "UPDATE semester SET sem_name = ? WHERE sem_id = ? AND ugid = ?";
            //     $updateSemesterResult = mysqli_prepare($connection, $updateSemesterQuery);
            //     mysqli_stmt_bind_param($updateSemesterResult, "sii", $semesterName, $semesterID, $editedID);
            //     mysqli_stmt_execute($updateSemesterResult);
            //     if(!(mysqli_stmt_execute($updateSemesterResult))){
            //         mysqli_connect_error($connection);
            //     }
            // }

            // Process subjects for the current semester
            $subjects = isset($_POST['sub_name'][$index]) ? $_POST['sub_name'][$index] : [];
                echo "subjects array=\n";
                print_r($subjects);
                echo "\n";
                echo "var_dump output for subjects\n"; 
                var_dump($subjects);
                echo "\n";
            foreach ($subjects as $subjectIndex => $subjectName) {
                echo "sub : ".$subjectName;
                // Remove any empty subject names
                $subjectName = trim($subjectName);
                if (empty($subjectName)) {
                    continue;
                }

                $subjectID = isset($_POST['subject_id'][$index][$subjectIndex]) ? $_POST['subject_id'][$index][$subjectIndex] : null;
                echo "===============Subject ID=======\n";
                print_r($subjectID);
                echo "\n";
                echo "var_dump output\n";
                var_dump($subjectID);
                echo "\n";
                // Check if the subject already exists
                if (!$subjectID) {
                    echo "inside the subject not empty statement\n";
                    echo "sem_id=$semesterID\n";
                    echo "subjectName=$subjectName\n";
                    // Insert new subject
                    $insertSubjectQuery = "INSERT INTO subject (sem_id, sub_name) VALUES (?, ?)";
                    $insertSubjectResult = mysqli_prepare($connection, $insertSubjectQuery);
                    mysqli_stmt_bind_param($insertSubjectResult, "is", $semesterID, $subjectName);
                    mysqli_stmt_execute($insertSubjectResult);
                } else {
                    echo "inside subject already exists statement\n";
                    echo "subjectId=$subjectID\n";
                    echo "sem_id=$semesterID\n";
                    echo "subjectName=$subjectName\n";
                    // Update existing subject
                    $updateSubjectQuery = "UPDATE subject SET sub_name = ? WHERE sub_id = ? AND sem_id = ?";
                    $updateSubjectResult = mysqli_prepare($connection, $updateSubjectQuery);
                    mysqli_stmt_bind_param($updateSubjectResult, "sii", $subjectName, $subjectID, $semesterID);
                    mysqli_stmt_execute($updateSubjectResult);
                }
            }

            // Process electives for the current semester
            $electives = isset($_POST['elective_name'][$index]) ? $_POST['elective_name'][$index] : [];
            echo "===============Electives =======\n";
                print_r($electives);
                echo "\n";
                echo "var_dump output for electives\n";
                var_dump($electives);
                echo "\n";
            foreach ($electives as $electiveIndex => $electiveName) {
                echo "electiveIndex=$electiveIndex\n";
                echo "electiveName=$electiveName";
                // Remove any empty elective names
                $electiveName = trim($electiveName);
                if (empty($electiveName)) {
                    continue;
                }

                $electiveID = isset($_POST['elective_id'][$index][$electiveIndex]) ? $_POST['elective_id'][$index][$electiveIndex] : null;
                 print_r($electiveID);
                echo "\n";
                echo "var_dump output for electiveID\n";
                var_dump($electiveID);
                echo "\n";

                // Check if the elective already exists
                if (!$electiveID) {
                    echo "inside the electiveID not empty statement\n";
                    echo "sem_id=$semesterID\n";
                    echo "elective_name=$electiveName\n";
                    // Insert new elective
                    $insertElectiveQuery = "INSERT INTO elective (sem_id, elective_name) VALUES (?, ?)";
                    $insertElectiveResult = mysqli_prepare($connection, $insertElectiveQuery);
                    mysqli_stmt_bind_param($insertElectiveResult, "is", $semesterID, $electiveName);
                    mysqli_stmt_execute($insertElectiveResult);
                } else {
                    // Update existing elective
                    echo "inside else part of electiveID already exists statement\n";
                    echo "electiveID=$electiveID\n";
                    echo "elective_name=$electivename\n";
                    echo "sem_id=$semesterID\n";
                    $updateElectiveQuery = "UPDATE elective SET elective_name = ? WHERE elective_id = ? AND sem_id = ?";
                    $updateElectiveResult = mysqli_prepare($connection, $updateElectiveQuery);
                    mysqli_stmt_bind_param($updateElectiveResult, "sii", $electiveName, $electiveID, $semesterID);
                    mysqli_stmt_execute($updateElectiveResult);
                    /*if(!(mysqli_stmt_execute($updateElectiveResult))){
                    mysqli_connect_error($connection);
                    }*/
                }
            }
        }

        echo "Data updated successfully.";
    } else {
        echo "Failed to update data.";
    }
}

if (isset($_POST['data_delete'])) {
    $ugid = $_POST['delete_id'];

    // Delete ugcourses
    $deleteQuery = "DELETE FROM ugc WHERE ugid='$ugid'";
    $deleteResult = mysqli_query($connection, $deleteQuery);
    if (!$deleteResult) {
        echo "Error deleting ugcourses data: " . mysqli_error($connection);
        echo "<script language='javascript'>window.alert('Data not deleted');window.location='ugcourses.php';</script>";
        exit();
    }

    // Delete specialisation
    $deleteQuery = "DELETE FROM specialisation WHERE ugid='$ugid'";
    $deleteResult = mysqli_query($connection, $deleteQuery);
    if (!$deleteResult) {
        echo "Error deleting specialisation data: " . mysqli_error($connection);
        echo "<script language='javascript'>window.alert('Data not deleted');window.location='ugcourses.php';</script>";
        exit();
    }

    // Delete semesters
    $selectQuery = "SELECT sem_id FROM semester WHERE ugid='$ugid'";
    $selectResult = mysqli_query($connection, $selectQuery);
    if (!$selectResult) {
        echo "Error selecting semester IDs: " . mysqli_error($connection);
        echo "<script language='javascript'>window.alert('Data not deleted');window.location='ugcourses.php';</script>";
        exit();
    }

    while ($row = mysqli_fetch_assoc($selectResult)) {
        $semesterID = $row['sem_id'];

        // Delete subjects
        $deleteQuery = "DELETE FROM subject WHERE sem_id='$semesterID'";
        $deleteResult = mysqli_query($connection, $deleteQuery);
        if (!$deleteResult) {
            echo "Error deleting subject data: " . mysqli_error($connection);
            //echo "<script language='javascript'>window.alert('Data not deleted');window.location='ugcourses.php';</script>";
            exit();
        }

        // Delete electives
        $deleteQuery = "DELETE FROM elective WHERE sem_id='$semesterID'";
        $deleteResult = mysqli_query($connection, $deleteQuery);
        if (!$deleteResult) {
            echo "Error deleting elective data: " . mysqli_error($connection);
            //echo "<script language='javascript'>window.alert('Data not deleted');window.location='ugcourses.php';</script>";
            exit();
        }
    }

    // Delete semesters (after deleting subjects and electives)
    $deleteQuery = "DELETE FROM semester WHERE ugid='$ugid'";
    $deleteResult = mysqli_query($connection, $deleteQuery);
    if (!$deleteResult) {
        echo "Error deleting semester data: " . mysqli_error($connection);
        //echo "<script language='javascript'>window.alert('Data not deleted');window.location='ugcourses.php';</script>";
        exit();
    }

    // Redirect to ugcourses.php after successful deletion
    //echo "<script language='javascript'>window.alert('Data Deleted');window.location='ugcourses.php';</script>";
} else {
    //echo "<script language='javascript'>window.alert('Data not deleted');window.location='ugcourses.php';</script>";
}


?>