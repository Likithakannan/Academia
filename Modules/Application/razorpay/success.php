<?php

session_start();
$phone = $_SESSION['phone'];
//$temp = $_SESSION['temp'];

$r=$_GET['response'];
if($r==1){
    echo "SUCCESS";
}
?>