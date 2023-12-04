<?php session_start(); 
require 'db_config_co.php';
require '../AddOnCourses/cart_func.php';?>

<!DOCTYPE html>
<html>
<head>
    <title>Course Details</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../AddOnCourses/navbar.css">
    <style>
        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 9999;
        }

        .container {
            margin-top: 80px;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
        }

        .col {
            flex: 50%;
        }

        .image {
            text-align: right;
            width : 300px;
            
        }

        .prerequisites {
            color: #330066;
        }

       .accordion {
        margin-top: 20px;
    }

    .accordion-header {
        background-color: #6600FF; /* Change the color to the desired color */
        color: #fff;
        cursor: pointer;
        padding: 10px;
        border: none;
        text-align: left;
        outline: none;
        transition: background-color 0.3s ease;
        display: flex;
        align-items: center;
    }

    .accordion-header .icon {
        margin-right: 5px;
    }

    .accordion-item{
      background-color: #E6E6FA;
    }

    .accordion-content {
        padding: 10px;
        display: none;
        background-color: #fff;
        overflow: hidden;
        width: 100%;
    }
        .table-container {
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th,
        td {
            padding: 8px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #6600FF;
            color: #fff;
        }

        td {
            background-color: #f2f2f2;
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
                        <a class="nav-link" href="course_disp.php">Courses</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../AddOnCourses/add_on_cat.php">Add On Courses</a>
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
                <a class="text-reset me-3" href="../AddOnCourses/cart.php">
                    <i class="fas fa-shopping-cart text-white"><sub><?php cart_item();?></sub></i>&nbsp;
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

    <div class="container">
        <div class="row">
            <?php 
            if (isset($_GET['ug_id'])) {
                $ug_id = $_GET['ug_id'];
                $sql = "SELECT * FROM ugc WHERE ugid=$ug_id";
                $result = mysqli_query($connection, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <div class="col prerequisites">
                <h1 style="color: #6600FF;"><?php echo $row['ugname']; ?></h1>
                <p style="color: #330066;"><?php echo $row['desc']; ?></p>
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
                    echo "<li>" . trim($statement) . "</li>";
                }
                echo "</ul>";
                ?>
                
                </div>
                <div class="col image">
                <img src="data:image;base64,<?php echo base64_encode($row['image']); ?>" class="card-img-top" alt="Course" style="width: 500px;height : 300px;"><br><br>
                <?php $ugname=$row['ugname'];?>
                <center><a href="../Application/adm.php?ugid=<?php echo $ugname;?>" style="text-decoration:none;margin : 10px;"><button role="button" class="button-64"><span class="text">APPLY NOW</span></button></a></center>
                
            </div>
                <div class="accordion">
                    <?php 
                    $semesterQuery = "SELECT * FROM semester WHERE ugid=$ug_id";
                    $semesterResult = mysqli_query($connection, $semesterQuery);
                    while ($semesterRow = mysqli_fetch_assoc($semesterResult)) {
                        $semesterID = $semesterRow['sem_id'];
                        $semesterName = $semesterRow['sem_name'];
                    ?>
                        <div class="accordion-item">
                          <button class="accordion-header" onclick="toggleAccordion(this)">
                            <span class="icon">+</span> <?php echo $semesterName; ?>
                          </button>
                            <div class="accordion-content">
                                <div class="table-container">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>Subjects</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $subjectQuery = "SELECT * FROM subject WHERE sem_id=$semesterID";
                                            $subjectResult = mysqli_query($connection, $subjectQuery);
                                            while ($subjectRow = mysqli_fetch_assoc($subjectResult)) {
                                                $subjectName = $subjectRow['sub_name'];
                                            ?>
                                                <tr>
                                                    <td><?php echo $subjectName; ?></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="table-container">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>Electives</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $electiveQuery = "SELECT * FROM elective WHERE sem_id=$semesterID";
                                            $electiveResult = mysqli_query($connection, $electiveQuery);
                                            while ($electiveRow = mysqli_fetch_assoc($electiveResult)) {
                                                $electiveName = $electiveRow['elective_name'];
                                            ?>
                                                <tr>
                                                    <td><?php echo $electiveName; ?></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            <?php 
              }
            }?>
        </div>
    </div>

    <script>
        function toggleAccordion(button) {
    var accordionContent = button.nextElementSibling;
    button.classList.toggle("active");
    accordionContent.style.display = accordionContent.style.display === "block" ? "none" : "block";
}

    </script>
</body>
</html>
