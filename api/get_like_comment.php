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

$id=$_GET["v"];
$sql=" call getVideoCommentCount($id)";;
 $videos=array();
//$sql="select * from  video  order by Rand()  Limit 20;";
$result=$con->query($sql)->fetchAll();
foreach ($result as $row)
{
	$rows[]=$row;	
}
echo json_encode(array('video'=>$rows));
?>
