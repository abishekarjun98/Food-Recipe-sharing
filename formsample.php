<?php
session_start();
require 'db.php';

$LoggedUID= $_SESSION["LoggedUID"];

$_SESSION["flag"]=0;

$l_id=$_SESSION["Latest_pic"];

$q1="SELECT * FROM pic_data WHERE Pic_id='$l_id'";

$res=mysqli_query($conn,$q1);
 $pic=mysqli_fetch_array($res, MYSQLI_ASSOC);
 $pic_url=$pic["Location"];


?>


<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<style>
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
		margin-left: 300px;
		margin-top: 20px;
		background-color: #eee;
		width: 300px;
		border-radius: 8px;
		padding-left: 30px;
		padding-top: 30px;
	}
	#photoform
	{
		margin-top: 20px;
		margin-left: 300px;
		background-color: #eee;
		width: 300px;
		border-radius: 8px;
		padding-left: 30px;
		padding-top: 30px;

	}
	input[type="file"] {
    display: none;
}
.btn
{
width: 30px;
height: 30px;
margin-left: 50px;
margin-top: 5px;
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

.btn_grp
{
	margin-left: 300px;
	margin-top: 20px;
}
.post_pic{
	width: 300px;
	height: 250px;
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




<img src= "<?php echo $pic_url; ?>"  class="post_pic">
<div id="photoform">
	<span>Add a Pic</span>
<form action="uploadtolocal.php" method="post" enctype="multipart/form-data">
<label class="custom-file-upload">
    <input type="file" name="fileToUpload" id="fileToUpload">
    <img src="images/camera.png" class="camera_btn">
</label>
  <input type="image" src="images/uploadpic.png" alt="Submit" class="btn">
</form>
</div>

<form method="POST" action="action.php" id="myform">
	<input type="text" name="Title" placeholder="Title">
	<br><br><br>


	<input type="text" name="description" placeholder="Description">
		<br><br><br>

					<label for id="Serves">Choose No. of Serves</label>
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


			<input type="Submit" name="Submit">

</form>


<div class="btn_grp">
<button id='create_ingredients'>Add_Ingredients</button>
<button id='create_steps'>Add_Steps</button>

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
         //$('<input>',{ "name":"ing_"+i,"placeholder":"enter ingredient"+i }),
         $('<input>',{ "name":"ing[]","placeholder":"enter ingredient"+i }),
         //$("<img>",{"src":"images/remove.png","class":"remove_img","onclick":"remove_element('ing_"+i+"')"})
        $("<img>",{"src":"images/remove.png","class":"remove_ing"})

    ])
])
});



 $(".ingredients").on("click",".remove_ing", function(e){ 
        e.preventDefault();
 $(this).parent('div').remove(); //remove inout field
 i--;
    })


 $(".steps").on("click",".remove_step", function(e){ 
        e.preventDefault();
 $(this).parent('div').remove(); //remove inout field
 j--;
    })





$("#create_steps").click(function(){
increment_steps();
	

$(".steps").append([
    $('<div/>',{ "id": "steps_"+j }).append([
         //$('<input>',{ "name":"ing_"+i,"placeholder":"enter ingredient"+i }),
         $('<input>',{ "name":"steps[]","placeholder":"step"+j }),
         //$("<img>",{"src":"images/remove.png","class":"remove_img","onclick":"remove_element('ing_"+i+"')"})
        $("<img>",{"src":"images/remove.png","class":"remove_step"})

    ])
])
});

</script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>