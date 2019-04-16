<?php
require_once("../html/database.php");
	$username=$_SESSION['username'];
	$sql1 = "Select * from Appointment where username ='".$username."'";
			$result1=mysqli_query($conn, $sql1);
			echo "<div class="row mt-3">
                			<div class="col-sm">
                    				<div class="card bg-light mb-3" style="width: 18rem;">
                        				<div class="card-body">
                            							<h5 class="card-title"></h5>
                            							<hr>
                           							<p class="card-text">Dentist : </p>
                            							<h6 class="card-subtitle mb-2 text">Booking Status : Ongoing </h6>
                            							<p class="card-text">Expected Time : </p>
                            							<a href="#" class="btn btn-primary">Rate </a>
                            							<a href="#" class="btn btn-danger">Cancel</a>
                        				</div>
                   				</div>
                			</div>
            			</div>";
			while($row1 = mysqli_fetch_array($result1))
			{
				$sql2="SELECT * from Dentist where did=".$row1['D_ID'];
				$result2= mysqli_query($conn,$sql2);
				while($row2= mysqli_fetch_array($result2))
				{
					$sql3="SELECT * from clinic where CID=".$row1['C_ID'];
						$result3= mysqli_query($conn,$sql3);
						while($row3= mysqli_fetch_array($result3))
						{
                           				echo "<h5>".$row3['Name']."</h5>";
                            				echo "<hr>";
                           				echo "<p>".$row1['Fname]." ".$row1['Lname']."</p>";
						}
				}

			}
?>
