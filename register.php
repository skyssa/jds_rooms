<?php
error_reporting(0);
include "conn.php";

function check($data)
{
  $data = trim($data);
  $data = htmlspecialchars($data);
  $data = stripslashes($data);
  return $data;
}

if (isset($_POST["submit"])) {

  $fname = check($_POST['FirstName']);
  $lname = check($_POST['LastName']);
  $prog = @check($_POST['programme']);
  $reg = @check($_POST['regno']);
  $occ = @check($_POST['occupation']);
  $pno1 = check($_POST['pno1']);
  $pno2 = check($_POST['pno2']);
  $postal = check($_POST['postal']);
  $city = check($_POST['city']);
  $region = check($_POST['region']);
  $uname = check($_POST['uname']);
  $pword = check($_POST['password']);
  $rpword = check($_POST['repeatPassword']);
  $profile_image = check($_POST['profile_image']);


  $cpno1 = check($_POST['cpno1']);



  $cfname1 = check($_POST['fname1']);

  $clname1 = check($_POST['lname1']);

  $c_occu1 = check($_POST['occu1']);

  $nature1 = check($_POST['nature1']);

  $city1 = check($_POST['city1']);

  $region1 = check($_POST['region1']);

  $cemail1 = filter_var($_POST['email1'], FILTER_SANITIZE_EMAIL);

  $p_address1 = check($_POST['p_address1']);


  if (date('d') < 27) {
    $end_date = date('Y-m-t', strtotime('+' . $dur1 . ' month'));
  } else {
    $end_date = date('Y-m-t', strtotime('+' . $dur1 . ' month'));
  }
  if ((date('d') < 27)) {
    $start_day = date('Y-m-01');
  } else {
    $start_day = date('Y-m-01', strtotime('+1 month'));
  }
  $date_reg = date('Y-m-d');
  $date_reg1 = date('Y-m-d H:i:s');
  $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
  $stat = "Active";
  $status = 0;


  if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    if (!ctype_alpha($fname)) {
      $fnameErr = "The name should only contain letters!";
      echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
      echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: 'Error!',
                    text: '$fnameErr',
                    icon: 'error',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    // Handle the result if needed
                });
            });
        </script>";
    } elseif ((strlen($fname) < 3) || (strlen($fname) > 20)) {
      $fnameErr = "The name is either too short or too long";
      echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
      echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: 'Error!',
                    text: '$fnameErr',
                    icon: 'error',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    // Handle the result if needed
                });
            });
        </script>";
    } else {
      if (!ctype_alpha($lname)) {
        $lnameErr = "The name should only contain letters!";
        echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
        echo "<script>
              document.addEventListener('DOMContentLoaded', function() {
                  Swal.fire({
                      title: 'Error!',
                      text: '$lnameErr',
                      icon: 'error',
                      confirmButtonText: 'OK'
                  }).then((result) => {
                      // Handle the result if needed
                  });
              });
          </script>";
      } elseif ((strlen($lname) < 3) || (strlen($lname) > 20)) {
        $lnameErr = "The name is either too short or too long";
        echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
        echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: 'Error!',
                    text: '$lnameErr',
                    icon: 'error',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    // Handle the result if needed
                });
            });
        </script>";
      } else {
        if ((ctype_digit($occ)) && !($occ == "")) {
          $occErr = "Your occupation should only contain letters!";
          echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
          echo "<script>
              document.addEventListener('DOMContentLoaded', function() {
                  Swal.fire({
                      title: 'Error!',
                      text: '$occErr',
                      icon: 'error',
                      confirmButtonText: 'OK'
                  }).then((result) => {
                      // Handle the result if needed
                  });
              });
          </script>";
        } else {
          if ((!is_numeric($pno1)) || (!is_numeric($pno2))) {
            $pno1Err = "The phone number should not contain letters";
            echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
            echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        title: 'Error!',
                        text: '$pno1Err',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        // Handle the result if needed
                    });
                });
            </script>";
          } elseif ((strlen($pno1) > 11) || (strlen($pno2) > 11)) {
            $pno1Err = "The phone number is too long";
            echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
            echo "<script>
              document.addEventListener('DOMContentLoaded', function() {
                  Swal.fire({
                      title: 'Error!',
                      text: '$pno1Err',
                      icon: 'error',
                      confirmButtonText: 'OK'
                  }).then((result) => {
                      // Handle the result if needed
                  });
              });
          </script>";
          } elseif ((strlen($pno1) < 10) || (strlen($pno2) < 10)) {
            $pno1Err = "The phone number is too short";
            echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
            echo "<script>
              document.addEventListener('DOMContentLoaded', function() {
                  Swal.fire({
                      title: 'Error!',
                      text: '$pno1Err',
                      icon: 'error',
                      confirmButtonText: 'OK'
                  }).then((result) => {
                      // Handle the result if needed
                  });
              });
          </script>";
          } else {
            if (!is_numeric($cpno1)) {
              $cpno1Err = "The phone number should not contain letters";
              echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
              echo "<script>
                  document.addEventListener('DOMContentLoaded', function() {
                      Swal.fire({
                          title: 'Error!',
                          text: '$cpno1Err',
                          icon: 'error',
                          confirmButtonText: 'OK'
                      }).then((result) => {
                          // Handle the result if needed
                      });
                  });
              </script>";
            } elseif (strlen($cpno1) > 11) {
              $cpno1Err = "The phone number is too long";
              echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
              echo "<script>
                  document.addEventListener('DOMContentLoaded', function() {
                      Swal.fire({
                          title: 'Error!',
                          text: '$cpno1Err',
                          icon: 'error',
                          confirmButtonText: 'OK'
                      }).then((result) => {
                          // Handle the result if needed
                      });
                  });
              </script>";
            } elseif ((strlen($cpno1) < 10)) {
              $cpno1Err = "The phone number is too short";
              echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
              echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        title: 'Error!',
                        text: '$cpno1Err',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        // Handle the result if needed
                    });
                });
            </script>";
            } else {
              if ((!ctype_alpha($cfname1)) || (!ctype_alpha($clname1))) {
                $cfname1Err = "The name should only contain letters!";
                echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
                echo "<script>
                    document.addEventListener('DOMContentLoaded', function() {
                        Swal.fire({
                            title: 'Error!',
                            text: '$cfname1Err',
                            icon: 'error',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            // Handle the result if needed
                        });
                    });
                </script>";
              } elseif ((strlen($cfname1) < 3)) {
                $cfname1Err = "The name is too short";
                echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
                echo "<script>
                    document.addEventListener('DOMContentLoaded', function() {
                        Swal.fire({
                            title: 'Error!',
                            text: '$cfname1Err',
                            icon: 'error',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            // Handle the result if needed
                        });
                    });
                </script>";
              } elseif ((strlen($clname1) < 3)) {
                $clname1Err = "The name is too short";
                echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
                echo "<script>
                    document.addEventListener('DOMContentLoaded', function() {
                        Swal.fire({
                            title: 'Error!',
                            text: '$clname1Err',
                            icon: 'error',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            // Handle the result if needed
                        });
                    });
                </script>";
              } elseif ((strlen($cfname1) > 10)) {
                $cfname1Err = "The name is too long";
                echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
                echo "<script>
                    document.addEventListener('DOMContentLoaded', function() {
                        Swal.fire({
                            title: 'Error!',
                            text: '$cfname1Err',
                            icon: 'error',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            // Handle the result if needed
                        });
                    });
                </script>";
              } elseif ((strlen($clname1) > 10)) {
                $clname1Err = "The name is too long";
                echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
                echo "<script>
                  document.addEventListener('DOMContentLoaded', function() {
                      Swal.fire({
                          title: 'Error!',
                          text: '$clname1Err',
                          icon: 'error',
                          confirmButtonText: 'OK'
                      }).then((result) => {
                          // Handle the result if needed
                      });
                  });
              </script>";
              } else {
                if ((ctype_digit($nature1))) {
                  $nature1Err = "Nature of the relationship should only contain letters!";
                  echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
                  echo "<script>
                      document.addEventListener('DOMContentLoaded', function() {
                          Swal.fire({
                              title: 'Error!',
                              text: '$nature1Err',
                              icon: 'error',
                              confirmButtonText: 'OK'
                          }).then((result) => {
                              // Handle the result if needed
                          });
                      });
                  </script>";
                } else {
                  if ((!filter_var($cemail1, FILTER_VALIDATE_EMAIL)) && !($cemail1 == "")) {
                    $cemail1Err = "Invalid Email";
                    echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
                    echo "<script>
                          document.addEventListener('DOMContentLoaded', function() {
                              Swal.fire({
                                  title: 'Error!',
                                  text: '$cemail1Err',
                                  icon: 'error',
                                  confirmButtonText: 'OK'
                              }).then((result) => {
                                  // Handle the result if needed
                              });
                          });
                      </script>";
                  } else {
                    $sql4 = "SELECT * FROM tenant WHERE u_name = '$uname'";
                    $query = mysqli_query($con, $sql4);
                    if (mysqli_num_rows($query) > 0) {
                      echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
                      echo "<script>
                              document.addEventListener('DOMContentLoaded', function() {
                                  Swal.fire({
                                      title: 'Error!',
                                      text: 'Username exists!!',
                                      icon: 'error',
                                      confirmButtonText: 'OK'
                                  }).then((result) => {
                                      // Handle the result if needed
                                  });
                              });
                          </script>";
                    } else {
                      if ((strlen($pword) < 1) || (strlen($rpword) < 1)) {
                        echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
                        echo "<script>
                                  document.addEventListener('DOMContentLoaded', function() {
                                      Swal.fire({
                                          title: 'Error!',
                                          text: 'Password is too short',
                                          icon: 'error',
                                          confirmButtonText: 'OK'
                                      }).then((result) => {
                                          // Handle the result if needed
                                      });
                                  });
                              </script>";
                      } elseif ($pword == $rpword) {
                        $pword = md5($pword);
                        $sql = "INSERT INTO tenant VALUES (' ','$fname','$lname','$prog','$reg','$occ','$pno1','$pno2','$email','$postal','$city','$region','$uname','$pword', '$date_reg', '$status','$profile_image')";

                        mysqli_query($con, $sql);

                        $last_id = mysqli_insert_id($con);

                        $sql2 = "INSERT INTO tenant_contacts VALUES (' ','$last_id','$cfname1','$clname1','$c_occu1','$nature1','$cpno1','','$cemail1','$p_address1','$city1','$region1','','','','','','', '', '', '', '')";

                        mysqli_query($con, $sql2);

                        echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
                        echo "<script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    Swal.fire({
                                        title: 'Success!',
                                        text: 'Welcome to JDS ROOM RENTAL $fname $lname!',
                                        icon: 'success',
                                        confirmButtonText: 'OK'
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            window.location.href = 'login.php';
                                        }
                                    });
                                });
                            </script>";
                      } else {
                        echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
                        echo "<script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    Swal.fire({
                                        title: 'Error!',
                                        text: 'Password does not match',
                                        icon: 'error',
                                        confirmButtonText: 'OK'
                                    });
                                });
                            </script>";
                      }
                    }
                  }
                }
              }
            }
          }
        }
      }
    }
  } else {
    $emailErr = "Invalid Email";
    echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
    echo "<script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: 'Error!',
                text: '$emailErr',
                icon: 'error',
                confirmButtonText: 'OK'
            });
        });
    </script>";
  }
}
?>
<style type="text/css">
  .field-icon {
    float: right;
    margin-left: 450px;
    margin-top: -32px;
    position: absolute;
    z-index: 2;
  }

  .container {
    padding-top: 50px;
    margin: auto;
  }
