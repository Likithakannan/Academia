<?php
 session_start(); 
 /*if(isset($_SESSION['email'])){
	$email = $_SESSION['email'];
}else{
	header("Location: ../Register & login/login.php");
}*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>cart Items</title>
    <link rel="stylesheet" href="navbar.css">        
    <style>
.table thead th {
    background-color: #4D4AE8;
    color:white;
  }

  .table tbody td {
    background-color:linear-gradient(68.6deg, rgb(252, 165, 241) 1.8%, rgb(181, 255, 255) 100.5%);
  }

  .table tbody tr:hover td {
    opacity: 0.8; /* Increase opacity on hover */
  }

.button-20 {
  appearance: button;
  background-color: #4D4AE8;
  background-image: linear-gradient(180deg, rgba(255, 255, 255, .15), rgba(255, 255, 255, 0));
  border: 1px solid #4D4AE8;
  border-radius: 1rem;
  box-shadow: rgba(255, 255, 255, 0.15) 0 1px 0 inset,rgba(46, 54, 80, 0.075) 0 1px 1px;
  box-sizing: border-box;
  color: #FFFFFF;
  cursor: pointer;
  display: inline-block;
  font-family: Inter,sans-serif;
  font-size: 1rem;
  font-weight: 500;
  line-height: 1.5;
  margin: 0;
  padding: .5rem 1rem;
  text-align: center;
  text-transform: none;
  transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
  vertical-align: middle;
}

.button-20:focus:not(:focus-visible),
.button-20:focus {
  outline: 0;
}

.button-20:hover {
  color:#fff;
  background-color: #3733E5;
  border-color: #3733E5;
}

.button-20:focus {
  background-color: #413FC5;
  border-color: #3E3BBA;
  box-shadow: rgba(255, 255, 255, 0.15) 0 1px 0 inset, rgba(46, 54, 80, 0.075) 0 1px 1px, rgba(104, 101, 235, 0.5) 0 0 0 .2rem;
}

.button-20:active {
  background-color: #3E3BBA;
  background-image: none;
  border-color: #3A38AE;
  box-shadow: rgba(46, 54, 80, 0.125) 0 3px 5px inset;
}

.button-20:active:focus {
  box-shadow: rgba(46, 54, 80, 0.125) 0 3px 5px inset, rgba(104, 101, 235, 0.5) 0 0 0 .2rem;
}

