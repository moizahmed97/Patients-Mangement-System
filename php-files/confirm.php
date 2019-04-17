<?php
require_once("../html/database.php");
$aID = $_POST["aID"];
$sql = "UPDATE appointment SET  Status_ID = 2 where Apm_ID = $aID ";
mysqli_query($conn, $sql);
?>
