<?php
include "header.php";
$userId=$_GET["user"];

$sql ="update user set active=2 where id=".$userId;
$con->query($sql);

$sql2="update franchise_user set is_release=1 where userId=".$userId;
$con->query($sql2);

echo "<script>window.location='users.php?msg=3'</script>";
 ?>

