<?php 
session_start();
require 'db.php';
$LoggedUID= $_SESSION["LoggedUID"];

if(isset($_POST["Bio"]))
{
    $Bio=$_POST["Bio"];
    $q2= "UPDATE Userinfo SET Bio='$Bio' WHERE ID='$LoggedUID' ";
    if(mysqli_query($conn,$q2))
    {
      echo '<script>alert("Bio updated successfully");</script>'; 
      header("Location:profile.php");
      

    }

}

?>