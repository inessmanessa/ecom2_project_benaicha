<?php 
include('header.php');

$login_error="";
if(isset($_POST['login'])){
	
		//instantiate class
	$validation=new Login($_POST);
	//retrieve errors from the validation method which returns errors array
	$errors=$validation->validate();
	//if there are no errors, proceed to login user
	$validation->loginUser();

}

?>

<div class="section center">
	<h4 class="amber-text">Login</h4>
</div>
<div class="section">

	<div class="form-wrapper hoverable">
		<p class="flow-text red-text center"><?php echo $errors['login'] ?? '' ?></p>
		<form action="" method="POST" id="login-form">

			<div class="input-field">
				<input type="text" name="user_name" id="name" value="<?php echo $_POST['user_name'] ?? '' ?>">
				<label for="name">Username or Email</label>
				<p class="red-text"><?=$errors['user_name'] ?? ''?></p>
			</div>
			<div class="input-field">
				<input type="password" name="password" id="password">
				<label for="password">Password</label>
				<p class="red-text"><?=$errors['password']?? '' ?></p>
			</div>


			<input type="submit" value="login" class="btn btn-large pink white-text" name="login">


		</form>
	</div>

</div>



<?php include("includes/footer.php") ; ?>
