

<?php

session_start();
require 'db.php';

$LoggedUID= $_SESSION["LoggedUID"];


$user=get_user($LoggedUID);

 $profile_pic_url=$user["profilepic"];

 if(isset($_GET["tag_name"]))
 {
  $tag_to_be_shown=mysqli_real_escape_string($conn,$_GET["tag_name"]);
 }


?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <meta name="keywords" content="cooking,recipes,food">
  <meta name="description" content="recipe sharing platform">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

<style>
  .everything
{
  margin-left: 300px;
  margin-top: 100px;
}
.profilepic
{
width :40px;
 height:40px;
 border-radius: 50%;
    float: left;
}

.post{
      
      height:280px;
      width:700px;
      border-radius: 6px;
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

<h5>
  Displaying Everything related to <?php echo $tag_to_be_shown ; ?>....
</h5>
<div class="everything">
<?php

$q3="SELECT * FROM post_data WHERE Tags IS NOT NULL";

$list=give($q3);

foreach ($list as $item) {

$arra=explode(",", $item["Tags"] ) ;


if(in_array($tag_to_be_shown,$arra))
{

  

  $id_of_poster=$item["U_ID"];

$posted_by=get_user($id_of_poster);

$posted_by_url=$posted_by["profilepic"];
$profile_pic_name=$posted_by["Name"];
 
 $id=$item["Post_Pic"];

 $post_pic_url=get_pic($id);

 ?>

<div class="post"> 

<img src="<?php echo $posted_by_url; ?>" class="profilepic"> 
<span><h4> <?php echo $profile_pic_name; ?></h4></span>
<br>
 <img src="<?php echo $id ?>" class="post_pic"> 
  
<h3>
<?php
 echo nl2br($item["Title"]."\n");
 ?>
  </h3>
<p id="date_pos">
  <?php
  $t=date($item["Timestamp"]);
  $curr_time=date("Y-m-d H:i");
  $mt=$curr_time+$t;


  //echo $curr_time;

echo nl2br($t."\n");

  ?>

</p>
  
<span class="content">
<?php
 echo nl2br($item["Description"]."\n");

echo nl2br("Serves".$item["Serves"]."\n");


 

$current_rec_id=$item["P_ID"];



?>
<?php
  $array_tags = array_filter(explode (",", $item["Tags"])); 
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

unset($arra);
}



?>

</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>


