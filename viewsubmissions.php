

<?php

session_start();
require 'db.php';

$LoggedUID= $_SESSION["LoggedUID"];

$profile =get_user($LoggedUID);


$profile_pic_url=$profile["profilepic"];

 if(isset($_GET["C_ID"]))
{
$c_id=mysqli_real_escape_string($conn,$_GET["C_ID"]);
}

else {
$c_id=0;
}

?>



<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <meta name="keywords" content="cooking,recipes,food">
  <meta name="description" content="recipe sharing platform">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="odometer-theme-car.css" />
<script type="text/javascript" src="odometer.js"></script>

<style>
  
.profilepic
{
width :40px;
 height:40px;
 border-radius: 50%;
    float: left;
}
.post{
      
      height:50px;
      width:400px;
      border-radius: 4px;
      box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
     margin-bottom: 25px;    
}
.post_pic{
    width: 200px;
    height: 200px;
    border-radius: 6px;
    float: left;
    margin-right: 30px;
    margin-left: 30px;
}
.wall
{
  margin-left: 400px;
}
  
</style>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light " style="background-color: #00E506">
  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
    
     <li class="nav-item">
        <a class="nav-link" href="profile.php"> <img src="<?php echo $profile_pic_url ?>" class="profilepic"></a>
      </li>
      &nbsp 
      <li class="nav-item">
        <a class="nav-link" href="openpage.php">Home <span class="sr-only">(current)</span></a>
      </li>
           <li class="nav-item">
        <a class="nav-link" href="friends.php">Search</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php">Log-out</a>
      </li>
        
    </ul>
  </div>
</nav>

<h3>
  <?php
  $q3="SELECT* FROM comp_data WHERE Contest_Id='$c_id'";

  $data=give_unique($q3);
  
   echo $data["Title"];

  ?>
</h3>
<!--<a href="invitepeople.php?C_ID=<?php //cho $c_id;?>">
  Invite People to Join this Contest
</a>
-->

<div class="wall">
<?php 
$q2="SELECT* FROM post_data WHERE C_ID='$c_id'";
$list=give($q2);
$count=sizeof($list);
?>
<div id="count" class="odometer">
  </div>

<?php

foreach ($list as $post)  {
  ?>
<div class="post">
  <?php
  echo nl2br($post["Title"]."  ");
?>
&nbsp &nbsp &nbsp &nbsp &nbsp
<?php
  //echo nl2br($post["Description"]."\n");

  $submitted_by=get_user($post["U_ID"]);

  echo nl2br("Submitted_by"." ".$submitted_by["Name"]."  ");

  $current_rec_id=$post["P_ID"];

  ?>
  
  <span style="margin-left: 50px;margin-top: -30px;">
  <a href="displayrecipe.php?ID=<?php echo $current_rec_id ;?>">
View Full Recipe
</a>
</span>
</div>

  <?php
}

?>
</div>

<script type="text/javascript">
  var c=document.getElementById("count");
  
  setTimeout(function(){ 

    var number = <?php echo json_encode($count); ?>;
    console.log(number);
    c.innerHTML = number;
}, 10);

</script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>