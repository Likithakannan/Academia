<?php 
$server_name = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "academia";

$connection = mysqli_connect("localhost","root","","academia");

$dbconfig = mysqli_select_db($connection,$db_name);

if(!$connection){
    die("Connection failed: " .mysqli_connect_error());
    echo '
        <div class="container">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title bg-danger text-white"> Database Connection failed </h1>
                        <h2 class="card-title">Database Failure</h2>
                        <p class="card-text">Please check your Database connection.</p>
                        <a href="#" class="btn btn-primary">:( </a>
                    </div>
                </div>
            </div>
        </div>
    ';
}
?>