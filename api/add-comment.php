<?php 
require_once("../connection.php");

$userId=$_GET["u"];
$videoId=$_GET["v"];
$comment=$_GET["c"];
$sql="insert into video_comment(user_id,video_id,comment,created)values($userId,$videoId,$comment,now())";
$result=$con->query($sql);
echo "comment Added";
?>  