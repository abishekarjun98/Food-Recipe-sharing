

<?php

session_start();
require 'db.php';

$LoggedUID= $_SESSION["LoggedUID"];


$q1="SELECT * FROM Userinfo WHERE ID='$LoggedUID'";

$res=mysqli_query($conn,$q1);
 $user=mysqli_fetch_array($res, MYSQLI_ASSOC);



 $profile_pic_url=$user["profilepic"];


 if(isset($_GET["T_ID"]))
{
 

  $ID_of_post=mysqli_real_escape_string($conn,$_GET["T_ID"]);
  
  $_SESSION["curr_timeline"]=$ID_of_post;
}
else {
   $ID_of_post=$_SESSION["curr_timeline"];
}



$q2="SELECT * FROM post_data WHERE P_ID='$ID_of_post'";
$res2= mysqli_query($conn,$q2);
$the_post=mysqli_fetch_array($res2,MYSQLI_ASSOC);




?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <meta name="keywords" content="cooking,recipes,food">
  <meta name="description" content="recipe sharing platform">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

<style>
  #comment_section
{
  width:250px;
  height:50px;
  
  border-radius:6px;
  background-color: #eee;
  margin-top: 10px;
  margin-right: 500px;
  padding-top: 5px;
  padding-left: 6px;
}
#comment_text
{
  width:250px;
  height:50px;
  padding-left: 50px;
  border-radius:6px;
  margin-right: 500px;
  margin-top: 30px;
  background-color: #eee;
  float: right;
  

}
.comment_box
{
  
  margin-left: 300px;
  border-radius:6px; 
}
.send_btn
{
     
  width:30px;
  height:30px;
}
.comment_ind
{
  width:350px;
  height:50px;
   background-color: yellow;
  border-radius:6px;
  
}
.origin
{
  width:250px;
  height:50px;
   background-color: #ffcc00;
  border-radius:6px;
  margin-top: 20px;
  margin-left:300px; 
}
  
.profilepic
{
width :40px;
 height:40px;
 border-radius: 50%;
    float: left;
}
.navbar-nav li:hover
{
  background-color: #006603;
}
.vl {
  border-left: 3px solid black;
  height: 35px;
  margin-left: 150px;
}
.vl2{
  border-left: 3px solid black;
  height: 30px;
  margin-left: 400px;
}
#everything
{
  margin-left: 250px;
}
.new_content
{
  float: left;
  margin-right: 30px;
  background-color: #ffd633;
  height: 50px;
  border-radius: 6px;
  width:110px;

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
        <img src="<?php echo $profile_pic_url ?>" class="profilepic">
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="openpage.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="profile.php">Profile</a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="index.php">Log-out</a>
      </li>
           <li class="nav-item">
        <a class="nav-link" href="friends.php">Connect</a>
      </li>
    
        
    </ul>
  </div>
</nav>

<form method="POST" action="timeline.php" id="commentbox">
  <input type="text" name="timeline_content" placeholder="add your version" class="comment_box">
  <input type="image" alt="submit" src="images/add.png" name="add_comment" class="send_btn">
  
</form>

<div class="origin">
<?php echo $the_post["Title"];?>
</div>
<div class="vl2"></div>

<div id="everything">
<?php

  $q3="SELECT * FROM timeline WHERE P_ID='$ID_of_post'";
  $res3=mysqli_query($conn,$q3);
  
  if(sizeof($res3)!=0)
  {

  $versions=mysqli_fetch_all($res3,MYSQLI_ASSOC);

  foreach ($versions as $version) {
    $curr_user=$version["T_By"];

  $q4="SELECT * FROM Userinfo WHERE ID='$curr_user'";
  $res4=mysqli_query($conn,$q4);
  $version_by_user=mysqli_fetch_array($res4, MYSQLI_ASSOC);

 $version_profile_pic_url=$version_by_user["profilepic"];
 $version_user_name=$version_by_user["Name"];
   
   ?>
   <div class="new_content">
   <img src="<?php echo $version_profile_pic_url; ?>" class="profilepic">
    <h6> <?php echo nl2br($version_user_name."\n");?> </h6>
  </div>
    <div class="comment_ind">
   <?php
  ?> 
 
  <?php
   echo $version["T_content"];

 
  ?>
</div>
<div class="vl"></div>



  <?php
}
}

?>
</div>


<?php

if(isset($_POST["timeline_content"]))
 {
  

    $version_content=$_POST["timeline_content"];


  $q5="INSERT INTO timeline VALUES (null,'$ID_of_post','$LoggedUID','$version_content')";

  if(mysqli_query($conn,$q5))
{
  header("Location:timeline.php");
}

 }


?>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>