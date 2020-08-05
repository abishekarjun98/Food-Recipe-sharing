<?php

session_start();
require 'db.php';

$LoggedUID= $_SESSION["LoggedUID"];




if(isset($_GET["add_ID"]))
{
	echo"aaaa";
  $ID_to_add=mysqli_real_escape_string($conn,$_GET["add_ID"]);


  $q3="INSERT INTO followers_data VALUES('$LoggedUID','$ID_to_add')";

  if ($conn->query($q3) === TRUE) {
	header("Location : friends.php");
}

  
}

if(isset($_GET["rej_ID"]))
{
  $ID_to_rej=mysqli_real_escape_string($conn,$_GET["rej_ID"]);


  $q5="DELETE FROM followers_data WHERE user1_id='$LoggedUID'AND user2_id='$ID_to_rej' ";

 	if ($conn->query($q5) === TRUE)
 	{

  header("Location : friends.php");
  
}
}



?>