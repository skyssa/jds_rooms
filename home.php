<?php

error_reporting(0);
session_start();
include "conn.php";
if(!$_SESSION['username']){
  echo '<script>window.location.href = "login.php";</script>';
  exit();
}
// $sql="SELECT * FROM tenant_contacts";
// $result = mysqli_query($con, $sql);


?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>JDS Room Rental Web Application</title>
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

  <?php include'navlink.php';?>
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
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
          <h1 class="h3 mb-2 text-gray-800" align="center">Welcome!!</h1>
          <p class="mb-4"><span style="color:red;">You Occupy <b><b>Room: <?php
          $query = "SELECT * FROM tenant WHERE u_name = '$uname' ";
          $result1 = mysqli_query($con, $query);
          $row=mysqli_fetch_assoc($result1);
          do{
            $id = $row['tenant_id'];
            $row = mysqli_fetch_assoc($result1);
          }while ($row);
          $sql = "SELECT * FROM contract WHERE tenant_id = '$id'";
          $result = mysqli_query($con, $sql);
          $row = mysqli_fetch_assoc($result);
          do{
            $h_id = $row['room_id'];
            $sql1 = "SELECT * FROM room  WHERE room_id = '$h_id'";
            $result1 = mysqli_query($con, $sql1);
            $row1 = mysqli_fetch_assoc($result1);
            do{
              $name = $row1['room_name'];

              $row1 = mysqli_fetch_assoc($result1);
            }while ($row1);
            $row = mysqli_fetch_assoc($result);
          }while ($row);
          echo $name;
          ?></b></b></span></p>

          <p class="mb-4">The information below shows the amount to be paid with respect with  the terms stated and their respective due dates.</p>

          <div class="card shadow mb-4">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th> Description</th>
                      <th> Date</th>
                      <th>Amount to be Paid (php.)</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    
                    // $query = "SELECT * FROM tenant WHERE u_name = '$uname' ";
                    // $result1 = mysqli_query($con, $query);
                    // $row=mysqli_fetch_assoc($result1);
                    // do{
                    //   $id = $row['tenant_id'];
                    //   $row = mysqli_fetch_assoc($result1);
                    // }while ($row);
                    // $query1="SELECT * FROM `contract` WHERE  tenant_id='$id'";

                    // $result= mysqli_query($con,$query1);
                    // $row1=mysqli_fetch_assoc($result); 
                    // do{
                    //   $desc=$row1['']

                    // }while($row1);


                    // $sql = "SELECT * FROM contract WHERE tenant_id = '$id' AND status = 'Active'";
                    // $result = mysqli_query($con, $sql);
                    // $row = mysqli_fetch_assoc($result);
                    // $total = 0;
                    // do{
                    //   $hid = $row['room_id'];
                    //   $dur = $row['duration_month'];
                    //   $term = $row['terms'];
                    //   $div = $dur/$term;
                    //   $day = $row['start_day'];
                    //   $day1  = date("Y-m-d", strtotime($day. "+ 0 days"));
                    //   echo '<tr>';
                    //   echo '<td>'.$day1.'</td>';
                    //   echo '<td>'.$row['rent_per_term'].'</td>';
                    //   echo '<tr>';
                    //   for ($i = $div; $i < $dur; $i += $div) {
                    //     echo '<tr>';
                    //     $date  = date("Y-m-d", strtotime("+".$i." months" , strtotime("$day")));
                    //     $date1  = date("Y-m-d", strtotime($date. "+ 0 days"));
                    //     echo '<td>'.$date1.'</td>';
                    //     echo '<td>'.number_format($row['rent_per_term']).'</td>';
                    //     echo '<tr>';
                    //   }

                    //   echo '<tr><td><b><b><b>TOTAL</b></b></b></td><td>'.number_format($row['total_rent']).'</td></tr>';

                    //   $row = mysqli_fetch_assoc($result);
                    // }while ($row);


                     ?>

                  </tbody>
                </table>
              </div>
            </div>
          </div>
            <p class="mb-4">For more information or help please kindly contact us through:<br/><br/><b>Phone Number: +0932443787<br/>Email Address: JDS@gmail.com</b></p>

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
