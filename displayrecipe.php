

<?php

session_start();
require 'db.php';

$LoggedUID= $_SESSION["LoggedUID"];


$q1="SELECT * FROM Userinfo WHERE ID='$LoggedUID'";

$res=mysqli_query($conn,$q1);
 $user=mysqli_fetch_array($res, MYSQLI_ASSOC);

 $profile_pic_url=$user["profilepic"];

if(isset($_GET["ID"]))
{
 

  $ID_to_be_displayed=mysqli_real_escape_string($conn,$_GET["ID"]);
  $_SESSION["curr_POST"]=$ID_to_be_displayed;

 // echo $ID_to_be_displayed;
}
else {
   $ID_to_be_displayed=$_SESSION["curr_POST"];
}



$q2="SELECT * FROM post_data WHERE P_ID='$ID_to_be_displayed'";
$res2= mysqli_query($conn,$q2);
$the_post=mysqli_fetch_array($res2,MYSQLI_ASSOC);
//print_r($the_post);


$id=$the_post["Post_Pic"];
$q3="SELECT * FROM pic_data WHERE Pic_id='$id'";

$res3=mysqli_query($conn,$q3);
 $post_pic=mysqli_fetch_array($res3, MYSQLI_ASSOC);

 $post_pic_url=$post_pic["Location"];


$q4="SELECT * FROM post_data WHERE P_ID='$ID_to_be_displayed'";
  $res4= mysqli_query($conn,$q4);
  $curr=mysqli_fetch_array($res4,MYSQLI_ASSOC);
   $oldflames=$curr["Flames"];

if(isset($_GET['flame'])) {
 
  $newflames=$oldflames+1;
  $q5="UPDATE post_data SET Flames='$newflames' WHERE  P_ID='$ID_to_be_displayed'";
 // $q5="UPDATE flame_data SET Flames='$newflames' WHERE  P_ID='$ID_to_be_displayed";

  mysqli_query($conn,$q5);
  header("Location:displayrecipe.php");

  }




?>
<!DOCTYPE html>
<html>
<head>
 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

<style>
  
.profilepic
{
width :40px;
 height:40px;
 border-radius: 50%;
    float: left;
}
.navbar-nav li:hover
{
  background-color: #e65000;
}
   .post_content{
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            height:auto;
            width:400px;
            margin-top: 50px;
            margin-left:100px;
            float: left;
}
.post_pic{
    width: 250px;
    height: 250px;
    margin-left: 50px;
    border-radius: 6px;
}
.btn_u
{
width: 30px;
height: 30px;
float: right;
margin-right: 200px;
}
  input[type="file"] {
    display: none;
}
.camera_btn{
width: 40px;
height: 40px;
float: left;
margin-left: 130px;
}
.camera_btn:hover
        {
            
            cursor: pointer;
        }
#flame
{
  width: 20px;
  height: 20px;
  margin-left: 50px;
  

}
#flame:hover {
  
  cursor: pointer;
  transform: scale(1.3); 

  }
  #cmt
{
  width: 20px;
  height: 20px;
  
margin-left: 345px;

  
}
#cmt:hover {
  
  cursor: pointer;
  transform: scale(1.3); 

  }
  @-ms-viewport{
  width: device-width;
}

#comment_section
{
  width:330px;
  height: 500px;
  float: right;
  border-radius:6px;
  background-color: #d9d9d9;
  margin-top: 10px;
  margin-right: 200px;
  padding-top: 5px;
  padding-left: 6px;
   overflow: auto;

}
#comment_text
{
  width:330px;
  height:50px;
  padding-left: 100px;
  border-radius:6px;
  margin-right: 200px;
  margin-top: 30px;
  background-color: #eee;
  float: right;
  
}
.comment_box
{
  
  border-radius:6px; 
  width: 230px;
}
.send_btn
{
  float: right;        
  width:30px;
  height:30px;
  margin-right: 5px;
}
.comment_ind
{
  width:300px;
  height:70px;
   background-color: #eee;
 
  border-radius:6px;
  margin-top: 20px;
 
}

.timeline{
   padding: 8px 16px;
   background-color: #00E506;
   text-decoration-line: none;
   border-radius: 6px;
    margin-right: 500px;
}
#logo
{
  position: relative;
z-index:99999;
left:70px;
top:20px;
border-radius: 6px;
}
.v_pic
{
  border-radius: 6px;
  width:100px;
  height: 100px; 
  margin-bottom: 30px;
}
.v_pic:hover
{
  transform: scale(1.3); 
}
.boxy
{
  margin-top:50px;
  height: 500px;
  width: 330px;
  background-color: #eee;
  float: left;
  overflow:auto;
  margin-left: 50px;
  padding-left: 15px;
}
#b_2
{
  width: 330px;
  float: left;
  margin-top: 560px;
  margin-left: -330px;
}
.v_text
{

  margin-left: 80px;
  width:100px;
  height:50px;
  border-radius:6px;
  background-color: #eee;
  float: left;
  
}
.hide {
  display: none;
}
    
.v_name:hover + .hide {
  display: block;
  color: red;
}
 
</style>
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
</head>
<body>

  
<!--
  <div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v7.0" nonce="tsJO7jZE"></script>

-->

  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Upload Pic</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="uploadtolocal_version.php" method="post" enctype="multipart/form-data">
<label class="custom-file-upload">
    <input type="file" name="fileToUpload" id="fileToUpload" >
    <img src="images/camera.png" class="camera_btn" >
