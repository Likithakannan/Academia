<?php 
include('db.php');
session_start();
if(isset($_SESSION['email'])){
	$email = $_SESSION['email'];
}else{
	header("Location: ../Register & login/login.php");
}

						$student_id=$_SESSION['student_id'];
						$select_name = "SELECT full_name FROM student WHERE student_id  = '$student_id'";
                        $result_name = mysqli_query($con,$select_name);
                        $row = mysqli_fetch_assoc($result_name);
                        $name = $row['full_name'];
						echo '    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<style>
        /* Add your custom styles here */
        .welcome-message {
            text-align: center;
            font-size: 24px;
            font-family: "Your Custom Font", sans-serif;
            color: #000;
            margin-top: 40px;
        }
		p{
			font-size : 18px;
		}
        .welcome-icons {
            font-size: 30px;
            color: #007bff;
        }
    </style>'.'<div class="welcome-message" ">
        <span class="welcome-icons" style="color:blue"><i class="fas fa-user-circle"></i></span>
        Welcome, '. $name.'!'.
        
    '<p style="margin-top:20px;color:black;margin-left:200px;">Check your fee details regularly to stay informed about upcoming payments and dues.</p>
</div>';
                        $select_spl = "SELECT specialisation,course FROM student WHERE student_id='$student_id'";
                        $result_spl = mysqli_query($con,$select_spl);
                        $row1 = mysqli_fetch_assoc($result_spl);
                        $searchTerm = $row1['course'];
                        //echo $searchTerm;
                        $fetch_fees = "SELECT fees FROM ugc WHERE ugname LIKE '%$searchTerm%'";
                        $result_fees = mysqli_query($con,$fetch_fees);
                        $row1 = mysqli_fetch_assoc($result_fees);
                        $fees = $row1['fees'];  
                        $select_fees = "SELECT * FROM fees WHERE student_id='$student_id'";
                        $result_select = mysqli_query($con,$select_fees);
                        $num_rows = mysqli_num_rows($result_select);
                        if($num_rows == 0){
                        	$insert_query = "INSERT INTO fees (student_id, tot_fees, current_bal) VALUES ('$student_id', '$fees', '$fees')";
                        	$result_insert = mysqli_query($con,$insert_query);      
				$fetch_row = mysqli_fetch_assoc($result_select);
                        	        $total_bal = $fetch_row['current_bal'];
                        	        $total_paid = $fees - $total_bal;
                        }
                        else{
				$fetch_row = mysqli_fetch_assoc($result_select);
                        	$total_bal = $fetch_row['current_bal'];
                        	$total_paid = $fees - $total_bal;
			}
                        ?>      
<!DOCTYPE html>
<html>
<head>
	<title>Student Dashboard</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="../Dashboard/Stud_Dashboard.css">
	<!--Material-Icons-->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons+Rounded"
      rel="stylesheet">
	  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0" />
	  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@48,400,0,0" />
	  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
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
				<a href="Student_dashboard.php" class="active">
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
					<!-- <span class="message-count">26</span> -->
				</a>
				
				<a href="../UGCourse/course_disp.php">
					<span class="material-symbols-outlined">post_add</span>
					<h3>Courses</h3>
				</a>
				<a href="../AddOnCourses/enrolled.php">
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
		

                                <main class="main" style="margin-left: 350px;margin-top: 50px;">
                                        <div class="insights">
                                                <div class="totalfees" style="width:200px;">
                                                        <span class="material-symbols-outlined">payments</span>
                                                        <div class="middle">
                                                                <div class="left">
                                                                        <h3>Total fees</h3>
                                                                        <h1><?php echo $fees;?></h1>
                                                                </div>

                                                        </div>

                                                </div>

                                                <div class="totalpaid" style="margin-left: 30px;width:200px;">
                                                        <span class="material-symbols-outlined">credit_score</span>
                                                        <div class="middle">
                                                                <div class="left">
                                                                        <h3>Total Paid</h3>
                                                                        <h1><?php echo $total_paid;?></h1>
                                                                </div>
                                                        </div>
                                                </div>

                                                <div class="totalbal" style="margin-left: 30px;width:200px;">
                                                        <span class="material-symbols-outlined">account_balance_wallet</span>
                                                        <div class="middle">
                                                                <div class="left">
                                                                        <h3>Total Balance</h3>
                                                                        <h1><?php echo $total_bal;?></h1>
                                                                </div>
                                                        </div>
                                                        <small class="text-muted">Due on </small>
                                                </div>
                                        </div>
					</main>
		
	</div>
</body>
</html>
