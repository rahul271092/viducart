<?php
require_once("header.php");
?>

<div class="container">
<div class="page-header">
<h3><span class="fa fa-video-camera"></span> Videos </h3>
</div>
<div class="form-group">
		<div class="row">


<?php
   $total_video=$con->query("select count(*) as tvideo from video v, franchise_user fu where v.user_id=fu.userId and fu.franchiseId=?",$_SESSION["franchiseId"])->fetchAll();
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
   $publish_video=$con->query("select count(*) as pvideo from video v, franchise_user fu where v.user_id=fu.userId and fu.franchiseId=? and block=?",$_SESSION["franchiseId"],0)->fetchAll();
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
   $deny_video=$con->query("select count(*) as dvideo from video v, franchise_user fu where v.user_id=fu.userId and fu.franchiseId=? and block=?",$_SESSION["franchiseId"],1)->fetchAll();
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


</div>
</div>







<div class="form-group">
		<div class="row">


<?php
   $total_video=$con->query("select count(*) as tvideo from video v, franchise_user fu where v.user_id=fu.userId and fu.franchiseId=?",$_SESSION["franchiseId"])->fetchAll();
   foreach($total_video as $vtVideo)
   {
?>
		<div class="col-md-3">
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
   $publish_video=$con->query("select count(*) as pvideo from video v, franchise_user fu where v.user_id=fu.userId and fu.franchiseId=? and is_status=?",$_SESSION["franchiseId"],"Y")->fetchAll();
   foreach($publish_video as $ptVideo)
   {
?>
		<div class="col-md-3">
				<div class="panel panel-success">
					<div class="panel-heading">
							<label> <span class="fa-video-camera fa"></span> Publish Video </label>
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
   $pending_video=$con->query("select count(*) as pevideo from video v, franchise_user fu where v.user_id=fu.userId and fu.franchiseId=? and is_status=? ",$_SESSION["franchiseId"],"N")->fetchAll();
   foreach($pending_video as $peVideo)
   {
?>
		<div class="col-md-3">
				<div class="panel panel-warning">
					<div class="panel-heading">
							<label> <span class="fa-video-camera fa"></span> Pending Video </label>
					</div>
					<div class="panel-body">
							<div class="text-center">
									<h1><?php echo $peVideo["pevideo"]; ?></h1>
							</div>
					</div>


				</div>
		</div>	


 <?php
   }
 ?>



<?php
   $deny_video=$con->query("select count(*) as dvideo from video v, franchise_user fu where v.user_id=fu.userId and fu.franchiseId=? and is_status=?",$_SESSION["franchiseId"],"R")->fetchAll();
   foreach($deny_video as $dtVideo)
   {
?>
		<div class="col-md-3">
				<div class="panel panel-danger">
					<div class="panel-heading">
							<label> <span class="fa-video-camera fa"></span> Rejected Video </label>
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


</div>
</div>




<div class="jumbotron">


<table class="table table-hover">
	<tr>
<th>#</th>
<th>Video ID</th>

<th>Video</th>
<th>Description</th>
<th>Views</th>
<th>Created Date </th>
<th>Status </th>
</tr>
<?php
 //define total number of results you want per page  
		$results_per_page = 10;  
		$number_of_result=0;
		//find the total number of results stored in the database  
		$query = "select count(*)as record from video v, franchise_user fu where fu.userId=v.user_id and fu.franchiseId=? and is_release=0";  
		$result = $con->query($query,$_SESSION["franchiseId"])->fetchAll();
		foreach($result as $row){
		$number_of_result = $row["record"];  
		}  
		//determine the total number of pages available  
		$number_of_page = ceil ($number_of_result / $results_per_page);  
		//determine which page number visitor is currently on  
		if (!isset ($_GET['page']) ) {  
				$page = 1;  
		} else {  
				$page = $_GET['page'];  
		}  
	
		//determine the sql LIMIT starting number for the results on the displaying page  
		$page_first_result = ($page-1) * $results_per_page;  
	
		//retrieve the selected results from database   
		$query = "SELECT * FROM video v, franchise_user fu where fu.userId=v.user_id and fu.franchiseId=? LIMIT " . $page_first_result . ',' . $results_per_page;  
		$result = $con->query($query,$_SESSION["franchiseId"])->fetchAll();  
			
		//display the retrieved result on the webpage 
$i=1;
		foreach ($result as $row) 
 {  
			//  echo $row['id'] . ' ' . $row['alphabet'] . '</br>';  
	
?>
 <tr>

<td><input type="checkbox" name="vstatus[]" value="<?php echo $row["id"]; ?>" ></td>
			<td><?php echo "VIDU".$row["id"]; ?></td>
			<td><video  style="width:120px;height:240px;" controls="controls"> <source src='<?php echo "http://viducart.wwmsc.in/api/".$row["video"]; ?>' type="video/mp4" /></video> </td>
			<td><?php echo $row["description"]; ?></td>
			<td><?php echo $row["view"] ?></td>
			<td><?php echo $row["created"] ?></td>
		   <td>
        <?php if($row["is_status"]=="Y"){ 
          echo "<span style='background:green;color:white;padding:5px;border-radius:3px;'>Publish</span>";
        }

else if($row["is_status"]=="R"){ 
          echo "<span style='background:red;color:white;padding:5px;border-radius:3px;'>Rejected</span>";
        }

         else{ echo "<span style='background:orange;color:white;padding:5px;border-radius:3px;'>Pending</span>";} ?>
      </td>

			</tr>

	<?php 
		$i++;
		}  
	
	?>

</table>
<input type="hidden" name="page" value="<?php echo $page; ?>" />

</form>
<nav aria-label="Page navigation">
	<ul class="pagination">
		<li>
			<a href="#" aria-label="Previous">
				<span aria-hidden="true">&laquo;</span>
			</a>

	<?php
		//display the link of the pages in URL  
		for($page = 1; $page<= $number_of_page; $page++) {  
				echo '<li><a href = "videos.php?page=' . $page . '">' . $page . ' </a></li>';  
		}  

	
?>  

			<a href="#" aria-label="Next">
				<span aria-hidden="true">&raquo;</span>
			</a>
		</li>
	</ul>
</nav>


	
</div>


</div>


<?php
require_once("footer.php");
?>