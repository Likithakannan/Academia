<?php
$connection = mysqli_connect("localhost", "root", "", "academia");

session_start();
if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
} else {
    header("Location: ../Register & login/login.php");
}

if (!$connection) {
    die("Database connection failed: " . mysqli_connect_error());
}

$query = "SELECT * FROM student_details";
$query_run = mysqli_query($connection, $query);
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
    <title>Students Admissions</title>
    <style>
        .home-section {
            position: relative;
            display: flex;
            margin-left: 200px;
            /* align-self:center; */
            margin-top: 40px;
            /* align-items: center; */
            margin-bottom: 40px;
            margin-right: 10px;
            width: 100%;

        }

        table {
            border-collapse: collapse;
            width: 97%;
            margin-left: 0px;
        }
    </style>
</head>

<body>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <?php
    ob_start(); // Start output buffering
    require_once('tcpdf/tcpdf.php');

    if (isset($_POST['download_pdf'])) {
        // Create new PDF document
        $sid = $_POST['sid'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $Aadhar = $_POST['aadhar'];
        $PAN = $_POST['pan'];
        $Address = $_POST['address'];
        $City = $_POST['city'];
        $Pincode = $_POST['pincode'];
        $State = $_POST['state'];
        $Country = $_POST['country'];
        $DOB = $_POST['dob'];
        $BloodGroup = $_POST['blood_group'];
        $Nationality = $_POST['nationality'];
        $Community = $_POST['community'];
        $Caste = $_POST['caste'];
        $Category = $_POST['category'];

        $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetTitle($name . 'Application form');
        $pdf->SetHeaderData('', '', 'College Application', '');
        $pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
        $pdf->SetDefaultMonospacedFont('helvetica');
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
        $pdf->SetMargins(10, 10, 10, true);
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);
        $pdf->SetAutoPageBreak(TRUE, 10);
        $pdf->SetFont('helvetica', '', 12);
        $pdf->AddPage();

        $pdf->Cell(0, 10, 'College Application', 0, 1, 'C');
        $pdf->Ln(10);

        $html = '
        <table cellspacing="1" cellpadding="3" border="1">
            <tr>
                <td>Name:</td>
                <td>' . $name . '</td>
            </tr>
            <tr>
                <td>Email:</td>
                <td>' . $email . '</td>
            </tr>
            <tr>
                <td>DOB:</td>
                <td>' . $DOB . '</td>
            </tr>
            <tr>
                <td>Nationality:</td>
                <td>' . $Nationality . '</td>
            </tr>
            <tr>
                <td>Community:</td>
                <td>' . $Community . '</td>
            </tr>
            <tr>
                <td>Caste:</td>
                <td>' . $Caste . '</td>
            </tr>
            <tr>
                <td>Category:</td>
                <td>' . $Category . '</td>
            </tr>
            <tr>
                <td>Aadhar Number:</td>
                <td>' . $Aadhar . '</td>
            </tr>
            
            <tr>
                <td>PAN number:</td>
                <td>' . $PAN . '</td>
            </tr>
            <tr>
                <td>Blood Group:</td>
                <td>' . $BloodGroup . '</td>
            </tr>
            <tr>
                <td>Phone Number:</td>
                <td>' . $phone . '</td>
            </tr>
            <tr>
                <td>Address:</td>
                <td>' . $Address . '</td>
            </tr>
            <tr>
                <td>Country:</td>
                <td>' . $Country . '</td>
            </tr>
            <tr>
                <td>State:</td>
                <td>' . $State . '</td>
            </tr>
            <tr>
                <td>City:</td>
                <td>' . $City . '</td>
            </tr>
            <tr>
                <td>PIN code:</td>
                <td>' . $Pincode . '</td>
            </tr>
            <tr>
        <td>Father\'s Name:</td>
        <td>' . $Father_name . '</td>
    </tr>
    <tr>
        <td>Father\'s Occupation:</td>
        <td>' . $Father_Occupation . '</td>
    </tr>
    <tr>
        <td>Father\'s Number:</td>
        <td>' . $Father_Number . '</td>
    </tr>
    <tr>
        <td>father\'s email:</td>
        <td>' . $Father_email . '</td>
    </tr>
    <tr>
    <td>Father\'s Annual Income:</td>
    <td>' . $Father_AI . '</td>
</tr>
    <tr>
        <td>Mother\'s Name:</td>
        <td>' . $Mother_Name . '</td>
    </tr>
    <tr>
        <td>Mother\'s Occupation:</td>
        <td>' . $Mother_Occupation . '</td>
    </tr>
    <tr>
        <td>Mother\'s Number:</td>
        <td>' . $Mother_Number . '</td>
    </tr>
    <tr>
        <td>Mother\'s Email:</td>
        <td>' . $Mother_email . '</td>
    </tr>
    <tr>
        <td>Mother\'s Annual Income :</td>
        <td>' . $Mother_AI . '</td>
    </tr>
    <tr>
        <td>Guardian\'s Name:</td>
        <td>' . $Guardian_Name . '</td>
    </tr>
    <tr>
        <td>Guardian\'s Occupation:</td>
        <td>' . $Guardian_Occupation . '</td>
    </tr>
    
    <tr>
        <td>Guardian\'s Number:</td>
        <td>' . $Guardian_Number . '</td>
    </tr>
    
    
    <tr>
        <td>Guardian\'s Email:</td>
        <td>' . $Guardian_email . '</td>
    </tr>
   
    
    <tr>
        <td>Guardian\'s Annual Income:</td>
        <td>' . $Guardian_AI . '</td>
    </tr>    
        </table>
        ';

        $pdf->writeHTML($html);

        $pdfFileName = 'Application_' . uniqid('Academia_') . '.pdf';
        $pdf->Output(__DIR__ . '/pdfs/' . $pdfFileName, 'F');

        $baseURL = 'http://localhost/academia/';

        $pdfURL = $baseURL . 'Modules/Application/pdfs/' . $pdfFileName;
        $pdfContent = $pdf->Output('', 'S');

        // Convert the PDF content to base64-encoded string
        $pdfData = base64_encode($pdfContent);

        require('db.php');

        $pdfData = $con->real_escape_string($pdfData);

        // Close the database connection
        $con->close();

        header("Location: ./studentApplication.php?filename=" . urlencode($pdfURL));
        exit;
    }
    ?>
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
            <a href="../Application/Studs2.php" class="active">
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

            </a>
            <a href="../UGCourse/ugcourses.php">
                <span class="material-symbols-sharp">library_books</span>
                <h3>Courses</h3>
            </a>
            <a href="../AddOnCourses/add_on_adcat.php">
                <span class="material-symbols-outlined">post_add</span>
                <h3>Add on courses</h3>
            </a>

            <a href="../Exam/exam.php">
                <span class="material-symbols-sharp">quiz</span>
                <h3>Exams</h3>
            </a>
            <!-- <a href="#">
                <span class="material-symbols-sharp">workspace_premium</span>
                <h3>Certificates</h3>
            </a> -->
            <a href="../Register & login/logout.php">
                <span class="material-symbols-sharp">logout</span>
                <h3>Logout</h3>
            </a>
        </div>
    </aside>
    <!---------------------END OF ASIDE--------------------->

    <section class="home-section">
        <div class="container">
            <?php
            $connection = mysqli_connect("localhost", "root", "", "academia");

            if (!$connection) {
                die("Database connection failed: " . mysqli_connect_error());
            }

            $query = "SELECT * FROM student_details";
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
                        <th>Address</th>
                        <th>PDF</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    if (mysqli_num_rows($query_run) > 0) {
                        while ($row = mysqli_fetch_array($query_run)) {

                    ?>

                            <tr>
                                <form method="post">
                                    <input type="hidden" name="download_pdf" value="1">
                                    <input type="hidden" name="sid" value="<?php echo $row['sid']; ?>">
                                    <input type="hidden" name="name" value="<?php echo $row['name']; ?>">
                                    <input type="hidden" name="email" value="<?php echo $row['email']; ?>">
                                    <input type="hidden" name="phone" value="<?php echo $row['phone']; ?>">
                                    <input type="hidden" name="aadhar" value="<?php echo $row['aadhar']; ?>">
                                    <input type="hidden" name="pan" value="<?php echo $row['pan']; ?>">
                                    <input type="hidden" name="address" value="<?php echo $row['address']; ?>">
                                    <input type="hidden" name="city" value="<?php echo $row['city']; ?>">
                                    <input type="hidden" name="pincode" value="<?php echo $row['pincode']; ?>">
                                    <input type="hidden" name="state" value="<?php echo $row['state']; ?>">
                                    <input type="hidden" name="country" value="<?php echo $row['country']; ?>">
                                    <input type="hidden" name="dob" value="<?php echo $row['dob']; ?>">
                                    <input type="hidden" name="blood_group" value="<?php echo $row['blood_group']; ?>">
                                    <input type="hidden" name="nationality" value="<?php echo $row['nationality']; ?>">
                                    <input type="hidden" name="community" value="<?php echo $row['community']; ?>">
                                    <input type="hidden" name="caste" value="<?php echo $row['caste']; ?>">
                                    <input type="hidden" name="category" value="<?php echo $row['category']; ?>">

                                    <td><?php echo $row['sid'] ?></td>
                                    <td><?php echo $row['name'] ?></td>
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
                                    <td><?php echo $row['address'] ?></td>
                                    <td>
                                        <form method="post">
                                            <input type="hidden" name="download_pdf" value="1">
                                            <button type="submit" class="btn btn-outline-warning">Download PDF</button>
                                        </form>
                                    </td>
                                    <td>
                                        <?php
                                        $name = $row['name'];
                                        $studentId = $row['sid'];
                                        $studentEmail = $row['email'];
                                        $pass = rand(100000, 999999);

                                        if ($row['is_approved'] == 1) {
                                            echo '<button class="btn btn-success" disabled>Approved</button>';
                                            echo '<br /><br />';
                                            echo '<button class="btn btn-danger" disabled>Reject</button>';
                                        } else {
                                            echo '
                                                <form method="post">
                                                    <input type="hidden" name="student_id" value="' . $studentId . '">
                                                    <input type="hidden" name="student_email" value="' . $studentEmail . '">
                                                    <button class="btn btn-success" type="submit" name="approve">Approve</button>
                                                    <br /><br />
                                                    <button class="btn btn-danger" type="submit" name="reject">Reject</button>
                                                </form>
                                            ';
                                        }
                                        ?>

                                        <?php
                                        if (isset($_POST['approve'])) {
                                            require_once('approvalMail.php');

                                            $sql = "UPDATE student_details SET is_approved = '1', pass = '$pass' WHERE sid = $studentId";
                                            $sql_run = mysqli_query($connection, $sql);
                                            if ($sql_run) {
                                                echo '<script>window.alert("Mail sent")</script>';
                                            } else {
                                                echo '<script>window.alert("Failed to approve")</script>';
                                            }
                                            $sendMl->send($name, $pass, $studentEmail);
                                        }

                                        if (isset($_POST['reject'])) {
                                            require_once('rejectMail.php');

                                            $sendRMl->send($name, $studentEmail);
                                        }
                                        ?>
                                    </td>
                                </form>
                            </tr>
                    <?php
                        }
                    } else {
                        echo "<tr><td colspan='20'>No new registrations yet!</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </section>
</body>

</html>
