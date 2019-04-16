<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>KFUPM Maintenance System</title>
        <!--Bootstrap-->
        <link crossorigin="anonymous" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
              integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
              rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link href="../../styles/general-styles.css" rel="stylesheet">
        <link href="../../styles/admin.css" rel="stylesheet">
    </head>
    <body>
        <!--Navigation-->
        <nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="../landing.html">PAMS</a>
                <!--Collapse button-->
                <button aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"
                        class="navbar-toggler"
                        data-target="#navbarSupportedContent" data-toggle="collapse" type="button">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!--Links-->
                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                    <div class="navbar-nav ">
                        <a class="nav-item nav-link active" href="clinic-admin-dashboard.html">My Clinic</a>
                        <a class="nav-item nav-link" href="receptionists.html">Receptionists</a>
                        <a class="nav-item nav-link" href="dentists.html">Dentists</a>
                        <a class="nav-item nav-link" href="/Patients-Mangement-System/php-files/logout.php">
                            <button class="btn btn-warning btn-sm" type="button">Sign Out</button>
                        </a>
                    </div>
                </div>
            </div>
        </nav>

        <div class="container">
          <br>
          <h2>Clinic Info</h2>
          <div class="form-group">
             <label for="exampleFormControlTextarea1">Enter your Clinic Info Here</label>
             <textarea class="form-control" id="clinicInfo" rows="3"></textarea>
           </div>
           <button id="clinicInfo"class="btn btn-primary btn" type="button" onclick="updateClinicInfo()">Update Clinic Info</button>

           <hr>

          <h2>Clinic Advertisement</h2>
          <div class="form-group">
             <label for="exampleFormControlTextarea1">Enter your Ad Here</label>
             <textarea class="form-control" id="clinicAd" rows="3"></textarea>
           </div>

           <div class="row">
             <div class="col">
               <input type="text" class="form-control" placeholder="From" id = "from">
             </div>
             <div class="col">
               <input type="text" class="form-control" placeholder="To" id = "to">
             </div>
           </div>

           <button id="advertisement"class="btn btn-primary btn mt-3" type="button" onclick="enterAd()">Request Ad</button>
          <hr>


        </div>

        <script>
          function updateClinicInfo() {
            var info = $('#clinicInfo').val();
            $.ajax({
              type : "POST",
              url : "updateClinicInfo.php",
              data : { "clinicInfo" : info },
              success : function(result) {
                $('#clinicInfo').val("");
              }
            });
            }

          function enterAd() {
            var ad = $('#clinicAd').val();
            var from = $('#from').val();
            var to = $('#to').val();
            $.ajax({
              type : "POST",
              url : "enterAd.php",
              data : { "ad" : ad, "from" : from, "to" : to },
              success : function(result) {
                alert(result);
                $('#clinicAd').val("");
                $('#from').val("");
                $('#to').val("");
              }
            });
          }


        </script>

            <!--Bootstrap-->
            <script
                    src="https://code.jquery.com/jquery-3.3.1.min.js"
                    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
                    crossorigin="anonymous">
            </script>
            <script crossorigin="anonymous"
                    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
                    src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
            <script crossorigin="anonymous"
                    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
                    src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    </body>


</html>
