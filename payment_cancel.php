<?php
error_reporting(0);
include 'conn.php';
$id=$_GET['id'];
$mysqli="update  payment set status='INVALID RECEIPT' where payment_id='$id' ";
mysqli_query($con,$mysqli);
header("Location:pay.php");









?>