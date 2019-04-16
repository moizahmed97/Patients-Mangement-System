<?php
require '../../database.php';
$id = $_POST["id"];
$email = $_POST["email"];
$clinicName = $_POST["clinicName"];
$clinicAdmin = $_POST["clinicAdmin"];

$sql = "SELECT * FROM users where UserName = '$clinicAdmin' ";
$result =   mysqli_query($conn,$sql);
if (mysqli_num_rows($result) > 0) {
while ($row = mysqli_fetch_array($result))
$clinicAdminID = $row["U_ID"];
addToDatabase($id, $email, $clinicName, $clinicAdmin, $clinicAdminID, $conn);
UpdateTable($id, $email, $clinicName, $clinicAdmin, $clinicAdminID);
}
else {
  echo "You entered the wrong Admin Name";
}

function addToDatabase($id, $email, $clinicName, $clinicAdmin, $clinicAdminID, $conn) {
  $profile = 'Best Clinic In Al Khobar';
  $services = 'Teeth Whitening';
  $location = 'Thuqba';
  $website = 'ww.dental.com';
  $rating = 3;
  // Insert these values into the table user
  $sql = "INSERT into clinic  values($id, '$profile', '$services', '$location', '$website', '$email',$rating ,$clinicAdminID,1,'$clinicName' )";
  mysqli_query($conn,$sql);
  echo $sql;
}

function UpdateTable($id, $email, $clinicName, $clinicAdmin, $clinicAdminID) {
    // use echo to create the row
    echo "<tr id = \"$id\">";       // id of each serial number is in each row so easier to access when we need to delete

    echo "<td class = \"sr\">" . $id . "</td>";
    echo "<td>" . $clinicName . "</td>";
    echo "<td>" . $email . "</td>";
    echo "<td>" . $clinicAdmin . "</td>";
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
