<?php
error_reporting(0);
session_start();
include "conn.php";
$id = $_GET['id'];
echo $id;
$sql = "SELECT * FROM room WHERE room_id = $id";
$query = mysqli_query($sql,$con);
$row = mysqli_fetch_assoc($query);

do {
  $stat = $row['status'];
  $row = mysqli_fetch_assoc($query);
} while ($row);
$sql = "DELETE FROM room WHERE room_id = $id";
if (mysqli_query($con, $sql)) {
  if ($stat = 'Occupied') {

    echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
      echo "<script type='text/javascript'>
        Swal.fire({
          title: 'DELETED',
          icon: 'success',
          confirmButtonText: 'Continue'
        }).then((result) => {
          if (result.isConfirmed) {
            window.location.href = 'room_detail.php';
          }
        });
      </script>"; 
    
    $query = "SELECT * FROM contract WHERE room_id = '$id' ";
    $result = mysqli_query($con, $query);
    $row1 = mysqli_fetch_assoc($result);
    do{
      $tid = $row1['tenant_id'];

      $row1 = mysqli_fetch_assoc($result);
    }while ($row1);
    $sql = "UPDATE contract SET status = 'Inactive' WHERE tenant_id = '$tid'";
    mysqli_query($con, $sql);
    
  }
  else {
    echo "<script type='text/javascript'>alert('DELETED.');</script>";
    echo '<style>body{display:none; color:red;}</style>';
    echo '<script>window.location.href = "room_detail.php";</script>';
    exit;
  }

}else {
  echo "<script type='text/javascript'>alert('FAILED ".mysqli_error($con).".');</script>";
  echo '<style>body{display:none; color:red;}</style>';
  echo '<script>window.location.href = "contract_detail.php";</script>';
  exit;
}

mysqli_close($con);



 ?>
