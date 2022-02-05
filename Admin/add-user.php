<?php
require_once("header.php");
/*$url='https://vidcart.wwmsc.in/api/Admin/showVideoDetail';

$crl = curl_init();
curl_setopt($crl, CURLOPT_URL, $url);
curl_setopt($crl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($crl, CURLOPT_SSL_VERIFYPEER, FALSE); 
$json = curl_exec($crl);
curl_close($crl);
echo $json;

*/

?>


<div class="container">

<div class="page-header">
  <h3><span class="fa-plus-circle fa"></span> Add User Account </h3>
</div>

    <?php
    			if(isset($_GET["user"]) && $_GET["user"]=="error")
    			{
    				?>
    					<div class="alert alert-danger">
    					    					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button>

    							<label>
    							  <span class="fa-thumbs-down fa"></span>    Something Went Wrong Please Try Again !!
    							</label>
    					</div>

    				<?php
    			}


    			if(isset($_GET["user"]) && $_GET["user"]=="success")
    			{
    				?>
    					<div class="alert alert-success">
    					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button>
    							<label>
    							  <span class="fa-thumbs-up fa"></span>  User has been Registered Successfully on the Viducart App !!
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
    			if(isset($_GET["user"]) && $_GET["user"]=="error3")
    			{
    				?>
    					<div class="alert alert-warning">
    					    					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button>

    							<label>
    							  <span class="fa-warning fa"></span>  $_GET["msg"];
    							</label>
    					</div>
<?php

    					}
?>


<form action="process.php" method="post" >


<div class="form-group">
<div class="row">
<div class="col-md-2">
		<label>First Name </label>
</div>
<div class="col-md-4">
		<input type="text" name="first_name"  placeholder="First Name" class="form-control"  maxlength="40" required />
</div>
</div>
</div>

<div class="form-group">
		<div class="row">
		     <div class="col-md-2">
		     		<label>Last Name </label>
		     </div>
		     <div class="col-md-4">
		     		<input type="text" placeholder="Last Name"  name="last_name" class="form-control" maxlength="40" required />
		     </div>
		</div>
</div>



<div class="form-group">
	<div class="row">
			<div class="col-md-2">
			<label>Username </label>
			</div>
			<div class="col-md-4">
			<input type="text" name="username" class="form-control" required  placeholder="Enter Username" maxlength="60" required />
			</div>
	</div>	
</div>

<div class="form-group">
	<div class="row">
			<div class="col-md-2">
			<label>Email </label>
			</div>
			<div class="col-md-4">
			<input type="email" required name="email" class="form-control"  placeholder="Enter Email" maxlength="60" />
			</div>
	</div>	
</div>


<div class="form-group">
	<div class="row">
			<div class="col-md-2">
			<label>Password </label>
			</div>
			<div class="col-md-4">
			<input type="password" name="password" required class="form-control"  placeholder="Enter Password" maxlength="60" />
			</div>
	</div>	
</div>


<div class="form-group">
		<div class="row">
				<div class="col-md-12">
				<input type="submit" name="action" value="Save User" class="btn btn-primary" />
				</div>
		</div>
</div>


</form>

</div>



<?php
require_once("footer.php");
?>
