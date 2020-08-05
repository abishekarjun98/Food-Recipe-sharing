

<?php

session_start();
require 'db.php';

$LoggedUID= $_SESSION["LoggedUID"];


$q1="SELECT * FROM Userinfo WHERE ID='$LoggedUID'";

$res=mysqli_query($conn,$q1);
 $user=mysqli_fetch_array($res, MYSQLI_ASSOC);



 $profile_pic_url=$user["profilepic"];

 $curr_recipe=$_SESSION["curr_POST"];

 if(isset($_POST["commenti"]))
 {
  

    $comment=$_POST["commenti"];


  $q2="INSERT INTO comments VALUES (null,'$curr_recipe','$LoggedUID','$comment')";

  if(mysqli_query($conn,$q2))
{
  header("Location:displayrecipe.php");
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
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>