<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
    <link rel="stylesheet" href="../../css/login_out.css"/>
</head>
<body>
<?php
    require('../../php/db.php');
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
    $prevPage = $_SESSION['prevPage'];
            // Redirect to user dashboard page
            header("Location:add_on_cat.php");
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
            <div class="form-image"><img src="../../img/login.svg" width="400"></div>
                <div class="form-content">
                    <h1>LOGIN</h1>            
                    <form method="post" name="login" onSubmit="return validateform()">
                        <input type="text" class="form-input" name="email" placeholder="Email Address" autofocus="true" /><br>
                        <input type="password" class="form-input" name="password" placeholder="Password" /><br>
                        <button type="submit" name="submit" class="form-button">LOGIN</button><br>
                        <a href="../Register & login/Forgot_Password.php" class="forgotpassword">Forgot Password?</a><br><br>
                        <a href="../Register & login/register.php" class="forgotpassword">New User?</a><br><br>
                        <a href="../Homepage/index.html" class="forgotpassword">Back to home page</a>
                    </form>
                </div>
        </div>
    </div>
<?php
    }
?>
</body>
</html>