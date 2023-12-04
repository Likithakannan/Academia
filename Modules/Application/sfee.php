<?php 
session_start(); 
if(isset($_SESSION['email'])){
	$email = $_SESSION['email'];
}else{
	header("Location: ../Register & login/login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Fees</title>
        <link rel="stylesheet" href="adm.css">
        <link rel="stylesheet" type="text/css" href="../css/font-awesome.css">
        <link rel="stylesheet" type="text/css" href="../Dashboard/Stud_Dashboard.css">
        
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Rounded" rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@48,400,0,0" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
        <script src="adm.js" defer></script>
        
        <style>
                 #paymentButton {
            display: none;
        }
                .card {
        background-color: #f7f2f9;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
        border-radius: 2rem;
        margin-bottom: 20px; 
        /* display: inline-block; */
        /*max-width: 1000px;*/
        /* margin: 0 auto; */
        animation: fade 250ms ease-in-out forwards;
        width: 80%;
        height: auto;
        align-items: center;
        position: relative;
        border: 1px solid #ccc;
        padding: 20px;
        margin-right:70px;
}
table{
        padding:10px;
}
td,th,tr{
        padding:10px;
}
.home-section{
    position: relative;
    display:flex;
    margin-left: 400px;
    /* align-self:center; */
    margin-top: 40px;
    align-items: center;
    margin-bottom: 40px;
}
        </style>
</head>

<body>
        <!-- <div class="container"> -->
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

                                <a href="../Application/Fees/sfee.php" class="active">
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
                                        <h3>AddOnCourses</h3>
                                </a>
                                <a href="../Register & login/logout.php">
                                        <span class="material-symbols-sharp">logout</span>
                                        <h3>Logout</h3>
                                </a>
                        </div>
                </aside>
                <!---------------------END OF ASIDE--------------------->
                <section class="home-section">
                        <?php
                        $student_id = $_SESSION['student_id'];
                        $connection = mysqli_connect("localhost", "root", "", "academia"); 

                        if(!isset($_SESSION['payment-type'])){
                        $select_name = "SELECT full_name FROM student WHERE student_id  = '$student_id'";
                        $result_name = mysqli_query($connection,$select_name);
                        $row = mysqli_fetch_assoc($result_name);
                        $name = $row['full_name'];

                        $select_spl = "SELECT specialisation,course FROM student WHERE student_id='$student_id'";
                        $result_spl = mysqli_query($connection,$select_spl);
                        $row1 = mysqli_fetch_assoc($result_spl);
                        $searchTerm = $row1['course'];
                        //echo $searchTerm;
                        $fetch_fees = "SELECT fees FROM ugc WHERE ugname LIKE '%$searchTerm%'";
                        $result_fees = mysqli_query($connection,$fetch_fees);
                        $row1 = mysqli_fetch_assoc($result_fees);
                        $fees = $row1['fees'];  
                        $select_fees = "SELECT * FROM fees WHERE student_id='$student_id'";
                        $result_select = mysqli_query($connection,$select_fees);
                        $num_rows = mysqli_num_rows($result_select);
                        if($num_rows == 0){
                        $insert_query = "INSERT INTO fees (student_id, tot_fees, current_bal) VALUES ('$student_id', '$fees', '$fees')";
                        $result_insert = mysqli_query($connection,$insert_query);      
                        }
                        $fetch_row = mysqli_fetch_assoc($result_select);
                        $total_bal = $fetch_row['current_bal'];
                        $total_paid = $fees - $total_bal;
                        }

                        ?>      

                        <div class="card" data-step >
                                <h2 class="Title">Fees payment</h2>
                        <?php 
                        
                        if (!isset($_SESSION['payment_type'])){ ?>

                                <!--<main class="main">
                                        <div class="insights">
                                                <div class="totalfees">
                                                        <span class="material-symbols-outlined">payments</span>
                                                        <div class="middle">
                                                                <div class="left">
                                                                        <h3>Total fees</h3>
                                                                        <h1><?php echo $fees;?></h1>
                                                                </div>

                                                        </div>

                                                </div>

                                                <div class="totalpaid">
                                                        <span class="material-symbols-outlined">credit_score</span>
                                                        <div class="middle">
                                                                <div class="left">
                                                                        <h3>Total Paid</h3>
                                                                        <h1><?php echo $total_paid;?></h1>
                                                                </div>
                                                        </div>
                                                </div>

                                                <div class="totalbal">
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
                                </main>-->
                                <?php }
                                ?>
                                <form method="POST" action="razorpay/pay.php" style="margin-top:60px;">
                                        <table>
                                                <tr>
                                                        <td>Type: </td>
                                                        <td>
                                                                <select name="types" id="type" onChange="showFees(this.value)">
    <option value="">--Fees Type--</option>
    <option value="admission_fees" <?php if (!isset($_SESSION['payment_type'])) { echo 'selected'; } ?>>Admission Fees</option>
    <option value="course_fees" <?php if (isset($_SESSION['payment_type']) && $_SESSION['payment_type'] === 'course_fee') { echo 'selected'; } ?>>Course Fees</option>
</select>
                                                        </td>
                                                </tr>
                                                <tr>
                                                        <td>Name: </td>
                                                        <td><input type="text" class="Name" name="Name" id="name" placeholder="Ex: Ravi R" value="<?php echo $name;?>" readonly /></td>
                                                        <td class="valid"><span class="valid" id="name-error"></span></td>
                                                </tr>

                                                <tr>
                                                        <td>Mobile number: </td>
                                                        <td><input type="text" id="phone" name="phoneA" pattern="[6-9]\d{9}" placeholder="Phone Number" required></td>
                                                        </td>
                                                </tr>

                                                <tr>
                                                        <td>Email Address: </td>
                                                        <td> <input type="email" name="emailA" placeholder="Enter Email Address" required><br></td>
                                                        <td class="valid"><span class="valid" id="nationality-error"></span></td>
                                                </tr>
                                                <tr>
                                                        <td>Amount: </td>
                                                        <td>
                                                                <input type="number" name="totalA" placeholder="Enter Amount" value="<?php if(isset($_SESSION['payment_type'])){ if($_SESSION['payment_type']=== 'course_fee') { echo $_SESSION['total_price']; }} ?>" <?php if(isset($_SESSION['payment_type'])){ if($_SESSION['payment_type'] === 'course_fee') { echo 'readonly'; }}
                                                                 ?>required><br>
                                                        </td>
                                                </tr>

                                        </table>
                                        <!-- <form method="GET" action="pay.php"> -->



                                        <!-- <input type="hidden" name="typeProduct" value="<?php echo $randomValue; ?>" Pass the random value as a hidden field -->
                                         <center>
                    <button name="pay" class="btn btn-success" role="button" id="paymentButton">

    </center>

                                                                     
                                        <!--<center> <button name="pay" class="btn btn-success" role="button">PAY NOW</button>-->
                                </form>



                                <!-- <table class="fees">
                <th>Sl. No</th>
                <th>Date</th>
                <th>Transaction ID</th>
                <th>Mode of Payment</th>
                <th>Amount</th>
                <th>Status</th>
                <th>Download Receipt</th>
        </table> -->
                                </form>
                        </div><br>
        </div>
                </section>
        </div>
        <section class="home-section">

        <div class="card" data-step>
               
                        <table style="margin-left: 20px;">
                                <?php
                                
                                $query = "SELECT * FROM onlinepayment WHERE student_id='$student_id' AND type='admission_fees'";
                                $query_run = mysqli_query($connection, $query);
                                ?>
                                <tr>
                                        <th style="width:15%">Sl. No</th>
                                        <th>Date</th>
                                        <th>RazorPay OrderID</th>
                                        <th>Mode of Payment</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                        <th>Download Receipt</th>
                                </tr>
                                <?php
                                if (mysqli_num_rows($query_run) > 0) {
                                        $count = 0;
                                        while ($row = mysqli_fetch_assoc($query_run)) {
                                                $count++;
                                ?>
                                                <tr>
                                                        <td><?php echo $count; ?></td>
                                                        <td><?php echo $row['updatestamp']; ?></td>
                                                        <td><?php echo $row['razorpayOrderId']; $data = $row['razorpayOrderId'];?></td>
                                                        <td><?php echo 'online'; ?></td>
                                                        <td><?php echo $row['toValue']; ?></td>
                                                        <td><?php echo $row['paymentStatus']; ?></td>
                                                        <td><?php if ($row['paymentStatus'] == 'SUCCESS') : ?>
                                                                        <a href="tcpdf/generate.php?data=<?php echo $data; ?>" target="_blank">Receipt
                                                                        <?php endif; ?>
                                                                        </a>
                                                        </td>
                                                </tr>
                                <?php
                                        }
                                }
                                ?>
                        </table>
                        <!--<input type="hidden" name="typeProduct" value="<?php echo $randomValue; ?>"> <Pass the random value as a hidden field -->
                </div>
                <script>
                        function goToAnotherPage() {
                                // Redirect to another page
                                window.location.replace('razorpay/pay.php');
                        }
                </script>

                </center>
        </div>
        <script>
    function showFees(selectedType) {
        const button = document.getElementById("paymentButton");
        const totalBal = <?php echo $total_bal; ?>;

        if (selectedType === 'admission_fees' && totalBal === 0) {
            button.textContent = 'Paid';
            button.disabled = true;
        } else {
            button.textContent = 'Pay Now';
            button.disabled = false;
        }

        // Show the button after selecting the fee type
        button.style.display = "block";
    }

    // Function to call when the fee type selection changes
    function onFeeTypeChange() {
        const selectedType = document.getElementById("type").value;
        showFees(selectedType);
    }

    // Trigger the showFees function on page load
    document.addEventListener('DOMContentLoaded', function () {
        const selectedType = document.getElementById("type").value;
        showFees(selectedType);
    });
</script>
</body>

</html>