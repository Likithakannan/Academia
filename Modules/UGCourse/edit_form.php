<?php 
include('db_config_co.php');
session_start();
if(isset($_SESSION['email'])){
	$email = $_SESSION['email'];
}else{
	header("Location: ../Register & login/login.php");
}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <style>
        .custom-modal .modal-content {
        background-color: purple; /* Replace with your desired background color */
    }
    </style>
</head>
<body>

    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit Data</h6>
            </div>
            <div class="card-body">
                <?php
                $connection = mysqli_connect("localhost","root","","academia");
                if(isset($_POST['data_edit'])){
                    $id = $_POST['edit_id'];

                    $query = "SELECT * FROM ugc WHERE ugid='$id' ";
                    $query_run = mysqli_query($connection,$query);
                    
                 
foreach ($query_run as $row) {
?>
    <form action="ins_up_delCourses.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="edited_id" value="<?php echo $row['ugid'] ?>">
        <div class="form-group">
            <label>Course Name</label>
            <input type="text" name="ugname" value="<?php echo $row['ugname'] ?>" class="form-control" readonly>
        </div>
        <div class="form-group">
            <label>Image</label>
<div style="width: 200px; height: 200px;">
<?php echo '<img src="data:image;base64,' . base64_encode($row['image']) . '" style="width: 200px; height: 200px;">'; ?>
</div>
            
        </div>
        <div class="form-group">
            <label>Short Description</label>
            <textarea class="form-control" id="message-text" name="short_desc" required readonly><?php echo $row['short_desc'] ?></textarea>
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea class="form-control" id="message-text" name="desc" required readonly><?php echo $row['desc'] ?></textarea>
        </div>
        <div class="form-group">
            <label>Prerequisites</label>
            <textarea class="form-control" id="message-text" name="prerequisites" required readonly><?php echo $row['prerequisites'] ?></textarea>
        </div>

        <div class="form-group">
            <label>Semester</label>
            <div id="semesters">
                <?php
                // Retrieve existing semesters, subjects, and electives for the course
                $selectSemestersQuery = "SELECT * FROM semester WHERE ugid = " . $row['ugid'];
                $selectSemestersResult = mysqli_query($connection, $selectSemestersQuery);
                while ($semesterRow = mysqli_fetch_assoc($selectSemestersResult)) {
                ?>
                    <div class="semester">
                        <input type="text" name="sem_name[]" value="<?php echo $semesterRow['sem_name'] ?>" class="form-control" placeholder="Semester Name" readonly>
                        <div class="form-group">
                            <label>Subject</label>
                            <div class="subjects">
                                <?php
                                $semesterID = $semesterRow['sem_id'];
                                $selectSubjectsQuery = "SELECT * FROM subject WHERE sem_id = $semesterID";
                                $selectSubjectsResult = mysqli_query($connection, $selectSubjectsQuery);
                                while ($subjectRow = mysqli_fetch_assoc($selectSubjectsResult)) {
                                ?>
                                    <input type="text" name="sub_name[<?php echo $semesterID ?>][]" value="<?php echo $subjectRow['sub_name'] ?>" class="form-control" placeholder="Subject Name" readonly>
                                <?php
                                }
                                ?>
                                <!--<button type="button" class="addSubject" id="add-button" onclick="addSubject(this,<?php echo $semesterID ?>)">Add Subject</button>-->
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Electives</label>
                            <div class="electives">
                                <?php
                                $selectElectivesQuery = "SELECT * FROM elective WHERE sem_id = $semesterID";
                                $selectElectivesResult = mysqli_query($connection, $selectElectivesQuery);
                                while ($electiveRow = mysqli_fetch_assoc($selectElectivesResult)) {
                                ?>
                                    <input type="text" name="elective_name[<?php echo $semesterID ?>][]" value="<?php echo $electiveRow['elective_name'] ?>" class="form-control" placeholder="Elective Name" readonly>
                                <?php
                                }
                                ?>
                                <!--<button type="button" class="addElective" id="add-button" onclick="addElective(this,<?php echo $semesterID ?>)">Add Elective</button>-->
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
                <!--<button type="button" id="addSemester" class="add-button">Add Semester</button>-->
            </div>
        </div>

        <div class="modal-footer">
            <a href="ugcourses.php"><button type="button" class="btn btn-secondary">CLOSE</button></a>
            <!--<button type="submit" name="update" class="btn btn-primary">UPDATE</button>-->
        </div>
    </form>
<?php
}
}
?>
            </div>
        </div>
    </div>
    <script>
        var newSemesterID = Date.now(); // Generate a unique ID for the new semester
        var semCount=0;
  document.getElementById("addSemester").addEventListener("click", addSemester);

  function addSemester() {
    console.log("semCount="+semCount);
    semCount=semCount+1;
    console.log("semCount2="+semCount);
    var semestersDiv = document.getElementById("semesters");
    //semesterCount = semestersDiv.getElementsByClassName("semester").length;


    var newSemester = document.createElement("div");
    newSemester.classList.add("semester", "form-group","mb-3");

    var semesterLabel = document.createElement("label");
    semesterLabel.textContent = "Semester Name";
    newSemester.appendChild(semesterLabel);

    var semesterInput = document.createElement("input");
    semesterInput.type = "text";
    semesterInput.name = "sem_name[]";
    semesterInput.value = "Semester "+semCount;
    // semesterInput.placeholder = "Semester Name";
    // semesterInput.disabled = true;
    newSemester.appendChild(semesterInput);
    semesterInput.classList.add("form-control");
    // var button=document.getElementById("addSemester");
    // semestersDiv.insertBefore();

    var subjectDiv = document.createElement("div");
    subjectDiv.classList.add("subjects");

    var subjectLabel = document.createElement("label");
    subjectLabel.textContent = "Subject Name";
    subjectDiv.appendChild(subjectLabel);

    var subjectInput = document.createElement("input");
    subjectInput.type = "text";
    semesterInput.name = "sem_name[" + newSemesterID + "]";
    subjectInput.placeholder = "Subject Name";
    subjectInput.classList.add("form-control");

    var addSubjectButton = document.createElement("button");
    addSubjectButton.type = "button";
    addSubjectButton.classList.add("add-button");
    addSubjectButton.textContent = "Add Subject";
    addSubjectButton.addEventListener("click", function () {
            addSubject(addSubjectButton,newSemesterID);
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
    electiveInput.name = "elective_name[" + newSemesterID + "][]";
    electiveInput.placeholder = "Elective Name";
    electiveInput.classList.add("form-control");

    var addElectiveButton = document.createElement("button");
    addElectiveButton.type = "button";
    addElectiveButton.classList.add("add-button");
    addElectiveButton.textContent = "Add Elective";
    addElectiveButton.addEventListener("click", function () {
      addElective(addElectiveButton,newSemesterID);
    });

    electiveDiv.appendChild(electiveInput);
    electiveDiv.appendChild(addElectiveButton);

    newSemester.appendChild(subjectDiv);
    newSemester.appendChild(electiveDiv);

    semestersDiv.appendChild(newSemester);

  }

  function addSubject(button,sem_id) {
    var semesterDiv = button.parentNode.parentNode;
    var subjectsDiv = semesterDiv.getElementsByClassName("subjects")[0];

    var inputCount = sem_id;
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

  function addElective(button,sem_id) {
    var semesterDiv = button.parentNode.parentNode;
    var electivesDiv = semesterDiv.getElementsByClassName("electives")[0];
    var inputCount = sem_id;

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
