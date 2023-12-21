<?php

	class Edituser extends Database {
	

	public function getSingleUser($user_id) {
		$sql="SELECT * FROM users WHERE user_id = ?";
		$stmt=$this->connect()->prepare($sql);
		$stmt->execute([$user_id]);
		$result=$stmt->fetch();
		return $result;
		
		
	}
		
	public function update() {
		if(isset($_POST['update_user'])) {
			
			$user_id=$_POST['user_id'];
			$email=filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
			$role=$_POST['user_type'];
			$password=$_POST['old_password'];
			
			if(empty($email) || !isset($role)){
				echo"<script> alert('please fill all fields'); </script>";
			}else {
				$query = "UPDATE users SET email=?,user_type=?,password=? WHERE user_id=?";
				$stmt=$this->connect()->prepare($query);
				$stmt->execute([$email,$role,$password,$user_id]);
				
				header('location:admins.php');
			}
		}
	}
		
		
		
		public function delete(){
			
		}
		
	}
