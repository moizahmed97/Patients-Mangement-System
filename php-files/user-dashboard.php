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

            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Clinic Name</th>   <!-- Get From clinic table -->
                        <th scope="col">Doctor Name</th>   <!-- Get from dentist table -->
                        <th scope="col">Room Number</th>   <!-- get from dentist table  -->
                        <th scope="col">Time</th>          <!-- get from appointment table  -->
                        <th scope="col">Status of Appointment</th>      <!-- get from appointment table -->
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                  <?php
                  session_start();
                  $id = $_SESSION["id"];
                  $userName = $_SESSION["username"];
                  require '../html/database.php';
                $result = mysqli_query($conn,"SELECT *, appointment.Status_ID as appStatus from clinic join appointment on clinic.C_ID = appointment.C_ID join dentist on appointment.Dentist_ID = dentist.D_ID where Patient_ID = $id");

                while($row = mysqli_fetch_array($result))
                {
                  $apID = $row["Apm_ID"];
                  $docName = $row["Fname"] . " ". $row["Lname"];
                echo "<tr id = \"$apID\">";       // id of each serial number is in each row so easier to access when we need to delete

                echo "<td>" . $row["Clinic_Name"] . "</td>";
                echo "<td>" . $docName . "</td>";
                echo "<td>" . $row["Clinic_Office"] . "</td>";
                echo "<td>" . $row["time"] . "</td>";
                echo "<td>" . $row["appStatus"] . "</td>";
                echo "<td>";
                echo "<button type=\"button\" class=\"btn btn-danger\" onclick =\"cancel($apID)\">Cancel</button>";
                echo "</td>";
                // type = button needed to avoid refresh
                echo "</tr>";
                }

                mysqli_close($conn);
                ?>

                </tbody>
            </table>

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
          function cancel(apID) {
            $.ajax({
              type : "POST",
              url : "cancel-appointment.php",
              data : {"apID" : apID},
              success : function (result) {
                var sr = apID;
                sr = '#' + sr;
                // remove from front end
                $(sr).fadeOut(1000);
              }

            });
          }
        </script>
    </body>
</html>
