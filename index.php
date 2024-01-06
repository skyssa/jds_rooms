<?php
error_reporting(0);
include 'conn.php';
?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <title>Rental Room Management System</title>
  <link rel="icon" href="img/jdslogo.png">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="robots" content="all,follow">
  <!-- Bootstrap CSS-->
  <link rel="stylesheet" href="vendor1/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome CSS-->
  <link rel="stylesheet" href="vendor1/font-awesome/css/font-awesome.min.css">
  <!-- Google fonts - Roboto -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700">
  <!-- owl carousel-->
  <link rel="stylesheet" href="vendor1/owl.carousel/assets/owl.carousel.css">
  <link rel="stylesheet" href="vendor1/owl.carousel/assets/owl.theme.default.css">
  <!-- theme stylesheet-->
  <link rel="stylesheet" href="css1/style.default.css" id="theme-stylesheet">
  <!-- Custom stylesheet - for your changes-->
  <link rel="stylesheet" href="css1/custom.css">
  <!-- Favicon-->
  <link rel="shortcut icon" href="img/jdslogo.png">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
      </head>
      <body>
        <!-- navbar-->
        <header class="header mb-5">
      <!--
      *** TOPBAR ***
      _________________________________________________________
    -->

    <nav class="navbar navbar-expand-lg">
      <div class="container"><a href="index.php" class="navbar-brand home"><img src="img/jdslogo.png" alt="RHMS logo" style="width:80px;" class="d-none d-md-inline-block"></a>
        <div class="col-lg-6 offer mb-3 mb-lg-0"><a href="index.php" class="ml-1"><b><b><b><b><b><b>JDS ROOM RENTAL WEB APPLICATION SYSTEM</b></b></b></b></b></b></a></div>
        <div class="col-lg-6 text-center text-lg-right">
          <ul class="menu list-inline mb-0">
            <li class="list-inline-item"><a href="login.php"><b>Login</a></li></b>
            <li class="list-inline-item"><a href="tenantregister.php"><b>Register</a></li></b>
          </ul>
        </div>

      </div>
    </nav>
    <div id="search" class="collapse">
      <div class="container">
        <form role="search" class="ml-auto">
          <div class="input-group">
            <input type="text" placeholder="Search" class="form-control">
            <div class="input-group-append">
              <button type="button" class="btn btn-primary"><i class="fa fa-search"></i></button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </header>
  <div id="all">
    <div id="content">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div id="main-slider" class="owl-carousel owl-theme">
              <div class="item"><img src="homepage.jpg" alt="" class="img-fluid"></div>
              <div class="item"><img src="101.jpg" alt="" class="img-fluid"></div>
              <div class="item"><img src="102.jpg" alt="" class="img-fluid"></div>
              <div class="item"><img src="103.jpg" alt="" class="img-fluid"></div>
              <div class="item"><img src="104.jpg" alt="" class="img-fluid"></div>
              <div class="item"><img src="room 201.jpg" alt="" class="img-fluid"></div>
              <div class="item"><img src="202.jpg" alt="" class="img-fluid"></div>
              <div class="item"><img src="room 203.jpg" alt="" class="img-fluid"></div>
              <div class="item"><img src="204.jpg" alt="" class="img-fluid"></div>
              <div class="item"><img src="bathroom.jpg" alt="" class="img-fluid"></div>
              <div class="item"><img src="cr boys.jpg" alt="" class="img-fluid"></div>
              <div class="item"><img src="cr girls.jpg" alt="" class="img-fluid"></div>
              
            </div>
            <!-- /#main-slider-->
          </div>
        </div>
      </div>

      <div id="hot">
          <div class="box py-4">
            <div class="container">
              <div class="row">
                <div class="col-md-12">
                  <h2 class="mb-0"><b>List of Rooms</b></h2>
                </div>
              </div>
            </div>
          </div>
          <div class="container">
            <div class="product-slider owl-carousel owl-theme">
              <div class="item">
                <div class="product">
                  <div class="flip-container">
                    <div class="flipper">
                      <div class="front"><a><img src="img/jdslogo.png" alt="" class="img-fluid"></a></div>
                      <div class="back"><a><img src="img/jdslogo.png" alt="" class="img-fluid"></a></div>
                    </div>
                  </div><a class="invisible"><img src="img/jdslogo.png" alt="" class="img-fluid"></a>
                  
                  <!-- /.text-->

                  <!-- /.ribbon-->

                  <!-- /.ribbon-->
                </div>
                <!-- /.product-->
              </div>
              <div class="item">
                <div class="product">
                  <div class="flip-container">
                    <div class="flipper">
                      <div class="front"><a href="login.php"><img src="img/R101.jpg" alt="" class="img-fluid"></a></div>
                      <div class="back"><a href="login.php"><img src="img/R102.jpg" alt="" class="img-fluid"></a></div>
                    </div>
                  </div><a href="login.php" class="invisible"><img src="img/R101.jpg" alt="" class="img-fluid"></a>
                  <center><b> 1,800.00 </b></center></div> </div> 
                 <div class="item">
                <div class="product">
                  <div class="flip-container">
                    <div class="flipper">
                      <div class="front"><a href="login.php"><img src="img/R103.jpg" alt="" class="img-fluid"></a></div>
                      <div class="back"><a href="login.php"><img src="img/R104.jpg" alt="" class="img-fluid"></a></div>
                    </div>
                  </div><a href="login.php" class="invisible"><img src="img/R103.jpg" alt="" class="img-fluid"></a>
                  <center><b> 2,000.00 </b></center></div> </div>
                  <div class="item">
                <div class="product">
                  <div class="flip-container">
                    <div class="flipper">
                      <div class="front"><a href="login.php"><img src="img/R201.jpg" alt="" class="img-fluid"></a></div>
                      <div class="back"><a href="login.php"><img src="img/R203.jpg" alt="" class="img-fluid"></a></div>
                    </div>
                  </div><a href="login.php" class="invisible"><img src="img/R201.jpg" alt="" class="img-fluid"></a>
                  <center><b> 2,500.00 </b></center></div> </div>
                  <div class="item">
                <div class="product">
                  <div class="flip-container">
                    <div class="flipper">
                      <div class="front"><a href="login.php"><img src="img/R203.jpg" alt="" class="img-fluid"></a></div>
                      <div class="back"><a href="login.php"><img src="img/R202.jpg" alt="" class="img-fluid"></a></div>
                    </div>
                  </div><a href="login.php" class="invisible"><img src="img/R203.jpg" alt="" class="img-fluid"></a>
                  <center><b> 3,000.00 </b></center></div> </div>
    
  </div>


