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


<?php
    $connection = mysqli_connect("localhost", "root", "", "academia");

    // Check if the connection was successful
    if (!$connection) {
      die("Database connection failed: " . mysqli_connect_error());
    }
    ?>
<section class="home-section">
                <!-- <form data-multi-step class="multi-step-form"> -->
        <div class="card" data-step>
        <form method="POST" action="generatemultime.php">
    <h2>Generate Timetable</h2>
    <p>
        <h3>Enter the number of courses: <input type="number" name="no" class="no" id="no"></h3>
    </p>
    <div class="table-wrapper">
        <table>
            <tbody id="courseDetailsContainer"></tbody>
            <tr>
                <td colspan="5" align="center"><input type="submit" name="generate" value="Generate Timetable"></td>
            </tr>
        </table>
    </div>
</form>

<script>
    function updateOptions() {
        // Code to update the specialisation options based on the selected course
    }

    window.onload = function() {
        var numberOfCoursesInput = document.getElementById('no');
        var courseDetailsContainer = document.getElementById('courseDetailsContainer');

        numberOfCoursesInput.addEventListener('change', function() {
            var numberOfCourses = parseInt(numberOfCoursesInput.value);

            // Clear existing course details
            courseDetailsContainer.innerHTML = '';

            // Generate inputs for each course
            for (var i = 1; i <= numberOfCourses; i++) {
                var courseDetailsHTML = `
                    <tr>
                        <td>Course ${i}:</td>
                        <td colspan="4">
                            <select class="dropdown" name="course${i}" onchange="updateOptions()">
                                <option value="Select a course">Select a course</option>
                                <option value="Bachelors of Arts">Bachelors of Arts(BA)</option>
                                <option value="Bachelors of Science">Bachelors of Science(BSc)</option>
                                <option value="Bachelors of Commerce">Bachelors of Commerce(BCom)</option>
                                <option value="Bachelors of Business Administration">Bachelors of Business Administration(BBA)</option>
                                <option value="Bachelors of Computer Applications">Bachelors of Computer Applications(BCA)</option>
                                <option value="Bachelors of Vocational Education">Bachelors of Vocational Education(BVoc)</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Specialisation:</td>
                        <td colspan="4">
                            <select class="dropdown" name="specialisation${i}">
                                <option value="Select a specialisation">Select a specialisation</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Semester:</td>
                        <td colspan="4">
                            <select class="dropdown" name="semester${i}">
                                <option value="Select a semester">Select a semester</option>
                                <option value="1st Semester">1st Semester</option>
                                <option value="2nd Semester">2nd Semester</option>
                                <option value="3rd Semester">3rd Semester</option>
                                <option value="4th Semester">4th Semester</option>
                                <option value="5th Semester">5th Semester</option>
                                <option value="6th Semester">6th Semester</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Subject 1:</td>
                        <td><input type="text" name="subject${i}1"></td>
                        <td><input type="time" name="startTime${i}1"></td>
                        <td><input type="time" name="endTime${i}1"></td>
                        <td><input type="date" name="examDate${i}1"></td>
                    </tr>
                    <tr>
                        <td>Subject 2:</td>
                        <td><input type="text" name="subject${i}2"></td>
                        <td><input type="time" name="startTime${i}2"></td>
                        <td><input type="time" name="endTime${i}2"></td>
                        <td><input type="date" name="examDate${i}2"></td>
                    </tr>
                    <!-- Repeat the above rows for more subjects if needed -->
                `;

                var courseDetailsRow = document.createElement('tr');
                courseDetailsRow.innerHTML = courseDetailsHTML;
                courseDetailsContainer.appendChild(courseDetailsRow);
            }
        });
    };
</script>

        </div>
