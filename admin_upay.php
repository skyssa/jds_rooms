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


<?php  include 'admin_navbar.php'; ?>





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

              <!-- Begin Page Content -->
              <div class="container-fluid">
                <h1 class="h3 mb-2 text-gray-800" align="center">Payment Information.</h1>
                <div class="card shadow mb-4">
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                          <tr>
                            <th style="display:none">Description</th>
                            <th style="font-size:15px;">Description</th>
                             <th style="font-size:15px;">Consumption</th>
                            <th style="font-size:15px;">Sender</th>
                            <th style="font-size:15px;">Previous Reading</th>
                            <th style="font-size:15px;">Current Reading</th>
                            <th style="font-size:15px;">Reference Number</th>
                            <th style="font-size:15px;">Amount</th>
                            <th style="font-size:15px;">Payment For</th>
                               <th style="display:none">Description</th>
                            <th style="font-size:15px;">Status</th>
                                  <th style="display:none">Description</th>
                            <th style="font-size:15px;">Action</th>
                          
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

                          $sql = "SELECT * FROM payment WHERE tenant_id = '$id'";
                          $sql3 = "SELECT * FROM contract WHERE tenant_id = '$id' AND status = 'Active'";
                          $result = mysqli_query($con, $sql);
                          $result3 = mysqli_query($con, $sql3);
                          $row = mysqli_fetch_assoc($result);
                          $row3 = mysqli_fetch_assoc($result3);
                          $total = 0;
                          do{
                            do {
                              $cid = $row3['contract_id'];
                              $id = $row['payment_id'];
                              $prev_reading = $row['prev_reading'];
                              $cur_reading = $row['cur_reading'];
                              $ref = $row['ref_no'];
                              $amount = $row['amount'];
                                $con = $row['consumption'];
                              $desc= $row['description'];
                              $ref= $row['ref_no'];
                              $from = $row['pay_from'];
                              $sender = $row['sender'];
                              $to = $row['pay_to'];
                              $status = $row['status'];
                               $pic = $row['picture'];
                                         $confirmed = $row['confirmed_date'];
                              echo '<tr>';
                         
                              echo '<td style="display:none;">'.$id.'</td>';
                              echo '<td style="font-size:15px;">'.$desc.'</td>';
                              echo '<td style="font-size:15px;">'.$con.'</td>';
                              echo '<td style="font-size:15px;">'.$sender.'</td>';
                              echo '<td style="font-size:15px;">'.$prev_reading.'</td>';
                              echo '<td style="font-size:15px;">'.$cur_reading.'</td>';
                              echo '<td style="font-size:15px;">'.$ref.'</td>';
                              echo '<td style="font-size:15px;">'.$amount.'</td>';
                              echo '<td style="font-size:15px;">'.$from.' - '.$to.'</td>';
                              echo '<td style="display:none;">'.$pic.'</td>';
                                        echo '<td style="display:none;">'.$confirmed.'</td>';
                              if($status=='Pending'){
                                  echo '<td style="font-size:15px;color:red;">'.$status.'</td>';

                              }elseif ($status=='Pending Review') {
                              echo '<td style="font-size:15px;color:red;">'.$status.'</td>';
                              }elseif ($status=='CONFIRMED') {
                                 echo '<td style="font-size:15px;color:green;">'.$status.'</td>';
                              }else{

                              }
                                if($status=='CONFIRMED'){
                            
                              echo '<td style="font-size:15px;"><button class="btn btn-success btn-sm btn-flat" id="viewopen" data-id="'.$id.'">View</button></td>';

                                }elseif($status=='Pending'){
                                       echo '<td style="font-size:15px;"><button class="btn btn-warning btn-sm btn-flat" id="openmodal" data-id="'.$id.'">Update Payment</button></td>';
                                }else{


                                }
                              

                              echo '</tr>';
                              $total += $amount;
                              $row3 = mysqli_fetch_assoc($result3);
                            } while ($row3);
                            $row = mysqli_fetch_assoc($result);
                          }while ($row);

                          ?>

                        </tbody>
                      </table>
                      <hr>
                      <br/>

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


        <!--viewing   form-->
        <div class="modal"  id="view" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"  style="overflow:auto;">
          <div class="modal-dialog ">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">User Account</h5>
              </div>
              <form action="update_payment.php" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                 <p>Upload  Picture</p>
                 <input type="text" name="idget" id="idget" class="form-control" style="display:none;" > 
                 <div class="form-group">
                   <input type="file" name="fileToUpload" id="fileToUpload" class="form-control" required > 
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
                      <p  style="color:white;font-size:15px;text-align:center;font-size:14px;">USER ACCOUNT</p>
                    </div>
                    <p style="color:black;margin:2%;position:relative;bottom:13px;">JDS Room Rental</p>

                    <div style="background-color:blue;margin-left:2%;margin-right:2%;margin-top:2%;width:30%;">
                      <p  style="color:white;font-size:15px;text-align:center;font-size:14px;">ACCOUNT NUMBER</p>
                    </div>
                    <p style="color:black;margin:2%;position:relative;bottom:13px;">0991123131</p>


                  </div>
                </div>
                <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" id="closemodal">Close</button>
                 <input type="submit"  name="submit" value="SEND" class="btn btn-primary">
               </div>
             </div>
           </form> 



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
       <div class="row">
         <div class="col-md-6">
           <p class="p-0 m-0">SENDER NAME:</p>
           <p class="p-0 m-0" style="font-size:14px;color:blue;"><span  style="font-size:14px;" id="sendername"></span></p>
             <p  class="p-0 m-0" style="font-size:14px;">DATE:</p>
               <p class="p-0 m-0" style="font-size:14px;color:blue;"><span  style="font-size:14px;" id="datefetch"></span></p>
         </div>

   <div class="col-md-6">
                 <p class="p-0 m-0" style="font-size:14px;">DESCRIPTION:</p>
                  <p class="p-0 m-0" style="font-size:14px;color:blue;"><span  style="font-size:14px;" id="desc"></span></p>
             <p class="p-0 m-0">CONSUMPTION</p>
              <p class="p-0 m-0" style="font-size:14px;color:blue;"><span  style="font-size:14px;" id="con"></span></p>
         </div>
        <p class="p-0 m-0">----------------------------------------------------------------------</p>
        <div class="col-md-12"><p class="text-muted p-0 m-0 " style="text-align:center;">AMOUNT:PHP <span id="amounts"></span></p></div>

       </div>
       
             </div>
         



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

   </body>

   </html>

   <script type="text/javascript">


   
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
var pic =tr.eq(10).text();
$('#getimage').html('<img src="img/'+pic+'"  style="width:100%;height:500px;"/>');
$('#sender').text(tr.eq(8).text());
$('#ref').text(tr.eq(9).text());
$('#dateissue').text(tr.eq(11).text());
$('#confirmed').text(tr.eq(12).text());
$('#viewing').show();
});

$("body").on("click",'.closeviewing',function(){

$('#viewing').hide();
});


  </script>