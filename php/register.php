<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration</title>
    <link rel="stylesheet" href="../css/login_out.css"/>
</head>
<style>
    .dropdown {
        display: block;
        width: 300px;
        margin-bottom: 10px;
        padding: 10px;
}

</style>
<body>
<?php
    include('db.php');
    require_once('sendEmail.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['username'])) {
        $username = $_REQUEST['username'];
        $email    = $_REQUEST['email'];
        $password = $_REQUEST['password'];
        $course   = $_REQUEST['course'];
        $specialisation = $_REQUEST['specialisation'];
        $create_datetime = date("Y-m-d H:i:s");
        $dob = $_REQUEST['dob'];
        $query1   = "SELECT * from `student` WHERE email='$email' ";
        $result1  = mysqli_query($con,$query1);
        $rowsCount = mysqli_num_rows($result1);
        $row = mysqli_fetch_row($result1);
        $query = "SELECT * from `student`";
        $result = mysqli_query($con,$query);
        $table_row = mysqli_num_rows($result);
        if($table_row==0){
            $sid = "ACA001";
            $code=rand();
            $insert_query = "INSERT into `student` (student_id, username, password, email, create_datetime, dob, code, course, specialisation)
            VALUES ('$sid', '$username', '" . md5($password) . "', '$email', '$create_datetime', '$dob', '$code','$course','$specialisation')";
            $result = mysqli_query($con,$insert_query);
            if($result){
                echo "<div class='form'>
                    <h3 style='color:white;'>You are registered successfully. Verification code is sent to your mail</h3> <br/>
                    <!--<p class='link'>Click here to <a href='login.php'>Login</a></p>-->
                    </div>";
                    $sendMl->send($code,$email);
            }else{
                echo "error";
            }
        } else if($rowsCount>=1 && $row[7]==1) {
            echo "<div class='form'>
                  <h3 style='color:white;'>Account already exists with the same Email ID</h3><br/>
                  <p class='link'>Click here to <a href='register.php'>register</a> again.</p>
                  </div>";
        } else if($rowsCount>=1 && $row[7]==0){
                $sql = "SELECT code FROM `student` WHERE email='$email' ";
                $result = mysqli_query($con, $sql);

                // Check if the query was successful
                if ($result) {
                // Fetch the result as an associative array
                $row = mysqli_fetch_assoc($result);

                // Access the value from the associative array
                $code = $row['code'];

                // Use the retrieved value as needed
                //echo "The retrieved value is: " . $value;

                // Free the result set
                //mysqli_free_result($result);
            } else {
                echo "Error executing query: " . mysqli_error($conn);
            }
            

            // Close the database connection
            //mysqli_close($conn);

            echo "<div class='form'>
            <h3 style='color:white;'>You are already Registered.Verification is sent to your email</h3><br/>
            <!--<p class='link'>Click here to <a href='login.php'>Login</a></p>-->
            </div>";
            $sendMl->send($code,$email);
        }else if($rowsCount==0){
            $check_sid = "SELECT * FROM `student` ORDER BY sid DESC LIMIT 1";
            $checkresult = mysqli_query($con,$check_sid);
            if($row = mysqli_fetch_assoc($checkresult)){
            $sid = $row['student_id'];
            $get_numbers = str_replace("ACA","",$sid);
            $id_increase = $get_numbers+1;
            $get_string = str_pad($id_increase,3,0,STR_PAD_LEFT);
            $sid = "ACA" . $get_string;    
            $code=rand();
            $query  = "INSERT into `student` (student_id, username, password, email, create_datetime, dob, code,course, specialisation)
                           VALUES ('$sid', '$username', '" . md5($password) . "', '$email', '$create_datetime', '$dob', '$code','$course','$specialisation')";
            $result   = mysqli_query($con, $query);
            if($result){ 
                echo "<div class='form'>
                    <h3 style='color:white;'>You are registered successfully. Verification code is sent to your mail</h3> <br/>
                    <!--<p class='link'>Click here to <a href='login.php'>Login</a></p>-->
                    </div>";
                    $sendMl->send($code,$email);
            } else {
                echo "<div class='form'>
                  <h3 style='color:white;'>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='register.php'>register</a> again.</p>
                  </div>";
			}
		    }
        }else{}	  
    }else{
?>   
    <script>
        function validateform(){
            let username=document.register.username.value;
            let password=document.register.password.value;
            let confirmPassword=document.register.confirmPassword.value;
            let uPattern=/^[a-zA-Z]+$/;
            let pPattern=/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
            let email=document.register.email.value;
            if(username=="" || username==null){
                alert("User Name cannot be blank");
                return false;
            }
            if(uPattern.test(username)==false){
                alert("User Name should not contain numbers or special characters");
                return false;
            }
            let emailRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
            let domain = email.split("@")[1];
            // Check if the email is empty
            if (email == "") {
                alert("Email field must be filled out");
                return false;
            }
            // Check if the email is in the correct format
            if (!email.match(emailRegex)) {
                alert("Please enter a valid email address");
                return false;
            }
            if(!(domain === "bmscw.edu.in")){
                alert("Invalid email address");
                return false;
            }
            //password
            if(password === ""){
                alert("Password cannot be blank");
                return false;
            }
            if(password.length < 8){
                alert("Password length must be atleast 8 characters");
                return false;
            }
            if(password.length > 15){
                alert("Password length should not exceed 15 characters");
                return false;
            }
            if(!(pPattern.test(password))){
                alert("Password must contain atleast a number and an uppercase letter");
                return false;
            }
            if(!(password === confirmPassword)){
                alert("Confirm Password must be same");
                return false;
            }
            else{
                return true;
            }
        }
    </script>
    <div class="container">
        <div class="form">
            <div class="form-image"><img src="../img/register.svg" width="400"></div>
                <div class="form-content">
                    <h1>Registration</h1>
                    <form name="register" action="" method="post" onsubmit="return validateform()">
                        <input type="text" class="form-input" name="username" placeholder="Username" />
                        <select class="dropdown" name="course" id="categoryDropdown" onchange="updateOptions()">
                            <option value="Select a course">Select a course</option>
                            <option value="Bachelors of Arts">Bachelors of Arts(BA)</option>
                            <option value="Bachelors of Science">Bachelors of Science(BSc)</option>
                            <option value="Bachelors of Commerce">Bachelors of Commerce(BCom)</option>
                            <option value="Bachelors of Business Administration">Bachelors of Business Administration(BBA)</option>
                            <option value="Bachelors of Computer Applications">Bachelors of Computer Applications(BCA)</option>
                            <option value="Bachelors of Vocational Education">Bachelors of Vocational Education(BVoc)</option>
                        </select>
                        <select class="dropdown" name="specialisation" id="subCategoryDropdown">
                            <option value="Select a specialisation">Select a specialisation</option>
                        </select>
                        <script>
                            function updateOptions() {
                            var categoryDropdown = document.getElementById("categoryDropdown");
                            var subCategoryDropdown = document.getElementById("subCategoryDropdown");

                            // Clear existing options
                            subCategoryDropdown.innerHTML = "";

                            // Get selected option from the category dropdown
                            var selectedCategory = categoryDropdown.value;

                            // Options specific to the selected category
                            if (selectedCategory === "Bachelors of Arts") {
                                subCategoryDropdown.innerHTML = `
                                <option value="HES">History, Economics, Sociology (HES)</option>
                                <option value="HEK">History, Economics, Optional Kannada (HEK)</option>
                                <option value="PES">Psychology, Economics, Sociology (PES)</option>
                                <option value="JPE">Journalism, Psychology, Optional English (JPE)</option>
                                `;
                            } else if (selectedCategory === "Bachelors of Science") {
                                subCategoryDropdown.innerHTML = `
                                <option value="PCM">Physics, Chemistry, Mathematics (PCM)</option>
                                <option value="CBZ">Chemistry, Botany, Zoology (CBZ)</option>
                                <option value="PMCs">Physics, Mathematics, Computer Science (PMCs)</option>
                                <option value="CZMb">Chemistry, Zoology, Microbiology (CZMb)</option>
                                <option value="CBBt">Chemistry, Botany, Bio-Technology (CBBt)</option>
                                <option value="CND">Clinical Nutrition and Dietetics</option>
                                `;
                            } else if (selectedCategory === "Bachelors of Computer Applications") {
                                subCategoryDropdown.innerHTML = `
                                <option value="Computer Science">Computer Science</option>
                                `;
                            } else if(selectedCategory === "Bachelors of Commerce"){
                                subCategoryDropdown.innerHTML = `
                                <option value="AF">Accounting and Finance</option>
                                <option value="BDA">Business Data Analytics</option>
                                `;
                            } else if(selectedCategory ==="Bachelors of Business Administration"){
                                subCategoryDropdown.innerHTML=`
                                <option value="BA">Business Administration</option>
                                `;
                            } else if(selectedCategory === "Bachelors of Vocational Education"){
                                subCategoryDropdown.innerHTML=`
                                <option value="IT">Information Technology</option>
                                <option value="RM">Retail Management</option>
                                `;
                            }
                            }
                        </script>
                        <input type="text" class="form-input" name="email" placeholder="Email Address" />
                        <input type="password" class="form-input" name="password" placeholder="Password" />
                        <input type="password" class="form-input" name="confirmPassword" placeholder="Confirm Password" />
                        <input type="date" class="form-input" name="dob" min="1978-01-01" max="2003-01-01" />
                        <button type="submit" class="form-button">Register</button>
                        <p class="links">
                        Already Signed up? <a href="login.php" class="forgotpassword">Login</a><br><br>
                        <a href="../html/index.html" class="forgotpassword">Back to home page</a>
                    </form>
                </div>
        </div>        
    </div>    
<?php
    }
?>
</body>
</html>     