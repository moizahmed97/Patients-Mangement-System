<?php
session_start();
require '../html/database.php';
$clinicName = $_POST["clinicName"];
$dentistName = $_POST["dentistName"];
$date = $_POST["date"];
$time = $_POST["time"];
$pID = $_SESSION["id"];

$cID = getClinicID($clinicName, $conn);
$dID = getDentistID($dentistName, $conn);
addToDatabase($clinicName, $dentistName, $date, $time,$dID,$cID, $conn,$pID);


function addToDatabase($clinicName, $dentistName, $date, $time,$dID,$cID, $conn,$pID) {
  $status = 1;
  // Insert these values into the table user
  $sql = "INSERT into appointment values(NULL, '$date', 'Dental', $pID, 1, $dID,$status,$cID,'$time' )";
  mysqli_query($conn,$sql);
}


function getDentistID($name, $link) {
    $sql = "SELECT D_ID from dentist where Fname = '$name'";
    $result = mysqli_query($link, $sql);
    if (mysqli_num_rows($result) > 0) {
      while($row = mysqli_fetch_array($result))
        $id = $row["D_ID"];
      return $id;
    } else {
        return 1000;
    }
}

function getClinicID($name, $link) {
    $sql = "SELECT C_ID from clinic where Clinic_Name = '$name'";
    $result = mysqli_query($link, $sql);
    if (mysqli_num_rows($result) > 0) {
      while($row = mysqli_fetch_array($result))
        $id = $row["C_ID"];
      return $id;
    } else {
        return 1000;
    }
}



 ?>
