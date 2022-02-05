<?php
require_once("header.php");
?>

<div class="container">
		<div class="page-header">
		<h3>
            <span class="fa fa-user"></span>		User Information 
		</h3>
</div>
    

    <?php
	$user_info=	$con->query('select * from user where id=?;',$_GET["user"])->fetchAll();
	foreach ($user_info as $user)
	{	
    ?>
      <div class="panel panel-primary">
      		<div class="panel-heading">
      				<label><span class="fa fa-user"></span> User Information </label>
      		</div>
      		<div class="panel-body">
      				<div class="form-group">
      						<div class="row">
      								<div class="col-md-2">
      										Full Name 
      								</div>
      								<div class="col-md-4">
      										<label><?php echo $user["first_name"]." ".$user["last_name"]; ?></label>
      								</div>

      								<div class="col-md-2">
      										Gender 
      								</div>
      								<div class="col-md-4">
      										<strong><?php  echo $user["gender"];?></strong>
      								</div>

      						</div>
      				</div>


      				<div class="form-group">
      						<div class="row">
      								<div class='col-md-2'>
      										Email 
      								</div>
      								<div class="col-md-4">
      										<strong><?php echo $user["email"]; ?></strong>
      								</div>
      								<div class="col-md-2">
      										Bio 
      								</div>
      								<div class="col-md-4">
      										<strong><?php echo $user["bio"]; ?> </strong>
      								</div>
      						</div>
      				</div>



<div class="form-group">
      						<div class="row">
      								<div class='col-md-2'>
      										Website 
      								</div>
      								<div class="col-md-4">
      										<strong><?php echo $user["website"]; ?></strong>
      								</div>
      								<div class="col-md-2">
      										Role 
      								</div>
      								<div class="col-md-4">
      										<strong><?php echo $user["role"]; ?> </strong>
      								</div>
      						</div>
      				</div>



      		</div>
      </div>

    <?php
}
    ?>
	

<div class="form-group">
		<div class="row">


<?php
   $total_video=$con->query("select count(*) as tvideo from video where user_id=?",$_GET["user"])->fetchAll();
   foreach($total_video as $vtVideo)
   {
?>
		<div class="col-md-4">
				<div class="panel panel-primary">
					<div class="panel-heading">
							<label> <span class="fa-video-camera fa"></span> Total Video </label>
					</div>
					<div class="panel-body">
							<div class="text-center">
									<h1><?php echo $vtVideo["tvideo"]; ?></h1>
							</div>
					</div>


				</div>
		</div>	


 <?php
   }
 ?>

<?php
   $publish_video=$con->query("select count(*) as pvideo from video where user_id=? and block=?",$_GET["user"],0)->fetchAll();
   foreach($publish_video as $ptVideo)
   {
?>
		<div class="col-md-4">
				<div class="panel panel-success">
					<div class="panel-heading">
							<label> <span class="fa-video-camera fa"></span> Verify Video </label>
					</div>
					<div class="panel-body">
							<div class="text-center">
									<h1><?php echo $ptVideo["pvideo"]; ?></h1>
							</div>
					</div>


				</div>
		</div>	


 <?php
   }
 ?>



<?php
   $deny_video=$con->query("select count(*) as dvideo from video where user_id=? and block=?",$_GET["user"],1)->fetchAll();
   foreach($deny_video as $dtVideo)
   {
?>
		<div class="col-md-4">
				<div class="panel panel-danger">
					<div class="panel-heading">
							<label> <span class="fa-video-camera fa"></span> Blocked Video </label>
					</div>
					<div class="panel-body">
							<div class="text-center">
									<h1><?php echo $dtVideo["dvideo"]; ?></h1>
							</div>
					</div>


				</div>
		</div>	


 <?php
   }
 ?>

<h3><span class="fa fa-play-circle "></span> Video List</h3>

<table class="table table-hover">
<tr>
<th>#</th>
<th>Video ID</th>
<th>Description</th>
<th>Video</th>
<th>Views</th>
<th>Created Date </th>
<th>Status </th>
</tr>

<?php 
      $videos=$con->query("select * from video where user_id=?",$_GET["user"])->fetchAll();
      $i=1;
      foreach($videos as $video)
      {
?>
      <tr>
      <td><?php echo $i; ?></td>
      <td><?php echo "VIDU".$video["id"]; ?></td>
      <td><?php echo $video["description"]; ?></td>
      <td><a target="_blank" href='<?php echo "https://vidcart.wwmsc.in/api/".$video["video"]; ?>'><span class="fa fa-play-circle"></span></a></td>
      <td><?php echo $video["view"] ?></td>
      <td><?php echo $video["created"] ?></td>
      <td><?php if($video["block"]=="0"){ echo "<span style='background:green;color:white;padding:5px;border-radius:3px;'>OK</span>";} else{ echo "<span style='background:red;color:white;padding:5px;border-radius:3px;'>Block</span>";} ?>
      </tr>

      

<?php
      $i++;
      } 
?>

</table>



		</div>
</div>
















</div>

<?php
require_once("footer.php");
?>
