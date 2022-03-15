<?php
require_once("../connection.php");
$video=$_POST["video_name"];
$sql="call UpdateVideoBlock(?)";
$result=$con->query($sql,$video);
header("Location:update-video-status.php?message=1");
?>