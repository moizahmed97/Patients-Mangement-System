<?php
require_once("../html/database.php");

    session_start();
    $user= $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * from user where username = $UserName and password = '$Hashed_PW' ";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            $type = $row['Type_ID'];
            $name = $row['Lname'];
        }
        if ($type == 1) {  // User
            $url = 'user-dashboard.html';
        } else if ($type == 2) {   //  Receptionist
            $url = 'receptionist-dashboard.html';
        } else if ($type == 3) {  // Clinic Admin
            $url = 'clinic-admin-dashboard.html';
        } else if ($type_ID == 4) { // Sys-Admin
            $url = 'sys-admin-dashboard.html'
        }
        $_SESSION['user'] = $user;
        $_SESSION['name'] = $Lname;
        echo $url;
    } else {
        echo "Wrong User ID or Password";
    }
?>
