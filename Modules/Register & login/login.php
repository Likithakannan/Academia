<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
    <link rel="stylesheet" href="login_out.css"/>
</head>
<body>
<?php
    require('db.php');
    session_start();
   
    if (isset($_POST['email'])) {
        $email = $_REQUEST['email'];
        $password = $_REQUEST['password'];
        $_SESSION['email']=$email;

        $new_student_query = "SELECT * FROM `student_details` WHERE email='$email' AND pass='$password'"; 
        $new_student_result = mysqli_query($con, $new_student_query);
        $new_student_rows = mysqli_num_rows($new_student_result);
        
        $student_query = "SELECT * FROM `student` WHERE email='$email'
                     AND password='" . md5($password) . "'";
        $student_result = mysqli_query($con, $student_query);
        $student_rows = mysqli_num_rows($student_result);
        $student_data = mysqli_fetch_assoc($student_result);
        
        $admin_query = "SELECT * FROM `admin` WHERE email='$email'
                     AND Password='" . md5($password) . "'";
        $admin_result = mysqli_query($con, $admin_query);
        $admin_rows = mysqli_num_rows($admin_result);
        
        if($new_student_rows == 1){
            $check_sid = "SELECT * FROM `student` ORDER BY sid DESC LIMIT 1";
            $checkresult = mysqli_query($con,$check_sid);
            $row = mysqli_fetch_assoc($checkresult);
            $sid = $row['student_id'];
            $get_numbers = str_replace("ACA","",$sid);
            $id_increase = $get_numbers+1;
            $get_string = str_pad($id_increase,3,0,STR_PAD_LEFT);
            $sid = "ACA" . $get_string;    
            $create_datetime = date("Y-m-d H:i:s");
            $stu_row = mysqli_fetch_assoc($new_student_result);

        $name = "";    
        $dob = "";
        $phone = "";
        $code = "";
        $is_verified = "";
        $course = "";
        $specialisation = "";
        $aadhar = "";
        $pan = "";
        $blood_group = "";
        $nationality = "";
        $community = "";
        $caste = "";
        $category = "";
        $address = "";
        $country = "";
        $state = "";
        $city = "";
        $pincode = "";
        $fname = "";
        $foccupation = "";
        $fmobile = "";
        $femail = "";
        $fincome = "";
        $mname = "";
        $moccupation = "";
        $mmobile = "";
        $memail = "";
        $mincome = "";
        $gname = "";
        $goccupation = "";
        $gmobile = "";
        $gemail = "";
        $gincome = "";
        $marks_card = "";
        $transfer = "";
        $migration = "";
        $photo = "";
        $caste_img = "";
        $sign = "";

        $name = $stu_row["name"];
        $dob = $stu_row["dob"];
        $phone = $stu_row["phone"];
        $code = $stu_row["pass"];
        $is_verified = $stu_row["is_approved"];
        $course = $stu_row["course"];
        $specialisation = $stu_row["specialisation"];
        $aadhar = $stu_row["aadhar"];
        $pan = $stu_row["pan"];
        $blood_group = $stu_row["blood_group"];
        $nationality = $stu_row["nationality"];
        $community = $stu_row["community"];
        $caste = $stu_row["caste"];
        $category = $stu_row["category"];
        $address = $stu_row["address"];
        $country = $stu_row["country"];
        $state = $stu_row["state"];
        $city = $stu_row["city"];
        $pincode = $stu_row["pincode"];
        $fname = $stu_row["fname"];
        $foccupation = $stu_row["foccupation"];
        $fmobile = $stu_row["fmobile"];
        $femail = $stu_row["femail"];
        $fincome = $stu_row["fincome"];
        $mname = $stu_row["mname"];
        $moccupation = $stu_row["moccupation"];
        $mmobile = $stu_row["mmobile"];
        $memail = $stu_row["memail"];
        $mincome = $stu_row["mincome"];
        $gname = $stu_row["gname"];
        $goccupation = $stu_row["goccupation"];
        $gmobile = $stu_row["gmobile"];
        $gemail = $stu_row["gemail"];
        $gincome = $stu_row["gincome"];
        $marks_card = $stu_row["marks_card"];
        $transfer = $stu_row["transfer"];
        $migration = $stu_row["migration"];
        $photo = $stu_row["photo"];
        $caste_img = $stu_row["caste_img"];
        $sign = $stu_row["sign"];


            $query  = "INSERT into `student` (student_id, full_name, password, email, create_datetime, dob, phone, code, is_verified, course, specialisation, aadhar, pan, blood_group, nationality, community, caste, category, address, country, state, city, pincode, fname, foccupation, fmobile, femail, fincome, mname, moccupation, mmobile, memail, mincome, gname, goccupation, gmobile, gemail, gincome, adm_year)
                           VALUES ('$sid', '$name', '" . md5($password) . "', '$email', '$create_datetime', '$dob', '$phone', '$code', '$is_verified', '$course', '$specialisation', '$aadhar', '$pan', '$blood_group', '$nationality', '$community', '$caste', '$category', '$address', '$country', '$state', '$city', '$pincode', '$fname', '$foccupation', '$fmobile', '$femail', '$fincome', '$mname', '$moccupation', '$mmobile', '$memail', '$mincome', '$gname', '$goccupation','$gmobile', '$gemail', '$gincome', '1')";
            $result = mysqli_query($con, $query);
            $query1 = "INSERT into `upload` (student_id, sign, transfer, migration, photo, caste, marks_card) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $prepare = mysqli_prepare($con,$query1);
            mysqli_stmt_bind_param($prepare,"sssssss",$sid, $sign, $transfer, $migration, $photo, $caste_img, $marks_card);
            $result1 = mysqli_execute($prepare);
            $searchTerm = $course;
            $fetch_fees = "SELECT fees FROM ugc WHERE ugname LIKE '%$searchTerm%'";
            $result_fees = mysqli_query($con,$fetch_fees);
            $row1 = mysqli_fetch_assoc($result_fees);
            $fees = $row1['fees'];  
            $insert_query = "INSERT INTO fees (student_id, tot_fees, current_bal, adm_year) VALUES ('$sid', '$fees', '$fees', '1')";
            $result_insert = mysqli_query($con,$insert_query);     
            $_SESSION['student_id'] = $sid;
            if($result && $result1){ 
                    header('Location: ../Dashboard/Student_dashboard.php');
                    $delete_query = "DELETE FROM `student_details` WHERE email = '$email' AND pass = '$password'";
                    $result_query = mysqli_query($con,$delete_query);
                    if($result_query){
                       echo 'deleted successfully';
                    }
                    else{
                        die(mysqli_error($con));
                    }
            }
            else{
               "<div class='form'>
                  <h3 style='color:white;'>Incorrect stu Email ID/password.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                  </div>";
            }
        }else if ($student_rows == 1) {
            $_POST['email'] = $student_data['email'];
            $_POST['password'] = $student_data['password'];
            $_SESSION['student_id'] = $student_data['student_id'];
            header("Location: ../Dashboard/Student_dashboard.php");
        } elseif ($admin_rows == 1) {
            $_SESSION['username'] = $admin_rows["username"];
            header("Location: ../Dashboard/Admin_dashboard.php");
        } else {
            echo "<div class='form'>
                  <h3 style='color:white;'>Incorrect login Email ID/password.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                  </div>";
        }
    } else {
?> 
    <div class="container">
        <div class="form">
            <div class="form-image"><img src="login.svg" width="400"></div>
            <div class="form-content">
                <h1>LOGIN</h1>            
                <form method="post" name="login" onSubmit="return validateform()">
                    <input type="text" class="form-input" name="email" placeholder="Email Address" autofocus="true" /><br>
                    <input type="password" class="form-input" name="password" placeholder="Password" /><br>
                    <button type="submit" name="submit" class="form-button">LOGIN</button><br>
                    <a href="Forgot_Password.php" class="forgotpassword">Forgot Password?</a><br><br>
                    <a href="register.php" class="forgotpassword">New User?</a><br><br>
                    <a href="../Homepage/Index.php" class="forgotpassword">Back to home page</a>
                </form>
            </div>
        </div>
    </div>
<?php
    }
?> 
</body>
</html>