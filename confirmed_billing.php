<?php
error_reporting(0);
include 'conn.php';
$id=$_GET['id'];
date_default_timezone_set('Asia/Manila');
$Date=date('M d Y');
$time=date('h:i:s A' );
$mysqli="update  payment set status='CONFIRMED',confirmed_date='$Date' where payment_id='$id' ";
mysqli_query($con,$mysqli);
header("Location:payment_detail.php");









?>