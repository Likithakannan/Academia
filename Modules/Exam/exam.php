<!DOCTYPE html>
<html lang="en">
<?php
session_start();
?>

<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Exam</title>
        <link rel="stylesheet" href="adm.css">
        <link rel="stylesheet" type="text/css" href="/css/font-awesome.css">
        <link rel="stylesheet" type="text/css" href="../Dashboard/dashboard.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Rounded" rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@48,400,0,0" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
        <script src="https://kit.fontawesome.com/3b822bcb84.js" crossorigin="anonymous"></script>
        <script src="adm.js" defer></script>
        <title>Exam</title>
        <style>
                /*tables*/
                table {
                        align-items: center;
                        margin: auto;
                        background-color: white;
                }

                /* CSS for table */
                /*table .fees{
	 width: 100%; 
	 border-collapse: collapse; 
	 table-layout: fixed; 
}*/
                table {
                        border-collapse: collapse;
                        margin-bottom: 40px;
                }

                /* th,td .fees {
	  padding: 10px;
	 text-align: left;
	  border: 1px solid #ddd;
} */

                th,
                td {
                        border: 0.1px solid black;
                        width: 75%;
                        padding: 10px;
                }

                .table-wrapper {
                        /* display:inline-table; */
                        /* margin-right: 10px; */
                        display: flex;
                        justify-content: center;
                }

                .home-section {
                        position: relative;
                        display: flex;
                        margin-left: 400px;
                        /* align-self:center; */
                        margin-top: 40px;
                        align-items: center;
                        margin-bottom: 40px;
                }

                .btn {
                        display: inline-block;
                        font-weight: 400;
                        text-align: center;
                        white-space: nowrap;
                        vertical-align: middle;
                        -webkit-user-select: none;
                        -moz-user-select: none;
                        -ms-user-select: none;
                        user-select: none;
                        border: 1px solid transparent;
                        padding: .375rem .75rem;
                        font-size: 1rem;
                        line-height: 1.5;
                        border-radius: .25rem;
                        transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out
                }

                .btn:focus,
                .btn:hover {
                        text-decoration: none
                }

                .btn.focus,
                .btn:focus {
                        outline: 0;
                        box-shadow: 0 0 0 .2rem rgba(0, 123, 255, .25)
                }

                .btn.disabled,
                .btn:disabled {
                        opacity: .65
                }

                .btn:not(:disabled):not(.disabled) {
                        cursor: pointer
                }

                .btn:not(:disabled):not(.disabled).active,
                .btn:not(:disabled):not(.disabled):active {
                        background-image: none
                }

                a.btn.disabled,
                fieldset:disabled a.btn {
                        pointer-events: none
                }

                .btn-primary {
                        color: #fff;
                        background-color: #007bff;
                        border-color: #007bff
                }

                .btn-primary:hover {
                        color: #fff;
                        background-color: #0069d9;
                        border-color: #0062cc
                }

                .btn-primary.focus,
                .btn-primary:focus {
                        box-shadow: 0 0 0 .2rem rgba(0, 123, 255, .5)
                }

                .btn-primary.disabled,
                .btn-primary:disabled {
                        color: #fff;
                        background-color: #007bff;
                        border-color: #007bff
                }

                .btn-primary:not(:disabled):not(.disabled).active,
                .btn-primary:not(:disabled):not(.disabled):active,
                .show>.btn-primary.dropdown-toggle {
                        color: #fff;
                        background-color: #0062cc;
                        border-color: #005cbf
                }

                .btn-primary:not(:disabled):not(.disabled).active:focus,
                .btn-primary:not(:disabled):not(.disabled):active:focus,
                .show>.btn-primary.dropdown-toggle:focus {
                        box-shadow: 0 0 0 .2rem rgba(0, 123, 255, .5)
                }

                .btn-secondary {
                        color: #fff;
                        background-color: #6c757d;
                        border-color: #6c757d
                }

                .btn-secondary:hover {
                        color: #fff;
                        background-color: #5a6268;
                        border-color: #545b62
                }

                .btn-secondary.focus,
                .btn-secondary:focus {
                        box-shadow: 0 0 0 .2rem rgba(108, 117, 125, .5)
                }

                .btn-secondary.disabled,
                .btn-secondary:disabled {
                        color: #fff;
                        background-color: #6c757d;
                        border-color: #6c757d
                }

                .btn-secondary:not(:disabled):not(.disabled).active,
                .btn-secondary:not(:disabled):not(.disabled):active,
                .show>.btn-secondary.dropdown-toggle {
                        color: #fff;
                        background-color: #545b62;
                        border-color: #4e555b
                }

                .btn-secondary:not(:disabled):not(.disabled).active:focus,
                .btn-secondary:not(:disabled):not(.disabled):active:focus,
                .show>.btn-secondary.dropdown-toggle:focus {
                        box-shadow: 0 0 0 .2rem rgba(108, 117, 125, .5)
                }

                .btn-success {
                        color: #fff;
                        background-color: #28a745;
                        border-color: #28a745
                }

                .btn-success:hover {
                        color: #fff;
                        background-color: #218838;
                        border-color: #1e7e34
                }

                .btn-success.focus,
                .btn-success:focus {
                        box-shadow: 0 0 0 .2rem rgba(40, 167, 69, .5)
                }

                .btn-success.disabled,
                .btn-success:disabled {
                        color: #fff;
                        background-color: #28a745;
                        border-color: #28a745
                }

                .btn-success:not(:disabled):not(.disabled).active,
                .btn-success:not(:disabled):not(.disabled):active,
                .show>.btn-success.dropdown-toggle {
                        color: #fff;
                        background-color: #1e7e34;
                        border-color: #1c7430
                }

                .btn-success:not(:disabled):not(.disabled).active:focus,
                .btn-success:not(:disabled):not(.disabled):active:focus,
                .show>.btn-success.dropdown-toggle:focus {
                        box-shadow: 0 0 0 .2rem rgba(40, 167, 69, .5)
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
                        <a href="#">
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

                        <a href="#" class="active">
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
        </aside>

        <!---------------------END OF ASIDE----------------------->

        <section class="home-section">
                <!-- <form data-multi-step class="multi-step-form"> -->
                <div class="card" data-step>
                        <form method="POST" action="generateTime.php">
                                <h2>Generate Timetable</h2>
                                <!-- <p><h3>Enter the number of courses: <input type="number" name="no" class="no" id="no"></h3> -->
                                </p>
                                <div class="table-wrapper">
                                        <table>
                                                <tr>
                                                        <td> Course:</td>
                                                        <td colspan="4"> <select class="dropdown" name="course" id="categoryDropdown" onchange="updateOptions()">
                                                                        <option value="Select a course">Select a course</option>
                                                                        <option value="Bachelors of Arts">Bachelors of Arts(BA)</option>
                                                                        <option value="Bachelors of Science">Bachelors of Science(BSc)</option>
                                                                        <option value="Bachelors of Commerce">Bachelors of Commerce(BCom)</option>
                                                                        <option value="Bachelors of Business Administration">Bachelors of Business Administration(BBA)</option>
                                                                        <option value="Bachelors of Computer Applications">Bachelors of Computer Applications(BCA)</option>
                                                                        <option value="Bachelors of Vocational Education">Bachelors of Vocational Education(BVoc)</option>
                                                                </select></td>
                                                </tr>
                                                <tr>
                                                        <td>Specialisation</td>
                                                        <td colspan="4"><select class="dropdown" name="specialisation" id="subCategoryDropdown" onchange="updateOptions()">
                                                                        <option value="Select a specialisation">Select a specialisation</option>
                                                                </select></td>
                                                </tr>

                                                <tr>
                                                        <td>Semester</td>
                                                        <td colspan="4"><select class="dropdown" name="semester" id="semCategoryDropdown">
                                                                        <option value="Select a semester">Select a semester</option>
                                                                        <option value="1st Semester">1st Semester</option>
                                                                        <option value="2nd Semester">2nd Semester</option>
                                                                        <option value="3rd Semester">3rd Semester</option>
                                                                        <option value="4th Semester">4th Semester</option>
                                                                        <option value="5th Semester">5th Semester</option>
                                                                        <option value="6th Semester">6th Semester</option>

                                                                </select></td>
                                                </tr>

                                                </tr>

                                                <!-- <tr>
                                                        <td> Subject:</td>
                                                        <td> <input type="text" name="subject" id="subject"></td>
                                                </tr> -->
                                                <tr>
                                                        <td>Subject 1:</td>
                                                        <td><input type="text" name="subject1" id="subject1"></td>
                                                        <td><input type="time" name="startTime1" id="startTime1"></td>
                                                        <td><input type="time" name="endTime1" id="endTime1"></td>
                                                        <td><input type="date" name="examDate1" id="examDate1"></td>
                                                </tr>
                                                <tr>
                                                        <td>Subject 2:</td>
                                                        <td><input type="text" name="subject2" id="subject2"></td>
                                                        <td><input type="time" name="startTime2" id="startTime2"></td>
                                                        <td><input type="time" name="endTime2" id="endTime2"></td>
                                                        <td><input type="date" name="examDate2" id="examDate2"></td>
                                                </tr>

                                                <tr>
                                                        <td>Subject 3:</td>
                                                        <td><input type="text" name="subject3" id="subject3"></td>
                                                        <td><input type="time" name="startTime3" id="startTime3"></td>
                                                        <td><input type="time" name="endTime3" id="endTime3"></td>
                                                        <td><input type="date" name="examDate3" id="examDate3"></td>
                                                </tr>

                                                <tr>
                                                        <td>Subject 4:</td>
                                                        <td><input type="text" name="subject4" id="subject4"></td>
                                                        <td><input type="time" name="startTime4" id="startTime4"></td>
                                                        <td><input type="time" name="endTime4" id="endTime4"></td>
                                                        <td><input type="date" name="examDate4" id="examDate4"></td>
                                                </tr>
                                                <tr>
                                                        <td>Subject 5:</td>
                                                        <td><input type="text" name="subject5" id="subject5"></td>
                                                        <td><input type="time" name="startTime5" id="startTime5"></td>
                                                        <td><input type="time" name="endTime5" id="endTime5"></td>
                                                        <td><input type="date" name="examDate5" id="examDate5"></td>
                                                </tr>
                                                <tr>
                                                        <td>Subject 6:</td>
                                                        <td><input type="text" name="subject6" id="subject6"></td>
                                                        <td><input type="time" name="startTime6" id="startTime6"></td>
                                                        <td><input type="time" name="endTime6" id="endTime6"></td>
                                                        <td><input type="date" name="examDate6" id="examDate6"></td>
                                                </tr>
                                                <!-- <tr>
                                                <td> Exam Date:</td>
                                                <td colspan="4"><input type="date" name="examDate" id="examDate"></td>
                                        </tr> -->

                                                <tr>
                                                        <td colspan="5" align="center"><input type="submit" name="generate" class="btn btn-success" value="Generate Timetable"></td>
                                                </tr>
                                        </table>
                                </div>
                        </form>
                </div>
        </section>
        <!-- </form><br> -->

</body>

</html>
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
                                subject2Textbox.textContent = "Language L2";
                                subject3Textbox.textContent = "Computer Architecture";
                                subject4Textbox.textContent = "Object Oriented Programming using Java";
                                subject5Textbox.textContent = "Database Management System";
                                subject6Textbox.textContent = "OE2: Open Elective ";
                        } else if (selectedSemester === "1st Semester") {
                                subject1Textbox.textContent = "Language L1";
                                subject2Textbox.textContent = "Language L2";
                                subject3Textbox.textContent = "Data Structure";
                                subject4Textbox.textContent = "Problem solving Techniques";
                                subject5Textbox.textContent = "Discrete Structure ";
                                subject6Textbox.textContent = "OE1: Open Elective ";
                        } else if (selectedSemester === "3rd Semester") {
                                subject1Textbox.textContent = "Language L1";
                                subject2Textbox.textContent = "Language L2";
                                subject3Textbox.textContent = "Operating Systems";
                                subject4Textbox.textContent = "Computer Networks ";
                                subject5Textbox.textContent = "Python Programming";
                                subject6Textbox.textContent = "OE3: Open Elective ";
                        } else if (selectedSemester === "4th Semester") {
                                subject1Textbox.textContent = "Language L1";
                                subject2Textbox.textContent = "Language L2";
                                subject3Textbox.textContent = "Software Engineering";
                                subject4Textbox.textContent = "Artificial Intelligence";
                                subject5Textbox.textContent = "Internet Technologies";
                                subject6Textbox.textContent = "OE4: Open Elective ";
                        } else if (selectedSemester === "5th Semester") {
                                subject1Textbox.textContent = "Data Analytics";
                                subject2Textbox.textContent = "Web Programming";
                                subject3Textbox.textContent = "Design and Analysis of Algorithm";
                                subject4Textbox.textContent = "Elective I \r a. Data Mining \n b. Computer Graphics";
                                subject5Textbox.textContent = " Vocation Course I :Quantitative Techniques";
                                subject6Textbox.textContent = "SEC III : Cyber Crime,Cyber Law, and Intellectual Property Right";
                        } else if (selectedSemester === "6th Semester") {
                                subject1Textbox.textContent = "Theory of Computation";
                                subject2Textbox.textContent = "Machine Learning";
                                subject3Textbox.textContent = "Mobile Application Development";
                                subject4Textbox.textContent = "Professional Communication";
                                subject5Textbox.textContent = " Vocation Course II : Electronic Content Design";
                                subject6Textbox.textContent = " Elective II a. Operations Research b. Software Testing";
                        } else if (selectedSemester === "7th Semester") {
                                subject1Textbox.textContent = "Cloud Computing";
                                subject2Textbox.textContent = "Internet of Things";
                                subject3Textbox.textContent = "Research Methodology";
                                subject4Textbox.textContent = "Vocation Course III: Technical Writing";
                                subject5Textbox.textContent = "Elective III : a. Modeling and Simulation b. Compiler Design";
                                subject6Textbox.textContent = "                   ";
                        } else if (selectedSemester === "8th Semester") {
                                subject1Textbox.textContent = "Block Chain Technologies";
                                subject2Textbox.textContent = "Cryptography and System Security";
                                subject3Textbox.textContent = "Vocation Course IV: Project Management";
                                subject4Textbox.textContent = " Elective IV : a. Human Computer Interface b. Parallel Algorithms";
                                subject5Textbox.textContent = "                   ";
                                subject6Textbox.textContent = "                   ";
                        } else {
                                subject1Textbox.textContent = "                 ";
                                subject2Textbox.textContent = "                   ";
                                subject3Textbox.textContent = "                   ";
                                subject4Textbox.textContent = "                   ";
                                subject5Textbox.textContent = "                   ";
                                subject6Textbox.textContent = "                   ";
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