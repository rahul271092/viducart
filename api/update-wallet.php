<?php
require_once("../connection.php");
$amount=$_POST["amount"];
$userId=$_POST["userId"];
$sql="update user set wallet=wallet+'$amount' where id=?";
$result=$con->query($sql,$userId);
?>