<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Exam</title>
        <!-- <link rel="stylesheet" href="adm.css"> -->
        <!-- <link rel="stylesheet" type="text/css" href="/css/font-awesome.css"> -->
        <link rel="stylesheet" type="text/css" href="../Dashboard/dashboard.css">
        <!-- <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Rounded" rel="stylesheet"> -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@48,400,0,0" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
        <script src="https://kit.fontawesome.com/3b822bcb84.js" crossorigin="anonymous"></script>
        <!-- <script src="adm.js" defer></script> -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</head>

<body>
        <section class="home-section">
                <!-- <form data-multi-step class="multi-step-form"> -->
                <div class="card" data-step>
                        <form method="POST" action="tmpForm.php">
                                <h2>Generate Timetable</h2>
                                <div class="table-wrapper">
                                        <table>
                                                <tr>
                                                        <td> Course:</td>
                                                        <td colspan="4"><select class="dropdown" name="categoryDropdown" id="categoryDropdown" onchange="updateOptions()">
                                                        <?php
                                                        $options = array(
                                                                "Select a course",
                                                                "Bachelors of Arts(BA)",
                                                                "Bachelors of Science(BSc)",
                                                                "Bachelors of Commerce(BCom)",
                                                                "Bachelors of Business Administration(BBA)",
                                                                "Bachelors of Computer Applications(BCA)",
                                                                "Bachelors of Vocational Education(BVoc)"
                                                        );

                                                        foreach ($options as $option) {
                                                                $selected = ($option === $escapedCourse) ? 'selected' : '';
                                                                echo '<option value="' . $option . '" ' . $selected . '>' . $option . '</option>';
                                                        }
                                                        ?>
                                                        </select>
