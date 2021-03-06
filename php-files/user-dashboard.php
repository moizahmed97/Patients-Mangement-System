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
                <a class="navbar-brand" href="../index.html">PAMS</a>
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
                          <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModal">Book Appointment</button>
                        </a>
                        <a class="nav-item nav-link" href="#">
                            <button class="btn btn-info btn-sm" type="button">Profile</button>
                        </a>
                        <a class="nav-item nav-link" href="logout.php">
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
                    <p>Best rated Clinics</p>
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                            <div class="card">
                                <img src="../images/clinic-logo-1.jpg" class="card-img-top" alt="...">
                                <div class="card-body text-center">
                                    <h5 class="card-title">KFUPM Dental Clinic</h5>
                                    <p class="card-text">Proudly serving the KFUPM community for over 40 years</p>
                                    <div class="text-center">
                                        <a href="../html/Clinic-Pages/kfupm-Dental-Clinic.html" class="btn btn-primary col-md-8 mt-3">Vist Us</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                            <div class="card">
                                <img src="../images/clinic-logo-2.jpg" class="card-img-top" alt="...">
                                <div class="card-body text-center">
                                    <h5 class="card-title">Ozone Dental Clinic</h5>
                                    <p class="card-text">Best Root canal in the Kingdom</p>
                                    <div class="text-center">
                                      <a href="../html/Clinic-Pages/ozone-clinic.html" class="btn btn-primary col-md-8 mt-3">Vist Us</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                            <div class="card">
                                <img src="../images/clinic-logo-3.jpg" class="card-img-top" alt="...">
                                <div class="card-body text-center">
                                    <h5 class="card-title">RAM Dental Clinic</h5>
                                    <p class="card-text">World Class Doctors and Facilities</p>
                                    <div class="text-center">
                                      <a href="../html/Clinic-Pages/Ram-Dental-Clinic.html" class="btn btn-primary col-md-8 mt-3">Vist Us</a>
                                    </div>
                                </div>
                            </div>
                        </div>



                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Please Enter the Appointment Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">

                <form>

                  <div class="form-group">
                    <div class="form-group">
                      <label for="dentist-id" class="col-form-label">Clinic Name:</label>
                      <input type="text" class="form-control" id="clinic-name">
                    </div>
                    <label for="first-name" class="col-form-label">Dentist Name:</label>
                    <input type="text" class="form-control" id="dentist-name">
                  </div>
                  <div class="form-group">
                    <label for="dentist-id" class="col-form-label">Date:</label>
                    <input type="text" class="form-control" id="date">
                  </div>
                  <div class="form-group">
                    <label for="dentist-id" class="col-form-label">Time:</label>
                    <input type="text" class="form-control" id="time">
                  </div>
                </form>

              </div>
              <div class="modal-footer">
                <button type="reset" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="reset" class="btn btn-primary" onclick="book()" data-dismiss="modal">Book</button>
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
          function book() {
          var clinicName = $('#clinic-name').val();
          var dentistName = $('#dentist-name').val();
          var date = $('#date').val();
          var time = $('#time').val();

          $.ajax({
            type : "POST",
            url : "book-appointment.php",
            data : {"clinicName" : clinicName, "dentistName" : dentistName,
            "date" : date, "time" : time},
            success : function (result) {
              alert("Booking Done Please visit again to see if it is confirmed");
            }

          });
          }

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
