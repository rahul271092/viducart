<?php
require_once("header.php");
$franchise=$con->query("select * from dx_franchise f , franchiseType  ft where f.franchiseTypeId=ft.franchiseTypeId and f.franchiseId=?",$_SESSION["franchiseId"])->fetchArray();
?>

<div class="container">

<div class="page-header">
<h3><span class="fa fa-user"></span>  Profile </h3>
</div>

<div class="form-group">
<div class="row">
		<div class="col-md-2">
				<label>Franchise Name </label>
		</div>
		<div class="col-md-4">
		<strong>
		<?php  echo $franchise["name"]; ?>
		</strong>
		</div>
</div>
</div>

<hr/>


<div class="form-group">
<div class="row">
		<div class="col-md-2">
				<label>Franchise Type </label>
		</div>
		<div class="col-md-4">
		<strong>
		<?php  echo $franchise["franchiseType"]; ?>
		</strong>
		</div>

		<div class="col-md-2">
		<label>User Account Limit </label>
		</div>

		<div class="col-md-4">
		<strong><?php echo $franchise["user_limit"] ?></strong>
		</div>
</div>
</div>

<hr/>
<div class="form-group">
<div class="row">
		<div class="col-md-2">
				<label>Email </label>
		</div>
		<div class="col-md-4">
		<strong>
		<?php  echo $franchise["email"]; ?>
		</strong>
		</div>
</div>
</div>

<hr/>


<div class="form-group">
<div class="row">
		<div class="col-md-2">
				<label>Mobile No. </label>
		</div>
		<div class="col-md-4">
		<strong>
		<?php  echo $franchise["mobile"]; ?>
		</strong>
		</div>
</div>
</div>


</div>



<?php
require_once("footer.php");
?>