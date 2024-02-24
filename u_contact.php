<?php

error_reporting(0);
session_start();
include "conn.php";
if(!$_SESSION['username']){
  echo '<script>window.location.href = "login.php";</script>';
  exit();
}
 ?>



<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Rental Room Management System</title>
  <link rel="icon" href="img/jdslogo.png">

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php include 'navlink.php'; ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>


          <ul class="navbar-nav ml-auto">

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php

                $uname = @$_SESSION['username'];
                $query = "SELECT * FROM tenant WHERE u_name = '$uname' ";
                $result = mysqli_query($con, $query);
                $row=mysqli_fetch_assoc($result);
                do{
                  $fname = $row['fname'];
                  $lname = $row['lname'];
                  $full = $fname." ".$lname;
                  echo $full;

                  $row = mysqli_fetch_assoc($result);
                }while ($row);
                ?></span>
                <img class="img-profile rounded-circle" src="user.png">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">

              <?php include "includes/Alertlogout.php"?>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
          <h1 class="h3 mb-2 text-gray-800" align="center">Your Contacts</h1>
          <div class="card shadow mb-4">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-borderless" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Contact</th>

                    </tr>
                  </thead>

                  <tbody>
                    <?php
                    $query = "SELECT * FROM tenant WHERE u_name = '$uname' ";
                    $result1 = mysqli_query($con, $query);
                    $row=mysqli_fetch_assoc($result1);
                    do{
                      $id = $row['tenant_id'];
                      $row = mysqli_fetch_assoc($result1);
                    }while ($row);
                    $sql = "SELECT * FROM tenant_contacts WHERE tenant_id = '$id'";
                    $result = mysqli_query($con, $sql);
                    $row = mysqli_fetch_assoc($result);
                    $total = 0;
                    do{
                      echo '<tr>';
                      echo "<td> Full Name:</td>";
                      echo "<td style = 'color:blue;'>".$row['fname1']. " ".$row['lname1']."</td>";
                      echo '<tr>';

                      echo '<tr>';
                      echo "<td>Occupation:</td>";
                      echo "<td style = 'color:blue;'>".$row['occupation1']."</td>";
                      echo '<tr>';

                      echo '<tr>';
                      echo "<td>Relationship:</td>";
                      echo "<td style = 'color:blue;'>".$row['nature1']."</td>";
                      echo '<tr>';

                      echo '<tr>';
                      echo "<td>Phone Number :</td>";
                      echo "<td style = 'color:blue;'>".$row['pno1']."</td>";
                      echo '<tr>';
                      if($row['pno2'] == ''){
                        $row['pno2'] = '-';
                      }

              

                      echo '<tr>';
                      echo "<td>Email Address:</td>";
                      echo "<td style = 'color:blue;'>".$row['e_address1']."</td>";
                      echo '<tr>';


                      echo '<tr>';
                      echo "<td>City</td>";
                      echo "<td style = 'color:blue;'>".$row['city1']."</td>";
                      echo '<tr>';


                      echo '<tr>';
                      echo "<td></td>";
                      echo "<td></td>";
                      echo '<tr>';

                    

                      echo '<tr>';
                      echo "<td>Choose below the information you would like to edit: </td>";
                      echo '<tr>';


                      $row = mysqli_fetch_assoc($result);
                    }while ($row);

                    if(isset($_POST['submit'])){

                      $col = $_POST['column'];
                      $edit = $_POST['edit'];

                      $query2 = "UPDATE tenant_contacts SET $col = '$edit' WHERE tenant_id = '$id'";
                      mysqli_query($con, $query2);
                      echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
                      echo "<script type='text/javascript'>
                        Swal.fire({
                          title: 'Edited successfully!',
                          icon: 'success',
                          confirmButtonText: 'Continue'
                        }).then((result) => {
                          if (result.isConfirmed) {
                            window.location.href = 'u_contact.php';
                          }
                        });
                      </script>"; 

                    }


                     ?>
                     <tr>
                     <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method = "POST">
                     <td><select class='custom-select' name= 'column' style= 'width:300px;'>
                     <option disabled>CONTACT</option>
                     <option value = 'fname1' >First Name</option>
                     <option value = 'lname1'>Last Name</option>
                     <option value = 'occupation1'>Occupation</option>
                     <option value = 'nature1'>Relationship</option>
                     <option value = 'pno1'>Phone Number e.g; 0922*******</option>
                     <option value = 'e_address1'>Email Address</option>
                     <option value = 'city1'>City</option>
                   
                     
                   </select></td>
                     <td><input type='text' class='form-control form-control-user' name='edit'></td>
                     <tr>

                     <tr>
                     <td><input class='btn btn-primary btn-user btn-lg' type='submit' name='submit' value='Edit'></td>
                     </form>
                     <tr>

                  </tbody>
                </table>
              </div>
            </div>
          </div>


        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <script>
    if ( window.history.replaceState ) {
      window.history.replaceState( null, null, window.location.href );
    }
  </script>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>
  <?php include "includes/Alertfooter.php"?>
</body>

</html>
