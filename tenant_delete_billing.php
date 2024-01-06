<?php
error_reporting(0);

 include"conn.php";
                 $id=$_GET['id'];
                 $querys="delete   FROM tenant_reading_bill where read_id='$id' ";
                 mysqli_query($con,$querys);
                    header("Location:tenant_reading.php");



?>