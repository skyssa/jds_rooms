<?php   

error_reporting(0);
include 'conn.php';



$target_dir = "img/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$image=basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));



// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) 
{
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
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
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) 
    {
      

$payment_id=mysqli_real_escape_string($con,$_POST['idget']);
$reference=mysqli_real_escape_string($con,$_POST['reference']);
$sender=mysqli_real_escape_string($con,$_POST['sender']);

$query="UPDATE `payment` SET `status`='Pending Review',`picture`='$image',`ref_no`='$reference',`sender`='$sender' WHERE payment_id='$payment_id'";
$mysql=mysqli_query($con,$query);

  echo '<script>
  alert("UPDATE PAYMENT SUCCESS");
  window.location.href="admin_upay.php";
  </script>';

    } 
    else 
    {
        echo "Sorry, there was an error uploading your file.";
    }
}
}
?>











=