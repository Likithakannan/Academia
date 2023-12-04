<?php
require 'db_config_co.php';
require '../AddOnCourses/cart_func.php';

// Pagination variables
$results_per_page = 2; // Number of cards per page
$current_page = isset($_GET['page']) ? $_GET['page'] : 1; // Get current page number
$start_index = ($current_page - 1) * $results_per_page; // Calculate the starting index for the query

$query = "SELECT * FROM ugc LIMIT $start_index, $results_per_page";
$query_run = mysqli_query($connection, $query);
$check_ugc = mysqli_num_rows($query_run) > 0;
?>

<html>
<head>
	<title>Courses</title>
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
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500;600;700&display=swap');
.container {
    margin-left : 50px;
    position:fixed;
    margin-top:50px;
    display: flex;
    justify-content: center;
    align-items: center;
    max-width: 1100px;
    flex-wrap: wrap;
    padding: 40px 0;
}
.card {
  margin-top : 30px;
  margin-right : 50px;
  margin-left : 150px;
  width: 300px;
  height: 400px;
  background-image: linear-gradient(to right, #e823fb, #e92cfb, #e933fb, #ea39fb, #ea3ffb);
  border-radius: 10px;
  overflow: hidden;
  position: relative;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

.button {
  background-image: linear-gradient(to right, #2d193c, #2c183c, #2a183d, #29173d, #27173e);
  color: #fff;
  padding: 10px 20px;
  border-radius: 5px;
  display: inline-block;
  margin-top: 10px;
}

.button:hover{
    color:white;
}


.card:hover {
    transform: scale(1.03);
}


.image-container {
  height: 200px;
  position: relative;
  overflow: hidden;
}

.image-container img {
  width: 100%;
  height: auto;
  object-fit: cover;
}

.card .image-container:hover img {
  transform: scale(1.1);
}

.content {
  padding: 20px;
  color: #fff;
}

h3 {
  font-size: 20px;
  margin-top: 0;
}

p {
  font-size: 14px;
}

@keyframes gradientAnimation {
  0% {
    background-position: 0% 50%;
  }
  50% {
    background-position: 100% 50%;
  }
  100% {
    background-position: 0% 50%;
  }
}
.containerPage{
    margin-left : 450px;
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
                        <a class="nav-link active" href="course_disp.php">Courses</a>
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
    <div class="container">
        <div class="row">
    <?php 
        $limit = 2; // Number of categories to display per page
        $page = isset($_GET['cat_page']) ? $_GET['cat_page'] : 1;
        $offset = ($page - 1) * $limit;

        $query = "SELECT * FROM ugc LIMIT $offset, $limit";
        $query_run = mysqli_query($connection,$query);
        $check_ugc = mysqli_num_rows($query_run) > 0;

        if($check_ugc){
            while($row = mysqli_fetch_array($query_run)){
                ?>
    <div class="card">
    <div class="image-container">
<?php
$encodedImage = base64_encode($row['image']);
$imageStyle = 'width: 300px; height:200px'; // Set the width as desired (e.g., 300px)

echo '<img src="data:image;base64,' . $encodedImage . '" style="' . $imageStyle . '">';
?>    </div>
    <div class="content">
        <h3><?php echo $row['ugname'];?></h3>
        <p><?php echo $row['short_desc'];?></p>
        <a href="course_details.php?ug_id=<?php echo $row['ugid'];?>" class="button" style="text-decoration:none">Learn More</a>
    </div>
    </div>
                
        <?php
            }
        // Pagination
                echo '<div class="containerPage text-center mt-4 style">';
                echo '<nav><ul class="pagination justify-content-center">';
                $prev_ugc_page = $page - 1;
                $next_ugc_page = $page + 1;
                echo '<li class="page-item ' . ($page == 1 ? "disabled" : "") . '">';
                echo '<a class="page-link" href="course_disp.php?cat_page=' . $prev_ugc_page . '">Previous</a>';
                echo '</li>';
                $ugc_query_all = "SELECT COUNT(*) as total FROM ugc";
                $ugc_result_all = mysqli_query($connection, $ugc_query_all);
                $ugc_count_all = mysqli_fetch_assoc($ugc_result_all)['total'];
                $total_ugc_pages = ceil($ugc_count_all / $limit);
                for ($i = 1; $i <= $total_ugc_pages; $i++) {
                    echo '<li class="page-item ' . ($page == $i ? "active" : "") . '">';
                    echo '<a class="page-link" href="course_disp.php?cat_page=' . $i . '">' . $i . '</a>';
                    echo '</li>';
                }
                echo '<li class="page-item ' . ($page == $total_ugc_pages ? "disabled" : "") . '">';
                echo '<a class="page-link" href="course_disp.php?cat_page=' . $next_ugc_page . '">Next</a>';
                echo '</li>';
                echo '</ul></nav>';
                echo '</div>';
            }else{
            echo "No Courses found";
        }
        ?>
        
    </div>
</div>
</body>
</html>