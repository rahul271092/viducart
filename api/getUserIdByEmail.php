<?php
require_once("../connection.php");

$sql="select id from user where email=?";
$email=$_GET["email"];
$result=$con->query($sql,$email)->fetchAll();
foreach($result as $rows)
{
    $userId=array("userId"=>$rows["id"]);
}
echo json_encode($userId);
?>