</section>
<script>
        function updateOptions() {
                var categoryDropdown = document.getElementById("categoryDropdown");
                var subCategoryDropdown = document.getElementById("subCategoryDropdown");

                // Clear existing options
                subCategoryDropdown.innerHTML = "";

                // Get selected option from the category dropdown
                var selectedCategory = categoryDropdown.value;

                // Options specific to the selected category
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
                } else if (selectedCategory === "Bachelors of Computer Applications") {
                        subCategoryDropdown.innerHTML = `
                                <option value="Computer Science">Computer Science</option>
                                `;
                                if (selectedSemester === "2nd Semester") {
                                subject1Textbox.textContent = "Language L1";
                                subject2Textbox.textContent="Language L2";
                                subject3Textbox.textContent="Computer Architecture";
                                subject4Textbox.textContent="Object Oriented Programming using Java";
                                subject5Textbox.textContent="Database Management System";
                                subject6Textbox.textContent="OE2: Open Elective ";
                        } else if (selectedSemester === "1st Semester") {
                                subject1Textbox.textContent = "Language L1";
                                subject2Textbox.textContent="Language L2";
                                subject3Textbox.textContent="Data Structure";
                                subject4Textbox.textContent="Problem solving Techniques";
                                subject5Textbox.textContent="Discrete Structure ";
                                subject6Textbox.textContent="OE1: Open Elective ";
                        }else if (selectedSemester === "3rd Semester") {
                                subject1Textbox.textContent = "Language L1";
                                subject2Textbox.textContent="Language L2";
                                subject3Textbox.textContent="Operating Systems";
                                subject4Textbox.textContent="Computer Networks ";
                                subject5Textbox.textContent="Python Programming";
                                subject6Textbox.textContent="OE3: Open Elective ";
                        }else if (selectedSemester === "4th Semester") {
                                subject1Textbox.textContent = "Language L1";
                                subject2Textbox.textContent="Language L2";
                                subject3Textbox.textContent="Software Engineering";
                                subject4Textbox.textContent="Artificial Intelligence";
                                subject5Textbox.textContent="Internet Technologies";
                                subject6Textbox.textContent="OE4: Open Elective ";
                        } else if (selectedSemester === "5th Semester") {
                                subject1Textbox.textContent = "Data Analytics";
                                subject2Textbox.textContent="Web Programming";
                                subject3Textbox.textContent="Design and Analysis of Algorithm";
                                subject4Textbox.textContent="Elective I \r a. Data Mining \n b. Computer Graphics";
                                subject5Textbox.textContent=" Vocation Course I :Quantitative Techniques";
                                subject6Textbox.textContent="SEC III : Cyber Crime,Cyber Law, and Intellectual Property Right";
                        }else if (selectedSemester === "6th Semester") {
                                subject1Textbox.textContent = "Theory of Computation";
                                subject2Textbox.textContent="Machine Learning";
                                subject3Textbox.textContent="Mobile Application Development";
                                subject4Textbox.textContent="Professional Communication";
                                subject5Textbox.textContent=" Vocation Course II : Electronic Content Design";
                                subject6Textbox.textContent=" Elective II a. Operations Research b. Software Testing";
                        }else if (selectedSemester === "7th Semester") {
                                subject1Textbox.textContent = "Cloud Computing";
                                subject2Textbox.textContent="Internet of Things";
                                subject3Textbox.textContent="Research Methodology";
                                subject4Textbox.textContent="Vocation Course III: Technical Writing";
                                subject5Textbox.textContent="Elective III : a. Modeling and Simulation b. Compiler Design";
                                subject6Textbox.textContent="                   ";
                        }else if (selectedSemester === "8th Semester") {
                                subject1Textbox.textContent ="Block Chain Technologies";
                                subject2Textbox.textContent="Cryptography and System Security";
                                subject3Textbox.textContent="MVocation Course IV: Project Management";
                                subject4Textbox.textContent=" Elective IV : a. Human Computer Interface b. Parallel Algorithms";
                                subject5Textbox.textContent="                   ";
                                subject6Textbox.textContent="                   ";
                        }else{
                                subject1Textbox.textContent = "                 ";
                                subject2Textbox.textContent="                   ";
                                subject3Textbox.textContent="                   ";
                                subject4Textbox.textContent="                   ";
                                subject5Textbox.textContent="                   ";
                                subject6Textbox.textContent="                   ";
                        }
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
</script>