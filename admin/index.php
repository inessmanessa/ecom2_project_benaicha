<?php 
include('header.php');
if(!isset($_SESSION['role'])) {
	header('location:login.php');
}

	$delete=new Deletelisting();
	$delete->deleteListing();
?>

<div class="row section center">
	<div class="col s12 m3">
		<div class="card z-depth-5 purple darken-1">
			<div class="card-content white-text">
				<span class="card-title">
					<h5>Admins</h5>
					<?php $count=new Getadmin(); ?>
					<h5 class="flow-text"><?=$count->count();?><h5>
				</span>
				<p class="flow-text white-text"></p>
			</div>
			<div class="card-action">
				<a href="admins.php" class="white-text">ADD ADMIN</a>

			</div>
		</div>
	</div>
	<div class="col s12 m3">

		<div class="card z-depth-5 indigo darken-1">
			<div class="card-content white-text">
				<span class="card-title">
					<h5>Total Items</h5>
				</span>
					<?php $count=new Getlistings(); ?>
					<h5 class="flow-text"><?=$count->count();?><h5>
			</div>
			<div class="card-action">

				<a href="add-item.php" class="white-text">ADD New Item</a>

			</div>
		</div>
	</div>
	<div class="col s12 m3">
		<div class="card z-depth-5 amber darken-4">
			<div class="card-content white-text">
				<span class="card-title">
					<h5>Total Site Members</h5>
				</span>
					<?php $count=new Getusers(); ?>
					<h5 class="flow-text"><?=$count->count();?><h5>
			</div>
			<div class="card-action">

				<a href="members.php" class="white-text">VIEW USERS</a>

			</div>
		</div>
	</div>
	<div class="col s12 m3">
		<div class="card z-depth-5 red darken-3">
			<div class="card-content white-text">
				<span class="card-title">
					<h5>Bookings</h5>
				</span>
					<?php $count=new Getbookings(); ?>
					<h5 class="flow-text"><?=$count->count();?><h5>
			</div>
			<div class="card-action">

				<a href="bookings.php" class=" white-text">VIEW BOOKINGS</a>

			</div>
		</div>
	</div>

</div>



<?php
	$table=new Getlistings();
?>
<div class="container">
	<p class="amber-text center flow-text">Current Items</p>

		<table class="highlight stripped centered responsive-table">
				<thead class="blue-grey-text text-lighten-2">
			<tr>
				<th>S.No</th>
				<th>Image</th>
				<th>Item Name</th>
				<th>Item Code</th>
				<th>Item Price</th>
				<th>Action</th>


			</tr>
		</thead>

		
<?php

	$table->selectListings();
?>



<?php

	
		?>

</div>

<?php include('includes/footer.php'); ?>
