<?php
require_once("../connection.php");
$userId=$_GET["u"];
$sql="select count(*) as record from  prime_video_count where userId=?";
$result=$con->query($sql,$userId)->fetchAll();
foreach($result as $row)
{
    $record= array('rec'=> $row["record"]);
}
if($record==0)
{
    $sql2="insert into prime_video_count(userId)values(?)";
    $result=$con->query($sql2,$userId);    
}
?>