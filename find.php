
<?php

include 'db.php';
session_start();
$LoggedUID= $_SESSION["LoggedUID"];






?>


<!DOCTYPE html>
<html>
<head>
<link href="https://fonts.googleapis.com/css2?family=PT+Serif&display=swap" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="http://code.jquery.com/jquery-1.8.2.js"></script> 
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<style>
	#name{
		font-size: 20px;
	}
	#content{
			box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
			height:auto;
			width:450px;
			margin-top: 50px;
			margin-left: 450px;
			padding-left: 50px;

	}
	body
	{
		font-family: 'PT Serif', serif;
	}
	#loader {  
    position: fixed;  
    left: 0px;  
    top: 0px;  
    width: 100%;  
    height: 100%;  
    z-index: 9999;
    margin-top: 300px;
    margin-left: 700px;
   -webkit-animation: rotation 2s infinite linear;
   transform-origin: 0% 0%;

}  


 @-webkit-keyframes rotation {
		from {
				-webkit-transform: rotate(0deg);
		}
		to {
				-webkit-transform: rotate(359deg);
		}
}
.profilepic
{
width :40px;
 height:40px;
 border-radius: 50%;
    float: left;
  position: relative;
  top:-5px;
  right: 1px;
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
        <a class="nav-link" href="friends.php">Search Friends,Recipes</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php">Log-out</a>
      </li>
        
    </ul>
  </div>
</nav>



</head>
<body>

<div id="loader">
	<img src="images/donut.png"/>
</div>
<p>
Find Best Recipes across the Web
</p>
<form id="myForm" action="findrecipes.php" method="POST">
   <input type="text" name="fname" placeholder="Enter the Ingredients which you have"  size= "50" style = "height: 50px" ><br>
  <input type="submit" value="Submit">
</form> 


<div id="content">
</div>


<?php

if(isset($_POST["fname"]))
{//background: url('images/pizza.png') 50% 50% no-repeat rgb(249,249,249); 

	$fname=$_POST["fname"];


	$q1="INSERT INTO find_recipes values(null,'$fname')";

	$conn->query($q1);
}


$last_id = mysqli_insert_id($conn);

$q2="SELECT * FROM find_recipes WHERE entry_id='$last_id'";

$res=mysqli_query($conn,$q2);

$foodname=mysqli_fetch_array($res,MYSQL_ASSOC);



?>


</body>

<script>

	


 
</script>

</html>


