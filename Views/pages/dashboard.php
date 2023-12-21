<?php 
require_once('../../Models/Item.php');
$products = Item::getAllProducts();
require_once('../../views/dashboard.phtml');