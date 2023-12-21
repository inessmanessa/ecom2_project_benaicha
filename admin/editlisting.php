<?php 
include("header.php");

if(isset($_GET['edit_listing'])) {
	
$edit_id=$_GET['edit_listing'];
	
	$edit=new Editlisting();
	$records=$edit->getSingleRecord($edit_id);
	
	
}

if(isset($_POST['update'])) {
	
$update=new Updatelisting($_POST);
$update->update();
}

?>
<div class="container">

	<p class="flow-text amber-text center section">Edit Item</p>

	<!-- BEGIN ADD New Item FORM -->

	<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" id="add_listing-form" enctype="multipart/form-data" class="white-text">
		<input type="hidden" name="id" value="<?=$records['item_id']; ?>">
		<div class="row">
			<div class="col s12 m4">
				<div class="input-field">
					<input type="hidden" name="oldimage" value="<?=$records['item_image']?>" id="oldimage">
					<p class="teal-text">Upload a cover photo</p>
					<input type="file" name="coverphoto" id="coverphoto">
					<img src="<?=$records['item_image']?>" width="170" name>

				</div>
			</div>
			<div class="col s12 m4">
				<div class="input-field">
					<input type="text" name="name" id="name" value="<?=$records['item_name']; ?>">
					<label for="make">Item Name</label>

				</div>

			</div>
			<div class="col s12 m4">
				<div class="input-field">
					<input type="text" name="code" id="code" value="<?=$records['item_code']; ?>">
					<label for="model">Item Code</label>

				</div>
			</div>
			<div class="col s12 m4">
				<div class="input-field">
					<input type="number" name="price" id="price" value="<?=$records['item_price']; ?>">
					<label for="price">Price</label>

				</div>
			</div>

		</div>


		<div class="row">
			<div class="col s12 m12">
				<div class="input-field">
					<textarea name="description" id="description" class="materialize-textarea" value="<?=$records['item_description']; ?>"></textarea>
					<label for="description">Enter Item Description</label>

				</div>
			</div>

		</div>


		<div class="center">
			<!-- DETERMINE WHICH BUTTON TO DISPLAY (ADD OR UPDATE BUTTON) BASED ON WHETHER EDIT BUTTON HAS BEEN PRESSED -->

			<input type="submit" name="update" value="Update Item" class="btn green white-text">


		</div>


	</form>



</div>


<?php include('includes/footer.php'); ?>
