<?php
require '..\database.php';

$id = $_POST["id"];

ChangeStatus($id);

function ChangeStatus($id) {
  // UPDATE the status column of the receptionist
  $sql = "USE pams";
  mysqli_query($conn,$sql);

  $sql = "UPDATE user
          SET user-status = 2               /* 2 as user status means person is no longer an employee*/ 
          WHERE id = $id ";
  mysqli_query($conn,$sql);
}


 ?>
