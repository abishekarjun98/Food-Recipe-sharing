<?php


session_start();
require 'db.php';

$LoggedUID= $_SESSION["LoggedUID"];



$profile =get_user($LoggedUID);

$profile_pic_url=$profile["profilepic"];



 

 if(isset($_POST["Title"]))
 {
  $Title=$_POST["Title"];
  $filename=$LoggedUID."_".$Title;
  //echo $Title;
 }






?>
<!DOCTYPE html>
<html>
<head>
  <script src="https://cdn.jsdelivr.net/npm/p5@1.1.9/lib/p5.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/0.10.2/addons/p5.sound.min.js"></script>
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
.btns
{
width: 50px;
height: 50px;
}
.btns:hover
{
  cursor: pointer;
  transform: scale(1.2); 
}
#play
{
  float: left;
  margin-left: 550px;
  margin-top: 250px;
}
#txt
{
   margin-top: 260px;
}
.btn_grp
{
  margin-left: 520px;
  margin-top: 100px;
}
#rec_txt
{
margin-left: -70px;
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


<div class="btn_grp">
  <p id="rec_txt">
    Click on the Mic button and start speaking!
  </p>
<img src="images/recorder.png" class="btns" id="rec">

<img src="images/tick.png" id='pause_save' class="btns">

</div>

<img src="images/play.png" id='play' class="btns">
<p id="txt">Play the Recording </p>
<script>


var mic, recorder, soundFile;

var name_to_be_saved= <?php echo json_encode($filename); ?>;

var rec_btn=document.getElementById("rec");
var pause_btn=document.getElementById("pause_save");
var play_btn=document.getElementById("play");


var txt=document.getElementById("rec_txt");

function setup() {

var cnv= createCanvas(300, 200);   
cnv.position(300, 300);
  
  mic = new p5.AudioIn();

  mic.start();
  
  recorder = new p5.SoundRecorder();

  recorder.setInput(mic);

  soundFile = new p5.SoundFile();

}

rec_btn.addEventListener("click",record_sound);

function record_sound() {

 
  if (mic.enabled) {

    txt.innerHTML="Recording Has started";
    
    recorder.record(soundFile);

    console.log("started");
    
  }
}

pause_btn.addEventListener("click",pause_save);

  function pause_save() {
    recorder.stop();  
    saveSound(soundFile, name_to_be_saved); 
    txt.innerHTML="Recording is saved successfully";
    mic.stop();

  }

play_btn.addEventListener("click",play_sound);

  function play_sound(){

    soundFile.play(); 
    
    
  }


function draw()
{

background(255, 255, 255);
var volume=mic.getLevel();

console.log(volume);

c = color('rgb(0, 229, 6)');

noStroke();
rect( 250,100, 4,-(10+volume*200), 20, 15, 10, 5);
fill(c);
noStroke();
rect( 260,100, 4, -(20+volume*120), 20, 15, 10, 5);
fill(c);
noStroke();
rect( 270,100, 4, -(40+volume*150), 20, 15, 10, 5);
fill(c);
noStroke();
rect( 280,100, 4, -(20+volume*180), 20, 15, 10, 5);
fill(c);



}


</script>


<?php




$path="audio_rec/".$filename.".wav";

$q="INSERT INTO audio_post VALUES(null,'$LoggedUID','$Title','$path')";

mysqli_query($conn,$q);





?>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>



</body>
</html>