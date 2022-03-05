<?php
require_once("../connection.php");
$userId=$_GET["u"];
$sql="select task_count as task from prime_video_count where userId=?";
$result=$con->query($sql,$userId)->fecthAll();
foreach($result as $row)
{
    $record= array('task_count'=> $row["task"]);

}
echo json_encode($record);

?>