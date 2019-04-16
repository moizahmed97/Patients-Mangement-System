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

  <?php
    session_start();

    require("../html/database.php");
	  $username = $_SESSION['user'];

    $sql = "SELECT * from users where UserName = '$username'";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_array($result))
    $id = $row['U_ID'];

    $sql = "SELECT * from appointment where Recept_ID =  $id";
		$result1 = mysqli_query($conn, $sql);
    while($row1 = mysqli_fetch_array($result1)) {
    $id = $row1['Dentist_ID'];
    $cid = $row1['C_ID'];
    $pid = $row1['Patient_ID'];
}
    $sql = "SELECT * from dentist where D_ID = $id";
    $result2 = mysqli_query($conn,$sql);
    while($row2 = mysqli_fetch_array($result2)) {
    $Fname = $row2['Fname'];
    $Lname = $row2['Lname'];
  }
  $DentistName = $Fname . " " . $Lname;

  // Get Patient Name
  $sql = "SELECT * from users where U_ID = $pid";
  $result2 = mysqli_query($conn,$sql);
  while($row2 = mysqli_fetch_array($result2)) {
  $Fname = $row2['Fname'];
  $Lname = $row2['Lname'];
}
  $PatientName = $Fname . " " . $Lname;


  $result = mysqli_query($conn,"SELECT * FROM users join appointment on users.U_ID  = appointment.Patient_ID join  dentist on appointment.Dentist_ID = dentist.D_ID");

  while($row = mysqli_fetch_array($result)) {

    echo "<div class=\"col-sm\">";
    echo "<div class=\"card bg-light mb-3\" style=\"width: 18rem;\">";
    echo "<div class=\"card-body\">";
    echo "<h5 class=\"card-title\">Patient : $PatientName</h5>";
    echo "<h6 class=\"card-subtitle mb-2 text-muted\">Dentist : $DentistName</h6>";
    echo "<p class=\"card-text\">Expected Time : 2:00 PM</p>";
    echo "<a href=\"#\" class=\"btn btn-success\">Confirm </a>";
    echo"<a href=\"#\" class=\"btn btn-info ml-2\">Update</a>";
    echo"</div>";
    echo"</div>";
    echo"</div>";

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
