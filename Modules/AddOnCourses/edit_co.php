<?php
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
    <title>Edit Category</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>

    <?php
    include('../Course/db_config_co.php');
    ?>
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

                    $query = "SELECT * FROM courses WHERE course_id='$id'";
                    $query_run = mysqli_query($connection,$query);
                    
                    foreach($query_run as $row) {
                        ?>
                        <form action="ins_up_deladdonsco.php" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="edited_id" value="<?php echo $row['course_id'] ?>">
                            <div class="form-group">
                                <label>Course Name</label>
                                <input type="text" name="cname" class="form-control" placeholder="Ex: Artificial Intelligence" pattern="[a-zA-Z\s]+"
       title="Please enter a valid name (letters and spaces only)" value="<?php echo $row['cname']?>" required>
                            </div>
                            <div class="form-group">
                                <label>Category Id</label>
                                <input type="text" name="cid" class="form-control" placeholder="Ex: Computer Science" value="<?php echo $row['cid']?>" required>
                            </div>
                            <div class="form-group">
                                <label>Course Description</label>
                                <input type="text" name="cdesc" class="form-control" value="<?php echo $row['cdesc']?>" required>
                            </div>
                            <div class="form-group">
                                <label>Duration</label>
                                <input type="text" name="duration" class="form-control" placeholder="Ex: 1 month" value="<?php echo $row['duration']?>" required>
                            </div>
                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" name="image" id="image" class="form-control" <?php if ($row['image']) echo 'data-selected="selected"'; ?> >
                                <?php if ($row['image']) echo '<p class="file-selected-text">Selected </p>'; ?>
                            </div>
                            <div class="form-group">
                                <label>Course Access</label>
                                <input type="text" name="course_access" class="form-control" placeholder="Ex: Online/Offline" value="<?php echo $row['course_access']?>" required>
                            </div>
                            <div class="form-group">
                                <label>Prerequisites</label>
                                <input type="text" name="prerequisites" class="form-control" value="<?php echo $row['prerequisites']?>" required>
                            </div>
                            <div class="form-group">
                                <label>Fees</label>
                                <input type="number" name="fees" class="form-control" placeholder="Ex: 100" value="<?php echo $row['fees']?>" required>
                            </div>
                            <div class="form-group">
                                <label>Start Date</label>
                                <input type="date" name="start_date" class="form-control" value="<?php echo $row['start_date']?>" required>
                            </div>
                            <div class="form-group">
                                <label>End Date</label>
                                <input type="date" name="end_date" class="form-control" value="<?php echo $row['end_date']?>" required>
                            <script>
  // Get the current date and format it as yyyy-mm-dd
  function getCurrentDate() {
    const now = new Date();
    const year = now.getFullYear();
    const month = String(now.getMonth() + 1).padStart(2, '0');
    const day = String(now.getDate()).padStart(2, '0');
    return `${year}-${month}-${day}`;
  }

  // Set the min attribute of the date input to the current date
  document.getElementsByName('end_date')[0].setAttribute('min', getCurrentDate());
    document.getElementsByName('start_date')[0].setAttribute('min', getCurrentDate());
</script>                            
                            </div>
                            <div class="form-group">
                                <label>Course Instructor</label>
                                <input type="text" name="instructor" class="form-control" placeholder="Ex: Varun" pattern="[a-zA-Z\s]+"
       title="Please enter a valid name (letters and spaces only)" value="<?php echo $row['instructor']?>"required>
                            </div>
                            <div class="modal-footer">
                                <a href="add_on_adco.php"><button type="button" class="btn btn-secondary">CLOSE</button></a>
                                <button type="submit" name="update" class="btn btn-primary">UPDATE</button>
                            </div>
                        </form>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>