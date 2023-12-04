<?php

session_start();

require '../UGCourse/db_config_co.php';
require '../AddOnCourses/cart_func.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Contact Us</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="../../css/font-awesome.css">
	<!--Material-Icons-->
	<!--<link href="https://fonts.googleapis.com/icon?family=Material+Icons+Rounded" rel="stylesheet">-->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0" />
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="../AddOnCourses/navbar.css">
    <link rel="stylesheet" href="contact.css">
    <style>
        .button-35 {
  align-items: center;
  background: rgba(106, 17, 203, 0.9);
  border-radius: 12px;
  box-shadow: transparent 0 0 0 3px,rgba(18, 18, 18, .1) 0 6px 20px;
  box-sizing: border-box;
  color: #fff;
  cursor: pointer;
  display: inline-flex;
  flex: 1 1 auto;
  font-family: Inter,sans-serif;
  font-size: 1.0rem;
  font-weight: 500;
  justify-content: center;
  line-height: 1;
  margin: 0;
  outline: none;
  padding: 1rem 1.2rem;
  text-align: center;
  text-decoration: none;
  transition: box-shadow .2s,-webkit-box-shadow .2s;
  white-space: nowrap;
  border: 0;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
}
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-light gradient-custom">
        <!-- Container wrapper -->
        <div class="container-fluid">
            <!-- Toggle button -->
            <button
                class="navbar-toggler text-white"
                type="button"
                data-mdb-toggle="collapse"
                data-mdb-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <i class="fas fa-bars"></i>
            </button>

            <!-- Collapsible wrapper -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Navbar brand -->
                <a class="navbar-brand mt-2 mt-lg-0" href="index.php">
                    <h4 class="pt-1 mb-1">ACADEMIA</h4>
                </a>
                <!-- Left links -->
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../UGCourse/course_disp.php">Courses</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../AddOnCourses/add_on_cat.php">Add On Courses</a>
                    </li>
                    <li class="nav-item">
                        <a href="../Register & login/login.php" class="nav-link">Login</a>
                    </li>
                    <li class="nav-item">
                        <a href="../Register & login/register.php" class="nav-link">Register</a>
                    </li>
                    <li>
                        <a href="../Application/adm.php"><button class="button-35" role="button">APPLY NOW</button></a>
                    </li>
                </ul>
                <!-- Left links -->
            </div>
            <!-- Collapsible wrapper -->

            <!-- Right elements -->
            <div class="d-flex align-items-center">
                <!-- Icon -->
                <a class="text-reset me-3" href="../AddOnCourses/cart.php">
                    <i class="fas fa-shopping-cart text-white"><sub><?php cart_item();?></sub></i>&nbsp;
                </a>
                <a class="text-reset me-3" href="contact.php">
                    <i class="fas fa-envelope text-white"></i>&nbsp;&nbsp;
                </a>
                <!-- <a class="text-reset me-3" href="../Register & login/logout.php">
                    <i class="fas fa-sign-out-alt text-white"></i>
                </a> -->
            </div>
            <!-- Right elements -->
        </div>
        <!-- Container wrapper -->
    </nav>
    <?php
        require 'sendMail.php';
        if(isset($_POST['submit'])){
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $messages = $_POST['message'];
            $sendMl->send($messages,$email,$name,$phone);
        }
     
    ?>
    <script>
        function validateform(){
            let name=document.contact.name.value;
            let uPattern=/^[a-zA-Z ]+$/;
            let email=document.contact.email.value;
            let phone = document.contact.phone.value;
            let phpatten = /^[6-9]{1}[0-9]{9}$/;
            if(name=="" || name==null){
                alert("User Name cannot be blank");
                return false;
            }
            if(uPattern.test(name)==false){
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

            if(!phone.match(phpattern)){
                alert("Invalid mobile number");
                return false;
            }
            else{
                return true;
            }
        }
    </script>
    <div class="container1">
          <form name="contact" method="post" action="" onsubmit="return validateform()">
            <h6><b>Help us with your details and we shall connect with you!</b></h6>
            <input type="text" name="name" id="name" placeholder="Ex : Aasha" required>
            <input type="email" name="email" id="email" placeholder="Ex : test@gmail.com" required>
            <input type="text" name="phone" id="phone" placeholder="Ex : 6432958340" pattern="[6-9]\d{9}" required>
            <textarea name="message" id="message" rows="4" placeholder="How can we help you?" required></textarea>
            <button type="submit" name="submit">Send Message</button>
          </form>
    </div>
</body>
</html>