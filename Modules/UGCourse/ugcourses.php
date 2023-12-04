<?php 
    session_start();
    include('db_config_co.php');
    if(isset($_SESSION['email'])){
	    $email = $_SESSION['email'];
    }else{
  	  header("Location: ../Register & login/login.php");
    }
?>
<!DOCTYPE html>
<head>
	<title>Category Details</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!--<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>-->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha384-tsQFqpEReu7ZLhBV2VZlAu7zcOV+rXbYlF2cqB8txI/8aZajjp4Bqd+V6D5IgvKT" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!--datatable-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
    <!------ Include the above in your HEAD tag ---------->

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <!--<script src="http://getbootstrap.com/dist/js/bootstrap.min.js"></script>-->
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="../Dashboard/dashboard.css">
  
	<!--Material-Icons-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@48,400,0,0" />
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
	<!--<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>-->
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<style>
  #dtBasicExample_wrapper .dataTables_length{
    margin-left : 150px;
  }
  #dtBasicExample_wrapper .dataTables_info {
    display: none;
  }
  #dtBasicExample{
    margin-left : 250px;
    align-items: center;
    align-self: center;
  }
  button.btn.btn-success{
    margin-left : 150px;
  }
  .dataTables_filter input[type="search"] {
    background-color: #fff; /* Change the background color to white */
    border: 1px solid #ccc; /* Add a border to the search input */
    border-radius: 4px; /* Add rounded corners to the search input */
    padding: 5px; /* Add some padding to the search input */
    margin-left: 5px; /* Adjust the margin as needed */
  }
  .dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 8px 12px;
  text-decoration: none;
  display: block;
}

.dropdown:hover .dropdown-content {
  display: block;
}

.dataTables_length {
  display:none;
}

.add-button {
    background-color: #007bff; /* Change the background color */
    color: #fff; /* Change the text color */
    padding: 0.5rem 1rem; /* Adjust the padding as needed */
    border: none; /* Remove the border */
    border-radius: 0.25rem; /* Add border radius */
    cursor: pointer; /* Add cursor pointer on hover */
    transition: background-color 0.3s ease; /* Add a smooth transition effect */
  }

  .add-button:hover {
    background-color: #0069d9; /* Change the background color on hover */
  }
#add-button {
  background-color: #007bff; /* Change the background color */
  color: #fff; /* Change the text color */
  padding: 0.5rem 1rem; /* Adjust the padding as needed */
  border: none; /* Remove the border */
  border-radius: 0.25rem; /* Add border radius */
  cursor: pointer; /* Add cursor pointer on hover */
  transition: background-color 0.3s ease; /* Add a smooth transition effect */
}

#add-button:hover {
  background-color: #0069d9; /* Change the background color on hover */
}  

</style>
	</head>
