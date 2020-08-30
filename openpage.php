<?php

session_start();
require 'db.php';

$LoggedUID= $_SESSION["LoggedUID"];

$_SESSION["visited"]=1;
$user =get_user($LoggedUID);
 $profile_pic_url=$user["profilepic"];


?>


<!DOCTYPE html>
<html>
<head>
	  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/ffbc884c21.js" crossorigin="anonymous"></script>

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

#grp
{
  margin-left: 310px;
}
.bulb
{
  width :40px;
 height:40px;
 border-radius: 50%;
}
.bulb:hover
{
  transform: scale(1.2);
}

#b_btn
{
  margin-top: 200px;
  float: left;
  margin-left: 70px;
}
#audio
{
  margin-top: 200px;
  float: right;
  margin-right: 100px;
}
.carousel-inner{

    width: 200px;
    height: 197px;
    float: left;
    margin-right: 30px;
    margin-left: 30px;

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

<?php

$def=0;
$q_alert="SELECT * FROM messaage WHERE Reciever='$LoggedUID'AND Shown='$def'";

$res_alert=mysqli_query($conn,$q_alert);
$rows=mysqli_num_rows($res_alert);

if($rows>0){
?><div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Congrats!!!</strong> You have Won a Contest!! and been awarded with a gold badge!

  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<?php
$q_alert_update="UPDATE messaage SET Shown=1 WHERE Reciever='$LoggedUID' ";
if(!mysqli_query($conn,$q_alert_update))
{
  echo "Error: " . $q_alert_update . "<br>" . $conn->error;
}
 }
 ?>


<button type="button" class="btn btn-light" data-toggle="modal" data-target="#daily_tip" id="b_btn">
  Click Here for a <br> Daily-Tip!!!<br>
  <img src="images/bulb.png" class="bulb">
</button>

<a id="audio"class="btn btn-light" href="audio_book.php" type="button"  data-toggle="tooltip" data-placement="top">
  Audio Recipe<br> Book!<br><img src="images/audio.png" class="bulb"></a>


<div class="modal fade" id="daily_tip" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Daily Tip</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php
        

        if($_SESSION["visited"]==1)
        {
          $num=rand(0,60);
         $_SESSION["visited"]++; 
        }


        $curr_time=date("H:i");
        $q_tips="SELECT * from daily_tips WHERE ID='$num'";


        $tip=give_unique($q_tips);
        print_r($tip["Tip"]);

        ?>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<?php
 $curr_date=date("Y-m-d");

$q6="SELECT* FROM comp_data WHERE '$curr_date'< End_date ";
  $posts= give($q6);

  $num=sizeof($posts);


?>





<div class="btn-group" id="grp" role="group" aria-label="Basic example">
  <a id="btn_1" class="btn btn-warning" href="addrecipe2.php" type="button" data-placement="top"><i class="fas fa-plus-square"></i>&nbsp
  Add Recipes</a>

    <a id="btn_2" class="btn btn-warning" href="map.php" type="button" data-placement="top"><i class="fas fa-globe-africa"></i>&nbsp
  Explore</a>

<a id="btn_3" class="btn btn-warning" href="compete.php" type="button" data-placement="top"><i class="fas fa-trophy"></i>
  Contests &nbsp<span class="badge badge-light"><?php echo $num; ?></span></a>

<a id="btn_4" class="btn btn-warning" href="leaderb.php" type="button" data-placement="top"><i class="fas fa-flag-checkered"></i>&nbsp
  LeaderBoard</a>


</div>

 <div id="wall">
<?php


$q2="SELECT * FROM post_data ORDER BY Timestamp DESC ";

$posts=give($q2);


foreach ($posts as $post) {
  
$id_of_poster=$post["U_ID"];

$q3="SELECT * FROM followers_data WHERE user1_id='$LoggedUID' AND user2_id='$id_of_poster'";

$res3=mysqli_query($conn,$q3);

$a=mysqli_fetch_array($res3,MYSQLI_ASSOC);

//$a=give_unique($q3);



if(mysqli_num_rows($res3)>0)
{


$posted_by=get_user($id_of_poster);

$posted_by_url=$posted_by["profilepic"];
$profile_pic_name=$posted_by["Name"];
 
 $id=$post["Post_Pic"];

 $steps_string=$post["steps_pic"];

/*
$q5="SELECT * FROM pic_data WHERE Pic_id='$id'";


 $post_pic=give_unique($q5);

 $post_pic_url=$post_pic["Location"];

 */


 ?>

 <div class="post"> 
<img src="<?php echo $posted_by_url; ?>" class="profilepic"> 
<span><h4> <?php echo $profile_pic_name; ?></h4></span>
<br>
<div id="carouselExampleControls"  class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
<div class="carousel-item active ">
      <img class="post_pic" src=<?php echo $id; ?>>
    </div>
<?php 
  $steps_pics_array = explode (",", $steps_string);
         $array_3 = array_filter($steps_pics_array);
         
       foreach($array_3 as $field_value){
        

        ?>
        <div class='carousel-item'>
    <img class="post_pic" src= <?php echo $field_value; ?>>
    </div>

        <?php 
     }?>

 <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>


    
  </div>
</div>
  
<h3>
<?php
 echo nl2br($post["Title"]."\n");
 ?>
  </h3>
<p id="date_pos">
  <?php
  $t=date($post["Timestamp"]);
  
  //$mt=$curr_time+$t;
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