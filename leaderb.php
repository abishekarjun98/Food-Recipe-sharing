

<?php

session_start();
require 'db.php';

$LoggedUID= $_SESSION["LoggedUID"];

 $user=get_user($LoggedUID);

 $profile_pic_url=$user["profilepic"];


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

 #t1{
width: 40%;
margin-left: 300px;
margin-top: 50px;
}
#Title_1
{
  margin-left: 440px;
  font-size: 30px;
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
<p id="Title_1">Recipes of the Month</p>
<table class="table table-hover" id="t1">
  
  <thead>
 <tr>
    <th>Position</th>
    <th>Recipe</th>
    <th>By</th>
    <th>Flames</th>
  </tr>
</thead>
<tbody>

<?php
$timestamp = date("m");


$q2="SELECT* FROM post_data WHERE MONTH(Timestamp)='$timestamp' ORDER BY Flames DESC";

$posts=give($q2);
$count=1;

foreach ($posts as $post) {

if($count<11)
{
$curr_post_id=$post["P_ID"];

  ?>


<tr>

<td><?php echo $count; ?></td>
<td>  
<a href="displayrecipe.php?ID=<?php echo $curr_post_id ;?>">
  <?php echo $post["Title"]; ?>
</a>
</td>

<?php
$owner=$post["U_ID"];

$user=get_user($owner);
?>
<td>  <?php echo $user["Name"]; ?></td>
<td>  <?php echo $post["Flames"]; ?></td>
<?php  
$count++;
}
}

?>
</tr>
</tbody>
</table>



<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>