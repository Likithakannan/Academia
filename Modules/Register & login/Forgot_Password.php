<?php
include ('db.php');
session_start();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <style>
body{
  background-image: linear-gradient(to right top, #120a5a, #004292, #0077be, #00acdd, #21e2f4);
}
h1 {
  text-align: center;
  color: #f8f4f4;
}

.container {
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100vh;
}

.form:hover{
  background-color: #01061188;
}

  .form {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 800px;
    height: 500px;
    padding: 20px 50px;
    border-radius: 10px;
    background-color:#00000079;
  }

  .form-image {
    flex: 1;
    background-image: url(login.svg);
    background-size: cover;
    background-position: center;
    border-top-left-radius: 10px;
    border-bottom-left-radius: 50px;
  }

  .form-content {
    flex: 1;
    padding: 60px;
  }

  .form-input {
    display: block;
    width: 100%;
    margin-bottom: 10px;
    padding: 10px;
  }

  .form-button {
    display: block;
    width: 100%;
    padding: 10px;
    background-color: #0b87d4;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin-bottom: 10px;
  }
  .form-button:hover {
  background-color: #1ca0f1;
    }

  .forgotpassword, .links {
    color: #f8f4f4;
    
  }
    </style>
</head>
<body>
  <?php
  require('db.php');
  require_once('sendEmailF.php');

  if(isset($_POST['password-reset-link'])) {
    $email = $_POST['email'];
  
  $query1  = "SELECT * FROM `student` WHERE email='$email'";
  $result1  = mysqli_query($con,$query1);
  $rowsCount = mysqli_num_rows($result1);
  $row = mysqli_fetch_row($result1);
 if($rowsCount==1){
          $code = rand(100000,999999);
          $sql = "UPDATE student SET code='$code' WHERE email='$email'";
          $result = mysqli_query($con, $sql);

          // Check if the query was successful
          if ($result) {
          $sendMailF->send($code,$email);

      } else {
        echo "<script>alert('User does not exist, please register again');</script>";
          echo "Error executing query: " . mysqli_error($conn);
      }
  }
  else{
          $query1  = "SELECT * FROM `admin` WHERE email='$email'";
          $result1  = mysqli_query($con,$query1);
          $rowsCount = mysqli_num_rows($result1);
          $row = mysqli_fetch_row($result1);
          if($rowsCount==1){
          $code = rand(100000,999999);
          $sql = "UPDATE admin SET verify_code='$code' WHERE email='$email'";
          $result = mysqli_query($con, $sql);

          // Check if the query was successful
          if ($result) {
          $sendMailF->send($code,$email);
          }else {
           echo "<script>alert('User does not exist, please register again');</script>";
          echo "Error executing query: " . mysqli_error($conn);
          }
          }   
    }
  }
     

?>
<form method="POST">
    <div class="container">
      <div class="form">
        <div class="form-image"><img src="forgotpass.svg" width="400"></div>
          <div class="form-content">
            <h1>Forgot Password</h1>
              <p class="links">
                <input type="email" name="email" class="form-input"  placeholder="Enter your email" />
                    <button type="submit" class="form-button" name="password-reset-link">Reset Password</button>
                    <a href="../Homepage/index.php" class="forgotpassword">Back to home page</a>
              </p>
            </form>
          </div>
        </div>
      </div>
</body>
</html>