<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
    <link rel="stylesheet" href="../Register & login/login_out.css"/>
</head>
<body>
<?php
    require('db.php');
    session_start();
    // When form submitted, check and create user session.
    if (isset($_POST['email'])) {
        $email = $_REQUEST['email'];
        $password = $_REQUEST['password'];
        //echo $password;
        // Check user is exist in the database
        $query2    = "SELECT * FROM `admin` WHERE email='$email'
                     AND Password='" . md5($password) . "'";
        //echo md5($password);             
        $result1 = mysqli_query($con, $query2) or die(mysqli_error($con));
        $rows2 = mysqli_num_rows($result1);
        if ($rows2 == 1) {
            $_SESSION['username'] = $rows2["username"];
            // Redirect to user dashboard page
            header("Location: ../Dashboard/Admin_dashboard.html");
        } else {
            echo "<div class='form'>
                  <h3 style='color:white;'>Incorrect Email ID/password.</h3><br/>
                  <p class='link'>Click here to <a href='Admin_login.php'>Login</a> again.</p>
                  </div>";
        }
    } else {
?> 
    <div class="container">
        <div class="form">
            <div class="form-image"><img src="../Register & login/login.svg" width="400"></div>
                <div class="form-content">
                    <h1>ADMIN LOGIN</h1>            
                    <form method="post" name="login" onsubmit="return validateform()">
                        <input type="text" class="form-input" name="email" placeholder="Email Address" autofocus="true" /><br>
                        <input type="password" class="form-input" name="password" placeholder="Password" /><br>
                        <button type="submit" name="submit" class="form-button">LOGIN</button><br>
                        <a href="#" class="forgotpassword">Forgot Password?</a><br><br>
                        
                        <a href="/html/" class="forgotpassword">Back to home page</a>
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