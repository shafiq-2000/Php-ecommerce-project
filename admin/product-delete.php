<?php 
include '../classes/Product.php';
$p = new Product();
$id = $_GET['id'];
if(isset($_GET['id'])){
    $p->deleteProduct($id);
}


?>