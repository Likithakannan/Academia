<?php
session_start();
if (isset($_SESSION['email'])) {
  $email = $_SESSION['email'];
} else {
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

  <script src="https://kit.fontawesome.com/3b822bcb84.js" crossorigin="anonymous"></script>
  <title>Students</title>


  <style>
     .home-section {
      position: relative;
      display: flex;
      margin-left: 100px;
      /* align-self:center; */
      margin-top: 50px;
      /* align-items: center; */
      margin-bottom: 40px;
      margin-right: 10px;
      width: 100%;
      overflow-y: auto;
      width: calc(100% - 20px);
      /* Adjusted width to account for scrollbar */

    }

    table.Studtable {
      border-collapse: collapse;
      width: 100%;
      max-height: 500px;
      max-width: 100%;
      margin-left: 20px;
      margin-top: 550px;
      margin-bottom: 0px;
      overflow-y: auto;
    }

    table.Studtable thead {
      position: sticky;
      top: 0;
      z-index: 1;
      background-color: #fff;
    }

  </style>
</head>

<body>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


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
      <a href="../Dashboard/Admin_dashboard.php">
        <span class="material-symbols-sharp">dashboard</span>
        <h3>Dashboard</h3>
      </a>
      <a href="../Application/Studs2.php">
        <span class="material-symbols-outlined">person_add</span>
        <h3>Admissions</h3>
      </a>
      <a href="../Application/Studs1.php" class="active">
        <span class="material-symbols-outlined">groups</span>
        <h3>Students</h3>
      </a>
      <a href="../Messages/admMsg.php">
        <span class="material-symbols-outlined">mail</span>
        <h3>Messages</h3>

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
  <section class="home-section ">
    <section class="home-section table-container">

      <div class="container">

        <?php
        $connection = mysqli_connect("localhost", "root", "", "academia");

        if (!$connection) {
          die("Database connection failed: " . mysqli_connect_error());
        }
        $query = "SELECT * FROM student";
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
              <!-- <th>Course</th>
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
      <th>Guardian's income</th> -->
              <!-- <th>PDF</th> -->
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
                  <td><?php echo $row['full_name'] ?></td>
                  <td><?php echo $row['email'] ?></td>
                  <td><?php echo $row['phone'] ?></td>
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
                  <!-- <td><?php echo $row['course'] ?></td>
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
      <td><?php echo $row['gincome'] ?></td> -->
                  <!-- <td> -->
                  <?php
                  //$mysqli = new mysqli("localhost", "root", "", "academia");

                  $email = $row['email'];
                  //echo $email;
                  // Check if the connection was successful
                  /*if ($mysqli->connect_error) {
          die("Database connection failed: " . $mysqli->connect_error);
      }*/

                  $pdfId = 1;

                  // Prepare and execute the query
                  $query = "SELECT pdf FROM student_details WHERE email=?";
                  //$stmt = $mysqli->prepare($query);
                  //$stmt->bind_param('s', $email);
                  //$stmt->execute();

                  // Bind the result to a variable
                  //$stmt->bind_result($pdfData);

                  // Fetch the result
                  //if ($stmt->fetch()) {
                  // Generate a unique filename for the downloaded PDF
                  //  $filename = uniqid('pdf_') . '.pdf';

                  // Set the appropriate headers for PDF download
                  //header('Content-Type: application/pdf');
                  //header('Content-Disposition: attachment; filename="' . $filename . '"'); // Change the filename as needed

                  // Output the PDF data
                  //echo $pdfData;
                  //} else {
                  // PDF not found or error occurred
                  //  echo 'PDF not found.';
                  //}

                  //$stmt->close();
                  //$mysqli->close();

                  ?>
                  <!-- Using query parameter -->
                  <!-- <a href="view_pdf.php?pdf_path=<?php //echo $row['pdf']; 
                                                      ?>" class="btn btn-success">
  <i class="fa fa-file-pdf-o"></i> View PDF
</a>


<form action="view_pdf.php" method="post">
  <input type="hidden" name="pdf_path" value="<?php //echo $row['pdf']; 
                                              ?>">
  <button type="submit" class="btn btn-success">
    <i class="fa fa-file-pdf-o"></i> View PDF
  </button>
</form> -->


                  <!-- <button onclick="window.location.href='download.php'" class="btn btn-outline-warning">Download PDF</button> -->

                  <!-- </td> -->
                  <td>
                    <a href="edit.php?student_id=<?php echo $row['student_id']; ?>&type=edit">
                      <button class="btn btn-info" type="submit" name="approve">Edit</button>
                    </a><br /><br />

                    <a href="edit.php?student_id=<?php echo $row['student_id']; ?>&type=delete">
                      <button class="btn btn-danger" type="submit" name="reject">Delete</button>
                    </a>
                  </td>
                  <?php


                  if (isset($_POST['reject'])) {

                    echo '<script>alert("Failed to send the message';
                  }
                  ?>
                  </form>

                  </td>
                </tr>
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
  </section>
</body>
<?php
require('db.php');
?>

</html>