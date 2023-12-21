<?php 

session_start();
$admin=false;
include('includes/style.php');
include('autoloader.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Admin Dashboard</title>
	<!--Import Google Icon Font-->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<!--Import materialize.css-->
	<link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
	<link type="text/css" rel="stylesheet" href="css/main.css" media="screen,projection" />
	<!--Let browser know website is optimized for mobile-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript">

	</script>

</head>

<body>

	<div class="navbar-fixed">
		<nav class="blue-grey darken-4">
			<div class="container">
				<div class="nav-wrapper">
					<a href="index.php" class="brand-logo">Dashboard</a>
					<a href="#" class="sidenav-trigger" data-target="sidenav">
						<i class="material-icons">menu</i>
					</a>
					<ul class="right hide-on-med-and-down">

						<li><a href="admins.php">Admin</a></li>
						<li><a href="bookings.php">Products</a></li>
						<li><a href="members.php">Site Users</a></li>
						<?php if(!isset($_SESSION['email'])) { ?>

						<?php } else { ?>
						<li class="amber-text">hi, <?=$_SESSION['email'];?></li>
						<li><a href="logout.php" class="btn btn-small pink">Logout</a></li>
						<?php } ; ?>
					</ul>

				</div>
			</div>
		</nav>
	</div>
	<!--
  <div class="navbar-fixed">
   <nav class="grey lighten-2">
      <div class="container">
     <div class="row">
         
     </div>
      </div>
      
   </nav>
   
    
</div>
-->

	<ul class="sidenav" id="sidenav">

		<li><a href="admins.php">Admins</a></li>
		<li><a href="bookings.php">Bookings</a></li>
		<li><a href="members.php">Members</a></li>
		<li><a href="logout.php">Logout</a></li>

	</ul>
