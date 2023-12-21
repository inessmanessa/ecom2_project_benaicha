<?php
spl_autoload_register('loader');

function loader($className) {

	$path="classes/";
	$ext=".class.php";
	$fullPath=$path.$className.$ext;

	if (!file_exists($fullPath)) {

		return false;
	}

	include_once $fullPath;

}

?>
