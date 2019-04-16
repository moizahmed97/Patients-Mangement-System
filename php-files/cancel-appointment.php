<?php
require '../html/database.php';

$apID = $_POST["apID"];

ChangeStatus($apID, $conn);

function ChangeStatus($id, $conn) {
  // UPDATE the status column of the receptionist
  $sql = "USE pams";
  mysqli_query($conn,$sql);

  $sql = "DELETE FROM appointment
          WHERE Apm_ID = $id";
  mysqli_query($conn,$sql);
  echo $sql;
}


 ?>
