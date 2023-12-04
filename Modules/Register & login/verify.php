<?php

    if (isset($_POST["verify_email"]))
    {
        $email = $_POST["email"];
        $verification_code = $_POST["verification_code"];
 
        // connect with database
        $conn = mysqli_connect("localhost","root","","academia");
 
        // mark email as verified
       $select_query = "SELECT code from student WHERE code='$verification_code'";
       $result_query = mysqli_query($conn,$select_query);
       $num_rows = mysqli_num_rows($result_query);
       if($num_rows == 1){
        
        $sql = "UPDATE `student` SET is_verified='1' WHERE code = '$verification_code'";
        $result=mysqli_query($conn, $sql);

        if($result &&  isset($_GET['user'])){
        // Display code for page1
        echo "<script language='javascript'>window.alert('Verification Successful');window.location='../Register & login/login.php';</script>";
        } else if($result){
            // Display code for page1
            echo "<script language='javascript'>window.alert('Verification Successful');window.location='reset_pass.php?email=$email&user=student';</script>";
        }
        else {
        // Default code if no referring page match
            echo "Default code";
        }
       }else if($num_rows == 0){
        $select_query = "SELECT verify_code from admin WHERE verify_code='$verification_code'";
        $result_query = mysqli_query($conn,$select_query);
        $num_rows = mysqli_num_rows($result_query);
        if($num_rows == 1){
        
        $sql = "UPDATE `admin` SET is_verified='1' WHERE verify_code = '$verification_code'";
        $result=mysqli_query($conn, $sql);

        if($result_query){
        // Display code for page1
        echo "<script language='javascript'>window.alert('Verification Successful');window.location='../Register & login/reset_pass.php?email=$email&user=admin';</script>";
        } else {
        // Default code if no referring page match
            echo "Default code";
        }
        
       }else{
            echo "<div class='form' style='margin-left:80px;margin-top:50px;'>
                  <h3 style='color:white;'>Invalid Code</h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <br/><p class='link' style='color:white;'>Click here to <a href='verify.php?email=" . $email."'> Verify </a> again.</p>
                  </div>";
       }
    }else{
        echo "<div class='form' style='margin-left:80px;margin-top:50px;'>
                  <h3 style='color:white;'>Invalid Code</h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <br/><p class='link' style='color:white;'>Click here to <a href='verify.php?email=" . $email."'> Verify </a> again.</p>
                  </div>";
    }

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

  <link rel="stylesheet" href="../../css/login_out.css"/>
</head>

<body>
    <div class="container">
        <div class="form">
          <div class="form-image"><img src="../../img/verify.svg" width="200"></div>
            <div class="form-content">
              <h1>Verify code</h1>
                <form method="POST">
                    <input type="hidden" name="email" value="<?php echo $_GET['email']; ?>" required>
                    <input type="number" name="verification_code" class="form-input" placeholder="Enter verification code" required />
                    <button type="submit" class="form-button" name="verify_email">Verify</button>
                   <!-- <a href="Forgot Password.html" class="forgotpassword">Different email?</a><br><br>-->
                    <a href="../Homepage/index.php" class="forgotpassword">Back to home page</a>
                </form>
            </div>    
        </div>
    </div>    
</body>
</html>