</td>
                                                </tr>
                                                <tr>
                                                        <td>Specialisation:</td>
                                                        <td colspan="4"><select class="dropdown" name="subCategoryDropdown" id="subCategoryDropdown" onchange="updateOptions()">
                                                                        <option value="Select a specialisation">Select a specialisation</option>
                                                                </select></td>
                                                </tr>
                                                <tr>
                                                        <td>Semester:</td>
                                                        <td colspan="4"><select class="dropdown" name="semCategoryDropdown" id="semCategoryDropdown" onchange="updateOptions()">
                                                                        <option value="Select a semester">Select a semester</option>
                                                                        <option value="1">1st Semester</option>
                                                                        <option value="2">2nd Semester</option>
                                                                        <option value="3">3rd Semester</option>
                                                                        <option value="4">4th Semester</option>
                                                                        <option value="5">5th Semester</option>
                                                                        <option value="6">6th Semester</option>
                                                                        <option value="7">7th Semester</option>
                                                                        <option value="8">8th Semester</option>

                                                                </select></td>
                                                </tr>
                                                <tr>
                                                        <td colspan="5" align="center"><input type="submit" class="load" name="load" value="Load Subjects"></td>
                                                </tr>
                                               
                                                </form>
                                                <?php 
                                                include('db.php');

                                                // if (isset($_POST['load'])) {
                                                //     $course = $_POST['categoryDropdown'];
                                                //     $specialisation = $_POST['subCategoryDropdown'];
                                                //     $semester = $_POST['semCategoryDropdown'];
                                                        
                                                //     // Escape the variables to prevent SQL injection
                                                //     $escapedCourse = mysqli_real_escape_string($con, $course);
                                                //     $escapedSpecialisation = mysqli_real_escape_string($con, $specialisation);
                                                //     $escapedSemester = mysqli_real_escape_string($con, $semester);
                                                //     //echo "$escapedCourse $escapedSpecialisation $escapedSemester";
                                                //       echo $escapedCourse;  
                                                //     // Construct the SQL query
                                                //     $extract = "SELECT sub1,sub2,sub3,sub4,sub5,sub6 FROM syllabus WHERE course='$escapedCourse' AND sem='$escapedSemester'";
                                                //     $extract1 = mysqli_query($con, $extract);
                                                //     $extract_rows = mysqli_num_rows($extract1);
                                                //     if ($extract_rows > 0) {
                                                //         // Loop through the result rows
                                                //         while ($row = mysqli_fetch_assoc($extract1)) {
                                                //             $sub1 = $row['sub1'];
                                                //             $sub2 = $row['sub2'];
                                                //             $sub3 = $row['sub3'];
                                                //             $sub4 = $row['sub4'];
                                                //             $sub5 = $row['sub5'];
                                                //             $sub6 = $row['sub6'];
                                                    
                                                //             // Print the values
                                                //             echo "<tr>
                                                //             <td name='subject1' id='subject1'>Subject 1:</td>
                                                //             <td> $sub1 </td>
                                                //             ";
                                                //             echo "<td><input type='time' name='startTime1' id='startTime1'></td>
                                                //             <td><input type='time' name='endTime1' id='endTime1'></td>
                                                //             <td><input type='date' name='examDate1' id='examDate1'></td>
                                                //             </tr>
                                                //             <tr>
                                                //         <td>Subject 2:</td>
                                                //         <td name='subject2' id='subject2'>$sub2</td>
                                                //         <td><input type='time' name='startTime2' id='startTime'></td>
                                                //         <td><input type='time' name='endTime2' id='endTime2'></td>
                                                //         <td><input type='date' name='examDate2' id='examDate2'></td>
                                                // </tr>
                                                // <tr>
                                                //         <td>Subject 3:</td>
                                                //         <td name='subject3' id='subject3'>$sub3</td>
                                                //         <td><input type='time' name='startTime3' id='startTime3'></td>
                                                //         <td><input type='time' name='endTime3' id='endTime3'></td>
                                                //         <td><input type='date' name='examDate3' id='examDate3'></td>
                                                // </tr>
                                                // <tr>
                                                //         <td>Subject 4:</td>
                                                //         <td name='subject4' id='subject4'>$sub4</td>
                                                //         <td><input type='time' name='startTime4' id='startTime4'></td>
                                                //         <td><input type='time' name='endTime4' id='endTime4'></td>
                                                //         <td><input type='date' name='examDate4' id='examDate4'></td>
                                                // </tr>
                                                // <tr>
                                                //         <td>Subject 5:</td>
                                                //         <td name='subject5' id='subject5'>$sub5</td>
                                                //         <td><input type='time' name='startTime5' id='startTime5'></td>
                                                //         <td><input type='time' name='endTime5' id='endTime5'></td>
                                                //         <td><input type='date' name='examDate5' id='examDate5'></td>
                                                // </tr>
                                                // <tr>
                                                //         <td>Subject 6:</td>
                                                //         <td name='subject6' id='subject6'>$sub6</td>
                                                //         <td><input type='time' name='startTime6' id='startTime6'></td>
                                                //         <td><input type='time' name='endTime6' id='endTime6'></td>
                                                //         <td><input type='date' name='examDate6' id='examDate6'></td>
                                                // </tr>";
                                                //         }
                                                //     } else {
                                                //         echo "No subjects found.";
                                                //     }
                                                // }
                                                
                                                ?>
                                                
                                        </table>
                                </div>
                        
                </div>
        </section>
</body>

</html>

