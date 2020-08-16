<?php
$q_check="SELECT * FROM saved WHERE P_ID='$ID_to_be_displayed'AND UID='$LoggedUID' ";
$res_check=mysqli_query($conn,$q_check);
$num = $mysqli_num_rows($res_check);
if($num==1)
{
?>
console.log("hello");
<?php

}
elseif ($num==0) {
  ?>
  console.log("hiiiii");
  <?php
  
}
 ?>
