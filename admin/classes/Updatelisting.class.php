<?php
class Updatelisting extends Database {
	
	private $data;
	
	public function __construct($data) {
		$this->data=$data;
	}
	
public function update() {
$id=$this->data['id'];	
$coverphoto =$this->data['coverphoto']="uploads/items/".$_FILES['coverphoto']['name'] ;
$item_name=$this->data['name'];
$item_code=$this->data['code'];
$item_price=$this->data['price'];
$item_description=$this->data['description'];
$oldimage = $this->data['oldimage'];
		
if(isset($_FILES['coverphoto']['name']) AND ($_FILES['coverphoto']['name']!="")) {
	$newimage ="uploads/items/".$_FILES['coverphoto']['name'];
	unlink($oldimage);
	move_uploaded_file($_FILES['coverphoto']['tmp_name'], $newimage);
} else {
$newimage=$oldimage;
}

	
$query = "UPDATE items SET item_image=?,item_name=?,item_code=?,item_price=?,item_description=? WHERE item_id=?";
$stmt=$this->connect()->prepare($query);
$stmt->execute([$newimage,$item_name,$item_code,$item_price,$item_description,$id]);

header('location:index.php');
		
		
	}
	
	
}
