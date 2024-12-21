<?php
include 'classes/Cart.php';
$cart = new Cart();
$id = $_GET['id'];
if(isset($_GET['id'])){
    $cart->deleteCart($id);
}




?>