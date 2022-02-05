<?php
require_once('header.php');

$target_warning="";
$publish_video="";
$publish_diamond="";



									$sql="select ft.user_limit as user_limit, ft.franchiseType as franchiseType, ft.video_target as video_target from dx_franchise f , franchiseType ft where f.franchiseTypeId=ft.franchiseTypeId and f.franchiseId=?";
									  $plan=$con->query($sql,$_SESSION["franchiseId"])->fetchArray();	
									$total= $plan["user_limit"];
									$detail=$plan["franchiseType"];
									$video_target=$plan["video_target"];





 $publish_video=$con->query("select count(*) as pvideo from video v, franchise_user fu where v.user_id=fu.userId and fu.franchiseId=? and is_status=? and month(v.created)=Month(CURRENT_DATE())",$_SESSION["franchiseId"],"Y")->fetchAll();
   foreach($publish_video as $ptVideo)
   {
   		$publish_video=$ptVideo["pvideo"];
   }	

    if($publish_video<=$video_target)
    {
    	$publish_diamond=10*$publish_video;
    }
    else{
    	$publish_diamond=10*$video_target;
    }

?>





<div class="container">



<div class="page-header">
<h3 style="font-weight:bold;"><span class="fa fa-dashboard"></span> Dashboard </h3>
</div>

<div class="alert alert-info">
<label>
    <span class="fa fa-info-circle fa-2x"></span> &nbsp; Currently, Viducart Beta Program is running, Uploaded Video not counting in the franchise Account.
 </label>
</div>


<?php  if($publish_video>$video_target) {?>
<div class="alert alert-success">
<label>
    <span class="fa fa-warning fa-2x"></span> &nbsp; Your This month Video publishing target is completed !!.
 </label>
</div>
<?php } ?>



<div class="form-group">
<div class="row">
		<div class="col-md-12">
				<h3 style="font-weight:bold;"><span style="color:#000;" class="fa fa-file"> Plan: </span> <?php echo $detail; ?> </h3>
		</div>
</div>
</div> 



<div class="row">
		<div class="col-md-4">
				<div class="panel panel-primary">
						<div class="panel-heading">
						<label><span class="fa fa-user"></span> Total User Account </label>
						</div>
						<div class="panel-body">
								<div class="text-center">
									<h1>
									<?php
										echo $total;
									  ?> </h1>
								</div>
						</div>
				</div>
		</div>
		<div class="col-md-4">
				<div class="panel panel-success">
						<div class="panel-heading">
						<label><span class="fa fa-user"></span> Created User Account </label>
						</div>
						<div class="panel-body">
								<div class="text-center">
									<h1><?php 
									$sql="select * from franchise_user fu, user u where fu.userId=u.id and fu.franchiseId=? and is_release=0;";
									  $user=$con->query($sql,$_SESSION["franchiseId"]);	
									$created= $user->numRows(); 
										echo $created;
									 ?> </h1>
								</div>
						</div>
				</div>

</div>

		<div class="col-md-4">
				<div class="panel panel-warning">
						<div class="panel-heading">
						<label><span class="fa fa-user"></span> Remaining Account </label>
						</div>
						<div class="panel-body">
								<div class="text-center">
									<h1><?php 
											$remaining= $total-$created;	
												echo $remaining;
																 ?> </h1>
								</div>
						</div>
				</div>
</div>
	



<div class="row">
   

<div class="col-md-4">
		<div class="panel panel-primary">
					<div class="panel-heading">
							<label>Video Target </label>
					</div>
				<div class="panel-body">
						<div class="text-center">
								<h1><?php echo $video_target; ?></h1>
						</div>
				</div>
		</div>

</div>



<?php
  
?>
		<div class="col-md-4">
				<div class="panel panel-success">
					<div class="panel-heading">
							<label> <span class="fa-video-camera fa"></span> Publish Video </label>
					</div>
					<div class="panel-body">
							<div class="text-center">
									<h1><?php echo $publish_video; ?></h1>
							</div>
					</div>


				</div>
		</div>	



<div class="col-md-4">
				<div class="panel panel-success">
					<div class="panel-heading">
							<label> <span class="fa-video-camera fa"></span>This month Diamonds </label>
					</div>
					<div class="panel-body">
							<div class="text-center">
									<h1><?php echo $publish_diamond; ?><img src="../images/red.png" style="width:80px;height:80px;" /></h1>
							</div>
					</div>
				</div>
		</div>	
 <?php
 
 ?>

    </div>
