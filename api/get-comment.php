<?php
require_once("../connection.php");
$videoId=$_GET["v"];
$sql="select * from video_comment where video_id=".$videoId;
//$comment=array();
$result=$con->query($sql)->fetchAll();
foreach($result as $row)
{
        $rows[]=$row;
}
echo json_encode(array('comments'=>$rows));
?>