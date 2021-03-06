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
                      <a class="nav-item nav-link" href="../sys-admin-dashboard.html">Dashboard</a>
                      <a class="nav-item nav-link" href="../clinics/clinics-control.php">Clinics</a>
                      <a class="nav-item nav-link active" href="clinic-admins-control.php">Clinic Admins</a>
                      <a class="nav-item nav-link" href="/Patients-Mangement-System/php-files/logout.php">
                          <button class="btn btn-warning btn-sm" type="button">Sign Out</button>
                      </a>
                  </div>
              </div>
          </div>
      </nav>

        <div class="container">
            <h2 class="display-5 mt-3">Clinic Admins Management Console</h2>
            <h5 class="display-5 text-muted">Here you can manage all the Clinic Admins of the Application</h5>
            <hr>
            <div class="add">
                <button class="btn btn-success" data-toggle="modal" data-target="#exampleModal">Add</button>
            </div>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Email ID</th>
                        <th scope="col">Clinic Name</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>

                  <?php
                  require '../../database.php';
               $result = mysqli_query($conn,"SELECT  *, users.Status_ID as status FROM users  left join clinic on users.U_ID = clinic.Clinic_ManID where users.Type_ID = 3");
                while($row = mysqli_fetch_array($result))
                {
                  $id = $row["U_ID"];
                  $status = $row["status"];
                  if ($status == 1)
                    $stat = 'Active';
                  else
                    $stat = 'Inactive';
                echo "<tr id = \"$id\">";       // id of each serial number is in each row so easier to access when we need to delete

                echo "<td>" . $row["U_ID"] . "</td>";
                echo "<td>" . $row["Fname"] . "</td>";
                echo "<td>" . $row["Lname"] . "</td>";
                echo "<td>" . $row["Email"] . "</td>";
                echo "<td>" . $row["Clinic_Name"] . "</td>";
                echo "<td>" . $stat . "</td>";
              //  echo "<td>" . "<button onclick = \"removeRow($id)\" type = \"button\" class = \"btn btn-danger mx-auto\">Remove" . "</button>" . "</td>";
                // type = button needed to avoid refresh
                echo "<td>";
                echo "<div class=\"btn-group\" role=\"group\" aria-label=\"Basic example\">";
                echo "<button type=\"button\" class=\"btn btn-danger\" onclick =\"removeRow($id)\">Deactivate</button>";
                echo "<button type=\"button\" class=\"btn btn-success\" onclick =\"activate($id)\">Activate</button>";
                echo "</div>";
                echo "</td>";

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
                <h5 class="modal-title" id="exampleModalLabel">Please Enter the Dentist Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">

                <form>

                  <div class="form-group">
                    <div class="form-group">
                      <label for="dentist-id" class="col-form-label">Clinic Admin ID:</label>
                      <input type="number" class="form-control" id="id">
                    </div>
                    <label for="first-name" class="col-form-label">First Name:</label>
                    <input type="text" class="form-control" id="first-name-field">
                  </div>
                  <div class="form-group">
                    <label for="dentist-id" class="col-form-label">Last Name:</label>
                    <input type="text" class="form-control" id="last-name-field">
                  </div>
                  <div class="form-group">
                    <label for="dentist-id" class="col-form-label">Email ID:</label>
                    <input type="email" class="form-control" id="email-id-field">
                  </div>
                  <div class="form-group">
                    <label for="dentist-id" class="col-form-label">Clinic Name:</label>
                    <input type="text" class="form-control" id="clinic-name-field">
                  </div>
                </form>

              </div>
              <div class="modal-footer">
                <button type="reset" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="reset" class="btn btn-primary" onclick="addClinicAdmin()" data-dismiss="modal">Save changes</button>
              </div>
            </div>
          </div>
        </div>


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

                        <script src="clinic-admin-ops.js" type="text/javascript"></script>


            </body>


</html>
