<?php
require_once("../connection.php");
$userId=$_GET["userId"];
$videoId=$_GET["videoId"];



$sql1="select count(*) as record from video_like where video_id=".$videoId." and user_id=".$userId;

$result1= $con->query($sql1,$videoId,$userId)->fetchAll();
foreach ($result1 as $row)
{
    $rc=$row["record"];

}

//echo $rc;

     if($rc>0)
     {
         $sql="delete from video_like where user_id=? and video_id=?";
         $result=$con->query($sql,$userId,$videoId);
     }

     else{
        $sql="insert into video_like(user_id,video_id,created)values(?,?,now());";
        $result=$con->query($sql,$userId,$videoId);

    }


    $sql3="select count(*) as record from video_like where video_id=?";

    $result3= $con->query($sql3,$videoId)->fetchAll();
    foreach ($result3 as $row3)
    {
        $r3=$row3["record"];
    
    }

    echo json_encode(array("like_count"=>$r3));

?>



