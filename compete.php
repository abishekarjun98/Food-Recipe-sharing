

<?php



session_start();
require 'db.php';

$LoggedUID= $_SESSION["LoggedUID"];

$profile =get_user($LoggedUID);

$profile_pic_url=$profile["profilepic"]

?>



<!DOCTYPE html>
<html>
<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
#bg
{
  width:900px;
  margin-left: 320px;
  border-radius: 12px;
}
#btn
{
  position: absolute;
  z-index: 9999;
  left:700px;
  top:470px;
}
#d_box
{
  width: 350px;
  height: 200px;
}
#Modal_1
{
z-index: 999999;
}
.post{
      
      height:200px;
      width:400px;
      border-radius: 12px;
      box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
     margin-bottom: 50px;
   
     }

.everything div{
  width:500px;
  border-radius: 6px;
  margin-left: 240px;
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

<img src=images/bg4.jpg id="bg">

<button id="btn" class="btn btn-warning"  type="button"  data-toggle="modal" data-target="#Modal_1" data-placement="top" title="Host a Contest">
  Host a Contest
  </button>
<br>
<div class="btn_grp" style="margin-left: 650px; margin-top: 25px;margin-bottom: 30px;">
<button id="my_btn" class="btn btn-outline-primary active"> 
My Contests
</button>
<button id="active_btn" class="btn btn-outline-primary"> 
Active Contests
</button>
</div>
<div class="everything">
<div id="My">
  <?php 
  $q3="SELECT* FROM comp_data WHERE Hosted_by='$LoggedUID'";
  $res3=mysqli_query($conn,$q3);
  $posts=mysqli_fetch_all($res3,MYSQLI_ASSOC);
  foreach ($posts as $post) {
    ?>
<div class="post">
  <h4><?php echo $post["Title"]; ?>
  </h4><br>
  <?php echo $post["Description"]; ?><br>
  <?php echo $post["Start_date"]; ?>
  &nbsp &nbsp &nbsp
  <?php echo $post["End_date"]; ?><br>

  <a href="viewsubmissions.php?C_ID=<?php echo $post['Contest_Id']; ?>">View Submissions</a>

</div>

    <?php
  }
  ?>
</div>








<div id="Active">
  <?php

  $curr_date=date("d-m-Y");
  $q4="SELECT* FROM comp_data WHERE '$curr_date'< End_date ";
  $res4=mysqli_query($conn,$q4);
  $posts=mysqli_fetch_all($res4,MYSQLI_ASSOC);
 foreach ($posts as $posti) {
    ?>
<div class="post">
  <h4>
  <?php echo $posti["Title"]; ?>
  </h4>
  <br>
   <?php echo $posti["Description"]; ?>
   <br>
  <?php echo $posti["Start_date"]; ?>
  &nbsp &nbsp &nbsp
  <?php echo $posti["End_date"]; ?>
  <br>
  <a href="addrecipe2.php?C_ID=<?php echo $posti['Contest_Id'];?> ">Submit your Recipe</a>
</div>

    <?php
  }
  ?>
</div>
</div>




   <div class="modal fade-modal-lg" id="Modal_1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalLabel">Fill in the Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="createcontest.php" method="POST">
          <input type="text" name="Title" placeholder="Title of the Competition">
          <br><br>
          <input type="text" name="description" placeholder="Description/Rules" id="d_box">
           <br><br> <br>
          <label for="Start_date">
             Start_date
          </label>
          <input type="date" name="Start_date" placeholder="Start_date">
          <br>
          <label for="End_date">End_date </label>
          <input type="date" name="End_date" placeholder="End_date">
          <br>
          <input type="submit" name="s_btn" class=" btn btn-warning">
        </form>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
<script>

  $("#My").show();
  $("#Active").hide();


  $("#my_btn").click(function(){
$("#My").show();
$("#Active").hide();
  });

$("#active_btn").click(function(){
$("#Active").show();
$("#My").hide();
});

</script>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>
