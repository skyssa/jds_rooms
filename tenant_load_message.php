


<?php 
include 'conn.php';

$sqla="select  * from user ";
$querya=mysqli_query($con,$sqla);



while($rowa=mysqli_fetch_assoc($querya)){
	?>
	<div class="chat_list active_chat"  id="clickko"  value="<?php echo $rowa['user_id']?>" >
		<div class="chat_people">
			<div class="chat_img"><i class="fas fa-user-circle  text-primary" style="font-size:30px;"></i></div>
			<div class="chat_ib">
				<?php      
				$id=$rowa['user_id'];
				$ids=isset($_COOKIE['manager_id']);
				$get="select  *,concat(rent_chat_date,' ',rent_chat_time) as  time from rental_chat where rent_tenant_id='$id'  and  rent_chat_user_id='$ids'  or rent_tenant_id='$ids' and   rent_chat_user_id='$id' order  by  rent_tenant_id  desc limit  1 ";
				$getrow=mysqli_query($con,$get);
				$rows=mysqli_fetch_assoc($getrow);
				
				if($rows!=''){?>
			
				<h5 class="title"><?php echo  $rowa['role']?><span class="rent_chat_date">  </span></h5>
				<h5 class="title" id="loadmo"> <?php echo  $rows['rent_chat_message']?><span class="rent_chat_message"> <?php echo  $rows['time']?> </span></h5>
				<?php
				}
				?>
			</div>
		</div>
	</div>
<?php }?>













