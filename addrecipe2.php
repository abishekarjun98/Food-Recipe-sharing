<script>
	var c=0;

</script>

<?php
session_start();
require 'db.php';

$LoggedUID= $_SESSION["LoggedUID"];





$user1 =get_user($LoggedUID);

 $profile_pic_url=$user1["profilepic"];





 if(isset($_GET["C_ID"]))
{
 $Contest_id=mysqli_real_escape_string($conn,$_GET["C_ID"]);
 }
 else
 {
 	$Contest_id=0;
 }

$post_id= uniqid();   
$_SESSION["newpost_id"]=$post_id; 



?>


<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="tag3.css">
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
		<script type="text/javascript" src="tags.js"></script>
		<script type="text/javascript" src="autofill2.js"></script>



	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<style>
	.btn_u
{
width: 30px;
height: 30px;
float: right;
margin-right: 200px;
}
	.remove_ing
	{
		width:20px;
		height: 20px;
	}
	.remove_ing:hover{
		cursor: pointer;
	}
	.remove_step
	{
		width:20px;
		height: 20px;
	}
	.remove_step:hover{
		cursor: pointer;
	}
	#myform
	{
		margin-left: 500px;
		margin-top: 20px;
		background-color: #eee;
		width: 400px;
		border-radius: 8px;
		padding-left: 30px;
		padding-top: 30px;
		margin-bottom: 100px: 
	}
	#photoform
	{
		margin-top: 20px;
		margin-left: 500px;
		background-color: #eee;
		width: 400px;
		border-radius: 8px;
		padding-left: 30px;
		padding-top: 30px;

	}
	input[type="file"] {
    display: none;
}
.btn
{
width: 50px;
height: 40px;
margin-bottom: 50px;
}
.camera_btn{
width: 40px;
height: 40px;
float: left;
margin-left: -180px;
margin-bottom: 20px; 
}
.camera_btn:hover
        {
            
            cursor: pointer;
            transform: scale(1.1);
        }

.btn_grp
{
	margin-left: 530px;
	margin-top: 20px;
	width: 500px;
	
}

.post_pic{
	width: 200px;
	height: 200px;
	margin-left: 320px;
	border-radius: 6px;
}
.profilepic
{
width :40px;
 height:40px;
 border-radius: 50%;
    float: left;
}
#Record
{
	float: right;
	margin-top: -300px;
	margin-right: 100px;
}
#create_ingredients
{
	width:120px;
}
#create_steps
{
	width: 120px
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
        <a class="nav-link" href="friends.php">Search </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php">Log-out</a>
      </li>
        
    </ul>
  </div>
</nav>





</head>
<body>





<form method="POST" action="submitpost.php?C_ID=<?php echo $Contest_id;?> " id="myform" enctype="multipart/form-data">

	<label class="custom-file-upload">
    <input type="file" name="my_file[]" multiple>
    <img src="images/camera.png" class="camera_btn">
    <span style="margin-left: -100px;">Add Pics</span>
</label>

	<input type="text" name="Title" placeholder="Title" style="float: left; margin-top: 50px;">
	<br><br><br>
		<input type="text" id="tag" name="tag"  value="veg"/>
		<br><br>
	<input type="text" name="description" placeholder="Description">
		<br><br><br>

					<label for id="Serves">No. of Serves</label>
					<select id="Serves" name="Serves">
  					<option value="1-2">1-2</option>
  					<option value="3-4">3-4</option>
  					<option value="more than 5">more than 5</option>
					</select>

<br>
					
					<div class="ingredients"> 
					</div>
					
					<br>
			
					<div class="steps">
					</div>

					<br><br>
<label for id="origin">This food is native to ?</label>
<input type="text" name="origin"placeholder="Ex:TamilNadu..">
<br><br>
			<button type="submit" class="btn btn-warning" style="width:120px; margin-left: 100px;height: 60px;">Create Recipe!!</button>
</form>

<form action="recorder.php" method="POST" id="Record">
	<h4>Add a Audio Recipe</h4>
  <input type="text" name="Title" placeholder="Enter the Title">
  <br>
  <input type="submit" name="submit">
  
</form>


<div class="btn_grp">
<button id='create_ingredients' type="button" class="btn btn-light">+Ingredients
</button>
&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
<button id='create_steps' type="button" class="btn btn-light">+Steps</button>

</div>


</body>
</html>

<script>

var i = 0; 
var j=0;
function increment_ing(){
i += 1; 
}
function increment_steps(){
j += 1; 
}


$("#create_ingredients").click(function(){
increment_ing();
	

$(".ingredients").append([
    $('<div/>',{ "id": "ing_"+i }).append([
         
         $('<input>',{ "name":"ing[]","placeholder":"enter ingredient"+i }),
        $("<img>",{"src":"images/remove.png","class":"remove_ing"}),





    ])
])
});



 $(".ingredients").on("click",".remove_ing", function(e){ 
        e.preventDefault();
 $(this).parent('div').remove(); 
 i--;
    })


 $(".steps").on("click",".remove_step", function(e){ 
        e.preventDefault();
 $(this).parent('div').remove(); 
 j--;
    })





$("#create_steps").click(function(){
increment_steps();
	

$(".steps").append([
    $('<div/>',{ "id": "steps_"+j }).append([

         $('<input>',{ "name":"steps[]","placeholder":"step"+j,"height":"70" }),
        $("<img>",{"src":"images/remove.png","class":"remove_step"}),
    ])
])
});


	

$(function() {
				$("#tag").tags({
					unique: true,
					maxTags: 8,
					requireData:true
				}).autofill({
					data:["chinese","breakfast","vegan","spicy","south-indian","andhra","north-indian","snack","dinner","brunch","mexican","italian","veg","non-veg"]
				});
			});

//console.log($("#testInput").val());

</script>




<!--<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
-->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

<?php

/*
if(isset($_FILES['fileToUpload']['name']))
{

$locs=array();
$info = pathinfo($_FILES['fileToUpload']['name']);
$ext = $info['extension']; 
$newname = $rand.".".$ext; 

$target = 'uploads/postpics/'.$newname;
move_uploaded_file( $_FILES['fileToUpload']['tmp_name'], $target);

echo $target;

array_push($locs,$target);


$q5="INSERT INTO steps_pic VALUES ('$postid',null,'$path')";
mysqli_query($conn,$q5);*/



?>