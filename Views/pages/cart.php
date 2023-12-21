<?php 
require_once('../../Models/Item.php');
$cart = Item::getCart();
require_once('../../views/cart.phtml');