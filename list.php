<?php
error_reporting(0);
session_start();
include "conn.php";

$user = $_SESSION['username'];
$sql = "SELECT * FROM user WHERE u_name = '$user'";
$res = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($res);
do {
  $role = $row['role'];
  $row = mysqli_fetch_assoc($res);
} while ($row);
if(!$user && $role == 'Manager'){
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
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <!-- Sidebar -->
    <ul class="navbar-nav  sidebar  accordion" id="accordionSidebar" style="background-color:whitesmoke;">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="manager_home.php" style="margin-right:40%;margin-top:6%;">

             <div><img src="img/jdslogo.png" style="width:100%;"></div><br>
      
     </a>

           <div class="sidebar-brand-text mx-3 mt-3" style="color:black;">JDS Room Rental</div>


      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="manager_home.php">
          <i class="fas fa-fw fa-user" style="color:black;"></i>
          <span style="color:black;">Tenant</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link" href="list.php">
          <i class="fas fa-fw fa-dollar-sign" style="color:black;"></i>
          <span style="color:black;">List of Payments</span></a>
      </li>
      <hr class="sidebar-divider">

    <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="tenant_reading.php">
          <i class="fas fa-fw fa-clipboard-list" style="color:black;"></i>
          <span style="color:black;">Billing</span></a>
      </li>

      

      <!-- Divider -->
      <hr class="sidebar-divider">


      <!-- Nav Item - Charts -->
      <!-- <li class="nav-item">
        <a class="nav-link" href="mform_out.php">
          <i class="fas fa-fw fa-clipboard-list" style="color:black;"></i>
          <span style="color:black;">Tenant-Out form</span>
        </a>

      </li>
      <hr class="sidebar-divider"> -->

            <li class="nav-item">

         <a class="nav-link" href="manager_ch_support.php">
           <i class="fas fa-fw fa-comments"  style="color:black;"></i>
           <span style="color:black;">Messaging</span></a>
         </li>
         <hr class="sidebar-divider">

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link" href="m_change.php">
          <i class="fas fa-fw fa-exchange-alt" style="color:black;"></i>
          <span style="color:black;">Change Password</span>
        </a>

      </li>



      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline" style="color:white;">
        <button class="rounded-circle border-0" id="sidebarToggle" style="background-color:#000000a3;"></button>
      </div>

    </ul>
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

                include "conn.php";
                $uname = $_SESSION['username'];
                echo "<b><b>".$uname."</b></b>";

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
          <h1 class="h3 mb-2 text-gray-800" align = "center">List of Payment</h1>

          <div class="card shadow mb-4">

            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Description</th>
                      <th>Amount Paid (php)</th>
                      <th>Prev. Reading</th>
                      <th>Current Reading</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php

                    $sql = "SELECT * FROM payment";
                    $result = mysqli_query($con, $sql);
                    $row = mysqli_fetch_assoc($result);

                    do{
                      $t_id = $row['tenant_id'];
                      $query = "SELECT * FROM tenant WHERE tenant_id = '$t_id'";
                      $result1 = mysqli_query($con, $query);
                      $row1=mysqli_fetch_assoc($result1);
                      do{
                        $fname = $row1['fname'];
                        $lname = $row1['lname'];
                        $row1 = mysqli_fetch_assoc($result1);
                      }while ($row1);

                      $description = $row['description'];
                      $amount = $row['amount'];
                      $from = $row['pay_from'];
                      $to = $row['pay_to'];
                        echo '<tr>';
                        echo '<td>'.$fname.' '.$lname.'</td>';
                        echo '<td>'.$description.'</td>';
                        echo '<td>'.number_format($amount).'</td>';
                        echo '<td>'.$from.'</td>';
                        echo '<td>'.$to.'</td>';
                        echo '</tr>';
                      $row = mysqli_fetch_assoc($result);
                    }while ($row);
                     ?>

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

 
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>

  <?php include "includes/Alertfooter.php"?>
</body>

</html>
