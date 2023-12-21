<?php 
include('header.php');


if($_SESSION['role'] !='admin' ) {

header("location:login.php");


}else {
	$admin=true;
}

$reg_error="";

if(isset($_POST['add_users'])){
$user=new Setadmin($_POST);
$errors=$user->validate();
$user->insertUser();
	
}

if(isset($_GET['delete_user'])) {
	$user_id=$_GET['delete_user'];
	$delete=new Deleteuser($user_id);
	$delete->deleteUser();
}


?>
<div class="container">
	<div class="row">
		<div class="col sm12 m8">
			<h4 class="amber-text">Current Admins / Editors</h4>
			<table>
				<thead class="blue-grey-text text-lighten-2 center">
					<tr>
						<th>#</th>
						<th>Email</th>
						<th>User Type</th>
						<th>Action</th>

					</tr>

					<?php 
		$result=new Getadmin(); //instantiate the Get Listings Class
		$admins=$result->selectAdmins(); // Call the select listings method inside the get listings class that returns data
		foreach($admins as $admin) {
	?>
				</thead>

				<tbody class="white-text">

					<tr>
						<td><?=$admin['user_id']?></td>
						<td><?=$admin['email']?></td>
						<td><?=$admin['user_type']?></td>
						<td>
							<a href="edit_user.php?edit_user=<?=$admin['user_id']; ?>" class="btn btn-small green">Edit</a>
							<a href="admins.php?delete_user=<?=$admin['user_id'];?>" class="btn btn-small red" onclick="return confirm('Do you want to delete this record?')" ;>Delete</a>
						</td>
					</tr>

					<?php } ?>
				</tbody>
			</table>



		</div>
		<div class="col s12 m4">



			<h4 class="amber-text">Add User</h4>


			<div class="flow-text red-text"><?=$errors['register'] ?? '' ?></div>

			<form action="" method="POST" id="admin-registration-form">

<!-- 
				<div class="input-field">
					<input type="text" name="user_name" id="user_name" value="<?=$_POST['user_name'] ?? '' ?> ">
					<label for="name">Username</label>
					<p class="red-text"><?=$errors['user_name'] ?? '' ?></p>
				</div> -->


				<div class="input-field">
					<input type="email" name="email" id="email" value="<?=$_POST['email'] ?? '' ?>">
					<label for="email">Email</label>
					<p class="red-text"><?=$errors['email'] ?? '' ?></p>
				</div>

				<div class="input-field">
					<input type="password" name="password" id="password" value="<?=$_POST['password'] ?? '' ?>">
					<label for="password">Password</label>
					<p class="red-text"><?=$errors['password'] ?? '' ?></p>
				</div>

				<div class="input-field">
					<select class="" name="role">
						<option value="" disabled selected>Select Role</option>
						<option value="admin">Admin</option>
						<option value="user">User</option>

					</select>
					<p class="red-text"><?=$errors['role'] ?? '' ?></p>
				</div>


				<input type="submit" value="ADD USER" class="btn btn-large pink white-text" name="add_users">


			</form>
		</div>
	</div>
</div>




<?php include('includes/footer.php');