<script>
        function updateOptions() {
                var categoryDropdown = document.getElementById("categoryDropdown");
                var subCategoryDropdown = document.getElementById("subCategoryDropdown");
                var semCategoryDropdown = document.getElementById("semCategoryDropdown");

                var selectedCategory = categoryDropdown.value;
                var selectedSpecialisation = subCategoryDropdown.value;
                var selectedSemester = semCategoryDropdown.value;

                //subCategoryDropdown.innerHTML = "";

                if (selectedCategory === "Bachelors of Arts") {
                        subCategoryDropdown.innerHTML = `
                                <option value="HES">History, Economics, Sociology (HES)</option>
                                <option value="HEK">History, Economics, Optional Kannada (HEK)</option>
                                <option value="PES">Psychology, Economics, Sociology (PES)</option>
                                <option value="JPE">Journalism, Psychology, Optional English (JPE)</option>
                                `;
                        
                } else if (selectedCategory === "Bachelors of Science") {
                        subCategoryDropdown.innerHTML = `
                                <option value="PCM">Physics, Chemistry, Mathematics (PCM)</option>
                                <option value="CBZ">Chemistry, Botany, Zoology (CBZ)</option>
                                <option value="PMCs">Physics, Mathematics, Computer Science (PMCs)</option>
                                <option value="CZMb">Chemistry, Zoology, Microbiology (CZMb)</option>
                                <option value="CBBt">Chemistry, Botany, Bio-Technology (CBBt)</option>
                                <option value="CND">Clinical Nutrition and Dietetics</option>
                                `;
                        
                } else if (selectedCategory === "Bachelors of Computer Applications(BCA)") {
                        subCategoryDropdown.innerHTML = `
                                <option value="Computer Science">Computer Science</option>
                        `;
                        
                } else if (selectedCategory === "Bachelors of Commerce") {
                        subCategoryDropdown.innerHTML = `
                                <option value="AF">Accounting and Finance</option>
                                <option value="BDA">Business Data Analytics</option>
                                `;
                        

                } else if (selectedCategory === "Bachelors of Business Administration") {
                        subCategoryDropdown.innerHTML = `
                                <option value="BA">Business Administration</option>
                                `;
                        
                } else if (selectedCategory === "Bachelors of Vocational Education") {
                        subCategoryDropdown.innerHTML = `
                                <option value="IT">Information Technology</option>
                                <option value="RM">Retail Management</option>
                                `;                        
                }
        }


        // var submitButton = document.querySelector('input[name="generate"]');
        //   submitButton.addEventListener('click', function() {
        //     var subject1 = document.getElementById('subject1').innerText;
        //     var startTime1 = document.getElementById('startTime1').value;
        //     var endTime1 = document.getElementById('endTime1').value;
        //     var examDate1 = document.getElementById('examDate1').value;

        //     // Store the retrieved data in global variables
        //     window.subject1Data = subject1;
        //     window.startTime1Data = startTime1;
        //     window.endTime1Data = endTime1;
        //     window.examDate1Data = examDate1;
        //     console.log("Selected Semester:", subject1Data);
        //   });
        //   var subject1Textbox = document.getElementById("subject1").textContent;
        //         var subject2Textbox = document.getElementById("subject2").textContent;
        //         var subject3Textbox = document.getElementById("subject3").textContent;
        //         var subject4Textbox = document.getElementById("subject4").textContent;
        //         var subject5Textbox = document.getElementById("subject5").textContent;
        //         var subject6Textbox = document.getElementById("subject6").textContent;

        //         // ...

        //         // Set the values to the global variables
        //         window.subject1Data = subject1Textbox;
        //         window.subject2Data = subject2Textbox;
        //         window.subject3Data = subject3Textbox;
        //         window.subject4Data = subject4Textbox;
        //         window.subject5Data = subject5Textbox;
        //         window.subject6Data = subject6Textbox;
</script>

<!-- //         console.log("Selected Semester:", selectedCategory);
//     console.log("Selected Semester:", selectedSpecialisation);
//     console.log("Selected Semester:", selectedSemester);
    //console.log(subject1Textbox.textContent) -->

<?php
// $selectedCategory = $_POST['categoryDropdown'];
//         $selectedSpecialisation = $_POST['subCategoryDropdown'];
//         $selectedSemester = $_GET['semCategoryDropdown'];
?>
<!-- <tr>
                                                        <td> Subject:</td>
                                                        <td> <input type="text" name="subject" id="subject"></td>
                                                </tr> -->
<?php

// //$subject1Textbox = $_GET['subject1'];
// $connection = mysqli_connect("localhost", "root", "", "academia");
// $query = "SELECT * FROM syllabus";     
// $query_run = mysqli_query($connection, $query);
// if (mysqli_num_rows($query_run) > 0) {
//         while ($row = mysqli_fetch_assoc($query_run)) {
//                 if ($selectedCategory == "Bachelors of Computer Applications" && $selectedSpecialisation == "Computer Science" && $selectedSemester == "1st Semester") {
//                            // $subject1Textbox = $row['sub1'];
?>
<?php
// echo $row['subjects'] 

?>
               <script>
//                                                         var selectedCategory = categoryDropdown.value;
//                 var selectedSpecialisation = subCategoryDropdown.value;
//                 var selectedSemester = semCategoryDropdown.value;
//                                                         console.log("Selected Semester:", selectedCategory);
//     console.log("Selected Semester:", selectedSpecialisation);
//     console.log("Selected Semester:", selectedSemester);
  
                                                </script>