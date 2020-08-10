

<?php

session_start();
require 'db.php';

$LoggedUID= $_SESSION["LoggedUID"];


$q1="SELECT * FROM Userinfo WHERE ID='$LoggedUID'";

$res=mysqli_query($conn,$q1);
 $user=mysqli_fetch_array($res, MYSQLI_ASSOC);



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
}

  #earth_div{
    
     margin: 100px 400px;
     width: 500px;
     height: 500px;
     border-style: solid;
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
        <a class="nav-link" href="friends.php">Search Friends,Recipes</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php">Log-out</a>
      </li>
    
        
    </ul>
  </div>
</nav>

<h3 style="margin-left: 450px;">Find Recipes across the Globe!!</h3>
<div id="earth_div"></div>



<?php

$q2="SELECT * FROM post_data WHERE origin IS NOT NULL";

$res2=mysqli_query($conn,$q2);
$locs=mysqli_fetch_all($res2,MYSQLI_ASSOC);

$all_locs=array();

foreach ($locs as $loc) {
  $c=0;
  if(!empty($loc["Origin"]))
  {
    array_push($all_locs,$loc["Origin"]);
   

   //echo '<script type="text/javascript">','getdata($loc["Origin"])';'</script>';
  }
}


?>
<script src="http://www.webglearth.com/v2/api.js"></script>
<script>

  let marker=[];
  let place_name=[];
  var q;
  var querys = <?php echo json_encode($all_locs); ?>;


  for (var i = 0; i <querys.length ;  i++) 
  {

    
    getdata(querys[i],i);

  }
  

  async function getdata(q,num)
{

var url="https://us1.locationiq.com/v1/search.php?key=1deb26f08b907c&q="+q+"&format=json";
const response=await fetch(url);
const json=await response.json();

var lat= json[0].lat;
var lon= json[0].lon;

create_marker(q,lat,lon,num);

}

       var earth = new WE.map('earth_div');
        WE.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(earth);
      


      function create_marker(place,lat,lon,i) {


         place_name[i]=place;
         marker[i] = WE.marker([lat, lon]).addTo(earth);

marker[i].bindPopup("<p>"+ place_name[i] +"</p><br>"+"<a href=searchbyplaces.php?place="+place_name[i]+">View Recipes</a>", {maxWidth: 80,maxHeight:60, closeButton: true});

        //var markerCustom = WE.marker([50, -9], './images/marker.png', 100, 24).addTo(earth);

        earth.setView([20.5937, 78.9629], 2);


      }




</script>




<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>