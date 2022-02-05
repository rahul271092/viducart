<?php
require_once("header.php");

if(isset($_POST["franchise_username"]) && isset($_POST["franchise_password"]))
{
			$fUsername=htmlspecialchars($_POST["franchise_username"],ENT_QUOTES);
			$fPassword=htmlspecialchars($_POST["franchise_password"],ENT_QUOTES);

		$user=	$con->query('select * from dx_franchise where email=? and password= password(?)', array($fUsername,$fPassword))->fetchArray();
		if(!empty($user['email']) && !empty($user['password']))
		{
			     session_start();
			     $_SESSION["franchiseId"]=$user["franchiseId"];
			     $_SESSION["email"]=$user["email"];
			     echo "<script>window.location='Admin/index.php'</script>";
      
		}
		else{
			  echo "<script>window.location='index.php?error=0'</script>";
      
		}

}

?>

<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" >
<div class="container">
<div class="row">
		<div class="col-md-offset-4 col-md-4 col-md-offset-4">
		<div class="panel panel-default">
				<div class="panel-body">

					  <h3><span class="fa fa-user"></span> Sign In </h3>
				 <hr/>

			
    <?php
    			if(isset($_GET["error"]) && $_GET["error"]==0)
    			{
    				?>
    					<div class="alert alert-danger">
    					    					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button>

    							<label>
    							    Invalid Username and Password Try Again !!
    							</label>
    					</div>

    				<?php
    			}
    ?>


				 <div class="form-group">
				 		<div class="row">
				 		<div class="col-md-12">
				 		<label>Username or Email Address </label>
				 		</div>
				 		<div class="col-md-12">
				 		<input type="text" name="franchise_username" class="form-control" autocomplete="false" placeholder="Enter Username /Email Id" required />
				 		</div>
				 		</div>
				 </div>


<div class="form-group">
				 		<div class="row">
				 		<div class="col-md-12">
				 		<label>Password </label>
				 		</div>
				 		<div class="col-md-12">
				 		<input type="password" name="franchise_password" class="form-control" autocomplete="false" placeholder="Enter Password" required />
				 		</div>
				 		</div>
				 </div>


				 		<div class="form-group">
				 				<div class="row">
				 						<div class="col-md-12">
				 						<a href="#">Forgot Password ? </a>
				 						</div>
				 				</div>
				 		</div>


				 		<div class="form-group">
				 			 <div class="row">
				 			 		<div class="col-md-12">
				 			 		<input type="submit" name="action" value="Sign In" class="btn btn-primary form-control" />
				 			 		</div>
				 			 </div>
				 		</div>





				</div>
		</div>
		</div>
</div>
</div>
</form>
<?php
require_once("footer.php");
?>