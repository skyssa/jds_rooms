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
if (!$user && $role == 'Caretaker') {
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
			<!-- <hr class="sidebar-divider"> -->


			<!-- Nav Item - Charts -->
			<!-- <li class="nav-item">
				<a class="nav-link" href="mform_out.php">
					<i class="fas fa-fw fa-clipboard-list" style="color:black;"></i>
					<span style="color:black;">Tenant-Out form</span>
				</a>

			</li> -->
			<hr class="sidebar-divider">

			<li class="nav-item">

				<a class="nav-link" href="manager_ch_support.php">
					<i class="fas fa-fw fa-comments" style="color:black;"></i>
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
							<button class="btn btn-primary btn-flat btn-sm mb-3"  id="add">ADD BILLING</button>
								<!-- <button class="btn  btn-danger btn-flat btn-sm mb-3" id="openmodal">TOTAL BILLING PAYMENT</button> -->
								
								<div class="form-group">
									<input type="text" name="search" placeholder="Search" id="myInput" class="form-control" width="100%" cellspacing="0">
								</div>
								<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="padding:0; margin:0;">
									<thead>
										<tr>
											<th style="font-size:15px;">Name</th>
											<th style="font-size:15px;">Description</th>
											<th style="font-size:15px;">Previous Reading</th>
											<th style="font-size:15px;">Current Reading</th>
											<th style="font-size:15px;">Electric bill</th>
											<th style="font-size:15px;">Water Bill</th>
											<th style="font-size:15px;">Room Rent</th>
											<th style="font-size:15px;">Total</th>
											<th style="font-size:15px;">Date</th>
											<th style="font-size:15px;">Due Date</th>
											<th style="font-size:15px;">Mode Of Payment</th>
											<th style="font-size:15px;">Sender</th>
											
											<th style="display:none">1</th>
											<th style="display:none">2</th>
											<th style="display:none">3</th>
											<th style="display:none">4</th>
											<th style="display:none">5</th>
											<th style="font-size:15px;">Status</th>
											<!-- <th></th> -->
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
											$electric=$row['pay_from'];
											$water=$row['pay_to'];
											$confirmed = $row['confirmed_date'];
											$total = $row['consumption'];
											$date=$row['date'];
											$timestamp = strtotime($date);

											// Add 3 days to the timestamp
											$newTimestamp = strtotime('+3 days', $timestamp);

											// Convert the new timestamp back to a human-readable date
											$newDate = date("Y-m-d", $newTimestamp);
											$Date=date("Y-m-d", $timestamp);
											
											echo '<tr>';
											echo '<td>' . $fname . ' ' . $lname . '<br/>(' . $uname . ')</td>';
											echo '<td>' . $desc . '</td>';
											echo '<td>' . $prev_reading . '</td>';
											echo '<td>' . $cur_reading . '</td>';
											echo '<td>' . $electric . '</td>';
											echo '<td>' . $water . '</td>';
											echo '<td>' . number_format($amount) . '</td>';
											echo '<td>' . $total . '</td>';
											echo '<td>' . $Date . '</td>';
											echo '<td>'.$newDate.'</td>';
											echo '<td>' . $ref . '</td>';
											echo '<td>' . $sender . '</td>';
											
											echo '<td style="display:none" >' . $pic . '</td>';
											echo '<td style="display:none" >' . $date_send . '</td>';
											echo '<td style="display:none" >' . $confirmed . '</td>';
											echo '<td  >' . $status . '</td>';

											// if ($status == 'Pending Review') {
											//   echo '<td><button class="btn-sm btn btn-flat btn-primary " id="viewopen">View</button><button class="btn-sm btn btn-flat btn-success m-1"><a href="confirmed_billing.php?id=' . $id . '" style="color:white;">Confirmed</a></button> <button class="btn-sm btn btn-flat btn-danger m-1"><a href="cancel_billing.php?id=' . $id . '" style="color:white;">Cancel</a></button></td>';
											// } elseif ($status == 'CONFIRMED') {

											//   echo '<td><button class="btn-sm btn btn-flat btn-primary" id="viewopen">View</button></td>';
											// } else {
											// }

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
												<th>Date</th>
												<th>Room rent</th>
												<th>Previous Reading</th>
												<th>Current Reading</th>
												<th>Water Bill</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<?php include 'conn.php';
											// $query = "SELECT * FROM `tenant`";
											$query = "SELECT * FROM `tenant` LEFT JOIN `contract` ON `tenant`.`tenant_id` = `contract`.`tenant_id` LEFT JOIN `tenant_reading_bill` AS TRB  ON `tenant`.`tenant_id` = TRB.tenant_id";
											$mysqlis = mysqli_query($con, $query);

											while ($row = mysqli_fetch_array($mysqlis)) {
											?>
												<tr class="content">
													<td class="title"><?php echo $row['tenant_id']; ?></td>
													<td class="title"><?php echo $row['fname']; ?></td>
													<td class="title"><?php echo $row['lname']; ?></td>
													<td class="title"><?php echo $row['start_day']; ?></td>
													<td class="title"><?php echo $row['rent_per_term']; ?></td>
													<td class="title"><?php echo $row['prev_reading']; ?></td>
													<td class="title"><?php echo $row['cur_reading']; ?></td>
													<td class="title"><?php echo $row['water_bill']; ?></td>
													<td><button class="btn btn-success" id="adds">add</button></td>
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
												<input type="text" id="nameko" name="nameko" class="form-control" disabled required >
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
												<p style="color:black;">Date</p>
												<input type="text" name="date" id="date" class="form-control" >
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<p style="color:black;">Room rent</p>
												<input type="text" name="rent" id="rent" class="form-control" >
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<p style="color:black;">Electric Bill</p>
												<input type="text" name="eletric" id="eletric" class="form-control" required>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<p style="color:black;">Water Bill</p>
												<input type="text" name="water" id="water" class="form-control" >
											</div>
										</div>
										<!-- <div class="col-md-4" id="billc">
											<div class="form-group">
												<p style="color:black;" id="ratec">Previous Reading</p>
												<input type="number" name="prev_reading" id="prev_reading" class="form-control" disabled oninput="myFunction()" value="<?php echo @$prev_reading; ?>">
											</div>
										</div> -->
										<div class="col-md-4">
											<div class="form-group">
												<p style="color:black;">Previous Reading</p>
												<input type="text" name="prev_reading" id="prev_reading" class="form-control" >
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<p style="color:black;">Current Reading</p>
												<input type="text" name="cur_reading" id="cur_reading" class="form-control" >
											</div>
										</div>
										<!-- <div class="col-md-4" id="billd">
											<div class="form-group">
												<label for="inputGST" class="form-label" id="rated">Current Reading</label>
												<input type="number" class="form-control" name="cur_reading" id="cur_reading" disabled oninput="myFunction()" value="<?php echo @$cur_reading; ?>">
											</div>
										</div> -->
										
										<!-- <div class="col-md-4" id="billa">
											<div class="form-group">
												<p style="color:black;" id="ratea">Kwh</p>
												<input type="number" name="inputProductPrice" id="inputProductPrice" class="form-control" disabled oninput="myFunction()" value="<?php echo @$inputProductPrice; ?>">
											</div>
										</div> -->
										<div class="col-md-4">
											<div class="form-group">
												<p style="color:black;">kwh</p>
												<input type="text" name="inputProductPrice" id="inputProductPrice" class="form-control" >
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<p style="color:black;">Per kwh</p>
												<input type="text" name="inputGST" id="inputGST" class="form-control" value="18">
											</div>
										</div>

										<!-- <div class="col-md-4" id="billb">
											<div class="form-group">
												<label for="inputGST" class="form-label" id="rateb">Per kwh</label>
												<input type="number" class="form-control" name="inputGST" id="inputGST" value="18" disabled oninput="myFunction()" value="<?php echo @$inputGST; ?>">
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
				<!-- <div class="container-fluid">
					<h1 class="h3 mb-2 text-gray-800" align="center">Billing</h1>
					<div class="card shadow mb-4">

						<button class="btn btn-primary btn-flat btn-sm" style="width:10%;margin-bottom:1%;margin-top:2%;margin-left:2%;" id="add">ADD BILLING</button>
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
									<thead>
										<tr>
											<th>ID</th>
											<th>Tenant Name</th>
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
										$result = mysqli_query($con, $sql);
										while ($rows = mysqli_fetch_assoc($result)) {
										?>
											<tr>
												<td><?php echo $rows['read_id']; ?></td>
												<td><?php echo $rows['fullname']; ?></td>
												<td><?php echo $rows['prev_reading']; ?></td>
												<td><?php echo $rows['cur_reading']; ?></td>
												<td><?php echo $rows['consumption']; ?></td>
												<td><?php echo $rows['read_date']; ?></td>
												<td><button class="btn-sm btn-flat btn-danger"><a href="tenant_delete_billing.php?id=<?php echo $rows['read_id']; ?>" style="color:white;">Delete</a></button></td>
											</tr>

										<?php } ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>


				</div> -->
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
						<input type="text" class="search-bar" placeholder="Search" id="myInput">
						<span class="input-group-addon">
							<button type="button"> <i class="fa fa-search" aria-hidden="true"></i> </button>
						</span>
					</div>
					<div style="height:100px;overflow:auto;">


						<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
							<thead>
								<tr>
									<th>ID</th>
									<th>First Name</th>
									<th>Last Name</th>
									<th>Date</th>
									<th>rent</th>
									<th>Action</th>

								</tr>
							</thead>
							<tbody>
								<?php
								include 'config.php';

								$sql = "SELECT * FROM `tenant` as t JOIN `contract` as c ON t.`tenant_id` = c.`tenant_id`";
								$result = mysqli_query($con, $sql);
								while ($row = mysqli_fetch_assoc($result)) {
								?>
									<tr class="active_chat">
										<td class="title"><?php echo $row['tenant_id']; ?></td>
										<td class="title"><?php echo $row['fname']; ?></td>
										<td class="title"><?php echo $row['lname']; ?></td>
										<td class="title"><?php echo $row['start_day']; ?></td>
										<td class="title"><?php echo $row['rent_per_term']; ?></td>
										<td><button class=" btn-flat btn-sm btn-primary mr-2" id="clicks">ADD</button>
									</tr>
								<?php } ?>
							</tbody>
						</table>

					</div>


					<p class="mt-3">----------------------------------------------Tenant Information--------------------------------------------</p>

					<form action="tenant_billing.php" method="post">
						<div class="row mt-3">
							<input type="text" name="idtenant" id="idtenant" style="display:none;">
							<div class="col-md-6 form-group">
								<label>First Name</label>
								<input type="text" name="firstname" id="fname" class="form-control">
							</div>

							<div class="col-md-6 form-group">
								<label>Last Name</label>
								<input type="text" name="lastname" id="lname" class="form-control">
							</div>
							<div class="col-md-6 form-group">
								<label>DATE</label>
								<input type="text" id="monthlydate" name="monthlydate" class="form-control">
							</div>
							<div class="col-md-6 form-group">
								<label>Rent this month</label>
								<input type="text" id="monthlyrent" name="monthlyrent" class="form-control">
							</div>

							<div class="col-md-6 form-group">
								<label>Electric Bill</label>
								<input type="text" name="bill" value="Electric bill" placeholder="Electric Bill" class="form-control" disabled>
								<!-- <select class="form-control" name="bill">
									<option value="Electric bill">Electric  Bill</option>
								</select> -->
							</div>

							<div class="col-md-6 form-group">
								<label>Previous Reading</label>
								<input type="text" class="form-control form-control-user" name="prev_reading">
							</div>

							<div class="col-md-6 form-group">
								<label>Current Reading</label>
								<input type="text" class="form-control form-control-user" name="cur_reading">
							</div>

							<div class="col-md-6 form-group" name="consumptions">
								<label>Total Consumption of Electric</label>
								<input type="text" name="consumptions" class="form-control" placeholder="kwh" disabled>
							</div>

							<div class="col-md-6 form-group">
								<label>Water Bill</label>
								<input type="text" name="waterbill" class="form-control" value="100">
							</div>

							<div class="col-md-6 form-group">
								<label>Person</label>
								<input type="text" name="pperson" id="pperson" class="form-control">
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
	<?php include "includes/Alertfooter.php" ?>
</body>

</html>


<script>
	function myFunction() {
		getTotalReading();
		var price = document.getElementById("inputProductPrice").value;
		var gst = document.getElementById("inputGST").value;
		var total = price * gst;
		document.getElementById("total").value = total;
	}

	function getTotalReading() {
		var totalReading;
		var kwhValue;
		var currentReading = parseInt(document.getElementById("cur_reading").value);
		var previousReading = parseInt(document.getElementById("prev_reading").value);
		var perKwh = parseInt(document.getElementById("inputGST").value);

		// Fix the calculation by swapping previousReading and currentReading
		kwhValue = currentReading - previousReading;
		totalReading = kwhValue * perKwh;

		// Display the kwh and totalReading in the respective input fields
		document.getElementById("inputProductPrice").value = kwhValue;
		document.getElementById("eletric").value = totalReading;
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
			$('#date').val(tr.eq(3).text());
			$('#rent').val(tr.eq(4).text());
			$('#prev_reading').val(tr.eq(5).text());
			$('#cur_reading').val(tr.eq(6).text());
			$('#water').val(tr.eq(7).text());



			var prevReadingValue = parseInt($('#prev_reading').val());
			var curReadingValue = parseInt($('#cur_reading').val());

			var result = Math.abs(prevReadingValue - curReadingValue);

			var totalElecBill = result * 18;

			$('#inputProductPrice').val(result);

			$('#eletric').val(totalElecBill);
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
<script type="text/javascript">
	$(document).ready(function() {

		$('#myInput').keyup(function() {
			// Search text
			var text = $(this).val();
			// Hide all content class element
			$('.active_chat').hide();

			// Search 
			$('.active_chat .title:contains("' + text + '")').closest('.active_chat').show();


		});

		$('body').on("click", '#add', function() {

			$('#modal_add').show();
		});


		$('body').on("click", '#clicks', function() {

			var tr = $(this).closest("tr").find('td');
			$('#idtenant').val(tr.eq(0).text());
			$('#fname').val(tr.eq(1).text());
			$('#lname').val(tr.eq(2).text());
			$('#monthlydate').val(tr.eq(3).text());
			$('#monthlyrent').val(tr.eq(4).text());
			
		});


		$('body').on("click", '.close', function() {
			$('#modal_add').hide();

		});


	});
</script>