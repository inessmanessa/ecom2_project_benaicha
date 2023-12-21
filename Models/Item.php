<?php
// include '';
// session_start();
if (!defined('DB_INCLUDED')) {
    define('DB_INCLUDED', true);
    include 'DB.php';
}
class Item {
  //définir une classe "Item" avec deux méthodes statiques.
  //1 pour récupérer toutes les lignes de la table en utilisant la classe BD
  public static function getAllProducts() {
		$conn = DB::getConnection();
		$stmt = $conn->prepare('SELECT * FROM items');
		$stmt->execute();
		return $stmt->get_result();
  }
  //2 renvoie le contenu du panier d'achat stocké dans la variable de session "cart" sous forme de tableau
  public static function getCart() {
      if (isset($_SESSION['cart'])) {
          return $_SESSION['cart'];
      } else {
          return array();
      }
  }

  public static function getCartForCheckout(){
    //définir deux méthodes statiques dans la classe "Item"
    /* se connecte à la base de données en utilisant la méthode statique "getConnection()" de la classe "DB". 
    Ensuite, elle prépare une requête SQL pour récupérer le nom du produit, la quantité et le prix total de chaque article dans le panier. */
    $conn = DB::getConnection();
    $stmt = $conn->prepare("SELECT CONCAT(product_name, '(',qty,')') AS ItemQty, total_price FROM cart");
    $stmt->execute();
  return $stmt->get_result();
  }
    public static function addProduct($item_name, $item_price, $item_description, $new_file, $item_code){
      /* prend en paramètre le nom, le prix, la description, le nom du fichier image et le code d'un nouvel article à ajouter à la base de données.
       La méthode se connecte à la base de données en utilisant la méthode statique "getConnection()" de la classe "DB". */
      $conn = DB::getConnection();
      $query= "INSERT INTO  `items`(`item_name`, `item_price`, `item_description`, `item_image`, `item_code`) VALUES ('$item_name','$item_price','$item_description','$new_file','$item_code');";
      $result = mysqli_query($conn, $query);
      return $result;
  }
}
?>