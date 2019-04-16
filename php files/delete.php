<?php
require_once("../html/database.php");

if(isset($_POST['Delete']))
{
		$Apm_ID=$_POST['Apm_ID'];
		$updatequery="update Appointment set Status='Deleted by Receptionist' where Apm_ID ='$Apm_ID'";
				if (mysqli_query($conn, $updatequery))
				{
							echo "Appointment deleted successfully<br>";
							header( "Refresh:2; url=receptionist-dashboard.html");
				}
				else
				{
					echo "Error: " . $updatequery . "<br>" . mysqli_error($conn);
				}
}
?>
