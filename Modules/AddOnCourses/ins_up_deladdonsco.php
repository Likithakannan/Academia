<?php
session_start();
if(isset($_SESSION['email'])){
	$email = $_SESSION['email'];
}else{
	header("Location: ../Register & login/login.php");
}
include('../Course/db_config_co.php');

$connection=mysqli_connect("localhost","root","","academia");

if(isset($_POST['save'])){
    $cname = $_POST['cname'];
    $cid = $_POST['category'];
    $cdesc = $_POST['cdesc'];
    $duration = $_POST['duration'];
    $image = $_FILES['image'];
    $img = file_get_contents($image["tmp_name"]);
    $access = $_POST['course_access'];
    $prerequisites = $_POST['prerequisites'];
    $fees = $_POST['fees'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $instructor = $_POST['instructor'];

    $query = "SELECT * FROM courses WHERE cname='$cname'";
    $result = mysqli_query($connection,$query);
    $row_count = mysqli_num_rows($result);

    if($row_count > 0){
        echo "<script language='javascript'>window.alert('Data already exists');window.location='add_on_adco.php';</script>";
    }else{
        $query = "INSERT INTO courses (cname, cid, cdesc, duration, image, course_access, prerequisites, fees,start_date,end_date,instructor) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $query_run = mysqli_prepare($connection, $query);
        mysqli_stmt_bind_param($query_run, "sisssssisss", $cname, $cid, $cdesc, $duration, $img, $access, $prerequisites, $fees, $start_date, $end_date, $instructor);
        mysqli_stmt_execute($query_run);

        if($query_run){
            echo "<script language='javascript'>window.alert('Data published successfully');window.location='add_on_adco.php';</script>";
        }
        else{
            echo "<script language='javascript'>window.alert('Data not inserted');window.location='add_on_adcat.php';</script>";
        }
    }
}
if(isset($_POST['update'])){
    $course_id = $_POST['edited_id'];
    $cname = $_POST['cname'];
    $cid = $_POST['cid'];
    $cdesc = $_POST['cdesc'];
    $duration = $_POST['duration'];
    $image = $_FILES['image'];
function retrieveExistingFile($fieldName)
{
    global $connection, $course_id;
    $sql = "SELECT $fieldName FROM `courses` WHERE course_id='$course_id'";
    $result = mysqli_query($connection, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row[$fieldName];
}   
        $img = isset($image['tmp_name']) && !empty($image['tmp_name']) ? file_get_contents($image["tmp_name"]) : retrieveExistingFile('image');
    $access = $_POST['course_access'];
    $prerequisites = $_POST['prerequisites'];
    $fees = $_POST['fees'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $instructor = $_POST['instructor'];
    $data_query = "SELECT * FROM courses WHERE course_id='$course_id'";
    $data_query_run = mysqli_query($connection,$data_query);

    foreach($data_query_run as $fa_row){
        if($image == NULL){
            $image_data = $fa_row['image'];
        }
        else{
            $image_data = $img;
        }
    }
    $query = "UPDATE courses SET cname = ?, cid = ?, cdesc = ?, duration = ?, image = ?, course_access = ?, prerequisites = ?, fees = ?, start_date = ?, end_date = ?, instructor = ? WHERE course_id = ? ";
    $query_run = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($query_run, "sisssssisssi", $cname, $cid, $cdesc, $duration, $img, $access, $prerequisites, $fees, $start_date, $end_date, $instructor, $course_id,);
    mysqli_stmt_execute($query_run);
    
    if($query_run){

        if($img == NULL){
            echo "<script language='javascript'>window.alert('Updated with existing data');window.location='add_on_adco.php';</script>";
        }
        else{
            echo "<script language='javascript'>window.alert('Data updated');window.location='add_on_adco.php';</script>";
        }
    }
    else{
        echo "<script language='javascript'>window.alert('Data not updated');window.location='add_on_adco.php';</script>";
    }
}

if(isset($_POST['data_delete'])){
    $course_id = $_POST['delete_id'];

    $query = "DELETE FROM courses WHERE course_id='$course_id'";
    $query_run = mysqli_query($connection,$query);
    
    if($query_run){
        echo "<script language='javascript'>window.alert('Data Deleted');window.location='add_on_adco.php';</script>";
    }
    else{
        echo "<script language='javascript'>window.alert('Data not deleted');window.location='add_on_adco.php';</script>";
    }
}

?>