<?php
require_once("../html/database.php");
if(isset($_POST['Confirm']))
	{
		$Apm_ID=$_POST["Apm_ID"];
		$time = $_POST["time"];
		$updatequery="update Appointment set Status='Confirmed' AND Time = '$time' where Apm_ID = '$Apm_ID';
		if (mysqli_query($conn, $updatequery))
			{
				echo "$fnm[$j] :Status updated successfully<br>";
			}
		else
			{
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}
		echo "Redirecting.....";
		header( "Refresh:3; url=receptionist-dashboard.html");
	}
?>
