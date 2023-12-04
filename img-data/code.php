<?php
session_start();
include('dbConfig.php');

$connection=mysqli_connect("localhost","root","","academia");

if(isset($_POST['save'])){
    $cname = $_POST['cname'];
    $cdesc = $_POST['cdesc'];
    $duration = $_POST['duration'];
    $image = $_FILES['image']['name'];
    $category = $_POST['category'];

    if(file_exists("upload/" . $_FILES["image"]["name"])){
        $store=$_FILES["image"]["name"];
        $_SESSION['status'] = "Image already exists. ' .$store.'";
        header('Location:index.php');
    }else{
        $query = "INSERT INTO courses (cname,cdesc,duration,image,category) VALUES ('$cname','$cdesc','$duration','$image','$category')";

        $query_run = mysqli_query($connection,$query);

        if($query_run){
            move_uploaded_file(["image"]["tmp_name"],"upload/" .$_FILES["image"]["name"]);

            $_SESSION['success'] = "Data published successfully";
            header("Location: index.php");
        }
        else{
            $_SESSION['success'] = "Data not inserted";
            header("Location:index.php");
        }
    }
}
?>