</div>



<div class="row">
      <div class="col-md-6">
      		<div class="panel panel-primary">
      				<div class="panel-heading">
      					<label> <span class="fa fa-info-circle "></span> Instructions </label>
      				</div>
      				<div class="panel-body">

      					<ul>
      						<li>
      							 Platform Introduce the diamond system for measuring the rewards and for doing the other calculation related to a work. Here diamond is only used as a measuring entity.
      						</li>
      						<li>
      							Platform introduces two types of diamonds i.e. Red Diamond (<img src="../images/red.png" style="width:15px;height:15px;"  />) and Blue Diamond (<img src="../images/blue.png" style="width:15px;height:15px;"  />). Each diamond hold a value according to which the calculations has been done. Red diamond holds a value approx. 1 Rupee for 1 Red Diamond while Blue diamond holds a value approx. 0.10 Rupee i.e. (10 paise) for 1 Blue Diamond.
      						</li>

      						<li>
      							Red Diamond (<img src="../images/red.png" style="width:15px;height:15px;"  />) is deals with the video creators, App Promoters and other company working member only
      						</li>

      						<li>
      							Video Creators/Franchise/App Promoters only needs to create and upload 20% video of the earlier given target for the platform.
      						</li>
      						<li> Video must be of good quality and follow the guidelines. 
      						</li>
      						<li>
      							Video must be cover a full screen of mobile device otherwise the video will be rejected.
      						</li>
      						<li> Video doesn't contain any third party logo, or any other 3rd party information.
      						</li>
      						<li> Video Content doesnt't contain any rumours or physcial violence information into it. if it is find out that the content contains anything related to it. so, our company can take action against them. 
      						</li>
						<li>Once the Video has been uploaded on our site, it would be deemed as a property of our company and the authorization of the video rest with the company </li>


      					</ul>


      				</div>
      		</div>

      	

      </div>

      	<div class="col-md-6">

<div class="panel panel-primary">
			<div class="panel-heading">
					<label>Working Guidelines</label>
			</div>
				<div class="panel-body">


               <p> Reasons to Reject Video
               </p>

               <div class="panel panel-primary">
               	   <div class="panel-heading">
                         <label>Reasons to Reject Video </label>
               	   </div>
               		<div class="panel-body">
               				<ol>
               					<li> Half screen Video not Allowed </li>
               					<li> Third party Logo.</li>
               					<li>Minimum 15 Second video is allowed </li>
               					<li>Poster/Photo video not allowed </li>
               					<li>Story Incomplete </li>
               					<li>No Description or hashtag is not formed </li>
               					<li>Status Videos not Allowed </li>
               					<li>Nude and Vulgor Videos are not allowed </li>
               					<li>Cartoon/ Animated Videos not allowed </li>
               				</ol>
               		</div>
               </div>





                 <p>GuideLines for the Video Creation are as follow : </p>
      				<table class="table table-bordered">
      					<tr>
      						<th>#</th>
      						<th>Instructions</th>
      						<th>Diamond Offers </th>
      					</tr>
      					<tr>
      						<td>
      						1</td>
      						<td>
      							Video create, upload on to the Let Share IT Platform and after successfully publish  
      						</td>
      						<td>
      							5 <img src="../images/red.png" style="width:15px;height:15px;"  />
      						</td>
      					</tr>

      					<tr>
      						<td>2</td>
      						<td>For Every 1000 Views completion </td>
      						<td>10 <img src="../images/red.png" style="width:15px;height:15px;"  /> </td>
      					</tr>
      					<tr>
      						<td>3</td>
      						<td>100 Share of videos </td>
      						<td>10 <img src="../images/red.png" style="width:15px;height:15px;"  /> </td>
      					</tr>
      					<tr>
      						<td>&nbsp;</td>
      						<td><b>Total</b></td>
      						<td><b>25 <img src="../images/red.png" style="width:15px;height:15px;"  /> </b> </td>
      					</tr>
      				</table>
      		</div>
			</div>
</div>

</div>


</div>
<?php
require_once('footer.php');
?>