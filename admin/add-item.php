<?php 
include("header.php");

if(isset($_POST['add_item'])) {
	
	//instantiate class
	$validation=new setListings($_POST);
	//retrieve errors from the validation method which returns errors array
	$errors=$validation->validateForm();
	//if there are no errors, insert data into database
	$validation->insertData();
	
}

?>


<div class="container bg-dark ">
	<div class="section">
		<p class="flow-text amber-text center">Add Item</p>
	</div>


	<!-- BEGIN ADD New Item FORM -->

	<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" id="add_listing-form" enctype="multipart/form-data">
		<input type="hidden" name="id" value="">
		<div class="row">
			<div class="col s12 m4">
				<div class="input-field">
					<input type="hidden" name="oldimage" value="" id="oldimage">
					<p class="white-text">Upload Cap Image</p>
					<input type="file" name="coverphoto" id="coverphoto" value="<?=$_POST['coverphoto'] ?? '' ?>">

					<p class="red-text"><?php echo $errors['coverphotoerror'] ?? '' ?></p>

				</div>
			</div>
			<div class="col s12 m4">
				<div class="input-field">
					<input type="text" name="name" id="name" value="<?=$_POST['name'] ?? '' ?>">
					<label for="make">Item Name</label>
					<p class="red-text"><?php echo $errors['nameerror'] ?? '' ?></p>
				</div>

			</div>
			<div class="col s12 m4">
				<div class="input-field">
					<input type="text" name="code" id="code" value="<?=$_POST['code'] ?? '' ?>">
					<label for="make">Item Code</label>
					<p class="red-text"><?php echo $errors['codeerror'] ?? '' ?></p>
				</div>

			</div>
			<div class="col s12 m4">
				<div class="input-field">
					<input type="number" name="price" id="price" value="<?=$_POST['price'] ?? '' ?>">
					<label for="price">Price</label>
					<p class="red-text"><?php echo $errors['priceerror'] ?? '' ?></p>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col s12 m12">
				<div class="input-field">
					<textarea name="description" id="description" class="materialize-textarea" value="<?=$_POST['description'] ?? '' ?>"></textarea>
					<label for="description">Enter Item Description</label>
					<p class="red-text"><?php echo $errors['descriptionerror'] ?? '' ?></p>
				</div>
			</div>

		</div>


		<div class="center">
			<!-- DETERMINE WHICH BUTTON TO DISPLAY (ADD OR UPDATE BUTTON) BASED ON WHETHER EDIT BUTTON HAS BEEN PRESSED -->


			<input type="submit" value="ADD New Item" class="btn btn-large orange white-text" name="add_item">

		</div>


	</form>



</div>


<?php include('includes/footer.php'); ?>
