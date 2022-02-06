<?php
require_once("../connection.php");

$mobile=$_GET["m"];

$sql="select id from user where phone=$mobile";
$result=$con->query($sql)->fetchAll();
foreach ($result as $userId)
{
$mId=array("id"=>$userId["id"]);
}
echo json_encode($mId);
?>