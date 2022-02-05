<?php
require_once('../connection.php');
session_start();
define ("API_KEY","156c4675-9608-4591-1111-00000");

function curl_request($data,$url)
{
    $headers = [
          "Accept: application/json",
          "Content-Type: application/json",
          "api-key: ".API_KEY." "
      ];

    $data = $data;

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    $return = curl_exec($ch);
    $json_data = json_decode($return, true);
    $curl_error = curl_error($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    
    return $json_data;
}



    $sql="select ft.user_limit as user_limit, ft.franchiseType as franchiseType from dx_franchise f , franchiseType ft where f.franchiseTypeId=ft.franchiseTypeId and f.franchiseId=?";
                                      $plan=$con->query($sql,$_SESSION["franchiseId"])->fetchArray();   
                                    $total= $plan["user_limit"];
        $sql2="select * from franchise_user fu, user u where fu.is_release=0 and fu.userId=u.id and fu.franchiseId=?";
                                      $user=$con->query($sql2,$_SESSION["franchiseId"]); 
                                    $created= $user->numRows();                        

                                       $remain=$total-$created;

if($remain!=0)
{
if(isset($_POST["username"])&& isset($_POST['email'])&& isset($_POST['password']))
    {
$username=htmlspecialchars($_POST['username'],ENT_QUOTES);
$email= htmlspecialchars($_POST['email'], ENT_QUOTES);
$password=htmlspecialchars($_POST['password'], ENT_QUOTES);
 $created = date('Y-m-d H:i:s', time());
 $first_name=htmlspecialchars($_POST["first_name"],ENT_QUOTES);
 $last_name =htmlspecialchars($_POST["last_name"],ENT_QUOTES);
$franchiseId=$_SESSION["franchiseId"];
$base_url="https://vidcart.wwmsc.in/api/";
$url=$base_url.'/admin/addUser';

$data=array(
	"username" =>$username,
	"email" =>$email,
	"password" =>$password,
	"role" =>"user",
	"first_name"=>$first_name,
	"last_name"=>$last_name
	);

 $json_data=@curl_request($data,$url);
          
            if($json_data['code'] !== 200)
            {
                
                $error=$json_data['msg'];
          echo "<script>window.location='add-user.php?user=error3&msg=".$error."'</script>";
            }
            else
            {

                $account=$con->query('select * from user order by id desc limit 1')->fetchArray();
                $userId=$account['id'];
                $con->query('insert into franchise_user(franchiseId,userId)values(?,?)',array($franchiseId,$userId));  
                $con->close();
                echo "<script>window.location='add-user.php?user=success'</script>";
            }
    }
}
else if($remain==0)
{
echo "<script>window.location='add-user.php?user=error2'</script>";
}
else{

 echo "<script>window.location='add-user.php?user=error'</script>";
}

?>