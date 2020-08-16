<?php 


//$cleardb_url      = parse_url(getenv("recipe_url"));
//$cleardb_server   = $cleardb_url["host"];
//$cleardb_username = $cleardb_url["user"];
//$cleardb_password = $cleardb_url["pass"];
//$cleardb_db       = substr($cleardb_url["path"],1);




  //$conn= mysqli_connect("$cleardb_server","$cleardb_username","$cleardb_password","$cleardb_db");

	$conn= mysqli_connect("localhost","chandler","chandler","recipe");
$curr_date=date("d-m-Y");

function give($query)
{
$conn= mysqli_connect("localhost","chandler","chandler","recipe");
 $res=mysqli_query($conn,$query);
 $list=mysqli_fetch_all($res, MYSQLI_ASSOC);
 
 return $list;

}

function give_unique($query)
{
	$conn= mysqli_connect("localhost","chandler","chandler","recipe");
 $res=mysqli_query($conn,$query);
 $list=mysqli_fetch_array($res, MYSQLI_ASSOC);
 
 return $list;

}


function get_user($U_id)
{
	$conn= mysqli_connect("localhost","chandler","chandler","recipe");
 	$q1="SELECT * FROM Userinfo WHERE ID='$U_id'";
	$res_user=mysqli_query($conn,$q1);
 	$user=mysqli_fetch_array($res_user, MYSQLI_ASSOC);
 	$profile_pic_url=$user["profilepic"];

 
 return $user;

}

function get_pic($id)
{
$conn= mysqli_connect("localhost","chandler","chandler","recipe");
$q3="SELECT * FROM pic_data WHERE Pic_id='$id'";
$res3=mysqli_query($conn,$q3);
 $post_pic=mysqli_fetch_array($res3, MYSQLI_ASSOC);
 return $post_pic["Location"];
}


if($_SESSION["LoggedUID"]==0)
{
  
header("Location: index.php");

}





?>
