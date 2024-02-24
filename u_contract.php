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
          <h1 class="h3 mb-2 text-gray-800" align="center">Agreement</h1>

          <div class="card shadow mb-4">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-borderless" id="dataTable" width="100%" cellspacing="0">

                  <tbody>
                    <tr>
                      <td>
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method = "POST">
                        <select class='custom-select' name= 'column' style= 'width:300px;'>
                        <option value = 'all'>All</option>
                        <option value = 'latest'>Latest</option>
                      </select>&nbsp&nbsp&nbsp&nbsp
                        <input class='btn btn-primary btn-user btn-lg' type='submit' name='submit' value='Select'>
                      </form>
                      <br/></td>
                    </tr>
                    <?php
                    $query = "SELECT * FROM tenant WHERE u_name = '$uname' ";
                    $result1 = mysqli_query($con, $query);
                    $row=mysqli_fetch_assoc($result1);
                    do{
                      $id = $row['tenant_id'];
                      $row = mysqli_fetch_assoc($result1);
                    }while ($row);
                    if(isset($_POST['submit'])){
                      $choose = @$_POST['column'];
                      if($choose == 'all'){
                       $ids= $_COOKIE['manager_id'];
                        $sql = "SELECT * FROM contract WHERE tenant_id = '$ids'";
                        $result = mysqli_query($con, $sql);
                        $row = mysqli_fetch_assoc($result);
                        do{
                          $h_id = $row['room_id'];
                          $cid = $row['contract_id'];
                          $sql1 = "SELECT * FROM room WHERE room_id = '$h_id'";
                          $result1 = mysqli_query($con, $sql1);
                          $row1 = mysqli_fetch_assoc($result1);
                          do{
                            $name = $row1['room_name'];
                            $amount = $row1['rent_per_month'];
                            $row1 = mysqli_fetch_assoc($result1);
                          }while ($row1);
                          echo '<tr>';
                          echo "<td> Contract ID:</td>";
                          echo "<td style = 'color:blue;'>".$cid."</td>";
                          echo '<tr>';

                          echo '<tr>';
                          echo "<td> Room Name:</td>";
                          echo "<td style = 'color:blue;'>".$name."</td>";
                          echo '<tr>';

                          echo '<tr>';
                          echo "<td> Cost of the Room (php):</td>";
                          echo "<td style = 'color:blue;'>".number_format($amount)."</td>";
                          echo '<tr>';

                
                        
                          echo '<tr>';
                          echo "<td>Date start on:</td>";
                          echo "<td style = 'color:blue;'>".$row['start_day']."</td>";
                          echo '<tr>';


                          echo '<tr>';
                          echo "<td>Date of Agreement:</td>";
                          echo "<td style = 'color:blue;'>".$row['date_contract_sign']."</td>";
                          echo '<tr>';

                          echo '<tr>';
                          echo "<td>Status of the Agreement:</td>";
                          echo "<td style = 'color:blue;'>".$row['status']."</td>";
                          echo '<tr>';

                          echo '<tr>';
                          echo "<td><hr></td>";
                          echo "<td><hr></td>";
                          echo '<tr>';
                          echo "<tr>";


                          $row = mysqli_fetch_assoc($result);
                        }while ($row);

                        echo "<form action='u_contract.php' method = 'POST'>";
                        echo "<td><input class='btn btn-primary btn-user btn-lg' type='submit' name='submit1' value='Edit'></td>";
                        echo "</form>";
                        echo  "</tr>";

                      }else{
                        $sql = "SELECT * FROM contract WHERE tenant_id = '$id' AND status = 'Active'";
                        $result = mysqli_query($con, $sql);
                        $row = mysqli_fetch_assoc($result);
                        do{
                          $h_id = $row['room_id'];
                          $cid = $row['contract_id'];
                          $sql1 = "SELECT * FROM room WHERE room_id = '$h_id'";
                          $result1 = mysqli_query($con, $sql1);
                          $row1 = mysqli_fetch_assoc($result1);
                          do{
                            $name = $row1['room_name'];
                            $amount = $row1['rent_per_month'];
                            $row1 = mysqli_fetch_assoc($result1);
                          }while ($row1);

                          echo '<tr>';
                          echo "<td> Room Name:</td>";
                          echo "<td style = 'color:blue;'>".$name."</td>";
                          echo '<tr>';

                          echo '<tr>';
                          echo "<td> Cost of the Room (php):</td>";
                          echo "<td style = 'color:blue;'>".$amount."</td>";
                          echo '<tr>';


                          echo '<tr>';
                          echo "<td>Date Start on:</td>";
                          echo "<td style = 'color:blue;'>".$row['start_day']."</td>";
                          echo '<tr>';


                          echo '<tr>';
                          echo "<td>Date of Agreement:</td>";
                          echo "<td style = 'color:blue;'>".$row['date_contract_sign']."</td>";
                          echo '<tr>';

                          echo '<tr>';
                          echo "<td>Status of the Agreement:</td>";
                          echo "<td style = 'color:blue;'>".$row['status']."</td>";
                          echo '<tr>';

                          echo '<tr>';
                          echo "<td></td>";
                          echo "<td></td>";

                          echo '<tr>';

                          echo "<tr>";
                          echo "<form action='u_contract.php' method = 'POST'>";
                          echo "<td><input class='btn btn-primary btn-user btn-lg' type='submit' name='submit1' value='Edit'></td>";
                          echo "</form>";
                          echo  "</tr>";

                          $row = mysqli_fetch_assoc($result);
                        }while ($row);
                      }
                    }
                    if (isset($_POST['submit1'])) {

                      echo '<style>body{display:none;}</style>';
                      echo '<script>window.location.href = "contract_msg.php";</script>';
                      exit;

                    }


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
