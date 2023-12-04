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
    $image = $_FILES['image'];
    $img = file_get_contents($image["tmp_name"]);

    $query = "SELECT * FROM category WHERE cat_name='$cname'";
    $result = mysqli_query($connection,$query);
    $row_count = mysqli_num_rows($result);

    if($row_count > 0){
        echo "<script language='javascript'>window.alert('Data already exists');window.location='add_on_adcat.php';</script>";
    }else{
        $query = "INSERT INTO category (cat_name, cat_img) VALUES (?, ?)";
        $query_run = mysqli_prepare($connection, $query);
        mysqli_stmt_bind_param($query_run, "ss", $cname, $img);
        mysqli_stmt_execute($query_run);

        if($query_run){
            echo "<script language='javascript'>window.alert('Data published successfully');window.location='add_on_adcat.php';</script>";
        }
        else{
            echo "<script language='javascript'>window.alert('Data not inserted');window.location='add_on_adcat.php';</script>";
        }
    }
}
if(isset($_POST['update'])){
    $cid = $_POST['edited_id'];
    $cname = $_POST['cname'];
    $image = $_FILES['image'];

    function retrieveExistingFile($fieldName)
{
    global $connection, $cid;
    $sql = "SELECT $fieldName FROM `category` WHERE cid='$cid'";
    $result = mysqli_query($connection, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row[$fieldName];
}

    $img = isset($image['tmp_name']) && !empty($image['tmp_name']) ? file_get_contents($image["tmp_name"]) : retrieveExistingFile('cat_img');

    $data_query = "SELECT * FROM category WHERE cid='$cid'";
    $data_query_run = mysqli_query($connection,$data_query);

    foreach($data_query_run as $fa_row){
        if($image == NULL){
            $image_data = $fa_row['cat_image'];
        }
        else{
            $image_data = $img;
        }
    }
    $query = "UPDATE category SET cat_name = ?, cat_img = ? WHERE cid = ? ";
    $query_run = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($query_run, "ssi", $cname, $img, $cid);
    mysqli_stmt_execute($query_run);
    
    if($query_run){

        if($img == NULL){
            echo "<script language='javascript'>window.alert('Updated with existing image');window.location='add_on_adcat.php';</script>";
        }
        else{
            echo "<script language='javascript'>window.alert('Data updated');window.location='add_on_adcat.php';</script>";
        }
    }
    else{
        echo "<script language='javascript'>window.alert('Data not updated');window.location='add_on_adcat.php';</script>";
    }
}

if(isset($_POST['data_delete'])){
    $cid = $_POST['delete_id'];

    $query = "DELETE FROM category WHERE cid='$cid'";
    $query_run = mysqli_query($connection,$query);
    
    if($query_run){
        echo "<script language='javascript'>window.alert('Data Deleted');window.location='add_on_adcat.php';</script>";
    }
    else{
        echo "<script language='javascript'>window.alert('Data not deleted');window.location='add_on_adcat.php';</script>";
    }
}

?>