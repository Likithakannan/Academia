<head>
	<title>Courses</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="../css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="../Dashboard/Stud_Dashboard.css">
	<!--Material-Icons-->
	<!--<link href="https://fonts.googleapis.com/icon?family=Material+Icons+Rounded" rel="stylesheet">-->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0" />
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <style>
.main{
	column-content: 3;
}
    img {
        max-width: 100%;
	height: 150px;
    }
  .card {
        transition: transform 0.2s ease;
        box-shadow: 0 4px 6px 0 rgba(22, 22, 26, 0.18);
        border-radius: 0;
        border: 0;
        margin-bottom: 1.5em;
	margin-left:2em;
	margin-right:42em;
        background-color:white;
	height : 300px;

   }
  .card:hover {
    transform: scale(1.1);
  }
    </style>
	</head>
<body>
<div class="container">
			
        <div class="main">
        <div class="row row-cols-1 row-cols-md-3">
    <?php 
        require 'db_config_co.php';

        $query = "SELECT * FROM courses";
        $query_run = mysqli_query($connection,$query);
        $check_courses = mysqli_num_rows($query_run) > 0;

        if($check_courses){
            while($row = mysqli_fetch_array($query_run)){
                ?>
                <div class="col-mb-4">
                    <div class="card" style="width:18rem;">
                    <img src="../upload/<?php echo $row['image'];?>" class="card-img-top" alt="Course Images">
                    <div class="card-body">
                        <h2 class="card-title"><?php echo $row['cname'];?></h2>
                        <h3 class="card-title"><?php echo $row['category'];?></h3>
                        <h3 class="card-title"><?php echo $row['duration'];?></h3>
                        <p class="card-text">
                            <?php echo $row['cdesc'];?>
                        </p>
                	</div>
            		</div>
        		</div>
        <?php
            }
        }
        else{
            echo "No Courses found";
        }
        ?>
    </div>
</div>
</body>
</html>