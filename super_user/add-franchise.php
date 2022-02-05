<?php
require_once("header.php");
$message=0;
if(isset($_POST["action"]))
{
	$sql="insert into dx_franchise(name,email,password,mobile,franchiseTypeId)values(?,?,password(?),?,?);";
	$name=$_POST["franchise_name"];
	$email=$_POST["franchise_email"];
	$mobile=$_POST["franchise_mobile"];
	$franchiseType =$_POST["franchiseType"];
	$password=$_POST["franchise_password"];
	$result=$con->query($sql,$name,$email,$password,$mobile,$franchiseType);
	$message=1;
}


?>

<div class="container">

<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" >


<div class="page-header">
<h2>Add Franchise </h2>
</div>

    <?php
    		if($message==1)
    		{
    			?>
    				<div class="alert alert-success">
    				
    						<label>
    						 Franchise Added Successfully !!
    						</label>
    				</div>
    			<?php
    		}
    ?>



		<div class="form-group">
				<div class="row">
				<div class="col-md-2">
					<label>Franchise Name </label>
				</div>
				<div class="col-md-4">
						<input type="text" class="form-control" name="franchise_name" required="required" />
				</div>
				</div>
		</div>



		<div class="form-group">
				<div class="row">
				<div class="col-md-2">
					<label>Franchise Type </label>
				</div>
				<div class="col-md-4">
				     <select name="franchiseType" class="form-control">

				     	<option >Select Franchise </option>

				     	<option value="1">5 Lakh Franchise </option>
				     	<option value="4">2.5 Lakh Franchise </option>
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
							<input type="email" name="franchise_email" maxlength="90" class="form-control" />
						</div>
				</div>
		</div>


<div class="form-group">
		<div class="row">
					<div class="col-md-2">
							<label>Password </label>
					</div>				
					<div class="col-md-4">
							<input type="password" name="franchise_password" maxlength="50" class="form-control" />
					</div>
		</div>
</div>

		<div class="form-group">
				<div class="row">
						<div class="col-md-2">
						<label>Mobile No. </label>
						</div>
						<div class="col-md-4">
						<input type="text" name="franchise_mobile"  class="form-control" maxlength="10" />
						</div>
				</div>
		</div>

		<div class="form-group">
				<div class="row">
						<div class="col-md-12">
								<input type="submit" name="action" value="Submit" />
						</div>
				</div>
		</div>


  </form>

</div>
</body>
</html>


