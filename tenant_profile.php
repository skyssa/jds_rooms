
<?php
error_reporting(0);
$target_dir = "img/";
$target_file = $target_dir . basename($_FILES["profile_image"]["name"]);
$profile_image=basename($_FILES["profile_image"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) 
{
    $check = getimagesize($_FILES["profile_image"]["tmp_name"]);
    if($check !== false) 
    {
        $uploadOk = 1;

    } 
    else 
    {
        echo '<script>alert("File is not an image!")</script>';
        $uploadOk = 0;
    }
// // Check if file already exists
// if (file_exists($target_file)) {
//     echo "Sorry, file already exists.";
//     $uploadOk = 0;
// }
// // Check file size
// if ($_FILES["fileToUpload"]["size"] > 500000) {
//     echo "Sorry, your file is too large.";
//     $uploadOk = 0;
// }
// Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["profile_image"]["tmp_name"], $target_file)) 
    {

        include 'conn.php';

   
                     $tenant = $_POST['id'];
                     $fname =  $_POST['fname'];
                     $lname = $_POST["lname"];
                     $programme = $_POST['programme'];
                     $reg_no =  $_POST['reg_no'];
                     $occupation = $_POST["occupation"];
                     $p_no = $_POST['p_no'];
                     $pno1 =  $_POST['pno1'];
                     $e_address = $_POST["e_address"];
                     $p_address = $_POST['p_address'];
                     $city =  $_POST['city'];
                     $region = $_POST["region"];
                     $uname =  $_POST['uname'];
                     $day_reg = $_POST["day_reg"];
                     $city =  $_POST['city'];
                     $profile_image = $_POST["profile_image"];
                     $status = '';
                     
                     $sql= "INSERT INTO tenant (tenant_id,fname,lname,programme,reg_no,occupation,p_no,pno1,e_address,p_address,city,region,uname,day_reg,city,profile_image,status)
                     VALUES ('$tenant_id,$fname,$lname,$programme,$reg_no,$occupation,$p_no,$pno1,$e_address,$p_address,$city,$region,$uname,$day_reg,$city,$profile_image',$status')";
                     mysqli_query($con, $sql);
                     mysqli_close($con);
                     echo "<script type='text/javascript'>alert('The ID has been added successfully.');</script>";
                     echo '<style>body{display:none;}</style>';
                       header("Location:tenant_detail.php");
                 
    } 
    else 
    {
        echo "Sorry, there was an error uploading your file.";
    }
}
}
?>











