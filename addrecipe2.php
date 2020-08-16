<script>
	var c=0;

</script>

<?php
session_start();
require 'db.php';

$LoggedUID= $_SESSION["LoggedUID"];

$_SESSION["flag"]=0;

//$l_id=1;

//echo $_SESSION["Latest_pic"]; 
if(empty($_SESSION["Latest_pic"]))
{
	
	$l_id=1;
	
}
else
{
	$l_id=$_SESSION["Latest_pic"];
}

if($l_id==null)
{
	$l_id=1;
}



$q1="SELECT * FROM pic_data WHERE Pic_id='$l_id'";

$res=mysqli_query($conn,$q1);
 $pic=mysqli_fetch_array($res, MYSQLI_ASSOC);

 $pic_url=$pic["Location"];



 $q2="SELECT * FROM Userinfo WHERE ID='$LoggedUID'";

$res1=mysqli_query($conn,$q2);
 $user1=mysqli_fetch_array($res1, MYSQLI_ASSOC);

 $profile_pic_url=$user1["profilepic"];


 if(isset($_GET["C_ID"]))
{
 $Contest_id=mysqli_real_escape_string($conn,$_GET["C_ID"]);
 }
 else
 {
 	$Contest_id=0;
 }

//echo $Contest_Id;
?>


<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<link rel="stylesheet" href="tags.css">
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
		<script type="text/javascript" src="tags.js"></script>
		<script type="text/javascript" src="autofill.js"></script>



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
		width: 400px;
		border-radius: 8px;
		padding-left: 30px;
		padding-top: 30px;
		margin-bottom: 100px: 
	}
	#photoform
	{
		margin-top: 20px;
		margin-left: 300px;
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
.btnn
{
	background: #ffa31a;
	border-radius: 6px;
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
	margin-top: -600px;
	margin-right: 100px;
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



<div id="photoform">
	<span>Add a Pic</span>
<form action="uploadtolocal.php" method="post" enctype="multipart/form-data">
<label class="custom-file-upload">
    <input type="file" name="fileToUpload" id="fileToUpload" >
    <img src="images/camera.png" class="camera_btn" >
</label>
  <input type="image" src="images/uploadpic.png" alt="Submit" class="btn">
</form>
</div>

<form method="POST" action="submitpost.php?C_ID=<?php echo $Contest_id;?> " id="myform">
	<input type="text" name="Title" placeholder="Title">
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
			<input type="Submit" name="Submit">

</form>

<form action="recorder.php" method="POST" id="Record">
	<h4>Add a Audio Recipe</h4>
  <input type="text" name="Title" placeholder="Enter the Title">
  <br>
  <input type="submit" name="submit">
  
</form>


<div class="btn_grp">
<button id='create_ingredients' class="btnn">Add_Ingredients</button>
<button id='create_steps' class="btnn">Add_Steps</button>

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
         //$('<input>',{ "name":"ing_"+i,"placeholder":"enter ingredient"+i }),
         $('<input>',{ "name":"steps[]","placeholder":"step","height":"9"+j }),
         //$("<img>",{"src":"images/remove.png","class":"remove_img","onclick":"remove_element('ing_"+i+"')"})
        $("<img>",{"src":"images/remove.png","class":"remove_step"})

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



<!--
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
-->