<?php 
/*Ce code vérifie si un formulaire de soumission a été envoyé via la méthode POST 
et si les champs d'e-mail et de mot de passe ont été définis */
require_once('../models/Auth.php');
if (isset($_POST['submit'])) 
{


	if(isset($_POST['email']) && isset($_POST['password']))
	{
		$conn = DB::getConnection();
		$email = mysqli_real_escape_string($conn,$_POST['email']) ;
		$password = mysqli_real_escape_string($conn,$_POST['password']);
		$result = Auth::loginVerify($email);
		if (mysqli_num_rows($result) > 0) 
		{
			echo'<script>alert("Registration Failed. User Already registered ")</script>';
			echo("<script>window.location = '../index.php';</script>");	
		}
		else
		{
			$result = Auth::registerUser($email,$password);
			if($result)
			{
				echo'<script>alert("Registration Successfull. Please Login Now")</script>';
				echo("<script>window.location = '../index.php';</script>");
			}
			else
			{
				echo'<script>alert("Registration Failed. ")</script>';
				echo("<script>window.location = '../index.php';</script>");	
			}
		}




	}
}