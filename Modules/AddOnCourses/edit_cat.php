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

                    $query = "SELECT * FROM category WHERE cid='$id' ";
                    $query_run = mysqli_query($connection,$query);
                    
                    foreach($query_run as $row) {
                        ?>
                        <form action="ins_up_deladdons.php" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="edited_id" value="<?php echo $row['cid'] ?>">
                            <div class="form-group">
                            <label>Category Name</label>
                            <input type="text" name="cname" value="<?php echo $row['cat_name']?>" pattern="[a-zA-Z\s]+"
       title="Please enter a valid name (letters and spaces only)" class="form-control">
                            </div>
                            <div class="form-group">
                            <label>Image</label>
                            <input type="file" name="image" <?php if ($row['cat_img']) echo 'data-selected="selected"'; ?> class="form-control">
                            <?php if ($row['cat_img']) echo '<p class="file-selected-text">Selected </p>'; ?>
                            </div>
                            <div class="modal-footer">
                            <a href="add_on_adcat.php"><button type="button" class="btn btn-secondary">CLOSE</button></a>
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