<?php
session_start();
require '../../database.php';

$id = $_POST["id"];
$fname = $_POST["fname"];
$lname = $_POST["lname"];
$email = $_POST["email"];
$yearsActive = $_POST["yearsActive"];
$specialtyID = $_POST["specID"];
$PNumber = $_POST["cNo"];
$clinicOffice = $_POST["clinicOffice"];
$adminID =  $_SESSION["id"];

$sql = "
UPDATE dentist
SET
            D_ID = $id,
            Fname = '$fname',
            Lname = '$lname',
            Dentist_Profile = 'Best Doctor',
            Years_Active = $yearsActive,
            Website = 'website.com',
            Email = '$email',
            Rating = 5,
            Specialty_ID = $specialtyID,
            CLinic_ID = $clinicOffice,
            Clinic_Office = $clinicOffice,
            Clinic_Num = $PNumber,
            Status_ID = 1
WHERE
            D_ID = $id

";
echo $sql;
mysqli_query($conn,$sql);
 ?>