<body>

	<div class="container">
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
        <a href="../Application/Studs1.php">
					<span class="material-symbols-outlined">groups</span>
					<h3>Students</h3>
				</a>
				<a href="../Messages/admMsg.php">
					<span class="material-symbols-outlined">mail</span>
					<h3>Messages</h3>
					<!-- <span class="message-count">26</span> -->
				</a>
        
				<a href="ugcourses.php" class="active">
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
<div class="container">
    <div class="row">
      <span style="margin-left:550px;margin-top:0;"><h1>UG&nbsp;&nbsp;COURSES</h1></span>
		<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="ins_up_delCourses.php" method="POST" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group">
            <label>Course Name</label>
            <input type="text" name="ugname" class="form-control" placeholder="Ex: Bachelors of Computer Applications - Computer Science" required>
          </div>
          <div class="form-group">
            <label>Image</label>
            <input type="file" name="image" id="image" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Short Description</label>
            <textarea class="form-control" id="message-text" name="short_desc" required></textarea>
          </div>
          <div class="form-group">
            <label>Description</label>
            <textarea class="form-control" id="message-text" name="desc" required></textarea>
          </div>
          <div class="form-group">
            <label>Prerequisites</label>
            <textarea class="form-control" id="message-text" name="prerequisites" required></textarea>
          </div>
          <div class="form-group">
            <label>Fees</label>
            <input type="text" class="form-control" name="fees" placeholder="Ex : 500" pattern="[0-9]*" required>
          </div>
        <div class="form-group">
          <label>Semester</label>
          <div id="semesters">
            <div class="semester">
              <input type="text" name="sem_name[]" value="semester 1" class="form-control" placeholder="Semester Name">
              <div class="form-group">
                <label>Subject</label>
                <div class="subjects">
                  <input type="text" name="sub_name[0][]" class="form-control" placeholder="Subject Name">
                  <button type="button" class="addSubject" id="add-button" onclick="addSubject(this)">Add Subject</button>
                </div>
              </div>
              <div class="form-group">
              <label>Electives</label>
                <div class="electives">
                  <input type="text" name="elective_name[0][]" class="form-control" placeholder="Elective Name">
                  <button type="button" class="addElective" id="add-button" onclick="addElective(this)">Add Elective</button>
                </div>
              </div>  
            </div>
          </div>
          <button type="button" id="addSemester" class="add-button">Add Semester</button>
        </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" name="save" class="btn btn-primary">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="container-fluid">
    <?php 
    if(isset($_SESSION['success']) && $_SESSION['success'] !=''){
        echo '<h2 class="bg-primary text-white"> '.$_SESSION['success'].' </h2>';
        unset($_SESSION['success']);
    }
    if(isset($_SESSION['status']) && $_SESSION['status'] !=''){
        echo '<h2 class="bg-danger text-white"> ' .$_SESSION['status'].' </h2>';
        unset($_SESSION['status']);
    }
    
    ?>
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#add" >ADD DATA</button>
</div>
<table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th class="th-sm">Course ID</th>
      <th class="th-sm">Course Name</th>
      <th class="th-sm">Image</th>
      <th class="th-sm">Fees</th>
      <th class="th-sm">View more</th>
      <th class="th-sm">Delete</th>
    </tr>
  </thead>
  <tbody>
    <?php
      $connection = mysqli_connect("localhost", "root", "", "academia");
      $query = "SELECT * FROM ugc";
      $query_run = mysqli_query($connection, $query);

      if (mysqli_num_rows($query_run) > 0) {
        while ($row = mysqli_fetch_assoc($query_run)) {
          $ugid = $row['ugid'];
          $specializations = [];


          // Display the data
          echo "<tr>";
          echo "<td>" . $row['ugid'] . "</td>";
          echo "<td>" . $row['ugname'] . "</td>";
          echo "<td>" . '<img src="data:image;base64,' . base64_encode($row['image']) . '" style="width: 150px; height: 150px;"></td>';
          echo "<td>" . $row['fees'] . "</td>";
          echo "<td>";
          echo "<form action='edit_form.php' method='POST'>";
          echo "<input type='hidden' name='edit_id' value='" . $row['ugid'] . "'>";
          echo "<button type='submit' name='data_edit' class='btn btn-info'>View More</button>";
          echo "</form>";
          echo "</td>";
          echo "<td>";
          echo "<form action='ins_up_delCourses.php' method='POST'>";
          echo "<input type='hidden' name='delete_id' value='" . $row['ugid'] . "'>";
          echo "<button type='submit' name='data_delete' class='btn btn-danger'>DELETE</button>";
          echo "</form>";
          echo "</td>";
          echo "</tr>";
        }
      } else {
        echo "<tr><td colspan='5'>No Record Found</td></tr>";
      }
    ?>
  </tbody>
