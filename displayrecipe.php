

<?php

session_start();
require 'db.php';

$LoggedUID= $_SESSION["LoggedUID"];




$user =get_user($LoggedUID);
$profile_pic_url=$user["profilepic"];

if(isset($_GET["ID"]))
{
 

  $ID_to_be_displayed=mysqli_real_escape_string($conn,$_GET["ID"]);
  $_SESSION["curr_POST"]=$ID_to_be_displayed;

 
}
else {
   $ID_to_be_displayed=$_SESSION["curr_POST"];
}



$q2="SELECT * FROM post_data WHERE P_ID='$ID_to_be_displayed'";
$the_post=give_unique($q2);
$id=$the_post["Post_Pic"];

$steps_string=$the_post["steps_pic"];


  
 //$post_pic_url=get_pic($id);

$q4="SELECT * FROM flame_data WHERE P_ID='$ID_to_be_displayed'";
  $curr=give_unique($q4);
   $oldflames=$curr["Flames"];
  




?>
<!DOCTYPE html>
<html>
<head>
 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://kit.fontawesome.com/ffbc884c21.js" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v8.0" nonce="4P9EzdVY"></script>
 <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
 <script src="flameupdate.js" type="text/javascript" charset="utf-8" async defer></script>
<style>
.send_btn
{
  float: right;        
  width:30px;
  height:30px;
  margin-right: 5px;
}

.post_pic{

   
    margin-left: -50px;
  
}
.send_btn:hover
{
cursor: pointer;
} 
  #tw
{

float: right;
margin-top: 100px;
}
#fb
{
  float: right;
  margin-right: -61px;
  margin-top: 122px;

}
  .fa {
    margin-top: -240px;
  font-size: 30px;
  cursor: pointer;
  user-select: none;
    color: #00E506;
    float: right;
    margin-right: 10px;
}
.flame
{
  width: 20px;
  height: 20px;
  margin-left: 100px;

  

}
.flame:hover {
  
  cursor: pointer;
  transform: scale(1.3); 
  }
  .play
{
  width: 20px;
  height: 20px;
 

}
.play:hover {
  
  cursor: pointer;
  transform: scale(1.3); 

  }
  .carousel-inner{

    width: 400px;
    height: 300px;
  }


</style>

<link rel="stylesheet" href="displayrecipe.css">
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

  




  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Upload Pic</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="uploadtolocal_version.php" method="post" enctype="multipart/form-data">
<label class="custom-file-upload">
    <input type="file" name="fileToUpload" id="fileToUpload" >
    <img src="images/camera.png" class="camera_btn" >
</label>
  <input type="image" src="images/uploadpic.png" alt="Submit" class="btn_u">
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>


<div class="boxy">
<?php

$q9="SELECT* FROM timeline WHERE P_ID='$ID_to_be_displayed'";
$res9=mysqli_query($conn,$q9);


if(mysqli_num_rows($res9)!=0)
{
$versions=mysqli_fetch_all($res9,MYSQLI_ASSOC);

foreach ($versions as $version) {
$url=$version["pic"];
$id_v=$version["T_By"];

$user_v=get_user($id_v);


?>

<img src=" <?php echo $url ?>"  class="v_pic">

<?php
echo $user_v["Name"];
}
}


else if(mysqli_num_rows($res9)==0)
{

  ?>
  <div id="logo">
<img border="0"  src="s3.JPG" width="170" height="170">
</div>
  <?php
}

?>

</div>

<button type="button" id="b_2" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add your Version</button>

<div class="post_content" >

<!--<img src="<?php //echo $post_pic_url ?>" class="post_pic">-->
<div id="carouselExampleControls"  class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
<div class="carousel-item active ">
      <img style="height: 300px;width: 400px;" src=<?php echo $id; ?>>
    </div>
<?php 
  $steps_pics_array = explode (",", $steps_string);
         $array_3 = array_filter($steps_pics_array);
         
       foreach($array_3 as $field_value){
        

        ?>
        <div class='carousel-item'>
    <img style="height: 300px;width: 400px;" src= <?php echo $field_value; ?>>
    </div>

        <?php
        
        
     }?>

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







  <div id="tw">
<a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button"  data-text="Check out this Recipe!!!<?php echo $the_post["Title"] ?>  via recipe.com"

 data-hashtags="food #recipe" data-show-count="false"></a>
</div>



<div id="fb" class="fb-share-button" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button" data-size="small"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore"></a>
</div>


<br>



  <img src="images/flame.png" class="flame" onclick="getdata()">
<span id="flamecount">
<?php echo $oldflames; ?>
</span>

&nbsp

  <img src="images/comment.png" class="flame">
  <?php 

$q8="SELECT * FROM comments WHERE P_ID='$ID_to_be_displayed'";

$comm=give($q8);
echo sizeof($comm);
 ?>

 &nbsp &nbsp

 <!--<i id="bookmark-toggle" onclick="myFunction(this)" class="fa fa-bookmark-o"></i>-->
 <br><br>
<img src="images/speaker.png" id='btnSpeak' class="play">
&nbsp &nbsp

