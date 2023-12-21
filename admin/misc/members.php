<?php 
include('header.php');

if(!isset($_SESSION['role']) || !isset($_SESSION['user_name'])) {
	header('location:login.php');
}

if(isset($_GET['delete_user'])) {
	
	$user_id = $_GET['delete_user'];
	
	$delete_user=new Deleteuser($user_id);
	$delete_user->deleteUser();
	
}
?>

<div class="section amber-text center">
	<p class="flow-text">Site Users</p>
</div>

<div class="container">

	<table>
		<thead class="blue-grey-text text-lighten-2">
			<tr>
				<th>#</th>
				<th>Name</th>
				<th>Email</th>
				<th>Action</th>

			</tr>
		</thead>

		<tbody class="white-text">
			<?php
			$result=new getUsers();
			$users= $result->selectUsers();
			foreach($users as $user) {
			?>
			<tr>
				<td><?=$user['user_id'] ?></td>
				<td><?=$user['user_name'] ?></td>
				<td><?=$user['email'] ?></td>
				<td>


					<a href="members.php?delete_user=<?=$user['user_id'];?>" class="btn btn-small red" onclick="return confirm('Do you want to delete this record?')" ;>Delete</a>

				</td>
			</tr>
			<?php } ?>
		</tbody>


	</table>


</div>




<?php 
include('includes/footer.php');

?>
