<?php
session_start();
require 'db.php'; 
  $rand= uniqid();



  $target_dir = "uploads/postpics/";


$imageFileType = pathinfo($_FILES["fileToUpload"]["tmp_name"]);

$ext=$imageFileType["extension"];

echo $ext;

$target_file = $target_dir.$rand.$ext;

$uploadOk = 1;


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




if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";

} else {




   if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
  

  $path= 'uploads/postpics/'.$rand.".".$imageFileType;//.basename($_FILES["fileToUpload"]['name']);
  //header('Location:addrecipe2.php');
  echo '<script>alert("Successfully uploaded the image ")</script>';

  } else {
    echo "Sorry, there was an error uploading your file.";
  }




}






$postid=$_SESSION["newpost_id"];


echo $path;

$q5="INSERT INTO steps_pic VALUES ('$postid',null,'$path')";
mysqli_query($conn,$q5);

//$last_id = mysqli_insert_id($conn);
//$_SESSION["Latest_pic_new"]=$last_id;

//$_SESSION["Latest_path"]=$path;



?>