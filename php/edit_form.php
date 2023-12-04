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
</head>
<body>

    <?php
    session_start();
    include('db_config_co.php');
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

                    $query = "SELECT * FROM courses WHERE course_id='$id' ";
                    $query_run = mysqli_query($connection,$query);
                    
                    foreach($query_run as $row) {
                        ?>
                        <form action="ins_up_delCourses.php" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="edited_id" value="<?php echo $row['course_id'] ?>">
                            <div class="form-group">
                            <label>Course Name</label>
                            <input type="text" name="cname" value="<?php echo $row['cname']?>" class="form-control">
                            </div>
                            <div class="form-group">
                            <label>Description</label>
                            <input type="textarea" name="cdesc" value="<?php echo $row['cdesc']?>" class="form-control">
                            </div>
                            <div class="form-group">
                            <label>Duration</label>
                            <input type="number" name="duration" value="<?php echo $row['duration']?>" class="form-control">
                            </div>
                            <div class="form-group">
                            <label>Image</label>
                            <input type="file" name="image" value="<?php echo $row['image']?>" class="form-control">
                             </div>
                            <div class="form-group">
                            <label>Category</label>
                            <input type="text" name="category" value="<?php echo $row['category']?>" class="form-control">
                            </div>
                            <div class="modal-footer">
                            <a href="courses.php"><button type="button" class="btn btn-secondary">CLOSE</button></a>
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