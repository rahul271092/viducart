<?php
require_once("../connection.php");


// $sql="SELECT *
//   FROM video   AS r1 JOIN
//        (SELECT CEIL(RAND() *
//                      (SELECT MAX(id)
//                         FROM video)) AS id)
//         AS r2
//  WHERE r1.id >= r2.id
//  ORDER BY r1.id ASC
//  LIMIT 10";

$sql="   select v.id,v.video,v.thum,v.description,v.user_id,v.view,u.username,u.profile_pic, from video v, user u,video_like l  where l.video_id=v.id and  v.user_id=u.id and v.block=0 order by rand() limit 500";
 $videos=array();
//$sql="select * from  video  order by Rand()  Limit 20;";
$result=$con->query($sql)->fetchAll();
foreach ($result as $row)
{
	$rows[]=$row;	
}
echo json_encode(array('video'=>$rows));
?>

