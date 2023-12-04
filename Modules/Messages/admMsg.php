<?php
include('db.php');
session_start();
if(isset($_SESSION['email'])){
	$email = $_SESSION['email'];
}else{
	header("Location: ../Register & login/login.php");
}
//$messageId = '';
//$sql4 = "INSERT INTO messages_sent (m_ID,message) SELECT m_ID,message FROM messages WHERE is_responded=1";
function ReplyMessageSent($studentId, $email, $replyMessage, $messageId)
{
    global $con;
    $replyMessage = mysqli_real_escape_string($con, $replyMessage);
    //$select_query = "SELECT mID from messages WHERE is_responded=1";
    //$result = mysqli_query($con,$select_query);
    //$row = mysqli_fetch_assoc($result);
    $sql2 = "UPDATE messages SET reply_message='$replyMessage',is_responded=1 WHERE student_id='$studentId' and m_ID='$messageId'";
    /*$sql1 = "INSERT INTO messages_sent (student_id, email, reply_message, m_ID, message) VALUES ('$studentId', '$email', '$replyMessage') SELECT m_ID,message FROM messages WHERE is_responded=1";
    $sql3 = "INSERT INTO messages_sent (m_ID,message) SELECT m_ID,message FROM messages WHERE is_responded=1";*/
    if ($con->query($sql2)) {
        return true;
    } else {
        return false;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $messageId = $_POST['message_id'];
    $replyMessage = $_POST['reply_message'];
    //$studentId = $_SESSION['student_id'];

    $sql = "SELECT student_id, email FROM messages WHERE m_ID='$messageId'";
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $studentId = $row['student_id'];
        $email = $row['email'];

        if (ReplyMessageSent($studentId, $email, $replyMessage, $messageId)) {
            echo "<script>console.log('Reply message inserted successfully.')</script>";
        } else {
            echo "<script>console.log('Error inserting reply message.')</script>";
            echo "<script>console.log('$messageId');</script>";
        }
    } else {
        echo "<script>console.log('Error retrieving student ID and email.)</script>";
    }
}

$sqlUnresponded = "SELECT * FROM messages WHERE is_responded = 0";
$resultUnresponded = $con->query($sqlUnresponded);

$sqlResponded = "SELECT * FROM messages WHERE is_responded = 1";
$resultResponded = $con->query($sqlResponded);

//$sqlReply = "SELECT reply_message FROM messages WHERE student_id='$messageId'";
//$resultReply = $con->query($sqlReply);

?>


<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="../Dashboard/dashboard.css">
    <!--Material-Icons-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Rounded" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <title>Messages</title>
    <style>
       table {
      border-collapse: collapse;
      width: 97%;
      max-height : 500px;
      max-width: 100%;
      margin-left: 20px;
      border: 1px black;
      overflow-y: auto;
    }
