
<?php 
session_start();
require_once("../connection.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>VidCart Admin</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="../css/font-awesome.css" />
	<script src="../js/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
</head>
<body>
    <div class="jumbotron" style="padding-top:10px;padding-bottom:0;margin-bottom: 0;">
    		<div class="container">
    				<h3 style="font-weight:bold;">Viducart </h3>
    		</div>
    </div>
<nav class="navbar navbar-default">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li ><a href="index.php"><span class="fa fa-dashboard"></span> Dashboard <span class="sr-only">(current)</span></a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="fa fa-users"></span> Franchise <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="add-franchise.php">Add Franchise</a></li>
            <li><a href="franchise-list.php">Franchise List</a></li>
          </ul>
        </li>

          <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="fa fa-users"></span> Franchise <span class="caret"></span></a>
          <ul class="dropdown-menu">
        <li>
        <a href="videos.php"><span class="fa fa-video-camera"></span>All Videos </a>
        </li>

            <li><a href="rejected-videos.php">Rejected Video List</a></li>

            <li>
              <a href="update-video-status.php">Update video Status</a> 
            </li>

          </ul>
        </li>

      </ul>
      <form class="navbar-form navbar-left">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="fa fa-user"></span> <?php if(isset($_SESSION["adminId"])){
          			echo $_SESSION["admin_name"];
          }else{ 
		  echo "<script>window.location='../admin-login.php?error=0'</script>";
    
          	} ?> <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="profile.php">Profile </a></li>
            <li><a href="#">Change Password</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>



