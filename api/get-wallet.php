<?php
require_once("../connection.php");
$userId=$_POST["userId"];
$sql="select wallet from user where id=?";
$result=$con->query($sql,$userId)->fetchAll();
foreach($result as $row)
{
    $record= array('wallet'=> $row["wallet"]);
}
echo json_encode($record);
?>