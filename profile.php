<?php

session_start();
require 'db.php';

$LoggedUID= $_SESSION["LoggedUID"];

$_SESSION["flag"]=1;



if(isset($_GET["f_ID"]))
{
$f_ID=mysqli_real_escape_string($conn,$_GET["f_ID"]);

$q3="SELECT * FROM Userinfo WHERE ID='$f_ID'";

$res3=mysqli_query($conn,$q3);
 $userf=mysqli_fetch_array($res3, MYSQLI_ASSOC);
 $profile_pic_url=$userf["profilepic"];
 $name=$userf["Name"];
 $bio=$userf["Bio"];
 $flag=0;

}

else{
$q1="SELECT * FROM Userinfo WHERE ID='$LoggedUID'";
$res=mysqli_query($conn,$q1);
 $user=mysqli_fetch_array($res, MYSQLI_ASSOC);
 $profile_pic_url=$user["profilepic"];
 $name=$user["Name"];
 $bio=$user["Bio"];

 $flag=1;
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
}
.profilepic_2
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
  

</style>	

<nav class="navbar navbar-expand-lg navbar-light " style="background-color: #00E506">
  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
         <li class="nav-item">
        <img src="<?php echo $profile_pic_url ?>" class="profilepic_2">
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
<div class="pic">

<img src=" <?php echo $profile_pic_url ?>"  class="profilepic">

<h3 style="margin-left: 170px;"><?php  echo $name; ?></h3>
<div id="bio_content" style="margin-left: 125px;"><?php echo $bio; ?></div>


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
    location.reload();;
    console.log("aaaaa");
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
    mysqli_query($conn,$q2);

}




?>