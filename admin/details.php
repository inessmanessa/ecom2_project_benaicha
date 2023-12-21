<?php 
include('header.php');

if(isset($_GET['details'])) {
	
$details_id=$_GET['details'];
	
	$edit=new Editlisting();
	$records=$edit->getSingleRecord($details_id);
	
	
}

?>
<div class="container center">
		<h4 class="amber-text"><?=$records['item_name']?> <?=$records['item_code']?></h4>
</div>
<div class="section">
	<div class="row container">
		<div class="col s12 m6">

			<img src="<?=$records['item_image']?>" class="materialboxed responsive-img">
		
		</div>
		<div class="col s12 m6">
						
		<!-- 	<button data-target="gallery-images" class="btn modal-trigger pink white-text">Add More Images</button> -->

			<p class="flow-text blue-grey-text text-lighten-3">Details</p>
			<table class="highlight stripped centered responsive-table">
				<thead class="amber-text">
					<tr>

						<td>ID:</td>
						<td>IMAGE:</td>
						<td>ITEM NAME:</td>
						<td>ITEM CODE:</td>
						<td>ITEM PRICE:</td>
						<td>ITEM DESCRIPTION:</td>

					</tr>
				</thead>

				<tbody class="white-text">
					<tr>

						<td><?=$records['item_id']?></td>
						<td><?=$records['item_image']?></td>
						<td><?=$records['item_name']?></td>
						<td><?=$records['item_code']?></td>
						<td><?=number_format($records['item_price'])?></td>
						<td><?=$records['item_description'];?></td>
					</tr>
				</tbody>

			</table>
		</div>

		</div>
	<div class="row container">
		<div class="col s12 m12">
				<p class=" flow-text blue-grey-text text-lighten-3">Features</p>
			<ul class="collection">
				<ul>
					<?php foreach(explode(',', $records['item_description']) as $description) { ?>
					<li class="collection-item"><?php echo $description; ?></li>
					<?php } ?>

				</ul>

			</ul>
		</div>
	</div>

	
		
	

	<div class="row">
		<div class="col s12 m12">

		</div>
	</div>



</div>


<div id="gallery-images" class="modal">
	<div class="modal-content">
		<div class="container">
			<h4 class="blue-grey-text">Gallery Images</h4>
			<p>Add more Images Of The Vehicle</p>

			<form action="" method="POST" enctype="multipart/form-data">
				<input type="file" name="gallery-images[]" multiple>
				<br>
				<br>
				<input type="submit" name="add_gallery_images" value="ADD IMAGES" class="btn pink white-text">

			</form>

		</div>

	</div>

	<div class="modal-footer">
		<a href="#!" class="modal-close waves-effect">Close</a>
	</div>

</div>




<?php
include('includes/footer.php');
?>
