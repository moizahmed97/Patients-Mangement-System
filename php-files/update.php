<?php
require_once("../html/database.php");
$aID = $_POST["aID"];
$time = $_POST["newTime"];
$sql = "UPDATE appointment SET  time = '$time' where Apm_ID = $aID ";
mysqli_query($conn, $sql);
?>
