<?php
error_reporting(0);
session_start();
include "conn.php";
if (!($_SESSION['username'] == "Admin")) {
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

<style type="text/css">
  th {
    font-size: 15px;
    padding: 0;
    margin: 0;
  }

  td {
    font-size: 15px;

  }

  tr {
    font-size: 15px;
    padding: 0;
    margin: 0;
  }
</style>


<style type="text/css">
  .sidebar-dark #sidebarToggle {
    background-color: hsl(0deg 0% 13%);
  }

  .sidebar-dark .nav-item .nav-link[data-toggle=collapse]::after {
    color: black;
    /* Notice we changed from white to the yellow */
  }
</style>

<body id="page-top" style="background-color:pink;">


  <?php include 'admin_navbar.php'; ?>





  <ul class="navbar-nav ml-auto">


    <div class="topbar-divider d-none d-sm-block"></div>

    <!-- Nav Item - User Information -->
    <li class="nav-item dropdown no-arrow">
      <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php
          $uname = $_SESSION['username'];
          echo "<b><b>" . $uname . "</b></b>";
          ?></span>
        <img class="img-profile rounded-circle" src="user.png">
      </a>
      <!-- Dropdown - User Information -->
      <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">

        <?php include "includes/Alertlogout.php" ?>

    </li>

  </ul>

  </nav>
  <!-- End of Topbar -->

  <!-- Begin Page Content -->
  <div class="container-fluid">
    <div class="card shadow mb-4">

      <div class="card-body">
        <h1 class="h3 mb-2 text-gray-800" align="center">Payments</h1>
        <div class="table-responsive">
          <button class="btn  btn-danger btn-flat btn-sm mb-3" id="openmodal">ADD BILLING PAYMENT</button>
          <div class="form-group">
            <input type="text" name="search" placeholder="Search" id="myInput" class="form-control" width="100%" cellspacing="0">
          </div>
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="padding:0; margin:0;">
            <thead>
              <tr>
                <th style="font-size:15px;">Name</th>
                <th style="font-size:15px;">Description</th>
                <th style="font-size:15px;">Sender</th>
                <th style="font-size:15px;">Previous Reading</th>
                <th style="font-size:15px;">Current Reading</th>
                <th style="font-size:15px;">Mode Of Payment</th>
                <th style="font-size:15px;">Amount Paid</th>
                <th style="font-size:15px;">Date Start</th>
                <th style="font-size:15px;">Due Date</th>
                <th style="font-size:15px;">Date</th>
                <th style="display:none">1</th>
                <th style="display:none">2</th>
                <th style="display:none">3</th>
                <th style="display:none">4</th>
                <th style="display:none">5</th>
                <th style="font-size:15px;">Status</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php

              $sql = "SELECT * FROM payment";
              $result = mysqli_query($con, $sql);
              $row = mysqli_fetch_assoc($result);

              do {
                $t_id = $row['tenant_id'];
                $query = "SELECT * FROM tenant WHERE tenant_id = '$t_id'";
                $result1 = mysqli_query($con, $query);
                $row1 = mysqli_fetch_assoc($result1);
                do {
                  $fname = $row1['fname'];
                  $lname = $row1['lname'];
                  $uname = $row1['u_name'];
                  $row1 = mysqli_fetch_assoc($result1);
                } while ($row1);
                $id = $row['payment_id'];
                $id2 =$row['tenant_id'];
                $desc = $row['description'];
                $sender = $row['sender'];
                $prev_reading = $row['prev_reading'];
                $cur_reading = $row['cur_reading'];
                $status = $row['status'];
                $amount = $row['amount'];
                $from = $row['pay_from'];
                $to = $row['pay_to'];
                $date = $row['date'];
                $sender = $row['sender'];
                $ref = $row['ref_no'];
                $pic = $row['picture'];
                $date_send = $row['date_send'];

                $confirmed = $row['confirmed_date'];
                echo '<tr>';
                echo '<td>' . $fname . ' ' . $lname . '<br/>(' . $uname . ')</td>';

                echo '<td>' . $desc . '</td>';
                echo '<td>' . $sender . '</td>';
                echo '<td>' . $prev_reading . '</td>';
                echo '<td>' . $cur_reading . '</td>';
                echo '<td>' . $ref . '</td>';
                echo '<td>' . number_format($amount) . '</td>';
                echo '<td>' . $from . '</td>';
                echo '<td>' . $to . '</td>';
                echo '<td>' . $date . '</td>';


                echo '<td style="display:none" >' . $pic . '</td>';
                echo '<td style="display:none" >' . $date_send . '</td>';
                echo '<td style="display:none" >' . $confirmed . '</td>';
                echo '<td  >' . $status . '</td>';

                if ($status == 'Pending Review') {
                  echo '<td><button class="btn-sm btn btn-flat btn-primary " id="viewopen">View</button><button class="btn-sm btn btn-flat btn-success m-1"><a href="confirmed_billing.php?id=' . $id . ' &id2=' . $id2 . '" style="color:white;">Confirmed</a></button> <button class="btn-sm btn btn-flat btn-danger m-1"><a href="cancel_billing.php?id=' . $id . '" style="color:white;">Cancel</a></button></td>';
                } elseif ($status == 'CONFIRMED') {

                  echo '<td><button class="btn-sm btn btn-flat btn-primary" id="viewopen">View</button></td>';
                } else {
                }

                echo '</tr>';
                $row = mysqli_fetch_assoc($result);
              } while ($row);
              ?>

            </tbody>
          </table>

          <hr>
          <br />
          <table class="table table-borderless" id="dataTable" width="100%" cellspacing="0">
            <tbody>
              <?php
              $sql = "SELECT SUM(amount) FROM payment";
              $query = mysqli_query($con, $sql);
              $res = mysqli_fetch_assoc($query);

              do {
                $total = $res['SUM(amount)'];
                $res = mysqli_fetch_assoc($query);
              } while ($res);

              echo '<tr>';
              echo '<td><b><b>TOTAL AMOUNT: </b></b></td>';
              echo "<td><b><b><span style = 'color:green;'>php. " . number_format($total) . '</b></b></td>';
              echo '</tr>';
              ?>

            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>
  <!-- End of Main Content -->

  <!-- Footer -->

  <!-- End of Footer -->

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
          <a class="btn btn-success" href="logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>



  <div class="modal " id="viewmodal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg " role="document">
      <div class="modal-content" style="border-radius:10px;height:600px; ">
        <div class="modal-header " style="border:0;">
          <button type="button" class="close  closetenant" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>

          </button>
        </div>

        <div class="text-modal">
          <p class="mr-3" style="font-size:20px;color:black;padding-left:1px;text-align:center;top:0;">Billing</p>
        </div>
        <div class="modal-body" style="height:300px;overflow:auto;">

          <?php include 'conn.php';
          $query = "SELECT * FROM `tenant`  ";
          $mysqlis = mysqli_query($con, $query);
          $row = mysqli_fetch_array($mysqlis);
          ?>
          <div>
          </div>
          <div style="height:300px;overflow:auto;width:100%;">
            <div class="form-group">
              <input type="text" name="search" placeholder="search" id="myInput" onkeyup="myFunction()" class="form-control">
            </div>
            <table class="table">
              <thead class="thead-dark">
                <tr>
                  <th>ID</th>
                  <th>First name</th>
                  <th>Last name</th>
                  <th>Room</th>
                  <th>Room rent</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php include 'conn.php';
                // $query = "SELECT * FROM `tenant`";
                $query = "SELECT * FROM `tenant` AS TN LEFT JOIN `contract` AS CT ON TN.`tenant_id` = CT.`tenant_id`";
                $mysqlis = mysqli_query($con, $query);
              
                while($row = mysqli_fetch_array($mysqlis)){
                ?>
                  <tr class="content">
                    <td class="title"><?php echo $row['tenant_id']; ?></td>
                    <td class="title"><?php echo $row['fname']; ?></td>
                    <td class="title"><?php echo $row['lname']; ?></td>
                    <td class="title"><?php echo $row['start_day']; ?></td>
                    <td class="title"><?php echo $row['rent_per_term']; ?></td>
                    <td><button class="btn  btn-success" id="adds">add</button></td>
                  </tr>                  
                <?php 
                 
                } 
                
                ?>
              </tbody>
            </table>
          </div>
          <form action="billing_system.php" method="post">
            <div class="row">
              <div class="col-md-4">
                <input type="text" name="getid" id="getid" style="display:none;">
                <input type="text" id="roomget" name="roomget" style="display:none;">
                <div class="form-group">
                  <p style="color:black;">First Name</p>
                  <input type="text" id="nameko" name="nameko" class="form-control" disabled required>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <p style="color:black;">Last Name</p>
                  <input type="text" name="lastnm" id="lastnm" class="form-control" disabled required>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <p style="color:black;">Month</p>
                  <input type="text" name="month" id="month" class="form-control" disabled required>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <p style="color:black;">Monthly Bill</p>
                  <input type="text" name="rent" id="rent" class="form-control" disabled required>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <p style="color:black;">Electric Bill</p>
                  <input type="text" name="eletric" id="eletric" class="form-control" required>
                </div>
              </div>
              <!-- <div class="col-md-4">
                <div class="form-group">
                  <p style="color:black;">Bill</p>
                  <select class="form-control" id="category"  name="category">
                  <option>Electric bill</option>
                  <option>Water bill</option>
                    <option>Balance Payment</option>
                    <option>Advance Payment</option>
                    <option>Other Charges/Penalties</option>
                  </select>
                </div>
              </div> -->
              <!-- <div class="col-md-4">
                <div class="form-group">
                  <p style="color:black;">Due Date</p>
                  <input type="date" name="due_date" id="due_date" class="form-control" required>
                </div>
              </div> -->
              <div class="col-md-4" id="billc">
                <div class="form-group">
                  <p style="color:black;" id="ratec">Previous Reading</p>
                  <input type="number" name="prev_reading" id="prev_reading" class="form-control" oninput="myFunction()">
                </div>
              </div>


              <div class="col-md-4" id="billd">
                <div class="form-group">
                  <label for="inputGST" class="form-label" id="rated">Current Reading</label>
                  <input type="number" class="form-control" name="cur_reading" id="cur_reading" oninput="myFunction()">
                </div>
              </div>
              <div class="col-md-4" id="billa">
                <div class="form-group">
                  <p style="color:black;" id="ratea">Kwh</p>
                  <input type="number" name="inputProductPrice" id="inputProductPrice" class="form-control" oninput="myFunction()">
                </div>
              </div>


              <div class="col-md-4" id="billb">
                <div class="form-group">
                  <label for="inputGST" class="form-label" id="rateb">Per kwh</label>
                  <input type="number" class="form-control" name="inputGST" id="inputGST" value="18" oninput="myFunction()">
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <p style="color:black;">Water Bill</p>
                  <input type="text" name="water" id="water" class="form-control" required>
                </div>
              </div>
              

              <!-- <div class="col-md-4">
                <div class="form-group">
                  <label for="inputGST" class="form-label">Amount</label>
                  <input type="number" class="form-control" name="total" id="total">
                </div>
              </div> -->




            </div>
            <div class="modal-footer">
              <div class="form-group">
                <input type="submit" class="form-control btn btn-success" name="submit" id="send">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!--viewing   form-->
  <div class="modal " id="viewing" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="overflow:auto;">
    <div class="modal-dialog ">
      <div class="modal-content">
        <div class="modal-header">

          <h5 class="modal-title">Transaction Detail</h5>
          <button type="button" class="close closeviewing" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
          <div class="getimage" id="getimage">
          </div>

          <div style="display:flex;font-size:15px;">
            <p style="margin-right:10%;" ;>sender name:<span id="sender"></span></p>
            <p>Reference No:<span id="ref"></span></p>
          </div>

          <div style="display:flex;font-size:15px;">
            <p style="margin-right:10%;" ;>Date Issue:<span id="dateissue"></span></p>
            <p>Date Confirmed:<span id="confirmed"></span></p>
          </div>
        </div>




      </div>
    </div>
  </div>
  <!--viewing   form-->
  <div class="modal" id="view" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="overflow:auto;">
    <div class="modal-dialog ">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">User Account</h5>
        </div>
        <form action="payment_update.php" method="POST" enctype="multipart/form-data">
          <div class="modal-body">
            <p>Upload Picture</p>
            <input type="text" name="idget" id="idget" class="form-control" style="display:none;">
            <div class="form-group">
              <input type="file" name="fileToUpload" id="fileToUpload" class="form-control" required>
            </div>
            <div class="form-group">
              <input type="text" name="sender" id="sender" class="form-control" placeholder="Sender" required>
            </div>
            <div class="form-group">
              <input type="text" name="reference" id="reference" class="form-control" placeholder="Reference number" required>
            </div>
            <p style="color:black;">Payment Channel</p>
            <div class="form-group">
              <div style="width:100%;height:auto;border:1px solid orange;">

                <div style="width:100%;height:30px;background-color:orange;border:1px solid orange;">
                  <p style="color:white;padding:5px;padding-bottom:10px;">GCASH</p>
                </div>
                <div style="background-color:blue;margin-left:2%;margin-right:2%;margin-top:2%;width:30%;">
                  <p style="color:white;font-size:15px;text-align:center;font-size:14px;">USER ACCOUNT</p>
                </div>
                <p style="color:black;margin:2%;position:relative;bottom:13px;">JDS Room Rental</p>

                <div style="background-color:blue;margin-left:2%;margin-right:2%;margin-top:2%;width:30%;">
                  <p style="color:white;font-size:15px;text-align:center;font-size:14px;">ACCOUNT NUMBER</p>
                </div>
                <p style="color:black;margin:2%;position:relative;bottom:13px;">0991123131</p>


              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" id="closemodal">Close</button>
              <input type="submit" name="submit" value="SEND" class="btn btn-primary">
            </div>
          </div>
        </form>


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
        <?php include "includes/Alertfooter.php" ?>
