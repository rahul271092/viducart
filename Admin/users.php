<?php
require_once("header.php");
?>
<div class="container">



<?php 

if(isset($_GET["msg"]) && $_GET["msg"]=="3")
{
	?>
<div class="alert alert-warning">
    					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button>
    							<label>
    							  <span class="fa-user fa"></span>  User has been Released from your Account !!
    							</label>
    					</div>


<?php
}
?>



<?php

 			if(isset($_GET["user"]) && $_GET["user"]=="success")
    			{
    				?>
    					<div class="alert alert-success">
    					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button>
    							<label>
    							  <span class="fa-thumbs-up fa"></span>  User has been Synced Successfully for the Viducart App !!
    							</label>
    					</div>

    				<?php
    			}


    ?>




 <?php
    			if(isset($_GET["user"]) && $_GET["user"]=="error2")
    			{
    				?>
    					<div class="alert alert-warning">
    					    					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button>

    							<label>
    							  <span class="fa-warning fa"></span>    All Users are Registered Already !!
    							</label>
    					</div>
<?php

    					}
?>









 <?php
    			if(isset($_GET["user"]) && $_GET["user"]=="error5")
    			{
    				?>
    					<div class="alert alert-danger">
    					    					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button>

    							<label>
    							  <span class="fa-warning fa"></span>  Users not Registered on Viducart App !1
    							</label>
    					</div>
<?php

    					}
?>








 <?php
    			if(isset($_GET["user"]) && $_GET["user"]=="error")
    			{
    				?>
    					<div class="alert alert-warning">
    					    					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button>

    							<label>
    							  <span class="fa-warning fa"></span> Something Went Wrong Please try again Later !!
    							</label>
    					</div>
<?php

    					}
?>




<div class="page-header">
<h3>Sync User </h3>
</div>
<p>
Enter your User Email Address to sync the data of users in the portal and add into our account .
</p>
<br/>
<form action="user_sync.php" method="post">
<div class="form-group">
		<div class="row">
				<div class="col-md-2">
				<label>Enter Email Address</label>
				</div>
				<div class="col-md-4">
					<input type="email" name="user_email" class="form-control" placeholder="Enter Email Address" maxlength="90" />
				</div>
				<div class="col-md-2">
						<input type="submit" name="action" value="Sync" class="btn btn-primary" />
				</div>
		</div>
</div>
</form>

<hr/>


<div class="page-header">
  <h3><span class="fa fa-users"></span> Users </h3>
</div>

			<table class="table table-hover">
			<tr>
				<th>#</th>
				<th>First Name </th>
				<th>Last Name </th>
				<th>Email </th>
				<th>Role </th>
				<th>Action </th>
			</tr>

			<tr>
			<?php
			$accounts=	$con->query('select * from user u, franchise_user  fu where u.id=fu.userId and fu.is_release=0  and fu.franchiseId=?;',$_SESSION["franchiseId"])->fetchAll();
				$i=1;
				foreach($accounts as $account)
				{
					echo "<tr>";
					echo "";
					
					echo "<td>".$i."</td>";
					echo "<td><a href='user-detail.php?user=".$account["id"]."'>".$account["first_name"]."</a></td>";
					echo "<td>".$account["last_name"]."</td>";
					echo "<td>".$account["email"]."</td>";
					echo "<td>".$account["role"]."</td>";
					echo "<td><a style='color:black;' class='btn btn-primary' href='user-detail.php?user=".$account["id"]."'><span class='fa fa-eye'></span> View</a>&nbsp;";
					echo "<a class='btn btn-danger' href='release-user.php?user=".$account["id"]."'>Release</a>";
					echo "</td>";
					echo "</tr>";
					$i++;
				}
			?>
			</tr>
			</table>
</div>
<?php
require_once("footer.php");
?>
