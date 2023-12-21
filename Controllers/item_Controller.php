<?php 
//Ce code est une action qui se déclenche lorsqu'un formulaire est soumis via la méthode POST. Elle récupère les informations envoyées depuis le formulaire pour ajouter un produit à la base de données.
require_once('../models/Item.php');
require_once('../models/Auth.php');
if (isset($_POST['submit'])) 
{
	$conn = DB::getConnection();
	$item_name = mysqli_real_escape_string($conn,$_POST['name']) ;
	$item_price = mysqli_real_escape_string($conn,$_POST['price']) ;
	$item_description = mysqli_real_escape_string($conn,$_POST['description']) ;
	// $product_quantity = mysqli_real_escape_string($conn,$_POST['quantity']) ;
	$item_code = mysqli_real_escape_string($conn,$_POST['code']) ;

	if (count($_FILES)>0)
	{
	    $filename = $_FILES['file']['name'];
	    $filetmpname = $_FILES['file']['tmp_name'];       
	    $extension_image = pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);
	    $filename = 'product_'. rand(1,99). time(). '.' . $extension_image;
	    $folder = 'public/images/items/';
	    $move = '../'.$folder.$filename;
	    $new_file = $folder.$filename;
	    if($extension_image=='jpg' || $extension_image=='jpeg' || $extension_image=='png' || $extension_image=='gif' || $extension_image=='PNG' || $extension_image=='webp')
	    {
	    	$result = Item::addProduct($item_name, $item_price, $item_description, $new_file, $item_code);
	    	if($result)
	    	{
	    	    move_uploaded_file($_FILES['file']['tmp_name'], $move.$filename);
	    	    echo '<script>alert("Item Details Added Successfully")</script>'; 
	    	    echo("<script>window.location = '../index.php';</script>");

	    	}
	    }
	    else
	    {
	    	echo "wrong extension_image";
	    }
	}
	else
	{
		echo "File not uploaded";
	}
	
	

} 