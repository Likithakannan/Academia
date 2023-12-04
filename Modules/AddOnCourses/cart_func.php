   <?php
   function cart_item(){
        require '../UGCourse/db_config_co.php'; 
        if(!isset($_SESSION['student_id'])){
            $num_rows = null;
        }
        else if(isset($_GET['add_to_cart'])){
            $student_id = $_SESSION['student_id'];
            $select_query = "SELECT * FROM cart WHERE student_id='$student_id'";
            $result_query = mysqli_query($connection,$select_query);
            $num_rows = mysqli_num_rows($result_query);    
            if($num_rows == 0){

            }
        }
        else{
            $student_id = $_SESSION['student_id'];
            $select_query = "SELECT *  FROM cart WHERE student_id='$student_id'";
            $result_query = mysqli_query($connection,$select_query);
            $num_rows = mysqli_num_rows($result_query);   
        }
        echo $num_rows;
    } 
    ?>