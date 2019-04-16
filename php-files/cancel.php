<?php
require_once("../html/database.php");
if(isset($_POST['cancel']))
{
		$Apm_ID=$_POST['Apm_ID'];
		$updatequery="update Appointment set Status='Cancelled by Patient' where Apm_ID ='$Apm_ID'";
				if (mysqli_query($conn, $updatequery))
				{
							echo "Appointment cancelled successfully<br>";
							header( "Refresh:2; url=user-dashboard.html");
				}
				else
				{
					echo "Error: " . $updatequery . "<br>" . mysqli_error($conn);
				}
}
?>