.button-20:disabled {
  background-image: none;
  box-shadow: none;
  opacity: .65;
  pointer-events: none;
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
                    <i class="fas fa-shopping-cart text-white"><sub><?php cart_item();?></sub></i>&nbsp;&nbsp;
                </a>
                <a class="text-reset me-3" href="../Homepage/contact.php">
                    <i class="fas fa-envelope text-white"></i>&nbsp;&nbsp;
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
        <!--Displaying number of cart items -->
        <div class="container" style="margin-top:90px;">
          <div class="row">
            <form action="" method="post">
            <table class="table table-bordered text-center" style="width:900px;margin-left:80px;">
                <?php
                  require '../UGCourse/db_config_co.php'; 
        $total_price = 0;
      if(isset($_SESSION['student_id'])){
        $student_id = $_SESSION['student_id'];
        $cart_query = "SELECT * FROM cart WHERE student_id = '$student_id'";
        $result = mysqli_query($connection,$cart_query);
        $result_count = mysqli_num_rows($result);
        $course_ids = array();
        if($result_count > 0){
          echo "<thead>
                <tr>
                  <th>Course Title</th>
                  <th>Course Image</th>
                  <th>Price</th>
                  <th>Remove</th>
                </tr>
              </thead>
            <tbody>";
        while($row = mysqli_fetch_array($result)){
            $course_id = $row['course_id'];
            $select_query = "SELECT * FROM courses WHERE course_id = '$course_id'";
            $result_query = mysqli_query($connection,$select_query);
            while($row_course = mysqli_fetch_array($result_query)){
                $course_price = $row_course['fees'];
                $course_name = $row_course['cname'];
                $course_image = $row_course['image'];
                $coursearr_price = array($row_course['fees']);
                $course_value = array_sum($coursearr_price);
                $total_price += $course_value;
                $course_ids[] = $course_id;

                // Set the payment type and total price in session variables
                $_SESSION['payment_type'] = "course_fee";
                $_SESSION['total_price'] = $total_price;
                $_SESSION['course_ids'] = $course_ids;
?>
                <tr>
                  <td><?php echo $course_name;?></td>
                  <td><?php echo '<img src="data:image;base64,'.base64_encode($course_image).'" style="width:80px;height:80px;"';?>></td>
                  <td><?php echo $course_price;?></td>
                  <td><input type="checkbox" name="removeitem[]" value="<?php echo $course_id;?>"></td>
                </tr>
                <?php 
              }  }}
              else{
                echo "<div style='width:1000px;color:#800080;padding-left:150px;'><h2 class='text-center' > CART IS EMPTY </h2></p>";
      }       }?>
              </tbody>
            </table>
            <div class="d-flex mb-3">
              <?php 
               require '../UGCourse/db_config_co.php';
      if(isset($_SESSION['student_id'])){                
        $student_id = $_SESSION['student_id'];
        $cart_query = "SELECT * FROM cart WHERE student_id = '$student_id'";
        $result = mysqli_query($connection,$cart_query);
        $result_count = mysqli_num_rows($result);
        if($result_count > 0){
          echo "<h4 class='px-3' style='margin-left:180px;'><b>Subtotal</b>&nbsp;&nbsp:<strong style='color:blue;'>&nbsp;&nbsp;$total_price/-</strong></h4>
              <input type='submit' value='Continue Shopping' name='continue_shopping' class='button-20' class='bg-info px-3 py-2 border-0'>&nbsp;&nbsp;&nbsp;
              <input type='submit' value='Checkout' name='checkout' class='button-20' class='bg-secondary px-3 py-2 border-0'>&nbsp;&nbsp;&nbsp;
              <input type='submit' value='Remove Cart'  name='remove_cart' class='button-20' class='bg-info px-3 py-2 border-0'>";$remove_item = remove_cart_item();
        }
        else{
          echo "<center><input type='submit'style='margin-left:500px;' value='Continue Shopping' class='button-20' name='continue_shopping' class='bg-info px-3 py-2 border-0'></center>";
        }      
        if(isset($_POST['continue_shopping'])){
          echo "<script>window.open('add_on_cat.php','_self')</script>";
        }
        if(isset($_POST['checkout'])){
          echo "<script>window.open('../Application/sfee.php','_self')</script>";
        }
      }
      else{
        echo "<div style='width:1000px;color:#800080;padding-left:150px;'><h2 class='text-center' > Login to check your cart details </h2></p>";?>
        <div class="text-center" style="margin-top:50px;"><a href="login_enroll.php" class="button-20" style="text-decoration:none;" role="button"><span class="text">Login here</span></a></div>

        <?php 
      }  
              ?>
              
            </div>
            </form>
          </div>
        </div>
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
    
    /*Remove items */
    function remove_cart_item(){
      require '../Course/db_config_co.php'; 
      if(isset($_POST['remove_cart'])){
        if(isset($_POST['removeitem'])){
        foreach($_POST['removeitem'] as $remove_id){
          $student_id = $_SESSION['student_id'];
          $delete_query = "DELETE FROM cart WHERE course_id = $remove_id AND student_id='$student_id'";
          
          $run_delete = mysqli_query($connection,$delete_query);                                                
          if($run_delete){
            echo "<script>window.open('cart.php')</script>";
          }
        }
        }
        else{
          echo "<script>alert('Please mark the items to be removed from the cart')</script>";
        }
      }
    }
    ?>
</body>
</html>
