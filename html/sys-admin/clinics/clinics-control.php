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
                    <a class="nav-item nav-link" href="sys-admin-dashboard.html">Dashboard</a>
                    <a class="nav-item nav-link active" href="clinics-control.html">Clinics</a>
                    <a class="nav-item nav-link" href="clinic-admins-control.html">Clinic Admins</a>
                      <a class="nav-item nav-link" href="../landing.html">
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
                <button class="btn btn-success">Add</button>
            </div>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                  <?php
                  require '../../database.php';
                  $result = mysqli_query($conn,"SELECT * FROM clinic");

                  while($row = mysqli_fetch_array($result))
                  {
                  $id = $row["C_ID"];
                  $status = $row["Status_ID"];
                  echo "<tr id = \"$id\">";       // id of each serial number is in each row so easier to access when we need to delete

                  echo "<td>" . $row["C_ID"] . "</td>";
                  echo "<td>" . $row["Clinic_Name"] . "</td>";
                  echo "<td>" . $row["Status_ID"] . "</td>";
                  ?>
                  <td>
                  <div class="btn-group" role="group" aria-label="Basic example">
                    <button type="button" class="btn btn-secondary">Left</button>
                    <button type="button" class="btn btn-secondary">Middle</button>
                    <button type="button" class="btn btn-secondary">Right</button>
                  </div> </td>
                  <?php
                  // type = button needed to avoid refresh
                  echo "</tr>";
                  }

                  mysqli_close($conn);
                  ?>


                </tbody>
            </table>

        </div>

        <script>
        function removeRow(id, status) {
          $.ajax({
            type : "POST",
            url : "delete-clinic.php",
            data : {"id" : id},
            success : function (result) {
              var sr = id;
              sr = '#' + sr;
              // remove from front end
              $(sr).fadeOut(1000);
            }

          });
        }




        </script>

        <!--Bootstrap-->
        <script crossorigin="anonymous"
                integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
                src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script crossorigin="anonymous"
                integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
                src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script crossorigin="anonymous"
                integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
                src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    </body>
</html>
