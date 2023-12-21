<?php

class Deleteuser extends Database {
	
	private $user_id;
	
	public function __construct($user_id){
		$this->user_id=$user_id;
	}
	
	
	public function deleteUser() {
		
$query = "DELETE FROM users WHERE user_id=?";
$stmt=$this->connect()->prepare($query);
$stmt->execute([$this->user_id]);
		
	}
	
	
	
}
