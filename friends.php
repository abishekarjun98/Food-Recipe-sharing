<?php

session_start();
require 'db.php';

$LoggedUID= $_SESSION["LoggedUID"];


$user=get_user($LoggedUID);
 $profile_pic_url=$user["profilepic"];


?>


<!DOCTYPE html>
<html>
<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
  font-size: 18px;
  color: black;
  display: block;
  margin-top: 10px;
  border-radius: 6px;
  height:70px;
}
.Post_class{
  border: 1px solid #ddd;
  margin-top: -1px; 
  background-color: #f6f6f6;
  padding: 12px;
  height: 150px;
  font-size: 18px;
  color: black;
  display: block;
  margin-top: 10px;
  border-radius: 10px;
}



#People li:hover:not(.header) {
  
  cursor: pointer;
  transform: scale(1.05); 


  }
  #People
  {
    margin-left: 300px;
    width: 600px;
    list-style-type:none;
  }

.link_class
{
  border-radius: 4px;
  margin-left: 100px;
  background-color:  #00E506;
  float: right;
}

.b_linkclass{
  float: left;
  margin-left: 10px;
}
.c_linkclass{
  float: right;
}
.post_pic_class
{
  height: 100px;
  width:100px;
  border-radius: 6px;
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
#more
{
  margin-left: 340px;
  width:36%;
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


<div class="search_people_div">
<input id="searchbar" onkeyup="search_people()" type="text" name="search" placeholder="Search People,Recipes
......"> 

<ul id="People"></ul>

</div>
<a id="more" class="btn btn-warning" href="webrecipe.php" type="button"  data-toggle="tooltip" data-placement="top">
  Get Best Recipes from Web!</a>

<body>

<?php

$q2="SELECT * FROM Userinfo WHERE ID!='$LoggedUID'";
$users=give($q2);


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


var node = document.createElement("LI"); 
node.setAttribute("class","People_class");

        var fimg = document.createElement("IMG");
        fimg.setAttribute("src","<?php echo $user["profilepic"]?>");
        fimg.setAttribute("class","profilepic");
        node.appendChild(fimg);
        var b=document.createElement('a');
        var link = document.createTextNode("<?php echo nl2br($user["Name"]); ?>");
        b.appendChild(link);   
        b.href = 'profile.php?f_ID=<?php echo nl2br($user["ID"]); ?>';
        b.setAttribute("class","b_linkclass");
        node.appendChild(b);  
        var brk=document.createElement("BR");
        node.appendChild(brk);
      var bio_node=document.createTextNode("<?php echo $user["Bio"]; ?>")

        node.appendChild(bio_node);



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


node.appendChild(a);

document.getElementById("People").appendChild(node);

<?php } ?>






$("#People").hide();
$("#more").hide();
function func(username,k)
{
  var clicked_btn =document.getElementById(k);
  var clicked_btn_text=document.getElementById("text"+"k");
  var new_textnode = document.createTextNode("Following");
  clicked_btn.replaceChild(new_textnode, clicked_btn.childNodes[0]);

}

function search_people() { 

  
    let input = document.getElementById('searchbar').value ;
    input=input.toLowerCase(); 
    //let x = document.getElementsByClassName("People_class");
    let x = $(".Post_class,.People_class");
   
    console.log(x);


  for (i = 0; i < x.length; i++) {  
        if (!x[i].innerHTML.toLowerCase().includes(input)) { 
            x[i].style.display="none"; 
        } 
        
        else { 
$("#People").show();
$("#more").show();

            x[i].style.display="list-item";                  
        } 
    } 
} 

$(function () {
  $('[data-toggle="popover"]').popover()
})

</script>




<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script type="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
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

  if (mysqli_query($conn,$q5))
  {

//echo '<script type="text/javascript">location.reload();</script>';
echo '<script>alert("Un followed")</script>';
  
}
}



?>

<?php


$q_posts="SELECT* FROM post_data ";

$list_posts=give($q_posts);


foreach ($list_posts as $post) {
  
  $id=$post["Post_Pic"];

 

 $pic_url=get_pic($id);

?>




<script type="text/javascript">
  

  var post_node=document.createElement("LI");
  post_node.setAttribute("class","Post_class");

   var pimg = document.createElement("IMG");
        pimg.setAttribute("src","<?php echo $id?>");
        pimg.setAttribute("class","post_pic_class");
        post_node.appendChild(pimg);




  var textnode2 = document.createTextNode("<?php echo " ".$post["Title"]; ?>");        
        post_node.appendChild(textnode2);

        var c= document.createElement('a');
        var link_post = document.createTextNode("view Recipe");
        c.title="view recipe";
        c.appendChild(link_post);   
        c.href = "displayrecipe.php?ID=<?php echo $post["P_ID"];?>";
        c.setAttribute("class","c_linkclass");
        post_node.appendChild(c);  



document.getElementById("People").appendChild(post_node);


</script>

<?php
}
?>