<?php
include ('db.php');
session_start();

if(isset($_SESSION['email'])){
	$email = $_SESSION['email'];
}else{
	header("Location: ../Register & login/login.php");
}
$select_student = "SELECT * FROM `student`";
$result_student = mysqli_query($con,$select_student);
$student_count = mysqli_num_rows($result_student);

$select_ug = "SELECT * FROM `ugc`";
$result_ug = mysqli_query($con,$select_ug);
$ug_count = mysqli_num_rows($result_ug);

$select_course = "SELECT * FROM `courses`";
$result_course = mysqli_query($con,$select_course);
$course_count = mysqli_num_rows($result_course);
?>
<!DOCTYPE html>
<html>

<head>
	<title>Admin Dashboard</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="../Dashboard/dashboard.css">
	<!--Material-Icons-->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons+Rounded" rel="stylesheet">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0" />
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@48,400,0,0" />
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
	
</head>
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      google.charts.setOnLoadCallback(drawChart1);
      <?php
        $select_bca = "SELECT * FROM `student` WHERE course ='Bachelors of Computer Applications'";
        $result_bca = mysqli_query($con,$select_bca);
        $bca = mysqli_num_rows($result_bca);
        
        $select_bcom = "SELECT * FROM `student` WHERE course ='Bachelors of Commerce'";
        $result_bcom = mysqli_query($con,$select_bcom);
        $bcom = mysqli_num_rows($result_bcom);

        $select_bvoc = "SELECT * FROM `student` WHERE course ='Bachelors of Vocational Education'";
        $result_bvoc = mysqli_query($con,$select_bvoc);
        $bvoc = mysqli_num_rows($result_bvoc);

        $select_bba = "SELECT * FROM `student` WHERE course ='Bachelors of Business Administration'";
        $result_bba = mysqli_query($con,$select_bba);
        $bba = mysqli_num_rows($result_bba);

        //add on course
        $select_ai = "SELECT * FROM `enrollment` WHERE course_id='108'";
        $result_ai = mysqli_query($con, $select_ai);
        $ai = mysqli_num_rows($result_ai);

        $select_cnet = "SELECT * FROM `enrollment` WHERE course_id='109'";
        $result_cnet = mysqli_query($con, $select_cnet);
        $cnet = mysqli_num_rows($result_cnet);

        $select_bio = "SELECT * FROM `enrollment` WHERE course_id='110'";
        $result_bio = mysqli_query($con, $select_bio);
        $bio = mysqli_num_rows($result_bio);

        $select_ppst = "SELECT * FROM `enrollment` WHERE course_id='111'";
        $result_ppst = mysqli_query($con, $select_ppst);
        $ppst = mysqli_num_rows($result_ppst);
        ?>

       function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Ug Courses', 'No. of students enrolled'],
            ['BCA', <?php echo $bca;?> ],
            ['BVoc', <?php echo $bvoc;?> ],
            ['BCom',  <?php echo $bcom;?> ],
            ['BBA', <?php echo $bba;?> ]
        ]);

        var options = {
            title: 'UG Course Enrollment',
            width: 500,
            height: 500,
            pieHole: 0.4,
			backgroundColor: 'transparent', // Set the background color to transparent
            chartArea: { left: 10, top: 250, width: "80%", height: "90%" }
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
    }
	
    function drawChart1(){
        var data1 = google.visualization.arrayToDataTable([
            ['Add On Courses', 'No. of students enrolled'],
            ['Crash Course on AI', <?php echo $ai;?> ],
            ['Introduction to Computer  Networking', <?php echo $cnet;?> ],
            ['Biology and Applications of the CRISPR/Cas System',  <?php echo $bio;?> ],
            ['Build a Product Platform Strategy to Accelerate Growth', <?php echo $ppst;?> ]
        ]);

        var options1 = {
            title: 'Add On Courses Enrollment',
            width: 500,
            height: 500,
            pieHole: 0.4,
			backgroundColor: 'transparent', // Set the background color to transparent
            chartArea: { left: 90, top: 250, width: "80%", height: "80%" }
        };

        var chart1 = new google.visualization.PieChart(document.getElementById('piechart1'));
        chart1.draw(data1, options1);
    }
    </script>
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
				<a href="" class="active">
					<span class="material-symbols-sharp">dashboard</span>
					<h3>Dashboard</h3>
				</a>
				<a href="../Application/Studs2.php">
					<span class="material-symbols-outlined">person_add</span>
					<h3>Admissions</h3>
				</a>
				<a href="../Application/Studs1.php">
					<span class="material-symbols-outlined">groups</span>
					<h3>Students</h3>
				</a>
				<a href="../Messages/admMsg.php">
					<span class="material-symbols-outlined">mail</span>
					<h3>Messages</h3>
					<!-- <span class="message-count">26</span> -->
				</a>
				<a href="../UGCourse/ugcourses.php">
					<span class="material-symbols-sharp">library_books</span>
					<h3>Courses</h3>
				</a>
				<a href="../AddOnCourses/add_on_adcat.php">
					<span class="material-symbols-outlined">post_add</span>
					<h3>Add on courses</h3>
				</a>

				<a href="../Register & login/logout.php">
					<span class="material-symbols-sharp">logout</span>
					<h3>Logout</h3>
				</a>
			</div>
		</aside>
		<!---------------------END OF ASIDE--------------------->
	        <main class="main" style="margin-left: 250px;margin-top: -10px;">
            <div class="insights">

                <!-- Total Students -->
                <div class="students" style="width: 250px;height:180px;">
                    <span class="material-symbols-outlined">person_outline</span>
                    <div class="middle">
                        <div class="left">
                            <h3>Total Students</h3>
                            <h1><?php echo $student_count;?></h1>
                        </div>
                        <div class="progress">
                            <!-- Progress circle here -->
                        </div>
                    </div>
                </div>

                <!-- Total Courses -->
                <div class="courses" style="width: 250px;height:180px;">
                    <span class="material-symbols-sharp">library_books</span>
                    <div class="middle">
                        <div class="left">
                            <h3>Total Courses Offered</h3>
                            <h1><?php echo $ug_count;?></h1>
                        </div>
                        <div class="progress">
                            <!-- Progress circle here -->
                        </div>
                    </div>
                </div>

                <!-- Total Add-On Courses -->
                <div class="addOnCourses" style="width: 250px;height:180px;">
                    <span class="material-symbols-outlined">post_add</span>
                    <div class="middle">
                        <div class="left">
                            <h3>Total Add-On Courses Offered</h3>
                            <h1><?php echo $course_count;?></h1>
                        </div>
                        <div class="progress">
                            <!-- Progress circle here -->
                        </div>
                    </div>
                </div>

            </div>
			
        </main>
		<div class="charts-container" style="display: flex;">
            <div id="piechart" style="width: 300px; height: 400px;"></div>
            <div id="piechart1" style="width: 300px; height: 400px;"></div>
        </div>
</body>

</html>