</body>

</html>


<script>
  function myFunction() {
    var price = document.getElementById("inputProductPrice").value;
    var gst = document.getElementById("inputGST").value;
    var total = price * gst;
    document.getElementById("total").value = total;

  }
</script>


<script type="text/javascript">
  $(document).ready(function() {

    $('#category').change(function() {

      var get = $('#category').val();
      if (get == 'Electric bill') {
        $('#ratea').text("Kwh");
        $('#rateb').text("Per Kwh");
        $('#billa').show();
        $('#billb').show();
        $('#billc').show();
        $('#billd').show();
        $('#total').Attr('disabled', 'disabled');
      } else if (get == 'Water bill') {
        $('#billa').hide();
        $('#billb').hide();
        $('#billc').hide();
        $('#billd').hide();
        $('#total').removeAttr('disabled');
      } else if (get == 'Advance Payment') {
        $('#billa').hide();
        $('#billb').hide();
        $('#billc').hide();
        $('#billd').hide();
        $('#total').removeAttr('disabled');
      } else if (get == 'Balance Payment') {
        $('#billa').hide();
        $('#billb').hide();
        $('#billc').hide();
        $('#billd').hide();
        $('#total').removeAttr('disabled');
      } else if (get == 'Other Charges/Penalties') {
        $('#billa').hide();
        $('#billb').hide();
        $('#billc').hide();
        $('#billd').hide();
        $('#total').removeAttr('disabled');
      } else {}
    });


    $("body").on("click", '#openmodal', function() {

      $('#viewmodal').show();
    });

    $("body").on("click", '.closetenant', function() {

      $('#viewmodal').hide();
    });

    $("body").on("click", '#adds', function() {
      var tr = $(this).closest("tr").find('td');
      $('#getid').val(tr.eq(0).text());
      $('#nameko').val(tr.eq(1).text());
      $('#lastnm').val(tr.eq(2).text());
      $('#month').val(tr.eq(3).text());
      $('#rent').val(tr.eq(4).text());
      
    });

    $("body").on("click", '#viewopen', function() {
      $('form')[0].reset();
      var tr = $(this).closest("tr").find('td');
      var pic = tr.eq(10).text();
      $('#getimage').html('<img src="img/' + pic + '"  style="width:100%;height:500px;"/>');
      $('#sender').text(tr.eq(8).text());
      $('#ref').text(tr.eq(9).text());
      $('#dateissue').text(tr.eq(11).text());
      $('#confirmed').text(tr.eq(12).text());
      $('#viewing').show();
    });

    $("body").on("click", '.closeviewing', function() {

      $('#viewing').hide();
    });

  });
</script>

<script>
  function filterTable() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("dataTable");
    tr = table.getElementsByTagName("tr");

    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[0]; // Change the index to the column you want to search
      if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
      }
    }
  }

  document.getElementById("myInput").addEventListener("keyup", filterTable);
</script>