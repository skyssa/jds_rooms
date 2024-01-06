
<?php

error_reporting(0);
session_start();
include "conn.php";
if(!($_SESSION['username'] == "Admin")){
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
  th{
    font-size:15px;
    padding: 0; margin: 0;
  }
  td{
    font-size:15px;

  }
  tr{
   font-size:15px;
   padding: 0; margin: 0;
 }

</style>


<style type="text/css">
.sidebar-dark #sidebarToggle {
    background-color: hsl(0deg 0% 13%);
}
  
 .sidebar-dark .nav-item .nav-link[data-toggle=collapse]::after{
    color:black;
 /* Notice we changed from white to the yellow */
}
</style>

<body id="page-top" style="background-color:pink;">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color:whitesmoke;">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="admin_home.php">

        <div class="sidebar-brand-text mx-3" style="color:black;">Rental Room Management System</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0" style="color:black;">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="admin_home.php">
          <i class="fas fa-fw fa-tachometer-alt" style="color:black;"></i>
          <span style="color:black;">Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-home fa-cog" style="color:black;"></i>
          <span style="color:black">Room</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header"  style="color:black">Details:</h6>
            <a class="collapse-item" href="room_detail.php"  style="color:black">Room Information</a>
            <a class="collapse-item" href="add_room.php"  style="color:black">Add a Room</a>
            <a class="collapse-item" href="change_cost.php"  style="color:black">Change the Cost of the<br/>Room</a>
            <a class="collapse-item" href="edit_room.php"  style="color:black">Edit Room Information</a>
          </div>
        </div>
      </li>
      <hr class="sidebar-divider">

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
          <i class="fas fa-clipboard-list"  style="color:black"></i>
          <span  style="color:black">Contract</span>
        </a>
        <div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header"  style="color:black">Details:</h6>
            <a class="collapse-item" href="contract_detail.php"  style="color:black">Contract Information</a>
            <a class="collapse-item" href="edit_contract.php"  style="color:black">Edit Contract Information<br/>(Full)</a>
            <a class="collapse-item" href="edit_contract_part.php"  style="color:black">Edit Contract Information<br/>(Part)</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->


      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour"  style="color:black">
          <i class="fas fa-user fa-cog"  style="color:black"></i>
          <span  style="color:black">Tenants</span>
        </a>
        <div id="collapseFour" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header"  style="color:black">Details:</h6>
            <a class="collapse-item" href="tenant_detail.php"  style="color:black"> Tenant Information</a>
            <a class="collapse-item" href="tenant_contact.php"  style="color:black">Tenants' Contact</a>
            <a class="collapse-item" href="admin_tenantIn.php"  style="color:black">Tenant-In Details</a>
            <a class="collapse-item" href="admin_tenantOut.php">Tenant-Out Details</a>
            <a class="collapse-item" href="edit_tenant.php"  style="color:black">Edit Tenant Information</a>
          </div>
        </div>
      </li>
      <hr class="sidebar-divider">

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
          <i class="fas fa-dollar-sign fa-cog"  style="color:black"></i>
          <span  style="color:black">Payment</span>
        </a>
        <div id="collapseFive" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header"  style="color:black">Details:</h6>
            <a class="collapse-item" href="payment_detail.php"  style="color:black">Payment Information</a>
            <a class="collapse-item" href="edit_pay.php"  style="color:black">Edit Payment</a>
          </div>
        </div>
      </li>
      <hr class="sidebar-divider">

      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="form_out.php">
          <i class="fas fa-fw fa-clipboard-list"  style="color:black"></i>
          <span  style="color:black"> Tenant-Out form</span>
        </a>

      </li>

      <hr class="sidebar-divider">

      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="send-sms.php">
          <i class="fas fa-fw fa-comments"  style="color:black"></i>
          <span  style="color:black">Messaging</span></a>
      </li>
      <hr class="sidebar-divider">




      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link" href="a_change.php">
          <i class="fas fa-fw fa-exchange-alt"  style="color:black"></i>
          <span  style="color:black">Change Password</span>
        </a>

      </li>
      <hr class="sidebar-divider">
      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link" href="a_register.php">
          <i class="fas fa-fw fa-user"  style="color:black"></i>
          <span  style="color:black">Register</span>
        </a>

      </li>

      <!-- Nav Item - Tables -->

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content" style="background-color:#EEE9E5;">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3" style="color:black;">
            <i class="fa fa-bars" style="color:black;"></i>
          </button>


              <ul class="navbar-nav ml-auto">


                <div class="topbar-divider d-none d-sm-block"></div>

                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                  <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php
                    $uname = $_SESSION['username'];
                    echo "<b><b>".$uname."</b></b>";

                    ?></span>
                    <img class="img-profile rounded-circle" src="user.png">
                  </a>
                  <!-- Dropdown - User Information -->
                  <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">

                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                      <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                      Logout
                    </a>

                  </li>

                </ul>

              </nav>
              <!-- End of Topbar -->

              <!-- Begin Page Content -->
              <div class="container-fluid">
                <h1 class="h3 mb-2 text-gray-800" align = "center">Payments</h1>

                <div class="card shadow mb-4">

                  <div class="card-body">
                    <div class="table-responsive">
                      <button class="btn  btn-danger btn-flat btn-sm mb-3" id="openmodal">ADD BILLING PAYMENT</button>
                      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="padding:0; margin:0;">
                        <thead>
                          <tr>
                            <th>Image</th>
                            <th>Description</th>
                            <th>Amount</th>
                            <th>position of image</th>
                            <th>To</th>
                            <th>Date</th>
                            <th style="display:none" >1</th>
                            <th style="display:none" >2</th>
                            <th style="display:none" >3</th>
                            <th style="display:none" >4</th>
                            <th style="display:none" >5</th>
                            <th>Status</th>
                            <th></th>
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
                              $uname = $row1['u_name'];
                              $row1 = mysqli_fetch_assoc($result1);
                            }while ($row1);
                            $id= $row['payment_id'];
                            $desc = $row['description'];
                            $status= $row['status'];
                            $amount = $row['amount'];
                            $from = $row['pay_from'];
                            $to = $row['pay_to'];
                            $date = $row['date'];
                            $sender = $row['sender'];
                            $ref= $row['reference_no'];
                            $pic = $row['picture'];
                            $date_send = $row['date_send'];

                            $confirmed = $row['confirmed_date'];
                            echo '<tr>';
                            echo '<td>'.$fname.' '.$lname.'<br/>('.$uname.')</td>';
                            echo '<td>'.$desc.'</td>';
                            echo '<td>'.number_format($amount).'</td>';
                            echo '<td>'.$from.'</td>';
                            echo '<td>'.$to.'</td>';
                            echo '<td>'.$date.'</td>';
                            echo '<td style="display:none" >'.$sender.'</td>';
                            echo '<td style="display:none" >'.$ref.'</td>';
                            echo '<td style="display:none" >'.$pic.'</td>';
                            echo '<td style="display:none" >'.$date_send.'</td>';
                            echo '<td style="display:none" >'.$confirmed.'</td>';
                            echo '<td  >'.$status.'</td>';

                            if($status=='Pending Review'){
                             echo '<td><button class="btn-sm btn btn-flat btn-primary " id="viewopen">View</button><button class="btn-sm btn btn-flat btn-success m-1"><a href="confirmed_billing.php?id='.$id.'" style="color:white;">Confirmed</a></button> <button class="btn-sm btn btn-flat btn-danger m-1"><a href="cancel_billing.php?id='.$id.'" style="color:white;">Cancel</a></button></td>';

                           }elseif ($status=='CONFIRMED') {

                             echo '<td><button class="btn-sm btn btn-flat btn-primary" id="viewopen">View</button></td>';
                           }else{

                           }

                           echo '</tr>';
                           $row = mysqli_fetch_assoc($result);
                         }while ($row);
                         ?>

                       </tbody>
                     </table>

                     <hr>
                     <br/>
                     <table class="table table-borderless" id="dataTable" width="100%" cellspacing="0">
                      <tbody>
                        <?php
                        $sql = "SELECT SUM(amount) FROM payment";
                        $query = mysqli_query($con,$sql);
                        $res = mysqli_fetch_assoc($query);

                        do {
                          $total = $res['SUM(amount)'];
                          $res = mysqli_fetch_assoc($query);
                        } while ($res);

                        echo '<tr>';
                        echo '<td><b><b>TOTAL INCOME</b></b></td>';
                        echo "<td><b><b><span style = 'color:green;'>php. ".number_format($total).'</b></b></td>';
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
            <footer class="sticky-footer bg-white">
              <div class="container my-auto">
                <div class="copyright text-center my-auto">
                </div>
              </div>
            </footer>
            <!-- End of Footer -->
          </div>

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
              <a class="btn btn-success" href="logout.php">Logout</a>
            </div>
          </div>
        </div>
      </div>



      <div class="modal " id="viewmodal" tabindex="-1" role="dialog" aria-hidden="true" >
        <div class="modal-dialog modal-lg " role="document">
          <div class="modal-content" style="border-radius:10px;height:600px; ">
            <div class="modal-header " style="border:0;">
              <button type="button" class="close  closetenant"  data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>

              </button>
            </div>

            <div class="text-modal">
              <p class="mr-3" style="font-size:20px;color:black;padding-left:1px;text-align:center;top:0;">Billing</p>
            </div>
            <div class="modal-body" style="height:300px;overflow:auto;">

             <?php include 'conn.php';
             $query="SELECT * FROM `tenant`  ";
             $mysqlis=mysqli_query($con,$query);
             $row=mysqli_fetch_array($mysqlis);
             ?>
             <div>
             </div>
             <div   style="height:300px;overflow:auto;width:100%;">
              <div class="form-group">
                <input type="text" name="search"  placeholder="search"   id="myInput" onkeyup="myFunction()" class="form-control">
              </div>
              <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th >ID</th>
                    <th >First name</th>
                    <th >Last name</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody >
                 <?php include 'conn.php';
                 $query="SELECT * FROM `tenant`  ";
                 $mysqlis=mysqli_query($con,$query);
                 while( $row=mysqli_fetch_array($mysqlis)){
                   ?>
                   <tr class="content">
                    <td class="title"><?php echo $row['tenant_id'];?></td>
                    <td class="title"><?php echo $row['fname'];?></td>
                    <td class="title"><?php echo $row['lname'];?></td>
                    <td><button class="btn  btn-success"  id="adds">add</button></td>
                  </tr>
                <?php }?>
              </tbody>
            </table>
          </div>
          <form  action="billing_system.php" method="post" >
            <div class="row"> 
              <div class="col-md-4">
                <input type="text" name="getid" id="getid" style="display:none;">
                <input type="text"  id="roomget" name="roomget" style="display:none;">
                <div class="form-group">
                  <p style="color:black;">First Name</p>
                  <input type="text" id="nameko" name="nameko" class="form-control" disabled  required>
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
                  <p style="color:black;">Bill</p>
                  <select class="form-control" id="category"  name="category">
                    <option>Monthly Rent</option>
                    <option>Water bill</option>
                    <option>Electric bill</option>

                  </select>
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <p style="color:black;">Date Start</p>
                  <input type="date" name="date_start" id="date_start" class="form-control" required>
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <p style="color:black;">Due Date</p>
                  <input type="date" name="due_date" id="due_date" class="form-control" required>
                </div>
              </div>

            <div class="col-md-4" id="billa">
                <div class="form-group">
                  <p style="color:black;" id="ratea">Kwh</p>
                  <input type="number" name="inputProductPrice" id="inputProductPrice" class="form-control"  oninput="myFunction()">
                </div>
              </div>


              <div class="col-md-4" id="billb">
               <div class="form-group">
                <label for="inputGST" class="form-label" id="rateb">Per kwh</label>
                <input type="number" class="form-control" name="inputGST" id="inputGST"  value="10" oninput="myFunction()">
              </div>
            </div>

                 <div class="col-md-4"s>
               <div class="form-group" >
                <label for="inputGST" class="form-label">Amount</label>
                <input type="number" class="form-control" name="total" id="total" >
              </div>
            </div>
           

              

          </div>
          <div class="modal-footer">
            <div class="form-group">
              <input type="submit" class="form-control btn btn-success"  name="submit" id="send" >
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!--viewing   form-->
<div class="modal "  id="viewing" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"  style="overflow:auto;">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header">

        <h5 class="modal-title">Transaction Detail</h5>
        <button type="button" class="close closeviewing"  aria-label="Close" >
          <span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
          <div class="getimage" id="getimage" >
          </div>

          <div style="display:flex;font-size:15px;">
            <p style="margin-right:10%;";>sender name:<span id="sender"></span></p>
            <p>Reference No:<span id="ref"></span></p>
          </div>

          <div style="display:flex;font-size:15px;">
            <p style="margin-right:10%;";>Date Issue:<span id="dateissue"></span></p>
            <p>Date Confirmed:<span id="confirmed"></span></p>
          </div>
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

  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>

