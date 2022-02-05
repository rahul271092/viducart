<?php 
require_once("header.php");

if(isset($_POST["blockbtn"]))
{
	$page=$_POST["page"];
    $status=$_POST["vstatus"];
$errorDescription=$_POST["errorDescription"];
    $is_status="R";
$f=0;
    for($i=0;$i<count($status);$i++){
	
  
    $videoId = $status[$i];
          if(count($errorDescription))
          {
                    foreach($errorDescription as $error)
                    
                    {
                      echo   $error[0];
                  
                  }
          }
            
//  $ed=$errorDescription[$i][$f];
 echo "Video ID".$videoId;

echo "<br/>Status:".$error;

$f++;
 //$sql="update video set block=1, is_status='".$is_status."', errorDescription='".$ed."' where id=".$videoId;
//   $result=$con->query($sql);
   }


//   echo "<script>window.location='videos.php?page=".$page."'</script>";
}



if(isset($_POST["publishbtn"]))
{
  $page=$_POST["page"];
  $status=$_POST["vstatus"];
  $is_status="Y";
    for($i=0;$i<count($status);$i++){
  $videoId = $status[$i]; 
//  mysqli_query($conn,"DELETE FROM employee WHERE userid='".$del_id."'");
    $sql="update video set is_status='".$is_status."' where id=".$videoId;
    $result=$con->query($sql);
   }
   echo "<script>window.location='videos.php?page=".$page."'</script>";

}


if(isset($_POST["unblockbtn"]))
{
	$page=$_POST["page"];
    $status=$_POST["vstatus"];
    $is_status="N";
    for($i=0;$i<count($status);$i++){
	$videoId = $status[$i]; 
//	mysqli_query($conn,"DELETE FROM employee WHERE userid='".$del_id."'");
    $sql="update video set block=0, is_status='".$is_status."' where id=".$videoId;
    $result=$con->query($sql);
   }
   echo "<script>window.location='videos.php?page=".$page."'</script>";

}

?>