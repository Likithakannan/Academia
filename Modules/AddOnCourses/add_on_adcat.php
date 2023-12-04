<?php 
    session_start();
    include('../Course/db_config_co.php');
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

 .button-61 {
  align-items: center;
  appearance: none;
  border-radius: 4px;
  border-style: none;
  box-shadow: rgba(0, 0, 0, .2) 0 3px 1px -2px,rgba(0, 0, 0, .14) 0 2px 2px 0,rgba(0, 0, 0, .12) 0 1px 5px 0;
  box-sizing: border-box;
  color: #fff;
  cursor: pointer;
  display: inline-flex;
  font-family: Roboto,sans-serif;
  font-size: .875rem;
  font-weight: 500;
  height: 36px;
  justify-content: center;
  letter-spacing: .0892857em;
  line-height: normal;
  min-width: 64px;
  outline: none;
  overflow: visible;
  padding: 0 16px;
  position: relative;
  text-align: center;
  text-decoration: none;
  text-transform: uppercase;
  transition: box-shadow 280ms cubic-bezier(.4, 0, .2, 1);
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
  vertical-align: middle;
  will-change: transform,opacity;
}

.button-61:hover {
  box-shadow: rgba(0, 0, 0, .2) 0 2px 4px -1px, rgba(0, 0, 0, .14) 0 4px 5px 0, rgba(0, 0, 0, .12) 0 1px 10px 0;
}

.button-61:disabled {
  background-color: rgba(0, 0, 0, .12);
  box-shadow: rgba(0, 0, 0, .2) 0 0 0 0, rgba(0, 0, 0, .14) 0 0 0 0, rgba(0, 0, 0, .12) 0 0 0 0;
  color: rgba(0, 0, 0, .37);
  cursor: default;
  pointer-events: none;
}

.button-61:not(:disabled) {
  background-color: #6200ee;
}

.button-61:focus {
  box-shadow: rgba(0, 0, 0, .2) 0 2px 4px -1px, rgba(0, 0, 0, .14) 0 4px 5px 0, rgba(0, 0, 0, .12) 0 1px 10px 0;
}

.button-61:active {
  box-shadow: rgba(0, 0, 0, .2) 0 5px 5px -3px, rgba(0, 0, 0, .14) 0 8px 10px 1px, rgba(0, 0, 0, .12) 0 3px 14px 2px;
  background: #A46BF5;
}
</style>
	</head>
<body>

	<div class="container">
		<!----------------------ASIDE--------------------->
		<aside>
			<div class="top">
				<div class="logo">
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
				<a href="..Application/Studs2.php">
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
				<a href="../UGCourse/ugcourses.php">
					<span class="material-symbols-sharp">library_books</span>
					<h3>Courses</h3>
				</a>
						<a href="add_on_adcat.php"  class="active">
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
      <span style="margin-left:550px;margin-top:0;"><h1>CATEGORIES</h1></span>
		<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="ins_up_deladdons.php" method="POST" enctype="multipart/form-data">
      <div class="modal-body">
        <div class="form-group">
            <label>Category Name</label>
            <input type="text" name="cname" class="form-control" placeholder="Ex: Computer Science"  required>
        </div>
        <div class="form-group">
            <label>Image</label>
            <input type="file" name="image" id="image" class="form-control" required>
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
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#add" >ADD CATEGORY</button>
    <a href="add_on_adco.php"><button style="margin-top:-80px;margin-left:1000px;" class="button-61" role="button">Add Courses</button></a>
</div>
        <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
         
			<?php 
  				$connection = mysqli_connect("localhost","root","","academia");
  				$query = "SELECT * FROM category";
  				$query_run = mysqli_query($connection,$query);
  			?>
  			<thead>
    			<tr>
      				<th class="th-sm">Category ID</th>
      				<th class="th-sm">Category Name</th>
      				<th class="th-sm">Image</th>
      				<th class="th-sm">Edit</th>
      				<th class="th-sm">Delete</th>
    			</tr>
  			</thead>
  			<tbody>
    		<?php 
      if(mysqli_num_rows($query_run) > 0){
        while($row = mysqli_fetch_assoc($query_run)){
      ?>
      <tr>
        <td><?php echo $row['cid'] ?></td>
        <td><?php echo $row['cat_name'] ?></td>
        <td><?php echo '<img src="data:image;base64,'.base64_encode($row['cat_img']).'"' ?></td>
        <td>
          <form action="edit_cat.php" method="POST">
            <input type="hidden" name="edit_id" value="<?php echo $row['cid'] ?>">
            <button type="submit" name="data_edit" class="btn btn-info">EDIT</button>
          </form>
        </td>
        <td>
        <form action="ins_up_deladdons.php" method="POST">
          <input type="hidden" name="delete_id" value="<?php echo $row['cid']; ?>">
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
	</script>
</body>
</html>