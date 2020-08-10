<?php

session_start();
require 'db.php';

$LoggedUID= $_SESSION["LoggedUID"];

$_SESSION["flag"]=1;
$t= date("m");


if(isset($_GET["f_ID"]))
{
$f_ID=mysqli_real_escape_string($conn,$_GET["f_ID"]);

$id_tobe_shown=$f_ID;

 $flag=0;
}
else
{
  $id_tobe_shown=$LoggedUID;
   $flag=1;

}

$q3="SELECT * FROM Userinfo WHERE ID='$id_tobe_shown'";

$res3=mysqli_query($conn,$q3);
 $userf=mysqli_fetch_array($res3, MYSQLI_ASSOC);
 $profile_pic_url=$userf["profilepic"];
 $name=$userf["Name"];
 $bio=$userf["Bio"];

 $curr_gbadges=$userf["goldb"];
$curr_sbadges=$userf["silverb"];
$curr_bbadges=$userf["bronzeb"];


 $q_badge="SELECT * FROM post_data WHERE U_ID='$id_tobe_shown' AND month(Timestamp)='$t'";


$qfollowers="SELECT * FROM followers_data WHERE user1_id='$id_tobe_shown'";
$res_ers=mysqli_query($conn,$qfollowers);
$list_ers=mysqli_fetch_all($res_ers);

$num_ers=mysqli_num_rows($res_ers);


$qfollowing="SELECT * FROM followers_data WHERE user2_id='$id_tobe_shown'";
$res_ings=mysqli_query($conn,$qfollowing);
$list_ings=mysqli_fetch_all($res_ings);

$num_ings=mysqli_num_rows($res_ings);





$q0="SELECT * FROM Userinfo WHERE ID='$LoggedUID'";
$res0=mysqli_query($conn,$q0);
 $user0=mysqli_fetch_array($res0, MYSQLI_ASSOC);
 $profile_pic_url_0=$user0["profilepic"];




$res_badge=mysqli_query($conn,$q_badge);





$num_recipes=mysqli_num_rows($res_badge);



if(date("d")==31 &&date("m")==$t)
{

if($num_recipes>=15)
{
  $curr_gbadges++;
}
else if($num_recipes>8 && $num_recipes<15 )
{
  $curr_sbadges++;
}
else
{
  $curr_bbadges++;
}

$q_badge_update="UPDATE userinfo SET goldb='$curr_gbadges',silverb='$curr_sbadges',bronzeb ='$curr_bbadges' WHERE ID='$LoggedUID'";

if ($conn->query($q_badge_update) === TRUE) {
  
} else {
  echo "Error: " . $q_badge_update . "<br>" . $conn->error;
}


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
	
.pic{
			box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
			height:550px;
			width:400px;
			margin-top: 50px;
			margin-left: 500px;
}

input[type="file"] {
    display: none;
}
.btn_u
{
width: 30px;
height: 30px;
margin-left: 50px;
margin-top: 5px;
float: right;
margin-right: 150px;
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
.profilepic2
{
width :40px;
 height:40px;
 border-radius: 50%;
    float: left;
  position: relative;
  top:-5px;
  right: 1px;
}

.profilepic
{
width :200px;
 height:200px;
 border-radius: 50%;
    margin-left:  100px;
}
.pen{
    width: 30px;
    height: 30px;
    margin-top:15px; 
    margin-left: 5px;
}
.bio{
    margin-left: 100px;
    margin-top: -15px;
}
.profilepic_2
{
width :40px;
 height:40px;
 border-radius: 50%;
    float: left;
}
  
.bdgs
{
  height: 30px;
  width: 30px;
}
.badge{
  margin-left: 130px;
  margin-top: 10px;
}
</style>	

<nav class="navbar navbar-expand-lg navbar-light " style="background-color: #00E506">
  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="profile.php"> <img src="<?php echo $profile_pic_url_0 ?>" class="profilepic2"></a>
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
<div class="pic">

<img src=" <?php echo $profile_pic_url ?>"  class="profilepic">

<div align="center"><h3><?php  echo $name; ?></h3></div>
<div id="bio_content" align="center" ><?php echo $bio; ?></div>


<div id="forms">
<form action="uploadtolocal.php" method="post" enctype="multipart/form-data">
<label class="custom-file-upload">
    <input type="file" name="fileToUpload" id="fileToUpload">
    <img src="images/camera.png" class="camera_btn">
</label>
  <input type="image" src="images/uploadpic.png" alt="Submit" class="btn_u">
</form>
<form action="profile.php" method="post" >
    <input type="text"name="Bio" placeholder="<?php echo $bio ?>"class ="bio">
    <input type="image" src="images/pen.png" alt="Submit" class="pen" onclick="reload()">
</form>
</div>
<div class="badge">
<?php echo $curr_gbadges; ?><img src="images/gold.png" class="bdgs">&nbsp
<?php echo $curr_sbadges;?><img src="images/silver2.png" class="bdgs">&nbsp
<?php echo $curr_bbadges;?><img src="images/bronze.png" class="bdgs">
</div>
<br>
<div align="center">
<a href="display_people.php?a_ID=<?php echo $id_tobe_shown; ?>"><?php echo "Following".$num_ers; ?> </a>

&nbsp &nbsp

<a href="display_people.php?b_ID=<?php echo $id_tobe_shown; ?>"><?php echo "Follwers".$num_ings;?> </a>
</div>
</div>

<script>
var f=<?php echo json_encode($flag); ?>;
var forms=document.getElementById("forms");
var f_bio=document.getElementById("bio_content");


if(f==1)
{

forms.style.display="block";
f_bio.style.display="none";
}
else if(f==0){
forms.style.display="none";
f_bio.style.display="block";
}

function reload()
{
    location.reload();
  }

</script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body>
</html>
<?php

if(isset($_POST["Bio"]))
{
    $Bio=$_POST["Bio"];
    $q2= "UPDATE Userinfo SET Bio='$Bio' WHERE ID='$LoggedUID' ";
    if(mysqli_query($conn,$q2))
    {
      echo '<script>alert("Bio Updated Successfully")</script>'; 

    }

}


?>





