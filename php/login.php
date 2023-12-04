<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
    <link rel="stylesheet" href="../css/login_out.css"/>
</head>
<body>
<?php
    require('db.php');
    session_start();
    // When form submitted, check and create user session.
    if (isset($_POST['email'])) {
        $email = $_REQUEST['email'];
        $password = $_REQUEST['password'];
        // Check user is exist in the database
        $query    = "SELECT * FROM `student` WHERE email='$email'
                     AND password='" . md5($password) . "'";
        $result = mysqli_query($con, $query);
        $rows = mysqli_num_rows($result);
        $rows1 = mysqli_fetch_assoc($result);
        if ($rows == 1) {
            $_SESSION['username'] = $rows1['username'];
            $_SESSION['student_id'] = $rows1['student_id'];
            // Start the session
session_start();

// Check if the session value is set
/*if (isset($_SESSION['student_id'])) {
    // The session value is set
    echo "Session value is set.";
} else {
    // The session value is not set
    echo "Session value is not set.";
}*/

            // Redirect to user dashboard page
            header("Location: ../Modules/Dashboard/Student_dashboard.html");
        } else {
            echo "<div class='form'>
                  <h3 style='color:white;'>Incorrect Email ID/password.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                  </div>";
                  /*"<script>alert('Incorrect Email ID/password') header("Location: login.php");</script>";*/
                  
        }
    } else {
?> 
    <div class="container">
        <div class="form">
            <div class="form-image"><img src="../img/login.svg" width="400"></div>
                <div class="form-content">
                    <h1>LOGIN</h1>            
                    <form method="post" name="login" onSubmit="return validateform()">
                        <input type="text" class="form-input" name="email" placeholder="Email Address" autofocus="true" /><br>
                        <input type="password" class="form-input" name="password" placeholder="Password" /><br>
                        <button type="submit" name="submit" class="form-button">LOGIN</button><br>
                        <a href="Forgot_Password.php" class="forgotpassword">Forgot Password?</a><br><br>
                        <a href="register.php" class="forgotpassword">New User?</a><br><br>
                        <a href="../html/index.html" class="forgotpassword">Back to home page</a>
                    </form>
                </div>
        </div>
    </div>
    <!--<script>
        function validateform(){
            let email=document.login.email.value;  
            let emailRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
            let domain = email.split("@")[1];
            let password=document.login.password.value;
            let pPattern=/^(?=.*[A-Z])(?=.*\d)[A-Za-z0-9_]{8,15}$/;
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
            if(!(domain === "gmail.com" || domain === "hotmail.com" || domain === "yahoo.com" || domain === "bmscw.edu.in")){
                alert("Invalid email address");
                return false;
            }
            //password
            if(password === ""){
                alert("Password cannot be bank");
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
            if(!pPattern.test(password)){
                alert("Password must contain atleast a number and an uppercase letter");
            }
            else{
                return true;
            }
        }
    </script>-->
<?php
    }
?>
</body>
</html>