tr,td,th{
    border:1px solid black;
}
        .home-section {
            position: relative;
            display: flex;
            margin-left: 400px;
            /* align-self:center; */
            margin-top: 20px;
            align-items: center;
            margin-bottom: 40px;
        }

        table {
            padding: 10px;
        }

        td,
        th,
        tr {
            padding: 10px;
        }

        .card {
            background-color: #e1921e;
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
            margin-right: 70px;
        }

        .card1 {
            background-color: wheat;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
            border-radius: 2rem;
            margin-bottom: 20px;
            /* display: inline-block; */
            /*max-width: 1000px;*/
            /* margin: 0 auto; */
            animation: fade 250ms ease-in-out forwards;
            width: 60%;
            height: auto;
            align-items: center;
            position: relative;
            border: 1px solid #ccc;
            padding: 20px;
            margin-right: 40px;
            margin-left: 100px;

        }

        h1 {
            text-align: center;
            margin-top: 0px;
        }

        h2 {
            font-size: medium;
        }

        form {
            text-align: center;
        }

        input {
            font-size: medium;
            background-color: #f9f7ed;
            color: black;
            outline: none;
            transition: .3s all linear;
            display: block;
            max-width: 60%;
            min-height: 5vh;
            margin-bottom: 1px;
            margin: 0 auto;
            border: none;
            border-radius: .6rem;
            padding: 1vw;
            position: relative;
            z-index: 1;

        }

        .btn-outline-secondary {
            color: #6c757d;
            background-color: transparent;
            background-image: none;
            border-color: #6c757d
        }

        .btn-outline-secondary:hover {
            color: #fff;
            background-color: #6c757d;
            border-color: #6c757d
        }

        .btn-outline-secondary.focus,
        .btn-outline-secondary:focus {
            box-shadow: 0 0 0 .2rem rgba(108, 117, 125, .5)
        }

        .btn-outline-secondary.disabled,
        .btn-outline-secondary:disabled {
            color: #6c757d;
            background-color: transparent
        }

        .btn-outline-secondary:not(:disabled):not(.disabled).active,
        .btn-outline-secondary:not(:disabled):not(.disabled):active,
        .show>.btn-outline-secondary.dropdown-toggle {
            color: #fff;
            background-color: #6c757d;
            border-color: #6c757d
        }

        .btn-outline-secondary:not(:disabled):not(.disabled).active:focus,
        .btn-outline-secondary:not(:disabled):not(.disabled):active:focus,
        .show>.btn-outline-secondary.dropdown-toggle:focus {
            box-shadow: 0 0 0 .2rem rgba(108, 117, 125, .5)
        }
    </style>
</head>

<body>
    <!----------------------ASIDE--------------------->
    <aside>
        <div class="top">
            <div class="logo">
                <!--<img src="#">-->
                <h2>ACADEMIA</h2>
            </div>
            <div class="close" id="close-btn">
                <span class="material-symbols-rounded">close</span>
            </div>
        </div>
        <div class="sidebar">
            <a href="">
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
            <a href="../Messages/admMsg.php" class="active">
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

            <!-- <a href="../Exam/exam.php">
					<span class="material-symbols-sharp">quiz</span>
					<h3>Exams</h3>
				</a> -->
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
        <div class="card" style="margin-top:60px;" data-step>
            <h1>Unresponded Messages</h1>
            <center><table>
                <thead>
                    <tr>
                        <th>Email</th>
                        <th>Message</th>
                        <th>Reply message</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($resultUnresponded->num_rows > 0) {
                        while ($row = $resultUnresponded->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["email"] . "</td>";
                            echo "<td>" . $row["message"] . "</td>";

                            echo "<td>";
                            echo "<form method='POST' action=''>";
                            echo "<input type='hidden' name='message_id' value='" . $row["m_ID"] . "'>";
                            echo "<textarea name='reply_message' rows='4' cols='20' placeholder='Reply message'></textarea><br/>";
                            echo "<button class='button-26' style='background-color: brown;
                            border: 1px solid brown;
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
                            width: fit-content;' role='button'>Send Message</button>
                          ";
                            echo "</form>";
                            echo "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='3'>No unresponded messages found.</td></tr>";
                    }
                    ?>
                </tbody>
            </table></center>
        </div>
    </section>
    <section class="home-section">
        <div class="card" style="margin-top:60px;">
            <h1>Responded Messages</h1>
            <center>
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
                        if ($resultResponded->num_rows > 0) {
                            while ($row = $resultResponded->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row["email"] . "</td>";
                                echo "<td>" . $row["message"] . "</td>";
                                echo "<td>" . $row["reply_message"] . "</td>";



                                // Fetch the reply message for this message
                                //$sqlReply = "SELECT reply_message FROM messages_sent WHERE student_id='" . $row["student_id"] . "'";
                                //$resultReply = $con->query($sqlReply);

                                /*if ($resultReply->num_rows > 0) {
                        $replyRow = $resultReply->fetch_assoc();
                        echo "<td>" . $replyRow["reply_message"] . "</td>";
                    } else {
                        echo "<td>No reply yet.</td>";
                    }*/

                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='3'>No responded messages found.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </center>
        </div>
    </section>
</body>

</html>

<?php
// Close the database connection
$con->close();
?>