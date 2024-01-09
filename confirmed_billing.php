<?php
error_reporting(0);
include 'conn.php';
$id=$_GET['id'];
$id2=$_GET['id2'];
date_default_timezone_set('Asia/Manila');
$Date=date('M d Y');
$time=date('h:i:s A' );
$mysqli="update  payment set status='CONFIRMED',confirmed_date='$Date' where payment_id='$id' ";
mysqli_query($con,$mysqli);
$mysqli1="update contract set status='CONFIRMED' where tenant_id='$id2' ";
mysqli_query($con,$mysqli1);
header("Location:payment_detail.php");









?>