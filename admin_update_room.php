
<?php

error_reporting(0);

$image=basename($_FILES["fileToUpload"]["name"]);
if($image==''){


    include 'conn.php';

    $id = $_POST['id'];
    $room_name=$_POST['room_name'];
    $description=$_POST['description'];
    $status = $_POST['status'];
    $cost=$_POST['cost'];
    $images=$_POST['image'];
    $sql = "UPDATE room  SET   room_name='$room_name', status='$status' ,description='$description',rent_per_month='$cost',compartment='$compartment',imagepath='$images' WHERE room_id = '$id'";
    mysqli_query($con, $sql);
    mysqli_close($con);

    
    echo "<script type='text/javascript'>alert('Updated Successfully!!!');</script>";
    echo '<style>body{display:none;}</style>';
    echo '<script>window.location.href = "room_detail.php";</script>';



}else{

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

            include 'conn.php';

            $id = $_POST['id'];
            $room_name=$_POST['room_name'];
            $description=$_POST['description'];
            $cost=$_POST['cost'];
            $sql = "UPDATE room SET   room_name='$room_name',description='$description',rent_per_month='$cost',compartment='$compartment',imagepath='$image' WHERE room_id = '$id'";
            mysqli_query($con, $sql);
            mysqli_close($con);
            echo "<script type='text/javascript'>alert('Updated Successfully!!!');</script>";
            echo '<style>body{display:none;}</style>';
              echo '<script>window.location.href = "room_detail.php";</script>';



        } 
        else 
        {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}


}

?>