</label>
  <input type="image" src="images/uploadpic.png" alt="Submit" class="btn_u">
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>


<div class="boxy">
<?php

$q9="SELECT* FROM timeline WHERE P_ID='$ID_to_be_displayed'";
$res9=mysqli_query($conn,$q9);


if(mysqli_num_rows($res9)!=0)
{
$versions=mysqli_fetch_all($res9,MYSQLI_ASSOC);

foreach ($versions as $version) {
$url=$version["pic"];
$id_v=$version["T_By"];

$q9="SELECT * FROM Userinfo WHERE ID='$id_v'";
$res9=mysqli_query($conn,$q9);
 $user_v=mysqli_fetch_array($res9, MYSQLI_ASSOC);


?>

<img src=" <?php echo $url ?>"  class="v_pic">

<?php
echo $user_v["Name"];
}
}


else if(mysqli_num_rows($res9)==0)
{

  ?>
  <div id="logo">
<img border="0"  src="s3.JPG" width="170" height="170">
</div>
  <?php
}

?>

</div>

<button type="button" id="b_2" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add ur Version</button>

<div class="post_content" >

<img src="<?php echo $post_pic_url ?>" class="post_pic">

<!--<img src="images/flame.png" class="flame" onclick="addflame()">-->


<a href='displayrecipe.php?flame=true'>
  <img src="images/flame.png" id="flame">
</a>
<?php echo $oldflames; ?>

<a href='displayrecipe.php?comment=true'>
  <img src="images/comment.png" id="cmt">
</a>


<?php 

$q8="SELECT * FROM comments WHERE P_ID='$ID_to_be_displayed'";
$res_8=mysqli_query($conn,$q8);
$comm=mysqli_fetch_all($res_8,MYSQLI_ASSOC);
echo sizeof($comm);
 ?>




<!--
<a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-text="Check out this Recipe!!! <?php echo $the_post["Title"] ?>  via recipe.com"

 data-hashtags="#food #recipe" data-show-count="false">Tweet</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>

-->
<!--
<div class="fb-share-button" data-href="http://localhost/finalproj/displayrecipe.php<?php //echo $the_post["P_ID"]?>" data-layout="button_count" data-size="small"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a></div>
add the page url after hosting
-->

<h3>
<?php
$ing_values="";
$steps_values="";


$count=1;
$count_1=1;


echo nl2br("\n");

echo nl2br($the_post["Title"]."\n");

?>
</h3>
<?php

echo nl2br($the_post["Description"]."\n");
echo "Serves".$the_post['Serves'];



//echo "<h3> $ing_val </h3>";
?>
  <div class="accordion" id="accordionExample">

  <div class="card">
    <div class="card-header" id="headingOne">
      <h2 class="mb-0">
        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
          Ingredients
        </button>
      </h2>
    </div>

    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
        <?php
        $count_1=1;

          $ing_array = explode (",", $the_post["Ingredients"]);
         $array_1 = array_filter($ing_array);
         //echo $the_post["Ingredients"] ;
       foreach($array_1 as $field_value){
        //$ing_values .= $field_value.",";

        echo nl2br ($count_1."-"."$field_value\n");
        $count_1++;
        
     }
      ?>

      </div>
    </div>
  </div>


  <div class="card">
    <div class="card-header" id="headingTwo">
      <h2 class="mb-0">
        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Steps
        </button>
      </h2>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
      <div class="card-body">
        <?php

        $count_2=1;
         $steps_array = explode (",", $the_post["Steps"]);
         $array_2 = array_filter($steps_array);
         //echo $the_post["Ingredients"] ;
       foreach($array_2 as $field_value){
        //$ing_values .= $field_value.",";

        echo nl2br ($count_2."-"."$field_value\n");
        $count_2++;
        
     }
   

   ?>        
      </div>
    </div>
  </div>
</div>
   

</div>


<div id="comment_text"><h3>Comments</h3></div>
 <div id="comment_section">


<form method="POST" action="add_comment.php" id="commentbox">
  <input type="text" name="commenti" placeholder="Leave a suggestion" class="comment_box">
  <input type="image" alt="submit" src="images/send.png" name="add_comment" class="send_btn">
  
</form>


<?php
  $q6="SELECT * FROM comments WHERE P_ID='$ID_to_be_displayed'";
  $res6=mysqli_query($conn,$q6);
  
  if(mysqli_num_rows($res6)!=0)
  {

    
  $comments=mysqli_fetch_all($res6,MYSQLI_ASSOC);

  foreach ($comments as $comment) {
    $curr_user=$comment["C_By"];

  $q7="SELECT * FROM Userinfo WHERE ID='$curr_user'";
  $res7=mysqli_query($conn,$q7);
 $commented_user=mysqli_fetch_array($res7, MYSQLI_ASSOC);

 $commented_profile_pic_url=$commented_user["profilepic"];
 $commented_user_name=$commented_user["Name"];
   
   ?>



   <div class="comment_ind">
    <img src="<?php echo $commented_profile_pic_url; ?>" class="profilepic">
   <?php
  ?> <h5> <?php echo nl2br($commented_user_name."\n");?> </h5><?php
   echo $comment["Comment"];

  }
  ?>
</div>
  <?php
}
else if(mysqli_num_rows($res6)==0)
{

  ?>
  <div id="logo">
<img border="0"  src="s2.JPG" width="170" height="170">
</div>
  <?php
}
?>
</div>



<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>