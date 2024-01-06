
<style type="text/css">
.sidebar-dark #sidebarToggle {
    background-color: hsl(0deg 0% 13%);
}
  
 .sidebar-dark .nav-item .nav-link[data-toggle=collapse]::after{
    color:black;
 /* Notice we changed from white to the yellow */
}
</style>

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color:whitesmoke;">

      <!-- Sidebar - Brand -->
     <a class="sidebar-brand d-flex align-items-center justify-content-center" href="admin_home.php" style="margin-top:6%;margin-right:40%;">
         <div><img src="img/jdslogo.png" style="width:99%;"></div><br>
      
     </a>

           <div class="sidebar-brand-text mx-3 mt-3" style="color:black;">JDS Room Rental</div>

      <!-- Divider -->
      <hr class="sidebar-divider my-0" style="color:black;">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="admin_home.php">
          <i class="fas fa-fw fa-tachometer-alt" style="color:black;"></i>
          <span style="color:black;">Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-home fa-cog" style="color:black;"></i>
          <span style="color:black">Room</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header"  style="color:black">Details:</h6>
            <a class="collapse-item" href="room_detail.php"  style="color:black">Room Information</a>
            <a class="collapse-item" href="add_room.php"  style="color:black">Add a Room</a>
            <a class="collapse-item" href="change_cost.php"  style="color:black">Change the Cost of the<br/>Room</a>
           
          </div>
        </div>
      </li>
      <hr class="sidebar-divider">

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
          <i class="fas fa-clipboard-list"  style="color:black"></i>
          <span  style="color:black">Contract</span>
        </a>
        <div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header"  style="color:black">Details:</h6>
            <a class="collapse-item" href="contract_detail.php"  style="color:black">Contract Information</a>
            <a class="collapse-item" href="edit_contract_part.php"  style="color:black">Edit Contract Information</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->


      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour"  style="color:black">
          <i class="fas fa-user fa-cog"  style="color:black"></i>
          <span  style="color:black">Tenants</span>
        </a>
        <div id="collapseFour" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header"  style="color:black">Details:</h6>
            <a class="collapse-item" href="tenant_detail.php"  style="color:black"> Tenant Information</a>
            <a class="collapse-item" href="tenant_contact.php"  style="color:black">Tenant's Contact</a>
            <a class="collapse-item" href="admin_tenantIn.php"  style="color:black">Tenant-In Room Condition</a>
            <a class="collapse-item" href="admin_tenantOut.php">Tenant-Out Room Condition</a>
            
          </div>
        </div>
      </li>
      <hr class="sidebar-divider">

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
          <i class="fas fa-dollar-sign fa-cog"  style="color:black"></i>
          <span  style="color:black">Payment</span>
        </a>
        <div id="collapseFive" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header"  style="color:black">Details:</h6>
            <a class="collapse-item" href="admin_billing_detail.php"  style="color:black"> Billing Info</a>
            <a class="collapse-item" href="payment_detail.php"  style="color:black">Payment Information</a>
            
           
          </div>
        </div>
      </li>
      <hr class="sidebar-divider">

      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="form_out.php">
          <i class="fas fa-fw fa-clipboard-list"  style="color:black"></i>
          <span  style="color:black"> Tenant-Out Room Condition</span>
        </a>

      </li>

      <hr class="sidebar-divider">

      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="admin_cha_support.php">
          <i class="fas fa-fw fa-comments"  style="color:black"></i>
          <span  style="color:black">Message</span></a>
      </li>
      <hr class="sidebar-divider">




      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link" href="a_change.php">
          <i class="fas fa-fw fa-exchange-alt"  style="color:black"></i>
          <span  style="color:black">Change Password</span>
        </a>

      </li>
      <hr class="sidebar-divider">
      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link" href="a_register.php">
          <i class="fas fa-fw fa-user"  style="color:black"></i>
          <span  style="color:black">Register</span>
        </a>

      </li>

      <!-- Nav Item - Tables -->

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content" style="background-color:#EEE9E5;">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3" style="color:black;">
            <i class="fa fa-bars" style="color:black;"></i>
          </button>