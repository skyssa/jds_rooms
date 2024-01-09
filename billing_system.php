
<?php

error_reporting(0);
include "conn.php";

$dor_id=mysqli_escape_string($con,$_POST['getid']);

// $amount=$_POST['rent'];
$amount = $_POST['rent'];
$date=$_POST['date'];
$desc="Monthly Bill";
//$category=mysqli_escape_string($con,$_POST['category']);
$prev_reading=mysqli_escape_string($con,$_POST['prev_reading']);
$cur_reading=mysqli_escape_string($con,$_POST['cur_reading']);
//$start=mysqli_escape_string($con,$_POST['month']);
//$due=mysqli_escape_string($con,$_POST['due_date']);
$water=$_POST['rent'];
$electric=$_POST['eletric'];
$water=$_POST['water'];


// if($category=='Balance Payment'){
// $amount=mysqli_escape_string($con,$_POST['total']);
// }elseif ($category=='Water bill') {
// $amount=mysqli_escape_string($con,$_POST['total']);
// }elseif ($category=='Advance Payment') {
// 	$amount=mysqli_escape_string($con,$_POST['total']);
// }elseif ($category=='Other Charges/Penalties') {
// $amount=mysqli_escape_string($con,$_POST['total']);
// }elseif ($category=='Electric bill') {
// $a=mysqli_escape_string($con,$_POST['inputProductPrice']);
// $amount=mysqli_escape_string($con,$_POST['total']);

$consumption=$a."Kwh";

	# code...
// }else{
  
// }

 echo  $Date=date('Y-m-d');
 $total = $electric + $water + $amount;

$insert="INSERT INTO `payment`(tenant_id,amount,pay_from,pay_to,date,description,prev_reading,cur_reading,date_send,status,consumption) 
						VALUES ('$dor_id','$amount','$electric','$water','$date','$desc','$prev_reading','$cur_reading','$Date','Pending',$total)";
mysqli_query($con,$insert);

header("Location:tenant_reading.php");


?>