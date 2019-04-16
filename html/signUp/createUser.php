<?php
    require ("../database.php");
    session_start();
    $name = $_POST["name"];
    $email = $_POST["email"];
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $password = $_POST["password"];
    $type = 1;    // 1 is for user
    // Check whether the ID exists
    $nameExists = checkNameExists($name, $conn);
    if ($nameExists) {
        echo "ID already exists";
    } else {
        // insert into the users table
        $_SESSION["username"] = $name;
        $sql = "INSERT INTO users VALUES (NULL, '$name', '$fname', '$lname', '$password', '$email', 0000-00-00, $type, 1)";
        mysqli_query($link, $sql);
        $_SESSION["id"] = getUserID($name,$conn);
    }
    function checkNameExists($name, $link) {
        $sql = "SELECT UserName from users where UserName = $name";
        $result = mysqli_query($link, $sql);
        if (mysqli_num_rows($result) > 0) {
            return true;
        } else {
            return false;
        }
    }

    function getUserID($name, $link) {
        $sql = "SELECT U_ID from users where UserName = $name";
        $result = mysqli_query($link, $sql);
        if (mysqli_num_rows($result) > 0) {
          while($row = mysqli_fetch_array($result))
            $id = $row["U_ID"];
          return $id;
        } else {
            return 1000;
        }
    }
