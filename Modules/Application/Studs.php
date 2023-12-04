<?php 
  if(isset($_SESSION['email'])){
	$email = $_SESSION['email'];
}else{
	header("Location: ../Register & login/login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link rel="stylesheet" href="Studs.css">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
  <link rel="stylesheet" type="text/css" href="../css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="../Dashboard/dashboard.css">
  <!--Material-Icons-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Rounded" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@48,400,0,0" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
  <title>Student Admissions</title>
  </script>
</head>
<style>
  .container {
  display: flex;
  flex-wrap: wrap;
}
.home-section{
    position: relative;
    display:flex;
    margin-left: 200px;
    /* align-self:center; */
    margin-top: 40px;
    align-items: center;
    margin-bottom: 40px;
    overflow:hidden;
    margin-right: 0px;
}
table{
  margin-left:0%;
  background-color: white;
    border: 1px solid black;
}

</style>
<body>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


  <!----------------------ASIDE--------------------->
  <div class="container">
    <!-- <aside>
      <div class="top">
        <div class="logo">
         
          <h2>ACADEMIA</h2>
        </div>
        <div class="close" id="close-btn">
          <span class="material-symbols-rounded">close</span>
        </div>
      </div>
      <div class="sidebar">
        <a href="../Dashboard/Admin_dashboard.html">
          <span class="material-symbols-sharp">dashboard</span>
          <h3>Dashboard</h3>
        </a>
        <a href=" " class="active">
          <span class="material-symbols-outlined">person_add</span>
          <h3>Admissions</h3>
        </a>
        <a href="#">
          <span class="material-symbols-outlined">mail</span>
          <h3>Messages</h3>
          <span class="message-count">26</span>
        </a>
        <a href="#">
          <span class="material-symbols-sharp">library_books</span>
          <h3>Courses</h3>
        </a>
        <a href="#">
          <span class="material-symbols-outlined">post_add</span>
          <h3>Add on courses</h3>
        </a>

        <a href="../Exam/exam.php">
          <span class="material-symbols-sharp">quiz</span>
          <h3>Exams</h3>
        </a>
        <a href="#">
          <span class="material-symbols-sharp">workspace_premium</span>
          <h3>Certificates</h3>
        </a>
        <a href="#">
          <span class="material-symbols-sharp">logout</span>
          <h3>Logout</h3>
        </a>
      </div>
    </aside> -->

    <!---------------------END OF ASIDE--------------------->
<section class="home-section">
  <div class="container">
   
   <?php
    $connection = mysqli_connect("localhost", "root", "", "academia");

    // Check if the connection was successful
    if (!$connection) {
      die("Database connection failed: " . mysqli_connect_error());
    }

    $query = "SELECT * FROM student s
          JOIN contact c ON s.student_id = c.student_id
          JOIN family f ON s.student_id = f.student_id";
          //JOIN exam e ON s.student_id = e.student_id";
    $query_run = mysqli_query($connection, $query);
    ?>

    <table class="Studtable">
      <thead>
        <tr>
        <th>Student ID</th>
      <th>Name</th>
      <th>Email</th>
      <th>Mobile</th>
      <th>Aadhar</th>
      <th>PAN</th>
      <th>Address</th>
      <th>City</th>
      <th>PIN code</th>
      <th>State</th>
      <th>Country</th>
      <th>Date of Birth</th>
      <th>Blood Group</th>
      <th>Nationality</th> 
      <th>Community</th> 
      <th>Caste</th> 
      <th>Category</th>
      <th>Course</th>
      <th>Specialisation</th>
      <th>Father's Name</th> 
      <th>Father's Occupation</th> 
      <th>Father's Mobile number</th>
      <th>Father's email</th>
      <th>Father's income</th>
      <th>Mother's Name</th> 
      <th>Mother's Occupation</th> 
      <th>Mother's Mobile number</th>
      <th>Mother's email</th>
      <th>Mother's income</th>
      <th>Guardian's Name</th> 
      <th>Guardian's Occupation</th> 
      <th>Guardian's Mobile number</th>
      <th>Guardian's email</th>
      <th>Guardian's income</th>
      <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        if (mysqli_num_rows($query_run) > 0) {
          while ($row = mysqli_fetch_assoc($query_run)) {
            
        ?>
        
      <tr>
      <td><?php echo $row['student_id'] ?></td>
      <td><?php echo $row['username'] ?></td>
      <td><?php echo $row['email'] ?></td>
      <td><?php echo $row['mobile'] ?></td>
      <td><?php echo $row['aadhar'] ?></td>
      <td><?php echo $row['pan'] ?></td>
      <td><?php echo $row['address'] ?></td>
      <td><?php echo $row['city'] ?></td>
      <td><?php echo $row['pincode'] ?></td>
      <td><?php echo $row['state'] ?></td>
      <td><?php echo $row['country'] ?></td>
      <td><?php echo $row['dob'] ?></td>
      <td><?php echo $row['blood_group'] ?></td>
      <td><?php echo $row['nationality'] ?></td>
      <td><?php echo $row['community'] ?></td>
      <td><?php echo $row['caste'] ?></td>
      <td><?php echo $row['category'] ?></td>
      <td><?php echo $row['course'] ?></td>
      <td><?php echo $row['specialisation'] ?></td>
      <td><?php echo $row['fname'] ?></td> 
      <td><?php echo $row['foccupation'] ?></td> 
      <td><?php echo $row['fmobile'] ?></td> 
      <td><?php echo $row['femail'] ?></td> 
      <td><?php echo $row['fincome'] ?></td> 
      <td><?php echo $row['mname'] ?></td> 
      <td><?php echo $row['moccupation'] ?></td> 
      <td><?php echo $row['mmobile'] ?></td> 
      <td><?php echo $row['memail'] ?></td> 
      <td><?php echo $row['mincome'] ?></td> 
      <td><?php echo $row['gname'] ?></td> 
      <td><?php echo $row['goccupation'] ?></td> 
      <td><?php echo $row['gmobile'] ?></td> 
      <td><?php echo $row['gemail'] ?></td> 
      <td><?php echo $row['gincome'] ?></td>
      <td>
              <button class="btn btn-success">Approve</button>
              <button class="btn btn-danger">Reject</button>
            </td> 
            </tr>
            <script>
    function approveStudent(studentId) {
      axios.post('/approve', { studentId: studentId })
        .then(function(response) {
          // Handle the response if needed
          console.log(response);
        })
        .catch(function(error) {
          // Handle the error if needed
          console.error(error);
        });
    }
  </script>
        <?php
          }
        } else {
          echo "<tr><td colspan='6'>No Record Found</td></tr>";
        }

        // Close the database connection
        mysqli_close($connection);
        ?>
      </tbody>
    </table>
  </div>
    </section>
</body>
<?php
require('./db.php');

$con = mysqli_connect("localhost", "root", "", "academia");
$sql_run = mysqli_query($con, $query);
    if (mysqli_num_rows($sql_run) > 0) {
      while ($sqll = mysqli_fetch_assoc($sql_run)) {
        $student_id = $_POST['student_id'];
      }
    }
    // Check if the connection was successful
    if (!$con) {
      die("Database connection failed: " . mysqli_connect_error());
    }
    $sql = "UPDATE student 
    SET is_approved = '1' 
    WHERE student_id = $student_id";
   
    
  // Update the 'is_approved' column to 1 in the database for the given studentId
  // Replace 'your_table_name' with the actual table name and 'your_column_name' with the actual column name in your database
  // $sql = "UPDATE student SET is_approved = 1 WHERE student_id = $student_id";
  // mysqli_query($con, $query);
  // if ($con->query($sql) === TRUE) {
  //     echo "<script>alert('Record updated successfully')</script>";
  // } else {
  //     echo "<script>alert('Error updating record')</script>" . $con->error;
  // }
  // Execute the query
  // Replace 'your_database_connection' with your actual database connection variable
?>
</html>