<img src="images/pause.svg" id='btnpause' class="play">




<h3>
<?php
$ing_values="";
$steps_values="";


$count=1;
$count_1=1;


echo nl2br("\n");

echo nl2br($the_post["Title"]."\n");

?>
</h3>
<?php

echo nl2br($the_post["Description"]."\n");
echo "Serves".$the_post['Serves'];



//echo "<h3> $ing_val </h3>";
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
      <div class="card-body" >
        <?php
        $count_1=1;

          $ing_array = explode (",", $the_post["Ingredients"]);
         $array_1 = array_filter($ing_array);
         //echo $the_post["Ingredients"] ;
       foreach($array_1 as $field_value){
        //$ing_values .= $field_value.",";

        echo nl2br ($count_1."-"."$field_value\n");
        $count_1++;
        
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
      <div class="card-body" id="ingee">
        <?php

        $count_2=1;
         $steps_array = explode (",", $the_post["Steps"]);
         $array_2 = array_filter($steps_array);
         //echo $the_post["Ingredients"] ;
       foreach($array_2 as $field_value){
        //$ing_values .= $field_value.",";

        echo nl2br ($count_2."-"."$field_value\n");
        $count_2++;
        
     }
   

   ?>        
      </div>
    </div>
  </div>
</div>
   

</div>


<div id="comment_text"><h3>Comments</h3></div>
 <div id="comment_section">


<!--
  <input type="text" name="commenti" placeholder="Leave a suggestion" class="comment_box" id="entered_comment">

  <img src="images/send.png" class="send_btn" onclick="postdata()">
-->

<form method="POST" action="add_comment.php" id="commentbox">
  <input type="text" name="commenti" placeholder="Leave a suggestion" class="comment_box">
  <input type="image" alt="submit" src="images/send.png" name="add_comment" class="send_btn">
  
</form>


<?php
  $q6="SELECT * FROM comments WHERE P_ID='$ID_to_be_displayed'";
  $res6=mysqli_query($conn,$q6);
  
  if(mysqli_num_rows($res6)!=0)
  {

    
  $comments=mysqli_fetch_all($res6,MYSQLI_ASSOC);

  foreach ($comments as $comment) {
    $curr_user=$comment["C_By"];

 $commented_user=get_user($curr_user);

 $commented_profile_pic_url=$commented_user["profilepic"];
 $commented_user_name=$commented_user["Name"];
   
   ?>



   <div class="comment_ind">
    <img src="<?php echo $commented_profile_pic_url; ?>" class="profilepic">
   <?php
  ?> <h5> <?php echo nl2br($commented_user_name."\n");?> </h5><?php
   echo $comment["Comment"];

  }
  ?>
</div>
  <?php
}
else if(mysqli_num_rows($res6)==0)
{

  ?>
  <div id="logo">
<img border="0"  src="s2.JPG" width="170" height="170">
</div>
  <?php
}
?>

</div>

<script>

var txtInput = document.querySelector('#ingee');
  var btnSpeak = document.querySelector('#btnSpeak');
     
        var synth = window.speechSynthesis;
        var voices = [];

        PopulateVoices();
        if(speechSynthesis !== undefined){
            speechSynthesis.onvoiceschanged = PopulateVoices;
        }

        btnSpeak.addEventListener('click', ()=> {
            var toSpeak = new SpeechSynthesisUtterance(txtInput.innerHTML);
            var selectedVoiceName = voices[0]; //voiceList.selectedOptions[0].getAttribute('data-name');
            voices.forEach((voice)=>{
                if(voice.name === selectedVoiceName){
                    toSpeak.voice = voice;
                }
            });
            synth.speak(toSpeak);
            synth.rate=0.7;
            synth.resume();         
            

        });

        btnpause.addEventListener('click',()=>{
          synth.pause();
        });

        function PopulateVoices(){
            voices = synth.getVoices();
            var selectedIndex = 0;//voiceList.selectedIndex < 0 ? 0 : voiceList.selectedIndex;
           // voiceList.innerHTML = '';
            voices.forEach((voice)=>{
                var listItem = document.createElement('option');
                listItem.textContent = voice.name;
                listItem.setAttribute('data-lang', voice.lang);
                listItem.setAttribute('data-name', voice.name);
                //voiceList.appendChild(listItem);
            });
            //voiceList.selectedIndex = selectedIndex;
        }


function myFunction(x) {

 if(x.classList.toggle("fa-bookmark-o"))
 {
  console.log("aaa");

  <?php

  
$q11="DELETE FROM saved WHERE P_ID='$ID_to_be_displayed'AND UID='$LoggedUID' ";




if(mysqli_query($conn, $q11))
{
//echo "haha";
}
  
else
{
 
  echo "Error deleting record: " . mysqli_error($conn); 
}

  ?>



 }

 else if(x.classList.toggle("fa-bookmark"))
 {
  console.log("BBB");
  <?php
$q8="INSERT INTO Saved VALUES ('$LoggedUID',$ID_to_be_displayed)";

mysqli_query($conn,$q8);

  ?>
}




}



</script>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body>
</html>