<?php


error_reporting(0);
session_start();
include "conn.php";


function check($data){
  $data= trim($data);
  $data= htmlspecialchars($data);
  $data= stripslashes($data);
  $data = mysqli_real_escape_string($con, $data);
  return $data;
}


if(isset($_POST["login"])){
  $uname = $_POST['username'];
  $pword = md5($_POST['password']);
  //$rem = $_COOKIE['rememberme'];
  $sql = "SELECT * FROM tenant WHERE u_name = '$uname' AND p_word = '$pword'";
  $sql1 = "SELECT * FROM user WHERE u_name = '$uname' AND pword = '$pword'";
  $query = mysqli_query($con, $sql);
  $query1 = mysqli_query($con, $sql1);
  $row = mysqli_fetch_assoc($query);
  $row1 = mysqli_fetch_assoc($query1);
    $test =mysqli_query($con,$sql1);
  $date=mysqli_fetch_assoc($test);  
       echo $ids=$date['user_id'];
setcookie("manager_ids",$ids,time()+6000); 

    $tenant =mysqli_query($con,$sql);
  $tenantrow=mysqli_fetch_assoc($tenant);  
       echo $tenantid=$tenantrow['tenant_id'];
setcookie("manager_id",$tenantid,time()+6000); 


  do {
    $role = $row1['role'];
    $row1 = mysqli_fetch_assoc($query1);
  } while ($row1);

  do{
    $fname = $row['fname'];

    $lname = $row['lname'];

    $stat = $row['status'];

    $id = $row['tenant_id'];
    $sql2 = "SELECT * FROM contract WHERE tenant_id = '$id'";
    $query2 = mysqli_query($con, $sql2);
    $row1 = mysqli_fetch_assoc($query2);

    do{
      $end_date = $row1['end_day'];
      $h_id = $row1['room_id'];
      $row1 = mysqli_fetch_assoc($query2);
    }while ($row1);
    $row = mysqli_fetch_assoc($query);

  }while ($row);



  if ((mysqli_num_rows($query) == 1) || (mysqli_num_rows($query1) == 1)) {



    if($role == "Administrator"){
      $_SESSION['username'] = $uname;
      echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
      echo "<script type='text/javascript'>
        Swal.fire({
          title: 'Welcome $uname!',
          icon: 'success',
          confirmButtonText: 'Continue'
        }).then((result) => {
          if (result.isConfirmed) {
            window.location.href = 'admin_home.php';
          }
        });
      </script>";   

    }
    elseif ($role == "Caretaker") {
      $_SESSION['username'] = $uname;
      echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
      echo "<script type='text/javascript'>
          document.addEventListener('DOMContentLoaded', function() {
              Swal.fire({
                  title: 'Welcome $uname!',
                  icon: 'success',
                  confirmButtonText: 'Continue'
              }).then((result) => {
                  if (result.isConfirmed) {
                      window.location.href = 'manager_home.php';
                  }
              });
          });
        </script>";
  }  
    else {

      if ($stat == 0) {
        $_SESSION['username'] = $uname;
        $_SESSION['userid'] = $id;
        ; 
        echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
      echo "<script type='text/javascript'>
        Swal.fire({
          title: 'Welcome $fname $lname!!',
          icon: 'success',
          confirmButtonText: 'Continue'
        }).then((result) => {
          if (result.isConfirmed) {
            window.location.href = 'redirect.php';
          }
        });
      </script>";   

      }elseif ($stat == 1) {
        $_SESSION['username'] = $uname;
        echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
        echo "<script type='text/javascript'>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: 'Welcome $fname $lname!',
                    icon: 'success',
                    confirmButtonText: 'Continue'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = 'redirect.php';
                    }
                });
            });
          </script>";
      }elseif ($stat == 2) {
        $_SESSION['username'] = $uname;
        echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
        echo "<script type='text/javascript'>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: 'Your Acount has Deactivate',
                    icon: 'warning',
                    confirmButtonText: 'Continue'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = 'login.php';
                    }
                });
            });
          </script>";
      }elseif((date('Y-m-d') > $end_date) && $stat == 1){
        $sql3 = "UPDATE tenant SET status = '3' WHERE tenant_id = '$id'";
        mysqli_query($con, $sql3);
        $sql5 = "UPDATE contract SET status ='Inactive' WHERE status = 'Active' AND tenant_id = '$id'";
        mysqli_query($con, $sql5);
        $sql5 = "UPDATE room SET status ='Available' WHERE room_id = '$h_id'";
        mysqli_query($con, $sql5);
        $_SESSION['username'] = $uname;
        echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
        echo "<script type='text/javascript'>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: 'Welcome $fname $lname!',
                    icon: 'success',
                    confirmButtonText: 'Continue'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = 'home.php';
                    }
                });
            });
          </script>";

      }elseif ($stat == 3) {
        $_SESSION['username'] = $uname;
        echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
        echo "<script type='text/javascript'>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: 'Welcome $fname $lname!',
                    icon: 'success',
                    confirmButtonText: 'Continue'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = 'home.php';
                    }
                });
            });
          </script>";
      }
    }
    mysqli_close($con);
    $uname = "";


  }else {
    echo "<script style = 'color:red;'> alert('Incorrect Username or Password!!!')</script>";
  }


}
?>

<style type="text/css">
 .field-icon {
  float: right;
  margin-left: 310px;
  margin-top: -32px;
  position: absolute;
  z-index: 2;
}

.container{
  padding-top:50px;
  margin: auto;
}



</style>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>JDS Room Rental Web Application</title>
  <link rel="icon" href="img/jdslogo.png">

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body style="background-color:gray;">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block"><img src="home.jpg" alt="Rental Room" width="500" height="530" style="opacity:0.6;"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4"><b><b>JDS ROOM RENTAL WEB APPLICATION SYSTEM</b></b><br/><br/>Login</h1>
                  </div>
                  <form class="user" action="<?php echo $_SERVER['PHP_SELF']; ?>" method = "POST">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" name="username" aria-describedby="emailHelp" value="<?php echo @$uname; ?>" placeholder="Username">
                    </div>



                    <div class="form-group">
                     
                      <input id="password-field" type="password" class="form-control form-control-user" name="password" placeholder="Password">
                      <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                      </div>
                      <input class="btn btn-primary btn-user btn-block" type="submit" name="login" value="Login">
                    </form>
                    <hr>
                    <div class="text-center">
                      <a class="small" href="forgot-password.php">Forgot Password?</a>
                    </div>
                    <div class="text-center">
                      <a class="small" href="tenantregister.php">Create an Account!</a>
                    </div>
                    <div class="text-center">
                      <a class="small" href="index.php">Home</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
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

  </body>

  </html>


  <script type="text/javascript">
    $(document).ready(function(){

      $(".toggle-password").click(function() {

        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
          input.attr("type", "text");
        } else {
          input.attr("type", "password");
        }
      });


    });

  </script>