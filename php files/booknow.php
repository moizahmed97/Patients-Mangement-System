<?php
session_start();
if(isset($_POST['Book now']))
{
		
		include 'dbconfig.php';
		$uid=$_POST['uid'];
		$did=$_POST['did'];
		$cid=$_POST['cid'];
		$status="Ongoing";
		$sql = "INSERT INTO Appointment(Apm_ID,Apm_Date,Apm_Type,Patient_ID,Recept_ID,Dentist_ID,Status_ID) VALUES (,,,'$uid',,'$did','1') ";
		if(!empty($_POST['uid'])&&!empty($_POST['did']))
		{
			require_once("dbconfig.php");
			if (mysqli_query($conn, $sql)) 
			{
				header( "Refresh:2; url=user-dashboard.html");
			} 
				else
				{
					echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				}
			}
		}
}
?>