<?php

session_start();
require 'db.php';

$LoggedUID= $_SESSION["LoggedUID"];



$profile =get_user($LoggedUID);

$profile_pic_url=$profile["profilepic"];

 $ID_to_be_displayed=$_SESSION["curr_POST"];


$q4="SELECT * FROM flame_data WHERE P_ID='$ID_to_be_displayed'";
  $curr=give_unique($q4);
   $oldflames=$curr["Flames"];

  


    
    $newflames=$oldflames+1;
    echo $newflames;

  $q5="UPDATE flame_data SET Flames=Flames+1 WHERE  P_ID='$ID_to_be_displayed'";

  mysqli_query($conn,$q5);
  //header("Location:displayrecipe.php?ID="."$ID_to_be_displayed");



?>