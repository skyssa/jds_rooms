<?php
error_reporting(0);
session_start();
include "conn.php";
if (!$_SESSION['username']) {
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
                                                                          $row = mysqli_fetch_assoc($result);
                                                                          do {
                                                                            $fname = $row['fname'];
                                                                            $lname = $row['lname'];
                                                                            $full = $fname . " " . $lname;
                                                                            echo $full;

                                                                            $row = mysqli_fetch_assoc($result);
                                                                          } while ($row);
                                                                          ?></span>
                <img class="img-profile rounded-circle" src="user.png">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">

                <?php include "includes/Alertlogout.php" ?>
            </li>

          </ul>

        </nav>


        <?php
        include 'conn.php';
        $ids = $_COOKIE['manager_id'];
        $stats="CONFIRMED";
        $update = "select * from  contract where  tenant_id='$ids'";
        $query = mysqli_query($con, $update);
        $querys = mysqli_fetch_assoc($query);
        $stat="Pending";



        if (mysqli_num_rows($query) > 0) {
          if($querys['status']===$stats){
        ?>

          <p style="font-size:30px;color:green;text-align:center"><br><br><br><br>YOU HAVE A ROOM NOW!<br><br>THANK YOU!</p>

        <?php
          }elseif($querys['status']===$stat){
            ?>
    
              <p style="font-size:30px;color:green;text-align:center"><br><br><br><br>YOUR PAYMENT IS PENDING AT THE MOMENT<br><br>PLEASE WAIT FOR CONFIRMATION!</p>
    
            <?php
              }
        } 
        else{
        ?>


          <!-- Begin Page Content -->
          <div class="container">
            <h1 class="h3 mb-2 text-gray-800" align="center">Your Contract</h1>

            <div class="card shadow">
              <div class="card-body">

                <div class="row align-self-center" style="text-align:center;">

                  <form action="tenant_contract.php" method="POST">

                    <div class="row">
                      <div class="form-group row">
                        <p id="values">
                        </p>
                      </div>

                      <div class="col-md-3">

                        <span style="margin-right:5%">Select Room:</span>
                        <div class="form-group">
                          <select class="form-control" id="roomget" style="margin-left:10%;">
                            <?php
                            include 'conn.php';
                            $queryroom = "select * from  room where status='Available'";
                            $mysqli = mysqli_query($con, $queryroom);
                            while ($rows = mysqli_fetch_assoc($mysqli)) {
                            ?>
                              <option></option>
                              <option value="<?php echo $rows['rent_per_month'] ?>" id="idget" data-id="<?php echo $rows['room_id'] ?>" id="get"><?php echo $rows['room_name'] ?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>


                      <div class="col-md-3">
                        <div class="form-group ">
                          Rent per month<br />
                          <input type="text" name="price" id="price" class="form-control" style="margin-left:3%;">
                        </div>
                      </div>
                      <input type="text" name="room" id="room" style="display:none;">
                      <div class="col-md-3">
                        <div class="form-group">
                          Date Start<br/>
                          <input type="date" name="date" id="date" class="form-control" style="margin-left:3%;">
                        </div>
                      </div>
                      <hr>
                      <p style="margin-left:10%;">Please read the contract <span style="color:red;">CAREFULLY</span> and check "I agree" if you agree with the TERMS AND CONDITIONS stated.</p><br />
                      <div class="form-group " style="margin-left:4%;">
                        <iframe src="room_contract.pdf" width="1000px" height="400px" style="border: none;"></iframe>
                      </div>
                      <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                          <input type="checkbox" name="contract" value="Occupied" required>I agree&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        </div>
                      </div>

                    </div>
                    <div class="form-group">
                      <input type="submit" class="btn btn-primary form-control" id="showconfirm" onclick="showConfirmation()">
                    </div>


                  </form>
                  <!-- Add the following HTML structure for the modal -->
                  <div class="modal fade" id="showconfirm" tabindex="-1" role="dialog" aria-labelledby="confirmationModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="confirmationModalLabel">Contract Signed!</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <p>Thank you for agreeing to the TERMS AND CONDITIONS. Your contract has been successfully signed.</p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
              </div>


            </div>
          </div>

        <?php } ?>


      </div>


    </div>
    <!-- /.container-fluid -->

  </div>
  <!-- End of Main Content -->



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
    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
    }
  </script>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>
  <?php include "includes/Alertfooter.php" ?>
</body>

</html>

<script>
  function showConfirmation() {
    
    Swal.fire({
      title: 'Request Pending!',
      text: 'Thank you for agreeing to the TERMS AND CONDITIONS. Make an Advance Payment First before proceeding.',
      icon: 'success',
      showConfirmButton: false,
      timer: 15000,
    }).then(() => {
      document.forms[0].submit();
      location.href = 'upay.php';
    });
  }
</script>



<script type="text/javascript">
  $("#durations").on('change', function() {
    $('#terms option[value = 2]').attr('disabled', this.value == 3);
    $('#terms option[value = 4]').attr('disabled', this.value == 3);
    $('#terms option[value = 4]').attr('disabled', this.value == 6);

  });
</script>
<script>
  $(document).ready(function() {
    $('input:checkbox').click(function() {
      $('input:checkbox').not(this).prop('checked', false);
    });
    $('#roomget').on('change', function() {
      var get = $("#roomget option:selected").attr('data-id');
      $('#room').val(get);

      var gets = $(this).val();
      $('#price').val(gets);


    });

  });
</script>