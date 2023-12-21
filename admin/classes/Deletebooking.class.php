<?php

class Deletebooking extends Database {
	
	private $booking_id;
	
	public function __construct($booking_id){
		$this->booking_id=$booking_id;
	}
	
	
	public function deleteBooking() {
		
$query = "DELETE FROM items WHERE item_id=?";
$stmt=$this->connect()->prepare($query);
$stmt->execute([$this->booking_id]);
		
	}
	
	
	
	
}
