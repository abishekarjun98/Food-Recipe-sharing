<?php

session_start();

require 'db.php';

$LoggedUID= $_SESSION["LoggedUID"];

$l_id=$_SESSION["Latest_pic"];


$ing_values="";


$count=1;

$steps_values="";



$q1="SELECT * FROM pic_data WHERE Pic_id='$l_id'";

$res=mysqli_query($conn,$q1);
 $pic=mysqli_fetch_array($res, MYSQLI_ASSOC);

 $pic_url=$pic["Location"];


if(isset($_POST["Title"],$_POST["description"],$_POST["Serves"]))

{

$Title=$_POST["Title"];
$description=$_POST["description"];
$serves=$_POST["Serves"];


?>

<!DOCTYPE html>
<html>
<head>
<style>
    .post_content{
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            height:auto;
            width:550px;
            margin-top: 50px;
            margin-left: 500px;
}
.post_pic{
    width: 250px;
    height: 250px;
    margin-left: 100px;
    border-radius: 6px;
}
</style>
</head>
<body>

<div class="post_content" >

<img src="<?php echo $pic_url ?>" class="post_pic">

<?php
echo "<h1> $Title </h1>";
echo "<div>  $description </div>";
echo "Serves"." $serves ";
//echo "<h3> $ing_val </h3>";
?>
<h3>
    <?php

    $count_1=1;

        if (isset($_POST["ing"]) && is_array($_POST["ing"])){ 
    $input_array_name = array_filter($_POST["ing"]); 
    foreach($input_array_name as $field_value){
        $ing_values .= $field_value.",";

        echo nl2br ($count_1."-"."$field_value\n");
        $count_1++;
    }

    
}


    if (isset($_POST["steps"]) && is_array($_POST["steps"])){ 
    $input_array_name_2 = array_filter($_POST["steps"]); 
    foreach($input_array_name_2 as $field_value){

        
        $steps_values .= $field_value.",";
        echo nl2br ($count."-"."$field_value\n");
        $count++;
    }}

    ?>
    
</h3>


</div>

</body>
</html>



<?php





/*if()
{
$q2="INSERT INTO post_data VALUES(null,'$LoggedUID','$Title','$description','$serves','$ing_values','$steps_values','$l_id')";

mysqli_query($conn,$q2);

}

*/

}




?>