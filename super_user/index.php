
<?php 
require_once("header.php");
?>
<div class="container">
			<div class="page-header" >
					<h3><span class="fa fa-dashboard"></span>
					Dashboard </h3>
			</div>


			<div class="form-group">
					<div class="row">
							<div class="col-md-4">
									<div class="panel panel-primary">
										   <div class="panel-heading">
										   		<label>Franchise  </label>
										   </div>
										   <div class="panel-body">
										   <div class="text-center">

										   			<?php
										   			  $sql="select count(*) as record from dx_franchise ";
										   			  $result=$con->query($sql)->fetchAll();
										   			   foreach($result as $row){

										   			   	echo "<h3>".$row["record"]."</h3>";
										   			   }
										   
										   			 ?>
										   	    </div>
										   </div>
									</div>
							</div>
						<div class="col-md-4">
									<div class="panel panel-primary">
										   <div class="panel-heading">
										   		<label>Total Video  </label>
										   </div>
										   <div class="panel-body">
										   <div class="text-center">

										   			<?php
										   			  $sql="select count(*) as record from video ";
										   			  $result=$con->query($sql)->fetchAll();
										   			   foreach($result as $row){

										   			   	echo "<h3>".$row["record"]."</h3>";
										   			   }
										   
										   			 ?>
										   	    </div>
										   </div>
									</div>
							</div>

						<div class="col-md-4">
									<div class="panel panel-primary">
										   <div class="panel-heading">
										   		<label>Block Video  </label>
										   </div>
										   <div class="panel-body">
										   <div class="text-center">

										   			<?php
										   			  $sql="select count(*) as record from video where block=1 ";
										   			  $result=$con->query($sql)->fetchAll();
										   			   foreach($result as $row){

										   			   	echo "<h3>".$row["record"]."</h3>";
										   			   }
										   
										   			 ?>
										   	    </div>
										   </div>
									</div>
							</div>
					</div>
			</div>



</div>