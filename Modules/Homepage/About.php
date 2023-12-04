<?php

session_start();

require '../UGCourse/db_config_co.php';
require '../AddOnCourses/cart_func.php';
?>
<html>
<head>
	<title>About Us</title>
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
	<link rel="stylesheet" href="style.css">
	<style>
		body{
			background-image: url('about-1.jpg');
			color:#4B0082; 
			background-repeat : no-repeat;
			background-size:cover;
			background-position:center;

		}
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

.button-35:hover {
  box-shadow: #fff 0 0 0 3px, transparent 0 0 0 0;
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
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="about.php">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../UGCourse/course_disp.php">Courses</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="../AddOnCourses/add_on_cat.php">Add On Courses</a>
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
	<section class="ab-body">
  <div>
    <h1>
        <span>Academia</span>
        <span>is</span>
        <span>at</span>
        <span>the</span>
        <span>frontier</span>
        <span>of</span>
        <span>academic</span>
        <span>and</span>
        <span>intellectual</span>
        <span>discovery.</span>
        <span>Our</span>
        <span>aim</span>
        <span>is</span>
        <span>to</span>
        <span>provide</span>
        <span>a</span>
        <span>user-friendly,</span>
        <span>scalable,</span>
        <span>and</span>
        <span>customizable</span>
        <span>system</span>
        <span>that</span>
        <span>can</span>
        <span>help</span>
        <span>both</span>
        <span>institutions</span>
        <span>and</span>
        <span>students.</span>
    </h1>
  </div>
 </section>
</body>
</html>