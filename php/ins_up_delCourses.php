<?php
session_start();
include('db_config_co.php');

$connection=mysqli_connect("localhost","root","","academia");

if(isset($_POST['save'])){
    $cname = $_POST['cname'];
    $cdesc = $_POST['cdesc'];
    $duration = $_POST['duration'];
    $image = $_FILES['image']['name'];
    $category = $_POST['category'];
    
    $query = "SELECT * FROM courses WHERE cname='$cname' and cdesc='$cdesc'";
    $result = mysqli_query($connection,$query);
    $row_count = mysqli_num_rows($result);
    if($row_count > 0){
        echo "<script language='javascript'>window.alert('Data already exists');window.location='courses.php';</script>";
    }
    else if(file_exists("../upload/". $_FILES["image"]["name"])){
        $store=$_FILES["image"]["name"];
        $query = "INSERT INTO courses (cname,cdesc,duration,image,category) VALUES ('$cname','$cdesc','$duration','$image','$category')";

        $query_run = mysqli_query($connection,$query);

        if($query_run){
            echo "<script language='javascript'>window.alert('Data published successfully');window.location='courses.php';</script>";
        }
        else{
            echo "<script language='javascript'>window.alert('Data not inserted');window.location='courses.php';</script>";
        }
    }else{
        $query = "INSERT INTO courses (cname,cdesc,duration,image,category) VALUES ('$cname','$cdesc','$duration','$image','$category')";

        $query_run = mysqli_query($connection,$query);

        if($query_run){
            move_uploaded_file($_FILES["image"]["tmp_name"],"../upload/".$_FILES["image"]["name"]);

            echo "<script language='javascript'>window.alert('Data published successfully');window.location='courses.php';</script>";
        }
        else{
            echo "<script language='javascript'>window.alert('Data not inserted');window.location='courses.php';</script>";
        }
    }
}
if(isset($_POST['update'])){
    $course_id = $_POST['edited_id'];
    $cname = $_POST['cname'];
    $cdesc = $_POST['cdesc'];
    $duration = $_POST['duration'];
    $image = $_FILES['image']['name'];
    $category = $_POST['category'];

    $data_query = "SELECT * FROM courses WHERE course_id='$course_id' ";
    $data_query_run = mysqli_query($connection,$data_query);

    foreach($data_query_run as $fa_row){
        if($image == NULL){
            $image_data = $fa_row['image'];
        }
        else{
            if($img_path = "../upload/".$fa_row['image']){
                unlink($img_path);
                $image_data = $image;
            }
        }
    }
    $query = "UPDATE courses SET cname='$cname', cdesc='$cdesc', duration='$duration', image='$image', category='$category' WHERE course_id='$course_id' ";
    $query_run = mysqli_query($connection,$query);
    
    if($query_run){

        if($image == NULL){
            echo "<script language='javascript'>window.alert('Updated with existing data');window.location='courses.php';</script>";
        }
        else{
            move_uploaded_file($_FILES["image"]["tmp_name"],"../upload/".$_FILES["image"]["name"]);
            echo "<script language='javascript'>window.alert('Data updated');window.location='courses.php';</script>";
        }
    }
    else{
        echo "<script language='javascript'>window.alert('Data not updated');window.location='courses.php';</script>";
    }
}

if(isset($_POST['data_delete'])){
    $course_id = $_POST['delete_id'];

    $query = "DELETE FROM courses WHERE course_id='$course_id'";
    $query_run = mysqli_query($connection,$query);
    
    if($query_run){
        echo "<script language='javascript'>window.alert('Data Deleted');window.location='courses.php';</script>";
    }
    else{
        echo "<script language='javascript'>window.alert('Data not deleted');window.location='courses.php';</script>";
    }
}

?>