<?php
session_start();
require '../database.php';

$fee = 100;
$ad = $_POST["ad"];
$from = $_POST["from"];
$to = $_POST["to"];
$adminID = $_SESSION["id"];

$sql = "INSERT INTO advertisement values (NULL, '$from', '$to', '$ad',$fee,$adminID)";
mysqli_query($conn,$sql);
echo "This Ad will cost you $fee";

 ?>
