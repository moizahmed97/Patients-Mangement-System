<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>PAMS</title>

        <!--Bootstrap-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
              integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
              crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="../styles/general-styles.css">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="landing.html">PAMS</a>
                <!--Collapse button-->
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!--Links-->
                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                    <!-- Add spacer, to align navigation to the right in desktop -->
                    <div class="navbar-nav">

                        <a class="nav-item nav-link" href="#">
                            <button class="btn btn-info btn-sm" type="button">Profile</button>
                        </a>
                        <a class="nav-item nav-link" href="landing.html">
                            <button class="btn btn-warning btn-sm" type="button">Sign Out</button>
                        </a>
                    </div>
                </div>
            </div>
        </nav>

        <div class="container">
            <div class="row mt-3">
                <div class="col-sm-12">
                    <h4>Ongoing Requests</h4>
                    <hr>
                </div>
            </div>

                <div class="col-sm">
                    <div class="card bg-light mb-3 " style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title"></h5>
                            <h6 class="card-subtitle mb-2 text-muted"></h6>
                            <p class="card-text"></p>
                            <a href="#" class="btn btn-success" type = 'confirm'>Confirm </a>
                            <a href="#" class="btn btn-info" type = 'update'>Update</a>
                        </div>
                        <?php
                        require_once("../html/database.php");
	                       $username=$_SESSION['username'];
	                        $sql1 = "Select * from Appointment where U_ID ='".$Recept_ID."'";
			                $result1=mysqli_query($conn, $sql1);
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
                                                echo "<p>".$row1['Fname']." ".$row1['Lname']."</p>";
                                            }
                                    }
                            }
                        ?>
                    </div>
                </div>

            </div>

        </div>

        <script
                src="https://code.jquery.com/jquery-3.3.1.min.js"
                integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
                crossorigin="anonymous">
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
                integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
                crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
                integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
                crossorigin="anonymous"></script>
        <script>
            $('update').click(function () {
                $.ajax({
                    type : "POST",
                    url : "delete.php",
                    data: $("form").serialize(),
                    success : function (result) {
                        window.location.href = '../requester/user-dashboard.php';
                    }
                });
            })
        </script>
        <script>
            $('confirm').click(function () {
                $.ajax({
                    type : "POST",
                    url : "confirm.php",
                    data: $("form").serialize(),
                    success : function (result) {
                        window.location.href = '../requester/user-dashboard.php';
                    }
                });
            })
        </script>
    </body>
</html>
