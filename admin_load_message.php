             <?php 
             include 'conn.php';
             $sql="select  *,CONCAT(fname,'  ',lname) as  name from tenant";
             $query=mysqli_query($con,$sql);
             $sqla="select  * from user where role='Caretaker'  ";
             $querya=mysqli_query($con,$sqla);

             while($row=mysqli_fetch_assoc($query)){


               while($rowa=mysqli_fetch_assoc($querya)){
                ?>

                <div class="chat_list active_chat"  id="clickko"  value="<?php echo $rowa['user_id']?>" >
                  <div class="chat_people">
                    <div class="chat_img"><i class="fas fa-user-circle  text-primary" style="font-size:30px;"></i></div>
                    <div class="chat_ib">
                     <?php      
                     $idf=$rowa['user_id'];
                     $idsj=$_COOKIE['manager_ids'];
                     $sqlsa="select  *,concat(rent_chat_date,' ',rent_chat_time) as  time from rental_chat where rent_tenant_id='$idf'  and  rent_chat_user_id='$idsj'  or rent_tenant_id='$idsj' and   rent_chat_user_id='$idf' order  by  rent_tenant_id  desc limit  1 ";
                     $querysa=mysqli_query($con,$sqlsa);
                     $rowsa=mysqli_fetch_assoc($querysa);?>
                     <h5 class="title"><?php echo  $rowa['role']?><span class="rent_chat_date"> <?php echo  $rowsa['rent_chat_time']?> </span></h5>
                     <p><?php echo  $rowsa['rent_chat_message']?></p>
                   </div>
                 </div>
               </div>
             <?php }?>

             <div class="chat_list active_chat"  id="clickko"  value="<?php echo $row['tenant_id']?>" >
              <div class="chat_people">
                <div class="chat_img"><i class="fas fa-user-circle  text-primary" style="font-size:30px;"></i></div>
                <div class="chat_ib">
                 <?php      
                 $id=$row['tenant_id'];
                 $ids=$_COOKIE['manager_ids'];
                 $sqls="select  *,concat(rent_chat_date,' ',rent_chat_time) as  time from rental_chat where rent_tenant_id='$id'  and  rent_chat_user_id='$ids'  or rent_tenant_id='$ids' and   rent_chat_user_id='$id' order  by  rent_tenant_id  asc limit  1 ";
                 $querys=mysqli_query($con,$sqls);
                 $rows=mysqli_fetch_assoc($querys);?>
                 <h5 class="title"><?php echo  $row['name']?><span class="rent_chat_date"> <?php echo  $rows['rent_chat_time']?> </span></h5>
                 <p><?php echo  $rows['rent_chat_message']?></p>
               </div>
             </div>
           </div>
         <?php }?>
