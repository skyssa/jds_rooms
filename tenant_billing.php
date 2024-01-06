<?php 

include 'conn.php';

$bill=$_POST['bill'];
$prev_reading=$_POST['prev_reading'];
$cur_reading=$_POST['cur_reading'];
$cons=$_POST['consumptions'];

if($bill=='Water bill'){
$billing=$cons.' person';
}else{
$billing=$cons.' kwh';
}


$id=$_POST['idtenant'];

 $date = date('Y-m-d');

$sql="insert into tenant_reading_bill (tenant_id,description,consumption,prev_reading,cur_reading,read_date)values ('$id','$bill','$billing','$prev_reading','$cur_reading','$date')";
mysqli_query($con,$sql);
header("Location:tenant_reading.php");











?>