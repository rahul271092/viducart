<?php 
session_start();
require_once("../connection.php");
$exists=1;
$userId=0;
$email=$_POST["user_email"];
	$sql3="select * from user where email=?";
	$result=$con->query($sql3,$email)->fetchArray();
	$userId=$result["id"];	



	$sql="select count(*) as record from franchise_user where userId=?";
	$checkUser=$con->query($sql,$userId)->fetchArray();
	$exists=$checkUser["record"];




    if($userId!=0 && $exists==0)
    {
   $sql="select ft.user_limit as user_limit, ft.franchiseType as franchiseType from dx_franchise f , franchiseType ft where f.franchiseTypeId=ft.franchiseTypeId and f.franchiseId=?";
                                      $plan=$con->query($sql,$_SESSION["franchiseId"])->fetchArray();   
                                    $total= $plan["user_limit"];
        $sql2="select count(*) as record from franchise_user fu, user u where fu.userId=u.id and fu.franchiseId=? and is_release=0";
                                      $user=$con->query($sql2,$_SESSION["franchiseId"])->fetchArray(); 
                                    $created= $user["record"];                        

                                       $remain=$total-$created;



if($remain!=0)
{
	$franchiseId=$_SESSION["franchiseId"];	
	$sql4="insert into franchise_user(franchiseId,userId)values(?,?);";
	$result2=$con->query($sql4,$franchiseId,$userId);
echo "<script>window.location='users.php?user=success'</script>";
}
else if($remain==0)
 {
echo "<script>window.location='users.php?user=error2'</script>";
}
else{
 echo "<script>window.location='users.php?user=error'</script>";
}

    }
    else{
    	echo "<script>window.location='users.php?user=error5'</script>";
    }




?>