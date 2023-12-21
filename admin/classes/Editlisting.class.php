<?php

class Editlisting extends Database {
	

	public function getSingleRecord($edit_id) {
		$sql="SELECT * FROM items WHERE item_id = ?";
		$stmt=$this->connect()->prepare($sql);
		$stmt->execute([$edit_id]);
		$result=$stmt->fetch();
		return $result;
		
		
	}
	

}
