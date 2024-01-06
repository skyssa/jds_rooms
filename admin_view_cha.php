<?php

error_reporting(0);

include 'conn.php';

	  $chat_id=$_COOKIE['chat_id'];

        $id=$_COOKIE['manager_ids'];

	$display="select  * from rental_chat  where  rent_tenant_id='$chat_id' and rent_chat_user_id='$id'  or  rent_tenant_id='$id' and rent_chat_user_id='$chat_id' ORDER by rent_tenant_id  desc ";
$q =mysqli_query($con,$display);

	while($row=mysqli_fetch_array($q)){

	echo'<div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
              <div class="received_msg">
                <div class="received_withd_msg">
                  <p>'.$row['rent_chat_message'].'</p>
                    <span class="time_date"> '.$row['rent_chat_time'].' |  '.$row['rent_chat_date'].' | '.$row['rent_chat_user'].' </span></div>
              </div>
            </div>';
        
	
	}





?>

