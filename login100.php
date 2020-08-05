<?php



include 'db.php';
session_start();

if(isset($_POST['name'])||isset($_POST["password"]))
{
  $name=$_POST['name'];
  $password=$_POST['password'];


  $query="SELECT * from Userinfo where name='$name' AND password='$password'";
 

  $result=mysqli_query($conn,$query);
  $rows=mysqli_num_rows($result);
  $user=mysqli_fetch_array($result, MYSQLI_NUM);


  //echo $user;
 // $AID = mysqli_fetch_array($resultid, MYSQLI_NUM);


  if($rows==1)
  {
    
   printf ("%s", $user[0]);
   $_SESSION["LoggedUID"] = $user[0]; 
    
    echo "User logged in";
    
    header("Location: openpage.php");


  }
  else
  {
    echo "Password combination invalid.";
  }
}

//mysqli_free_result($user);
//    mysql_close($conn);


?>