<?php


session_start();
require 'db.php';
$LoggedUID= $_SESSION["LoggedUID"];



if(isset($_POST["Title"])||isset($_POST["description"])||isset($_POST["Start_date"])||isset($_POST["End_date"]))
{
  $title=$_POST["Title"];
  $descp=$_POST["description"];
  $s_date=$_POST["Start_date"];

  $e_date=$_POST["End_date"];

  $winner="Yet to be Announced";

  $user=get_user($LoggedUID);



  $q2="INSERT INTO comp_data VALUES(null,'$LoggedUID','$title','$descp','$s_date','$e_date','$winner')";
  
if($user["goldb"]>1||$user["silverb"]>2||$user["bronzeb"]>3)
{
  if(mysqli_query($conn,$q2))
{

header("Location:compete.php");

}
}

else
{
	echo "<script> alert('Insufficient Badges') </script>";
	header("Location:compete.php");
}

}



?>