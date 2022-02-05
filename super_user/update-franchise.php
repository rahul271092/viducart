<?php 
require_once("header.php");
$message=0;

$id=$_GET["franchise"];
$sql="select * from dx_franchise where franchiseId=? ";
$result=$con->query($sql,$id)->fetchAll();
foreach ($result as $row)
{
?>
<div class="container">

<form action="update-franchise-process.php" method="post" >


<div class="page-header">
<h2>Update Franchise </h2>
</div>




		<div class="form-group">
				<div class="row">
				<div class="col-md-2">
					<label>Franchise Name </label>
				</div>
				<div class="col-md-4">
                      <input type="hidden" name="franchiseId" value='<?php echo $row["franchiseId"]; ?>' />

						<input type="text" class="form-control" name="franchise_name" required="required" value='<?php echo $row["name"]; ?>' />
				</div>
				</div>
		</div>



		<div class="form-group">
				<div class="row">
				<div class="col-md-2">
					<label>Franchise Type </label>
				</div>
				<div class="col-md-4">
				     <select name="franchiseType" class="form-control"  ?>'>

				     	<option >Select Franchise </option>

				     	<option value="1" <?php if($row["franchiseTypeId"]=="1") echo "selected"; ?> >5 Lakh Franchise </option>
				     	<option value="4"  <?php if($row["franchiseTypeId"]=="4") echo "selected"; ?>>2.5 Lakh Franchise </option>
				     	<option value="5" <?php if($row["franchsieTypeId"]=="5") echo "selected"; ?>>TCC </option>
				     </select>
				</div>
				</div>
		</div>


		<div class="form-group">
				<div class="row">
						<div class="col-md-2">
								<label>Email Id </label>
						</div>
						<div class="col-md-4">
							<input type="email" name="franchise_email" maxlength="90" class="form-control" value='<?php echo $row["email"]; ?>' />
						</div>
				</div>
		</div>



		<div class="form-group">
				<div class="row">
						<div class="col-md-2">
						<label>Mobile No. </label>
						</div>
						<div class="col-md-4">
						<input type="text" name="mobile" value='<?php echo $row["mobile"]; ?>'  class="form-control" maxlength="10" />
						</div>
				</div>
		</div>

		<div class="form-group">
				<div class="row">
						<div class="col-md-12">
								<input type="submit" class="btn btn-warning" name="action" value="Update" />
						</div>
				</div>
		</div>


  </form>

</div>

<?php }?>
</body>
</html>