</body>

</html>


<script >
  function myFunction() {
    var price = document.getElementById("inputProductPrice").value;
    var gst = document.getElementById("inputGST").value;

    var total = price*gst;
    document.getElementById("total").value = total;

  }
</script>


<script type="text/javascript">
  $(document).ready(function(){

 $('#category').change(function(){

  var get=$('#category').val();
if(get=='Electric bill'){
  $('#ratea').text("Kwh");
$('#rateb').text("Per Kwh");
$('#billa').show();
$('#billb').show();
$('#total').Attr('disabled','disabled');
}else if(get=='Water bill'){
$('#ratea').text("Cubic");
$('#rateb').text("Per Cubic");
$('#billa').show();
$('#billb').show();
$('#total').Attr('disabled','disabled');

}else if(get=='Monthly Rent'){
$('#billa').hide();
$('#billb').hide();
$('#total').removeAttr('disabled');

}else{
}
 });


   $("body").on("click",'#openmodal',function(){

    $('#viewmodal').show();
  });

   $("body").on("click",'.closetenant',function(){

    $('#viewmodal').hide();
  });

   $("body").on("click",'#adds',function(){
    var tr = $(this).closest("tr").find('td');
    $('#getid').val(tr.eq(0).text());
    $('#nameko').val(tr.eq(1).text());
    $('#lastnm').val(tr.eq(2).text());

  });

   $("body").on("click",'#viewopen',function(){
    $('form')[0].reset();
    var tr = $(this).closest("tr").find('td');
    var pic =tr.eq(8).text();
    $('#getimage').html('<img src="img/'+pic+'"  style="width:100%;height:500px;"/>');
    $('#sender').text(tr.eq(6).text());
    $('#ref').text(tr.eq(7).text());
    $('#dateissue').text(tr.eq(9).text());
    $('#confirmed').text(tr.eq(10).text());
    $('#viewing').show();
  });

   $("body").on("click",'.closeviewing',function(){

    $('#viewing').hide();
  });

 });


</script>


