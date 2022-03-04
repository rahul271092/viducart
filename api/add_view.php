<?php 
require_once("../connection.php");
$id=$_POST["id"];
$sql="update video set view=view+1 where id=?";
$result=$con->query($sql,$id);
?>