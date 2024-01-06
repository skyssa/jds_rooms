<?php

error_reporting(0);
include 'conn.php';

	$msg=mysqli_real_escape_string($con,$_GET['msg']);
	date_default_timezone_set('Asia/Manila');
	$Date=date('M d Y');
	$time=date('h:i:s A' );  
	    $chat_id=$_COOKIE['chat_id'];
	       $id=$_COOKIE['manager_ids'];


	$insert="insert  into  rental_chat(rent_chat_message,rent_chat_date,rent_chat_time,rent_tenant_id,rent_chat_user,rent_chat_user_id)values('$msg','$Date','$time','$chat_id','Caretaker','$id')";
	mysqli_query($con,$insert);

//display  the  data

	$display="select  * from rental_chat  where  rent_tenant_id='$chat_id' and rent_chat_user_id='$id'  or  rent_tenant_id='$id' and rent_chat_user_id='$chat_id' ORDER by rent_tenant_id  asc";
$q =mysqli_query($con,$display);

	while($row=mysqli_fetch_array($q)){

	echo'<div class="incoming_msg_img"> <i class="fas fa-user-circle  text-primary" style="font-size:30px;"></i></div>
              <div class="received_msg">
            <div class="received_withd_msg">
                  <p>'.$row['rent_chat_message'].'</p>
                    <span class="time_date"> '.$row['rent_chat_time'].' |  '.$row['rent_chat_date'].'|  '.$row['rent_chat_user'].'</span></div>
              </div>
            </div>';
        
	
	}






?>