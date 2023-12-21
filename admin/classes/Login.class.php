<?php

class Login extends Database {
	
	private $errors=[];
	private $data;
	
	public function __construct($data) {
		$this->data= $data;
		
	}
	
	public function validate(){
		
		$this->username();
		$this->password();
	
		return $this->errors;
		
	}
	
	public function username() {
		if(empty($this->data['user_name'])){
			$this->addError('user_name','Enter Username or email');
		}
	}
	
	public function password() {
		if(empty($this->data['password'])){
			$this->addError('password','Enter password');
		}
	}
		
	
	public function addError($key,$value) {
		$this->errors[$key]=$value;
	}
	
	public function loginUser() {
		if(!empty($this->errors)){
			
		}else{
			
		$user_name=$this->data['user_name'];
		$password=$_POST['password'];
			
		$sql="SELECT * FROM users WHERE  email=? AND user_type='admin' LIMIT 1";
		$stmt=$this->connect()->prepare($sql);
		$stmt->execute([$user_name]);
		$result=$stmt->fetch();
			
			if($password===$result['password']) {

			session_regenerate_id();
			session_start();
			$_SESSION['email']=$result['email'];
			$_SESSION['role']=$result['user_type'];
			session_write_close();

			if(isset($_SESSION['role']) && $_SESSION['role']=='admin'){
				header('location:admins.php');
			}else{
				header('location:login.php');
			}


			}else {
		echo "
		<script>
		
		alert('username and password do not match');
		
		</script>
		
		
		";
			}
			
			
		}
		

	}
	
	
	
	
}
