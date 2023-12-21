<?php

class Deletelisting extends Database {
	

	
	public function deleteListing() {
		
	if(isset($_GET['delete_listing'])) {
	$id = $_GET['delete_listing'];
	$query = "DELETE FROM car_listings WHERE id=?";
		$stmt=$this->connect()->prepare($query);
		$stmt->execute([$id]);
}
		
		
		
	
		
	}
	
	
	
	
}
