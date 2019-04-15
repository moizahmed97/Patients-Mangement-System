<?php
require '../../database.php';

$fname = $_POST["fname"];
$lname = $_POST["lname"];
$email = $_POST["email"];
$joinDate = $_POST["join-date"];
$userName = $fname . $lname ;
$id = addToDatabase($fname, $lname, $email, $joinDate, $userName, $conn);
//UpdateTable($id,$fname, $lname, $email,$joinDate);


function addToDatabase($fname, $lname, $email, $joinDate, $userName, $conn) {
  $status = 1;       // Status as 1 means the person is active and working
  // Insert these values into the table user
  $sql = "INSERT into users values(NULL, '$userName', '$fname', '$lname', 'password', '$email',$joinDate,2,$status )";
  mysqli_query($conn,$sql);
  echo $sql;
  // SELECT the id for the fname and lname
  $sql = "SELECT U_ID from users where UserNa me = '$userName' ";
  echo $sql;
  $id = 1000;
  if ($result = mysqli_query($conn,$sql))
  while($row = mysqli_fetch_array($result))
  $id =  $row['U_ID'] ;
  return $id;
}

function UpdateTable($id, $fname, $lname, $email,$joinDate) {
    // use echo to create the row
    echo "<tr>";       // id of each serial number is in each row so easier to access when we need to delete

    echo "<td>" . $id . "</td>";
    echo "<td>" . $fname . "</td>";
    echo "<td>" . $lname . "</td>";
    echo "<td>" . $email . "</td>";
    echo "<td>" . $joinDate . "</td>";
    echo "<td>" . "<button type = \"button\" class = \"btn btn-danger mx-auto\">Remove" . "</button>" . "</td>";
    // type = button needed to avoid refresh
    echo "</tr>";
}
 ?>
