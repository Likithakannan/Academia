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
          
      if(isset($_POST['submit'])) {
        $email = $_GET['email'];
        $password = $_POST['password'];
        $user = $_GET['user'];
        $confirm_password = $_POST['confirmPassword']; 
        if ($password == $confirm_password) {
          $sql = "UPDATE `$user` SET password ='" . md5($password) . "' WHERE email='$email'";
          $result=mysqli_query($con, $sql);
  
          if (mysqli_affected_rows($con) == 0)
          {
              mysqli_error($con);
          }
          echo "<script>alert('Verification Successfull')</script>";
          header("Location: login.php");
          /*header("Location:login.php");
          echo "<script language='javascript'>window.alert('Verification Successfull');window.location='login.php';</script>";*/
        }
      }else{

      
  ?>
  <script>
     function validatePassword(){
    let password=document.resetPass.password.value;
    let confirmPassword=document.resetPass.confirmPassword.value;
    let pPattern=/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;

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
                alert("Password must contain atleast a number and an uppercase letter and a special Character");
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
      <div class="form" method="POST">
        <div class="form-image"><img src="resetpass.svg" width="200"></div>
          <div class="form-content">
            <h1>Reset Password</h1>
            <form name="resetPass" action="" method="post" onSubmit="return validatePassword()">
              <p class="links">
              <input type="password" class="form-input" name="password" placeholder="New Password" />
                <input type="password" class="form-input" name="confirmPassword" placeholder="Confirm Password" />
                    <button type="submit" name = "submit" class="form-button">Confirm</button>
                    <a href="../Homepage/index.php" class="forgotpassword">Back to home page</a>
              </p>
            </form>
          </div>
        </div>
      </div>
      <?php 
      }  
      ?>
</body>
</html>
