
<?php

include 'db.php';

?>


<!DOCTYPE html>
<html>
<head>
<link href="https://fonts.googleapis.com/css2?family=PT+Serif&display=swap" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="http://code.jquery.com/jquery-1.8.2.js"></script> 
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

</style>
</head>
<body>

<div id="loader">
	<img src="images/pizza.png"/>
</div>
<p>
Can't Find Anything to cook ,Enter the Ingredients You have, We will find the Best Recipe for you!!!
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

	var foodquery = <?php echo json_encode($foodname["entry_content"]); ?>;
	console.log(foodquery);

var url=" https://www.googleapis.com/customsearch/v1?key=AIzaSyCeOsf_ZutZPxiRMTeBHeQcZzGiiteSnX8&cx=008767739067013867662:qovos-gsxu8&q="+foodquery;

async function getdata()
{

const response=await fetch(url);
const json=await response.json();

for (var i = 0; i<5 ; i++)
 {
	
		var title = document.createElement("H3");
		title.innerHTML = json.items[i].title;                
		document.getElementById("content").appendChild(title);

		var descp = document.createElement("P");
		descp.innerHTML = json.items[i].snippet;                
		document.getElementById("content").appendChild(descp);



	  		var fimg = document.createElement("IMG");
  			fimg.setAttribute("src", json.items[i].pagemap.cse_thumbnail[0].src);
			document.getElementById("content").appendChild(fimg);

	  			
				linebreak = document.createElement("br");
				document.getElementById("content").appendChild(linebreak);


	  			var a = document.createElement('a'); 
                var link = document.createTextNode("View Full Recipe");
                a.appendChild(link);   
                a.title = "View Full Recipe"; 
                a.href = json.items[i].formattedUrl;  
                document.getElementById("content").appendChild(a);

                         
}
}
 getdata();
  $(window).load(function() {  
      $("#loader").fadeOut(1000);  
   });


 
</script>

</html>