</style>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="wnameth=device-wnameth, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Rental Room Management System</title>
  <link rel="icon" href="img/jdslogo.png">

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

</head>

<body style="background-image: linear-gradient(white,#4e73dd,#4e73df); background-size: cover;">



  <div class="container">

    <div class="card o-hnameden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">

          <div class="col-lg-12">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4"><b><b>REGISTRATION</b></b></h1>
              </div>
              <p><span style="color:#4e73df;"><b><b>PERSONAL PARTICULARS</b></b></span></p>
              <form class="user" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <div class="form-group row">
                  <div class="col-sm-6 ">
                    <input type="text" class="form-control form-control-user" name="FirstName" value="<?php echo @$fname; ?>" placeholder="First Name" required>
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" name="LastName" value="<?php echo @$lname; ?>" placeholder="Last Name" required>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    Are you a student?&nbsp&nbsp&nbsp
                    <input type="radio" name="radio" value="Enable" required>Yes
                  </div>
                  <div class="col-sm-6">
                    <input type="radio" name="radio" value="Disable">No
                  </div>

                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" name="programme" value="<?php echo @$prog; ?>" placeholder="Programme e.g; COURSE" disabled>
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" name="regno" value="<?php echo @$reg; ?>" placeholder="Registration Number" disabled>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" name="occupation" value="<?php echo @$occ; ?>" placeholder="Occupation" disabled>
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" name="pno1" value="<?php echo @$pno1; ?>" placeholder="Phone Number 1 e.g; 0922*******" required>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" name="pno2" value="<?php echo @$pno2; ?>" placeholder="Phone Number 2 e.g; 0922*******" required>
                  </div>
                  <div class="col-sm-6">
                    <input type="email" class="form-control form-control-user" name="email" value="<?php echo @$email; ?>" placeholder="Email Address" required>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" name="postal" value="<?php echo @$postal; ?>" placeholder="Postal Address" required>
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" name="city" value="<?php echo @$city; ?>" placeholder="City" required>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" name="region" value="<?php echo @$region; ?>" placeholder="Region" required>
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" name="uname" value="<?php echo @$uname; ?>" placeholder="Username" required>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input id="password-field" type="password" class="form-control form-control-user" name="password" placeholder="Password" required>
                    <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" name="repeatPassword" placeholder="Repeat Password" required>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">


                      <label for="profile_image">Upload your ID </label>
                      <input type="file" class="form-control-file" name="profile_image" accept="image/*" value="<?php echo @$profile_image; ?>" placeholder="Image" required>
                    </div>
                  </div>
                </div>
                <hr>


                <hr>
                <p><span style="color:#4e73df;"><b><b>CONTACT'S INFORMATION</b></b></span></p>
                <div class="row">


                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" name="fname1" value="<?php echo @$cfname1; ?>" placeholder="First Name" required>
                    </div>

                  </div>


                  <div class="col-md-6">
                    <div class="form-group ">
                      <input type="text" class="form-control form-control-user" name="lname1" value="<?php echo @$clname1; ?>" placeholder="Last Name" required>
                    </div>

                  </div>

                  <div class="col-md-6">
                    <div class="form-group ">
                      <input type="text" class="form-control form-control-user" name="occu1" value="<?php echo @$c_occu1; ?>" placeholder="Occupation" required>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group ">
                      <input type="text" class="form-control form-control-user" name="cpno1" value="<?php echo @$cpno1; ?>" placeholder="Phone Number 1 e.g; 0922*******" required>
                    </div>
                  </div>


                  <div class="col-md-6">
                    <div class="form-group ">
                      <input type="text" class="form-control form-control-user" name="nature1" value="<?php echo @$nature1; ?>" placeholder="Nature of the Relationship" required>
                    </div>

                  </div>

                  <div class="col-md-6">
                    <div class="form-group ">
                      <input type="text" class="form-control form-control-user" name="city1" value="<?php echo @$city1; ?>" placeholder="City" required>
                    </div>

                  </div>

                  <div class="col-md-6">
                    <div class="form-group ">
                      <input type="text" class="form-control form-control-user" name="region1" value="<?php echo @$region1; ?>" placeholder="Region" required>
                    </div>

                  </div>

                  <div class="col-md-6">
                    <div class="form-group ">
                      <input type="email" class="form-control form-control-user" name="email1" value="<?php echo @$cemail1; ?>" placeholder="Email Address">
                    </div>

                  </div>

                  <div class="col-md-6">
                    <div class="form-group ">
                      <input type="text" class="form-control form-control-user" name="p_address1" value="<?php echo @$p_address1; ?>" placeholder="Postal Address" required>
                    </div>
                  </div>

                </div>


                <hr>
                <center>

                  <input class="btn btn-primary btn-user btn-sm" type="submit" name="submit" value="Register Account">

                </center>

              </form>

              <div class="text-center">
                <a class="small" href="forgot-password.php">Forgot Password?</a>
              </div>
              <div class="text-center">
                <a class="small" href="login.php">Already have an account? Login!</a>
              </div>
              <div class="text-center">
                <a class="small" href="index.php">HOME</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
  <script type="text/javascript">
    $('input[name = "radio"]').on('change', function() {
      $('input[name = "programme"]').attr('disabled', this.value != "Enable");
      $('input[name = "regno"]').attr('disabled', this.value != "Enable");
      $('input[name = "occupation"]').attr('disabled', this.value != "Disable");
      $('input[name = "programme"]').attr('required', this.value == "Enable");
      $('input[name = "regno"]').attr('required', this.value == "Enable");
      $('input[name = "occupation"]').attr('required', this.value == "Disable");
    });
  </script>





  <script>
    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
    }
  </script>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="js/jquery-1.12.4.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>


</body>

</html>
<script type="text/javascript">
  $(document).ready(function() {

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