<?php
session_start();
include "conn.php";
if (!$_SESSION['username']) {
    echo '<script>window.location.href = "login.php";</script>';
    exit();
}
?>
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
                                <h1 class="h4 text-gray-900 mb-4"><b><b>Please Fill Up Your Contact Information To Proceed!</b></b></h1>
                            </div>

                            <form class="user" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
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
                                            <input type="email" class="form-control form-control-user" name="email1" value="<?php echo @$cemail1; ?>" placeholder="Email Address">
                                        </div>

                                    </div>



                                </div>
                            

                                <hr>
                                <center>

                                    <input class="btn btn-primary btn-user btn-sm" type="submit" name="submit" value="Submit Contact">

                                </center>

                            </form>
                            <?php
                            if (isset($_POST["submit"])) {
                                $fname1 = $_POST['fname1'];
                                $lname1 = $_POST['lname1'];
                                $occu1 = $_POST['occu1'];
                                $cpno1 = $_POST['cpno1'];
                                $nature1 = $_POST['nature1'];
                                $city1 = $_POST['city1'];
                                $email1 = $_POST['email1'];
                                


                                $sql = "SELECT * FROM tenant WHERE u_name= '" . $_SESSION["username"] . "' ";
                                $query = mysqli_query($con, $sql);
                                $result = mysqli_fetch_assoc($query);
                                do {
                                    $id2 = $result['tenant_id'];

                                    $sql1 = "INSERT INTO `tenant_contacts`(tenant_id,fname1,lname1,occupation1,nature1,pno1,city1,e_address1) 
                                    VALUES ('$id2','$fname1','$lname1','$occu1','$nature1','$cpno1','$city1','$email1')";
                                    mysqli_query($con, $sql1);

                                    $result = mysqli_fetch_assoc($query);
                                } while ($result);
                                echo '<script>alert("Contact Submitted Successfully")</script>';
                                echo '<script>window.location.href="home.php";</script>';
                               
                            }
                            ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>

</html>