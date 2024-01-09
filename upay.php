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

                    $uname = $_SESSION['username'];

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
                <h1 class="h3 mb-2 text-gray-800" align="center">Payment Information.</h1>
                <div class="card shadow mb-4">
                  <div class="card-body">
                    <div class="table-responsive">
                    <input type="text" name="search"  placeholder="search"   id="myInput" onkeyup="myFunction()" class="form-control mb-3" style="width:22%;">
                      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                          <tr>
                            <th style="display:none">Description</th>
                            <th style="font-size:15px;">Description</th>
                            
                            <th style="font-size:15px;">Sender</th>
                            <th style="font-size:15px;">Previous Reading</th>
                            <th style="font-size:15px;">Current Reading</th>
                            <th style="font-size:15px;">Electric Bill</th>
                            <th style="font-size:15px;">Water Bill</th>   
                            
                            <th style="font-size:15px;">Monthly rent</th>
                            <th style="font-size:15px;">Total</th>
                               <th style="display:none">Description</th>
                               <th style="font-size:15px;">Mode Of Payment</th>
                               <th style="font-size:15px;">DATE</th>
                                  
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
                          $totalAmountQuery = "SELECT SUM(amount) AS total_amount FROM payment WHERE tenant_id = '$id' AND status = 'CONFIRMED'";
                          $totalAmountResult = mysqli_query($con, $totalAmountQuery);
                          $totalAmountRow = mysqli_fetch_assoc($totalAmountResult);
                          $totalAmount = $totalAmountRow['total_amount'];
                          // Display the total amount
                          echo '<p>Total Amount: ' . $totalAmount . '</p>';
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
                              $electric = $row['pay_from'];
                              $sender = $row['sender'];
                              $water = $row['pay_to'];
                              $status = $row['status'];
                              $pic = $row['picture'];
                              $confirmed = $row['confirmed_date'];
                              $currentDateTime = date('Y-m-d');
                              $date=$row['date'];
											$timestamp = strtotime($date);

											// Add 3 days to the timestamp
											$newTimestamp = strtotime('+3 days', $timestamp);

											// Convert the new timestamp back to a human-readable date
											$newDate = date("Y-m-d", $newTimestamp);
                      $Date=date("Y-m-d", $timestamp);
                               
                                echo '<tr>';
                          
                                echo '<td style="display:none;">'.$id.'</td>';
                                echo '<td style="font-size:15px;">'.$desc.'</td>';
                                
                                echo '<td style="font-size:15px;">'.$sender.'</td>';
                                echo '<td style="font-size:15px;">'.$prev_reading.'</td>';
                                echo '<td style="font-size:15px;">'.$cur_reading.'</td>';
                                echo '<td style="font-size:15px;">'.$electric.'</td>';
                                echo '<td style="font-size:15px;">'.$water.'</td>';
                                
                                echo '<td style="font-size:15px;">'.$amount.'</td>';
                                echo '<td style="font-size:15px;">'.$con.'</td>';
                                echo '<td style="font-size:15px;">'.$ref.'</td>';
                                echo '<td style="font-size:15px;">'.$Date.'</td>';
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
              <form action="payment_update.php" method="POST" enctype="multipart/form-data">
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
                   <input type="text" name="reference" id="reference" class="form-control" placeholder="Mode Of Payment" required>
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

   <script type="text/javascript">


    $(document).ready(function(){



      $("body").on("click",'#openmodal',function(){
        $('form')[0].reset();
        var tr = $(this).closest("tr").find('td');
        $('#idget').val(tr.eq(0).text());
        $('#view').show();
      });


           $("body").on("click",'#closemodal',function(){
        $('#view').hide();
      });



      $("body").on("click",'#viewopen',function(){
        $('form')[0].reset();
        var tr = $(this).closest("tr").find('td');
         var pic =tr.eq(9).text();
         $('#sendername').text(tr.eq(5).text());
                  $('#datefetch').text(tr.eq(10).text());
                    $('#desc').text(tr.eq(3).text());
                            $('#con').text(tr.eq(4).text());
                               $('#amounts').text(tr.eq(7).text());
          $('#getimage').html('<img src="img/'+pic+'"  style="width:100%;height:500px;"/>');
        $('#viewing').show();
      });


      $("body").on("click",'.closeviewing',function(){

        $('#viewing').hide();
      });

      $('#myInput').keyup(function(){
  // Search text
  var text = $(this).val();
  // Hide all content class element
  $('.content').hide();

  // Search 
  $('.content .title:contains("'+text+'")').closest('.content').show();


});
    });

  </script>