</div>
        <!--
        *** ADVANTAGES HOMEPAGE ***
        _________________________________________________________

      
        *** HOT PRODUCT SLIDESHOW ***
        _________________________________________________________
      -->
      <div id="hot">
        <div class="box py-4">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <h2 class="mb-0"><b>Available Rooms</h2></b>
              </div>
            </div>
          </div>
        </div>
        <div class="container">
          <div class="product-slider owl-carousel owl-theme">

          </div>
          <!-- /.product-slider-->
        </div>
        <!-- /.container-->
      </div>
      <!-- /#hot-->
      <!-- *** HOT END ***-->
    </div>
  </div>
</div>
<div class="container" style="margin-bottom:50px;">
  <div class="row">
    <?php include 'conn.php';
    $select="SELECT * FROM `room`  WHERE status='Available' ";
    $my=mysqli_query($con,$select);
    while($row=mysqli_fetch_assoc($my)){
      ?>
      <div class=" card col-md-3  " style="border:5px solid whitesmoke;margin-bottom:2%;">


        <div class="card-body bg-white ">
          <img class="card-img-top" src="img/<?php echo $row['imagepath'];?>" alt="Card image cap" style="width:100%;height:200px;">
          <p style="font-size:20px;color:black;">ROOM <?php echo $row['room_name'];?></p>
          <article>
            <p class="text-muted" style="word-break:break-all;"><?php echo $row['description'];?></p>
            <p >Price : <?php echo $row['rent_per_month'];?> Monthly</p>
          </article>
        </div>





        <!-- /.text-->

        <!-- /.ribbon-->

        <!-- /.ribbon-->
      </div>

    <?php }?>
  </div>


</div>





<div class="container">
  <div class="row">

    <div>
</div>






<!-- /#footer-->
<!-- *** FOOTER END ***-->


    <!--
    *** COPYRIGHT ***
    _________________________________________________________
  -->
  <!-- Footer -->
  <footer class="text-center text-lg-start bg-white text-muted">
    <!-- Section: Social media -->
    <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
      <!-- Left -->
      <div class="me-5 d-none d-lg-block">
        <span>Get connected with us on social networks:</span>
      </div>
      <!-- Left -->

      <!-- Right -->
      <div>
      <html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.fa {
  padding: 3px;
  font-size: 30px;
  width: 40px;
  text-align: center;
  text-decoration: none;
  margin: 5px 2px;
  border-radius: 50%;
}

