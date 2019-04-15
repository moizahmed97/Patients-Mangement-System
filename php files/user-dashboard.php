<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>PAMS</title>

        <!--Bootstrap-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
              integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
              crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link rel="stylesheet" href="../styles/general-styles.css">
        <link rel="stylesheet" href="../styles/user-dashboard.css">
    </head>

    <body>
        <!--Navigation-->
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

                        <a class="nav-item nav-link" href="#clinic-list">
                            <button class="btn btn-success btn-sm" type="button">Book an Appointment</button>
                        </a>
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

        <div class="container mb-5">
            <div class="row mt-3">
                <div class="col-sm-12">
                    <h2 class="display-5">Your ongoing bookings are</h2>
                    <hr>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-sm">
                    <div class="card bg-light mb-3" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title"></h5>
                            <hr>
                            <p class="card-text"></p>
                            <h6 class="card-subtitle mb-2 text"></h6>
                            <p class="card-text"></p>
                            <a href="#" class="btn btn-primary">Rate </a>
                            <a href="#" class="btn btn-danger" id = 'cancel'>Cancel</a>
                            <?php
	                            $username=$_SESSION['username'];
	                            $sql1 = "Select * from Appointment where username ='".$username."'";
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
                                                        echo "<p>".$row1['Fname]." ".$row1['Lname']."</p>";
                                                    }
                                        }

                                }
                            ?>
                        </div>
                    </div>
                </div>


            </div>
        </div>

        <!--Clinics In the area-->
        <div class="container" id="clinic-list">
            <div class="row">
                <div class="col-md-12 mb-5">
                    <h2 class="display-4">Clinics in your area</h2>
                    <hr>
                    <p><h2>Best rated Clinics near you</h2></p>
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                            <div class="card clinic">
                              <img src="../images/clinic-logo-1.jpg" class="card-img-top" alt="...">
                                <div class="card-body text-center">
                                    <h5 class="card-title">Swiss-American Teeth Clinic</h5>
                                    <p class="card-text"> Swiss hospitality with American expertise</p>
                                    <div class="text-center">
                                        <a href="#" class="btn btn-primary col-md-8 mt-3" type = 'booknow'>Book Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                            <div class="card clinic">
                              <img src="../images/clinic-logo-2.jpg" class="card-img-top" alt="...">
                                <div class="card-body text-center">
                                    <h5 class="card-title">Square Root Dental Clinic</h5>
                                    <p class="card-text">Best Root canal in the Kingdom</p>
                                    <div class="text-center">
                                        <a href="#" class="btn btn-primary col-md-8 mt-3" type = 'booknow'>Book Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                            <div class="card clinic">
                              <img src="../images/clinic-logo-3.jpg" class="card-img-top" alt="...">
                                <div class="card-body text-center">
                                    <h5 class="card-title">Ibn Sina Dental Hospital</h5>
                                    <p class="card-text">World Class Doctors and Facilities</p>
                                    <div class="text-center">
                                        <a href="#" class="btn btn-primary col-md-8 mt-3" type = 'booknow'>Book Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>



                    </div>
                </div>
            </div>
        </div>


        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
                integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
                crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
                integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
                crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
                integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
                crossorigin="anonymous"></script>
        <script>
            $('booknow').click(function () {
                    $.ajax({
                        type : "POST",
                        url : "booknow.php",
                        data: $("form").serialize(),
                        success : function (result) {
                            window.location.href = '../requester/user-dashboard.php';
                        }
                    });
            })
        </script>
        <script>
            $('cancel').click(function () {
                $.ajax({
                    type : "POST",
                    url : "cancel.php",
                    data: $("form").serialize(),
                    success : function (result) {
                        window.location.href = '../requester/user-dashboard.php';
                    }
                });
            })
        </script>
    </body>
</html>
