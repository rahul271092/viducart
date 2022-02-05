<?php 
include_once(../connection.php);
if($_SERVER['REQUEST_METHOD']=='POST'){
$id=$_POST["id"];
$sql="update video set view=view+1 where id=".$id;
$result=$con->query($sql);
}
?>