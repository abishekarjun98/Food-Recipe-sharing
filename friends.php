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
	  <!--<link rel="stylesheet" href="navbar.css">-->
	  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

	<style>
.profilepic
{
width :40px;
 height:40px;
 border-radius: 50%;
    float: left;
}


.People_class{
  border: 1px solid #ddd;
  margin-top: -1px; 
  background-color: #f6f6f6;
  padding: 12px;
  text-decoration: none;
  font-size: 18px;
  color: black;
  display: block;
  margin-top: 10px;
}

#People li a:hover:not(.header) {
  background-color: #eee;
}

#People li:hover:not(.header) {
  
  cursor: pointer;
  transform: scale(1.05); 

  }
  #People
  {
    margin-left: 300px;
    width: 600px;
  }

.link_class
{
  border-radius: 4px;
  margin-left: 100px;
  background-color:  #00E506;
}

.b_linkclass{
  margin-left: 100px;
}

#searchbar{
  background-image: url('images/search.png');
  background-position: 10px 12px;
  background-repeat: no-repeat;
  width: 40%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
  margin-left: 300px;
  
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


<div class="search_people_div">
<input id="searchbar" onkeyup="search_people()" type="text" name="search" placeholder="Search People......"> 

<ul id="People"></ul>


</div>

<body>

<?php

$q2="SELECT * FROM Userinfo WHERE ID!='$LoggedUID'";

$res=mysqli_query($conn,$q2);
 $users=mysqli_fetch_all($res, MYSQLI_ASSOC);
$len=sizeof($users);

 ?>


<script>
var i=0;
<?php 

foreach ($users as $user) {
 ?>
i++;


<?php
  
  $a_id=$user["ID"];
$q4="SELECT * FROM followers_data WHERE user2_id='$a_id' AND user1_id='$LoggedUID'";

$res2=mysqli_query($conn,$q4);
 $fuser=mysqli_num_rows($res2);
 echo "$fuser";
?>



//var text_status=<?php //echo json_encode($status); ?>;



var node = document.createElement("LI"); 
node.setAttribute("class","People_class")  

        var fimg = document.createElement("IMG");
        fimg.setAttribute("src","<?php echo $user["profilepic"]?>");
        fimg.setAttribute("class","profilepic");
        node.appendChild(fimg);
        var textnode = document.createTextNode("<?php echo $user["Name"]; ?>");  
        //textnode.href="profile.php?f_ID=<?php echo $user["ID"] ?>";       
        node.appendChild(textnode);
        var b=document.createElement('a');
        var link = document.createTextNode("view profile");
        b.title="viewprofile"
        b.appendChild(link);   
        b.href = "profile.php?f_ID=<?php echo $user["ID"] ?>";
        b.setAttribute("class","b_linkclass")
        node.appendChild(b);  



<?php
 if($fuser>0)
 {
?>

var a = document.createElement('a'); 
                var link = document.createTextNode("Unfollow");
                a.appendChild(link);   
                a.title = "Unfollow"; 
                a.href = "friends.php?rej_ID=<?php echo $user["ID"] ?>"; 
                a.setAttribute("class","link_class");


<?php
 }
 else{
?>
  var a = document.createElement('a'); 
                var link = document.createTextNode("Follow");
                a.appendChild(link);   
                a.title = "Follow"; 
                a.href = "friends.php?add_ID=<?php echo $user["ID"] ?>"; 
                a.setAttribute("class","link_class");


<?php
 }

 ?>

                


/*
btn.setAttribute("class","btn_class");
var btn_text=document.createTextNode("Follow");
btn.appendChild(btn_text);
node.appendChild(btn);


btn.id=<?php echo json_encode($user["ID"]); ?>;
btn_text.id="<?php echo "text".$user["ID"]; ?>";
btn.setAttribute('onclick', 'func(<?php echo json_encode($user["Name"]); ?>, <?php echo json_encode($user["ID"]); ?>)');

*/

node.appendChild(a);

document.getElementById("People").appendChild(node);

<?php } ?>







function func(username,k)
{
  var clicked_btn =document.getElementById(k);
  var clicked_btn_text=document.getElementById("text"+"k");
  var new_textnode = document.createTextNode("Following");
  clicked_btn.replaceChild(new_textnode, clicked_btn.childNodes[0]);

}

function search_people() { 
    let input = document.getElementById('searchbar').value 
    input=input.toLowerCase(); 
    let x = document.getElementsByClassName("People_class"); 
      
    for (i = 0; i < x.length; i++) {  
        if (!x[i].innerHTML.toLowerCase().includes(input)) { 
            x[i].style.display="none"; 
        } 
        else { 
            x[i].style.display="list-item";                  
        } 
    } 
} 


</script>








<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>



<?php

if(isset($_GET["add_ID"]))
{
  
  $ID_to_add=mysqli_real_escape_string($conn,$_GET["add_ID"]);


  $q3="INSERT INTO followers_data VALUES('$LoggedUID','$ID_to_add')";

  if ($conn->query($q3) === TRUE) {
 // header("Location : friends.php");
echo '<script type="text/javascript">location.reload();</script>';

}

  
}

if(isset($_GET["rej_ID"]))
{
  $ID_to_rej=mysqli_real_escape_string($conn,$_GET["rej_ID"]);


  $q5="DELETE FROM followers_data WHERE user1_id='$LoggedUID'AND user2_id='$ID_to_rej' ";

  if ($conn->query($q5) === TRUE)
  {

  
echo '<script type="text/javascript">location.reload();</script>';

//echo '<script>alert("Un followed")</script>';
  
}
}



?>