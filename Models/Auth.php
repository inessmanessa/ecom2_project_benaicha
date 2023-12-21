<?php
require_once  '../config/DB.php';
/*Ce code PHP définit une méthode statique "loginVerify()" dans la classe "Auth". Cette méthode utilise la classe "DB"
 pour se connecter à la base de données et récupère toutes les colonnes de la table "users" 
 qui correspondent à l'adresse e-mail fournie en paramètre,
 L'objectif de cette méthode est de vérifier si l'adresse e-mail fournie correspond à un utilisateur enregistré dans la base de données*/
class Auth {
  public static function loginVerify($email) {
    $conn = DB::getConnection();
    $stmt = $conn->prepare("SELECT * FROM `users` WHERE email='$email';");
    $stmt->execute();
    return $stmt->get_result();
  }
/* récupère toutes les colonnes de la table "admin" qui correspondent à l'adresse e-mail fournie en paramètre.
 L'objectif de cette méthode est de vérifier si l'adresse e-mail fournie correspond à un administrateur enregistré dans la base de données.*/
  public static function loginAdminVerify($email) {
    $conn = DB::getConnection();
    $stmt = $conn->prepare("SELECT * FROM `admin` WHERE email='$email';");
    $stmt->execute();
    return $stmt->get_result();
  }

  public static function registerUser($email, $password) {
    /*  Cette méthode insère un nouveau tuple dans la table "users" avec l'adresse e-mail et le mot de passe fournis en paramètres,
     en utilisant la classe "DB" pour se connecter à la base de données. Elle retourne ensuite le résultat de la requête d'insertion sous forme d'un booléen. L'objectif de cette méthode est d'enregistrer un nouvel utilisateur dans la base de données.
 */
    $conn = DB::getConnection();
    $query= "INSERT INTO users VALUES ('', '$email','$password');";
    $result = mysqli_query($conn, $query);
    return $result;
  }
}

?>