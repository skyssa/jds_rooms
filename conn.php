<?php
$con = mysqli_connect("localhost", "root", "", "jds_rooms");
if(!$con){
  echo "Connection failed!".@mysqli_error($con);
}
?>
