<?php 
define('BASE_URL', 'http://localhost/E_commerce_site/');
include '../classes/Cart.php';
$cat = new Cart();
$cat->log_user_delete();

session_start();
session_unset();
session_destroy();
header('location: ' . BASE_URL);

?>