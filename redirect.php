<?php
error_reporting(0);
session_start();
include "conn.php";
if (!$_SESSION['username']) {
    echo '<script>window.location.href = "login.php";</script>';
    exit();
}

$sql = "SELECT * FROM tenant WHERE u_name= '" . $_SESSION["username"] . "' ";
$query = mysqli_query($con, $sql);
$result = mysqli_fetch_assoc($query);
do {
    $id = $result['tenant_id'];
  

    $sql1 = "SELECT * FROM tenant_contacts WHERE tenant_id='$id'";
    $query1 = mysqli_query($con, $sql1);
    $result1 = mysqli_num_rows($query1);
    if($result1=== 0) {
        echo '<script>window.location.href="contacts.php";</script>';
    } else {
        echo '<script>window.location.href="home.php";</script>';
    }
    $result = mysqli_fetch_assoc($query);
} while ($result);

?>