</table>

      </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

	<script>
		$(document).ready(function () {
			$('#dtBasicExample').DataTable({
				"pageLength": 2
			});
		});

    var semesterCount = 0; // Track the current semester count
    var semDisp = 1;

  document.getElementById("addSemester").addEventListener("click", addSemester);

  function addSemester() {
    var semestersDiv = document.getElementById("semesters");
    semesterCount = semestersDiv.getElementsByClassName("semester").length;
    semDisp += 1;

    var newSemester = document.createElement("div");
    newSemester.classList.add("semester", "form-group","mb-3");

    var semesterLabel = document.createElement("label");
    semesterLabel.textContent = "Semester Name";
    newSemester.appendChild(semesterLabel);

    var semesterInput = document.createElement("input");
    semesterInput.type = "text";
    semesterInput.name = "sem_name[]";
    semesterInput.value = "semester "+semDisp;
    semesterInput.placeholder = "Semester Name";
    semesterInput.classList.add("form-control");
    newSemester.appendChild(semesterInput);

    var subjectDiv = document.createElement("div");
    subjectDiv.classList.add("subjects");

    var subjectLabel = document.createElement("label");
    subjectLabel.textContent = "Subject Name";
    subjectDiv.appendChild(subjectLabel);

    var subjectInput = document.createElement("input");
    subjectInput.type = "text";
    subjectInput.name = "sub_name[" + semesterCount + "][]";
    subjectInput.placeholder = "Subject Name";
    subjectInput.classList.add("form-control");

    var addSubjectButton = document.createElement("button");
    addSubjectButton.type = "button";
    addSubjectButton.classList.add("add-button");
    addSubjectButton.textContent = "Add Subject";
    addSubjectButton.addEventListener("click", function () {
      addSubject(addSubjectButton);
    });

    subjectDiv.appendChild(subjectInput);
    subjectDiv.appendChild(addSubjectButton);

    var electiveDiv = document.createElement("div");
    electiveDiv.classList.add("electives");

    var electiveLabel = document.createElement("label");
    electiveLabel.textContent = "Elective Name";
    electiveDiv.appendChild(electiveLabel);

    var electiveInput = document.createElement("input");
    electiveInput.type = "text";
    electiveInput.name = "elective_name[" + semesterCount + "][]";
    electiveInput.placeholder = "Elective Name";
    electiveInput.classList.add("form-control");

    var addElectiveButton = document.createElement("button");
    addElectiveButton.type = "button";
    addElectiveButton.classList.add("add-button");
    addElectiveButton.textContent = "Add Elective";
    addElectiveButton.addEventListener("click", function () {
      addElective(addElectiveButton);
    });

    electiveDiv.appendChild(electiveInput);
    electiveDiv.appendChild(addElectiveButton);

    newSemester.appendChild(subjectDiv);
    newSemester.appendChild(electiveDiv);

    semestersDiv.appendChild(newSemester);

  }

  function addSubject(button) {
    var semesterDiv = button.parentNode.parentNode;
    var subjectsDiv = semesterDiv.getElementsByClassName("subjects")[0];

    var inputCount = semesterCount;
    var newInputGroup = document.createElement("div");
    newInputGroup.classList.add("form-group","mb-3");

    var newInput = document.createElement("input");
    newInput.type = "text";
    newInput.classList.add("form-control");
    newInput.name = "sub_name[" + inputCount + "][]";
    newInput.placeholder = "Subject Name ";

    newInputGroup.appendChild(newInput);
    subjectsDiv.insertBefore(newInputGroup, button);
  }

  function addElective(button) {
    var semesterDiv = button.parentNode.parentNode;
    var electivesDiv = semesterDiv.getElementsByClassName("electives")[0];
    var inputCount = semesterCount;

    var newInputGroup = document.createElement("div");
    newInputGroup.classList.add("form-group","mb-3");

    var newInput = document.createElement("input");
    newInput.type = "text";
    newInput.classList.add("form-control");
    newInput.name = "elective_name[" + inputCount + "][]";
    newInput.placeholder = "Elective Name ";

    newInputGroup.appendChild(newInput);
    electivesDiv.insertBefore(newInputGroup, button);
  }
	</script>
</body>
</html>