<!DOCTYPE html>
<head>
	<title>Courses ADD</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="../css/font-awesome.css">
	<!-- <link rel="stylesheet" type="text/css" href="../Dashboard/dashboard.css"> -->
  
	<!--Material-Icons-->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@48,400,0,0" />
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<style>
  table{
    align-items: center;
    align-self: center;
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
				<a href="#">
					<span class="material-symbols-sharp">dashboard</span>
					<h3>Dashboard</h3>
				</a>
				<a href="../Modules/Application/Studs.php">
					<span class="material-symbols-outlined">person_add</span>
					<h3>Admissions</h3>
				</a>
				<a href="#">
					<span class="material-symbols-outlined">mail</span>
					<h3>Messages</h3>
					<span class="message-count">26</span>
				</a>
				<a href="courses.php" class="active">
					<span class="material-symbols-sharp">library_books</span>
					<h3>Courses</h3>
				</a>
				<a href="#">
					<span class="material-symbols-outlined">post_add</span>
					<h3>Add on courses</h3>
				</a>				
				<a href="#">
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
		<!---------------------END OF ASIDE--------------------->
    <div class="container">
    <main class="main">
<?php 
    session_start();
    include('db_config_co.php');
?>
<section>
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
            <input type="text" name="cname" class="form-control" placeholder="Course Name" required>
        </div>
        <div class="form-group">
            <label>Course Description</label>
            <input type="textarea" name="cdesc" class="form-control" placeholder="Course Description" required>
        </div>
        <div class="form-group">
            <label>Duration</label>
            <input type="number" name="duration" class="form-control" placeholder="Duration" required>
        </div>
        <div class="form-group">
            <label>Image</label>
            <input type="file" name="image" id="image" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Category</label>
            <input type="text" name="category" class="form-control" required>
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

<div class="table-responsive">
  <?php 
  $connection = mysqli_connect("localhost","root","","academia");
  $query = "SELECT * FROM courses";
  $query_run = mysqli_query($connection,$query);
  ?>
  <table class="table table-bordered" width="100px" id="dataTable" cellspacing="0" style="margin-top:8px;" style="border:1px solid black ">
    <thead>
    <tr>
      <th>Course Id</th>
      <th>Course Name</th>
      <th>Description</th>
      <th>Duration</th>
      <th>Image</th>
      <th>Category</th>
      <th>Edit</th>
      <th>Delete</th>
    </tr>
    </thead>
    <tbody>
      <?php 
      if(mysqli_num_rows($query_run) > 0){
        while($row = mysqli_fetch_assoc($query_run)){
      ?>
      <tr>
        <td><?php echo $row['course_id'] ?></td>
        <td><?php echo $row['cname'] ?></td>
        <td><?php echo $row['cdesc'] ?></td>
        <td><?php echo $row['duration'] ?></td>
        <td><?php echo '<img src="../upload/'.$row['image'].'"width="auto";height="auto";alt=".image file">'?> </td>
        <td><?php echo $row['category'] ?></td>
        <td>
          <form action="edit_form.php" method="POST">
            <input type="hidden" name="edit_id" value="<?php echo $row['course_id'] ?>">
            <button type="submit" name="data_edit" class="btn btn-info">EDIT</button>
          </form>
        </td>
        <td>
        <form action="ins_up_delCourses.php" method="POST">
          <input type="hidden" name="delete_id" value="<?php echo $row['course_id']; ?>">
          <button type="submit" name="data_delete" class="btn btn-danger">DELETE</button>
        </form>
      </td>
      </tr>
      <?php
        }
      }
      else{
        echo "No Record Found";
      }
      ?>
    </tbody>
  </table>
</div>  
</main>
</div>
  </div>
    </section>
</body>
</html>    