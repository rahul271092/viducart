<?php
require_once("../connection.php");
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");
if(isset($_GET["fr"]))
{
$franchiseId=$_GET["fr"];
//echo $franchiseId;

$sql="select count(*) as pvideo from video v, franchise_user fu where v.user_id=fu.userId and fu.franchiseId=? and is_status=? and month(v.created)=Month(CURRENT_DATE())";

 $publish_video=$con->query($sql,$franchiseId,"Y")->fetchAll();
foreach ($publish_video as $ptVideo)
{

$diamond=array("pubvideo"=>10*$ptVideo["pvideo"]);

}
echo json_encode($diamond);
}
?>