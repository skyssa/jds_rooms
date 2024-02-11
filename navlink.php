  <!-- Sidebar -->
    
<style type="text/css">
.sidebar-dark #sidebarToggle {
    background-color: hsl(0deg 0% 13%);
}
  
 .sidebar-dark .nav-item .nav-link[data-toggle=collapse]::after{
    color:black;
 /* Notice we changed from white to the yellow */
}
</style>

    <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: hsl(240deg 7% 62% / 23%);">

      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="admin_home.php" style="margin-top:6%;margin-right:40%;">
         <div><img src="img/jdslogo.png" style="width:99%;"></div><br>
      
     </a>

           <div class="sidebar-brand-text mx-3 mt-3" style="color:black;">JDS Room Rental</div>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="home.php">
          <i class="fas fa-fw fa-tachometer-alt" style="color:black;"></i>
          <span style="color:black;">Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-user fa-cog" style="color:black;"></i>
          <span style="color:black;">Profile</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header" style="color:black;">Details:</h6>
            <a class="collapse-item" href="u_personal.php" style="color:black;">Personal Information</a>
            <a class="collapse-item" href="u_contact.php" style="color:black;">Contact Information</a>
            <a class="collapse-item" href="upay.php" style="color:black;">Payment Information</a>
            <a class="collapse-item" href="u_contract.php" style="color:black;">Contract</a>
          </div>
        </div>
      </li>
      <hr class="sidebar-divider">




      <!-- Nav Item - Pages Collapse Menu -->
      

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link" href="contract.php">
          <i class="fas fa-fw fa-exchange-alt" style="color:black;"></i>
          <span style="color:black;">Contract</span>
        </a>

      </li>


      <!-- <hr class="sidebar-divider">
      <li class="nav-item">
        <a class="nav-link" href="form_in.php">
          <i class="fas fa-fw fa-clipboard-list" style="color:black;"></i>
          <span style="color:black;">Room-In Condition Form</span>
        </a>

      </li> -->

        <hr class="sidebar-divider">
      <li class="nav-item">
        <a class="nav-link" href="report_tenant.php">
          <i class="fas fa-fw fa-clipboard-list" style="color:black;"></i>
          <span style="color:black;">Report</span>
        </a>

      </li>
     
      <hr class="sidebar-divider">

       <li class="nav-item">
        <a class="nav-link" href="rental_cha_view.php">
          <i class="fas fa-fw fa-comments"  style="color:black"></i>
          <span  style="color:black">Message</span></a>
      </li>

      <!-- Nav Item - Tables -->

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">
      <li class="nav-item">
        <a class="nav-link" href="u_change.php">
          <i class="fas fa-fw fa-exchange-alt" style="color:black;"></i>
          <span style="color:black;">Change Password</span>
        </a>

      </li>
      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>