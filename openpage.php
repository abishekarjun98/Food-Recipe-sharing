<?php

session_start();
require 'db.php';

$LoggedUID= $_SESSION["LoggedUID"];


$q1="SELECT * FROM Userinfo WHERE ID='$LoggedUID'";

$res=mysqli_query($conn,$q1);
 $user=mysqli_fetch_array($res, MYSQLI_ASSOC);
 $profile_pic_url=$user["profilepic"];


?>


<!DOCTYPE html>
<html>
<head>
	  <!--<link rel="stylesheet" href="navbar.css">-->
	  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

	<style>
.profilepic
{
width :40px;
 height:40px;
 border-radius: 50%;
    float: left;
  position: relative;
  top:-5px;
  right: 1px;
}
#logo
{

margin: 50px 50px;
float: right;
 
 
}
#i
{
  border-radius: 5%;
}
#logo:hover {
  
  cursor: pointer;
  transform: scale(1.05); 

  }
  #logo_2
{

margin-top: 300px ;
margin-right:-250px;
float: right;

 
}

#logo_2:hover {
  
  cursor: pointer;
  transform: scale(1.05); 

  }

.post{
      
      height:280px;
      width:700px;
      border-radius: 12px;
      box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
     margin-bottom: 25px;

      
}
.post_pic{
    width: 200px;
    height: 197px;
    border-radius: 6px;
    float: left;
    margin-right: 30px;
    margin-left: 30px;
}
.content{
  font-size: 18px;
}
.user_detail
{
  height: 50px;
  width:  700px;
  box-shadow:0 4px 8px 0 rgba(0,0,0,0.2);
  margin-top: 30px;
}
#date_pos
{
  float: right;
  font-size: 12px;
  margin-top: -90px;
}
.tag_cover
{
  background:#ff3333;
  border-radius: 3px;
  width: 45%;
  padding-left: 5px;
  padding-right: 5px;
  padding-bottom: 3px;
  height:23px;
  margin-right: 2px;
}

#wall
{
  margin-left: 400px;
  margin-top: 50px;
}
.l_side {
  position: sticky;
  top: 0;
  left:0;
}
.r_side {
  position: sticky;
  top: 0;
  right:0;
  float: left;
}
#logo_3
{
  margin: 50px 50px;
}
#logo_3:hover
{
 cursor: pointer;
  transform: scale(1.05);  
}
</style>
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
</head>
<body>

<div class="l_side" >
<div id="logo">
<a href="addrecipe2.php">
<img  src="images/addrecipe2.JPG" width="200" height="200" id="i">
</a>
</div>
<br>
<div id="logo_2" >
<a href="map.php">
<img  src="images/explore2.JPG" width="200" height="200" id="i">
</a>
</div>
</div>

<div class="r_side">
  <div id="logo_3">
    <a href="leaderb.php">
      <img src="images/leader.JPG" width="200" height="200" id="i">
    </a>
    
  </div>
  
</div>

 <div id="wall">
<?php


$q2="SELECT * FROM post_data ORDER BY Timestamp DESC ";


$res2=mysqli_query($conn,$q2);
 $posts=mysqli_fetch_all($res2, MYSQLI_ASSOC);



foreach ($posts as $post) {
  
$id_of_poster=$post["U_ID"];
$q3="SELECT * FROM followers_data WHERE user1_id='$LoggedUID' AND user2_id='$id_of_poster'";

$res3=mysqli_query($conn,$q3);

$a=mysqli_fetch_array($res3,MYSQLI_ASSOC);


if(mysqli_num_rows($res3)>0)
{

$q4="SELECT * FROM Userinfo WHERE ID='$id_of_poster'";
$res4=mysqli_query($conn,$q4);
$posted_by=mysqli_fetch_array($res4,MYSQLI_ASSOC);

$posted_by_url=$posted_by["profilepic"];
$profile_pic_name=$posted_by["Name"];
 
 $id=$post["Post_Pic"];
$q5="SELECT * FROM pic_data WHERE Pic_id='$id'";

$res5=mysqli_query($conn,$q5);
 $post_pic=mysqli_fetch_array($res5, MYSQLI_ASSOC);

 $post_pic_url=$post_pic["Location"];
 ?>

 <div class="post"> 

<img src="<?php echo $posted_by_url; ?>" class="profilepic"> 
<span><h4> <?php echo $profile_pic_name; ?></h4></span>
<br>
 <img src="<?php echo $post_pic_url; ?>" class="post_pic"> 
  
<h3>
<?php
 echo nl2br($post["Title"]."\n");
 ?>
  </h3>
<p id="date_pos">
  <?php
  $t=date($post["Timestamp"]);
  $curr_time=date("Y-m-d H:i");
  $mt=$curr_time+$t;
echo nl2br($t."\n");

  ?>

</p>
  
<span class="content">
<?php
 echo nl2br($post["Description"]."\n");

$current_rec_id=$post["P_ID"];

?>
<br>
<?php
  $array_tags = array_filter(explode (",", $post["Tags"])); 
    foreach($array_tags as $tag_v)
    {
          ?>
          <span class="tag_cover">
       <!-- <a href="<?php echo nl2br ("#"."$tag_v"); ?>"><?php echo nl2br ("$tag_v"); ?>  </a>-->
       <a href="searchbytag.php?tag_name=<?php echo nl2br ("$tag_v"); ?>"><?php echo nl2br ("$tag_v"); ?>  </a>

        </span>
        <?php
        
      }
?>

</span>
<br><br><br>
<div style="margin-left: 550px;margin-top: -30px;">
  <a href="displayrecipe.php?ID=<?php echo $current_rec_id ;?>">
View Full Recipe
</a>
</div>
</div>
<?php 
}

} ?>
</div>









<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>