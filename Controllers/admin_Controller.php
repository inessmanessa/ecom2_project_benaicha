<?php 
require_once('models/Authentication.php');
/*Le code vérifie si les informations de connexion de l'administrateur sont correctes en récupérant les données du formulaire de connexion, 
en les vérifiant dans la base de données et en créant une session d'administrateur si les informations sont correctes,
 Il affiche également des messages d'alerte si les informations de connexion sont incorrectes ou si l'utilisateur n'est
pas trouvé dans la base de données */
if (isset($_POST['submit'])) 
{
	if(isset($_POST['email']) && isset($_POST['password']))
	{
		$conn = DB::getConnection();
		$email = mysqli_real_escape_string($conn,$_POST['email']) ;
		$password = mysqli_real_escape_string($conn,$_POST['password']);
		$result = Authentication::checkAdminLogin($email);
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

				$_SESSION["admin_id"]=$row['user_id'];
				$_SESSION["admin_email"]=$row['email'];
				$message = 'Login Successfull';
            echo'<script>alert("Login Successfull")</script>';
				echo("<script>window.location = 'dashboard.php';</script>");

			}
			else
			{
				$message = 'Invalid Credentials';
           echo'<script>alert("Login Failed. Invalid Credentials")</script>';
           echo("<script>window.location = 'admin-login.php';</script>");
			}
		}
		else
		{
			$message = 'Invalid Credentials';
        echo'<script>alert("Login Failed. User Details not found")</script>';
			echo("<script>window.location = 'index.php';</script>");
			
		}
	}
}