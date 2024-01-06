<?php



include "conn.php";
$id = $_GET['id'];
$update="select * from  contract where  contract_id = '$id'";
$query=mysqli_query($con,$update);
$row=mysqli_fetch_assoc($query);
 $ids=$row['room_id'];

$updates="update room  set status='Available'   where room_id = '$ids'";
$querys=mysqli_query($con,$updates);


$sql = "DELETE FROM contract WHERE contract_id = $id";
if (mysqli_query($con, $sql)) {
  echo "<script type='text/javascript'>alert('DELETED.');</script>";
  echo '<style>body{display:none; color:red;}</style>';
  echo '<script>window.location.href = "contract_detail.php";</script>';
  exit;
}else {
  echo "<script type='text/javascript'>alert('FAILED ".mysqli_error($con).".');</script>";
  echo '<style>body{display:none; color:red;}</style>';
  echo '<script>window.location.href = "contract_detail.php";</script>';
  exit;
}

mysqli_close($con);



 ?>
