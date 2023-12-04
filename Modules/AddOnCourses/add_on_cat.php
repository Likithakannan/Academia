<?php session_start(); ob_start();?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

    <title>Categories</title>
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="addon.css">
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

.button-35:hover {
  box-shadow: #fff 0 0 0 3px, transparent 0 0 0 0;
}
        .cart-icon {
            color: #fff;
            margin-left: 10px;
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
                <a class="navbar-brand mt-2 mt-lg-0" href="../Homepage/index.php">
                    <h4 class="pt-1 mb-1">ACADEMIA</h4>
                </a>
                <!-- Left links -->
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link " href="../Homepage/index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../Homepage/about.php">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../UGCourse/course_disp.php">Courses</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="add_on_cat.php">Add On Courses</a>
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
                <a class="text-reset me-3" href="cart.php">
                    <i class="fas fa-shopping-cart text-white"><sub><?php cart_item();?></sub></i>
                </a>
                <a class="text-reset me-3" href="../Homepage/contact.php">
                    <i class="fas fa-envelope text-white"></i>&nbsp;&nbsp;
                </a>
                <a class="text-reset me-3" href="../Register & login/logout.php">
                    <i class="fas fa-sign-out-alt text-white"></i>
                </a>
            </div>
            <!-- Right elements -->
        </div>
        <!-- Container wrapper -->
    </nav>
    <!-- Navbar -->

    <!--Categories cards-->
      <!--Categories-->
    <div class="container">
        <div class="row">
            <?php
            require '../UGCourse/db_config_co.php';
        if(!isset($_GET['category'])){
            echo '<h1 style="margin-left:450px;color:purple;font-size:30px;">CATEGORIES</h1>';
            $limit = 3; // Number of categories to display per page
            $page = isset($_GET['cat_page']) ? $_GET['cat_page'] : 1;
            $offset = ($page - 1) * $limit;

            $category_query = "SELECT * FROM category LIMIT $offset, $limit";
            $category_result = mysqli_query($connection, $category_query);
            $category_count = mysqli_num_rows($category_result);

            if ($category_count > 0) {
                while ($category_row = mysqli_fetch_assoc($category_result)) {
                    ?>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="box">
                                <div class="content">
                                    <?php $cid = $category_row['cid'];?>
                                    <h2><?php echo $category_row['cat_name'];?></h2>
                                    <p><a href='add_on_cat.php?category=<?php echo $cid ?>'><?php echo '<img src="data:image;base64,'.base64_encode($category_row['cat_img']).'">' ?></a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }

                // Category Pagination
                echo '<div class="containerPage text-center mt-4 style">';
                echo '<nav><ul class="pagination justify-content-center">';
                $prev_cat_page = $page - 1;
                $next_cat_page = $page + 1;
                echo '<li class="page-item ' . ($page == 1 ? "disabled" : "") . '">';
                echo '<a class="page-link" href="add_on_cat.php?cat_page=' . $prev_cat_page . '">Previous</a>';
                echo '</li>';
                $category_query_all = "SELECT COUNT(*) as total FROM category";
                $category_result_all = mysqli_query($connection, $category_query_all);
                $category_count_all = mysqli_fetch_assoc($category_result_all)['total'];
                $total_cat_pages = ceil($category_count_all / $limit);
                for ($i = 1; $i <= $total_cat_pages; $i++) {
                    echo '<li class="page-item ' . ($page == $i ? "active" : "") . '">';
                    echo '<a class="page-link" href="add_on_cat.php?cat_page=' . $i . '">' . $i . '</a>';
                    echo '</li>';
                }
                echo '<li class="page-item ' . ($page == $total_cat_pages ? "disabled" : "") . '">';
                echo '<a class="page-link" href="add_on_cat.php?cat_page=' . $next_cat_page . '">Next</a>';
                echo '</li>';
                echo '</ul></nav>';
                echo '</div>';
            } else {
                echo "No Categories found";
            }
        }    
            ?>
        </div>
    </div>

    <!--Course cards-->
    <div class="container1">
               <?php
            require '../UGCourse/db_config_co.php';

            $limit = 2; // Number of cards to display per page
            $page = isset($_GET['course_page']) ? $_GET['course_page'] : 1;
            $offset = ($page - 1) * $limit;

            if (isset($_GET['category'])) {
                $cid = $_GET['category'];
                $select_query = "SELECT * FROM courses WHERE cid=$cid LIMIT $offset, $limit";
                $result_query = mysqli_query($connection, $select_query);
                $num_rows = mysqli_num_rows($result_query);

                if ($num_rows == 0) {
                    echo '<h2 style="color:red;">No Courses For this Category</h2>';
                }

                while ($row = mysqli_fetch_assoc($result_query)) {
                    $image = $row['image'];
                    $course_name = $row['cname'];
                    $course_id = $row['course_id'];
                    $course_access = $row['course_access'];
                    ?>
                    <div class="col-md-4">
                        <div class="card1">
                            <div class="imgBx">
                                <?php echo '<img src="data:image;base64,'.base64_encode($row['image']).'">';?>
                            </div>
                            <div class="content1">
                                <p>
                                    <?php echo '<b style="color:#430783">'.$course_name.'</b>';?><br/>
                                    <?php echo '<b style="color:#430783">'.$course_id.'</b>';?><br>
                                    <?php echo '<b style="color:#430783">'.$course_access.'</b>'?><br>
                                    <a href="addon_details.php?course_id=<?php echo $course_id;?>">Read More</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <?php
                }

                // Course Pagination
                echo '<div class="containerPage text-center mt-4" style="width:800px;">';
                echo '<nav><ul class="pagination justify-content-center">';
                $prev_course_page = $page - 1;
                $next_course_page = $page + 1;
                echo '<li class="page-item ' . ($page == 1 ? "disabled" : "") . '">';
                echo '<a class="page-link" href="add_on_cat.php?category=' . $cid . '&course_page=' . $prev_course_page . '">Previous</a>';
                echo '</li>';
                $course_query_all = "SELECT COUNT(*) as total FROM courses WHERE cid=$cid";
                $course_result_all = mysqli_query($connection, $course_query_all);
                $course_count_all = mysqli_fetch_assoc($course_result_all)['total'];
                $total_course_pages = ceil($course_count_all / $limit);
                for ($i = 1; $i <= $total_course_pages; $i++) {
                    echo '<li class="page-item ' . ($page == $i ? "active" : "") . '">';
                    echo '<a class="page-link" href="add_on_cat.php?category=' . $cid . '&course_page=' . $i . '">' . $i . '</a>';
                    echo '</li>';
                }
                echo '<li class="page-item ' . ($page == $total_course_pages ? "disabled" : "") . '">';
                echo '<a class="page-link" href="add_on_cat.php?category=' . $cid . '&course_page=' . $next_course_page . '">Next</a>';
                echo '</li>';
                echo '</ul></nav>';
                echo '</div>';
            }
            ?>
    </div>
    </div>

    <!--Add to cart-->
    <?php
    require '../UGCourse/db_config_co.php'; 
    if(isset($_GET['add_to_cart'])){
        if(isset($_SESSION['student_id'])){
            $student_id = $_SESSION['student_id'];
            $course_id = $_GET['add_to_cart'];
            $select_query = "SELECT *  FROM cart WHERE student_id='$student_id' AND course_id='$course_id'";
            $result_query = mysqli_query($connection,$select_query);
            $num_rows = mysqli_num_rows($result_query);
            if($num_rows > 0){
                echo "<script>alert('This course is already present inside cart')</script>";
                echo "<script>window.open('add_on_cat.php','_self')</script>";
            }
            else{
                $insert_query = "INSERT INTO cart (student_id,course_id) VALUES ('$student_id','$course_id')";
                $result_query = mysqli_query($connection,$insert_query);
                echo "<script>alert('Course is added to cart')</script>";
                echo "<script>window.open('add_on_cat.php','_self')</script>";
            }
        }
        else{
            $_SESSION['prevPage'] = $_SERVER['PHP_SELF'];
            header("Location: login_enroll.php");
            exit();
        }
    }
    ob_flush();
    ?>

    <!--Displaying number of cart items -->
    <?php
    function cart_item(){
        require '../UGCourse/db_config_co.php'; 
        if(!isset($_SESSION['student_id'])){
            $num_rows = null;
        }
        else if(isset($_GET['add_to_cart'])){
            $student_id = $_SESSION['student_id'];
            $select_query = "SELECT *  FROM cart WHERE student_id='$student_id'";
            $result_query = mysqli_query($connection,$select_query);
            $num_rows = mysqli_num_rows($result_query);    
        }
        else{
            $student_id = $_SESSION['student_id'];
            $select_query = "SELECT *  FROM cart WHERE student_id='$student_id'";
            $result_query = mysqli_query($connection,$select_query);
            $num_rows = mysqli_num_rows($result_query);   
        }
        echo $num_rows;
    } 

    /*Total prices */
    function total_cart_price(){
        require '../UGCourse/db_config_co.php'; 
        $total_price = 0;
        $student_id = $_SESSION['student_id'];
        $cart_query = "SELECT * FROM cart WHERE student_id = '$student_id'";
        $result = mysqli_query($connection,$cart_query);
        while($row = mysqli_fetch_array($result)){
            $course_id = $row['course_id'];
            $select_query = "SELECT * FROM courses WHERE course_id = '$course_id'";
            $result_query = mysqli_query($connection,$select_query);
            while($row_course = mysqli_fetch_array($result_query)){
                $course_price = array($row_course['fees']);
                $course_value = array_sum($course_price);
                $total_price += $course_value;
            }
        }
        echo $total_price;
    }
    ?>

</body>
</html>
