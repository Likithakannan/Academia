<?php session_start();
include('../Course/db_config_co.php');
if(isset($_SESSION['email'])){
	$email = $_SESSION['email'];
}else{
	header("Location: ../Register & login/login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../../css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="../Dashboard/Stud_Dashboard.css">
	<!--Material-Icons-->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons+Rounded"
      rel="stylesheet">
	  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0" />
	  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@48,400,0,0" />
	  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
      <style>
        .container {
            /*max-width: 800px;*/
            margin: 0 auto;
            margin-left : 110px;
            padding: 20px;
        }

        .dashboard-heading {
            text-align: center;
            margin-bottom: 20px;
        }

        .enrolled-courses {
            /*width: 180%;*/
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .enrolled-courses table {
            
            border-collapse: collapse;
        }

        .enrolled-courses th,
        .enrolled-courses td {
            padding: 20px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .enrolled-courses th {
            background-color: #f2f2f2;
            color: #333;
        }

        .enrolled-courses tbody tr:hover {
            background-color: #f9f9f9;
        }
        .button-61 {
  align-items: center;
  appearance: none;
  border-radius: 4px;
  border-style: none;
  box-shadow: rgba(0, 0, 0, .2) 0 3px 1px -2px,rgba(0, 0, 0, .14) 0 2px 2px 0,rgba(0, 0, 0, .12) 0 1px 5px 0;
  box-sizing: border-box;
  color: #fff;
  cursor: pointer;
  display: inline-flex;
  font-family: Roboto,sans-serif;
  font-size: .875rem;
  font-weight: 500;
  height: 36px;
  justify-content: center;
  letter-spacing: .0892857em;
  line-height: normal;
  min-width: 64px;
  outline: none;
  overflow: visible;
  padding: 0 16px;
  position: relative;
  text-align: center;
  text-decoration: none;
  text-transform: uppercase;
  transition: box-shadow 280ms cubic-bezier(.4, 0, .2, 1);
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
  vertical-align: middle;
  will-change: transform,opacity;
}

.button-61:hover {
  box-shadow: rgba(0, 0, 0, .2) 0 2px 4px -1px, rgba(0, 0, 0, .14) 0 4px 5px 0, rgba(0, 0, 0, .12) 0 1px 10px 0;
}

.button-61:disabled {
  background-color: rgba(0, 0, 0, .12);
  box-shadow: rgba(0, 0, 0, .2) 0 0 0 0, rgba(0, 0, 0, .14) 0 0 0 0, rgba(0, 0, 0, .12) 0 0 0 0;
  color: rgba(0, 0, 0, .37);
  cursor: default;
  pointer-events: none;
}

.button-61:not(:disabled) {
  background-color: #6200ee;
}

.button-61:focus {
  box-shadow: rgba(0, 0, 0, .2) 0 2px 4px -1px, rgba(0, 0, 0, .14) 0 4px 5px 0, rgba(0, 0, 0, .12) 0 1px 10px 0;
}

.button-61:active {
  box-shadow: rgba(0, 0, 0, .2) 0 5px 5px -3px, rgba(0, 0, 0, .14) 0 8px 10px 1px, rgba(0, 0, 0, .12) 0 3px 14px 2px;
  background: #A46BF5;
}
    </style>
    <script>
        // JavaScript for highlighting selected row
        document.addEventListener('DOMContentLoaded', function() {
            var table = document.getElementById('enrolled-courses');
            var rows = table.getElementsByTagName('tr');

            for (var i = 1; i < rows.length; i++) {
                rows[i].addEventListener('click', function() {
                    // Remove existing highlighted rows
                    var highlightedRows = table.getElementsByClassName('highlight-row');
                    for (var j = 0; j < highlightedRows.length; j++) {
                        highlightedRows[j].classList.remove('highlight-row');
                    }

                    // Add highlight to clicked row
                    this.classList.add('highlight-row');
                });
            }
        });
    </script>
	</head>
<body>
	<div class="container">
		<!----------------------ASIDE--------------------->
		<aside>
			<div class="top">
				<div class="logo">
					<h2>ACADEMIA</h2>
				</div>
				<div class="close" id="close-btn">
					<span class="material-symbols-rounded">close</span>
				</div>
			</div>
			<div class="sidebar">
				<a href="../Dashboard/Student_dashboard.php">
					<span class="material-symbols-sharp">dashboard</span>
					<h3>Dashboard</h3>
				</a>
				<a href="../Application/Adm1.php">
					<span class="material-symbols-outlined">person_add</span>
					<h3>My Admissions</h3>
				</a>

				<a href="../Application/sfee.php">
					<span class="material-symbols-outlined">receipt</span>
					<h3>Fees</h3>
				</a>
				<a href="../Messages/stuMsg.php">
					<span class="material-symbols-outlined">mail</span>
					<h3>Messages</h3>
				</a>
				
				<a href="../UGCourse/course_disp.php">
					<span class="material-symbols-outlined">post_add</span>
					<h3>Courses</h3>
				</a>

                <a href="enrolled.php"  class="active">
					<span class="material-symbols-outlined">post_add</span>
					<h3>Add On Courses</h3>
				</a>
				<a href="../Register & login/logout.php">
					<span class="material-symbols-sharp">logout</span>
					<h3>Logout</h3>
					
				</a>
			</div>
		</aside>
		<!---------------------END OF ASIDE--------------------->
    <div class="container">
        <div class="main">
        <h1 class="dashboard-heading" style="width:900px;color#A46BF5;">ENROLLED COURSES</h1>
        <div class="enrolled-courses" style="width:900px;margin-left:20px;">
            <table id="enrolled-courses-table">
                <thead style="text-align:center;">
                    <tr>
                        <th>Course ID</th>
                        <th>Course Name</th>
                        <th>Instructor Details</th>
                        <th>Image</th>
                        <th>Duration</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $student_id=$_SESSION['student_id'];
              $select_query = "SELECT * FROM enrollment WHERE student_id='$student_id'";
              $result_query = mysqli_query($connection,$select_query);
              while($row=mysqli_fetch_assoc($result_query)){
                $course_id = $row['course_id'];
                $select_course = "SELECT * FROM courses WHERE course_id='$course_id'";
                $result = mysqli_query($connection,$select_course);
                while($rowC=mysqli_fetch_assoc($result)){
                    $cname = $rowC['cname'];
                    $instructor = $rowC['instructor'];
                    $image = $rowC['image'];
                    $duration = $rowC['duration'];
              ?>
              <tr>
                <td><?php echo $course_id; ?></td>
                <td><?php echo $cname; ?></td>
                <td><?php echo $instructor; ?></td>
                <td style="width:200px;"><?php echo '<img src="data:image;base64,'.base64_encode($image).'"' ?></td>
                <td><?php echo $duration; ?></td>
               </tr> 
               <?php
                }
            }  
               ?>
                </tbody>
            </table>
        </div>
            <div style="width:200px;margin-top:20px;margin-left:400px;"><a href="add_on_cat.php"><button class="button-61" role="button">Continue Shopping</button></a></div>
        </div>
    </div>
</body>
</html>
