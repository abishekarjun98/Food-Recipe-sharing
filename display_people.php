

<?php

session_start();
require 'db.php';

$LoggedUID= $_SESSION["LoggedUID"];


$q1="SELECT * FROM Userinfo WHERE ID='$LoggedUID'";
$res=mysqli_query($conn,$q1);
$user=mysqli_fetch_array($res, MYSQLI_ASSOC);

$profile_pic_url=$user["profilepic"];

$people= array();
if(isset($_GET["a_ID"]))
{
$a_ID=mysqli_real_escape_string($conn,$_GET["a_ID"]);

$qfollowers="SELECT * FROM followers_data WHERE user1_id='$a_ID'";
$res_ers=mysqli_query($conn,$qfollowers);
$list_ers=mysqli_fetch_all($res_ers);

foreach ($list_ers as $person) {
  
  array_push($people, $person[1]);

}

$text="Following";


}

if(isset($_GET["b_ID"]))
{
  $b_ID=mysqli_real_escape_string($conn,$_GET["b_ID"]);
  $qfollowing="SELECT * FROM followers_data WHERE user2_id='$b_ID'";
  $res_ers=mysqli_query($conn,$qfollowing);
$list_ers=mysqli_fetch_all($res_ers);



foreach ($list_ers as $person) {
 array_push($people, $person[0]);
  

}

$text=" Followers";

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
  
.profilepic
{
width :40px;
 height:40px;
 border-radius: 50%;
    float: left;
    margin-right: 10px;
}

.People_class{
  border: 1px solid #ddd;
  background-color: #f6f6f6;
  padding: 12px;
  font-size: 18px;
  color: black;
  display: block;
  margin-top: 10px;
  border-radius: 6px;
  width: 400px;
  
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

<div  style="margin: 50px 400px;">
  <h3>
    <?php echo $text; ?>
  </h3>
<?php


foreach ($people as $person) {
  
  $qdata="SELECT* FROM Userinfo WHERE ID=$person";
  $resdata=mysqli_query($conn,$qdata);
  $data=mysqli_fetch_array($resdata,MYSQLI_ASSOC);

  
$pic_url=$data["profilepic"];
  ?>


  <div class="People_class" >
<a href="profile.php?f_ID=<?php echo $data["ID"] ?>"><?php echo $data["Name"]; ?></a>
<img src="<?php echo $pic_url;?>" class="profilepic">
<br>
<?php echo $data["Bio"]; ?>
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