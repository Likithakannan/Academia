<?php
 
    if (isset($_POST["verify_email"]))
    {
        $email = $_POST["email"];
        $verification_code = $_POST["verification_code"];
 
        // connect with database
        $conn = mysqli_connect("localhost","root","","academia");
 
        // mark email as verified
        $sql = "UPDATE `student` SET is_verified='1' WHERE code = '$verification_code'";
        $result=mysqli_query($conn, $sql);

        if (mysqli_affected_rows($conn) == 0)
        {
            mysqli_error($conn);
        }
        /*echo "<script>alert('Verification Successfull')</script>";
        header("Location:login.php");*/
        echo "<script language='javascript'>window.alert('Verification Successful');window.location='login.php';</script>";
    }
 
?>

<!DOCTYPE html>

<html lang="en">

<head>

  <title>Verification</title>

  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="../css/login_out.css"/>
</head>

<body>
    <div class="container">
        <div class="form">
          <div class="form-image"><img src="../img/verify.svg" width="200"></div>
            <div class="form-content">
              <h1>Verify code</h1>
                <form method="POST">
                    <input type="hidden" name="email" value="<?php echo $_GET['email']; ?>" required>
                    <input type="number" name="verification_code" class="form-input" placeholder="Enter verification code" required />
                    <button type="submit" class="form-button" name="verify_email">Verify</button>
                   <!-- <a href="Forgot Password.html" class="forgotpassword">Different email?</a><br><br>-->
                    <a href="../html/index.html" class="forgotpassword">Back to home page</a>
                </form>
            </div>    
        </div>
    </div>    
</body>
</html>