<?php
require_once("../connection.php");

$email=$_GET["e"];
$sql="select count(*) as record from  user where email=?";
$result=$con->query($sql,$email)->fetchAll();
foreach($result as $row)
{
    $record= array('rec'=> $row["record"]);

}
echo json_encode($record);
?>