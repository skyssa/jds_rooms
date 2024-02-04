<?php 

include 'conn.php';


$bill=$_POST['bill'];
$prev_reading=$_POST['prev_reading'];
$cur_reading=$_POST['cur_reading'];
$water_bill=$_POST['waterbill'];
$pperson = $_POST['pperson'];
echo "Bill: $bill<br>";
echo "Previous Reading: $prev_reading<br>";
echo "Current Reading: $cur_reading<br>";
echo "Water Bill: $water_bill<br>";


$totalWaterBill = $water_bill * $pperson;

$cons=$_POST['consumptions'];
// echo "Persons: $con<br>";
// if(!$bill){
//     $billing=$cons.' kwh';
// }

$billing=$prev_reading - $cur_reading;

$id=$_POST['idtenant'];
$amount=$_POST['monthlyrent'];
$date=$_POST['monthlydate'];


// $timestamp = strtotime($newDate);
// $newTimestamp = strtotime('+3 days', $timestamp);
// $new = date("Y-m-d", $newTimestamp);

$desc="ELECTRIC BILL AND WATER BILL";
$kwhValue=$cur_reading - $prev_reading;
$electric=$kwhValue * 18;
echo $kwhValue;
echo $electric;
echo $totalWaterBill;
echo $amount;
$total = $electric + $totalWaterBill;
$Date = date('Y-m-d');

$sql="insert into tenant_reading_bill (tenant_id,consumption,prev_reading,cur_reading,water_bill,read_date)values ('$id','$billing','$prev_reading','$cur_reading','$totalWaterBill','$date')";
mysqli_query($con,$sql);
$sql1="INSERT INTO `payment`(tenant_id,amount,pay_from,pay_to,date,description,prev_reading,cur_reading,date_send,status,consumption) 
            VALUES ('$id','$amount','$electric','$totalWaterBill','$date','$desc','$prev_reading','$cur_reading','$Date','Pending',$total)";
mysqli_query($con,$sql1);

// $originalDate = new DateTime($date);// Add one month to the original date
// $nextMonthDate = $originalDate->modify('+1 month');
// $newDate = $nextMonthDate->format('Y-m-d');

// $sql2="UPDATE `contract` SET start_day='$newDate' WHERE tenant_id='$id' ";
// mysqli_query($con,$sql2);
header("Location:tenant_reading.php");











?>