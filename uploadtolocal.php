<?php
session_start();
require 'db.php'; 

$logger_id=$_SESSION['LoggedUID'];

$rand= uniqid();



$info = pathinfo($_FILES['fileToUpload']['name']);
$ext = $info['extension']; 
$newname = $rand.".".$ext; 

$target = 'uploads/profilepics/'.$newname;

move_uploaded_file( $_FILES['fileToUpload']['tmp_name'], $target);




$q1= "UPDATE Userinfo SET profilepic='$target' WHERE ID='$logger_id' ";
if(mysqli_query($conn,$q1))
{
   header('Location:profile.php');
}












?>