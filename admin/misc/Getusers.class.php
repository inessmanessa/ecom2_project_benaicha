<?php

class Getusers extends Database {
	
	
		public function selectUsers() {

		
		$sql="SELECT * FROM users ORDER BY user_id DESC";
		$result = $this->connect()->query($sql);
		
		if($result->rowCount() > 0){
			
			while($row=$result->fetch()){
				$data[]=$row;
			}
			
			return $data;
		}
	


    
	}
	
	
	
	
	
	
	
	
	
	
	
}
