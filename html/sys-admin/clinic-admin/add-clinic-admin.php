<?php
require '../../database.php';
$id = $_POST["id"];
$fname = $_POST["fname"];
$lname = $_POST["lname"];
$email = $_POST["email"];
$clinicName = $_POST["clinicName"];
$userName = $fname . $lname ;

$sql = "SELECT * FROM clinic where Clinic_Name = '$clinicName' ";
$result =   mysqli_query($conn,$sql);
if (mysqli_fetch_array($result) > 0) {
addToDatabase($id, $fname, $lname, $email, $clinicName, $userName, $conn);
UpdateTable($id,$fname, $lname, $email,$clinicName);
}
else {
  echo "No Such Clinic Found";
}

function addToDatabase($id, $fname, $lname, $email, $clinicName, $userName, $conn) {
  $status = 1;       // Status as 1 means the person is active and working
  // Insert these values into the table user
  $sql = "INSERT into users values(NULL, '$userName', '$fname', '$lname', 'password', '$email',0000-00-00 ,3,$status )";
  mysqli_query($conn,$sql);

}

function UpdateTable($id, $fname, $lname, $email,$clinicName) {
    // use echo to create the row
    echo "<tr id = \"$id\">";       // id of each serial number is in each row so easier to access when we need to delete

    echo "<td>" . $id . "</td>";
    echo "<td>" . $fname . "</td>";
    echo "<td>" . $lname . "</td>";
    echo "<td>" . $email . "</td>";
    echo "<td>" . $clinicName . "</td>";
    echo "<td>" . 'Active' . "</td>";
  //  echo "<td>" . "<button onclick = \"removeRow($id)\" type = \"button\" class = \"btn btn-danger mx-auto\">Remove" . "</button>" . "</td>";
    // type = button needed to avoid refresh
    echo "<td>";
    echo "<div class=\"btn-group\" role=\"group\" aria-label=\"Basic example\">";
    echo "<button type=\"button\" class=\"btn btn-danger\" onclick =\"removeRow($id)\">Deactivate</button>";
    echo "<button type=\"button\" class=\"btn btn-success\" onclick =\"activate($id)\">Activate</button>";
    echo "</div>";
    echo "</td>";

    echo "</tr>";
}
 ?>
