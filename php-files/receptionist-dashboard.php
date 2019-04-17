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
                        <a class="nav-item nav-link" href="logout.php">
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

  <?php
    session_start();

    require("../html/database.php");
	  $username = $_SESSION['username'];

  $result = mysqli_query($conn,"SELECT *, users.Fname as UFname, users.Lname as ULname  FROM users join appointment on users.U_ID  = appointment.Patient_ID join  dentist on appointment.Dentist_ID = dentist.D_ID where appointment.Status_ID = 1" );

  while($row = mysqli_fetch_array($result)) {
    $aID = $row['Apm_ID'];
    echo "<div class=\"col-sm\">";
    echo "<div class=\"card bg-light mb-3\" style=\"width: 18rem;\" id = \"$aID\">";
    echo "<div class=\"card-body\">";
    $PatientName = $row['UFname'] . " " . $row['ULname'];
    echo "<h5 class=\"card-title\">Patient : $PatientName</h5>";
    $DentistName = $row['Fname'] . " " . $row['Lname'];
    echo "<h6 class=\"card-subtitle mb-2 text-muted\">Dentist : $DentistName</h6>";
    $time = $row['time'];
    echo "<p class=\"card-text\">Expected Time : $time</p>";
    echo "<a onclick= \"removeCard($aID)\" href=\"#\" class=\"btn btn-success\">Confirm </a>";
    echo"<a onclick= \"updateCard($aID)\" class=\"btn btn-info ml-2\">Update </a>";
    echo"</div>";
    echo"</div>";
    echo"</div>";

  }

?>
    <div class="form-group">
      <label>New Time</label>
      <input type="text" class="form-control" id="updateTime" placeholder="Update Time Here">
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
          function removeCard(aID) {
            $.ajax({
                type : "POST",
                url : "confirm.php",
                data: {"aID" : aID},
                success : function (result) {
                  aID = '#' + aID;
                  $(aID).fadeOut(1000);
                }
            });
          }

          function updateCard(aID) {
            var newTime = $('#updateTime').val();
            $.ajax({
                type : "POST",
                url : "update.php",
                data: {"newTime" : newTime, "aID" : aID},
                success : function (result) {
                  alert("Please Refresh");
                }
            });
          }

        </script>

    </body>
</html>
