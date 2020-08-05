<?php
session_start();
require 'db.php'; 

$_SESSION["Latest_path"]="images/sample.png";;

  $target_dir = "uploads/postpics/";


$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}



// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";

} else {



   if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
  
  $path= 'uploads/postpics/'. basename($_FILES["fileToUpload"]['name']);
  header('Location:addrecipe2.php');
  echo '<script>alert("Successfully uploaded the image ")</script>';

  } else {
    echo "Sorry, there was an error uploading your file.";
  }




}


$logger_id=$_SESSION['LoggedUID'];






$q3="INSERT INTO post_data(P_ID,U_ID,Post_Pic) VALUES(null,'$logger_id','$path')";

mysqli_query($conn,$q3);

$last_id = mysqli_insert_id($conn);
//$_SESSION["Latest_pic_new"]=$last_id;

$_SESSION["Latest_path"]=$path;



?>