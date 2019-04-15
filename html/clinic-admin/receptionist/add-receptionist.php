<?php
require '../../database.php';
$id = $_POST["id"];
$fname = $_POST["fname"];
$lname = $_POST["lname"];
$email = $_POST["email"];
$joinDate = $_POST["join-date"];
$userName = $fname . $lname ;
addToDatabase($id, $fname, $lname, $email, $joinDate, $userName, $conn);
UpdateTable($id,$fname, $lname, $email,$joinDate);


function addToDatabase($id, $fname, $lname, $email, $joinDate, $userName, $conn) {
  $status = 1;       // Status as 1 means the person is active and working
  // Insert these values into the table user
  $sql = "INSERT into users values($id, '$userName', '$fname', '$lname', 'password', '$email',$joinDate,2,$status )";
  mysqli_query($conn,$sql);

}

function UpdateTable($id, $fname, $lname, $email,$joinDate) {
    // use echo to create the row
    echo "<tr id = \"$id\">";       // id of each serial number is in each row so easier to access when we need to delete

    echo "<td>" . $id . "</td>";
    echo "<td>" . $fname . "</td>";
    echo "<td>" . $lname . "</td>";
    echo "<td>" . $email . "</td>";
    echo "<td>" . $joinDate . "</td>";
    echo "<td>" . "<button onclick = \"removeRow($id)\" type = \"button\" class = \"btn btn-danger mx-auto\">Remove" . "</button>" . "</td>";
    // type = button needed to avoid refresh
    echo "</tr>";
}
 ?>
