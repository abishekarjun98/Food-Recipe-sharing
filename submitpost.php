

<?php

session_start();
require 'db.php';




$locs=array();

if (isset($_FILES['my_file'])) {
                $myFile = $_FILES['my_file'];
                $fileCount = count($myFile["name"]);

                for ($i = 0; $i < $fileCount; $i++) {
        


$rand= uniqid();
$info = pathinfo($myFile["name"][$i]);
$ext = $info['extension']; 
$newname = $rand.".".$ext;
$target = 'uploads/postpics/'.$newname;
move_uploaded_file( $_FILES['my_file']["tmp_name"][$i], $target);
array_push($locs,$target);

                }
  
            }

$LoggedUID= $_SESSION["LoggedUID"];


$q1="SELECT * FROM Userinfo WHERE ID='$LoggedUID'";

$res=mysqli_query($conn,$q1);
 $user=mysqli_fetch_array($res, MYSQLI_ASSOC);

 $profile_pic_url=$user["profilepic"];




 $pic_url=$target;


if(isset($_POST["tag"]))
{
  $tags=$_POST["tag"];

 

}

if(isset($_POST["Title"],$_POST["description"],$_POST["Serves"],$_POST["origin"]))

{

$Title=$_POST["Title"];
$description=$_POST["description"];
$serves=$_POST["Serves"];
$origin=$_POST["origin"];
}

if(isset($_GET["C_ID"]))
{
$c_id=mysqli_real_escape_string($conn,$_GET["C_ID"]);
}
else
{
$c_id=0;
}


?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

<style>
  
.profilepic
{
width :40px;
 height:40px;
 border-radius: 50%;
    float: left;
}

   .post_content{
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            height:auto;
            width:400px;
            margin-top: 50px;
            margin-left: 500px;
}
.post_pic{
   
    height: 300px;
    
}
 .carousel-inner{

    width: 400px;
    height: 300px;

     
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

<div class="post_content" >
 



<div id="carouselExampleControls"  class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">

    <?php
    for ($i=0; $i <count($locs); $i++) { 
      
    
    ?>
    <?php if($i==0)
    { ?>
     <div class="carousel-item active post_pic">
      <img style="height: 300px;width: 400px;" alt="First slide" src=<?php echo $locs[$i]; ?>>
    </div>
    <?php
  } 
  else {?>
    <div class='carousel-item post_pic'>
    <img  style="height: 300px;width: 400px;" alt='First slide' src= <?php echo $locs[$i]; ?>>
    </div>

    <?php
    }
  }
    ?>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
    
    
  </div>
</div>




<?php
$ing_values="";
$steps_values="";
$tag_values="";


$count=1;
$count_1=1;


echo "<h1> $Title </h1>";
echo "<div>  $description </div>";
echo nl2br ("Serves"." $serves\n");


 $array_tags = array_filter(explode (",", $tags)); 
    foreach($array_tags as $tag_v)
    {
        $tag_values .= $tag_v.",";

        ?>
        <a href="<?php echo nl2br ("#"."$tag_v"); ?>"><?php echo nl2br ("#"."$tag_v"); ?> </a>
        <?php
        
      }


?>
  <div class="accordion" id="accordionExample">

  <div class="card">
    <div class="card-header" id="headingOne">
      <h2 class="mb-0">
        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
          Ingredients
        </button>
      </h2>
    </div>

    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
        <?php
        
        if (isset($_POST["ing"]) && is_array($_POST["ing"]))
        { 


    $input_array_name = array_filter($_POST["ing"]); 
    foreach($input_array_name as $field_value){
        $ing_values .= $field_value.",";

        echo nl2br ($count_1."-"."$field_value\n");
        $count_1++;
      }
    }
      ?>

      </div>
    </div>
  </div>


  <div class="card">
    <div class="card-header" id="headingTwo">
      <h2 class="mb-0">
        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Steps
        </button>
      </h2>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
      <div class="card-body">
        <?php
    if (isset($_POST["steps"]) && is_array($_POST["steps"]))
    { 

      
    $input_array_name_2 = array_filter($_POST["steps"]); 
    foreach($input_array_name_2 as $field_value)
    {
        $steps_values .= $field_value.",";
        echo nl2br ($count."-"."$field_value\n");
        $count++;
    }
  }


   ?>        
      </div>
    </div>
  </div>
</div>
   

</div>




 <?php

 $timestamp = date("m-d H:i");
 $f=0;
 $def_id=0;

$new_id=$_SESSION["newpost_id"];

$post_picture=$locs[0];

$steps_pics=array_slice($locs,1);

$steps_locs=implode(",",$steps_pics);

  $q3="INSERT INTO post_data VALUES('$new_id','$c_id','$LoggedUID','$Title','$tag_values','$description','$serves','$ing_values','$steps_values','$origin','$post_picture','$f',CURRENT_TIMESTAMP(),'$steps_locs')";




if(mysqli_query($conn, $q3))
{

$q_flame="INSERT INTO flame_data VALUES('$new_id','$f')";
if(mysqli_query($conn, $q_flame))
{
  echo '<script>alert("Recipe Posted Successfully")</script>';
}

}
else
{
  
  echo "Error: " . $q3 . "<br>" . $conn->error;

}



$_SESSION["POST_id"]=mysqli_insert_id($conn);


        ?>





<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>