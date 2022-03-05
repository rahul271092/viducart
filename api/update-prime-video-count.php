<?php
require_once("../connection.php");
$userId=$_POST["u"];
$sql="update  prime_video_count set task_count=task_count+5 where userId=?";
$result=$con->query($sql,$userId);
?>