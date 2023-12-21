<?php 
/*Le code est destiné à gérer l'authentification de l'utilisateur.
 Si l'utilisateur envoie un formulaire de connexion avec son email et son mot de passe,
  le code vérifie si l'utilisateur est déjà enregistré dans la base de données. */
session_start();
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
			$row = mysqli_fetch_assoc($result);
			if($password==$row['password'])
			{
				if(isset($_COOKIE["email"]))
				{
					setcookie ("email","");
				}
				if(isset($_COOKIE["password"]))
				{
					setcookie ("password","");
				}
				$_SESSION["user_id"]=$row['user_id'];
				$_SESSION["user_email"]=$row['email'];
				$message = 'Login Successfull';
            echo'<script>alert("Login Successfull")</script>';
				echo("<script>window.location = '../index.php';</script>");
			}
			else
			{
				$message = 'Invalid Credentials';
           echo'<script>alert("Login Failed. Invalid Credentials")</script>';
           echo("<script>window.location = './index.php';</script>");
			}
		}
		else
		{
			$message = 'Invalid Credentials';
        echo'<script>alert("Login Failed. User Details not found")</script>';
			echo("<script>window.location = '../index.php';</script>");			
		}
	}
}