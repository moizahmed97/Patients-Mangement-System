<?php
require '../../database.php';

$id = $_POST["id"];

ChangeStatus($id, $conn);

function ChangeStatus($id, $conn) {
  // UPDATE the status column of the receptionist
  $sql = "USE pams";
  mysqli_query($conn,$sql);

  $sql = "UPDATE dentist
          SET Status_ID = 2
          WHERE D_ID = $id ";
  mysqli_query($conn,$sql);
  echo $sql;
}


 ?>
