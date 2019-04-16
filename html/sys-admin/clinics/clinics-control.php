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
        <link href="../../../styles/general-styles.css" rel="stylesheet">
        <link href="../../../styles/admin.css" rel="stylesheet">
    </head>
    <body>
      <!--Navigation-->
      <nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-dark">
          <div class="container">
              <a class="navbar-brand" href="/Patients-Mangement-System/index.html">PAMS</a>
              <!--Collapse button-->
              <button aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"
                      class="navbar-toggler"
                      data-target="#navbarSupportedContent" data-toggle="collapse" type="button">
                  <span class="navbar-toggler-icon"></span>
              </button>
              <!--Links-->
              <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                  <div class="navbar-nav ">
                    <a class="nav-item nav-link" href="../sys-admin-dashboard.html">Dashboard</a>
                    <a class="nav-item nav-link active" href="#">Clinics</a>
                    <a class="nav-item nav-link" href="../clinic-admin/clinic-admins-control.html">Clinic Admins</a>
                      <a class="nav-item nav-link" href="/Patients-Mangement-System/php-files/logout.php">
                          <button class="btn btn-warning btn-sm" type="button">Sign Out</button>
                      </a>
                  </div>
              </div>
          </div>
      </nav>

        <div class="container">
            <h2 class="display-5 mt-3">Clinics Management Console</h2>
            <h5 class="display-5 text-muted">Here you can manage all the Clinics in the Application</h5>
            <hr>
            <div class="add">
              <button class="btn btn-success" data-toggle="modal" data-target="#exampleModal">Add</button>
            </div>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Clinic Admin</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                  <?php
                  require '../../database.php';
                  $result = mysqli_query($conn,"SELECT *, clinic.Status_ID as stt FROM clinic join users on Clinic_ManID = U_ID");

                  while($row = mysqli_fetch_array($result))
                  {
                    $id = $row["C_ID"];
                    $status = $row["stt"];
                    if ($status == 1)
                      $stat = 'Active';
                    else
                      $stat = 'Inactive';
                  echo "<tr id = \"$id\">";       // id of each serial number is in each row so easier to access when we need to delete

                  echo "<td class = \"sr\">" . $row["C_ID"] . "</td>";
                  echo "<td>" . $row["Clinic_Name"] . "</td>";
                  echo "<td>" . $row["Email"] . "</td>";
                  echo "<td>" . $row["UserName"] . "</td>";
                  echo "<td>" . $stat  . "</td>";

                  echo "<td>";
                  echo "<div class=\"btn-group\" role=\"group\" aria-label=\"Basic example\">";
                  echo "<button type=\"button\" class=\"btn btn-danger\" onclick =\"removeRow($id)\">Deactivate</button>";
                  echo "<button type=\"button\" class=\"btn btn-success\" onclick =\"activate($id)\">Activate</button>";
                  echo "</div>";
                  echo "</td>";

                  // type = button needed to avoid refresh
                  echo "</tr>";
                  }

                  mysqli_close($conn);
                  ?>


                </tbody>
            </table>

        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Please Enter the Clinic Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">

                <form>

                  <div class="form-group">
                    <div class="form-group">
                      <label for="dentist-id" class="col-form-label">ID (Make Sure It is Unique):</label>
                      <input type="number" class="form-control" id="id">
                    </div>
                    <label for="first-name" class="col-form-label">Clinic Name:</label>
                    <input type="text" class="form-control" id="clinic-name-field">
                  </div>
                  <div class="form-group">
                    <label for="dentist-id" class="col-form-label">Clinic Admin UserName:</label>
                    <input type="text" class="form-control" id="clinic-admin-field">
                  </div>
                  <div class="form-group">
                    <label for="dentist-id" class="col-form-label">Email ID:</label>
                    <input type="email" class="form-control" id="email-id-field">
                  </div>
                </form>

              </div>
              <div class="modal-footer">
                <button type="reset" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="reset" class="btn btn-primary" onclick="addClinic()" data-dismiss="modal">Save changes</button>
              </div>
            </div>
          </div>
        </div>





        <script>
        function addClinic() {
          var flag = true;
          var id = $('#id').val();
          var admin = $('#clinic-admin-field').val();
          var email = $('#email-id-field').val();
          var clinicName = $('#clinic-name-field').val();

          var no = document.getElementsByClassName("sr");
          for (var i = 1; i < no.length; i++) {
            if (no[i].innerHTML= id) {
              flag = false;
            }
          }
        // add to database
        if(flag) {

          $.ajax({
            type : "POST",
            url : "add-clinic.php",
            data : { "id" : id, "clinicAdmin" : admin,"email" : email,
                     "clinicName" : clinicName },
            success : function(result) {
              if (result.length > 35) {
              // result has the new row (Use echo from the php file)
              $('table').find('tbody:last').append(result);
              // after adding the stuff set the val for all those form fields to ""
              $('#id').val("");
              $('#clinic-admin-field').val("");
              $('#email-id-field').val("");
              $('#clinic-name-field').val("");
            }
            else {
              alert("No Such Clinic Found");
            }
            }
          });

        } // end of flag if
        else {
          alert("ID already Exists");
        }

        }

        function removeRow(id) {
          $.ajax({
            type : "POST",
            url : "delete-clinic.php",
            data : {"id" : id},
            success : function (result) {
              var sr = id;
              sr = '#' + sr;
              // remove from front end
              tds = $(sr).children();
              $(tds[4]).html("Inactive");
        }

          });
        }

        function activate(id) {
          $.ajax({
            type : "POST",
            url : "activate-clinic.php",
            data : {"id" : id},
            success : function (result) {
              var sr = id;
              sr = '#' + sr;
              // remove from front end
              tds = $(sr).children();
              $(tds[4]).html("Active");
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