.fa:hover {
    opacity: 0.9;
}

.fa-facebook {
  background: #3B5998;
  color: white;
}

.fa-twitter {
  background: #55ACEE;
  color: white;
}


.fa-instagram {
  background: red;
  color: white;
}




</style>
</head>
<body>
<!-- Add font awesome icons -->
<a href="https://www.facebook.com/jessa.orocay" class="fa fa-facebook"></a>
<a href="#" class="fa fa-instagram"></a>
<a href="#" class="fa fa-twitter"></a>

</body>
</html>  
      </div>
      <!-- Right -->
    </section>
    <!-- Section: Social media -->

    <!-- Section: Links  -->
    <section class="">
      <div class="container text-left text-md-start mt-5">
        <!-- Grid row -->
        <div class="row mt-3">
          <!-- Grid column -->
          <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
            <!-- Content -->
            <h3 class="text-uppercase fw-bold mb-4">
              <i class="fas fa-gem me-3 text-secondary"></i>ABOUT
            </h3>
            <p>
          <b> Location:</b> Humay-Humay Gun-ob Lapu-Lapu City<br>
          <b>Landmark:</b> Near Public Cemetery <br><br>

<b>Details:</b><br>
*1month advance<br>
#Room Price :<br>
*2k (good for 2)<br> 
*1800 (1 person only)<br> 
*2500 (good for 2 person)<br>
*3k (family / 3- 4 Person)<br>
#With own submeter (18/kpwh)<br>
#100 per head water<br>
#Wifi - P100/month (optional)<br>
#Street parking only for motor<br>
#Common CR but Boy and Girl are separated<br>
#Common Area (Terrace,Kitchen,Laundry and Drying Area)<br>
#With smoke detector and fire exit<br>
#24/7 CCTV protected<br>
#No pets allowed<br>
#Responsible tenants only<br><br>

<b>For Viewing:</b><br> Request for a schedule.
           </p>
         </div>

         <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
          <!-- Links -->
          <h3 class="text-uppercase fw-bold mb-4">Contact</h3>
          <p> <i class="material-icons me-3 text-secondary">&#xe567;</i> Humay humay Lapu2 City</p>
          <p>
            <i class="material-icons me-3 text-secondary">&#xe0be;</i>
            JDS@gmail.com
          </p>
          <p><i class="material-icons  me-3 text-secondary">&#xe0b0;</i> +0932443787</p>
        </div>

        <div class="col-md-5 mx-auto ">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3925.413530634487!2d123.95480137426594!3d10.30875216764749!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33a999ea715597a5%3A0xc679ff98286f52c0!2sHumay-Humay%20Rd%2C%20Lapu-Lapu%20City%2C%20Cebu!5e0!3m2!1sen!2sph!4v1695682164170!5m2!1sen!2sph" style="border:0;width: 460px;height:550px; allowfullscreen="loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

        </div>

        <!-- Grid column -->
      </div>
      <!-- Grid row -->
    </div>
  </section>
  <!-- Section: Links  -->


</footer>

<!--single modal-->

<!-- Footer -->
<!-- *** COPYRIGHT END ***-->
<!-- JavaScript files-->
<script src="vendor1/jquery/jquery.min.js"></script>
<script src="vendor1/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="vendor1/jquery.cookie/jquery.cookie.js"> </script>
<script src="vendor1/owl.carousel/owl.carousel.min.js"></script>
<script src="vendor1/owl.carousel2.thumbs/owl.carousel2.thumbs.js"></script>
<script src="js1/front.js"></script>
</body>
</html>
<script type="text/javascript">
  $(document).ready(function(){


    $("body").on("click",'#singlebtn6',function(){
      $('#singleview6').show();
    });

    $("body").on("click",'.singleclosebtn6',function(){
      $('#singleview6').hide();
    });




    $("body").on("click",'#singlebtn5',function(){
      $('#singleview5').show();
    });

    $("body").on("click",'.singleclosebtn5',function(){
      $('#singleview5').hide();
    });




    $("body").on("click",'#singlebtn4',function(){
      $('#singleview4').show();
    });

    $("body").on("click",'.singleclosebtn4',function(){
      $('#singleview4').hide();
    });




    $("body").on("click",'#singlebtn3',function(){
      $('#singleview3').show();
    });

    $("body").on("click",'.singleclosebtn3',function(){
      $('#singleview3').hide();
    });


  });


</script>