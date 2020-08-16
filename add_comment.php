

<?php

session_start();
require 'db.php';

$LoggedUID= $_SESSION["LoggedUID"];


$user=get_user($LoggedUID);



 $profile_pic_url=$user["profilepic"];

 $curr_recipe=$_SESSION["curr_POST"];

 if(isset($_POST["commenti"]))
 {
  

    $comment=$_POST["commenti"];


  $q2="INSERT INTO comments VALUES (null,'$curr_recipe','$LoggedUID','$comment')";

  if(mysqli_query($conn,$q2))
{
  header("Location:displayrecipe.php");
}

 }


?>