<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
  <title>Course Enrollment</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="navbar.css">
</head>
<style>
.course-details {
  margin: 0;
  padding: 0;
  font-size: 16px;
  line-height: 1.2;
  color: @text-color;
  display: grid;
  grid-template-columns: auto 1fr;
  align-items: start;
  padding-bottom: 0.75em;
}

dt,
dd {
  margin: 0;
  padding: 10px;
  border-top: 1px solid @fog;
}

dt {
  display: flex;
  align-items: center;
  padding-left: 30px;
}

dt::before {
  /*content: '\f058'; /* Replace with the appropriate Font Awesome icon code */*/
  /*font-family: 'Font Awesome 5 Free';*/
  margin-right: 0.5em;
}

dd {
  padding-right: 30px;
}
.navbar {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  z-index: 9999;
}

.card-container {
  margin-top: 80px; /* Adjust the value based on the height of your navbar */
  position: relative;
  z-index: 1;
}
.content h1 {
  color: #6600FF; /* Dark purple color */
}

.content p {
  color: #330066; /* Dark purple color */
}

.course-details dt::before {
  color: #6600FF; /* Dark purple color */
}

.course-details dd {
  color: #330066; /* Dark purple color */
}

/* button */
.button-64 {
  align-items: center;
  background-image: linear-gradient(144deg,#AF40FF, #5B42F3 50%,#00DDEB);
  border: 0;
  border-radius: 8px;
  box-shadow: rgba(151, 65, 252, 0.2) 0 15px 30px -5px;
  box-sizing: border-box;
  color: #FFFFFF;
  display: flex;
  font-family: Phantomsans, sans-serif;
  font-size: 20px;
  justify-content: center;
  line-height: 1em;
  max-width: 100%;
  min-width: 140px;
  padding: 3px;
  text-decoration: none;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
  white-space: nowrap;
  cursor: pointer;
  margin-left:150px;
}

.button-64:active,
.button-64:hover {
  outline: 0;
}

.button-64 span {
  background-color: rgb(5, 6, 45);
  padding: 16px 24px;
  border-radius: 6px;
  width: 100%;
  height: 100%;
  transition: 300ms;
}

.button-64:hover span {
  background: none;
}

.button-64:disabled {
  opacity: 0.5; /* Reduce the opacity to visually indicate the button is disabled */
  cursor: not-allowed; /* Change the cursor to indicate that the button is disabled */
}

.button-64:disabled span {
  /* Add any additional styling for the disabled state */
}
@media (min-width: 768px) {
  .button-64 {
    font-size: 24px;
    min-width: 196px;
  }
}

/* Other styles... */
</style>

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
                <a class="navbar-brand mt-2 mt-lg-0" href="#">
                    <h4 class="pt-1 mb-1">ACADEMIA</h4>
                </a>
                <!-- Left links -->
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../html/About.html">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Courses</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="add_on_cat.php">Add On Courses</a>
                    </li>
                    <li class="nav-item">
                        <a href="../../php/login.php" class="nav-link">Login</a>
                    </li>
                    <li class="nav-item">
                        <a href="../../php/register.php" class="nav-link">Register</a>
                    </li>
                </ul>
                <!-- Left links -->
            </div>
            <!-- Collapsible wrapper -->

            <!-- Right elements -->
            <div class="d-flex align-items-center">
                <!-- Icon -->
                <a class="text-reset me-3" href="cart.php">
                    <i class="fas fa-shopping-cart text-white"><sub><?php cart_item();?></sub></i>
                </a>
                <a class="text-reset me-3" href="../../php/logout.php">
                    <i class="fas fa-sign-out-alt text-white"></i>
                </a>
            </div>
            <!-- Right elements -->
        </div>
        <!-- Container wrapper -->
    </nav>
    <!-- Navbar -->
    <?php
    /*Number of cart items*/
    function cart_item(){
        require '../UGCourse/db_config_co.php'; 
        if(!isset($_SESSION['student_id'])){
            $num_rows = null;
        }
        else if(isset($_GET['add_to_cart'])){
            $student_id = $_SESSION['student_id'];
            $select_query = "SELECT * FROM cart WHERE student_id='$student_id'";
            $result_query = mysqli_query($connection,$select_query);
            $num_rows = mysqli_num_rows($result_query);    
            if($num_rows == 0){

            }
        }
        else{
            $student_id = $_SESSION['student_id'];
            $select_query = "SELECT *  FROM cart WHERE student_id='$student_id'";
            $result_query = mysqli_query($connection,$select_query);
            $num_rows = mysqli_num_rows($result_query);   
        }
        echo $num_rows;
    } 
?>
<section style="background-color: #eee;">
  <div class="container py-5">
    <div class="row justify-content-center">
        <?php 
            include('../UGCourse/db_config_co.php');
            if(isset($_GET['course_id'])){
                $course_id = $_GET['course_id'];
                $sql = "SELECT * FROM courses WHERE course_id=$course_id";
                $result = mysqli_query($connection,$sql);
                $row = mysqli_fetch_assoc($result);
            }  
        ?>
      <div class="col-md-8 col-lg-6 col-xl-4" style="width:50%">
        <div class="content mt-4" >
          <h1 style="color: #6600FF;"><?php echo $row['cname'];?></h1><br>
          <p  style="color: #330066;"><?php echo $row['cdesc'];?></p>
          <br>
          <h3 style="color: #6600FF;">Prerequisites</h3>
          <?php
            // Assuming you have retrieved the paragraph of statements from the database and stored it in a variable
            $statementParagraph = $row['prerequisites'];

            // Split the paragraph into individual statements
            $statements = explode(".", $statementParagraph);

            // Remove any empty or whitespace-only statements
            $statements = array_filter($statements, 'trim');

            // Display the statements as bullet points
            echo "<ul>";
            foreach ($statements as $statement) {
                echo "<li style='color: #330066;'>" . trim($statement) . "</li>";
            }
            echo "</ul>";
          ?>

        </div>
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 parent-container" style="width:50%">
      <div class="sticky-container">
        <div class="card text-black">
          <?php echo '<img src="data:image;base64,'.base64_encode($row['image']).'"class="card-img-top" alt="Course" />'; ?> 
        <div class="card-body">
          <?php 
        if(isset($_SESSION['student_id'])){
            $student_id=$_SESSION['student_id'];
            $check_enroll = "SELECT * FROM enrollment WHERE student_id ='$student_id' AND course_id = '$course_id'";
          $result = mysqli_query($connection,$check_enroll);
          $num_rows = mysqli_num_rows($result);
          if($num_rows == 1){
          ?>
            <div class="text-center">
              <a href="" style="text-decoration:none;"><button id="enrollButton" role="button" class="button-64" onclick="disableButton()" disabled><span class="text">Enrolled</span></button></a>
            </div>
            <?php 
          }
          else{
            ?>
              <div class="text-center">
              <a href="add_on_cat.php?add_to_cart=<?php echo $row['course_id'];?>" style="text-decoration:none;" ><button class="button-64" role="button"><span class="text">Enroll Now</span></button></a>
            </div>
            <?php 
          }
        }
        else{
          ?>
          <div class="text-center">
            <a href="add_on_cat.php?add_to_cart=<?php echo $row['course_id'];?>" style="text-decoration:none;" ><button class="button-64" role="button"><span class="text">Enroll Now</span></button></a>
          </div>
            <?php 
        }
            ?>
            <div class="node node--type-section node--view-mode-proed ds-1col clearfix">
                <dl class="course-details">
                    <dt style="color: #6600FF;">&nbsp;<i class="fas fa-graduation-cap"></i>&nbsp; Course ID</dt>
                        <dd style="color: #330066;"><?php echo $row['course_id'];?></dd>

                    <dt style="color: #6600FF;">&nbsp;<i class="fas fa-calendar"></i>&nbsp; Schedule</dt>
                        <dd style="color: #330066;"><?php echo $row['start_date'].' to '.$row['end_date']; ?></dd>

                    <dt style="color: #6600FF;">&nbsp;<i class="fas fa-clock"></i>&nbsp; Duration</dt>
                        <dd style="color: #330066;"><?php echo $row['duration'];?></dd>

                    <dt style="color: #6600FF;">&nbsp;<i class="fas fa-lock"></i>&nbsp; Course Access</dt>
                        <dd style="color: #330066;"><?php echo $row['course_access'];?></dd>

                    <dt style="color: #6600FF;">&nbsp;<i class="fas fa-money-check"></i>&nbsp; Fees</dt>
                        <dd style="color: #330066;"><?php echo 'Rs. '.$row['fees'];?></dd>
                    <dt style="color: #6600FF;">&nbsp;<i class="fas fa-chalkboard-teacher"></i>&nbsp;Instructor</dt>
                       <dd style="color: #330066;"><?php echo $row['instructor'];?></dd>    
                </dl>
            </div>
        </div>
    </div>
    </div>
  </div>
</section>
<script>
  function disableButton() {
    // Disable the button when clicked
    document.getElementById("enrollButton").disabled = true;
  }
</script>
</body>
</html>
