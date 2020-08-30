<?php

session_start();
require 'db.php'; 
$rand= uniqid();


$info = pathinfo($_FILES['fileToUpload']['name']);
$ext = $info['extension']; // get the extension of the file
$newname = $rand.".".$ext; 

$target = 'uploads/postpics/'.$newname;
move_uploaded_file( $_FILES['fileToUpload']['tmp_name'], $target);

echo $target;



$postid=$_SESSION["newpost_id"];

echo $postid;

$q5="INSERT INTO steps_pic VALUES('$postid',null,'$target')";
mysqli_query($conn,$q5);


$last_id = mysqli_insert_id($conn);
$_SESSION["Latest_step_pic"]=$last_id;


?>