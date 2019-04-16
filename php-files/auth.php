<?php
require_once("../html/database.php");

    session_start();
    $user= $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * from users where  UserName = '$user' and Hashed_PW = '$password' ";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            $type = $row['Type_ID'];
            $name = $row['Lname'];
        }
        if ($type == 1) {  // User
            $url = '../php-files/user-dashboard.php';
        } else if ($type == 2) {   //  Receptionist
          $url = '../php-files/receptionist-dashboard.php';
        } else if ($type == 3) {  // Clinic Admin
          $url = '../php-files/clinic-admin-dashboard.html';
        } else if ($type == 4) { // Sys-Admin
          $url = '../php-files/clinic-admin-user-dashboard.html';
        }
    $_SESSION['user'] = $user;
        echo $url;
    } else {
        echo "Wrong User ID or Password";
    }
?>
