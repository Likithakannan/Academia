<?php
include ('db.php');
session_start();
if (isset($_SESSION['student_id'])) {
    $student_id = $_SESSION['student_id'];
} else {
    $student_id = 'No';
}
$sql = "SELECT email FROM student WHERE student_id='$student_id'";
$result = mysqli_query($con, $sql);

if ($result) {

    $row = mysqli_fetch_assoc($result);
   
}
/*$sql1="SELECT * FROM messages_sent WHERE student_id='$student_id'";
$result1=mysqli_query($con,$sql1);
if($result1){
    $row1=mysqli_fetch_assoc($result1);
}*/
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
       
        <link rel="stylesheet" href="../Application/adm.css">
        <link rel="stylesheet" type="text/css" href="../css/font-awesome.css">
        <link rel="stylesheet" type="text/css" href="../Dashboard/Stud_Dashboard.css">
        
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Rounded" rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@48,400,0,0" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
        <script src="adm.js" defer></script>
    <title>Enquiries</title>
    <style>
        table {
            border:1;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
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
table{
        padding:10px;
}
td,th,tr{
        padding:10px;
}
.card {
        background-color: #dcf8fa;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
        border-radius: 2rem;
        margin-bottom: 20px; 
        display: inline-block;
        max-width: 1000px;
        margin: 0 auto; 
        animation: fade 250ms ease-in-out forwards;
        width: 100%;
        height: auto;
        align-items: center;
        position: relative;
        border: 1px solid #ccc;
        padding: 20px;
        margin-right:10px;
}


/* CSS */
.button-26 {
  appearance: button;
  
}

.button-26:disabled {
  opacity: .5;
}

.button-26:focus {
  outline: 0;
}

.button-26:hover {
  background-color: #0A46E4;
  border-color: #0A46E4;
}

.button-26:active {
  background-color: #0039D7;
  border-color: #0039D7;
}
        </style>
</head>
<body>
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
				<a href="../Messages/stuMsg.php" class="active">
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
        <div class="container">
    <center><h1 style="margin-top:50px;margin-left:450px;width:500px">Contact Admin</h1></center>
   <br/>
   <br/>
   <br/>
   <div class="card" style="margin-top:150px;margin-left:-650px;width:450px;height:450px;" data-step >
    <form method="post" action="processMsg.php">
   <b style="font-size:15px" >Student ID:</b><br/>
        <input type="text" id="name" name="name" size="55" value="<?php echo $student_id ?>"><br><br>
        
    <b style="font-size:15px">Email:</b><br/>
        <input type="email" id="email" name="email" size="55" value="<?php echo $row['email'];?>"><br><br>
        
    <b style="font-size:15px">Message:</b><br/>
        <textarea id="message" name="message" rows="10" cols="58" required></textarea><br><br>
        
        <!-- <input class="button-7" type="submit" value="Submit"/> -->
        <!-- HTML !-->
<button class="button-26" style="background-color: #1652F0;
  border: 1px solid #1652F0;
  border-radius: 4px;
  box-sizing: border-box;
  color: #FFFFFF;
  cursor: pointer;
  font-family: Graphik,-apple-system,system-ui,'Segoe UI',Roboto,Oxygen,Ubuntu,Cantarell,'Fira Sans','Droid Sans','Helvetica Neue',sans-serif;
  font-size: 14px;
  line-height: 1.15;
  overflow: visible;
  padding: 12px 16px;
  position: relative;
  text-align: center;
  text-transform: none;
  transition: all 80ms ease-in-out;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
  width: fit-content;" role="button">SUBMIT</button>


    </form>
</div>
    <br/>
    <br/>
    <div class="card" style="margin-top:40px;margin-left:100px;width:800px;" >
    <table>
        <thead>
            <tr>
                <th>Email</th>
                <th>Message</th>
                <th>Reply message</th>
            </tr>
        </thead>
        <tbody>
        <?php

        $sqlMessages = "SELECT * FROM messages WHERE student_id='$student_id'";
        $resultMessages = mysqli_query($con, $sqlMessages);

        /*$sqlReplies = "SELECT * FROM messages_sent WHERE student_id='$student_id' ";
        $resultReplies = mysqli_query($con, $sqlReplies);*/

        if ($resultMessages->num_rows > 0) {
            while ($messageRow = mysqli_fetch_assoc($resultMessages)) {
                echo "<tr>";
                echo "<td>" . $messageRow["email"] . "</td>";
                echo "<td>" . $messageRow["message"] . "</td>";

                /*$replyRow = mysqli_fetch_assoc($resultReplies);
                if ($replyRow) {
                    
                } */
                if($messageRow["reply_message"]=='') {
                    echo "<td>No reply yet.</td>";
                }
                else{
                    echo "<td>" . $messageRow["reply_message"] . "</td>";

                }

             
                echo "<form method='POST' action=''>";
                echo "<input type='hidden' name='message_id' value='" . $messageRow["student_id"] . "'>";
         
                echo "</form>";
               
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No messages found.</td></tr>";
        }
        ?>
        </tbody>
    </table>
    </div>
    </div>

</body>
</html>

<?php
// Close the database connection
$con->close();
?>





