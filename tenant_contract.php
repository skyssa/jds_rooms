<?php 




          include 'conn.php';
          //$dur = $_POST['duration'];
          //$dur1 = $dur - 1;
          $term = (int)$_POST['term'];
          $contract = $_POST['contract'];
          $room = $_POST['room'];
          $price = (int)$_POST['price'];
          $date=$_POST['date'];
          //$total_rent = $dur * $price;
          //$rent_per_term =$total_rent / $term;

  if(date('d')<30){
    $end_date = date('Y-m-t', strtotime('+'.$dur1.' month'));
  }else{
    $end_date = date('Y-m-t', strtotime('+'.$dur1.' month'));
  }
  if((date('d')<30)){
    $start_day = date('Y-m-d');
  }else{
    $start_day = date('Y-m-d', strtotime('+1 month'));
  }
  $date_reg = date('Y-m-d');
  $date_reg1 = date('Y-m-d H:i:s');

  $stat = "Active";
  $status = 0;

$id=$_COOKIE['manager_id'];
          $sql1 = "INSERT INTO contract VALUES (' ','$id', '$room','$dur','$total_rent','$term','$price','$date','','$date_reg1','$stat')";

          mysqli_query($con,$sql1);
                    $sql3 = "UPDATE room SET status= '$contract' WHERE room_id = '$room'";
          mysqli_query($con,$sql3);
          mysqli_close($con);

          header('Location:home.php');




?>