
<?php

error_reporting(0);
include"conn.php";
$dor_id=mysqli_escape_string($con,$_POST['getid']);

$category=mysqli_escape_string($con,$_POST['category']);
$prev_reading=mysqli_escape_string($con,$_POST['prev_reading']);
$cur_reading=mysqli_escape_string($con,$_POST['cur_reading']);
$start=mysqli_escape_string($con,$_POST['date_start']);
$due=mysqli_escape_string($con,$_POST['due_date']);


if($category=='Balance Payment'){
$amount=mysqli_escape_string($con,$_POST['total']);
}elseif ($category=='Water bill') {
$amount=mysqli_escape_string($con,$_POST['total']);
}elseif ($category=='Advance Payment') {
	$amount=mysqli_escape_string($con,$_POST['total']);
}elseif ($category=='Other Charges/Penalties') {
$amount=mysqli_escape_string($con,$_POST['total']);
}elseif ($category=='Electric bill') {
$a=mysqli_escape_string($con,$_POST['inputProductPrice']);
$amount=mysqli_escape_string($con,$_POST['total']);
$consumption=$a."Kwh";
	# code...
}else{
  
}

 echo  $Date=date('Y-m-d');

$insert="INSERT INTO `payment`(tenant_id,prev_reading,cur_reading,amount,date,description,status,pay_from,pay_to,date_send,consumption) VALUES ('$dor_id','$prev_reading','$cur_reading','$amount','$Date','$category','Pending','$start','$due','$Date','$consumption')";
mysqli_query($con,$insert);
header("Location:payment_detail.php");


?>