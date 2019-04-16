<?php
session_start();
require '../database.php';

$info = $_POST["clinicInfo"];
$adminID =  $_SESSION["id"];

$sql = "UPDATE clinic SET Clinic_Profile = '$info' WHERE Clinic_ManID = $adminID";
mysqli_query($conn,$sql);
 ?>
