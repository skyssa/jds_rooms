<?php 

include 'conn.php';

$bill=$_POST['bill'];
$prev_reading=$_POST['prev_reading'];
$cur_reading=$_POST['cur_reading'];
$water_bill=$_POST['waterbill'];
$pperson = $_POST['pperson'];

$totalWaterBill = $water_bill * $pperson;

$cons=$_POST['consumptions'];

// if(!$bill){
//     $billing=$cons.' kwh';
// }

$billing=$prev_reading - $cur_reading;

$id=$_POST['idtenant'];

$amount=$_POST['monthlyrent'];
$date=$_POST['monthlydate'];
$originalDate = new DateTime($date);

// Add one month to the original date
$nextMonthDate = $originalDate->modify('+1 month');
$newDate = $nextMonthDate->format('Y-m-d');

$desc="Monthly Payment";
$kwhValue=$cur_reading - $prev_reading;
$electric=$kwhValue * 18;

$total = $electric + $totalWaterBill + $amount;
$Date = date('Y-m-d');

$sql="insert into tenant_reading_bill (tenant_id,consumption,prev_reading,cur_reading,water_bill,read_date)values ('$id','$billing','$prev_reading','$cur_reading','$totalWaterBill','$date')";
mysqli_query($con,$sql);
$sql1="INSERT INTO `payment`(tenant_id,amount,pay_from,pay_to,date,description,prev_reading,cur_reading,date_send,status,consumption) 
            VALUES ('$id','$amount','$electric','$totalWaterBill','$date','$desc','$prev_reading','$cur_reading','$Date','Pending',$total)";
mysqli_query($con,$sql1);

$sql2="UPDATE `contract` SET start_day='$newDate' WHERE tenant_id='$id' ";
mysqli_query($con,$sql2);
header("Location:tenant_reading.php");











?>