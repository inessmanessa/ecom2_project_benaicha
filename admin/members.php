<?php 
include('header.php');

if(!isset($_SESSION['role']) ) {
	header('location:login.php');
}

if(isset($_GET['delete_user'])) {
	
	$user_id = $_GET['delete_user'];
	
	$delete_user=new Deleteuser($user_id);
	$delete_user->deleteUser();
	
}
?>

<?php

$users=new Getusers();
?>
<div class="section amber-text center">
	<p class="flow-text">Site Users</p>
</div>

<div class="container">

	<table>
		<thead class="blue-grey-text text-lighten-2">
			<tr>
				<th>#</th>
				<th>Email</th>
				<th>Action</th>

			</tr>
		</thead>

<?php
$users->selectUsers();
?>
</div>




<?php 
include('includes/footer.php');

?>
