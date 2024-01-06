<?php
error_reporting(0);
session_start();
include "conn.php";
if(!($_SESSION['username'] == "Admin")){
  echo '<script>window.location.href = "login.php";</script>';
  exit();
}
function check($data){
  $data= trim($data);
  $data= htmlspecialchars($data);
  $data= stripslashes($data);
  return $data;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 <meta name="description" content="">
 <meta name="author" content="">
 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.0/css/all.css">
 <script
 src="http://code.jquery.com/jquery-2.2.4.min.js"
 integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
 crossorigin="anonymous"></script>
 <link href="css/sb-admin-2.min.css" rel="stylesheet">
 <title>Rental Room Management System</title>
 <link rel="icon" href="img/jdslogo.png">

 <!-- Custom fonts for this template -->
 <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
 <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

 <!-- Custom styles for this template -->
 <link href="css/sb-admin-2.min.css" rel="stylesheet">

 <!-- Custom styles for this page -->
 <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

</head>

<style type="text/css">
  .container{max-width:1170px; margin:auto;}
  img{ max-width:100%;}
  .inbox_people {
    background: #f8f8f8 none repeat scroll 0 0;
    float: left;
    overflow: hidden;
    width: 40%; border-right:1px solid #c4c4c4;
  }
  .inbox_msg {
    border:  1px solid #c4c4c4;
    clear: both;
    overflow: hidden;
  }
  .top_spac{ margin: 20px 0 0;}


  .recent_heading {float: left; width:40%;}
  .srch_bar {
    display: inline-block;
    text-align: right;
    width: 60%;
  }
  .headind_srch{ padding:10px 29px 10px 20px; overflow:hidden; border-bottom:1px solid #c4c4c4;}

  .recent_heading h4 {
    color: #05728f;
    font-size: 21px;
    margin: auto;
  }
  .srch_bar input{ border:1px solid #cdcdcd; border-width:0 0 1px 0; width:80%; padding:2px 0 4px 6px; background:none;}
  .srch_bar .input-group-addon button {
    background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
    border: medium none;
    padding: 0;
    color: #707070;
    font-size: 18px;
  }
  .srch_bar .input-group-addon { margin: 0 0 0 -27px;}

  .chat_ib h5{ font-size:15px; color:black; margin:0 0 8px 0;}
  .chat_ib h5 span{ font-size:13px; float:right;}
  .chat_ib p{ font-size:14px; color:black; margin:auto}
  .chat_img {
    float: left;
    width: 11%;
  }
  .chat_ib {
    float: left;
    padding: 0 0 0 15px;
    width: 88%;
  }

  .chat_people{ overflow:hidden; clear:both;}
  .chat_list {
    border-bottom: 1px solid black;
    margin: 0;
    padding: 18px 16px 10px;
  }
  .inbox_chat { height: 550px; overflow-y: scroll;}

  .active_chat{ background:#ebebeb;}

  .incoming_msg_img {
    display: inline-block;
    width: 6%;
  }
  .received_msg {
    display: inline-block;
    padding: 0 0 0 10px;
    vertical-align: top;
    width: 92%;
  }
  .received_withd_msg p {
    background: greenyellow none repeat scroll 0 0;
    border-radius: 3px;
    color: #646464;
    font-size: 14px;
    margin: 0;
    padding: 5px 10px 5px 12px;
    width: 100%;
  }
  .time_date {
    color: #747474;
    display: block;
    font-size: 12px;
    margin: 8px 0 0;
  }
  .received_withd_msg { width: 57%;}
  .mesgs {
    float: left;
    padding: 30px 15px 0 25px;
    width: 60%;
  }

  .sent_msg p {
    background: #05728f none repeat scroll 0 0;
    border-radius: 3px;
    font-size: 14px;
    margin: 0; color:#fff;
    padding: 5px 10px 5px 12px;
    width:100%;
  }
  .outgoing_msg{ overflow:hidden; margin:26px 0 26px;}
  .sent_msg {
    float: right;
    width: 46%;
  }
  .input_msg_write input {
    background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
    border: medium none;
    color: #4c4c4c;
    font-size: 15px;
    min-height: 48px;
    width: 100%;
  }

  .type_msg {border-top: 1px solid #c4c4c4;position: relative;}
  .msg_send_btn {
    background: #05728f none repeat scroll 0 0;
    border: medium none;
    border-radius: 50%;
    color: #fff;
    cursor: pointer;
    font-size: 17px;
    height: 33px;
    position: absolute;
    right: 0;
    top: 11px;
    width: 33px;
  }
  .messaging { padding: 0 0 50px 0;}
  .msg_history {
    height: 516px;
    overflow-y: auto;
  }



</style>


<script>
  function submitChat() {
    if(forms.msg.value == '' ) {
      alert("ALL FIELDS ARE MANDATORY!!!");
      return;
    }

    var msg = forms.msg.value;
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById('incoming_msg').innerHTML = xmlhttp.responseText;
      }
    }
    xmlhttp.open('GET','admin_load_cha.php?msg='+msg,true);
    xmlhttp.send();
    forms.msg.value = '';
  }

  $(document).ready(function(e){
    $.ajaxSetup({
      cache: false
    });
    $( "#msg_area").keyup(function(e) {
      var code = e.keyCode || e.which;
     if(code == 13) { //Enter keycode
       submitChat();
     }
   });
    setInterval( function(){$('#incoming_msg').load('admin_view_cha.php'); },1000 );
      setInterval( function(){$('.inbox_chat').load('admin_load_message.php'); },1000 );
  });
</script>


<style type="text/css">
  .sidebar-dark #sidebarToggle {
    background-color: hsl(0deg 0% 13%);
  }
  
  .sidebar-dark .nav-item .nav-link[data-toggle=collapse]::after{
    color:black;
    /* Notice we changed from white to the yellow */
  }
</style>
<body id="page-top">

  <?php  include 'admin_navbar.php'; ?>



  <ul class="navbar-nav ml-auto">


   <div class="topbar-divider d-none d-sm-block"></div>

   <!-- Nav Item - User Information -->
   <li class="nav-item dropdown no-arrow">
     <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
       <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php

       include "conn.php";
       $uname = $_SESSION['username'];
       echo "<b><b>".$uname."</b></b>";

       ?></span>
       <img class="img-profile rounded-circle" src="user.png">
     </a>
     <!-- Dropdown - User Information -->
     <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">

            <?php include "includes/Alertlogout.php"?>
            </li>

          </ul>

        </nav>
 <!-- End of Topbar -->

 <!-- Begin Page Content -->
 <div class="container-fluid">
   <h1 class="h3 mb-2 text-gray-800" align="center">Chat Support</h1>
   <p style="color:red;"><b><b>You can message tenant and caretaker.</b></b></p>

   <div class="card shadow mb-4">
     <div class="card-body">

      <div class="messaging">
        <div class="inbox_msg">
          <div class="inbox_people">
            <div class="headind_srch">
              <div class="recent_heading">
                <h4>Recent</h4>
              </div>
              <div class="srch_bar">
                <div class="stylish-input-group">
                  <input type="text" class="search-bar"  placeholder="Search"  id="myInput" onkeyup="myFunction()" >
                  <span class="input-group-addon">
                    <button type="button"> <i class="fa fa-search" aria-hidden="true"></i> </button>
                  </span> </div>
                </div>
              </div>
              <div class="inbox_chat" >

   

         </div>
       </div>
       <div class="mesgs" style="display:none;">
        <div class="msg_history">
          <div class="incoming_msg" id="incoming_msg">
          </div>
        </div>
        <div class="type_msg" style="position: sticky;">
          <div class="input_msg_write">
            <form name="forms" autocomplete="off">
              <input type="text"  id="msg_area" name="msg" placeholder="Type a message" />
              <button class="msg_send_btn" type="button" id="submit" name="submit"  onclick="submitChat()"><i class="fas fa-paper-plane"></i></button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
 <div class="container my-auto">
   <div class="copyright text-center my-auto">

   </div>
 </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
 <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
              <a class="btn btn-primary" href="logout.php">Logout</a>
            </div>
          </div>
        </div>
      </div>

<script>
 if ( window.history.replaceState ) {
   window.history.replaceState( null, null, window.location.href );
 }
</script>


<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/datatables-demo.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.js"></script>
<?php include "includes/Alertfooter.php"?>

</body>

</html>




<script type="text/javascript">
  $(document).ready(function(){
   $('#myInput').keyup(function(){
  // Search text
  var text = $(this).val();
  // Hide all content class element
  $('.active_chat').hide();
  // Search 
  $('.active_chat .title:contains("'+text+'")').closest('.active_chat').show();
});

   $("body").on("click",'.active_chat',function(){
     $('form')[0].reset();
     var get =$(this).attr('value');
     $.cookie("chat_id",get);
     $('.mesgs').show();

   });

 });
</script>