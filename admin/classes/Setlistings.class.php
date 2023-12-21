<?php

class Setlistings extends Database {

 		private $data; //post array data
 		private $errors=[];
 		private $max_size=1024*5000;
 		private $accepted = ['image/jpeg','image/jpg','image/png'];



 		public function __construct($data) {
 			$this->data=$data; 


 		}

	//VALIDATE FORM AND RETURN ERRORS 
 		public function validateForm() {

		//call the individual field validation methods to return their errors
 			$this->coverphoto();
 			$this->name();
 			$this->code();
 			$this->price();
 			$this->description();
 			return $this->errors;
 		}


 		private function coverphoto(){
 			$file_name= $this->data['coverphoto']=$_FILES['coverphoto']['name'];
 			$file_path= $this->data['coverphoto']="uploads/".$_FILES['coverphoto']['name'];
 			$type= $this->data['coverphoto']=$_FILES['coverphoto']['type'];
 			$size= $this->data['coverphoto']=$_FILES['coverphoto']['size'];
 			$tmp_name= $this->data['coverphoto']=$_FILES['coverphoto']['tmp_name'];
 			$target="uploads/items/".basename($file_name);

 			if(empty($file_name)){
 				$this->addError('coverphotoerror','Please upload image');
 			}elseif($size> $this->max_size) {
 				$this->addError('coverphotoerror','Image is too large. Max is 5Mb');
 			}elseif(!in_array($type,$this->accepted)){
 				$this->addError('coverphotoerror','Unsupported image format.');
 			}else{
//		echo $file_path;
 				move_uploaded_file($tmp_name,$target);
 			}



 		}


 		private function code(){
 			if(empty($this->data['code'])){
 				$this->addError('codeerror','Please specify Item make');
 			}
 		}
 		private function name(){
 			if(empty($this->data['name'])){
 				$this->addError('nameerror','Please specify Item Name');
 			}
 		}
 		private function price(){
 			if(empty($this->data['price'])){
 				$this->addError('priceerror','Please specify Item price');
 			}
 		}

 		private function description(){
 			if(empty($this->data['description'])){
 				$this->addError('descriptionerror','Please provide a short description of Item features');
 			}
 		}

 		private function addError($key,$value){
 			$this->errors[$key]=$value;
 		}


 		public function insertData() {
 			if(!empty($this->errors)) {
 				echo "<script>"."alert('Sorry..some information you entered is invalid, please check and try again')"."</script>";
 			}else {

 				$image =$this->data['coverphoto']="uploads/items/".$_FILES['coverphoto']['name'] ;
 				$item_name=htmlspecialchars($this->data['name']);
 				$item_code=htmlspecialchars($this->data['code']);
 				$item_price=htmlspecialchars($this->data['price']);
 				$item_description=htmlspecialchars($this->data['description']);

 				$query="INSERT INTO items(item_image,item_name,item_description,item_code,item_price)VALUES(?,?,?,?,?)";
 				$statement=$this->connect()->prepare($query);
 				$statement->execute([$image,$item_name,$item_description,$item_code,$item_price]);



 				header('location:add-item.php');




 			}
 		}

 	}
