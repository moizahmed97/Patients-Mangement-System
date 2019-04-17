<?php
require '../../database.php';
$id = $_POST["id"];
$fname = $_POST["fname"];
$lname = $_POST["lname"];
$email = $_POST["email"];
$yearsActive = $_POST["years-active"];
$specialtyID = $_POST["specialty-id"];
$PNumber = $_POST["phone-number"];
$clinicOffice = $_POST["clinic-office"];
addToDatabase($id,$fname, $lname, $yearsActive,$email, $specialtyID, $clinicOffice,$PNumber,$conn);
UpdateTable($id,$fname, $lname, $email,$PNumber);


function addToDatabase($id, $fname, $lname, $yearsActive,$email, $specialtyID, $clinicOffice,$PNumber,$conn) {
  $status = 1;       // Status as 1 means the person is active and working
  // Insert these values into the table user
  $sql = "INSERT into dentist values($id, '$fname', '$lname', 'Best doctor', $yearsActive, 'website.com','$email',5,$specialtyID,$clinicOffice,$clinicOffice, $PNumber,$status )";
  mysqli_query($conn,$sql);
  echo $sql;
}

function UpdateTable($id, $fname, $lname, $email,$PNumber) {
    // use echo to create the row
    echo "<tr id = \"$id\">";       // id of each serial number is in each row so easier to access when we need to delete

    echo "<td onclick = \"updateDentist($id)\">" . $id . "</td>";
    echo "<td>" . $fname . "</td>";
    echo "<td>" . $lname . "</td>";
    echo "<td>" . $email . "</td>";
    echo "<td>" . $PNumber . "</td>";
    echo "<td>" . 1 . "</td>";
    echo "<td>" . "<button onclick = \"removeRow($id)\" type = \"button\" class = \"btn btn-danger mx-auto\">Remove" . "</button>" . "</td>";
    // type = button needed to avoid refresh
    echo "</tr>";
}
 ?>
