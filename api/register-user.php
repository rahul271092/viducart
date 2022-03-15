<?php
require_once("../connection.php");
$username=$_POST["username"];
$city_id=85437;
$state_id=3176;
$country_id=101;
$active=1;
$email=$_POST["email"];
$role="user";
$password="$2a$10$/TPvN0A2h8egEnxSq8PNBOF7U.lklHY.UFiMxmRCK9AtQs/hLoFKS";
$dob="2000-01-01";
$name=$_POST["name"];
$sql="insert into user(first_name,dob,email,password,role,username,active,city_id,state_id,country_id)values(?,?,?,?,?,?,?,?,?,?);";
$result=$con->query($sql,$name,$dob,$email,$password,$role,$username,$active,$city_id,$state_id,$country_id);
?>