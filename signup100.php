<?php


include 'db.php';

if(isset($_POST["name"]) || isset($_POST["email"])|| isset($_POST["password"])||isset($_POST["phonenumber"]))
{
    $name=$_POST["name"];
    $email=$_POST["email"];
    $password=$_POST["password"];
    $phonenumber=$_POST["phonenumber"];

}




$sql="INSERT INTO Userinfo (Name,Email,Password,Phone) values('$name','$email ','$password','$phonenumber')";



if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
  header("Location:index.php");


} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$last_id = mysqli_insert_id($conn);

//$tablename="accept".$last_id;
 
 //echo $tablename;

//$createaccepted="CREATE TABLE accept+ $last_id"






$conn->close();
?>