<?php
require_once("header.php");
 
$franchiseId=$_POST["franchiseId"];
$franchiseTypeId=$_POST["franchiseType"];
$email=$_POST["franchise_email"];
$mobile=$_POST["mobile"];
$franchise_name=$_POST["franchise_name"];

$sql="update dx_franchise set name=?, franchiseTypeId=?,email=?,mobile=? where franchiseId=?";
$result=$con->query($sql,$franchise_name,$franchiseTypeId,$email,$mobile,$franchiseId);


 echo "<script>window.location='franchise-list.php?message=2'</script>";
?>

