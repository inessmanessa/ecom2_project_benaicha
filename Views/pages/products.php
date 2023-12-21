<?php
require_once('../../models/Item.php');
$products = Item::getAllProducts();
require_once('../../views/products.phtml');