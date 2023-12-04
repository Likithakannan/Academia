<?php
    // Start the session
session_start();
/*
// Check if the session value is set
if (isset($_SESSION['student_id'])) {
    // The session value is set
    echo "Session value is set.";
    echo $_SESSION['username'];
    echo $_SESSION['student_id'];
} else {
    // The session value is not set
    echo "Session value is not set.";
}*/

    include('../php/db.php');
	//step 1
	if(isset($_POST["submit"])) {
        //$student_id = $_SESSION['student_id'];
    	$name = $_REQUEST['Name'];
    	$dob = $_REQUEST['DOB'];
    	$nationality = $_REQUEST['Nationality'];
    	$community   = $_REQUEST['Community'];
	$caste = $_REQUEST['Caste'];
	$category = $_REQUEST['Category'];
	$aadhar = $_REQUEST['Aadhar'];
	$pan = $_REQUEST['PAN'];
	$blood_group = $_REQUEST['BloodGroup'];
        
        $sql = "UPDATE `student` SET full_name='$name', dob='$dob', nationality='$nationality', community='$community', caste='$caste', category='$category', aadhar='$aadhar', pan='$pan', blood_group='$blood_group' WHERE student_id ='$student_id'";
        $result=mysqli_query($con,$sql);
        if (mysqli_affected_rows($con) == 0)
        {
            mysqli_error($con);
        }
        echo "<script language='javascript'>window.alert('step1 Successful')";
	//step 2
        $phone = $_REQUEST['Phone'];
        $address = $_REQUEST['Address'];
        $city = $_REQUEST['City'];
        $pincode = $_REQUEST['Pincode'];
        $state = $_REQUEST['State'];
        $country = $_REQUEST['Country'];
        $sql = "SELECT * FROM `contact` WHERE student_id='$student_id'";
        $result = mysqli_query($con,$sql);

        if($result){
                $sql = "UPDATE `contact` SET mobile='$phone', address='$address', city='$city', pincode='$pincode', state='$state', country='$country' WHERE student_id = '$student_id'";
                $result=mysqli_query($con,$sql);
                if($result == 0){
                    echo "step 2 error";
                    mysqli_error($con);
                }
                echo "<script language='javascript'>window.alert('step2 Successful')";
            }
            else{
                $sql = "INSERT INTO `contact` (student_id, mobile, address, city, pincode, state, country)
                VALUES ('$student_id', '$phone', '$address', '$city', '$pincode', '$state', '$country')
                ON DUPLICATE KEY UPDATE
                mobile = VALUES(mobile),
                address = VALUES(address),
                city = VALUES(city),
                pincode = VALUES(pincode),
                state = VALUES(state),
                country = VALUES(country)";
            //$sql = "UPDATE `contact` SET mobile='$phone', address='$address', city='$city', pincode='$pincode', state='$state', country='$country' WHERE student_id = '$student_id'";
            
                $result=mysqli_query($con,$sql);
                if($result == 0){
                    echo "step 2 error";
                    mysqli_error($con);
                }
                echo "<script language='javascript'>window.alert('step2 Successful')";
            }
        //step 3
            $fname = $_REQUEST['Father_Name'];
            $mname = $_REQUEST['Mother_Name'];
            $gname = $_REQUEST['Guardian_Name'];
            $foccupation = $_REQUEST['Father_Occupation'];
            $moccupation = $_REQUEST['Mother_Occupation'];
            $goccupation = $_REQUEST['Guardian_Occupation'];
            $fnumber = $_REQUEST['Father_Number'];
            $mnumber = $_REQUEST['Mother_Number'];
            $gnumber = $_REQUEST['Guardian_Number'];
            $femail = $_REQUEST['Father_email'];
            $memail = $_REQUEST['Mother_email'];
            $gemail = $_REQUEST['Guardian_email'];
            $finc = $_REQUEST['Father_AI'];
            $minc = $_REQUEST['Mother_AI'];
            $ginc = $_REQUEST['Guardian_AI'];
    
            $sql = "SELECT * FROM `family` WHERE student_id='$student_id'";
            $result = mysqli_query($con,$sql);
            if($result){
                $sql = "UPDATE `family` SET fname='$fname', mname='$mname', gname='$gname', foccupation='$foccupation', moccupation='$moccupation', goccupation='$goccupation', fmobile='$fnumber', mmobile='$mnumber', gmobile='$gnumber', femail='$femail', memail='$memail', gemail='$gemail', fincome='$finc', mincome='$minc', gincome='$ginc' WHERE student_id={$_SESSION['student_id']}";
            $result=mysqli_query($con, $sql);
            if (mysqli_affected_rows($con) == 0){
                echo "step 3 error";
                mysqli_error($con);
            }
            echo "<script language='javascript'>window.alert('step3 Successful')";
            }
            else{
            $sql = "INSERT INTO `family` (student_id, fname, mname, gname, foccupation, moccupation, goccupation, fmobile, mmobile, gmobile, femail, memail, gemail, fincome, mincome, gincome)
            VALUES ('$student_id', '$fname', '$mname', '$gname', '$foccupation', '$moccupation', '$goccupation', '$fnumber', '$mnumber', '$gnumber', '$femail', '$memail', '$gemail', '$finc', '$minc', '$ginc')
            ON DUPLICATE KEY UPDATE
            fname = VALUES(fname),
            mname = VALUES(mname),
            gname = VALUES(gname),
            foccupation = VALUES(foccupation),
            moccupation = VALUES(moccupation),
            goccupation = VALUES(goccupation),
            fmobile = VALUES(fmobile),
            mmobile = VALUES(mmobile),
            gmobile = VALUES(gmobile),
            femail = VALUES(femail),
            memail = VALUES(memail),
            gemail = VALUES(gemail),
            fincome = VALUES(fincome),
            mincome = VALUES(mincome),
            gincome = VALUES(gincome)";
    
            //$sql = "UPDATE `family` SET fname='$fname', mname='$mname', gname='$gname', foccupation='$foccupation', moccupation='$moccupation', goccupation='$goccupation', fmobile='$fnumber', mmobile='$mnumber', gmobile='$gnumber', femail='$femail', memail='$memail', gemail='$gemail', fincome='$finc', mincome='$minc', gincome='$ginc' WHERE student_id={$_SESSION['student_id']}";
            $result=mysqli_query($con, $sql);
            if (mysqli_affected_rows($con) == 0){
                echo "step 3 error";
                mysqli_error($con);
            }
            echo "<script language='javascript'>window.alert('step3 Successful')";
            }
        //step 4
            $year = $_REQUEST['AYear'];
            if($year == "2nd"){
                $one_sem_res = $_REQUEST['1sem_res'];
                $result = $_REQUEST['Result'];
                $sgpa = $_REQUEST['sgpa'];
    
                /*$sql = "INSERT INTO `exam` (student_id, semesters, sgpa, result, rmonth_year)
                 VALUES ('student_id', '1', '$sgpa', '$result', '$one_sem_res')
                ON DUPLICATE KEY UPDATE
                semesters = VALUES(semesters),
                sgpa = VALUES(sgpa),
                result = VALUES(result),
                rmonth_year = VALUES(rmonth_year)";*/
    
                $sql = "INSERT INTO `exam`(student_id, semesters, sgpa, result, rmonth_year) VALUES ('$student_id','1','$sgpa','$result','$one_sem_res')";
                $result=mysqli_query($con, $sql);
                if (mysqli_affected_rows($con) == 0){
                    echo "step 4 1sem error";
                    mysqli_error($con);
                }
    
                $sec_sem_res = $_REQUEST['2sem_res'];
                $result = $_REQUEST['Result1'];
                $sgpa = $_REQUEST['sgpa1'];
    
                /*$sql = "INSERT INTO `exam` (student_id, semesters, sgpa, result, rmonth_year)
                VALUES ('$student_id', '1', '$sgpa', '$result', '$sec_sem_res')
                ON DUPLICATE KEY UPDATE
                semesters = VALUES(semesters),
                sgpa = VALUES(sgpa),
                result = VALUES(result),
                rmonth_year = VALUES(rmonth_year)";*/
    
                $sql = "INSERT INTO `exam`(student_id, semesters, sgpa, result, rmonth_year) VALUES ('$student_id','2','$sgpa','$result','$sec_sem_res')";
                $result=mysqli_query($con, $sql);
                if (mysqli_affected_rows($con) == 0){
                    echo "step 4 2sem error";
                    mysqli_error($con);
                }
    
            }
            else if($year == "3rd"){
                $one_sem_mon = $_REQUEST['1sem_res'];
                $result = $_REQUEST['Result'];
                $sgpa = $_REQUEST['sgpa'];
    
                /*$sql = "INSERT INTO `exam` (student_id, semesters, sgpa, result, rmonth_year)
                VALUES ({$_SESSION['student_id']}, '2', '$sgpa', '$result', '$one_sem_mon')
                ON DUPLICATE KEY UPDATE
                semesters = VALUES(semesters),
                sgpa = VALUES(sgpa),
                result = VALUES(result),
                rmonth_year = VALUES(rmonth_year)";*/
    
                $sql = "INSERT INTO `exam`(student_id, semesters, sgpa, result, rmonth_year) VALUES ('$student_id','1','$sgpa','$result','$one_sem_mon')";
                $result=mysqli_query($con, $sql);
                if (mysqli_affected_rows($con) == 0){
                    echo "step 4 1sem error";
                    mysqli_error($con);
                }
    
                $sec_sem_mon = $_REQUEST['2sem_res'];
                $result = $_REQUEST['Result1'];
                $sgpa = $_REQUEST['sgpa1'];
    
                $sql = "INSERT INTO `exam`(student_id, semesters, sgpa, result, rmonth_year) VALUES ('$student_id','2','$sgpa','$result','$sec_sem_mon')";
                $result=mysqli_query($con, $sql);
                if (mysqli_affected_rows($con) == 0){
                    echo "step 4 2sem error";
                    mysqli_error($con);
                }
    
                $third_sem_mon = $_REQUEST['3sem_res'];
                $result = $_REQUEST['Result2'];
                $sgpa = $_REQUEST['sgpa2'];
    
                $sql = "INSERT INTO `exam`(student_id,semesters, sgpa, result, rmonth_year) VALUES ('$student_id'},'3','$sgpa','$result','$third_sem_mon')";
                $result=mysqli_query($con, $sql);
                if (mysqli_affected_rows($con) == 0){
                    echo "step 4 3sem error";
                    mysqli_error($con);
                }
    
                $fourth_sem_mon = $_REQUEST['4sem_res'];
                $result = $_REQUEST['Result3'];
                $sgpa = $_REQUEST['sgpa3'];
    
                $sql = "INSERT INTO `exam`(student_id,semesters, sgpa, result, rmonth_year) VALUES ('$student_id','4','$sgpa','$result','$fourth_sem_mon')";            
                $result=mysqli_query($con, $sql);
                if (mysqli_affected_rows($con) == 0){
                    echo "step 4 4sem error";
                    mysqli_error($con);
                }
            }
            else{
                echo "Invalid year type selected.";
            }
    //step 5
            $sign = $_FILES["sign"];
            $aadhar = $_FILES["aadhar_img"];
            $pan = $_FILES["pan_img"];
            $marks = $_FILES["marks_img"];
            $transfer = $_FILES["transfer_img"];
            $migration = $_FILES["migration_img"];
            
    //step 6
        

        }    
    ?>