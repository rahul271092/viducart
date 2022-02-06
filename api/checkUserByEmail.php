<?php
require_once("../connection.php");

$userId=$_GET["u"];
$sql="select count(*) as record from  user where id=".$userId;
$result=$con->query($sql)->fetchAll();
foreach($result as $row)
{
    $record=$row["record"];

}
echo json_encode(array("record"=>$record));
?>