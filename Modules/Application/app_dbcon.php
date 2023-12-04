<?php
    // Start the session
session_start();

//Check if the session value is set
if (isset($_SESSION['student_id'])) {
    // The session value is set
    echo "Session value is set.";
    echo $_SESSION['student_id'];
} else {
    // The session value is not set
    echo "Session value is not set.";
}

    include('../../php/db.php');
	//step 1
	if(isset($_POST["submit"])) {
        $student_id = $_SESSION['student_id'];
    	$name = $_POST['Name'];
    	$dob = $_POST['DOB'];
    	$nationality = $_POST['Nationality'];
    	$community   = $_POST['Community'];
		$caste = $_POST['Caste'];
		$category = $_POST['Category'];
		$aadhar = $_POST['Aadhar'];
		$pan = $_POST['PAN'];
		$blood_group = $_POST['BloodGroup'];
        $phone = $_POST['Phone'];
        $address = $_POST['Address'];
        $city = $_POST['City'];
        $pincode = $_POST['Pincode'];
        $state = $_POST['country-state'];
        $country = $_POST['Country'];
        $fname = $_POST['Father_name'];
        $mname = $_POST['Mother_Name'];
        $gname = $_POST['Guardian_Name'];
        $foccupation = $_POST['Father_Occupation'];
        $moccupation = $_POST['Mother_Occupation'];
        $goccupation = $_POST['Guardian_Occupation'];
        $fnumber = $_POST['Father_Number'];
        $mnumber = $_POST['Mother_Number'];
        $gnumber = $_POST['Guardian_Number'];
        $femail = $_POST['Father_email'];
        $memail = $_POST['Mother_email'];
        $gemail = $_POST['Guardian_email'];
        $finc = $_POST['Father_AI'];
        $minc = $_POST['Mother_AI'];
        $ginc = $_POST['Guardian_AI'];

        
        //echo "step1";
        echo $phone." ".$country." ".$address;
        $sql = "UPDATE `student` SET full_name='$name', dob='$dob', nationality='$nationality', community='$community', caste='$caste', category='$category', aadhar='$aadhar', pan='$pan', blood_group='$blood_group',phone='$phone', address='$address', city='$city', pincode='$pincode', state='$state', country='$country',fname='$fname', mname='$mname', gname='$gname', foccupation='$foccupation', moccupation='$moccupation', goccupation='$goccupation', fmobile='$fnumber', mmobile='$mnumber', gmobile='$gnumber', femail='$femail', memail='$memail', gemail='$gemail', fincome='$finc', mincome='$minc', gincome='$ginc' WHERE student_id ='$student_id'";
        $result=mysqli_query($con,$sql);
        if ($result==0)
        {   
           //echo "step1 error";
            mysqli_error($con);
        }
        //echo "step2";
        //echo "<script language='javascript'>window.alert('step1 Successful')";
    //step 4
        //echo "step 4";
        
    $year = $_POST['AYear'];

for ($i = 1; $i <= 6; $i++) {
    $semester = $i;
    echo $semester;
    $res = $_POST[$semester . 'sem_res'];
    $result = $_POST['Result' . $semester];
    $sgpa = $_POST['sgpa' . $semester];
    echo $sgpa;

    // Check if the data already exists in the database
    $select_query = "SELECT * FROM `exam` WHERE student_id='$student_id' AND semesters='$semester'";
    $existing_data = mysqli_query($con, $select_query);
    $rows = mysqli_num_rows($existing_data);

    if ($rows > 0) {
        // Data already exists, perform update
        $update_query = "UPDATE `exam` SET sgpa='$sgpa', result='$result', rmonth_year='$res' WHERE student_id='$student_id' AND semesters='$semester'";
        $result = mysqli_query($con, $update_query);

        if (mysqli_affected_rows($con) == 0) {
            // Handle the error or display a message
            echo "Failed to update data for Semester $semester";
        }
    } else {
        // Data doesn't exist, perform insert
        $insert_query = "INSERT INTO `exam` (student_id, semesters, sgpa, result, rmonth_year)
                        VALUES ('$student_id', '$semester', '$sgpa', '$result', '$res')";
        $result = mysqli_query($con, $insert_query);

        if (mysqli_affected_rows($con) == 0) {
            // Handle the error or display a message
            echo "Failed to insert data for Semester $semester";
        }
    }
}


    //step 5 and step 7
$sign = $_FILES['sign_img'];
$transfer_img = $_FILES['transfer_img'];
$migration_img = $_FILES['migration_img'];
$photo_img = $_FILES['photo_img'];
$caste_img = $_FILES['caste_img'];
$marks_img = $_FILES['marks_img'];

// Function to retrieve existing file data from the database
function retrieveExistingFile($fieldName)
{
    global $con, $student_id;
    $sql = "SELECT $fieldName FROM `upload` WHERE student_id='$student_id'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row[$fieldName];
}

// Check if new files are selected, if not, retrieve existing file data from the database
$sign_img_content = isset($sign['tmp_name']) && !empty($sign['tmp_name']) ? file_get_contents($sign['tmp_name']) : retrieveExistingFile('sign');
$transfer_img_content = isset($transfer_img['tmp_name']) && !empty($transfer_img['tmp_name']) ? file_get_contents($transfer_img['tmp_name']) : retrieveExistingFile('transfer');
$migration_img_content = isset($migration_img['tmp_name']) && !empty($migration_img['tmp_name']) ? file_get_contents($migration_img['tmp_name']) : retrieveExistingFile('migration');
$photo_img_content = isset($photo_img['tmp_name']) && !empty($photo_img['tmp_name']) ? file_get_contents($photo_img['tmp_name']) : retrieveExistingFile('photo');
$caste_img_content = isset($caste_img['tmp_name']) && !empty($caste_img['tmp_name']) ? file_get_contents($caste_img['tmp_name']) : retrieveExistingFile('caste');
$marks_img_content = isset($marks_img['tmp_name']) && !empty($marks_img['tmp_name']) ? file_get_contents($marks_img['tmp_name']) : retrieveExistingFile('marks_card');


$sql = "SELECT * FROM `upload` WHERE student_id='$student_id'";
$result = mysqli_query($con, $sql);
$rows = mysqli_num_rows($result);

if ($rows == 1) {
    $sql = "UPDATE `upload` SET sign = ?, transfer = ?, migration = ?, photo = ?, caste = ?, marks_card = ? WHERE student_id = ?";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "sssssss", $sign_img_content, $transfer_img_content, $migration_img_content, $photo_img_content, $caste_img_content, $marks_img_content, $student_id);
    mysqli_stmt_execute($stmt);
} else {
    $sql = "INSERT INTO `upload` (student_id, sign, transfer, migration, photo, caste, marks_card) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "sssssss", $student_id, $sign_img_content, $aadhar_img_content, $migration_img_content, $photo_img_content, $caste_img_content, $marks_img_content);
    mysqli_stmt_execute($stmt);
}

//echo "<script language='javascript'>window.alert('Application Updated Successfully');window.location='Adm1.php';</script>";
    }
?>