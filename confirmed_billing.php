<?php
error_reporting(0);
include 'conn.php';
$id = $_GET['id'];
$id2 = $_GET['id2'];
//$desc = $_GET['desc'];
// echo $id2;
date_default_timezone_set('Asia/Manila');
$Date = date('M d Y');
$time = date('h:i:s A');


$mysqli = "update  payment set status='CONFIRMED',confirmed_date='$Date' where payment_id='$id' ";
mysqli_query($con, $mysqli);

$query = "SELECT * FROM `contract` WHERE tenant_id='$id2'";
$result1 = mysqli_query($con, $query);
$row1 = mysqli_fetch_assoc($result1);
do {
    $start = $row1['start_day'];
    $row1 = mysqli_fetch_assoc($result1);
} while ($row1);
$originalDate = new DateTime($start);

// Add one month to the original date
$nextMonthDate = $originalDate->modify('+1 month');
$newDate = $nextMonthDate->format('Y-m-d');
if ($id2 === "MONTHLY RENT" || $id2 === "advance payment") {
    $mysqli1 = "UPDATE `contract`  SET start_day='$newDate' ,status='CONFIRMED' WHERE tenant_id='$id2'";
    mysqli_query($con, $mysqli1);
}
//$mysqli1="UPDATE `contract`  SET start_day='$newDate' ,status='CONFIRMED' WHERE tenant_id='$id2'";

header("Location:payment_detail.php");
