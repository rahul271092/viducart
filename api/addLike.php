<?php
require_once("../connection.php");
$userId=$_GET["u"];
$videoId=$_GET["v"];



$sql1="select count(*) as record from video_like where video_id=".$videoId." and user_id=".$userId;

$result1= $con->query($sql1)->fetchAll();
foreach ($result1 as $row)
{
    $rc=$row["record"];

}

//echo $rc;

     if($rc>0)
     {
         $sql="delete from video_like where user_id=".$userId." and video_id=".$videoId;
         $result=$con->query($sql);
     }

     else{
        $sql="insert into video_like(user_id,video_id,created)values($userId,$videoId,now());";
        $result=$con->query($sql);

    }


    $sql3="select count(*) as record from video_like where video_id=".$videoId." and user_id=".$userId;

    $result3= $con->query($sql3)->fetchAll();
    foreach ($result3 as $row3)
    {
        $r3=$row3["record"];
    
    }

    echo $r3;



?>



