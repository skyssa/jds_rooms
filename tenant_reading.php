

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
if(!$user && $role == 'Caretaker'){
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
					<li class="nav-item">
						<a class="nav-link" href="mform_out.php">
							<i class="fas fa-fw fa-clipboard-list" style="color:black;"></i>
							<span style="color:black;">Tenant-Out form</span>
						</a>

					</li>
					<hr class="sidebar-divider">

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
									<h1 class="h3 mb-2 text-gray-800" align = "center">Billing</h1>









									<div class="card shadow mb-4">

										<button class="btn btn-primary btn-flat btn-sm" style="width:10%;margin-bottom:1%;margin-top:2%;margin-left:2%;" id="add">ADD BILLING</button>
										<div class="card-body">
											<div class="table-responsive">
												<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
													<thead>
														<tr>
															<th>ID</th>
															<th>Tenant Name</th>
															<th>Description</th>
															<th>Previous Reading</th>
															<th>Current Reading</th>
															<th>Consumption</th>
															<th>Date</th>
															<th>Action</th>

														</tr>
													</thead>
													<tbody>
														<?php
														include 'config.php';

													      $sql = "SELECT *,CONCAT(tenant.fname,'  ',tenant.lname) as fullname FROM tenant_reading_bill  inner join  tenant on  tenant.tenant_id=tenant_reading_bill.tenant_id";
                            $result = mysqli_query($con,$sql);
                            while($rows = mysqli_fetch_assoc($result)){
                            ?>
                            <tr >
                              <td><?php echo $rows['read_id']; ?></td>
                              <td><?php echo $rows['fullname']; ?></td>
															<td><?php echo $rows['description']; ?></td>
															<td><?php echo $rows['prev_reading']; ?></td>
															<td><?php echo $rows['cur_reading']; ?></td>
															<td><?php echo $rows['consumption']; ?></td>
															<td><?php echo $rows['read_date']; ?></td>
															<td><button class="btn-sm btn-flat btn-danger"><a href="tenant_delete_billing.php?id=<?php echo $rows['read_id']; ?>" style="color:white;">Delete</a></button></td>
														</tr>

<?php }?>
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


					<!-- Logout Modal-->
					<div class="modal " id="modal_add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog bg-primary modal-lg" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">Reading billing</h5>
									<button class="close" type="button" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">×</span>
									</button>
								</div>

								<div class="modal-body">


									<div class="stylish-input-group  mb-3">
										<input type="text" class="search-bar"  placeholder="Search"  id="myInput" 
										>
										<span class="input-group-addon">
											<button type="button"> <i class="fa fa-search" aria-hidden="true"></i> </button>
										</span> </div>
										<div style="height:100px;overflow:auto;">
											

											<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
												<thead>
													<tr>
														<th>ID</th>
														<th>First Name</th>
														<th>Last Name</th>
														<th>Contact No#</th>
														<th>Action</th>

													</tr>
												</thead>
												<tbody>
													<?php
													include 'config.php';

													$sql = "SELECT * FROM tenant";
													$result = mysqli_query($con,$sql);
													while($row = mysqli_fetch_assoc($result)){
														?>
														<tr class="active_chat" >
															<td class="title"><?php echo $row['tenant_id']; ?></td>
															<td class="title"><?php echo $row['fname']; ?></td>
															<td class="title"><?php echo $row['lname']; ?></td>
															<td class="title"><?php echo $row['p_no']; ?></td>
															<td><button class=" btn-flat btn-sm btn-primary mr-2" id="clicks">ADD</button>
															</tr>
														<?php }?>
													</tbody>
												</table>

											</div>


											<p class="mt-3">----------------------------------------------tenant Information--------------------------------------------</p>
											
                                         <form action="tenant_billing.php" method="post">
											<div class="row mt-3">
                                         <input type="text" name="idtenant" id="idtenant" style="display:none;">
												<div class="col-md-6 form-group">
													<label>First Name</label>
													<input type="text" name="firstname" id="fname"class="form-control" >
												</div>

												<div class="col-md-6 form-group">
													<label>Last Name</label>
													<input type="text" name="lastname"  id="lname" class="form-control" >
												</div>

												<div class="col-md-6 form-group">
													<label>Bill</label>
													<select class="form-control" name="bill">
												
														<option value="Electric bill">Electric  Bill</option>
													</select>


												</div>
												<div class="col-md-6 form-group">
													<label>Previous Reading</label>
													<input type="text" class="form-control form-control-user" name="prev_reading" value="<?php echo @$prev_reading; ?>">
												</div>

												<div class="col-md-6 form-group">
													<label>Current Reading</label>
													<input type="text" class="form-control form-control-user" name="cur_reading" value="<?php echo @$cur_reading; ?>">
												</div>
												<div class="col-md-6 form-group" name="consumptions">
													<label>Total Consumption of Electric/Number of Person per ROOM</label>
													<input type="number" name="consumptions" class="form-control" >
													
												</div>
												<div class="col-md-6 form-group">
													<label>EleBill</label>
													<select class="form-control" name="bill">
														<option value="Water bill">Water Bill</option>
													
													</select>


												</div>
												
											</div>
                                  
											<input class="btn btn-success" type="submit">
									
										</form>

										</div>



									
									</div>
								</div>
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
											<a class="btn btn-dark" href="logout.php">Logout</a>
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
							<?php include "includes/Alertfooter.php"?>								
						</body>

						</html>



						<script type="text/javascript">

							$(document).ready(function(){

								$('#myInput').keyup(function(){
                               // Search text
                               var text = $(this).val();
// Hide all content class element
$('.active_chat').hide();

// Search 
$('.active_chat .title:contains("'+text+'")').closest('.active_chat').show();


});

								$('body').on("click",'#add',function(){

									$('#modal_add').show();
								});


								$('body').on("click",'#clicks',function(){

										var tr = $(this).closest("tr").find('td');
							
							    $('#fname').val(tr.eq(1).text());
							    $('#lname').val(tr.eq(2).text());
							    $('#idtenant').val(tr.eq(0).text())
								});


								$('body').on("click",'.close',function(){
	$('#modal_add').hide();
							
								});


							});



						</script>

