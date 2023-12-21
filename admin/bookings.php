<?php 
include('header.php'); 

if(!isset($_SESSION['role']) ) {
	header('location:login.php');
}

if(isset($_GET['delete_booking'])) {
	
	$booking_id = $_GET['delete_booking'];
	
	$delete_booking=new Deletebooking($booking_id);
	$delete_booking->deleteBooking();
	
}

?>

<?php 
$bookings=new Getbookings();
?>
<section class="section center  amber-text">
	<p class="flow-text">Current Items</p>
</section>
<section class="container center">
	<table class="highlight stripped centered responsive-table">

		<thead class="blue-grey-text text-lighten-2">
			<tr>
				<th>S.No</th>
				<th>Name</th>
				<th>Description</th>
				<th>Price</th>
				<th>Code</th>
				<th>Image</th>
				<th>Action</th>
			</tr>
		</thead>

<?php
$bookings->selectBookings();

?>
</section>
