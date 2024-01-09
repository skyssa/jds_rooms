<?php
include 'conn.php';
//$term = isset($_POST['term']) ? (int)$_POST['term'] : null;
//$contract = isset($_POST['contract']) ? $_POST['contract'] : null;

$room = isset($_POST['room']) ? $_POST['room'] : null;
$price = isset($_POST['price']) ? (int)$_POST['price'] : null;
$date = isset($_POST['date']) ? $_POST['date'] : null;
$contract = isset($_POST['contract']) ? $_POST['contract'] : null;


    $date_reg1 = date('Y-m-d H:i:s');
    $stat = "Pending";
    $status = 0;
    $id = $_COOKIE['manager_id'];
    $desc="advance payment";

if ($room === null || $price === null || $date === null || $contract === null) {
  echo "Please fill out all the required fields.";
} else {

  $sql1 = "INSERT INTO payment VALUES (' ','$id', '$room','$price','','','$date','$desc','','','','','','$date_reg1','$stat','','')";
  mysqli_query($con, $sql1);
  $sql2 = "INSERT INTO `contract` VALUES (' ','$id', '$room','','','$term','$price','$date','','$date_reg1','$stat')";
  mysqli_query($con, $sql2);
  $sql3 = "UPDATE room SET status= '$contract' WHERE room_id = '$room'";
  mysqli_query($con, $sql3);
  mysqli_close($con);
  header('Location:upay.php');
  
}
//  if (date('d') < 30) {
//     $end_date = date('Y-m-t', strtotime('+' . $dur1 . ' month'));
//   } else {
//     $end_date = date('Y-m-t', strtotime('+' . $dur1 . ' month'));
//   }
//   if ((date('d') < 30)) {
//     $start_day = date('Y-m-d');
//   } else {
//     $start_day = date('Y-m-d', strtotime('+1 month'));
//   }
//   $date_reg = date('Y-m-d');
//   $date_reg1 = date('Y-m-d H:i:s');
//   $stat = "Active";
//   $status = 0;
//   $id = $_COOKIE['manager_id'];
//   $sql1 = "INSERT INTO contract VALUES (' ','$id', '$room','$dur','$total_rent','$term','$price','$date','','$date_reg1','$stat')";
//   mysqli_query($con, $sql1);
//   $sql3 = "UPDATE room SET status= '$contract' WHERE room_id = '$room'";
//   mysqli_query($con, $sql3);
//   mysqli_close($con);
  
//   header('Location:home.php');
//$dur = $_POST['duration'];
//$dur1 = $dur - 1;
// $term = (int)$_POST['term'];
// $contract = $_POST['contract'];
// $room = $_POST['room'];
// $price = (int)$_POST['price'];
// $date=$_POST['date'];
//$total_rent = $dur * $price;
//$rent_per_term =$total_rent / $term;
  // At least one variable is empty
    // All variables have values, proceed with further processing
  // ...
  ?>
