<?php 

include 'conn.php';

$bill=$_POST['bill'];
$prev_reading=$_POST['prev_reading'];
$cur_reading=$_POST['cur_reading'];
$water_bill=$_POST['waterbill'];
$pperson = $_POST['pperson'];

$totalWaterBill = $water_bill * $pperson;

$cons=$_POST['consumptions'];

if(!$bill){
    $billing=$cons.' kwh';
}


$id=$_POST['idtenant'];

 $date = date('Y-m-d');

$sql="insert into tenant_reading_bill (tenant_id,consumption,prev_reading,cur_reading,water_bill,read_date)values ('$id','$billing','$prev_reading','$cur_reading','$totalWaterBill','$date')";
mysqli_query($con,$sql);
header("Location:tenant_reading.php");











?>